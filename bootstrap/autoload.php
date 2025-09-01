<?php

// Autoload semua file core
require_once __DIR__ . '/../core/helpers.php';
require_once __DIR__ . '/../core/Request.php';
require_once __DIR__ . '/../core/Route.php';
require_once __DIR__ . '/../core/View.php';

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
