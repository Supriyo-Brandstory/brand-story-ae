<?php
namespace App\Controllers\Admin;

use App\Models\Admin;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class AdminController extends AdminBaseController // Extend AdminBaseController
{
    public function __construct()
    {
        parent::__construct(); // Call parent constructor
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

            $jwt = JWT::encode($payload, $this->jwtKey, 'HS256');

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
        $this->requireAdminAuth(); // Ensure admin is authenticated

        return $this->adminView('/dashboard'); // admin data is auto-injected
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
        $this->requireAdminAuth(); // Ensure admin is authenticated
        // The admin data is available via $this->authAdmin if needed
        return $this->adminView('/profile', [
            'admin' => $this->authAdmin // Pass for direct use in profile form
        ]);
    }


    // -----------------------------------------------------
    //  UPDATE PROFILE
    // -----------------------------------------------------
    public function updateProfile()
    {
        csrf_verify();
        $this->requireAdminAuth(); // Ensure admin is authenticated

        $admin = $this->authAdmin; // Use the already fetched admin data

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



}
