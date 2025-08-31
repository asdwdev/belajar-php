<?php
require_once "models/Biodata.php";

class BiodataController
{
    private $model;
    public function __construct($conn)
    {
        $this->model = new Biodata($conn);
    }

    public function index()
    {
        $data = $this->model->getAll();
        include "views/biodata/index.php";
    }

    public function create($request = [])
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->create($request['nama'], $request['umur'], $request['hobi']);
            header("Location: index.php?controller=biodata&action=index");
        } else {
            include "views/biodata/create.php";
        }
    }

    public function edit($data)
    {
        var_dump($data);
    }
}
