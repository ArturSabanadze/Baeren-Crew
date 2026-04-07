<?php
if (session_status() === PHP_SESSION_NONE)
    session_start();

ini_set('display_errors', 1);
error_reporting(E_ALL);

if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

$errors = $_SESSION['form_errors'] ?? [];
$success = $_SESSION['form_success'] ?? false;
unset($_SESSION['form_errors'], $_SESSION['form_success']);

?>

<div class="hero-form" id="contact-form">
    <div class="error-message">
        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php foreach ($errors as $err): ?>
                        <li>
                            <?= htmlspecialchars($err, ENT_QUOTES, 'UTF-8'); ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php elseif ($success): ?>
            <div class="alert alert-success">
                Vielen Dank! Ihre Anfrage wurde erfolgreich versendet. Wir melden uns schnellstmöglich bei Ihnen.
            </div>
        <?php endif; ?>
    </div>
    <form id="quick-request-form" method="POST" autocomplete="off">
        <input type="hidden" name="csrf_token"
            value="<?= htmlspecialchars($_SESSION['csrf_token'], ENT_QUOTES, 'UTF-8'); ?>">
        <input type="hidden" name="action" value="simple_contact_form">

        <input type="text" name="company_name" style="display:none" tabindex="-1" autocomplete="off">

        <div class="form-group">
            <label for="contact_person">Name / Ansprechpartner *</label>
            <input type="text" id="contact_person" name="contact_person" class="form-input"
                placeholder="Herr/Frau Mustermann" maxlength="255" required
                value="<?= htmlspecialchars($_POST['contact_person'] ?? '') ?>">
        </div>

        <div class="form-group select">
            <label for="hero-form-select">Anliegen</label>
            <select id="hero-form-select" name="contact_type" class="form-input">
                <option value="Umzug" <?= (($_POST['contact_type'] ?? '') === 'Umzug') ? 'selected' : '' ?>>Umzug
                </option>
                <option value="Entrümpelung" <?= (($_POST['contact_type'] ?? '') === 'Entrümpelung') ? 'selected' : '' ?>>
                    Entrümpelung
                </option>
                <option value="Objektbetreuung" <?= (($_POST['contact_type'] ?? '') === 'Objektbetreuung') ? 'selected' : '' ?>>Objektbetreuung
                </option>
                <option value="Sonstiges" <?= (($_POST['contact_type'] ?? '') === 'Sonstiges') ? 'selected' : '' ?>>
                    Sonstiges </option>
                </option>
            </select>
        </div>

        <div class="form-group">
            <label for="email">E-Mail *</label>
            <input type="email" id="email" name="email" class="form-input" placeholder="beispiel@email.de"
                maxlength="255" required value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
        </div>

        <div class="form-group">
            <label for="phone">Telefonnummer *</label>
            <input type="tel" id="phone" name="phone" class="form-input" placeholder="+49 123 456789" maxlength="30"
                required value="<?= htmlspecialchars($_POST['phone'] ?? '') ?>">
        </div>

        <div class="form-group">
            <label for="message">Nachricht *</label>
            <textarea id="message" name="message" class="form-input" placeholder="Ihre Nachricht" maxlength="2000"
                required><?= htmlspecialchars($_POST['message'] ?? '') ?></textarea>
        </div>

        <div class="form-group dsgvo">
            <label>
                <input type="checkbox" name="privacy_consent" required <?= isset($_POST['privacy_consent']) ? 'checked' : '' ?>>
                Ich habe die <a href="/index.php?page=dsgvo">Datenschutzerklärung</a> gelesen und akzeptiere diese. *
            </label>
        </div>

        <button type="submit" class="btn btn-primary btn-full" id="submit-btn">
            <span class="btn-text">NACHRICHT SENDEN</span>
            <span class="spinner" style="display:none;"></span>
        </button>
        <script>
            document.getElementById("quick-request-form").addEventListener("submit", function () {
                const btn = document.getElementById("submit-btn");
                btn.disabled = true;

                btn.querySelector(".btn-text").innerText = "Wird gesendet...";
                btn.querySelector(".spinner").style.display = "inline-block";
            });
        </script>
    </form>
</div>