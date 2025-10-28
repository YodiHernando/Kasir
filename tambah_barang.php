<?php
if(isset($_POST['simpan'])){
    include_once ("koneksi.php");
    $nama_barang = $_POST['nama_barang'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok']; 

    $query = mysqli_query($koneksi, "INSERT INTO barang (nama_barang, harga, stok) VALUES ('$nama_barang', '$harga', '$stok')");
    if($query){
        echo "<script>alert('Barang berhasil ditambahkan.'); window.location.href='dashboard_admin.php'</script>";
    }   else    {
        echo "<script>alert('Barang gagal ditambahkan.'); window.location.href='dashboard_admin.php'</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Barang</title>
</head>
<body>
    <h2>Tambah Barang</h2>
    <form method="post">
    <label>Nama Barang :</label>
    <input type="text" name="nama_barang"><br>
    <label>Harga :</label>
    <input type="number" name="harga"><br>
    <label>Stok :</label>
    <input type="number" name="stok"><br>
    <button type="submit" name="simpan">Simpan</button>
    </form>
</body>
</html>