<!DOCTYPE html>
<html lang="de">

<head>
    <?php include_once __DIR__ . '/../helpers/meta_loader.php'; ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">

    <title><?= htmlspecialchars($title ?? 'Bären-Crew Umzüge') ?></title>


    <?php include_once __DIR__ . '/../helpers/styles_loader.php'; ?>
    <link rel="icon" href="/favicon.ico">
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
        <section class="">
            <?php include_once __DIR__ . '/../partials/threeD_hero_cards.php'; ?>
        </section>

        <!-- CHECKBOARD_MAIN-->
        <?php include_once __DIR__ . '/../partials/checkboard_main.php'; ?>

        <!-- WARUM WIR -->
        <?php include_once __DIR__ . '/../partials/mission.php'; ?>

        <!-- BEWERTUNGEN -->
        <?php include_once __DIR__ . '/../partials/reviews.php'; ?>

        <!-- ÜBER UNS -->
        <?php include_once __DIR__ . '/../partials/ueber_uns.php'; ?>

        <!-- CHECKBOARD_SECONDARY -->
        <?php include_once __DIR__ . '/../partials/checkboard_secondary.php'; ?>

        <!-- UNSERE LEISTUNGEN -->
        <?php include_once __DIR__ . '/../partials/leistungen.php'; ?>

        <!-- ABLAUF -->
        <?php include_once __DIR__ . '/../partials/ablauf.php'; ?>



        <!-- CONTACT -->
        <section class="app-section section-hero" id="section-hero">
            <h2 class="heading-lg-sub">Wir sind für Sie da</h2>
            <div class="container hero-grid">


                <!-- Form Start-->
                <?php include_once __DIR__ . '/../partials/contact_form_simple.php'; ?>
                <!-- Form End -->
                <?php include_once __DIR__ . '/../partials/contact_bottom.php'; ?>
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