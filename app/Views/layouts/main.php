<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($title ?? 'My App') ?></title> 
    <?php include_once __DIR__ . '/../helpers/meta_loader.php'; ?>
    <?php include_once __DIR__ . '/../helpers/styles_loader.php'; ?>
    <?php include_once __DIR__ . '/../helpers/scripts_loader.php'; ?>
    <script> const env = <?= json_encode($env) ?>;</script>
</head>

<body class="app">

<header class="app-header" id="appHeader">
    <?php include_once __DIR__ . '/../partials/navigationbar-home.php'; ?>
</header>

<main class="app-main">

    <!-- HERO -->
    <section class="app-section section-hero" id="section-hero">
        <div class="container hero-grid">
            <!-- Main Hero Carousel start-->
            <div class="hero-carousel">
                <div class="hero-main">
                    <img src="<?= $env['DIR_PATH'] ?>/assets/images/website_dummy_img/hero1.webp" alt="Umzugsteam" class="hero-image active" id="hero-main-image">
                </div>

                <!-- Thumbnail Carousel -->
                <div class="hero-thumbnails">
                <button type="button" class="carousel-btn-prev">Prev</button>
                <div class="thumbnails-wrapper">
                    <img src="<?= $env['DIR_PATH'] ?>/assets/images/website_dummy_img/hero1.webp" alt="Umzugsteam" class="thumbnail active">
                    <img src="<?= $env['DIR_PATH'] ?>/assets/images/website_dummy_img/hero2.webp" alt="Umzugsteam" class="thumbnail">
                    <img src="<?= $env['DIR_PATH'] ?>/assets/images/website_dummy_img/hero3.webp" alt="Umzugsteam" class="thumbnail">
                    <img src="<?= $env['DIR_PATH'] ?>/assets/images/website_dummy_img/hero4.webp" alt="Umzugsteam" class="thumbnail">
                    <img src="<?= $env['DIR_PATH'] ?>/assets/images/website_dummy_img/hero5.webp" alt="Umzugsteam" class="thumbnail">
                    <img src="<?= $env['DIR_PATH'] ?>/assets/images/website_dummy_img/hero6.webp" alt="Umzugsteam" class="thumbnail">
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
                <span><img src="<?= $env['DIR_PATH'] ?>assets/icons/checkbox.webp" alt="Unkompliziert" /></span>
                <p>Unkompliziert</p>
            </div>
            <div class="check-item">
                <span><img src="<?= $env['DIR_PATH'] ?>assets/icons/checkbox.webp" alt="Zuverlässig" /></span>
                <p>Zuverlässig</p>
            </div>
            <div class="check-item">
                <span><img src="<?= $env['DIR_PATH'] ?>assets/icons/checkbox.webp" alt="Engagiert" /></span>
                <p>Engagiert</p>
            </div>

        </div>
    </section>

    <hr>
    <!-- SERVICES -->
    <section class="app-section section-services" id="section-services">
        <div class="container section-grid">

            <div class="section-content">
                <h2 class="heading-lg">Unsere Leistungen</h2>

                <p class="text-base">
                    Wir bieten professionelle Lösungen für Privat- und Geschäftskunden.
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
                <img 
                    src="<?= $env['DIR_PATH'] ?>/assets/images/website_dummy_img/hero2.webp"
                    alt="Umzugsteam"
                    class="media-image"
                >
            </div>

        </div>
    </section>
    <hr>
    <!-- PRICING -->
    <section class="app-section section-pricing" id="section-pricing">
        <div class="container section-grid">

            <div class="section-content">
                <h2 class="heading-lg">Transparente & faire Preise</h2>

                <p class="text-base">
                    Wir stehen für klare Absprachen ohne versteckte Kosten. 
                    Damit Sie volle Planungssicherheit haben, erstellen wir Ihr Angebot 
                    erst nach einer persönlichen Objektbesichtigung.
                </p>

                <p class="text-base">
                    So können wir alle Gegenstände erfassen, die Lage bewerten 
                    und den tatsächlichen Aufwand realistisch einschätzen. 
                    Nur so erhalten Sie ein faires und exakt kalkuliertes Angebot.
                </p>
            </div>


            <div class="section-media">
                <div class="pricing-card">
                    <h3>Fixpreis nach Besichtigung</h3>

                    <p class="text-base">
                        Nach unserer Besichtigung erhalten Sie ein verbindliches Angebot.
                    </p>

                    <p class="text-base">
                        Was wir vereinbaren, gilt. 
                        Keine nachträglichen Preisänderungen – 
                        keine Überraschungen am Umzugstag.
                    </p>

                    <p class="text-base">
                        Verlassen Sie sich auf Handschlagqualität und Transparenz.
                    </p>
                </div>
            </div>


        </div>
    </section>
    <hr>
    <!-- TEAM -->
    <section class="app-section section-team" id="team">
        <div class="container section-grid">
            <div class="section-content">
                <h2 class="heading-lg">Unser Team</h2>

                <p class="text-base">
                    Erfahrung, Verlässlichkeit und echte Handschlagqualität –
                    dafür steht unser Team jeden Tag.
                </p>

                <div class="team-grid">
                    <div class="team-member">
                        <img src="<?= $env['DIR_PATH'] ?>/assets/images/Team/test_user.webp" alt="Geschäftsführer">
                        <p>Max Mustermann</p>
                        <span>Geschäftsführer</span>
                    </div>

                    <div class="team-member">
                        <img src="<?= $env['DIR_PATH'] ?>/assets/images/Team/test_user.webp" alt="Head of Management">
                        <p>Anna Beispiel</p>
                        <span>Head of Management</span>
                    </div>

                    <div class="team-member">
                        <img src="<?= $env['DIR_PATH'] ?>/assets/images/Team/test_user.webp" alt="Teamleiter">
                        <p>David Muster</p>
                        <span>Teamleiter Umzug</span>
                    </div>

                    <div class="team-member">
                        <img src="<?= $env['DIR_PATH'] ?>/assets/images/Team/test_user.webp" alt="Disposition">
                        <p>Sophie Test</p>
                        <span>Disposition & Planung</span>
                    </div>
             </div>

         </div>

        </div>
    </section>
    <hr>    
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
    <hr>
    <!-- BEWERTUNGEN -->
    <section class="app-section section-reviews" id="reviews">
        <div class="container section-grid">

            <div class="section-content section-center">
                <h2 class="heading-lg">Kundenbewertungen</h2>

                <div class="review-carousel">
                    <div class="review-track">

                        <div class="review-card">
                            <div class="stars">★★★★★</div>
                            <p>
                                „Absolut professionell! Pünktlich, freundlich und
                                sehr sorgfältig mit unseren Möbeln.“
                            </p>
                            <span>– Familie Schneider</span>
                        </div>

                        <div class="review-card">
                            <div class="stars">★★★★★</div>
                            <p>
                                „Very satisfied with the service! They were punctual, professional, and handled our belongings with great care.“
                            </p>
                            <span>– John Maxwell</span>
                        </div>

                        <div class="review-card">
                            <div class="stars">★★★★★</div>
                            <p>
                                „Faire Preise und keine Überraschungen.
                                Genau wie versprochen.“
                            </p>
                            <span>– Herr Meier</span>
                        </div>

                        <div class="review-card">
                            <div class="stars">★★★★☆</div>
                            <p>
                                „Sehr gut organisiert und zuverlässig.
                                Gerne wieder!“
                            </p>
                            <span>– Frau Becker</span>
                        </div>

                    </div>

                    <div class="review-controls">
                        <button class="review-prev">‹</button>
                        <button class="review-next">›</button>
                    </div>
                </div>

            </div>

        </div>
    </section>
    <hr>
    <!-- CONTACT -->
    <section class="app-section section-contact" id="section-contact">
        <div class="container section-center">
            <h2 class="heading-lg">Kontaktieren Sie uns</h2>

            <p class="text-base">
                Wir melden uns innerhalb von 24 Stunden.
            </p>
        </div>
    </section>

</main>

<?php include_once __DIR__ . '/../partials/footer.php'; ?>
<?php include_once __DIR__ . '/../partials/cookie_banner.php'; ?>
<?php include_once __DIR__ . '/../partials/cookie_modal.php'; ?>
</body>
</html>
