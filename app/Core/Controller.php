<?php
namespace App\Core;

class Controller
{
    protected function view($view, $data = [])
    {
        extract($data, EXTR_SKIP);

        // Correct relative path (from app/Core to /views)
        $viewPath = __DIR__ . '/../Views/' . $view . '.php';

        if (!file_exists($viewPath)) {
            throw new \Exception("View not found: {$viewPath}");
        }

        ob_start();
        include $viewPath;
        $content = ob_get_clean();

        include __DIR__ . '/../views/layouts/layout.php';
    }
}
