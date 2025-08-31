<?php
class Router
{
    private $routes = [];

    public function add($method, $path, $callback)
    {
        $this->routes[] = [
            'method' => strtoupper($method),
            'path' => trim($path, '/'),
            'callback' => $callback
        ];
    }

    public function dispatch($basePath = '')
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        // buang base path (misal: /belajar-php)
        if ($basePath && strpos($uri, $basePath) === 0) {
            $uri = substr($uri, strlen($basePath));
        }

        $uri = trim($uri, '/');
        $method = $_SERVER['REQUEST_METHOD'];

        foreach ($this->routes as $route) {
            if ($route['method'] === $method && $route['path'] === $uri) {
                return call_user_func($route['callback']);
            }
        }

        http_response_code(404);
        echo "404 - Halaman tidak ditemukan";
    }
}
