<?php
namespace App\Core;

class Route
{
    private static $routes = [];         // ['GET' => ['/admin/dashboard' => ['action'=>..., 'middleware'=>['AdminAuth']]]
    private static $names = [];
    private static $currentMiddleware = [];

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
        $uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
        $method = $_SERVER['REQUEST_METHOD'];

        $routes = self::$routes[$method] ?? [];

        foreach ($routes as $route => $data) {

            $action = $data['action'];
            $middlewareList = $data['middleware'];

            $pattern = preg_replace('/\{([^\/]+)\}/', '([^/]+)', $route);
            $pattern = '#^' . $pattern . '$#';

            if (preg_match($pattern, $uri, $matches)) {

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

                $controllerClass = "App\\Controllers\\{$controllerName}";
                $controllerFile = __DIR__ . "/../Controllers/{$controllerName}.php";

                if (!file_exists($controllerFile)) {
                    echo "Controller not found: {$controllerName}";
                    exit;
                }

                require_once $controllerFile;
                $controller = new $controllerClass();

                if (!method_exists($controller, $methodName)) {
                    echo "Method {$methodName} not found in {$controllerName}";
                    exit;
                }

                return $controller->$methodName(...$matches);
            }
        }

        http_response_code(404);
        echo "<h1>404 Not Found</h1>";
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
