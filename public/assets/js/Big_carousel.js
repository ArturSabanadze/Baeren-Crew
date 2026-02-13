document.addEventListener("DOMContentLoaded", () => {

  const images = [
    { src: "/uploads/website_dummy_img/hero1.png", alt: "Auto Beladung Szene" },
    { src: "/uploads/website_dummy_img/hero2.png", alt: "Umzugszene im Wohnzimmer" },
    { src: "/uploads/website_dummy_img/hero3.png", alt: "Umzugszene auf der Straße" },
    { src: "/uploads/website_dummy_img/hero4.png", alt: "Umzugszene auf der Straße" },
    { src: "/uploads/website_dummy_img/hero5.png", alt: "Umzugszene auf der Straße" },
    { src: "/uploads/website_dummy_img/hero6.png", alt: "Umzugszene auf der Straße" }
  ];

  const mainImage = document.getElementById("carousel-image");
  const thumbnailsContainer = document.querySelector(".carousel-thumbnails");
  const prevBtn = document.querySelector(".carousel-btn.prev");
  const nextBtn = document.querySelector(".carousel-btn.next");

  let currentIndex = 0;
  let interval;

  /* -----------------------------
     Set Main Image and Active Thumbnail
  ----------------------------- */
  function updateCarousel(index) {
    currentIndex = index;

    mainImage.src = images[index].src;
    mainImage.alt = images[index].alt;

    // Update active thumbnail
    document.querySelectorAll(".carousel-thumbnails img").forEach((thumb, i) => {
      thumb.classList.toggle("active", i === index);
    });
  }

 // -----------------------------
// Create Thumbnails Dynamically
// -----------------------------
images.forEach((img, index) => {
  const thumb = document.createElement("img");
  thumb.src = img.src;
  thumb.alt = img.alt;

  if (index === 0) {
    thumb.classList.add("active"); // nur für den ersten Thumbnail
  }

  thumb.addEventListener("click", () => {
    updateCarousel(index);
    resetInterval();
  });

  thumbnailsContainer.appendChild(thumb);
});


  /* -----------------------------
     Navigation Functions
  ----------------------------- */
  function nextSlide() {
    const newIndex = (currentIndex + 1) % images.length;
    updateCarousel(newIndex);
  }

  function prevSlide() {
    const newIndex = (currentIndex - 1 + images.length) % images.length;
    updateCarousel(newIndex);
  }

  nextBtn.addEventListener("click", () => {
    nextSlide();
    resetInterval();
  });

  prevBtn.addEventListener("click", () => {
    prevSlide();
    resetInterval();
  });

  /* -----------------------------
     Auto Slide
  ----------------------------- */
  function startInterval() {
    interval = setInterval(nextSlide, 5000); // 5 Sekunden
  }

  function resetInterval() {
    clearInterval(interval);
    startInterval();
  }

  /* -----------------------------
     Init Carousel
  ----------------------------- */
  updateCarousel(0);
  startInterval();

});
