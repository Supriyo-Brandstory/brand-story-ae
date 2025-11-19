<?php
use App\Core\Route;

if (!function_exists('base_url')) {
    function base_url($path = '') {
        $cfg = include __DIR__ . '/../../config/config.php';
        $base = rtrim($cfg['base_url'], '/');
        $path = ltrim($path, '/');
        return $base . ($path ? '/' . $path : '');
    }
}

if (!function_exists('csrf_token')) {
    function csrf_token() {
        if (empty($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }
        return $_SESSION['csrf_token'];
    }
}

if (!function_exists('csrf_verify')) {
    function csrf_verify() {
        if (empty($_POST['_token']) || $_POST['_token'] !== $_SESSION['csrf_token']) {
            // Token mismatch, handle the error (e.g., redirect, display error message)
            header('HTTP/1.0 403 Forbidden');
            echo 'CSRF token mismatch';
            exit;
        }
    }
}

if (!function_exists('route')) {
    function route($name) {
        $cfg = include __DIR__ . '/../../config/config.php';
        $base = rtrim($cfg['base_url'], '/');
        $uri = Route::getNamed($name);
        $uri = ltrim($uri, '/');
        return $base . ($uri !== '' ? '/' . $uri : '/');
    }
}
