<section class="app-section section-contact" id="section-contact-wrapper">
    <div class="container section-center" id="section-contact">
        <h2 class="heading-lg">Kontaktieren Sie uns</h2>
        <p class="text-base">
            Wir melden uns schnellstmöglich bei Ihnen.
        </p>

        <div class="contact-option">
            <img src="/assets/icons/tel.webp" alt="phone">
            <a href="#">+49 (0155) 61231466</a>
        </div>

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