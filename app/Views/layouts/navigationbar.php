<?php
$username = $_SESSION['username'] ?? null;
$user_name = $_SESSION['name'] ?? $username;
$btn_username = $user_name ? ucfirst($user_name) : ($username ? ucfirst($username) : 'Account');
$image_Profile = '';
if (isset($_SESSION['profile_img_url']) && !empty($_SESSION['profile_img_url'])) {
    $image_Profile = $_SESSION['profile_img_url'];
} else {
    $image_Profile = 'uploads/profile_images/test_user.jpg';
}
?>

<div class="navbarContainerWrapper">
    
    <nav class="main-navbar">

        <!-- Logo -->
        <div class="logo">
            <a href="index.php?page=home" id="logo-container">
                <img src="/uploads/Logo/Logo2.png" alt="Logo">
            </a>
        </div>

        <!-- Navigation Links -->
        <div class="links">
                <a href="#leistungen">Leistungen</a>
                <a href="#preise">Preise</a>
                
                <div class="nav-dropdown">
                    <a class="nav-dropdown-btn">Über Uns</a>
                    <div class="nav-dropdown-menu">
                        <a href="#team">Team</a>
                        <a href="#mission">Mission</a>
                        <a href="#history">Bewertungen</a>
                    </div>
                </div>

                <a href="?page=jobs">Karriere</a>
                <a href="#kontakt">Kontakt</a>  
        </div>

        <div class="navbar-btn-right">
            <?php if(!$username): ?>
                <a href="?page=login" class="login-btn">Einloggen</a>
            <?php else: ?>
                <div class="group-1">
                    <?php
                    echo dropdown_menu($btn_username, [
                        'Profile' => '?page=my-account',
                        'Orders' => 'orders.php',
                        'Settings' => 'settings.php',
                        'Logout' => '?page=logout'
                    ]);
                    ?>
                    <div class="navbar-profile-image">
                        <img src="<?= htmlspecialchars($image_Profile) ?>" alt="Profile Image">
                    </div>
                </div>
            <?php endif; ?>
            <div class="vertical-divider"></div>
            <?php include __DIR__ . '/../partials/cart-icon.php'; ?>
        </div>

        <!-- Hamburger -->
        <button class="hamburger" id="hamburger-btn" aria-label="Menü öffnen">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </nav>

    <!-- Mobile Menu -->
        <div class="mobile-menu" id="mobile-menu">
            <a href="#leistungen">Leistungen</a>
            <a href="#preise">Preise</a>
            <div class="mobile-dropdown">
            <a class="mobile-dropdown-btn">Über Uns</a>
            <div class="mobile-dropdown-menu">
                <a href="#team">Team</a>
                <a href="#mission">Mission</a>
                <a href="#history">Bewertungen</a>
            </div>
            </div>
            <a href="#jobs">Karriere</a>
            <a href="#kontakt">Kontakt</a>
        </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {

    const hamburger = document.getElementById("hamburger-btn");
    const mobileMenu = document.getElementById("mobile-menu");

    hamburger.addEventListener("click", function() {
           mobileMenu.classList.toggle("active")
    });

    document.querySelectorAll(".mobile-dropdown-btn").forEach(btn => {
        btn.addEventListener("click", function() {
            this.parentElement.classList.toggle("active");
        });
    });

});
</script>

