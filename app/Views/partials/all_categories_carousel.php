<div class="carousel-wrapper">
    <button class="carousel-btn left" onclick="scrollCarousel('categoryCarousel', -1)">&#10094;</button>
    <div class="carousel" id="categoryCarousel"></div>
    <button class="carousel-btn right" onclick="scrollCarousel('categoryCarousel', 1)">&#10095;</button>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const carousel = document.getElementById('categoryCarousel');

        fetch('api_communication/products_api.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: new URLSearchParams({ action: 'fetch_all_categories' })
        })
            .then(res => res.json())
            .then(data => {
                data.forEach(c => {
                    const div = document.createElement('div');
                    div.classList.add('carousel-item');
                    div.innerHTML = `
                <div class="image-wrapper">
                    <img src="${c.image_url}" alt="${c.name}">
                </div>
                <div class="category-info">
                    <span class="category-name">${c.name}</span>
                </div>
            `;
                    carousel.appendChild(div);
                });
            })
            .catch(err => console.error('Failed to fetch products:', err));
    });
</script>