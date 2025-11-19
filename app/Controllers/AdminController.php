<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Core\Database;

class AdminController extends Controller
{
    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
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



    // dashboard
    public function dashboard()
    {
        $data = [
            'admin_name' => $_SESSION['admin_name'] ?? 'Admin'
        ];
        return $this->adminView('/dashboard', $data);
    }

    // logout


}
