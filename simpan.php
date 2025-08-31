<?php
include 'koneksi.php'; // pakai file koneksi biar reusable

$nama = $_POST["nama"];
$umur = $_POST["umur"];
$hobi = $_POST["hobi"];

$sql = "INSERT INTO biodata (nama, umur, hobi) VALUES ('$nama', '$umur', '$hobi')";

if ($conn->query($sql) === TRUE) {
    echo "data berhasil disimpan! <a href='lihat.php'>lihat data</a>";
} else {
    echo "error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
