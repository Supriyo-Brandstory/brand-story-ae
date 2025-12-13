<?php

use App\Core\Route;
use App\Core\Database; // Add Database use

if (!function_exists('base_url')) {
    function base_url($path = '')
    {
        $cfg = include __DIR__ . '/../../config/config.php';
        $base = rtrim($cfg['base_url'], '/');
        $path = ltrim($path, '/');
        return $base . ($path ? '/' . $path : '');
    }
}

if (!function_exists('csrf_token')) {
    function csrf_token()
    {
        if (empty($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }
        return '<input type="hidden" name="_token" value="' . $_SESSION['csrf_token'] . '">';
    }
}

if (!function_exists('csrf_token_input')) {
    function csrf_token_input()
    {
        return csrf_token();
    }
}

if (!function_exists('csrf_verify')) {
    function csrf_verify()
    {
        if (empty($_POST['_token']) || $_POST['_token'] !== $_SESSION['csrf_token']) {
            // Token mismatch, handle the error (e.g., redirect, display error message)
            header('HTTP/1.0 403 Forbidden');
            echo 'CSRF token mismatch';
            exit;
        }
    }
}

if (!function_exists('route')) {
    function route($name, $params = [])
    {
        $cfg = include __DIR__ . '/../../config/config.php';
        $base = rtrim($cfg['base_url'], '/');
        $uri = Route::getNamed($name, $params);
        $uri = ltrim($uri, '/');
        return $base . ($uri !== '' ? '/' . $uri : '/');
    }
}

if (!function_exists('generateUniqueSlug')) {
    function generateUniqueSlug(string $text, object $modelInstance): string
    {
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $text), '-'));
        $originalSlug = $slug;
        $counter = 1;

        while ($modelInstance->query("SELECT COUNT(*) FROM {$modelInstance->getTableName()} WHERE slug = ?", [$slug])[0]['COUNT(*)'] > 0) {
            $slug = $originalSlug . '-' . $counter++;
        }

        return $slug;
    }
}

if (!function_exists('handleImageUpload')) {
    function handleImageUpload($file, $folder = 'blog')
    {
        $uploadPath = 'assets/images/' . $folder . '/';
        $targetDir = __DIR__ . '/../../public/' . $uploadPath;
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0755, true);
        }

        $fileName = time() . '_' . basename($file['name']);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'webp');
        if (in_array(strtolower($fileType), $allowTypes)) {
            if (move_uploaded_file($file['tmp_name'], $targetFilePath)) {
                return $uploadPath . $fileName;
            }
        }
        return null;
    }
}

if (!function_exists('getSeoForPage')) {
    function getSeoForPage()
    {
        try {
            $uri = $_SERVER['REQUEST_URI'] ?? '/';
            // Parse URL to remove query strings
            $parsedUrl = parse_url($uri);
            $path = $parsedUrl['path'] ?? '/';

            // Ensure leading slash
            if ($path !== '/' && substr($path, -1) === '/') {
                $path = rtrim($path, '/');
            }
            if (substr($path, 0, 1) !== '/') {
                $path = '/' . $path;
            }

            // Use Seo Model
            $seoModel = new \App\Models\Seo();
            // Since find() works on ID, we use query() for custom where
            $result = $seoModel->query("SELECT * FROM seo WHERE page_url = ? LIMIT 1", [$path]);

            return $result[0] ?? null;
        } catch (Exception $e) {
            return null; // Fail silently on frontend
        }
    }
}
