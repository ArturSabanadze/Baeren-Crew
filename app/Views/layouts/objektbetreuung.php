<!DOCTYPE html>
<html lang="de">

<head>
    <?php include_once __DIR__ . '/../helpers/meta_loader.php'; ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">

    <title>
        <?= htmlspecialchars($title ?? 'Bären-Crew Umzüge') ?>
    </title>


    <?php include_once __DIR__ . '/../helpers/styles_loader.php'; ?>
    <link rel="icon" href="/favicon.ico">
    <link rel="preload" as="image" href="<?= $env['DIR_PATH'] ?>/assets/images/website_dummy_img/h1.webp">
    <link rel="preload" as="image" href="<?= $env['DIR_PATH'] ?>/assets/images/website_dummy_img/h2.webp">
    <link rel="preload" as="image" href="<?= $env['DIR_PATH'] ?>/assets/images/website_dummy_img/h3.webp">
    <link rel="preload" as="image" href="<?= $env['DIR_PATH'] ?>/assets/images/website_dummy_img/h4.webp">
    <link rel="preload" as="image" href="<?= $env['DIR_PATH'] ?>/assets/images/website_dummy_img/h5.webp">
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=<?= $env['GOOGLE_MAPS_API_KEY'] ?>&libraries=places&v=beta">
        </script>
</head>

<body class="app">

    <header class="app-header" id="appHeader">
        <?php include_once __DIR__ . '/../partials/navigationbar-home.php'; ?>
        <section class="mobile-nav-section">
            <?php include_once __DIR__ . '/../partials/mobile_menu.php'; ?>
        </section>
    </header>
    <div class="app-header-distancer"></div>
    </div>

    <main class="app-main">
        <!-- HERO -->
        <section class="hero-section-main">
            <div class="hero-flex">
                <?php include_once __DIR__ . '/../partials/hero_objektbetreuung.php'; ?>
            </div>
        </section>
        <!-- CALCULATOR -->
        <section class="section-calculator" id="rechner">
            <h2 class="heading-lg">Berechnen Sie Ihr Angebot</h2>
            <div class="offer-calculator-wrapper" id="rechner-cnt">
                <!-- Offer Calculator Start -->
                <?php include_once __DIR__ . '/../partials/calculation_form.php'; ?>
                <!-- Offer Calculator End -->
            </div>
        </section>
        <!-- PACKAGES & PRICING -->
        <section class="app-section section-services" id="packages">
            <!-- PACKAGES & Pricing Start -->
            <?php include_once __DIR__ . '/../partials/packages.php'; ?>
            <!-- PACKAGES & Pricing End -->
        </section>
        <!-- BEWERTUNGEN -->
        <?php include_once __DIR__ . '/../partials/reviews.php'; ?>


        <!-- CONTACT -->
        <section class="app-section section-hero" id="section-hero">
            <h2 class="heading-lg-sub">Wir sind für Sie da</h2>
            <div class="container hero-grid">
                <?php include_once __DIR__ . '/../partials/contact_bottom.php'; ?>

                <!-- Form Start-->
                <?php include_once __DIR__ . '/../partials/contact_form.php'; ?>
                <!-- Form End -->
            </div>
        </section>

    </main>
    <div class="desktop-footer">
        <?php include_once __DIR__ . '/../partials/footer.php'; ?>
    </div>
    <div class="mobile-footer">
        <?php include_once __DIR__ . '/../partials/footer-mobile.php'; ?>
    </div>
    <?php include_once __DIR__ . '/../partials/cookie_banner.php'; ?>
    <?php include_once __DIR__ . '/../partials/cookie_modal.php'; ?>
    <?php include_once __DIR__ . '/../partials/product_modal.php'; ?>
    <?php include_once __DIR__ . '/../partials/sticky_scroll_element.php'; ?>
    <?php include_once __DIR__ . '/../partials/sidebar_sticky.php'; ?>
    <script>
        function setHeaderOffset() {
            const header = document.getElementById('appHeader');
            const distancer = document.querySelector('.app-header-distancer');

            if (header && distancer) {
                distancer.style.height = header.offsetHeight + 'px';
            }
        }

        window.addEventListener('load', setHeaderOffset);
        window.addEventListener('resize', setHeaderOffset);
    </script>
</body>

<?php include_once __DIR__ . '/../helpers/scripts_loader.php'; ?>

</html>