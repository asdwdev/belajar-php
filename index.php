<?php
include "koneksi.php";
// Ambil path dari URL, misal: user/edit/3
$path = $_GET['path'] ?? '';
$parts = explode('/', trim($path, '/'));

$controllerName = $parts[0] ?? '';
$controllerName = $controllerName !== '' ? $controllerName : 'biodata';

$action = $parts[1] ?? 'index';
$id = $parts[2] ?? null;

$controllerClass = ucfirst($controllerName) . "Controller";
include "controllers/$controllerClass.php";

$controller = new $controllerClass($conn);

if (method_exists($controller, $action)) {
    $controller->$action(['id' => $id]);
} else {
    echo "Action $action tidak ditemukan di $controllerClass";
}
