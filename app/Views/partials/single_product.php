<!-- <?php var_dump($attributes); ?> -->
<script>
    let productDetails = <?php echo json_encode($productDetails); ?>;
</script>
<section class="single-product-container"> <!-- global container for of the page. [child = row layout, width: 100%, height: min 80dvh max 100%] -->
    <div class="sp-hd-banner"></div> <!-- banner or Ad holder -->
    <div class="sp-hd-category-bar"></div> <!-- category bar holder -->
    <div class="sp-mn-prd-container"> <!-- main product container [child = column layout] -->
        <div class="sp-mn-prd-container-lft-column"> <!-- main product container left column [child = row layout] -->
            <div class="sp-mn-prd-img-container"> <!-- product image [child = column layout] -->
                <div class="sp-mn-prd-img-column1"><!-- product image list  -->
                    <img src="<?php echo htmlspecialchars($productDetails['image_url'] ?? ''); ?>" alt="<?php echo htmlspecialchars($productDetails['title'] ?? ''); ?>">
                    <img src="<?php echo htmlspecialchars($productDetails['image_url'] ?? ''); ?>" alt="<?php echo htmlspecialchars($productDetails['title'] ?? ''); ?>">
                    <img src="<?php echo htmlspecialchars($productDetails['image_url'] ?? ''); ?>" alt="<?php echo htmlspecialchars($productDetails['title'] ?? ''); ?>">
                    <img src="<?php echo htmlspecialchars($productDetails['image_url'] ?? ''); ?>" alt="<?php echo htmlspecialchars($productDetails['title'] ?? ''); ?>">
                </div> 
                <div class="sp-mn-prd-img-column2"> <!-- product image preview  -->
                    <img src="<?php echo htmlspecialchars($productDetails['image_url'] ?? ''); ?>" alt="<?php echo htmlspecialchars($productDetails['title'] ?? ''); ?>">
                </div> 
            </div>      
        </div>
        <div class="sp-mn-prd-container-ctr-column"> <!-- main product container center column [child = row layout] -->
            <div class="sp-mn-prd-info-row1"><?php echo htmlspecialchars($productDetails['title'] ?? ''); ?></div> <!-- product title [child = row layout] -->
            <div class="sp-mn-prd-info-row2"><?php echo htmlspecialchars($productDetails['subtitle'] ?? ''); ?></div> <!-- product subtitle [child = row layout] -->
                                                    
            <div class="sp-mn-prd-info-row3"><?php echo htmlspecialchars($productDetails['value'] ?? ''); ?></div> <!-- product variations [child = grid layout] -->
            
            <div class="sp-mn-prd-info-row4">Seller: Uniq Co. & SaaR</div> <!-- seller information container [child = column layout] -->
            <div class="sp-mn-prd-info-row5"><!-- product attribute table [child = row layout] -->
                Tech Specs: <br>
                <hr>
                <?php foreach ($attributes as $name => $attribute) {
                    echo htmlspecialchars($name . ': ' . implode(', ', $attribute['values'])) . '<br>';
                }  ?> 
            </div> 
            <hr>
            <div class="sp-mn-prd-info-row6"><?php echo htmlspecialchars($productDetails['description'] ?? ''); ?></div> <!-- product description / details [child = column layout] -->
        </div> 
        <div class="sp-mn-prd-container-rgt-column"> <!-- main product container right column [child = row layout] -->
            <div class="sp-mn-prd-cart-container row1"></div> <!-- product price --> 
            <div class="sp-mn-prd-cart-container row2"></div> <!-- product price info --> 
            <div class="sp-mn-prd-cart-container row3"></div> <!-- product location info --> 
            <div class="sp-mn-prd-cart-container row4"></div> <!-- product shipping info -->
            <div class="sp-mn-prd-cart-container row5"></div> <!-- payment options info --> 
            <div class="sp-mn-prd-cart-container row6"></div> <!-- quantity user selection as number input field --> 
            <div class="sp-mn-prd-cart-container row7"></div> <!-- add to cart button -->
        </div> 
    </div>
    <hr>
    <div class="sp-btm-rel-prd-carousel"></div> <!-- first bottom container for related products carousel -->
    <div class="sp-btm-samebrand-prd-carousel"></div> <!-- second bottom container for same brand products carousel -->
    <hr>
    <div class="sp-btm-prd-info-container"></div> <!-- third bottom container for product info -->
    <div class="sp-btm-prd-rating-container"></div> <!-- fourth bottom container for product rating and comments -->
</section>