<!DOCTYPE html>
<html>
<head>
    <title>User Detail</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <h2>Daftar Pengguna</h2>
    <hr>
<!-- Tabel untuk menampilkan data pengguna -->
<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php
$nomor = 1; // Inisialisasi variabel $nomor

if (!empty($users) && is_array($users)) : ?>
    <?php foreach ($users as $user) : ?>
        <tr>
            <th scope="row"><?php echo $nomor++; ?></th>
            <td><?php echo htmlspecialchars($user['name']); ?></td>
            <td><?php echo htmlspecialchars($user['email']); ?></td>
            <td>
                <a href="edit.php?id=<?php echo $user['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="delete.php?id=<?php echo $user['id']; ?>&aksi=hapus" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                <a href="detail.php?id=<?php echo $user['id']; ?>" class="btn btn-info btn-sm">Detail</a>
            </td>
        </tr>
    <?php endforeach; ?>
<?php else : ?>
    <tr>
        <td colspan="4">Tidak ada data pengguna.</td>
    </tr>
<?php endif; ?>
        
    </tbody>
</table>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
