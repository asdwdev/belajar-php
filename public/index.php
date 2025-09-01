<?php

require_once __DIR__ . '/../bootstrap/autoload.php';
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../routes/web.php';

// sekarang gak perlu hardcode
Route::dispatch();
