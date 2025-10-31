<?php
namespace App\Core;

class Route
{
    private static $routes = []; // ['GET' => ['' => 'HomeController@index', 'about' => 'AboutController@index']]
    private static $names = [];  // ['home' => '']

    public static function get($path, $action, $name = null)
    {
        $p = trim($path, '/'); // '' for home, 'about' for about
        self::$routes['GET'][$p] = $action;
        if ($name) self::$names[$name] = $p;
    }

    public static function dispatch()
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $uri = trim($uri, '/'); // '' or 'about'
        $method = $_SERVER['REQUEST_METHOD'];

        $routeAction = self::$routes[$method][$uri] ?? null;
        if (!$routeAction) {
            // try fallback: if uri empty and there's route registered as ''
            if ($uri === '' && isset(self::$routes[$method][''])) {
                $routeAction = self::$routes[$method][''];
            }
        }

        if (!$routeAction) {
            http_response_code(404);
            // Optional: include a 404 view if exists
            if (file_exists(__DIR__ . '/../Views/404.php')) {
                include __DIR__ . '/../Views/404.php';
            } else {
                echo '<h1>404 - Page not found</h1>';
            }
            exit;
        }

        // action format: Controller@method
        if (is_array($routeAction) && count($routeAction) === 2) {
            // allow array style too ['HomeController','index']
            [$controllerName, $methodName] = $routeAction;
        } else {
            [$controllerName, $methodName] = explode('@', $routeAction);
        }

        $controllerClass = "App\\Controllers\\{$controllerName}";
        $controllerFile = __DIR__ . "/../Controllers/{$controllerName}.php";
        if (!file_exists($controllerFile)) {
            http_response_code(500);
            echo "Controller file not found: {$controllerName}";
            exit;
        }
        require_once $controllerFile;
        $controller = new $controllerClass();
        // call method
        if (!method_exists($controller, $methodName)) {
            http_response_code(500);
            echo "Method {$methodName} not found in controller {$controllerName}";
            exit;
        }
        return $controller->$methodName();
    }

    public static function getNamed($name)
    {
        return self::$names[$name] ?? '/';
    }
}
