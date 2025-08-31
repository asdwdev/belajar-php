<?php
if (!function_exists("view")) {
    function view($view, $data = [])
    {
        return View::render($view, $data);
    }
}

if (!function_exists("redirect")) {
    function redirect($url)
    {
        header("location: " . $url);
        exit;
    }
}

if (!function_exists("url")) {
    function url($path = '')
    {
        // otomatis ambil base URL project
        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https" : "http";
        $host = $_SERVER['HTTP_HOST'];
        $scriptName = str_replace("/index.php", "", $_SERVER['SCRIPT_NAME']);
        return $protocol . "://" . $host . $scriptName . "/" . ltrim($path, "/");
    }
}

function request()
{
    static $request = null;
    if ($request === null) {
        $request = new Request();
    }
    return $request;
}
