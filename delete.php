<?php
include 'koneksi.php';

$id = $_GET['id'];
$sql = "DELETE FROM biodata WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "data berhasil dihapus! <a href='lihat.php'>kembali</a>";
} else {
    echo "error: " . $conn->error;
}
