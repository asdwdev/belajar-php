<?php

// include semua controller
include "../controllers/BiodataController.php";
include "../controllers/UserController.php";

Route::get('', function () {
    return view("welcome");
});

Route::get('biodata', [BiodataController::class, 'index']);
