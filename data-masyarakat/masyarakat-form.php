<?php
session_start();
require "../db/koneksi.php";

if ($_SERVER['REQUEST_METHOD']  === "POST"){
    $nik = $_POST['NIK'];
    $sql = "SELECT * FROM masyarakat WHERE NIK=?";
    $cek = $koneksi->execute_query($sql, [$nik]);
    if ($cek->num_rows == 1){
        echo "<script>alert('NIK sudah digunakan')</script>";
    }else{
        $nama = $_POST ['Nama'];
        $telepon = $_POST ['Telepon'];
        $username = $_POST ['username'];
        $password = md5($_POST ['password']);
        $sql = "INSERT INTO masyarakat (NIK, Nama, Telepon, username, password) values (?, ?, ?, ?, ?)";
        $row = $koneksi->execute_query($sql, [$nik, $nama, $telepon, $username, $password]);
        echo "<script>alert('Pendaftaran Berhasil')</script>";
        header("location: masyarakat.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tambah Rakyat</title>
</head>
<body>
    <h1>Tambah data Rakyat</h1>
    <form action="" method="post">
        <div class="form-item">
            <label for="NIK"> NIK</label>
            <input type="text" name="NIK" id="NIK">
        </div>
        <div class="form-item">
            <label for="Nama"> Nama</label>
            <input type="text" name="Nama" id="Nama">
        </div>
        <div class="form-item">
            <label for="Telepon"> Telepon</label>
            <input type="tel" name="Telepon" id="Telepon">
        </div>
        <div class="form-item">
            <label for="username"> username</label>
            <input type="text" name="username" id="username">
        </div>
        <div class="form-item">
            <label for="password"> password</label>
            <input type="password" name="password" id="password">
        </div>
        <button type="submit">Register</button>
        <a href="masyarakat.php">Batal</a>
    </form>
</body>
</html>