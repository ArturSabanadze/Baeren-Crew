<?php
if (session_status() === PHP_SESSION_NONE)
    session_start();

if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

$errors = $_SESSION['form_errors'] ?? [];
$success = $_SESSION['form_success'] ?? false;
unset($_SESSION['form_errors'], $_SESSION['form_success']);
?>



<div class="hero-form">
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
                Vielen Dank! Ihre Anfrage wurde erfolgreich versendet.
            </div>
        <?php endif; ?>
    </div>
    <form id="quick-request-form" action="/" method="POST" enctype="multipart/form-data" autocomplete="off">

        <input type="hidden" name="csrf_token"
            value="<?= htmlspecialchars($_SESSION['csrf_token'], ENT_QUOTES, 'UTF-8'); ?>">
        <input type="hidden" name="action" value="save_contact_message">

        <input type="text" name="company_name" style="display:none" tabindex="-1" autocomplete="off">

        <div class="form-group">
            <label for="from_address">Auszugsadresse *</label>
            <input type="text" id="from_address" name="from_address" class="form-input"
                placeholder="Straße, Hausnummer, PLZ, Ort" maxlength="255" required
                value="<?= htmlspecialchars($_POST['from_address'] ?? '') ?>">
        </div>

        <div class="form-group">
            <label for="to_address">Einzugsadresse *</label>
            <input type="text" id="to_address" name="to_address" class="form-input"
                placeholder="Straße, Hausnummer, PLZ, Ort" maxlength="255" required
                value="<?= htmlspecialchars($_POST['to_address'] ?? '') ?>">
        </div>

        <div class="form-group">
            <label for="move_date">Umzugsdatum</label>
            <input type="date" id="move_date" name="move_date" class="form-input date-input"
                value="<?= htmlspecialchars($_POST['move_date'] ?? '') ?>">
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
            <label for="files">Dateien (max. 10 Dateien, je 2MB)</label>
            <input type="file" id="files" name="files[]" class="form-input" multiple accept=".jpg,.jpeg,.png,.pdf">
        </div>

        <div class="form-group">
            <label>
                <input type="checkbox" name="privacy_consent" required <?= isset($_POST['privacy_consent']) ? 'checked' : '' ?>>
                Ich habe die <a href="/index.php?page=dsgvo">Datenschutzerklärung</a> gelesen und akzeptiere diese. *
            </label>
        </div>

        <button type="submit" class="btn btn-primary btn-full">Rückruf anfordern</button>
    </form>
</div>