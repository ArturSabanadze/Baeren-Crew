<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($title ?? 'My App') ?></title>
    <?php include_once __DIR__ . '/../helpers/meta_loader.php'; ?>
    <?php include_once __DIR__ . '/../helpers/styles_loader.php'; ?>
    <?php include_once __DIR__ . '/../helpers/scripts_loader.php'; ?>
</head>
<body>
    <?php include_once __DIR__ . '/navigationbar.php'; ?>
    <?php include_once __DIR__ . '/header.php'; ?>
    <?php include_once __DIR__ . '/quick_contact.php'; ?>
    <?php include_once __DIR__ . '/leistungen.php'; ?>
    <hr>
     <?php include_once __DIR__ . '/preise.php'; ?>
    <?php include_once __DIR__ . '/footer.php'; ?>
</body>
</html>
