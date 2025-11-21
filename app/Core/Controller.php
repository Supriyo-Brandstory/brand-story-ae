<?php

namespace App\Core;

use App\Core\Route; // Use the Route class

class Controller
{
    protected function view($view, $data = [])
    {
        extract($data, EXTR_SKIP);

        // Use same case for Views folder
        $viewPath = __DIR__ . '/../Views/' . $view . '.php';

        if (!file_exists($viewPath)) {
            throw new \Exception("View not found: {$viewPath}");
        }

        ob_start();
        include $viewPath;
        $content = ob_get_clean();

        // include layout from Views/layouts/layout.php (match case)
        $layoutPath = __DIR__ . '/../Views/layouts/frontend/layout.php';
        if (file_exists($layoutPath)) {
            include $layoutPath;
        } else {
            // fallback: directly echo content if layout missing
            echo $content;
        }
    }
    // ---------------------------
    // ADMIN VIEW (new)
    // ---------------------------
    protected function adminView($view, $data = [])
    {
        // Add current route name to data
        $data['currentRouteName'] = Route::$currentMatchedRouteName;
        extract($data, EXTR_SKIP);

        $viewPath = __DIR__ . '/../Views/admin/' . $view . '.php';

        if (!file_exists($viewPath)) {
            throw new \Exception("Admin view not found: {$viewPath}");
        }

        ob_start();
        include $viewPath;
        $content = ob_get_clean();

        $layoutPath = __DIR__ . '/../Views/layouts/admin/layout.php';
        if (file_exists($layoutPath)) {
            include $layoutPath;
        } else {
            echo $content;
        }
    }
    protected function singleView($view, $data = [])
    {
        extract($data, EXTR_SKIP);

        // Path: Views/{yourfile}.php
        $viewPath = __DIR__ . '/../Views/' . $view . '.php';

        if (!file_exists($viewPath)) {
            throw new \Exception("View not found: {$viewPath}");
        }

        include $viewPath; // no layout, directly print the file
    }
}
