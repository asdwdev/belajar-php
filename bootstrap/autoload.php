<?php

// Autoload semua file core
require_once __DIR__ . '/../core/helpers.php';
require_once __DIR__ . '/../core/Request.php';
require_once __DIR__ . '/../core/Route.php';
require_once __DIR__ . '/../core/View.php';

// Tambahkan Composer autoload (supaya bisa pakai vlucas/phpdotenv)
require_once __DIR__ . '/../vendor/autoload.php';

// Load .env file
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

// Autoload controllers & models
spl_autoload_register(function ($class) {
    $paths = [
        __DIR__ . '/../controllers/' . $class . '.php',
        __DIR__ . '/../models/' . $class . '.php',
    ];

    foreach ($paths as $path) {
        if (file_exists($path)) {
            require_once $path;
            return;
        }
    }
});
