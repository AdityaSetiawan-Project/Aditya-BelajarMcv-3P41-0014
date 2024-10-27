<?php
require_once 'config/database.php';
require_once 'app/controllers/Controller.php';

// Inisialisasi koneksi ke database dan controller
$dbConnection = getDBConnection();
$controller = new UserController($dbConnection);

// Mendapatkan ID pengguna dari URL
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$userModel = $controller->getUserModel(); // Mengakses userModel melalui metode
$user = $userModel->getUserbyId($id); // Menggunakan userModel untuk mendapatkan data pengguna

// Cek apakah data user ada
if (!$user) {
    echo "Pengguna tidak ditemukan.";
    exit;
}

// Jika form disubmit, lakukan update
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];

    // Panggil metode update dari UserController
    $controller->update($id, $name, $email);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit User</h2>
        <form method="POST" action="">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($user['id']); ?>">

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($user['name']); ?>" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="index.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
