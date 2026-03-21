<nav class="nav">
    <div class="nav__logo">
        <a href="/">
            <img src="<?= $env['DIR_PATH'] ?>/assets/images/Logo/Logo4.webp" alt="Logo">
        </a>
        <h1>BÄREN - CREW</h1>
    </div>

    <!-- Desktop links -->
    <div class="nav__links">
        <a href="index.php?page=home#section-hero">Start</a>
        <a href="index.php?page=home#section-services">Leistungen</a>
        <a href="index.php?page=home#section-pkg">Preise</a>

        <div class="nav__dropdown">
            <button class="nav__dropdown-btn">Über Uns</button>
            <div class="nav__dropdown-menu">
                <a href="index.php?page=home#team">Team</a>
                <a href="index.php?page=home#mission">Mission</a>
                <a href="index.php?page=home#reviews">Bewertungen</a>
            </div>
        </div>

        <a href="index.php?page=jobs">Karriere</a>
    </div>

    <!-- Mobile Hamburger -->
    <div class="nav__hamburger" id="mobileHamburger">
        <span></span>
        <span></span>
        <span></span>
    </div>


</nav>