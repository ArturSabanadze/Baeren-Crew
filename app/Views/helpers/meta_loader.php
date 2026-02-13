<?php if (!empty($meta_description)): ?>
    <?php foreach ($meta_description as $meta): ?>
        <meta name="description" content="<?= htmlspecialchars($meta) ?>">
    <?php endforeach; ?>
<?php endif; ?>