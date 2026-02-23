<nav class="nav">
    <div class="nav__logo">
        <a href="/">
            <img src="<?= $env['DIR_PATH'] ?>/assets/images/Logo/Logo4.webp" alt="Logo">
        </a>
        <h1>BÄREN - CREW</h1>
    </div>

    <!-- Desktop links -->
    <div class="nav__links">
        <a href="#section-hero">Start</a>
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
    </div>

    <!-- Mobile Hamburger -->
    <div class="nav__hamburger" id="mobileHamburger">
        <span></span>
        <span></span>
        <span></span>
    </div>


</nav>