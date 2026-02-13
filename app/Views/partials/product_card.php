<?php

function generateCard($product, $excerptlength, $label1, $label2) :string
{
    $excerpt = strlen($product['description']) > $excerptlength ? substr($product['description'], 0, $excerptlength) . '...' : $product['description'];
    $status = $product['status'] === 'active' ? 'Available' : 'Unavailable';
    return "
    <div class=\"product-card\" data-product-id=\"{$product['id']}\" >
        <img src=\"{$product['image_url']}\" alt=\"product thumbnail\">
        <div class=\"product-info\">
            <h3 class=\"product-title\">{$product['title']}</h3>
            <p class=\"product-desc\">$excerpt</p>
            <div class=\"product-meta\">
                <span>" . number_format($product['price'], 2) . " €</span>
                <span class=\"product-status\">$status</span>
            </div>
            <div class=\"product-actions\">
                <div class=\"add-to-cart-container\">
                    <button class=\"add-to-cart-btn\" data-product-id=\"{$product['id']}\">$label1</button>
                </div>
                <div class=\"add-to-wishlist-container\" data-product-id=\"{$product['id']}\">
                </div>
            </div>
        </div>
    </div>
    ";
}

