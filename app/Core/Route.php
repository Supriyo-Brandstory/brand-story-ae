<?php

namespace App\Core;

class Route
{
    private static $routes = [];
    private static $names = [];
    private static $currentMiddleware = [];
    public static $currentMatchedRouteName = null;

    /* --------------------------------
        ROUTE REGISTER METHODS
    ---------------------------------*/

    public static function get($path, $action, $name = null)
    {
        self::addRoute('GET', $path, $action, $name);
    }

    public static function post($path, $action, $name = null)
    {
        self::addRoute('POST', $path, $action, $name);
    }

    public static function middleware($middleware, $callback)
    {
        $middlewares = is_array($middleware) ? $middleware : [$middleware];

        $previous = self::$currentMiddleware;
        self::$currentMiddleware = array_merge(self::$currentMiddleware, $middlewares);

        $callback();

        self::$currentMiddleware = $previous;
    }

    private static function addRoute($method, $path, $action, $name)
    {
        $path = trim($path, '/');

        self::$routes[$method][$path] = [
            'action' => $action,
            'middleware' => self::$currentMiddleware
        ];

        if ($name) {
            self::$names[$name] = $path;
        }
    }


    /* --------------------------------
        DISPATCH ROUTE
    ---------------------------------*/

    public static function dispatch()
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        // Load config to get base_url
        $configPath = __DIR__ . '/../../config/config.php';
        if (file_exists($configPath)) {
            $config = require $configPath;
            if (isset($config['base_url'])) {
                $basePath = parse_url($config['base_url'], PHP_URL_PATH);

                // If base_url has a path (subdirectory), strip it from URI
                if ($basePath && $basePath !== '/') {
                    $basePath = rtrim($basePath, '/');
                    if (stripos($uri, $basePath) === 0) {
                        $uri = substr($uri, strlen($basePath));
                    }
                }
            }
        }

        // Fallback to script directory detection if config approach didn't change anything
        // or if config wasn't found (though it should be)
        $scriptDir = dirname($_SERVER['SCRIPT_NAME']);
        $scriptDir = str_replace('\\', '/', $scriptDir);
        if ($scriptDir !== '/' && stripos($uri, $scriptDir) === 0) {
            $uri = substr($uri, strlen($scriptDir));
        }

        $uri = trim($uri, '/');
        $method = $_SERVER['REQUEST_METHOD'];

        $routes = self::$routes[$method] ?? [];

        foreach ($routes as $route => $data) {

            $action = $data['action'];
            $middlewareList = $data['middleware'];

            $pattern = preg_replace('/\{([^\/]+)\}/', '([^/]+)', $route);
            $pattern = '#^' . $pattern . '$#';

            if (preg_match($pattern, $uri, $matches)) {
                // Store the name of the matched route
                // Use array_search to find the route name from its path
                self::$currentMatchedRouteName = array_search(trim($route, '/'), self::$names);

                array_shift($matches);

                /* 🔥 Run Middleware First */
                foreach ($middlewareList as $mw) {
                    $mwClass = "App\\Middleware\\{$mw}";
                    $mwFile = __DIR__ . "/../Middleware/{$mw}.php";

                    if (file_exists($mwFile)) {
                        require_once $mwFile;
                        $m = new $mwClass();
                        $m->handle();
                    }
                }

                /* Run Controller */
                [$controllerName, $methodName] =
                    is_array($action) ? $action : explode('@', $action);

                // Full qualified class name for the controller
                // If $controllerName is 'Admin\AdminController', it becomes 'App\Controllers\Admin\AdminController'
                // If $controllerName is 'FrontendController', it becomes 'App\Controllers\FrontendController'
                $fullControllerClass = "App\\Controllers\\{$controllerName}";

                // Convert namespace backslashes to directory slashes for the file path
                $controllerFilePath = __DIR__ . "/../Controllers/" . str_replace('\\', '/', $controllerName) . ".php";

                if (!file_exists($controllerFilePath)) {
                    echo "Controller not found: {$fullControllerClass}"; // Show full class name for clarity
                    exit;
                }

                require_once $controllerFilePath;
                $controller = new $fullControllerClass();

                if (!method_exists($controller, $methodName)) {
                    echo "Method {$methodName} not found in {$controllerName}";
                    exit;
                }

                return $controller->$methodName(...$matches);
            }
        }

        http_response_code(404);
        // Call your controller's notfound() method
        $controllerClass = "App\\Controllers\\FrontendController";
        $controllerFile = __DIR__ . "/../Controllers/FrontendController.php";

        if (file_exists($controllerFile)) {
            require_once $controllerFile;
            $controller = new $controllerClass();
            return $controller->notfound();
        } else {
            echo '<h1>404 - Page not found</h1>';
        }
        exit;
    }


    /* --------------------------------
        ROUTE GROUP
    ---------------------------------*/

    public static function group($attributes, $callback)
    {
        $prefix = trim($attributes['prefix'] ?? '', '/');

        $beforeRoutes = self::$routes;
        $beforeNames = self::$names;

        self::$routes = [];
        self::$names = [];

        $callback();

        $groupedRoutes = [];
        $groupedNames = [];

        foreach (self::$routes as $method => $routes) {
            foreach ($routes as $path => $data) {
                $newPath = trim($prefix . '/' . trim($path, '/'), '/');
                $groupedRoutes[$method][$newPath] = $data;
            }
        }

        foreach (self::$names as $name => $path) {
            $groupedNames[$name] = trim($prefix . '/' . trim($path, '/'), '/');
        }

        self::$routes = array_replace_recursive($beforeRoutes, $groupedRoutes);
        self::$names  = array_replace_recursive($beforeNames, $groupedNames);
    }


    /* --------------------------------
        GET NAMED URL
    ---------------------------------*/

    public static function getNamed($name, $params = [])
    {
        if (!isset(self::$names[$name])) return '/';

        $path = self::$names[$name];

        foreach ($params as $key => $value) {
            $path = str_replace("{{$key}}", $value, $path);
        }

        return '/' . trim($path, '/');
    }
}
