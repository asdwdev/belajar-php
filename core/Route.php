<?php
class Route
{
    private static $routes = [];

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
        self::$routes[] = [
            'method' => strtoupper($method),
            'path'   => trim($path, '/'),
            'action' => $action
        ];
    }

    public static function dispatch($basePath = '')
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        // kalau basePath kosong → ambil folder project, bukan /public
        if ($basePath === '') {
            $scriptName = str_replace('\\', '/', $_SERVER['SCRIPT_NAME']);
            $basePath   = str_replace('/public/index.php', '', $scriptName);
            $basePath   = rtrim($basePath, '/');
        }

        if ($basePath && strpos($uri, $basePath) === 0) {
            $uri = substr($uri, strlen($basePath));
        }

        $uri = trim($uri, '/');
        $method = $_SERVER['REQUEST_METHOD'];

        foreach (self::$routes as $route) {
            if ($route['method'] === $method && $route['path'] === $uri) {
                $action = $route['action'];

                if (is_callable($action)) {
                    return call_user_func($action);
                }

                if (is_array($action) && count($action) === 2) {
                    [$controller, $methodName] = $action;
                    $obj = new $controller($GLOBALS['conn']);
                    return call_user_func([$obj, $methodName]);
                }
            }
        }

        http_response_code(404);
        echo "404 - Halaman tidak ditemukan";
    }
}
