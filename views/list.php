<h2>Daftar Biodata</h2>
<a href="index.php?action=create">Tambah Data</a>
<br><br>
<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Umur</th>
        <th>Hobi</th>
        <th>Aksi</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id']; ?></td>
            <td><?= $row['nama']; ?></td>
            <td><?= $row['umur']; ?></td>
            <td><?= $row['hobi']; ?></td>
            <td>
                <a href="index.php?action=edit&id=<?= $row['id']; ?>">Edit</a> |
                <a href="index.php?action=delete&id=<?= $row['id']; ?>" onclick="return confirm('Yakin hapus?')">Delete</a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>