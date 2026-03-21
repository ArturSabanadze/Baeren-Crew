<!-- PACKAGE MODAL -->
<div class="pkg-modal" id="pkgModal">
    <div class="pkg-modal-overlay"></div>

    <div class="pkg-modal-content">
        <button class="pkg-modal-close" id="pkgModalClose">&times;</button>

        <h2 id="modalTitle">Paketname</h2>
        <p class="modal-subtitle" id="modalSubtitle"></p>

        <div class="modal-details" id="modalDetails"></div>

        <div class="modal-description" id="modalDescription"></div>

        <ul class="modal-features" id="modalFeatures"></ul>

        <div class="modal-price" id="modalPrice"></div>

        <div class="modal-price-details" id="modalPriceDetails"></div>

        <button class="pkg-btn modal-cta">Jetzt anfragen</button>
    </div>
    <div class="pkg-modal-form-container" style="display:none;">
        <?php include_once __DIR__ . '/package_contact.php'; ?>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const modalCTA = document.querySelector(".modal-cta");
        const pkgModal = document.querySelector(".pkg-modal-content");
        const pkgModalFormContainer = document.querySelector(".pkg-modal-form-container");
        const formSection = document.querySelector(".package-form");
        const selectedPackageInput = document.getElementById("selected_package");

        modalCTA.addEventListener("click", function () {
            // Get the currently displayed package title in the modal
            const packageTitle = document.getElementById("modalTitle").innerText;

            // Set it in the hidden input in the form
            selectedPackageInput.value = packageTitle;

            // Close the package modal
            pkgModal.style.display = "none";
            pkgModalFormContainer.style.display = "block";

            // Optionally scroll to the form and show it
            formSection.scrollIntoView({ behavior: "smooth" });
            formSection.style.display = "block"; // if the form is hidden by default
        });
    });
</script>