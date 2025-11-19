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
        return $this->adminView('/login');
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
            $data = [
                'admin_name' => $decoded->admin_name ?? 'Admin'
            ];
            return $this->adminView('/dashboard', $data);
        } catch (\Exception $e) {
            // Token is invalid, redirect to login
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
}
