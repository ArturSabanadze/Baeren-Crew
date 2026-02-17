<nav class="nav">
        <div class="nav__logo">
            <a href="index.php?page=home">
                <img src="<?= $env['DIR_PATH'] ?>assets/images/Logo/Logo.png" alt="Logo">
            </a>
        </div>

        <div class="nav__links">
            <a href="index.php?#section-hero">Start</a>
            <a href="index.php?#section-services">Leistungen</a>
            <a href="index.php?#section-pricing">Preise</a>

            <div class="nav__dropdown">
                <button class="nav__dropdown-btn">Über Uns</button>
                <div class="nav__dropdown-menu">
                    <a href="index.php?#team">Team</a>
                    <a href="index.php?#mission">Mission</a>
                    <a href="index.php?#reviews">Bewertungen</a>
                </div>
            </div>

            <a href="index.php?page=jobs">Karriere</a>
        </div>
    </nav>