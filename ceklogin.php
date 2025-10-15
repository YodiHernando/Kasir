<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit;
}

function cekAdmin() {
    if ($_SESSION["role"] != "admin") {
        echo "<script>alert('Akses ditolak! Halaman ini hanya untuk Admin.'); window.location.href='dashboard_kasir.php';</script>";
        exit;
    }
}

function cekKasir() {
    if ($_SESSION["role"] != "kasir") {
        echo "<script>alert('Akses ditolak! Halaman ini hanya untuk Kasir.'); window.location.href='dashboard_admin.php';</script>";
        exit;
    }
}
?>
