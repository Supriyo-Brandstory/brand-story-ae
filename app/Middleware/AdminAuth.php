<?php
namespace App\Middleware;

class AdminAuth
{
    public function handle()
    {
        session_start();

        if (!isset($_SESSION['admin_logged'])) {
            header("Location: /admin/login");
            exit;
        }
    }
}
