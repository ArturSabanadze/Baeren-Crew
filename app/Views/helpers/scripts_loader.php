<?php if (!empty($scripts)): ?>
    <?php foreach ($scripts as $script):
        $jsFile = __DIR__ . "/assets/js/" . $script . ".js"; // full server path
        $version = file_exists($jsFile) ? filemtime($jsFile) : 0; // use filemtime or fallback
        ?>
        <script src="<?= $env['DIR_PATH'] ?>/assets/js/<?= htmlspecialchars($script) ?>.js?v=<?= $version ?>" defer></script>
    <?php endforeach; ?>
<?php endif; ?>