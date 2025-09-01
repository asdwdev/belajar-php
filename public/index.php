<?php
include "../koneksi.php";
include "../core/Route.php";
require_once "../autoload.php";

// load route definitions
include "../routes/web.php";

// setelah include routes, langsung jalanin dispatcher
Route::dispatch('/belajar-php');
