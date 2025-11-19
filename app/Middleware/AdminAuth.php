<?php
namespace App\Middleware;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class AdminAuth
{
    private string $key;

    public function __construct()
    {
        $this->key = $_ENV['JWT_SECRET'] ?? 'your-secret-key'; // Use an environment variable for security
    }

    public function handle()
    {
        // Retrieve the JWT from the cookie
        $jwt = $_COOKIE['admin_token'] ?? '';

        if (!$jwt) {
            $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI'];
            header("Location: /admin/login");
            exit;
        }

        try {
            $decoded = JWT::decode($jwt, new Key($this->key, 'HS256'));

            // You can access the admin data from the decoded token like this:
            // $admin_id = $decoded->admin_id;
            // $admin_name = $decoded->admin_name;

        } catch (\Exception $e) {
            header("Location: /admin/login");
            exit;
        }
    }
}
