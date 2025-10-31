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

if (!function_exists('route')) {
    function route($name) {
        $cfg = include __DIR__ . '/../../config/config.php';
        $base = rtrim($cfg['base_url'], '/');
        $uri = Route::getNamed($name);
        $uri = ltrim($uri, '/');
        return $base . ($uri !== '' ? '/' . $uri : '/');
    }
}
