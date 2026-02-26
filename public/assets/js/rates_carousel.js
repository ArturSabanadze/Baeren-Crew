document.addEventListener("DOMContentLoaded", function () {
  const track = document.querySelector(".review-track");
  const slides = document.querySelectorAll(".review-card");
  const nextBtn = document.querySelector(".review-next");
  const prevBtn = document.querySelector(".review-prev");

  let index = 0;
  const totalSlides = slides.length;

  function updateCarousel() {
    track.style.transform = `translateX(-${index * 100}%)`;
  }

  function nextSlide() {
    index = (index + 1) % totalSlides;
    updateCarousel();
  }

  function prevSlide() {
    index = (index - 1 + totalSlides) % totalSlides;
    updateCarousel();
  }

  nextBtn.addEventListener("click", nextSlide);
  prevBtn.addEventListener("click", prevSlide);

  // Auto Slide
  let autoSlide = setInterval(nextSlide, 10000);

  // Stop auto slide on hover (Desktop UX improvement)
  track.addEventListener("mouseenter", () => clearInterval(autoSlide));
  track.addEventListener("mouseleave", () => {
    autoSlide = setInterval(nextSlide, 10000);
  });

  // Reset on window resize (stabilisiert bei Orientation Change)
  window.addEventListener("resize", () => {
    updateCarousel();
  });
});
