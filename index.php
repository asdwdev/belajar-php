<?php
include "koneksi.php";

// Ambil controller & action dari URL
$controllerName = $_GET['controller'] ?? 'biodata';
$action = $_GET['action'] ?? 'index';

// Ubah huruf pertama jadi kapital, lalu tambahin "Controller"
$controllerClass = ucfirst($controllerName) . "Controller";

// include controller sesuai nama
include "controllers/" . $controllerClass . ".php";

// Buat object controllernya
$controller = new $controllerClass($conn);

// Cek method ada atau nggak
if (method_exists($controller, $action)) {
    // Kalau POST, bisa langsung kirim data
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        call_user_func_array([$controller, $action], [$_POST]);
    } else {
        call_user_func_array([$controller, $action], [$_GET]);
    }
} else {
    echo "Action $action tidak ditemukan di $controllerClass";
}


// Pecah Satu-satu
// 1. method_exists($controller, $action)
// 👉 Ini ngecek:
// Apakah di dalam class controller ada method (function) dengan nama $action.


// 2. $_SERVER['REQUEST_METHOD']
// Ini ngecek request yang dikirim browser:
//      - "GET" → biasanya buka halaman (nampilin form / data).
//      - "POST" → biasanya kirim data (submit form).
// Makanya kita bikin 2 cabang:
//      - Kalau POST → ambil $_POST.
//      - Kalau GET → ambil $_GET.


// 3. call_user_func_array([$controller, $action], [$_POST])
// 👉 Ini cara PHP buat memanggil method dinamis.
// Biasanya kan kita manggil langsung:
//      $controller->index();
// Tapi karena nama method (index, edit, delete) itu dinamis (datang dari URL ?action=...), kita pakai fungsi PHP bawaan:
//      - [$controller, $action] → sama aja kayak $controller->namaMethod.
//      - [ $_POST ] → parameter yang mau dilempar ke function.
// Contoh konkret:
        // $controller = new BiodataController();
        // $action = "update";
        // call_user_func_array([$controller, $action], [$_POST]);
// → Sama aja kayak nulis:
        // $controller->update($_POST);

// 🔥 Ringkasnya
//      - method_exists → pastiin method ada.
//      - $_SERVER['REQUEST_METHOD'] → cek GET/POST.
//      - call_user_func_array → panggil method sesuai $action dari URL, sambil ngasih parameter ($_POST / $_GET).
