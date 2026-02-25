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
        <section class="app-section">
            <div class="container agb-container">

                <h1 class="agb-title">Allgemeine Geschäftsbedingungen (AGB)</h1>
                <p class="agb-meta">für Umzugsleistungen der Bären Crew<br>
                    Vertreten durch: Alexander Progorelov<br>
                    Stand: Februar 2026</p>

                <div class="agb-section">
                    <button class="agb-toggle">§1 Geltungsbereich</button>
                    <div class="agb-content">
                        <p>1. Diese AGB gelten für alle Umzugs-, Transport- und damit verbundenen Dienstleistungen der
                            Bären Crew.</p>
                        <p>2. Sie gelten gegenüber Verbrauchern (§ 13 BGB) sowie Unternehmern (§ 14 BGB).</p>
                        <p>3. Abweichende Bedingungen des Kunden werden nicht Vertragsbestandteil, es sei denn, Bären
                            Crew stimmt ausdrücklich schriftlich zu.</p>
                    </div>
                </div>
                <div class="agb-section">
                    <button class="agb-toggle">§2 Vertragsschluss</button>
                    <div class="agb-content">
                        <p>1. Angebote sind freibleibend und unverbindlich, sofern nicht ausdrücklich als verbindlich
                            bezeichnet.</p>
                        <p>2. Der Vertrag kommt zustande durch:</p>
                        <ul>
                            <li>schriftliche Auftragsbestätigung,</li>
                            <li>Unterzeichnung des Angebots,</li>
                            <li>oder Beginn der Leistungserbringung.</li>
                        </ul>
                        <p>3. Maßgeblich für Art und Umfang der Leistungen ist das bestätigte Angebot.</p>
                    </div>
                </div>
                <div class="agb-section">
                    <button class="agb-toggle">§3 Leistungsumfang</button>
                    <div class="agb-content">
                        <p>1. Die vereinbarten Leistungen ergeben sich aus dem individuellen Angebot.</p>
                        <p>2. Nicht ausdrücklich vereinbarte Zusatzleistungen (z. B. De-/Montagearbeiten,
                            Verpackungsmaterial, Halteverbotszonen, Möbellift, Einlagerung) werden gesondert berechnet.
                        </p>
                        <p>3. Leistungsfristen sind nur verbindlich, wenn sie schriftlich zugesichert wurden.</p>
                        <p>4. Unvorhersehbare Ereignisse (z. B. Witterung, Verkehr, behördliche Maßnahmen) verlängern
                            die Leistungszeit angemessen.</p>
                    </div>
                </div>
                <div class="agb-section">
                    <button class="agb-toggle">§4 Mitwirkungspflichten des Kunden</button>
                    <div class="agb-content">
                        <p>1. Der Kunde stellt sicher, dass:</p>
                        <ul>
                            <li>Zufahrtswege frei zugänglich sind,</li>
                            <li>behördliche Genehmigungen (z. B. Halteverbotszonen) rechtzeitig eingeholt wurden,</li>
                            <li>Umzugsgut transportsicher verpackt ist, sofern Verpackung nicht beauftragt wurde.</li>
                        </ul>
                        <p>2. Besondere Güter (z. B. Wertgegenstände, empfindliche Geräte, Pflanzen, Tiere) müssen vorab
                            ausdrücklich angegeben werden.</p>
                        <p>3. Verzögerungen oder Mehrkosten durch fehlende Mitwirkung trägt der Kunde.</p>
                    </div>
                </div>
                <div class="agb-section">
                    <button class="agb-toggle">§5 Preise und Zahlungsbedingungen</button>
                    <div class="agb-content">
                        <p>1. Es gelten die im Angebot vereinbarten Preise.</p>
                        <p>2. Zusatzleistungen oder Mehraufwand (z. B. längere Tragewege, Wartezeiten, nicht gemeldete
                            Möbelstücke) werden gesondert berechnet.</p>
                        <p>3. Rechnungen sind innerhalb von 7 Tagen ohne Abzug zahlbar, sofern nichts anderes vereinbart
                            wurde.</p>
                        <p>4. Bei Zahlungsverzug werden gesetzliche Verzugszinsen berechnet.</p>

                        <h2>§6 Haftung und Haftungsbegrenzung</h2>
                        <p>1. Die Haftung richtet sich nach den gesetzlichen Vorschriften des Handelsgesetzbuches (HGB),
                            insbesondere §§ 451 ff. HGB.</p>
                        <p>2. Die Haftung für Verlust oder Beschädigung des Umzugsgutes ist auf 620,00 € je Kubikmeter
                            Laderaum beschränkt (§ 451e HGB).</p>
                        <p>3. Für besonders wertvolle Gegenstände (z. B. Schmuck, Bargeld, Urkunden, Kunstgegenstände)
                            wird keine Haftung übernommen, sofern diese nicht ausdrücklich schriftlich deklariert
                            wurden.</p>
                        <p>4. Schäden müssen:</p>
                        <ul>
                            <li>bei äußerlich erkennbaren Schäden spätestens am Tag nach Ablieferung,</li>
                            <li>bei nicht erkennbaren Schäden innerhalb von 14 Tagen schriftlich angezeigt werden.</li>
                        </ul>
                        <p>5. Für Schäden durch höhere Gewalt wird keine Haftung übernommen.</p>

                        <div class="agb-section">
                            <button class="agb-toggle">§7 Versicherung</button>
                            <div class="agb-content">
                                <p>1. Das Umzugsgut ist im Rahmen der gesetzlichen Haftung versichert.</p>
                                <p>2. Auf Wunsch kann eine zusätzliche Transportversicherung gegen Mehrpreis
                                    abgeschlossen werden.</p>
                                <p>3. Ohne ausdrückliche Vereinbarung besteht kein Versicherungsschutz über die
                                    gesetzliche Haftungsgrenze hinaus.</p>
                            </div>
                        </div>

                        <div class="agb-section">
                            <button class="agb-toggle">§8 Rücktritt / Stornierung</button>
                            <div class="agb-content">
                                <p>1. Eine Stornierung muss schriftlich erfolgen.</p>
                                <p>2. Bei Stornierung können folgende Pauschalen berechnet werden:</p>
                                <ul>
                                    <li>bis 14 Tage vor Umzug: 20 % des Auftragswertes</li>
                                    <li>7–13 Tage vor Umzug: 40 %</li>
                                    <li>3–6 Tage vor Umzug: 60 %</li>
                                    <li>weniger als 3 Tage vor Umzug: 80 %</li>
                                </ul>
                                <p>3. Dem Kunden bleibt der Nachweis vorbehalten, dass kein oder ein geringerer Schaden
                                    entstanden ist.</p>

                                <div class="agb-section">
                                    <button class="agb-toggle">§9 Einlagerung</button>
                                    <div class="agb-content">
                                        <p>1. Bei vereinbarter Einlagerung erfolgt die Verwahrung in geeigneten
                                            Lagerräumen.</p>
                                        <p>2. Die Haftung richtet sich nach den gesetzlichen Vorschriften.</p>
                                        <p>3. Lagerkosten sind monatlich im Voraus zu zahlen.</p>
                                    </div>
                                </div>

                                <div class="agb-section">
                                    <button class="agb-toggle">§10 Widerrufsrecht (Verbraucher)</button>
                                    <div class="agb-content">
                                        <p>Bei außerhalb von Geschäftsräumen oder im Fernabsatz geschlossenen Verträgen
                                            steht Verbrauchern ein gesetzliches Widerrufsrecht von 14 Tagen zu, sofern
                                            nicht bereits mit ausdrücklicher Zustimmung vor Ablauf der Widerrufsfrist
                                            mit der Leistung begonnen wurde.</p>
                                        <p>Eine gesonderte Widerrufsbelehrung wird zur Verfügung gestellt.</p>

                                        <h2>§11 Gerichtsstand und anwendbares Recht</h2>
                                        <p>1. Es gilt deutsches Recht unter Ausschluss des UN-Kaufrechts.</p>
                                        <p>2. Ist der Kunde Unternehmer, ist Gerichtsstand der Sitz von Bären Crew.</p>

                                        <h2>§12 Salvatorische Klausel</h2>
                                        <p>Sollte eine Bestimmung dieser AGB unwirksam sein oder werden, bleibt die
                                            Wirksamkeit der übrigen Bestimmungen unberührt.</p>

                                    </div>
                                </div>

                            </div>
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