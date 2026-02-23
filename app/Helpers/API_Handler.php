<?php

$env = parse_ini_file(__DIR__ . '/../../config/.env');

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require __DIR__ . '/../../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

/* =========================
   CONFIG
========================= */

$uploadDir = __DIR__ . '/../uploads/';
$archiveDir = __DIR__ . '/../archive/';
$maxFileSize = 2 * 1024 * 1024; // 2MB
$maxFiles = 5;
$allowedMimeTypes = ['image/jpeg', 'image/png', 'application/pdf'];

var_dump($uploadDir);
/* =========================
   INITIALIZE ERRORS
========================= */

$errors = [];

/* =========================
   ACTION CHECK
========================= */
if (
    $_SERVER['REQUEST_METHOD'] === 'POST' &&
    ($_POST['action'] ?? '') === 'save_contact_message'
) {

    /* =========================
       HONEYPOT
    ========================== */
    if (!empty($_POST['company_name'])) {
        $errors[] = "Spam erkannt.";
    }

    /* =========================
       CSRF VALIDATION
    ========================== */
    if (
        empty($_POST['csrf_token']) || empty($_SESSION['csrf_token']) ||
        !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])
    ) {
        $errors[] = "Ungültiges CSRF Token.";
    }

    // Invalidate token (double submit protection)
    unset($_SESSION['csrf_token']);

    /* =========================
       HELPER FUNCTIONS
    ========================== */
    function clean_string($value, $max = 255)
    {
        $value = trim($value);
        $value = strip_tags($value);
        $value = preg_replace('/\s+/', ' ', $value);
        return mb_substr($value, 0, $max);
    }

    function clean_phone($value)
    {
        return preg_replace('/[^0-9+\-\s()]/', '', $value);
    }

    function getUserIP()
    {
        if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            return trim(explode(',', $_SERVER['HTTP_X_FORWARDED_FOR'])[0]);
        }
        return $_SERVER['REMOTE_ADDR'] ?? 'UNKNOWN';
    }

    /* =========================
       FETCH INPUT
    ========================== */
    $from_address = clean_string($_POST['from_address'] ?? '');
    $to_address = clean_string($_POST['to_address'] ?? '');
    $move_date = clean_string($_POST['move_date'] ?? '', 20);
    $email_raw = trim($_POST['email'] ?? '');
    $phone = clean_phone($_POST['phone'] ?? '');
    $consent = isset($_POST['privacy_consent']);

    $email = filter_var($email_raw, FILTER_VALIDATE_EMAIL);

    /* =========================
       VALIDATION
    ========================== */
    if (!$email || preg_match("/[\r\n]/", $email)) {
        $errors[] = "Ungültige E-Mail.";
    }
    if (strlen($from_address) < 5 || strlen($to_address) < 5) {
        $errors[] = "Adresse ungültig.";
    }
    if (strlen($phone) < 6) {
        $errors[] = "Telefonnummer ungültig.";
    }
    if (!$consent) {
        $errors[] = "Datenschutzbestimmungen erforderlich.";
    }
    if (!empty($move_date)) {
        $d = DateTime::createFromFormat('Y-m-d', $move_date);
        if (!$d || $d->format('Y-m-d') !== $move_date) {
            $errors[] = "Ungültiges Datum.";
        }
    }

    /* =========================
       FILE HANDLING
    ========================== */
    $uploadedFiles = [];
    if (!empty($_FILES['files']['name'][0])) {

        if (count($_FILES['files']['name']) > $maxFiles) {
            $errors[] = "Maximal 5 Dateien erlaubt.";
        }

        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        foreach ($_FILES['files']['tmp_name'] as $key => $tmpName) {

            if ($_FILES['files']['error'][$key] !== UPLOAD_ERR_OK)
                continue;

            if ($_FILES['files']['size'][$key] > $maxFileSize) {
                $errors[] = "Datei größer als 2MB: " . $_FILES['files']['name'][$key];
                continue;
            }

            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $mime = finfo_file($finfo, $tmpName);
            finfo_close($finfo);

            if (!in_array($mime, $allowedMimeTypes)) {
                $errors[] = "Ungültiger Dateityp: " . $_FILES['files']['name'][$key];
                continue;
            }

            $safeName = bin2hex(random_bytes(16)) . '_' .
                preg_replace("/[^a-zA-Z0-9.\-_]/", "", $_FILES['files']['name'][$key]);

            if (!move_uploaded_file($tmpName, $uploadDir . $safeName)) {
                $errors[] = "Datei konnte nicht gespeichert werden: " . $_FILES['files']['name'][$key];
                $errors[] = $uploadDir . $safeName;
                continue;
            }

            $uploadedFiles[] = $safeName;
        }
    }

    /* =========================
       STORE DATA
    ========================== */
    $timestamp = date("Y-m-d H:i:s");
    $ip = getUserIP();

    $data = [
        'timestamp' => $timestamp,
        'ip' => $ip,
        'from_address' => $from_address,
        'to_address' => $to_address,
        'move_date' => $move_date,
        'email' => $email,
        'phone' => $phone,
        'files' => $uploadedFiles
    ];

    if (!is_dir($archiveDir)) {
        mkdir($archiveDir, 0755, true);
    }

    file_put_contents(
        $archiveDir . 'contact_' . time() . '.json',
        json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE),
        LOCK_EX
    );

    /* =========================
       SMTP FUNCTION WITH ATTACHMENTS
    ========================== */
    function sendMailSMTP($to, $subject, $body, $replyTo = null, $attachments = [], $includeLogo = false)
    {
        global $env;

        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = $env['SMTP_HOST'];
            $mail->SMTPAuth = true;
            $mail->Username = $env['SMTP_USER'];
            $mail->Password = $env['SMTP_PASS'];
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = $env['SMTP_PORT'];
            $mail->CharSet = 'UTF-8';
            $mail->SMTPDebug = 0;
            $mail->Debugoutput = 'error_log';

            $mail->setFrom($env['SMTP_USER'], 'Bären-Crew Umzüge');
            $mail->addAddress($to);

            if ($replyTo) {
                $mail->addReplyTo($replyTo);
            }

            foreach ($attachments as $file) {
                $filePath = __DIR__ . '/../uploads/' . $file;
                if (file_exists($filePath)) {
                    $mail->addAttachment($filePath);
                }
            }

            if ($includeLogo) {
                $mail->addEmbeddedImage(
                    __DIR__ . '/../uploads/Logo.webp',
                    'logo_cid'
                );
            }

            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body = $body;

            return $mail->send();

        } catch (Exception $e) {
            error_log("Mailer Error: " . $mail->ErrorInfo);
            return false;
        }
    }

    /* =========================
       SEND EMAILS IF NO ERRORS
    ========================== */
    if (empty($errors)) {
        $companyMessage = "
<p>Sie haben eine neue Umzugsanfrage.</p>

<p>Melden Sie sich bitte zeitnah bei dem Kunden.</p>

<p><strong>Kunden Angaben:</strong><br>
Auszug: $from_address<br>
Einzug: $to_address<br>
Umzugsdatum: $move_date<br>
Email: $email<br>
Telefon: $phone
</p>

<p>
Sollten Sie Fragen haben bezüglich der Kontakt Formular, melden Sie sich bitte bei unserem Support Team:<br>
Email: ArturSabanadze@gmail.com</p>
";

        $userMessage = "
<p>Vielen Dank für Ihre Anfrage.</p>

<p>Wir melden uns zeitnah bei Ihnen.</p>

<p><strong>Ihre Angaben:</strong><br>
Auszug: $from_address<br>
Einzug: $to_address<br>
Datum: $move_date<br>
Telefon: $phone
</p>

<p>Mit freundlichen Grüßen<br>
Ihr Bären-Crew Team</p>

<p>
Webseite: <a href='https://www.baeren-crew.de'>www.baeren-crew.de</a><br>
Kundensupport-Email: support@baeren-crew.de<br>
Kunden-Hotline: +49 1556 1231466
</p>

<p style='margin-top:30px;'>
    <img src='cid:logo_cid' alt='Bären-Crew Logo' width='180'>
</p>
";

        $mailCompany = sendMailSMTP(
            "auftraege@baeren-crew.de",
            "Neue Umzugsanfrage",
            $companyMessage,
            $email,
            $uploadedFiles,
            false // no logo
        );

        // User email — include logo
        $mailUser = sendMailSMTP(
            $email,
            "Bestätigung Ihrer Anfrage",
            $userMessage,
            null,
            [],
            true // include logo
        );

        if (!$mailCompany || !$mailUser) {
            $errors[] = "E-Mail konnte nicht gesendet werden. Bitte versuchen Sie es später.";
        }
    }

    /* =========================
       STORE ERRORS / SUCCESS IN SESSION
    ========================== */
    if (!empty($errors)) {
        $_SESSION['form_errors'] = $errors;
        $_SESSION['form_success'] = false;
    } else {
        $_SESSION['form_errors'] = [];
        $_SESSION['form_success'] = true;
    }

    /* =========================
       REDIRECT BACK TO FORM
    ========================== */
    header("Location: /index.php?page=home"); // adjust page URL as needed
    exit;
}