<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Core\Database;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class AdminController extends Controller
{
    private string $key;

    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $this->key = $_ENV['JWT_SECRET'] ?? 'your-secret-key'; // Use an environment variable for security
    }

    // show login form
    public function login()
    {
        // If already logged in, redirect to dashboard
        if (!empty($_SESSION['admin_id'])) {
            header('Location: ' . route('admin.dashboard'));
            exit;
        }
        return $this->singleView('admin/login');
    }

    public function processLogin()
    {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        $db = Database::connect();
        $sql = "SELECT * FROM admins WHERE email = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$email]);
        $admin = $stmt->fetch();

        if ($admin && password_verify($password, $admin['password'])) {
            $payload = [
                'admin_id' => $admin['id'],
                'admin_name' => $admin['name'],
                'exp' => time() + 3600 // Token expires in 1 hour
            ];

            $jwt = JWT::encode($payload, $this->key, 'HS256');

            // Store the JWT in a cookie
            setcookie('admin_token', $jwt, time() + 3600, '/', '', false, true);

            if (isset($_SESSION['redirect_url'])) {
                $redirectUrl = $_SESSION['redirect_url'];
                unset($_SESSION['redirect_url']);
                header('Location: ' . $redirectUrl);
                exit;
            } else {
                header('Location: ' . route('admin.dashboard'));
                exit;
            }
        } else {
            // Invalid credentials
            $_SESSION['login_error'] = 'Invalid email or password';
            header('Location: ' . route('admin.login'));
            exit;
        }
    }

    // dashboard
    public function dashboard()
    {
        // Retrieve the JWT from the cookie
        $jwt = $_COOKIE['admin_token'] ?? '';

        if (!$jwt) {
            header('Location: ' . route('admin.login'));
            exit;
        }

        try {
    $decoded = JWT::decode($jwt, new Key($this->key, 'HS256'));

    // Safe access
    $admin_id = isset($decoded->admin_id) ? $decoded->admin_id : null;

    if (!$admin_id) {
        // If no admin ID found in token → redirect to login
        header('Location: ' . route('admin.login'));
        exit;
    }

    // DB check
    $db = Database::connect();
    $sql = "SELECT * FROM admins WHERE id = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$admin_id]);
    $admin = $stmt->fetch();

    if (!$admin) {
        // Token valid but admin not found
        header('Location: ' . route('admin.login'));
        exit;
    }

    // Passing required data
    $data = [
        'admin_name' => $decoded->admin ?? $admin['name'] ?? 'Admin'
    ];

    return $this->adminView('/dashboard', $data);

} catch (\Exception $e) {
    // Token invalid → redirect to login
    header('Location: ' . route('admin.login'));
    exit;
}

    }

    public function logout()
    {
        // Clear the JWT cookie
        setcookie('admin_token', '', time() - 3600, '/');

        header('Location: ' . route('admin.login'));
        exit;
    }

    public function index()
    {
        if (isset($_COOKIE['admin_token'])) {
            header('Location: ' . route('admin.dashboard'));
            exit;
        } else {
            header('Location: ' . route('admin.login'));
            exit;
        }
    }

    public function blogs()
    {
        return $this->adminView('/blogs');
    }

    public function profile()
    {
        // Retrieve the JWT from the cookie
        $jwt = $_COOKIE['admin_token'] ?? '';

        if (!$jwt) {
            header('Location: ' . route('admin.login'));
            exit;
        }

        try {
            $decoded = JWT::decode($jwt, new Key($this->key, 'HS256'));
            $admin_id = $decoded->admin_id ?? null;

            if (!$admin_id) {
                header('Location: ' . route('admin.login'));
                exit;
            }

            $db = Database::connect();
            $sql = "SELECT * FROM admins WHERE id = ?";
            $stmt = $db->prepare($sql);
            $stmt->execute([$admin_id]);
            $admin = $stmt->fetch();

            if (!$admin) {
                header('Location: ' . route('admin.login'));
                exit;
            }

            $data = [
                'admin' => $admin
            ];

            return $this->adminView('/profile', $data);
        } catch (\Exception $e) {
            // Token is invalid, redirect to login
            header('Location: ' . route('admin.login'));
            exit;
        }
    }

    public function updateProfile()
    {
        csrf_verify();

        // Retrieve the JWT from the cookie
        $jwt = $_COOKIE['admin_token'] ?? '';

        if (!$jwt) {
            header('Location: ' . route('admin.login'));
            exit;
        }

        try {
            $decoded = JWT::decode($jwt, new Key($this->key, 'HS256'));
            $admin_id = $decoded->admin_id ?? null;

            if (!$admin_id) {
                header('Location: ' . route('admin.login'));
                exit;
            }

            $name = $_POST['name'] ?? '';
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            $db = Database::connect();
            $sql = "UPDATE admins SET name = ?, email = ?";
            $params = [$name, $email];

            if (!empty($password)) {
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                $sql .= ", password = ?";
                $params[] = $hashedPassword;
            }

            $sql .= " WHERE id = ?";
            $params[] = $admin_id;

            $stmt = $db->prepare($sql);
            $stmt->execute($params);

            $_SESSION['profile_success'] = 'Profile updated successfully';
            header('Location: ' . route('admin.profile'));
            exit;
        } catch (\Exception $e) {
            // Token is invalid, redirect to login
            header('Location: ' . route('admin.login'));
            exit;
        }
    }
}
