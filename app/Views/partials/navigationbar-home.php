<nav class="nav">
        <div class="nav__logo">
            <a href="index.php?page=home">
                <img src="<?= $env['DIR_PATH'] ?>/assets/images/Logo/Logo.webp" alt="Logo">
            </a>
        </div>

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
    </nav>