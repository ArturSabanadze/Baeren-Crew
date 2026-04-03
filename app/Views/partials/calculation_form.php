<div class="offer-calculator">
    <h2>Umzugskalkulator</h2>
    <hr>
    <form class="offer-form">
        <!-- Hidden fields -->
        <input type="hidden" name="from" id="from_value">
        <input type="hidden" name="to" id="to_value">
        <input type="hidden" name="offer_calculation" value="1">
        <input type="text" name="website" style="display:none" autocomplete="off">


        <label accesskey="v" for="from">Auszugsort:</label>
        <div class="input-wrapper">
            <gmp-place-autocomplete id="from" placeholder="Startadresse"></gmp-place-autocomplete>
        </div>

        <label accesskey="n" for="to">Einzugsort:</label>
        <div class="input-wrapper">
            <gmp-place-autocomplete id="to" placeholder="Zieladresse"></gmp-place-autocomplete>
        </div>

        <label accesskey="w" for="wohnflaeche">Wohnfläche (m²)</label>
        <input type="number" name="wohnflaeche" id="wohnflaeche" required min="1" placeholder="z.B. 45m²">

        <label accesskey="m" for="moebel">Möblierungsgrad</label>
        <select name="level" id="moebel" required>
            <option value="niedrig">Niedrig</option>
            <option value="mittel">Mittel</option>
            <option value="hoch">Hoch</option>
        </select>
        <hr>
        <label>Zusatzleistungen</label>
        <div class="extras-group">
            <label><input type="checkbox" name="extras[]" value="einpacken"> Einpacken Umzugskartons</label>
            <label><input type="checkbox" name="extras[]" value="auspacken"> Auspacken Umzugskartons</label>
            <label><input type="checkbox" name="extras[]" value="lift"> Klaviertransport</label>
            <label><input type="checkbox" name="extras[]" value="reinigung"> Endreinigung</label>
            <label>Ab/Aufbau von Möbel:<input type="number" name="extras[]" id="möebelbau" value="moebelbau"
                    placeholder="Anzahl Möbelstücke"> </input>

            </label>
            <label>Küchenabbau(m):<input type="number" name="extras[]" id="kuechenabbau" value="kuechenlaenge_abbau"
                    placeholder="Länge (m)"> </input>
            </label>
            <label>Küchenaufbau (m):<input type="number" name="extras[]" id="kuechenaufbau" value="kuechenlaenge_aufbau"
                    placeholder="Länge (m)"> </input>
            </label>
            <label>Möbelentsorgung (m³):<input type="number" name="extras[]" id="moebelentsorgung"
                    value="moebelentsorgung" placeholder="Volumen (m³)"> </input>
            </label>




        </div>
        <label accesskey="p" for="parking">Laufweg zur Parkzone</label>
        <input type="number" name="parking" id="parking" placeholder="z.B. 25m">

        <button type="submit">Angebot berechnen</button>
    </form>


</div>
<div class="offer-calculator" id="result">
    <h3>Kalkulieren Sie Ihre Umzugskosten</h3>

    <p>
        Geben Sie einfach Ihre Umzugsdetails im Formular links ein und erhalten Sie sofort eine transparente
        Kostenschätzung.
    </p>

    <div class="steps">
        <p><strong>So funktioniert’s:</strong></p>
        <ul>
            <li>Start- und Zieladresse eingeben</li>
            <li>Wohnfläche angeben</li>
            <li>Mobilisierungsgrad auswählen</li>
            <li>Zusatzleistungen optional hinzufügen</li>
        </ul>
    </div>

    <div class="result-info">
        <p>
            Nach einem Klick auf <strong>„Angebot berechnen“</strong> erscheint hier Ihre persönliche Kostenübersicht.
        </p>
    </div>

    <div class="tip">
        <p>
            💡 <strong>Tipp:</strong> Genauere Angaben führen zu präziseren Ergebnissen.
        </p>
    </div>
</div>
<script>
    window.addEventListener("load", () => {

        const offerCalculator = document.querySelector(".offer-calculator");

        const form = document.querySelector(".offer-form");
        const resultBox = document.getElementById("result");

        const fromEl = document.getElementById("from");
        const toEl = document.getElementById("to");

        const fromValue = document.getElementById("from_value");
        const toValue = document.getElementById("to_value");

        let fromSelected = false;
        let toSelected = false;

        // --- Initialize autocomplete with Germany-only bias ---
        const germanyCenter = { lat: 51.1657, lng: 10.4515 }; // approx center of Germany

        [fromEl, toEl].forEach(el => {
            el.autocompleteOptions = {
                componentRestrictions: { country: "de" },
                types: ["address"],
                locationBias: germanyCenter
            };
        });

        // --- Helper to set value and enforce DE country ---
        const setPlaceValue = async (el, hiddenInput, setSelected) => {
            const place = el.place;
            if (!place) return;

            await place.fetchFields({ fields: ["formattedAddress", "addressComponents"] });

            // Hard validation: must be Germany
            const countryComp = place.addressComponents.find(c => c.types.includes("country"));
            if (!countryComp || countryComp.shortName !== "DE") {
                alert("Bitte wählen Sie eine Adresse in Deutschland aus.");
                el.value = "";
                hiddenInput.value = "";
                setSelected(false);
                return false;
            }

            hiddenInput.value = place.formattedAddress;
            setSelected(true);
            return true;
        };

        // --- Event listeners for place selection ---
        fromEl.addEventListener("gmp-placechange", async () => {
            await setPlaceValue(fromEl, fromValue, val => fromSelected = val);
        });

        toEl.addEventListener("gmp-placechange", async () => {
            await setPlaceValue(toEl, toValue, val => toSelected = val);
        });

        let formStartTime = Date.now();

        form.addEventListener("submit", (e) => {
            const elapsed = (Date.now() - formStartTime) / 1000; // seconds
            if (elapsed < 5) {
                alert("Spam detected, bitte warten Sie etwas länger.");
                e.preventDefault();
                return;
            }
        });

        // --- Form submission ---
        form.addEventListener("submit", async (e) => {
            e.preventDefault();

            formStartTime = Date.now(); // reset timer on submit
            // Force update hidden inputs if user typed manually
            if (fromEl.place) {
                await setPlaceValue(fromEl, fromValue, val => fromSelected = val);
            } else if (fromEl.value.trim() !== "") {
                fromValue.value = fromEl.value.trim();
                fromSelected = true;
            }

            if (toEl.place) {
                await setPlaceValue(toEl, toValue, val => toSelected = val);
            } else if (toEl.value.trim() !== "") {
                toValue.value = toEl.value.trim();
                toSelected = true;
            }

            if (!fromSelected || !toSelected) {
                alert("Bitte wählen Sie eine Adresse in Deutschland aus der Liste aus.");
                return;
            }

            const formData = new FormData(form);
            resultBox.innerHTML = "<p>Berechnung läuft...</p>";

            try {
                const response = await fetch("/", { method: "POST", body: formData });

                let data;
                try {
                    data = await response.json();

                } catch (err) {
                    const text = await response.text();
                    resultBox.innerHTML = `<p class="error">Server antwortete ungültiges JSON: ${text}</p>`;
                    return;
                }

                if (data.error) {
                    resultBox.innerHTML = `<p class="error">${data.error}</p>`;
                    if (data.google_status) {
                        console.error("Google API status:", data.google_status);
                        console.error("Request URL:", data.request_url);
                    }
                    return;
                }
                offerCalculator.classList.add("hidden");
                resultBox.scrollIntoView({ behavior: "smooth" });
                resultBox.innerHTML = `
                <h3 class="offer-result-title">Ihr Unverbindliches Angebot</h3>
        <hr>
            <table class="offer-summary-table">
                <tr>
                    <td>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 20" width="22" height="22">
                            <path fill="currentColor"
                                d="M1 14h1a2 2 0 1 0 4 0h4a2 2 0 1 0 4 0h1a1 1 0 0 0 1-1v-3.5a1 1 0 0 0-.3-.7l-2.5-2.5a1 1 0 0 0-.7-.3H11V5a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v9zm3 1a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm10 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zM2 12V6h8v4h2.5l1.5 1.5V12H2zM6 18h6v2H6z" />
                        </svg>
                    </td>
                    <td><strong>Beförderungsdistanz</strong></td>

                    <td>${data.distance_km}km</td>
                </tr>
                <tr>
                    <td>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="22" height="22">
                            <!-- Outer circle -->
                            <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2" fill="none"/>

                            <!-- Hour hand -->
                            <line x1="12" y1="12" x2="12" y2="7" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>

                            <!-- Minute hand -->
                            <line x1="12" y1="12" x2="16" y2="12" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                    </td>
                    <td><strong>Beförderungszeit</strong></td>
                    <td>${data.distance_Zeit} min</td>
                </tr>

                <tr>
                    <td>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 20" width="22" height="22">
                            <path fill="currentColor" fill-rule="nonzero"
                                d="M16.84 4.535 9.355.165a1.245 1.245 0 0 0-1.24.002L.628 4.536C.238 4.73 0 5.184 0 5.645v8.71c0 .46.239.879.629 1.108l7.486 4.371a1.24 1.24 0 0 0 1.238 0l7.487-4.371c.39-.229.628-.647.628-1.108v-8.71c0-.461-.237-.915-.627-1.11M8.735 1.977l5.943 3.467-5.943 3.47-5.941-3.469zM1.872 7.074l5.926 3.463v6.937L1.872 14.02zM9.67 17.477v-6.938l5.927-3.462v6.945z" />
                        </svg>
                    </td>
                    <td><strong>Beladungsvolumen</strong></td>

                    <td>${data.volume} m³</td>
                </tr>

                <tr>
                    <td>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 20" width="22" height="22">
                            <path fill="currentColor"
                                d="M9 1a8 8 0 1 0 0 16A8 8 0 0 0 9 1zm1 4v3h3v2h-3v3H8v-3H5V8h3V5h2z" />
                        </svg>
                    </td>
                    <td><strong>Zusatzleistungen</strong></td>
                    
                    <td>
                        ${data.zusatzleistungen_breakdown} €
                    </td>
                </tr>
                <tr class="total-row">
                    <td>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="22" height="22">
                            <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2" fill="none"/>
                            <text x="12" y="16" font-size="12" text-anchor="middle" fill="currentColor" font-family="Arial, sans-serif">€</text>
                        </svg>
                    </td>
                    <td><strong>Gesamtpreis*</strong></td>
                    <td><strong>${data.total_price} € zzgl. MwSt.</strong></td>
                </tr>
            </table>
            <p class="offer-disclaimer">* Dies ist eine unverbindliche Schätzung basierend auf den eingegebenen Informationen. Der endgültige Preis kann nach einer Besichtigung oder bei Änderungen der Details variieren.</p>
                `;

            } catch (err) {
                console.error(err);
                resultBox.innerHTML = `<p class="error">Fehler bei der Anfrage. Bitte versuchen Sie es erneut.</p>`;
            }
        });

    });
</script>