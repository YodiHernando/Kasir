<?php
include_once("ceklogin.php");
include_once("koneksi.php");
cekAdmin();

$query = mysqli_query($koneksi, "SELECT * FROM user WHERE role = 'kasir' ORDER BY id_user");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
</head>
<body>
    <h1>Selamat Datang, <?= $_SESSION["username"]; ?> (<?= $_SESSION["role"]; ?>)</h1>
    <hr>

    <h2>Kelola Data Kasir</h2>
    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>ID User</th>
                <th>Username</th>
                <th>Password</th>
                <th>Role</th>
                <th>Edit</th>
                <th>Hapus</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($data = mysqli_fetch_assoc($query)) : ?>
                <tr>
                    <td><?= $data['id_user']; ?></td>
                    <td><?= $data['username']; ?></td>
                    <td><?= $data['password']; ?></td>
                    <td><?= $data['role']; ?></td>
                    <td><a href="edit_kasir.php?id=<?= $data['id_user']; ?>">Edit</a></td>
                    <td><a href="hapus_kasir.php?id=<?= $data['id_user']; ?>" onclick="return confirm('Yakin ingin menghapus kasir ini?');">Hapus</a></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <hr>

    <h2>Kelola Data Barang</h2>


    <hr>

    <h2>Laporan Penjualan</h2>


    <hr>

    <a href="logout.php">Logout</a>
</body>
</html>
