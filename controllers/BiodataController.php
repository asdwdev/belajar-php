<?php
include "models/Biodata.php";

class BiodataController
{
    private $model;

    public function __construct($db)
    {
        $this->model = new Biodata($db);
    }

    public function index()
    {
        $result = $this->model->getAll();
        include "views/list.php";
    }

    public function createForm()
    {
        include "views/form.php";
    }

    public function store($nama, $umur, $hobi)
    {
        $this->model->create($nama, $umur, $hobi);
        header("Location: index.php");
    }

    public function editForm($id)
    {
        $data = $this->model->getById($id);
        include "views/edit.php";
    }

    public function update($id, $nama, $umur, $hobi)
    {
        $this->model->update($id, $nama, $umur, $hobi);
        header("Location: index.php");
    }

    public function delete($id)
    {
        $this->model->delete($id);
        header("Location: index.php");
    }
}
