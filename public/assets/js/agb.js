/* =========================================================
   AGB ACCORDION
========================================================= */

document.addEventListener("DOMContentLoaded", function () {

    const toggles = document.querySelectorAll(".agb-toggle");

    toggles.forEach(toggle => {
        toggle.addEventListener("click", function () {

            const section = this.parentElement;

            section.classList.toggle("active");

        });
    });

});
