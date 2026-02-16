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
    <nav class="nav">
        <div class="nav__logo">
            <a href="#section-hero">
                <img src="<?= $env['DIR_PATH'] ?>assets/images/Logo/Logo.png" alt="Logo">
            </a>
        </div>

        <div class="nav__links">
            <a href="#section-services">Leistungen</a>
            <a href="#section-pricing">Preise</a>

            <div class="nav__dropdown">
                <button class="nav__dropdown-btn">Über Uns</button>
                <div class="nav__dropdown-menu">
                    <a href="#team">Team</a>
                    <a href="#mission">Mission</a>
                    <a href="#reviews">Bewertungen</a>
                </div>
            </div>

            <a href="?page=jobs">Karriere</a>
            <a href="#section-contact">Kontakt</a>
        </div>
    </nav>
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
                <input type="text" name="from_address" placeholder="Auszugsadresse" class="form-input" required>
                <input type="text" name="to_address" placeholder="Einzugsadresse" class="form-input" required>
                <input type="date" name="move_date" class="form-input" required>
                <input type="email" name="email" placeholder="E-Mail" class="form-input" required>
                <input type="tel" name="phone" placeholder="Telefonnummer" class="form-input" required>
                <input type="file" name="files[]" class="form-input" multiple>
                <button type="submit" class="btn btn-primary btn-full">
                    Kostenloses Angebot
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
                <h2 class="heading-lg">Transparente Preise</h2>

                <p class="text-base">
                    Keine versteckten Kosten. Individuelles Angebot basierend auf Ihrem Bedarf.
                </p>
            </div>

            <div class="section-media">
                <div class="pricing-card">
                    <h3>Individuelles Angebot</h3>
                    <p class="text-base">
                        Fordern Sie jetzt ein kostenloses Angebot an.
                    </p>
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

<footer class="app-footer" id="appFooter">
    <div class="container footer-grid">

        <div>
            <p>© <?= date('Y') ?> Bären Crew</p>
        </div>

        <div class="footer-links">
            <a href="?page=terms">AGB</a>
            <a href="?page=impressum">Impressum</a>
            <a href="?page=dsgvo">Datenschutz</a>
        </div>

    </div>
</footer>

</body>
</html>
