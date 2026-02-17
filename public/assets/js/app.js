/* =========================================================
   CONFIG
========================================================= */

const header = document.getElementById('appHeader');
const footer = document.getElementById('appFooter');
const sections = document.querySelectorAll('.app-section');

let lastScroll = 0;
let ticking = false;
let isAutoScrolling = false;

/* =========================================================
   MAIN SCROLL HANDLER (PERFORMANCE SAFE)
========================================================= */

function handleScroll() {

    const currentScroll = window.scrollY;
    const windowHeight = window.innerHeight;

    /* -------------------------------
       NAVBAR HIDE ON SCROLL
    -------------------------------- */

    if (!isAutoScrolling) {
        if (currentScroll > lastScroll && currentScroll > 100) {
            header.classList.add('hidden');
        } else {
            header.classList.remove('hidden');
        }
    }

    lastScroll = currentScroll;

    /* -------------------------------
       SECTION OVERLAP FADE
    -------------------------------- */
sections.forEach(section => {

    const rect = section.getBoundingClientRect();

    const isVisible =
        rect.top < window.innerHeight &&
        rect.bottom > 0;

    if (isVisible) {
        section.style.opacity = 1;
        section.style.transform = "scale(1)";
    } else {
        section.style.opacity = 0;
        section.style.transform = "scale(0.98)";
    }

});

    /* -------------------------------
       FOOTER REVEAL
    -------------------------------- */

    const scrollPosition = windowHeight + currentScroll;
    const fullHeight = document.body.scrollHeight;

    if (scrollPosition >= fullHeight - 5) {
        footer.classList.add('visible');
    } else {
        footer.classList.remove('visible');
    }

    ticking = false;
}

window.addEventListener('scroll', () => {
    if (!ticking) {
        window.requestAnimationFrame(handleScroll);
        ticking = true;
    }
});



/* =========================================================
   INIT
========================================================= */

document.addEventListener('DOMContentLoaded', () => {
    handleScroll();
});
