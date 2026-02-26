<?php
$currentUrl = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$canonical = $canonical ?? $currentUrl;
$description = $description ?? '';
$og_image = $og_image ?? ($env['APP_URL'] . '/assets/images/og-default.jpg');
?>


<!-- Google tag (gtag.js) -->
<!-- <script async src="https://www.googletagmanager.com/gtag/js?id=G-Q8SGNL76JZ"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag() { dataLayer.push(arguments); }
  gtag('js', new Date());

  gtag('config', 'G-Q8SGNL76JZ');
</script> -->

<!-- Primary Meta Tags -->
<meta name="description" content="<?= htmlspecialchars($description) ?>">
<meta name="robots" content="index, follow">
<link rel="canonical" href="<?= htmlspecialchars($canonical) ?>">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="<?= htmlspecialchars($canonical) ?>">
<meta property="og:title" content="<?= htmlspecialchars($title ?? '') ?>">
<meta property="og:description" content="<?= htmlspecialchars($description) ?>">
<meta property="og:image" content="<?= htmlspecialchars($og_image) ?>">

<!-- Twitter -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:url" content="<?= htmlspecialchars($canonical) ?>">
<meta name="twitter:title" content="<?= htmlspecialchars($title ?? '') ?>">
<meta name="twitter:description" content="<?= htmlspecialchars($description) ?>">
<meta name="twitter:image" content="<?= htmlspecialchars($og_image) ?>">

<!-- Theme Color (Mobile Browser UI) -->
<meta name="theme-color" content="#ffffff">

<script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Umzugsfirma",
      "name": "Bären-Crew Umzüge",
      "url": "<?= $env['APP_URL'] ?>",
      "logo": "<?= $env['APP_URL'] ?>/assets/images/Logo4.webp",
      "description": "<?= htmlspecialchars($description) ?>",
      "areaServed": "Deutschland"
    }
</script>