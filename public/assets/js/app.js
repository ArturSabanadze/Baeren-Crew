/* =========================================================
   APP INITIALIZATION
========================================================= */

document.addEventListener("DOMContentLoaded", () => {
  initHeaderScroll();
  initSectionObserver();
  initFooterReveal();
  initMobileNavigation();
  document.body.offsetHeight; // force reflow
});

/* =========================================================
   VIEWPORT HEIGHT FIX (Mobile Safe)
========================================================= */

/* =========================================================
   HEADER HIDE ON SCROLL
========================================================= */

function initHeaderScroll() {
  const header = document.getElementById("appHeader");
  if (!header) return;

  let lastScroll = 0;
  let ticking = false;

  const handleScroll = () => {
    const currentScroll = window.scrollY;

    if (currentScroll > lastScroll && currentScroll > 100) {
      header.classList.add("hidden");
    } else {
      header.classList.remove("hidden");
    }

    lastScroll = currentScroll;
    ticking = false;
  };

  window.addEventListener("scroll", () => {
    if (!ticking) {
      window.requestAnimationFrame(handleScroll);
      ticking = true;
    }
  });
}

/* =========================================================
   SECTION FADE-IN (IntersectionObserver)
========================================================= */

function initSectionObserver() {
  const sections = document.querySelectorAll(".app-section");
  if (!sections.length) return;

  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.style.opacity = "1";
          entry.target.style.transform = "scale(1)";
        }
      });
    },
    {
      threshold: 0.15,
    },
  );

  sections.forEach((section) => {
    section.style.opacity = "0";
    section.style.transform = "scale(0.98)";
    section.style.transition =
      "opacity 0.6s ease, transform 0.6s cubic-bezier(0.4, 0, 0.2, 1)";
    observer.observe(section);
  });
}

/* =========================================================
   FOOTER REVEAL ON BOTTOM
========================================================= */

function initFooterReveal() {
  const footer = document.getElementById("appFooter");
  if (!footer) return;

  const handleFooter = () => {
    const scrollPosition = window.innerHeight + window.scrollY;
    const fullHeight = document.documentElement.scrollHeight;

    if (scrollPosition >= fullHeight - 5) {
      footer.classList.add("visible");
    } else {
      footer.classList.remove("visible");
    }
  };

  window.addEventListener("scroll", handleFooter);
}

/* =========================================================
   MOBILE NAVIGATION
========================================================= */

function initMobileNavigation() {
  const hamburger = document.getElementById("mobileHamburger");
  const mobileMenu = document.getElementById("mobileMenu");

  if (!hamburger || !mobileMenu) return;

  const mobileDropdowns = document.querySelectorAll(".nav__mobile-dropdown");
  const mobileLinks = mobileMenu.querySelectorAll("a");

  // Toggle main menu
  hamburger.addEventListener("click", (e) => {
    e.stopPropagation();
    mobileMenu.classList.toggle("show");
  });

  // Toggle dropdowns
  mobileDropdowns.forEach((dropdown) => {
    const btn = dropdown.querySelector(".nav__dropdown-btn");
    if (!btn) return;

    btn.addEventListener("click", (e) => {
      e.stopPropagation();
      dropdown.classList.toggle("active");
    });
  });

  // Close menu on link click
  mobileLinks.forEach((link) => {
    link.addEventListener("click", () => {
      mobileMenu.classList.remove("show");
      mobileDropdowns.forEach((dropdown) =>
        dropdown.classList.remove("active"),
      );
    });
  });

  // Close when clicking outside
  document.addEventListener("click", (e) => {
    if (!mobileMenu.contains(e.target) && !hamburger.contains(e.target)) {
      mobileMenu.classList.remove("show");
      mobileDropdowns.forEach((dropdown) =>
        dropdown.classList.remove("active"),
      );
    }
  });
}
