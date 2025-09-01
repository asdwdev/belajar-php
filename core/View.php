<?php
class View
{
    public static function render($view, $data = [])
    {
        $basePath = __DIR__ . '/../views/'; // ambil folder views di root project
        $path = $basePath . str_replace('.', '/', $view) . ".php";

        if (!file_exists($path)) {
            throw new Exception("View $view tidak ditemukan di $path");
        }

        extract($data);

        $content = file_get_contents($path);

        $content = preg_replace('/\{\{\s*(.+?)\s*\}\}/', '<?= htmlspecialchars($1) ?>', $content);

        $tmp = tempnam(sys_get_temp_dir(), 'view_') . ".php";
        file_put_contents($tmp, $content);

        include $tmp;

        unlink($tmp);
    }
}
