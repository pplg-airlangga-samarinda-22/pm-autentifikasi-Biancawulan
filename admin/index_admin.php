<?php
    session_start();
    require_once "../db/koneksi.php";
    if (empty($_SESSION['username'])){
        header("location:../admin/login_admin.php");
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
        <a href="index_admin.php">Dashboard</a>
        <a href="logout_admin.php">Logout</a>
    </nav>
</body>
</html>