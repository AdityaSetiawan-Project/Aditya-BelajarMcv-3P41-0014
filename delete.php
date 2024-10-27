<?php
require_once 'config/database.php';
require_once 'app/controllers/Controller.php';

// Inisialisasi koneksi ke database dan controller
$dbConnection = getDBConnection();
$controller = new UserController($dbConnection);

// Mendapatkan ID pengguna dari URL
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Jika ID valid, lakukan penghapusan
if ($id > 0) {
    // Panggil metode delete dari UserController
    $controller->delete($id);
} else {
    echo "ID pengguna tidak valid.";
}
$controller->delete($id);
?>
