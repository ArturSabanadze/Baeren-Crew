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

<div class="package-form" id="pkgModal" style="display:none;">
    <button class="pkg-modal-close" id="formModalClose">&times;</button>
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
    <form id="quick-request-form" class="pkgModal-form" action="/" method="POST" enctype="multipart/form-data"
        autocomplete="off">

        <input type="hidden" name="csrf_token"
            value="<?= htmlspecialchars($_SESSION['csrf_token'], ENT_QUOTES, 'UTF-8'); ?>">
        <input type="hidden" name="action" value="save_contact_message">
        <input type="hidden" name="selected_package" id="selected_package" value="">

        <input type="text" name="company_name" style="display:none" tabindex="-1" autocomplete="off">

        <div class="pkg-form-group">
            <label for="from_address">Auszugsadresse *</label>
            <input type="text" id="from_address" name="from_address" class="form-input"
                placeholder="Straße, Hausnummer, PLZ, Ort" maxlength="255" required
                value="<?= htmlspecialchars($_POST['from_address'] ?? '') ?>">
        </div>

        <div class="pkg-form-group">
            <label for="to_address">Einzugsadresse *</label>
            <input type="text" id="to_address" name="to_address" class="form-input"
                placeholder="Straße, Hausnummer, PLZ, Ort" maxlength="255" required
                value="<?= htmlspecialchars($_POST['to_address'] ?? '') ?>">
        </div>

        <div class="pkg-form-group">
            <label for="move_date">Umzugsdatum</label>
            <input type="date" id="move_date" name="move_date" class="form-input date-input" placeholder="TT.MM.JJJJ"
                maxlength="255" value="<?= htmlspecialchars($_POST['move_date'] ?? '') ?>">
        </div>

        <div class="pkg-form-group">
            <label for="email">E-Mail *</label>
            <input type="email" id="email" name="email" class="form-input" placeholder="beispiel@email.de"
                maxlength="255" required value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
        </div>

        <div class="pkg-form-group">
            <label for="phone">Telefonnummer *</label>
            <input type="tel" id="phone" name="phone" class="form-input" placeholder="+49 123 456789" maxlength="30"
                required value="<?= htmlspecialchars($_POST['phone'] ?? '') ?>">
        </div>

        <div class="pkg-form-group">
            <label>
                <input type="checkbox" name="privacy_consent" required <?= isset($_POST['privacy_consent']) ? 'checked' : '' ?>>
                Ich habe die <a href="/index.php?page=dsgvo">Datenschutzerklärung</a> gelesen und akzeptiere diese. *
            </label>
        </div>

        <button type="submit" class="btn btn-primary btn-full" id="modal-submit-btn">
            <span class="btn-text">Rückruf anfordern</span>
            <span class="spinner" style="display:none;"></span>
        </button>
        <script>
            document.querySelector(".pkgModal-form").addEventListener("submit", function () {
                const btn = document.getElementById("modal-submit-btn");
                btn.disabled = true;

                btn.querySelector(".btn-text").innerText = "Wird gesendet...";
                btn.querySelector(".spinner").style.display = "inline-block";
            });
        </script>
    </form>
</div>
<script>


    document.addEventListener("DOMContentLoaded", function () {
        const selectedPackageInput = document.getElementById("selected_package");
        const packageTitle = document.getElementById("modalTitle").innerText;
    });
    document.querySelector(".pkg-modal-close").addEventListener("click", () => {
        formSection.classList.remove("active");
    });
</script>
<script>
    const pkgModal = document.querySelector(".pkg-modal-content");
    const pkgModalFormContainer = document.querySelector(".pkg-modal-form-container");
    const formSection = document.getElementById("pkgModal");
    document.querySelector("#formModalClose").addEventListener("click", () => {
        pkgModal.style.display = "block";
        pkgModalFormContainer.style.display = "none";
        document.getElementById("modalTitle").innerText = "";
        formSection.classList.remove("active");
    });
</script>