<?php
namespace App\Console\Commands;

class MakeMiddleware
{
    public function handle($name = null)
    {
        if (!$name) {
            echo "Middleware name required. Example: php command make:middleware AdminAuth\n";
            return;
        }

        $class = ucfirst($name);
        $dir = __DIR__ . '/../../Middleware';
        if (!is_dir($dir)) mkdir($dir, 0777, true);

        $file = $dir . '/' . $class . '.php';

        if (file_exists($file)) {
            echo "Middleware {$class} already exists.\n";
            return;
        }

        $template = <<<PHP
<?php
namespace App\Middleware;

class {$class}
{
    public function handle()
    {
        if (session_status() === PHP_SESSION_NONE) session_start();

        // example: check a session key
        // if (!isset(\$_SESSION['admin_logged'])) {
        //     header('Location: /admin/login'); exit;
        // }
    }
}
PHP;
        file_put_contents($file, $template);
        echo "Middleware created: app/Middleware/{$class}.php\n";
    }
}
