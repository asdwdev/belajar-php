<?php
class Request
{
    private $get;
    private $post;
    private $server;

    public function __construct()
    {
        $this->get = $_GET;
        $this->post = $_POST;
        $this->server = $_SERVER;
    }

    public function all()
    {
        return array_merge($this->get, $this->post);
    }

    public function get($key, $default = null)
    {
        return $this->get[$key] ?? $default;
    }

    public function post($key, $default = null)
    {
        return $this->post[$key] ?? $default;
    }

    public function input($key, $default = null)
    {
        return $this->post[$key] ?? $this->get[$key] ?? $default;
    }

    public function method()
    {
        return $this->server['REQUEST_METHOD'] ?? 'GET';
    }

    public function uri()
    {
        return strtok($this->server['REQUEST_URI'], '?'); // ambil path tanpa query
    }
}
