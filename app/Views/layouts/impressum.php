<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">

    <title><?= htmlspecialchars($title ?? 'My App') ?></title>
    <?php include_once __DIR__ . '/../helpers/meta_loader.php'; ?>
    <?php include_once __DIR__ . '/../helpers/styles_loader.php'; ?>
    <?php include_once __DIR__ . '/../helpers/scripts_loader.php'; ?>
    <script> const env = <?= json_encode($env) ?>;</script>
</head>

<body class="app">

    <header class="app-header" id="appHeader">
        <?php include_once __DIR__ . '/../partials/navigationbar-home.php'; ?>
        <section class="mobile-nav-section">
            <?php include_once __DIR__ . '/../partials/mobile_menu.php'; ?>
        </section>
    </header>


    <main class="app-main">

        <section class="app-section impressum-container">
            <div class="app-section-distancer"></div>
            <div class="container impressum-container">
                <h1>Impressum</h1>
                <h2>Angaben gemäß § 5 Telemediengesetz (TMG)</h2>
                <p>
                    <strong>BÄREN-CREW</strong><br>
                    Inhaber: Pogorelov Alexander<br>
                    Rechtsform: Einzelunternehmen <br>
                    Geschäftsanschrift:<br>
                    Isenstraße 15 <br>
                    84562 Mettenheim <br>
                    Deutschland
                </p>
                <h3>Vertreten durch</h3>
                <p>
                    Pogorelov Alexander
                </p>
                <h3>Kontakt</h3>
                <p>
                    Telefon: +49 (0155) 61231466<br>
                    E-Mail: support@baeren-crew.de<br>
                    Website: https://www.baeren-crew.de
                </p>
                <h3>Umsatzsteuer</h3>
                <p>
                    Umsatzsteuer-Identifikationsnummer gemäß § 27a UStG:<br>
                    DE359734620
                </p>
                <h2>Angaben gemäß § 2 DL-InfoV</h2>
                <p>
                    Für unsere Dienstleistungen gelten die jeweils gültigen Allgemeinen Geschäftsbedingungen (AGB).
                    Diese sind unter folgendem Link abrufbar:
                    <a href="index.php?page=agb">AGB</a>.
                </p>
                <p>
                    Es gelten die gesetzlichen Bestimmungen des Handelsgesetzbuches (HGB),
                    insbesondere die Haftungsvorschriften für Frachtführer gemäß §§ 407 ff. HGB.
                </p>
                <h2>Haftungshinweis für Umzugsleistungen</h2>
                <p>
                    Die Haftung des Unternehmens richtet sich nach den gesetzlichen Vorschriften
                    des Handelsgesetzbuches (HGB). Die Haftung für Verlust oder Beschädigung des Umzugsgutes
                    ist gemäß § 431 HGB auf 620 EUR je Kubikmeter Laderaum begrenzt,
                    soweit keine gesonderte Transportversicherung vereinbart wurde.
                </p>
                <p>
                    Wertvolle oder besonders schadensanfällige Gegenstände
                    (z.B. Schmuck, Bargeld, Dokumente, Datenträger)
                    sind vom Auftraggeber gesondert zu deklarieren.
                </p>
                <h2>Datenschutzerklärung gemäß Art. 13, 14 DSGVO</h2>
                <h3>1. Verantwortlicher</h3>
                <p>
                    Verantwortlicher im Sinne der Datenschutz-Grundverordnung (DSGVO):<br>
                    BÄREN-CREW<br>
                    Isenstraße 15<br>
                    84562 Mettenheim<br>
                    E-Mail: support@baeren-crew.de
                </p>
                <h3>2. Erhebung und Verarbeitung personenbezogener Daten</h3>
                <p>
                    Personenbezogene Daten werden nur erhoben, soweit dies zur Durchführung
                    von Umzugs- und Transportleistungen, zur Angebotserstellung,
                    zur Vertragsabwicklung sowie zur Erfüllung gesetzlicher Verpflichtungen erforderlich ist.
                </p>
                <h3>3. Rechtsgrundlagen</h3>
                <ul>
                    <li>Art. 6 Abs. 1 lit. b DSGVO (Vertragserfüllung)</li>
                    <li>Art. 6 Abs. 1 lit. c DSGVO (rechtliche Verpflichtung)</li>
                    <li>Art. 6 Abs. 1 lit. f DSGVO (berechtigtes Interesse)</li>
                    <li>Art. 6 Abs. 1 lit. a DSGVO (Einwilligung)</li>
                </ul>
                <h3>4. Weitergabe von Daten</h3>
                <p>
                    Eine Weitergabe personenbezogener Daten erfolgt ausschließlich
                    an Subunternehmer, Versicherungen oder Dienstleister,
                    soweit dies zur Vertragserfüllung erforderlich ist.
                </p>
                <h3>5. Speicherdauer</h3>
                <p>
                    Daten werden gemäß den gesetzlichen Aufbewahrungsfristen
                    (insbesondere Handels- und Steuerrecht) gespeichert
                    und anschließend gelöscht.
                </p>
                <h3>6. Betroffenenrechte</h3>
                <p>
                    Sie haben das Recht auf Auskunft, Berichtigung, Löschung,
                    Einschränkung der Verarbeitung, Datenübertragbarkeit
                    sowie Widerspruch gegen die Verarbeitung.
                </p>
                <p>
                    Beschwerderecht bei der zuständigen Datenschutzaufsichtsbehörde.
                </p>
                <h2>Streitbeilegung (§ 36 VSBG)</h2>
                <p>
                    Wir sind weder verpflichtet noch bereit,
                    an einem Streitbeilegungsverfahren vor einer Verbraucherschlichtungsstelle teilzunehmen.
                </p>
                <h2>Haftungsausschluss</h2>
                <h3>Haftung für Inhalte</h3>
                <p>
                    Als Diensteanbieter sind wir gemäß § 7 Abs.1 TMG für eigene Inhalte verantwortlich.
                    Eine Haftung für fremde Inhalte gemäß §§ 8-10 TMG besteht nur
                    im Rahmen der gesetzlichen Bestimmungen.
                </p>
                <h3>Haftung für Links</h3>
                <p>
                    Für Inhalte externer Websites übernehmen wir keine Haftung.
                </p>
                <h3>Urheberrecht</h3>
                <p>
                    Die durch den Betreiber erstellten Inhalte unterliegen dem deutschen Urheberrecht.
                </p>
                <h2>Verantwortlich für den Inhalt nach § 55 Abs. 2 RStV</h2>
                <p>
                    Pogorelov Alexander<br>
                    Isenstraße 15<br>
                    84562 Mettenheim
                </p>
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

</html>