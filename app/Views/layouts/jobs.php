<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <title>
        <?= htmlspecialchars($title ?? 'My App') ?>
    </title>
    <?php include_once __DIR__ . '/../helpers/meta_loader.php'; ?>
    <?php include_once __DIR__ . '/../helpers/styles_loader.php'; ?>

    <link rel="icon" href="/favicon.ico">
    <script> const env = <?= json_encode($env) ?>;</script>
</head>

<body class="app">

    <header class="app-header" id="appHeader">
        <?php include_once __DIR__ . '/../partials/navigationbar-home.php'; ?>
        <section class="mobile-nav-section">
            <?php include_once __DIR__ . '/../partials/mobile_menu.php'; ?>
        </section>
    </header>

    <!-- Wichtig wegen fixed header -->
    <div class="app-header-distancer"></div>

    <main class="app-main">

        <!-- Layout-kompatible Section -->
        <section class="app-section section-jobs" id="job-umzugshelfer">

            <div class="container">

                <div class="job-posting">

                    <!-- Titelbereich -->
                    <header>
                        <h1>Umzugshelfer (m/w/d)</h1>
                        <p class="job-meta">
                            <strong>Standort:</strong> Berlin<br>
                            <strong>Anstellungsart:</strong> Vollzeit / Teilzeit / Minijob<br>
                            <strong>Startdatum:</strong> Ab sofort<br>
                            <strong>Vertragsart:</strong> Unbefristet<br>
                            <strong>Referenznummer:</strong> UMZ-2026-01
                        </p>
                    </header>

                    <!-- Unternehmensbeschreibung -->
                    <article class="company-description">
                        <h2>Über uns</h2>
                        <p>
                            Wir sind eine etablierte Umzugsfirma mit langjähriger Erfahrung im Bereich
                            Privat- und Firmenumzüge. Unser Team steht für Zuverlässigkeit,
                            Professionalität und Kundenzufriedenheit.
                        </p>
                    </article>

                    <!-- Aufgabenbereich -->
                    <article class="job-tasks">
                        <h2>Ihre Aufgaben</h2>
                        <ul>
                            <li>Be- und Entladen von Umzugsfahrzeugen</li>
                            <li>Transport von Möbeln und Umzugsgut</li>
                            <li>Montage und Demontage von Möbeln</li>
                            <li>Verpacken von empfindlichen Gegenständen</li>
                            <li>Kundenkommunikation vor Ort</li>
                        </ul>
                    </article>

                    <!-- Anforderungen -->
                    <article class="job-requirements">
                        <h2>Ihr Profil</h2>
                        <ul>
                            <li>Körperliche Belastbarkeit</li>
                            <li>Zuverlässigkeit und Teamfähigkeit</li>
                            <li>Freundliches Auftreten</li>
                            <li>Führerschein Klasse B (von Vorteil)</li>
                        </ul>
                    </article>

                    <!-- Benefits -->
                    <article class="job-benefits">
                        <h2>Wir bieten</h2>
                        <ul>
                            <li>Leistungsgerechte Bezahlung</li>
                            <li>Flexible Arbeitszeiten</li>
                            <li>Moderne Arbeitsausrüstung</li>
                            <li>Angenehmes Betriebsklima</li>
                        </ul>
                    </article>

                    <!-- Gehaltsangaben -->
                    <article class="job-salary">
                        <h2>Vergütung</h2>
                        <p>
                            Stundenlohn ab 14,50 € (je nach Qualifikation und Erfahrung)
                        </p>
                    </article>

                    <!-- Arbeitszeiten -->
                    <article class="job-working-hours">
                        <h2>Arbeitszeiten</h2>
                        <p>
                            Montag bis Freitag, gelegentlich samstags.
                            Arbeitsbeginn in der Regel zwischen 6:00 und 8:00 Uhr.
                        </p>
                    </article>

                    <!-- Bewerbungsinformationen -->
                    <article class="application-info">
                        <h2>Bewerbung</h2>
                        <p>
                            Bitte senden Sie Ihre Bewerbung mit Lebenslauf per E-Mail an:
                            <a href="mailto:bewerbung@baeren-crew.de">bewerbung@baeren-crew.de</a>
                        </p>
                        <p>
                            Ansprechpartner: Alexander Pogorelov<br>
                            Telefon: +49 (0155) 61231466
                        </p>
                        <p>
                            Bewerbungsfrist: 31.12.2026
                        </p>
                    </article>


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