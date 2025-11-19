<!-- Views/admin/login.php -->
<?php
// $content will be captured by Controller
?>
<div class="auth-wrapper">
    <h1>Admin Login</h1>

    <?php if (!empty($_SESSION['flash_error'])): ?>
        <div class="alert alert-danger"><?php echo htmlspecialchars($_SESSION['flash_error']); unset($_SESSION['flash_error']); ?></div>
    <?php endif; ?>

    <form method="post" action="<?php echo base_url('admin/login'); ?>">
        <div>
            <label>Email</label>
            <input type="email" name="email" required />
        </div>
        <div>
            <label>Password</label>
            <input type="password" name="password" required />
        </div>
        <div>
            <button type="submit">Login</button>
        </div>
    </form>
</div>
