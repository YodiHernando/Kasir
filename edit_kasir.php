<?php
include_once("ceklogin.php");
include_once("koneksi.php");
cekAdmin();

$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user = $id");
$data = mysqli_fetch_assoc($query);

if (isset($_POST['simpan'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    mysqli_query($koneksi, "UPDATE user SET username='$username', password='$password' WHERE id_user=$id");
    header("Location: dashboard_admin.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kasir</title>
</head>
<body>
    <h1>Edit Kasir</h1>
    <form method="post">
        <label>Username:</label><br>
        <input type="text" name="username" value="<?= $data['username']; ?>"><br><br>

        <label>Password:</label><br>
        <input type="text" name="password" value="<?= $data['password']; ?>"><br><br>

        <button type="submit" name="simpan">Simpan</button>
    </form>
    <br>
    <a href="dashboard_admin.php">Kembali ke Dashboard</a>
</body>
</html>
