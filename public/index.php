<?php
// Use composer's autoload if present
$composerAutoload = __DIR__ . '/../vendor/autoload.php';
if (file_exists($composerAutoload)) {
    require $composerAutoload;
} else {
    // Basic autoloader fallback for development without composer
    spl_autoload_register(function ($class) {
        $prefix = 'App\\';
        $base_dir = __DIR__ . '/../app/';
        $len = strlen($prefix);
        if (strncmp($prefix, $class, $len) !== 0) {
            return;
        }
        $relative_class = substr($class, $len);
        $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';
        if (file_exists($file)) {
            require $file;
        }
    });
}

// Start session for all requests
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// load helpers (route() and base_url())
require_once __DIR__ . '/../app/Core/helpers.php';

// load routes and run the app
require_once __DIR__ . '/../routes/web.php';

use App\Core\App;
$app = new App();
$app->run();
