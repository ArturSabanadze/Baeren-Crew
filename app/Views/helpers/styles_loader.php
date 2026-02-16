
<?php if (!empty($styles)): ?>
    <?php foreach ($styles as $style): ?>
        <link rel="stylesheet" href="<?= $env['DIR_PATH'] ?>/assets/css/<?= htmlspecialchars($style) ?>.css">
    <?php endforeach; ?>
<?php endif; ?>