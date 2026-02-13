document.addEventListener('DOMContentLoaded', () => {
    const productGrid = document.getElementById('productGrid');

    // Clear loading text
    productGrid.innerHTML = '';

    fetch('api_communication/products_api.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: new URLSearchParams({ action: 'fetch_all_products' })
    })
    .then(res => res.json())
    .then(products => {
        if (!products.length) {
            productGrid.innerHTML = '<p>No products available at the moment.</p>';
            return;
        }

        products.forEach(p => {

            const excerpt = p.description.length > 100
                ? p.description.substring(0, 100) + '...'
                : p.description;

            const status = p.status === 'active' ? 'Available' : 'Unavailable';

            const card = document.createElement('div');
            card.classList.add('product-card');

            card.innerHTML = `
                <img src="${p.image_url || ''}" alt="product thumbnail">
                <div class="product-info">
                    <h3 class="product-title">${p.title}</h3>
                    <p class="product-desc">${excerpt}</p>
                    <div class="product-meta">
                        <span>€ ${Number(p.price).toFixed(2)}</span>
                        <span class="product-status">${status}</span>
                    </div>
                    <div class ="add-to-cart-container">
                        <button class="add-to-cart-btn" data-product-id="${p.id}">Add to Cart</button>  
                    </div>
            `;
            productGrid.appendChild(card);
        });
    })
    .catch(err => {
        console.error('Failed to fetch products:', err);
        productGrid.innerHTML = '<p>Error loading products. Please try again later.</p>';
    });
});