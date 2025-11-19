<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
</head>
<body>
    <h2>Admin Login</h2>

    <?php if (isset($_SESSION['login_error'])): ?>
        <p style="color: red;"><?= $_SESSION['login_error'] ?></p>
        <?php unset($_SESSION['login_error']); ?>
    <?php endif; ?>

    <form method="post" action="<?= route('admin.processLogin') ?>">
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit">Login</button>
    </form>
</body>
</html>
