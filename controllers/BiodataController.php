<?php

require_once "models/Biodata.php";
// require_once "core/View.php";

class BiodataController
{
    private $model;
    public function __construct($conn)
    {
        $this->model = new Biodata($conn);
    }

    public function index()
    {
        $data = [
            "title" => "halaman biodata",
            "nama" => "arya",
            "hobi" => "ngoding"
        ];

        return view("biodata.index", $data);
    }

    public function store()
    {
        redirect(url("biodata"));
    }

    // public function create($request = [])
    // {
    //     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //         $this->model->create($request['nama'], $request['umur'], $request['hobi']);
    //         header("Location: index.php?controller=biodata&action=index");
    //     } else {
    //         include "views/biodata/create.php";
    //     }
    // }

    // public function edit($data)
    // {
    //     var_dump($data);
    // }
}
