<?php

namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Models\Admin;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class AdminBaseController extends Controller
{
    protected ?array $authAdmin = null;
    protected string $jwtKey;

    public function __construct()
    {
        // Ensure session is started for JWT handling
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $this->jwtKey = $_ENV['JWT_SECRET'] ?? 'your-secret-key';
        $this->authAdmin = $this->getAuthAdmin(); // Fetch admin data on controller instantiation
    }

    /**
     * Override adminView to automatically inject admin data
     */
    protected function adminView($view, $data = [])
    {
        // Ensure admin data is available in all admin views
        if ($this->authAdmin) {
            $data['admin_name'] = $this->authAdmin['name'] ?? 'Admin';
            $data['admin_email'] = $this->authAdmin['email'] ?? 'admin@example.com';
        } else {
            // Provide default values if no admin is authenticated (e.g., on login page)
            $data['admin_name'] = 'Admin';
            $data['admin_email'] = 'admin@example.com';
        }
        
        // Pass current route name from Route class
        $data['currentRouteName'] = \App\Core\Route::$currentMatchedRouteName;


        // Call the parent adminView method from App\Core\Controller
        parent::adminView($view, $data);
    }

    /**
     * Fetches authenticated admin's data.
     * Returns admin array or redirects to login if not authenticated.
     */
    protected function getAuthAdmin(): ?array
    {
        $jwt = $_COOKIE['admin_token'] ?? '';

        if (!$jwt) {
            // For cases where getAuthAdmin is called from a page that doesn't require login (e.g., the login page itself)
            // Or if we want to allow controllers to handle redirects explicitly.
            return null; 
        }

        try {
            $decoded = JWT::decode($jwt, new Key($this->jwtKey, 'HS256'));
            $admin_id = $decoded->admin_id ?? null;

            if (!$admin_id) {
                return null;
            }

            $adminModel = new Admin();
            $admin = $adminModel->find($admin_id);

            if (!$admin) {
                return null;
            }

            return $admin;

        } catch (\Exception $e) {
            return null;
        }
    }
    
    /**
     * Redirects to login if admin is not authenticated.
     * Should be called in controller methods that require authentication.
     */
    protected function requireAdminAuth()
    {
        if (!$this->authAdmin) {
            // Optionally store the current URL to redirect back after login
            $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI'];
            header('Location: ' . route('admin.login'));
            exit;
        }
    }
}
