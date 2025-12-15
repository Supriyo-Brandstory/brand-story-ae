<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f4f6f9;
            display: flex;
            height: 100vh;
            justify-content: center;
            align-items: center;
        }

        .login-card {
            width: 380px;
            padding: 25px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>

    <div class="login-card">
        <h3 class="text-center mb-4">Admin Login</h3>

        <?php if (isset($_SESSION['login_error'])): ?>
            <div class="alert alert-danger"><?= $_SESSION['login_error'] ?></div>
            <?php unset($_SESSION['login_error']); ?>
        <?php endif; ?>

        <form method="post" action="<?= route('admin.processLogin') ?>">
            <?= csrf_token() ?>
            <div class="mb-3">
                <label class="form-label">Email Address</label>
                <input type="email" class="form-control" name="email" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="password" required>
            </div>

            <button class="btn btn-primary w-100">Login</button>
        </form>
    </div>

</body>

</html>