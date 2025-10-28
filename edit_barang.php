<?php
include_once("ceklogin.php");
include_once("koneksi.php");
cekAdmin();

$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM barang WHERE id_barang = $id");
$data = mysqli_fetch_assoc($query);

if (isset($_POST['simpan'])) {
    $nama_barang = $_POST['nama_barang'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    mysqli_query($koneksi, "UPDATE barang SET nama_barang='$nama_barang', harga='$harga', stok = '$stok' WHERE id_barang=$id");
    header("Location: dashboard_admin.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Barang</title>
</head>
<body>
    <h1>Edit Barang</h1>
    <form method="post">
        <label>Nama Barang:</label><br>
        <input type="text" name="nama_barang" value="<?= $data['nama_barang']; ?>"><br><br>

        <label>Harga :</label><br>
        <input type="number" name="harga" value="<?= $data['harga']; ?>"><br><br>

        <label>Stok :</label><br>
        <input type="number" name="stok" value="<?= $data['stok']; ?>"><br><br>

        <button type="submit" name="simpan">Simpan</button>
    </form>
    <br>
    <a href="dashboard_admin.php">Kembali ke Dashboard</a>
</body>
</html>
