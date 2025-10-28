<?php
include_once("ceklogin.php");
include_once("koneksi.php");
cekAdmin();

$id = $_GET['id'];
mysqli_query($koneksi, "DELETE FROM barang WHERE id_barang='$id'");

header("Location: dashboard_admin.php")
?>