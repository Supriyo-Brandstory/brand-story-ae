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
</header>

<main>
    <?= $content ?>
</main>

</body>
</html>
