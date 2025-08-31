<?php
include "koneksi.php";

$sql = "SELECT * FROM biodata ORDER BY id DESC";
$result = $conn->query($sql);

// var_dump($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>daftar biodata</title>
</head>

<body>
    <h2>daftar biodata</h2>
    <a href="form.php">tambah data</a>
    <hr>

    <?php if ($result->num_rows > 0) : ?>
        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Umur</th>
                <th>Hobi</th>
                <th>aksi</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()) : ?>
                <tr>
                    <td><?= $row["id"]; ?></td>
                    <td><?= $row["nama"]; ?></td>
                    <td><?= $row["umur"]; ?></td>
                    <td><?= $row["hobi"]; ?></td>
                    <td>
                        <a href="edit.php?id=<?= $row["id"]; ?>">edit</a>
                        <a href="delete.php?id=<?= $row['id']; ?>" onclick="return confirm('yakin mau hapus?');">delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php else: ?>
        <p>belum ada data.</p>
    <?php endif; ?>
</body>

</html>