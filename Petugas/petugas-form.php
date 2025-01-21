<?php
session_start();
require "../db/koneksi.php";

if($_SERVER['REQUEST_METHOD'] === "POST"){
        $nama = $_POST ['Nama'];
        $username = $_POST ['username'];
        $password = $_POST ['password'];
        $telepon = $_POST ['telepon'];
        $level = $_POST['level'];
        $sql = "INSERT INTO petugas (nama_petugas, telepon, username, password, level) values (?, ?, ?, ?, ?)";
        $row = $koneksi->execute_query($sql, [$nama, $telepon, $username, $password, $level]);
        var_dump($row);
        if($row){
            header("location:petugas.php");
        }else{
            echo "<script>ALERT('Pendaftaran Berhasil!!') </script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register</title>
</head>
    <body>
        <h1>Tambah Babu Baru</h1>
        <form action="" method="post">
            <div class="form-item">
                <label for="level">level akses</label>
                <select name="level" id="level">
                    <option value="petugas">Petugas</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            <div class="form-item">
                <label for="Nama">Nama Lengkap</label>
                <input type="text" name="Nama" id="Nama">
            </div>
            <div class="form-item">
                <label for="telepon">Nomor Telepon</label>
                <input type="tel" name="telepon" id="telepon">
            </div>
            <div class="form-item">
                <label for="username">username</label>
                <input type="text" name="username" id="username">
            </div>
            <div class="form-item">
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
            </div>
            <button type="submit">
                Register
            </button>
            <a href="../admin/login_admin.php">Batal</a>
        </form>
    </body>
</html>