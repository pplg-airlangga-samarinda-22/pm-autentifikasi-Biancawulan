<?php
    session_start();
    require_once "./db/koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Pelaporan Pengaduan</title>
</head>
<body>
    <h1>Silahkan Untuk Memilih Role Anda</h1>
    <nav>
        <a href="./admin/login_admin.php">Admin</a>
        <a href="./masyarakat/index_masyarakat.php">Masyarakat</a>
    </nav>
</body>
</html>