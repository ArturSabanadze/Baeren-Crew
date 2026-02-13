<?php
/* if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['username'])) {
    echo "<p>Please log in to view your orders.</p>";
    return;
} */
?>

<div class="orders-wrapper">
    <h2>Your Orders</h2>
    <div id="orders-container">
        <p>Loading orders...</p>
    </div>
</div>
