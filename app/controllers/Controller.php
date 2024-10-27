<?php
require_once 'app/models/user.php';

class UserController
{
    private $userModel;

    public function __construct($dbConnection)
    {
        $this->userModel = new user($dbConnection);
    }

    public function index()
{
    // Ambil data pengguna dari model
    $users = $this->userModel->getAllUsers();

    // Pastikan variabel $users berisi array sebelum diteruskan ke view
    if (!$users) {
        $users = [];
    }

    // Buat view dan kirim data pengguna ke view
    require_once 'app/viwes/userView.php';
}

    // Metode untuk menampilkan detail pengguna berdasarkan ID
    public function show($id)
{
    $user = $this->userModel->getUserbyId($id); // Ambil data pengguna

    if ($user) {
        return $user; // Kembalikan data pengguna
    } else {
        return null; // Kembalikan null jika tidak ditemukan
    }
}

    // Metode untuk memperbarui data pengguna
    public function update($id, $name, $email)
    {
        if ($this->userModel->updateUser($id, $name, $email)) {
            header("Location: index.php?status=updated");
        } else {
            echo "Gagal memperbarui data.";
        }
    }

    // Metode untuk menghapus data pengguna
    public function delete($id)
    {
        if ($this->userModel->deleteUser($id)) {
            header("Location: index.php?status=deleted");
        } else {
            echo "Gagal menghapus data.";
        }
    }
    public function getUserModel() {
        return $this->userModel;
    }
}
?>
