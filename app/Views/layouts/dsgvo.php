<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">

    <title><?= htmlspecialchars($title ?? 'My App') ?></title>
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


    <main class="app-main">
        <div class="app-section-distancer"></div>
        <section class="app-section">
            <div class="container agb-container">

                <h1 class="agb-title">Datenschutzerklärung</h1>
                <p class="agb-meta">Der Schutz personenbezogener Daten hat für Bären Crew einen besonders hohen
                    Stellenwert.</p>

                <div class="agb-section">
                    <button class="agb-toggle">Allgemeine Hinweise</button>
                    <div class="agb-content">
                        <p>Die Nutzung dieser Webseite ist grundsätzlich ohne Angabe personenbezogener Daten möglich.
                            Sofern jedoch besondere Services über die Webseite in Anspruch genommen werden, kann eine
                            Verarbeitung personenbezogener Daten erforderlich sein. Ist eine solche Verarbeitung
                            notwendig und besteht keine gesetzliche Grundlage, wird vorab eine Einwilligung eingeholt.
                        </p>
                        <p>Die Verarbeitung personenbezogener Daten (z. B. Name, Anschrift, E-Mail-Adresse oder
                            Telefonnummer) erfolgt stets im Einklang mit der Datenschutz-Grundverordnung (DS-GVO) sowie
                            den geltenden nationalen Datenschutzbestimmungen.</p>
                        <p>Diese Datenschutzerklärung informiert über Art, Umfang und Zweck der erhobenen, genutzten und
                            verarbeiteten personenbezogenen Daten sowie über die Rechte betroffener Personen. Bären Crew
                            hat technische und organisatorische Maßnahmen umgesetzt, um personenbezogene Daten
                            bestmöglich zu schützen. Dennoch können internetbasierte Datenübertragungen
                            Sicherheitslücken aufweisen. Eine vollständige Sicherheit kann daher nicht garantiert
                            werden. Alternativ können personenbezogene Daten beispielsweise auch telefonisch übermittelt
                            werden.</p>
                    </div>
                </div>

                <div class="agb-section">
                    <button class="agb-toggle">1. Begriffsbestimmungen</button>
                    <div class="agb-content">
                        <p>Diese Datenschutzerklärung verwendet die Begriffe der Datenschutz-Grundverordnung (DS-GVO):
                        </p>
                        <ul>
                            <li><strong>Personenbezogene Daten:</strong> Alle Informationen, die sich auf eine
                                identifizierte oder identifizierbare natürliche Person beziehen.</li>
                            <li><strong>Betroffene Person:</strong> Jede Person, deren personenbezogene Daten
                                verarbeitet werden.</li>
                            <li><strong>Verarbeitung:</strong> Jeder Vorgang im Zusammenhang mit personenbezogenen Daten
                                (z. B. Erhebung, Speicherung, Nutzung, Übermittlung, Löschung).</li>
                            <li><strong>Einschränkung der Verarbeitung:</strong> Markierung gespeicherter Daten mit dem
                                Ziel, deren künftige Verarbeitung einzuschränken.</li>
                            <li><strong>Profiling:</strong> Automatisierte Verarbeitung personenbezogener Daten zur
                                Bewertung persönlicher Aspekte.</li>
                            <li><strong>Pseudonymisierung:</strong> Verarbeitung personenbezogener Daten in einer Weise,
                                dass sie ohne zusätzliche Informationen keiner bestimmten Person mehr zugeordnet werden
                                können.</li>
                            <li><strong>Verantwortlicher:</strong> Die Stelle, die über Zwecke und Mittel der
                                Verarbeitung entscheidet.</li>
                            <li><strong>Auftragsverarbeiter:</strong> Eine Stelle, die personenbezogene Daten im Auftrag
                                des Verantwortlichen verarbeitet.</li>
                            <li><strong>Empfänger:</strong> Stelle, der personenbezogene Daten offengelegt werden.</li>
                            <li><strong>Dritter:</strong> Jede Stelle außer der betroffenen Person, dem Verantwortlichen
                                oder dem Auftragsverarbeiter.</li>
                            <li><strong>Einwilligung:</strong> Freiwillige, informierte und unmissverständliche
                                Willensbekundung zur Verarbeitung personenbezogener Daten.</li>
                        </ul>
                    </div>
                </div>

                <div class="agb-section">
                    <button class="agb-toggle">2. Verantwortlicher</button>
                    <div class="agb-content">
                        <p>Verantwortlicher im Sinne der Datenschutz-Grundverordnung ist:<br>
                            Bären Crew<br>
                            Vertreten durch: Alexander Progorelov<br>
                            [Adresse einfügen]<br>
                            [PLZ Ort] Deutschland<br>
                            Telefon: [Telefonnummer einfügen]<br>
                            E-Mail: [E-Mail-Adresse einfügen]<br>
                            Webseite: [Webadresse einfügen]</p>
                    </div>
                </div>

                <div class="agb-section">
                    <button class="agb-toggle">3. Cookies</button>
                    <div class="agb-content">
                        <p>Diese Webseite verwendet Cookies. Cookies sind Textdateien, die auf dem Endgerät gespeichert
                            werden. Sie ermöglichen eine nutzerfreundlichere Gestaltung der Webseite, Wiedererkennung
                            von Besuchern sowie statistische Auswertungen. Betroffene Personen können die Speicherung
                            von Cookies jederzeit über die Einstellungen des verwendeten Browsers verhindern oder
                            bereits gesetzte Cookies löschen. Bei Deaktivierung können gegebenenfalls nicht alle
                            Funktionen vollständig genutzt werden.</p>
                    </div>
                </div>

                <div class="agb-section">
                    <button class="agb-toggle">4. Erfassung allgemeiner Daten</button>
                    <div class="agb-content">
                        <p>Beim Aufruf der Webseite werden automatisch folgende Daten erfasst:</p>
                        <ul>
                            <li>Browsertyp und Version</li>
                            <li>Betriebssystem</li>
                            <li>Referrer-URL</li>
                            <li>aufgerufene Unterseiten</li>
                            <li>Datum und Uhrzeit des Zugriffs</li>
                            <li>IP-Adresse</li>
                            <li>Internet-Service-Provider</li>
                        </ul>
                        <p>Diese Daten dienen der technischen Bereitstellung der Inhalte, der Systemsicherheit, der
                            Optimierung der Webseite sowie statistischen Zwecken. Eine Zusammenführung mit
                            personenbezogenen Daten erfolgt nicht.</p>
                    </div>
                </div>

                <div class="agb-section">
                    <button class="agb-toggle">5. Kontaktaufnahme</button>
                    <div class="agb-content">
                        <p>Bei Kontaktaufnahme per E-Mail oder Formular werden übermittelte personenbezogene Daten
                            gespeichert. Die Verarbeitung erfolgt ausschließlich zur Bearbeitung der Anfrage. Eine
                            Weitergabe an Dritte erfolgt nicht.</p>
                    </div>
                </div>

                <div class="agb-section">
                    <button class="agb-toggle">6. Speicherung und Löschung</button>
                    <div class="agb-content">
                        <p>Personenbezogene Daten werden nur so lange gespeichert, wie es für den jeweiligen Zweck
                            erforderlich ist oder gesetzliche Aufbewahrungsfristen bestehen. Nach Wegfall des Zwecks
                            oder Ablauf gesetzlicher Fristen werden die Daten gelöscht oder gesperrt.</p>
                    </div>
                </div>

                <div class="agb-section">
                    <button class="agb-toggle">7. Rechte betroffener Personen</button>
                    <div class="agb-content">
                        <p>Betroffene Personen haben folgende Rechte:</p>
                        <ul>
                            <li>Recht auf Bestätigung</li>
                            <li>Recht auf Auskunft</li>
                            <li>Recht auf Berichtigung</li>
                            <li>Recht auf Löschung („Recht auf Vergessenwerden“)</li>
                            <li>Recht auf Einschränkung der Verarbeitung</li>
                            <li>Recht auf Datenübertragbarkeit</li>
                            <li>Recht auf Widerspruch</li>
                            <li>Recht auf Widerruf einer Einwilligung</li>
                            <li>Recht auf Beschwerde bei einer Aufsichtsbehörde</li>
                        </ul>
                        <p>Zur Ausübung dieser Rechte kann jederzeit Kontakt zu Bären Crew aufgenommen werden.</p>
                    </div>
                </div>

                <div class="agb-section">
                    <button class="agb-toggle">8. Bewerbungen</button>
                    <div class="agb-content">
                        <p>Bewerberdaten werden ausschließlich zum Zweck des Bewerbungsverfahrens verarbeitet. Kommt
                            kein Arbeitsverhältnis zustande, werden die Daten spätestens zwei Monate nach Absage
                            gelöscht, sofern keine berechtigten Interessen (z. B. Nachweispflichten nach dem AGG)
                            entgegenstehen.</p>
                    </div>
                </div>

                <div class="agb-section">
                    <button class="agb-toggle">9. Google Analytics</button>
                    <div class="agb-content">
                        <p>Diese Webseite nutzt Google Analytics mit IP-Anonymisierung. Google Analytics ist ein
                            Web-Analyse-Dienst zur Auswertung des Nutzerverhaltens. Dabei werden Cookies eingesetzt. Die
                            IP-Adresse wird innerhalb der EU gekürzt. Betroffene Personen können Cookies im Browser
                            deaktivieren oder das Browser-Add-On zur Deaktivierung von Google Analytics installieren.
                            Weitere Informationen sind auf der Webseite von Google einsehbar.</p>
                    </div>
                </div>

                <div class="agb-section">
                    <button class="agb-toggle">10. Google Ads</button>
                    <div class="agb-content">
                        <p>Diese Webseite verwendet Google Ads zur Schaltung von Werbung. Dabei wird ein sogenannter
                            Conversion-Cookie gesetzt, um die Wirksamkeit von Anzeigen zu messen. Die Speicherung kann
                            jederzeit über die Browsereinstellungen verhindert werden.</p>
                    </div>
                </div>

                <div class="agb-section">
                    <button class="agb-toggle">11. Google Maps</button>
                    <div class="agb-content">
                        <p>Diese Webseite nutzt Google Maps zur Darstellung interaktiver Karten. Durch Nutzung können
                            Daten an Google übertragen werden.</p>
                    </div>
                </div>

                <div class="agb-section">
                    <button class="agb-toggle">12. Rechtsgrundlagen und berechtigte Interessen</button>
                    <div class="agb-content">
                        <p>Die Verarbeitung erfolgt auf Grundlage von:</p>
                        <ul>
                            <li>Art. 6 Abs. 1 lit. a DS-GVO (Einwilligung)</li>
                            <li>Art. 6 Abs. 1 lit. b DS-GVO (Vertragserfüllung)</li>
                            <li>Art. 6 Abs. 1 lit. c DS-GVO (rechtliche Verpflichtung)</li>
                            <li>Art. 6 Abs. 1 lit. d DS-GVO (lebenswichtige Interessen)</li>
                            <li>Art. 6 Abs. 1 lit. f DS-GVO (berechtigtes Interesse)</li>
                        </ul>
                        <p>Sofern die Verarbeitung auf Art. 6 Abs. 1 lit. f DS-GVO beruht, besteht das berechtigte
                            Interesse in der Durchführung und Optimierung der Geschäftstätigkeit sowie der Sicherheit
                            der IT-Systeme.</p>
                    </div>
                </div>

                <div class="agb-section">
                    <button class="agb-toggle">13. Dauer der Speicherung</button>
                    <div class="agb-content">
                        <p>Die Speicherdauer richtet sich nach gesetzlichen Aufbewahrungsfristen oder dem jeweiligen
                            Verarbeitungszweck.</p>
                    </div>
                </div>

                <div class="agb-section">
                    <button class="agb-toggle">14. Bereitstellung personenbezogener Daten</button>
                    <div class="agb-content">
                        <p>Die Bereitstellung personenbezogener Daten kann gesetzlich oder vertraglich vorgeschrieben
                            sein. Ohne erforderliche Daten kann ein Vertrag unter Umständen nicht geschlossen werden.
                        </p>
                    </div>
                </div>

                <div class="agb-section">
                    <button class="agb-toggle">15. Automatisierte Entscheidungen</button>
                    <div class="agb-content">
                        <p>Es findet keine ausschließlich automatisierte Entscheidungsfindung oder Profiling statt.</p>
                    </div>
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