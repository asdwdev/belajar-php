<?php
class Biodata
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getAll()
    {
        $sql = "SELECT * FROM biodata ORDER BY id DESC";
        return $this->conn->query($sql);
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM biodata WHERE id=$id";
        return $this->conn->query($sql)->fetch_assoc();
    }

    public function create($nama, $umur, $hobi)
    {
        $sql = "INSERT INTO biodata (nama, umur, hobi) VALUES ('$nama', '$umur', '$hobi')";
        return $this->conn->query($sql);
    }

    public function update($id, $nama, $umur, $hobi)
    {
        $sql = "UPDATE biodata SET nama='$nama', umur='$umur', hobi='$hobi' WHERE id=$id";
        return $this->conn->query($sql);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM biodata WHERE id=$id";
        return $this->conn->query($sql);
    }
}
