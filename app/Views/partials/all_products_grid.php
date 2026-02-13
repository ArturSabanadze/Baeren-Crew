<?php
$products = $allProducts ?? []; // reuse array from controller
?>

<div class="main-container">
    <div class="product-grid" id="productGrid">
        <?php if (empty($products)): ?>
            <p>Loading...</p>
        <?php else: ?>
            <?php foreach ($products as $p): ?>
                <?= generateCard($p, 100, 'Add to Cart', 'Add to Wishlist') ?>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>
