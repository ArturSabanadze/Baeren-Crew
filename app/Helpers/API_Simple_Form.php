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

$archiveDir = __DIR__ . '/../archive/';
/* =========================
   INITIALIZE ERRORS
========================= */

$errors = [];

/* =========================
   ACTION CHECK
========================= */
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'simple_contact_form') {

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

    $contact_person = clean_string($_POST['contact_person'] ?? 'Ansprechpartner nicht angegeben');
    $contact_type = clean_string($_POST['contact_type'] ?? 'Sonstiges');
    $email_raw = trim($_POST['email'] ?? '');
    $phone = clean_phone($_POST['phone'] ?? '');
    $message = clean_string($_POST['message'] ?? '', 2000);
    $consent = isset($_POST['privacy_consent']);

    $email = filter_var($email_raw, FILTER_VALIDATE_EMAIL);

    /* =========================
       VALIDATION
    ========================== */
    if (empty($contact_person)) {
        $errors[] = "Name / Ansprechpartner ist erforderlich.";
    }
    ;
    if (!$email || preg_match("/[\r\n]/", $email)) {
        $errors[] = "Ungültige E-Mail.";
    }
    if (strlen($phone) < 6) {
        $errors[] = "Telefonnummer ungültig.";
    }
    if (!$consent) {
        $errors[] = "Datenschutzbestimmungen erforderlich.";
    }


    /* =========================
       STORE DATA
    ========================== */
    $timestamp = date("Y-m-d H:i:s");
    $ip = getUserIP();

    $data = [
        'timestamp' => $timestamp,
        'ip' => $ip,
        'contact_type' => $contact_type,
        'contact_person' => $contact_person,
        'email' => $email,
        'phone' => $phone,
        'message' => $message
    ];

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
        <p>Sie haben Anfrage über schnelle kontakt formular erhalten.</p>

        <p>Melden Sie sich bitte zeitnah bei dem Kunden.</p>

        <p><strong>Kunden Angaben:</strong><br>
        Ansprechpartner: $contact_person<br>
        Anliegen: $contact_type<br>
        Email: $email<br>
        Telefon: $phone<br><br>
        Nachricht: $message
        </p>
        ";

        $userMessage = "
        <p>Vielen Dank für Ihre Anfrage.</p>

        <p>Wir melden uns zeitnah bei Ihnen.</p>

        <p><strong>Ihre Angaben:</strong><br>
        Ansprechpartner: $contact_person<br>
        Anliegen: $contact_type<br>
        Ihr Nachricht an uns: $message<br>
        </p><br>


        <p>Mit freundlichen Grüßen<br>
        Ihr Bären-Crew Team</p><br>

        <p>
        Webseite: <a href='https://www.baeren-crew.de'>www.baeren-crew.de</a><br>
        Kundensupport-Email: support@baeren-crew.de<br>
        Kunden-Hotline: +49 1556 1231466<br>
        Inhaber: Pogorelov Alexander<br>
        UstID: DE359734620

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
            [], // ✅ no attachments
            false
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
            $errors[] = "E-Mail konnte nicht gesendet werden. Bitte versuchen Sie es später noch ein mal oder kontaktieren Sie uns direkt unter +49 (0155) 61231466.";
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
    header("Location: /index.php?page=home");
    exit;
}