const sidebar = document.querySelector(".sb_wrapper");
const sidebarToggleBtn = document.querySelector(".sb_arrow");
const toggleArrow = document.querySelector(".sb_toggle_arrow");

sidebarToggleBtn.addEventListener("click", () => {
  sidebar.classList.toggle("active");
  toggleArrow.classList.toggle("active");
});
