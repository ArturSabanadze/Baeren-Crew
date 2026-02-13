document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".product-card").forEach(card => {
        card.addEventListener("click", function () {
            const productId = this.dataset.productId;
            window.location.href = `index.php?page=single-product&pid=${productId}`;
        });
    });
});
