/* ===========================
       TAB PERSISTENCE LOGIC
    ============================ */

    const tabs = document.querySelectorAll(".tab-button");
    const tabContents = document.querySelectorAll(".tab-content");
    const STORAGE_KEY = "active_profile_tab";

    function activateTab(tabName) {
        tabs.forEach(t => {
            t.classList.toggle("active", t.dataset.tab === tabName);
        });

        tabContents.forEach(tc => {
            tc.style.display = tc.id === tabName + "-tab" ? "block" : "none";
        });
    }

    // Restore saved tab from localStorage (or default to account)
    const savedTab = localStorage.getItem(STORAGE_KEY) || "account";
    activateTab(savedTab);

    // Save tab on click
    tabs.forEach(tab => {
        tab.addEventListener("click", () => {
            const tabName = tab.dataset.tab;
            localStorage.setItem(STORAGE_KEY, tabName);
            activateTab(tabName);
        });
    });