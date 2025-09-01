<?php

require_once "../models/Biodata.php";
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
        $nama = request()->get('nama', 'guest');
        $hobi = request()->post('hobi', 'tidur');
        $method = request()->method();

        $data = [
            "title" => "halaman biodata",
            "nama" => "arya",
            "hobi" => "ngoding",
            'method' => $method
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
