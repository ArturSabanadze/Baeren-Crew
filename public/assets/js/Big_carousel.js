document.addEventListener("DOMContentLoaded", () => {
    const mainImage = document.getElementById("hero-main-image");
    const thumbnails = document.querySelectorAll(".thumbnail");
    const prevBtn = document.querySelector(".carousel-btn-prev");
    const nextBtn = document.querySelector(".carousel-btn-next");
    const wrapper = document.querySelector(".thumbnails-wrapper");

    let currentIndex = 0;

    function showImage(index) {
        // Update main image
        mainImage.src = thumbnails[index].src;
        mainImage.alt = thumbnails[index].alt;

        // Update active thumbnail
        thumbnails.forEach((thumb, i) => {
            thumb.classList.toggle("active", i === index);
        });

        currentIndex = index;
    }

    // Click on thumbnails
    thumbnails.forEach((thumb, index) => {
        thumb.addEventListener("click", () => showImage(index));
    });

    // Carousel buttons
    nextBtn.addEventListener("click", (e) => {
        e.preventDefault();
        scrollNext();
    });

    prevBtn.addEventListener("click", (e) => {
        e.preventDefault();
        scrollPrev();
    });

    function scrollNext() {
        let nextIndex = (currentIndex + 1) % thumbnails.length;
        showImage(nextIndex);
        wrapper.scrollBy({ left: thumbnails[nextIndex].offsetWidth + 8, behavior: "smooth" });
    }

    function scrollPrev() {
        let prevIndex = (currentIndex - 1 + thumbnails.length) % thumbnails.length;
        showImage(prevIndex);
        wrapper.scrollBy({ left: -(thumbnails[prevIndex].offsetWidth + 8), behavior: "smooth" });
    }

    // Auto-scroll every 3 seconds
    setInterval(scrollNext, 3000);

    // Initialize
    showImage(currentIndex);
});
