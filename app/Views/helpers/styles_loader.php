<?php if (!empty($styles)): ?>
    <?php foreach ($styles as $style):
        $cssFile = __DIR__ . "/assets/css/" . $style . ".css"; // path on server
        $version = file_exists($cssFile) ? filemtime($cssFile) : 0; // use filemtime or fallback
        ?>
        <link rel="stylesheet" href="<?= $env['DIR_PATH'] ?>/assets/css/<?= htmlspecialchars($style) ?>.css?v=<?= $version ?>">
    <?php endforeach; ?>
<?php endif; ?>