const cards = Array.from(document.querySelectorAll(".card"));
let order = [0, 1, 2]; // index order

let startX = 0;
let currentX = 0;
let isDragging = false;

function applyStack() {
  const transforms = [
    "translate(-35%, -30%) translateX(-5px) rotate3d(0, 4, 0, 0deg)", // FRONT
    "translate(-35%, -45%) translateX(-47px) rotate3d(0, 4, 0, 0deg)",
    "translate(-50%, -60%) translateX(-50px) rotate3d(0, 4, 0, 0deg)", // BACK
  ];

  const zIndexes = [10, 9, 8];

  order.forEach((cardIndex, i) => {
    const card = cards[cardIndex];

    card.style.transition = "transform 0.5s ease";
    card.style.transform = transforms[i];
    card.style.zIndex = zIndexes[i];
  });
}

// 👉 swipe LEFT (next card comes to front)
function nextCard() {
  order.push(order.shift()); // rotate left
  applyStack();
}

// 👉 swipe RIGHT (previous card comes to front)
function prevCard() {
  order.unshift(order.pop()); // rotate right
  applyStack();
}

// Touch handling
const wrapper = document.querySelector(".card-wrapper");

wrapper.addEventListener("touchstart", (e) => {
  startX = e.touches[0].clientX;
  currentX = startX;
  isDragging = true;
});

wrapper.addEventListener(
  "touchmove",
  (e) => {
    if (!isDragging) return;
    currentX = e.touches[0].clientX;
  },
  { passive: true },
);

wrapper.addEventListener("touchend", () => {
  const diff = currentX - startX;

  if (diff < -50) {
    nextCard();
  } else if (diff > 50) {
    prevCard();
  }

  isDragging = false;
});

// init
function isMobile() {
  return window.innerWidth <= 768;
}

function init() {
  if (!isMobile()) return;
  applyStack();
}

window.addEventListener("load", init);
window.addEventListener("resize", init);
