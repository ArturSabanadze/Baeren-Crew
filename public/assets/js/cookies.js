
document.addEventListener("DOMContentLoaded", function() {

  const banner = document.getElementById("cookieBanner");
  const modal = document.getElementById("cookieModal");

  const acceptAll = document.getElementById("cookieAcceptAll");
  const rejectAll = document.getElementById("cookieRejectAll");
  const openSettings = document.getElementById("cookieSettingsOpen");
  const saveSettings = document.getElementById("cookieSaveSettings");

  const statisticsCheckbox = document.getElementById("consentStatistics");
  const marketingCheckbox = document.getElementById("consentMarketing");

  const storedConsent = localStorage.getItem("cookieConsent");

  if (!storedConsent) {
    setTimeout(() => banner.classList.add("show"), 500);
  } else {
    applyConsent(JSON.parse(storedConsent));
  }

  /* =========================
     BUTTONS
  ========================= */

  acceptAll.addEventListener("click", () => {
    const consent = {
      necessary: true,
      statistics: true,
      marketing: true
    };
    saveConsent(consent);
  });

  rejectAll.addEventListener("click", () => {
    const consent = {
      necessary: true,
      statistics: false,
      marketing: false
    };
    saveConsent(consent);
  });

  openSettings.addEventListener("click", () => {
    modal.classList.add("show");
  });

  saveSettings.addEventListener("click", () => {
    const consent = {
      necessary: true,
      statistics: statisticsCheckbox.checked,
      marketing: marketingCheckbox.checked
    };
    saveConsent(consent);
  });

  /* =========================
     CONSENT HANDLING
  ========================= */

  function saveConsent(consent) {
    localStorage.setItem("cookieConsent", JSON.stringify(consent));
    banner.classList.remove("show");
    modal.classList.remove("show");
    applyConsent(consent);
  }

  function applyConsent(consent) {

    if (consent.statistics) {
      loadAnalytics();
    }

    if (consent.marketing) {
      loadMarketing();
    }

    // Google Consent Mode v2 example:
    if (typeof gtag !== "undefined") {
      gtag("consent", "update", {
        ad_storage: consent.marketing ? "granted" : "denied",
        analytics_storage: consent.statistics ? "granted" : "denied"
      });
    }
  }

  function loadAnalytics() {
    console.log("Analytics aktiviert");
    // Dynamically inject Google Analytics here
  }

  function loadMarketing() {
    console.log("Marketing aktiviert");
    // Inject Facebook Pixel etc.
  }

});