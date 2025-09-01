<?php
class Route
{
    private $routes = [];

    public static function get($path, $action)
    {
        self::addRoute('GET', $path, $action);
    }

    public static function post($path, $action)
    {
        self::addRoute('POST', $path, $action);
    }

    private static function addRoute($method, $path, $action)
    {
        global $routes;
        $routes[] = [
            'method' => strtoupper($method),
            'path'   => trim($path, '/'),
            'action' => $action
        ];
    }

    public static function dispatch($basePath = '')
    {
        global $routes;

        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        if ($basePath && strpos($uri, $basePath) === 0) {
            $uri = substr($uri, strlen($basePath));
        }

        $uri = trim($uri, '/');
        $method = $_SERVER['REQUEST_METHOD'];

        foreach ($routes as $route) {
            if ($route['method'] === $method && $route['path'] === $uri) {
                $action = $route['action'];

                // kalau callback function (closure)
                if (is_callable($action)) {
                    return call_user_func($action);
                }

                // kalau array [Controller::class, 'method']
                if (is_array($action) && count($action) === 2) {
                    [$controller, $methodName] = $action;
                    $obj = new $controller($GLOBALS['conn']); // inject koneksi
                    return call_user_func([$obj, $methodName]);
                }
            }
        }

        http_response_code(404);
        echo "404 - Halaman tidak ditemukan";
    }
}
