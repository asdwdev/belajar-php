<?php
include "koneksi.php";
include "Route.php";
require_once "autoload.php";

// include semua controller
include "controllers/BiodataController.php";
include "controllers/UserController.php";

$router = new Route();

// ---- daftar route ----
Route::get('', function () {
    return view("welcome");
});

Route::get('biodata', [BiodataController::class, 'index']);

// -----------------------

$router->dispatch('/belajar-php'); // base path project kamu
