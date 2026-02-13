<?php $carouselProducts = $allProducts ?? []; ?>

<div class="carousel-wrapper">
    <button class="carousel-btn left">&#10094;</button>
    <div class="carousel" id="productCarousel">
        <?php foreach ($carouselProducts as $p): ?>
            <div class="carousel-item">
                <div class="image-wrapper">
                    <img src="<?= htmlspecialchars($p['image_url']) ?>" alt="<?= htmlspecialchars($p['title']) ?>">
                </div>
                <div class="product-info">
                    <span class="product-name"><?= htmlspecialchars($p['title']) ?></span>
                    <span class="product-price"><?= htmlspecialchars($p['price']) ?> €</span>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <button class="carousel-btn right">&#10095;</button>
</div>