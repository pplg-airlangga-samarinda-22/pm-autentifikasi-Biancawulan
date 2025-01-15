<?php
require "../db/koneksi.php";

if($_SERVER['REQUEST_METHOD']=== "POST"){
    $id = $_POST['id_petugas'];

    // pengecekkan data id telah terdaftar 
    $sql = "SELECT * FROM petugas WHERE id_petugas=?";
    $cek = $koneksi->execute_query($sql, [$id]);

    if (mysqli_num_rows($cek) == 1){
        echo "<script>alert('id Telah Digunakan!')</script>";
    }else{
        $nama = $_POST ['Nama'];
        $telepon = $_POST ['Telepon'];
        $username = $_POST ['username'];
        $password = md5($_POST ['password']);
        $sql = "INSERT INTO petugas SET id_petugas=?, nama_petugas=?, telepon=?, username=?, password=?";
        $koneksi->execute_query($sql, [$id, $nama, $telepon, $username, $password]);
        echo "<script>ALERT('Pendaftaran Berhasil!!') </script>";
        header("location:login_admin.php");
        }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Regiter</title>
</head>
    <body>
        <form action="" method="post">
            <div class="form-item">
                <label for="id_petugas">id</label>
                <input type="text" name="id_petugas" id="id_petugas">
            </div>
            <div class="form-item">
                <label for="Nama">Nama Lengkap</label>
                <input type="text" name="Nama" id="Nama">
            </div>
            <div class="form-item">
                <label for="Telepon">Nomor Telepon</label>
                <input type="tel" name="Telepon" id="Telepon">
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
            <a href="login_admin.php">Batal</a>
        </form>
    </body>
</html>