<?php
class UserController
{
    public function index()
    {
        echo "Halaman user index";
    }

    public function profile($request = [])
    {
        echo "Ini halaman profile user dengan id: " . ($request['id'] ?? 'unknown');
    }
}
