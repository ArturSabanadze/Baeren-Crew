
document.addEventListener("DOMContentLoaded", function() {
    const track = document.querySelector(".review-track");
    const slides = document.querySelectorAll(".review-card");
    const nextBtn = document.querySelector(".review-next");
    const prevBtn = document.querySelector(".review-prev");

    let index = 0;

    function updateCarousel() {
        track.style.transform = `translateX(-${index * 100}%)`;
    }

    nextBtn.addEventListener("click", () => {
        index = (index + 1) % slides.length;
        updateCarousel();
    });

    prevBtn.addEventListener("click", () => {
        index = (index - 1 + slides.length) % slides.length;
        updateCarousel();
    });

    // Optional Auto Slide
    setInterval(() => {
        index = (index + 1) % slides.length;
        updateCarousel();
    }, 6000);
});