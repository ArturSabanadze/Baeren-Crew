function scrollCarousel(carouselId, direction) {
  const carousel = document.getElementById(carouselId);
  const scrollAmount = carousel.clientWidth * 0.8;
  carousel.scrollBy({ left: direction * scrollAmount, behavior: "smooth" });
}

document.addEventListener('DOMContentLoaded', () => {
    const carousel = document.getElementById('productCarousel');
    if (!carousel) return;

    const leftBtn = carousel.parentElement.querySelector('.carousel-btn.left');
    const rightBtn = carousel.parentElement.querySelector('.carousel-btn.right');

    let scrollAmount = 0;

    leftBtn.addEventListener('click', () => {
        carousel.scrollBy({ left: -200, behavior: 'smooth' });
    });

    rightBtn.addEventListener('click', () => {
        carousel.scrollBy({ left: 200, behavior: 'smooth' });
    });
});
