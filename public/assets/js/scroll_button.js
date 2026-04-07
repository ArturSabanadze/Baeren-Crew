const scrollToTopBtn = document.getElementById("scrollTopBtn");
const scrollToBottomBtn = document.getElementById("scrollBottomBtn");

window.addEventListener("scroll", () => {
  const scrollTop = window.scrollY;
  const windowHeight = window.innerHeight;
  const documentHeight = document.documentElement.scrollHeight;

  const scrolledPercentage = (scrollTop + windowHeight) / documentHeight;

  if (scrolledPercentage > 0.5) {
    scrollToTopBtn.style.display = "block";
    scrollToBottomBtn.style.display = "none";
  } else {
    scrollToBottomBtn.style.display = "block";
    scrollToTopBtn.style.display = "none";
  }
});

// Scroll to top smoothly
scrollToTopBtn.addEventListener("click", () => {
  window.scrollTo({
    top: 0,
    behavior: "smooth",
  });
});

// Scroll to bottom smoothly
scrollToBottomBtn.addEventListener("click", () => {
  window.scrollTo({
    top: document.documentElement.scrollHeight,
    behavior: "smooth",
  });
});
