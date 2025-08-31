<?php
include "koneksi.php";
include "controllers/BiodataController.php";

$controller = new BiodataController($conn);

$action = $_GET['action'] ?? 'index';

switch ($action) {
    case 'create':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->store($_POST['nama'], $_POST['umur'], $_POST['hobi']);
        } else {
            $controller->createForm();
        }
        break;
    case 'edit':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->update($_POST['id'], $_POST['nama'], $_POST['umur'], $_POST['hobi']);
        } else {
            $controller->editForm($_GET['id']);
        }
        break;
    case 'delete':
        $controller->delete($_GET['id']);
        break;
    default:
        $controller->index();
        break;
}
