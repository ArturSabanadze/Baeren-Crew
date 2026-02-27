const cards = document.querySelectorAll(".pkg-card");
let currentIndex = 0; // initially focus the first card
const container = document.querySelector(".container.section-grid.section-pkg");

function updateCards() {
  cards.forEach((card, i) => {
    card.style.transition = "transform 0.4s ease, opacity 0.4s ease";

    // Base offset for peek effect
    if (card.classList.contains("first"))
      card.style.transform = "translateX(20%)";
    else if (card.classList.contains("second"))
      card.style.transform = "translateX(15%)";
    else if (card.classList.contains("third"))
      card.style.transform = "translateX(10%)";
    else card.style.transform = "translateX(0)";

    card.style.opacity = 0.9;
    card.style.zIndex = 1;
    card.style.pointerEvents = "none"; // disable all cards by default
  });

  // Focused card
  const currentCard = cards[currentIndex];
  currentCard.style.transform = "translateX(0) scale(1.1)";
  currentCard.style.opacity = 1;
  currentCard.style.zIndex = 5;
  currentCard.style.pointerEvents = "auto"; // enable only focused card

  // Previous card peek
  const previousCard = cards[(currentIndex - 1 + cards.length) % cards.length];
  previousCard.style.transform = "translateX(-20%)";
  previousCard.style.opacity = 0.9;
  previousCard.style.zIndex = 0;

  // Next card peek
  const nextCard = cards[(currentIndex + 1) % cards.length];
  nextCard.style.transform = "translateX(20%)";
  nextCard.style.opacity = 0.9;
  nextCard.style.zIndex = 0;
}

// Slide functions
function nextCard() {
  currentIndex = (currentIndex + 1) % cards.length;
  updateCards();
}
function prevCard() {
  currentIndex = (currentIndex - 1 + cards.length) % cards.length;
  updateCards();
}

// Initialize mobile slider
function initMobileSlider() {
  if (window.matchMedia("(max-width: 768px)").matches) {
    updateCards(); // initial layout

    // Attach touch listeners only once
    if (!container.dataset.touchListener) {
      let startX = 0;
      container.addEventListener(
        "touchstart",
        (e) => (startX = e.touches[0].clientX),
      );
      container.addEventListener("touchend", (e) => {
        const endX = e.changedTouches[0].clientX;
        if (endX - startX > 50) prevCard();
        if (startX - endX > 50) nextCard();
      });
      container.dataset.touchListener = "true"; // mark as attached
    }
  } else {
    // Reset for desktop
    cards.forEach((card) => {
      card.style.transform = "";
      card.style.opacity = "";
      card.style.zIndex = "";
      card.style.pointerEvents = "auto";
    });
  }
}

// Initialize
initMobileSlider();

// Re-init on resize
window.addEventListener("resize", initMobileSlider);
