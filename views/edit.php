<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit biodata</title>
</head>

<body>

    <h2>edit biodata</h2>
    <form action="index.php?action=edit" method="post">
        <input type="hidden" name="id" value="<?= $data['id']; ?>">
        nama: <input type="text" name="nama" value="<?= $data['nama']; ?>"><br><br>
        umur: <input type="number" name="umur" value="<?= $data['umur']; ?>"><br><br>
        hobi: <input type="text" name="hobi" value="<?= $data['hobi']; ?>"><br><br>
        <button type="submit">update</button>
    </form>

</body>

</html>