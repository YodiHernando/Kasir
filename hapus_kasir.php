<?php
include_once("ceklogin.php");
include_once("koneksi.php");
cekAdmin();

$id = $_GET['id'];
mysqli_query($koneksi, "DELETE FROM user WHERE id_user='$id'");

header("Location: dashboard_admin.php")
?>