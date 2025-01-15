<?php
    session_start();
    require_once "../db/koneksi.php";
    if (empty($_SESSION['NIK'])){
        header("location:login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Pelaporan Pengaduan</title>
</head>
<body>
    <h1>Selamat Datang di Aplikasi Pengaduan Masyarakat</h1>
    <nav>
        <a href="index.php">Dashboard</a>
        <a href="aduan.php">Aduan</a>
        <a href="logout.php">Logout</a>
    </nav>
</body>
</html>