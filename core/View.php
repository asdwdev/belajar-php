<?php

class View
{
    public static function render($view, $data = [])
    {
        // extract array jadi variable
        extract($data);

        // ubah titik jadi slash: "biodata.index" -> "views/biodata/index.php"
        $viewFile = __DIR__ . '/../views/' . str_replace('.', '/', $view) . '.php';

        if (file_exists($viewFile)) {
            include $viewFile;
        } else {
            echo "View $viewFile tidak ditemukan!";
        }
    }
}
