<?php

class View
{
    public static function render($view, $data = [])
    {
        // ambil file view, misal "biodata.index" jadi "views/biodata/index.php"
        $path = "views/" . str_replace('.', '/', $view) . ".php";

        if (!file_exists($path)) {
            throw new Exception("View $view tidak ditemukan");
        }

        // Extract data biar bisa dipakai langsung sebagai variabel
        extract($data);

        // Ambil isi file view
        $content = file_get_contents($path);

        // Parsing ala Blade: {{ $var }} -> <?= htmlspecialchars($var)
        $content = preg_replace('/\{\{\s*(.+?)\s*\}\}/', '<?= htmlspecialchars($1) ?>', $content);

        // Simpan ke file temporary
        $tmp = tempnam(sys_get_temp_dir(), 'view_') . ".php";
        file_put_contents($tmp, $content);

        // Include file hasil parsing
        include $tmp;

        // Hapus file temp
        unlink($tmp);
    }
}
