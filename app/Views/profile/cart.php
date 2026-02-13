<?php
$user_id = $_SESSION['user_id'] ?? null;
$cart_id = $_SESSION['cart_id'] ?? null;
if (!$user_id) {
    header("Location: index.php?page=login");
    exit;
}
?>

<section class="cart-page">
  <div class="cart-container">
    <h2 class="cart-title">Shopping Cart</h2>
    <div id="cart-content">
      <p class="cart-empty">Loading cart...</p>
    </div>
  </div>
</section>

<script src="Functions/cart_handler.js"></script>