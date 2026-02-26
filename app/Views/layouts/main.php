<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once __DIR__ . '/../helpers/meta_loader.php'; ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">

    <title><?= htmlspecialchars($title ?? 'Bären-Crew Umzüge') ?></title>


    <?php include_once __DIR__ . '/../helpers/styles_loader.php'; ?>
    <link rel="icon" href="/favicon.ico">
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
        <section class="app-section section-hero" id="section-hero">
            <div class="container hero-grid">
                <!-- Main Hero Carousel start-->
                <div class="hero-carousel">
                    <div class="hero-main">
                        <img src="<?= $env['DIR_PATH'] ?>/assets/images/website_dummy_img/hero1.webp" alt="Umzugsteam"
                            class="hero-image active" id="hero-main-image">
                    </div>

                    <!-- Thumbnail Carousel -->
                    <div class="hero-thumbnails">
                        <button type="button" class="carousel-btn-prev">Prev</button>
                        <div class="thumbnails-wrapper">
                            <img src="<?= $env['DIR_PATH'] ?>/assets/images/website_dummy_img/hero1.webp"
                                alt="Umzugsteam" class="thumbnail active">
                            <img src="<?= $env['DIR_PATH'] ?>/assets/images/website_dummy_img/hero2.webp"
                                alt="Umzugsteam" class="thumbnail">
                            <img src="<?= $env['DIR_PATH'] ?>/assets/images/website_dummy_img/hero3.webp"
                                alt="Umzugsteam" class="thumbnail">
                            <img src="<?= $env['DIR_PATH'] ?>/assets/images/website_dummy_img/hero4.webp"
                                alt="Umzugsteam" class="thumbnail">
                            <img src="<?= $env['DIR_PATH'] ?>/assets/images/website_dummy_img/hero5.webp"
                                alt="Umzugsteam" class="thumbnail">
                            <img src="<?= $env['DIR_PATH'] ?>/assets/images/website_dummy_img/hero6.webp"
                                alt="Umzugsteam" class="thumbnail">
                        </div>
                        <button type="button" class="carousel-btn-next">Next</button>
                    </div>
                </div>
                <!-- Main Hero Carousel end-->

                <!-- Form Start-->
                <?php include_once __DIR__ . '/../partials/contact_form.php'; ?>
                <!-- Form End -->

            </div>
            <div class="hero-checkboard">
                <div class="check-item">
                    <span><img src="<?= $env['DIR_PATH'] ?>/assets/icons/checkbox.webp" alt="Unkompliziert" /></span>
                    <p>Unkompliziert</p>
                </div>
                <div class="check-item">
                    <span><img src="<?= $env['DIR_PATH'] ?>/assets/icons/checkbox.webp" alt="Zuverlässig" /></span>
                    <p>Zuverlässig</p>
                </div>
                <div class="check-item">
                    <span><img src="<?= $env['DIR_PATH'] ?>/assets/icons/checkbox.webp" alt="Engagiert" /></span>
                    <p>Engagiert</p>
                </div>

            </div>
        </section>

        <!-- PACKAGES -->
        <?php include_once __DIR__ . '/../partials/packages.php'; ?>

        <!-- SERVICES -->
        <section class="app-section section-services" id="section-services">
            <div class="container section-grid">

                <div class="section-content">
                    <h2 class="heading-lg">Unsere Leistungen</h2>

                    <p class="text-base">
                        Wir bieten professionelle Lösungen für Privat und Geschäftskunden.
                    </p>

                    <ul class="benefits-list">
                        <li>✔️ Umzüge</li>
                        <li>✔️ Entrümpelungen</li>
                        <li>✔️ Kleintransporte</li>
                        <li>✔️ Hausmeisterservice</li>
                        <li>✔️ Allroundservice</li>
                    </ul>
                </div>

                <div class="section-media">
                    <img src="<?= $env['DIR_PATH'] ?>/assets/images/website_dummy_img/hero2.webp" alt="Umzugsteam"
                        class="media-image">
                </div>

            </div>
        </section>

        <!-- PRICING -->
        <section class="app-section section-pricing" id="section-pricing">
            <div class="container section-grid">

                <div class="section-content section-center">
                    <h2 class="heading-lg">Transparente & faire Preise</h2>

                    <p class="text-base">
                        Wir stehen für klare Absprachen ohne versteckte Kosten.
                        Damit Sie volle Planungssicherheit haben, erstellen wir Ihr Angebot
                        erst nach einer persönlichen Objektbesichtigung.

                        So können wir alle Gegenstände erfassen, die Lage bewerten
                        und den tatsächlichen Aufwand realistisch einschätzen.
                        Nur so erhalten Sie ein faires und exakt kalkuliertes Angebot.
                    </p>

                    <p class="text-base">
                        Nach unserer Besichtigung erhalten Sie ein verbindliches Angebot.

                        Was wir vereinbaren, gilt.
                        Keine nachträglichen Preisänderungen –
                        keine Überraschungen am Umzugstag.
                    </p>

                    <p class="text-base">
                        Verlassen Sie sich auf Handschlagqualität und Transparenz.
                    </p>
                </div>



            </div>
        </section>

        <!-- TEAM -->
        <section class="app-section section-team" id="team">
            <div class="container section-grid">
                <div class="section-content section-center">
                    <h2 class="heading-lg">Unser Team</h2>

                    <p class="text-base">
                        Erfahrung, Verlässlichkeit und echte Handschlagqualität –
                        dafür steht unser Team jeden Tag.
                    </p>

                    <div class="team-grid">
                        <div class="team-member">
                            <img src="<?= $env['DIR_PATH'] ?>/assets/images/Team/test_user.webp" alt="Geschäftsführer">
                            <p>Alexander Pogorelov</p>
                            <span>Geschäftsführer</span>
                        </div>

                        <div class="team-member">
                            <img src="<?= $env['DIR_PATH'] ?>/assets/images/Team/test_user2.webp"
                                alt="Head of Management">
                            <p>Anna Müller</p>
                            <span>Management</span>
                        </div>

                        <div class="team-member">
                            <img src="<?= $env['DIR_PATH'] ?>/assets/images/Team/test_user.webp" alt="Teamleiter">
                            <p>David Lauren</p>
                            <span>Teamleiter Umzug</span>
                        </div>

                        <div class="team-member">
                            <img src="<?= $env['DIR_PATH'] ?>/assets/images/Team/test_user1.webp" alt="Disposition">
                            <p>Peter Wichowiz</p>
                            <span>Disposition & Planung</span>
                        </div>
                    </div>

                </div>

            </div>
        </section>

        <!-- MISSION -->
        <section class="app-section section-mission" id="mission">
            <div class="container section-grid">

                <div class="section-content section-center">
                    <h2 class="heading-lg">Unsere Mission</h2>

                    <p class="text-base mission-text">
                        Ein Umzug ist mehr als nur der Transport von Möbeln.
                        Es ist ein neuer Lebensabschnitt. Unsere Mission ist es,
                        diesen Schritt für Sie so stressfrei, sicher und transparent
                        wie möglich zu gestalten.
                    </p>

                    <p class="text-base mission-text">
                        Mit klarer Kommunikation, fairen Preisen und einem
                        eingespielten Team sorgen wir dafür,
                        dass Sie sich vom ersten Gespräch bis zum letzten Karton
                        gut aufgehoben fühlen.
                    </p>

                </div>

            </div>
        </section>

        <!-- BEWERTUNGEN -->
        <?php include_once __DIR__ . '/../partials/reviews.php'; ?>

        <!-- CONTACT -->
        <section class="app-section section-contact" id="section-contact-wrapper">
            <div class="container section-center" id="section-contact">
                <h2 class="heading-lg">Kontaktieren Sie uns</h2>
                <p class="text-base">
                    Wir melden uns schnellstmöglich bei Ihnen.
                </p>

                <div class="contact-option">
                    <img src="/assets/icons/wapp.webp" alt="whatsapp">
                    <?php
                    $phone = "+4915561231466";
                    $message = urlencode("Hallo, ich brauche Unterstützung bei meinem Umzug. Können Sie mir bitte weitere Informationen zu Ihren Dienstleistungen und Preisen geben? Vielen Dank!");
                    $link = "https://wa.me/$phone?text=$message";
                    echo "<a href='$link' target='_blank'>Chat on WhatsApp</a>";
                    ?>
                </div>

                <div class="contact-option">
                    <img src="/assets/icons/email.webp" alt="email">
                    <a href="mailto:kontakt@baeren-crew.de">support@baeren-crew.de</a>
                </div>


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
</body>
<?php include_once __DIR__ . '/../helpers/scripts_loader.php'; ?>

</html>