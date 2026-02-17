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
        <div>
            <!-- Main Image Preview -->
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

        <!-- Form -->
        <div class="hero-form">
            <form id="quick-request-form" action="anfrage" method="POST" enctype="multipart/form-data" class="form">
                <input type="text" name="from_address" placeholder="Auszugsadresse" class="form-input" autocomplete="street-address" required>
                <input type="text" name="to_address" placeholder="Einzugsadresse" class="form-input" autocomplete="address-line3" required>
                <input type="text" name="move_date" placeholder="Umzugsdatum" class="form-input date-input" onfocus="this.type='date'" onblur="if(!this.value)this.type='text'">
                <input type="email" name="email" placeholder="E-Mail" class="form-input" autocomplete="email" required>
                <input type="tel" name="phone" placeholder="Telefonnummer" class="form-input" autocomplete="tel" required>
                <input type="file" name="files[]" class="form-input" multiple>
                <button type="submit" class="btn btn-primary btn-full">
                    Rückruf anfordern
                </button>
            </form>
        </div>
        </div>
        <div class="hero-checkboard">
            <div class="check-item">
                <span><img src="<?= $env['DIR_PATH'] ?>assets/icons/checkbox.png" alt="Unkompliziert" /></span>
                <p>Unkompliziert</p>
            </div>
            <div class="check-item">
                <span><img src="<?= $env['DIR_PATH'] ?>assets/icons/checkbox.png" alt="Zuverlässig" /></span>
                <p>Zuverlässig</p>
            </div>
            <div class="check-item">
                <span><img src="<?= $env['DIR_PATH'] ?>assets/icons/checkbox.png" alt="Engagiert" /></span>
                <p>Engagiert</p>
            </div>

        </div>
    </section>


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
                        <img src="<?= $env['DIR_PATH'] ?>/assets/images/Team/test_user.jpg" alt="Geschäftsführer">
                        <h4>Max Mustermann</h4>
                        <span>Geschäftsführer</span>
                    </div>

                    <div class="team-member">
                        <img src="<?= $env['DIR_PATH'] ?>/assets/images/Team/test_user.jpg" alt="Head of Management">
                        <h4>Anna Beispiel</h4>
                        <span>Head of Management</span>
                    </div>

                    <div class="team-member">
                        <img src="<?= $env['DIR_PATH'] ?>/assets/images/Team/test_user.jpg" alt="Teamleiter">
                        <h4>David Muster</h4>
                        <span>Teamleiter Umzug</span>
                    </div>

                    <div class="team-member">
                        <img src="<?= $env['DIR_PATH'] ?>/assets/images/Team/test_user.jpg" alt="Disposition">
                        <h4>Sophie Test</h4>
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

</body>
</html>
