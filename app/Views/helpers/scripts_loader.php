
<?php if (!empty($scripts)): ?>
    <?php foreach ($scripts as $script): ?>
        <script src="<?= $env['DIR_PATH'] ?>/assets/js/<?= htmlspecialchars($script) ?>.js" defer></script>
    <?php endforeach; ?>
<?php endif; ?>