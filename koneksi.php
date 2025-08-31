<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "belajar_db";

$conn = new mysqli($host, $user, $pass, $db);

// cek koneksi
// if ($conn->connect_error) {
//     die("koneksi gagal: " . $conn->connect_error);
// } else {
//     echo "database sudah terhubung dengan baik!";
// }
