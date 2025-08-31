<?php
include "koneksi.php";

$id = $_POST["id"];
$nama = $_POST["nama"];
$umur = $_POST["umur"];
$hobi = $_POST["hobi"];

$sql = "UPDATE biodata SET nama='$nama', umur='$umur', hobi='$hobi' WHERE id=$id";

if ($conn->query($sql) ===  TRUE) {
    echo "data berhasil diupdate! <a href='lihat.php'>kembali</a>";
} else {
    echo "error: " . $conn->error;
}
