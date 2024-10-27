<?php
require_once 'config/database.php';
require_once 'app/models/user.php';
require_once 'app/controllers/Controller.php';

// Koneksi ke database
$dbConnection = getDBConnection();

// Mendapatkan parameter ID dari URL
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Membuat instance UserController
$controller = new UserController($dbConnection);

// Mendapatkan data pengguna berdasarkan ID
$user = $controller->show($id);

if (!$user) {
    echo "Pengguna tidak ditemukan untuk ID: " . htmlspecialchars($id);
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Detail Pengguna</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-3">
    <h1>Detail Pengguna</h1>
    <hr>
    
    <!-- Menampilkan detail pengguna dalam tabel -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo htmlspecialchars($user['id']); ?></td>
                <td><?php echo htmlspecialchars($user['name']); ?></td>
                <td><?php echo htmlspecialchars($user['email']); ?></td>
            </tr>
        </tbody>
    </table>

    <a href="index.php" class="btn btn-primary">Kembali</a>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
