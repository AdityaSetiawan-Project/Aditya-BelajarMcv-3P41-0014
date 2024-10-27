<?php
require_once 'config/database.php';
require_once 'app/controllers/Controller.php';

// Koneksi ke database
$dbConnection = getDBConnection();

// Membuat instance UserController
$controller = new UserController($dbConnection);

// Memanggil metode index untuk menampilkan semua data pengguna
$controller->index();
?>



