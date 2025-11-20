<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\Admin;
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

        $this->key = $_ENV['JWT_SECRET'] ?? 'your-secret-key';
    }


    // -----------------------------------------------------
    //  LOGIN FORM
    // -----------------------------------------------------
    public function login()
    {
        if (!empty($_SESSION['admin_id'])) {
            header('Location: ' . route('admin.dashboard'));
            exit;
        }
        return $this->singleView('admin/login');
    }


    // -----------------------------------------------------
    //  PROCESS LOGIN (uses MODEL)
    // -----------------------------------------------------
    public function processLogin()
    {
        $email = trim($_POST['email'] ?? '');
        $password = trim($_POST['password'] ?? '');

        $adminModel = new Admin();
        $adminResult = $adminModel->query("SELECT * FROM admins WHERE email = ? LIMIT 1", [$email]);
        $admin = !empty($adminResult) ? $adminResult[0] : null;

        if ($admin && password_verify($password, $admin['password'])) {

            $payload = [
                'admin_id' => $admin['id'],
                'admin_name' => $admin['name'],
                'exp' => time() + 3600
            ];

            $jwt = JWT::encode($payload, $this->key, 'HS256');

            setcookie('admin_token', $jwt, time() + 3600, '/', '', false, true);

            if (isset($_SESSION['redirect_url'])) {
                $redirect = $_SESSION['redirect_url'];
                unset($_SESSION['redirect_url']);
                header('Location: ' . $redirect);
                exit;
            }

            header('Location: ' . route('admin.dashboard'));
            exit;
        }

        $_SESSION['login_error'] = 'Invalid email or password';
        header('Location: ' . route('admin.login'));
        exit;
    }


    // -----------------------------------------------------
    //  DASHBOARD
    // -----------------------------------------------------
    public function dashboard()
    {
        $admin = $this->getAuthAdmin(); // ← made helper

        return $this->adminView('/dashboard', [
            'admin_name' => $admin['name']
        ]);
    }


    // -----------------------------------------------------
    //  LOGOUT
    // -----------------------------------------------------
    public function logout()
    {
        setcookie('admin_token', '', time() - 3600, '/');
        header('Location: ' . route('admin.login'));
        exit;
    }


    // -----------------------------------------------------
    //  INDEX (auto redirect)
    // -----------------------------------------------------
    public function index()
    {
        if (!empty($_COOKIE['admin_token'])) {
            header('Location: ' . route('admin.dashboard'));
            exit;
        }

        header('Location: ' . route('admin.login'));
        exit;
    }


    // -----------------------------------------------------
    //  PROFILE PAGE
    // -----------------------------------------------------
    public function profile()
    {
        $admin = $this->getAuthAdmin();

        return $this->adminView('/profile', [
            'admin' => $admin
        ]);
    }


    // -----------------------------------------------------
    //  UPDATE PROFILE
    // -----------------------------------------------------
    public function updateProfile()
    {
        csrf_verify();

        $admin = $this->getAuthAdmin(); // returns admin array

        $name = trim($_POST['name'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $password = trim($_POST['password'] ?? '');

        $update = [
            'id' => $admin['id'],
            'name' => $name,
            'email' => $email
        ];

        if (!empty($password)) {
            $update['password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        $adminModel = new Admin();
        $adminModel->save($update);

        $_SESSION['profile_success'] = "Profile updated successfully";
        header("Location: " . route('admin.profile'));
        exit;
    }



    // ==========================================================================
    //  🔥 SHARED AUTH FUNCTION (USED IN MULTIPLE METHODS)
    //  Returns admin array or redirects to login
    // ==========================================================================
    private function getAuthAdmin(): array
    {
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

            $adminModel = new Admin();
            $admin = $adminModel->find($admin_id);

            if (!$admin) {
                header('Location: ' . route('admin.login'));
                exit;
            }

            return $admin;

        } catch (\Exception $e) {
            header('Location: ' . route('admin.login'));
            exit;
        }
    }
}
