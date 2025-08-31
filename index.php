<?php
include "koneksi.php";
include "Router.php";
require_once "autoload.php";

// include semua controller
include "controllers/BiodataController.php";
include "controllers/UserController.php";

$router = new Router();

// ---- daftar route ----
// root
$router->add('GET', '', function () {
    return view("welcome");
});


// biodata
$router->add('GET', 'biodata', function () use ($conn) {
    $controller = new BiodataController($conn);
    $controller->index();
});

$router->add('GET', 'biodata/create', function () use ($conn) {
    $controller = new BiodataController($conn);
    $controller->createForm();
});

$router->add('POST', 'biodata/store', function () use ($conn) {
    $controller = new BiodataController($conn);
    $controller->store($_POST['nama'], $_POST['umur'], $_POST['hobi']);
});

// user
$router->add('GET', 'user', function () use ($conn) {
    $controller = new UserController($conn);
    $controller->index();
});

// -----------------------

$router->dispatch('/belajar-php'); // base path project kamu
