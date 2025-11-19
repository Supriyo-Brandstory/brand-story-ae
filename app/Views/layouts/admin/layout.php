<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?= $meta['title'] ?? 'Admin Panel' ?></title>
    <link rel="stylesheet" href="/assets/admin.css">
</head>
<body>

<header>
    <h1>Admin Panel</h1>
    <nav>
        <?php if (isset($_COOKIE['admin_token'])): ?>
            <a href="<?= route('admin.dashboard') ?>">Dashboard</a>
            <a href="<?= route('admin.logout') ?>">Logout</a>
        <?php else: ?>
            <a href="<?= route('admin.login') ?>">Login</a>
        <?php endif; ?>
    </nav>
</header>

<main>
    <?= $content ?>
</main>

</body>
</html>
