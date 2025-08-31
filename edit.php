<?php
include 'koneksi.php';

$id = $_GET["id"];
$sql = "SELECT * FROM biodata WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit biodata</title>
</head>

<body>

    <h2>edit biodata</h2>
    <form action="update.php" method="post">
        <input type="hidden" name="id" value="<?= $row['id']; ?>">
        nama: <input type="text" name="nama" value="<?= $row['nama']; ?>"><br><br>
        umur: <input type="number" name="umur" value="<?= $row['umur']; ?>"><br><br>
        hobi: <input type="text" name="hobi" value="<?= $row['hobi']; ?>"><br><br>
        <button type="submit">update</button>
    </form>

</body>

</html>