<?php
require "../db/koneksi.php";

if($_SERVER['REQUEST_METHOD']=== "POST"){
    $nik = $_POST['NIK'];

    // pengecekkan data nik telah terdaftar 
    $sql = "SELECT * FROM masyarakat WHERE NIK=?";
    $cek = $koneksi->execute_query($sql, [$nik]);

    if (mysqli_num_rows($cek) == 1){
        echo "<script>alert('NIK Telah Digunakan!')</script>";
    }else{
        $nama = $_POST ['Nama'];
        $telepon = $_POST ['Telepon'];
        $username = $_POST ['username'];
        $password = md5($_POST ['password']);
        $sql = "INSERT INTO masyarakat SET NIK=?, Nama=?, Telepon=?, username=?, password=?";
        $koneksi->execute_query($sql, [$nik, $nama, $telepon, $username, $password]);
        echo "<script>ALERT('Pendaftaran Berhasil!!') </script>";
        header("location:login.php");
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
                <label for="NIK">NIK</label>
                <input type="text" name="NIK" id="NIK">
            </div>
            <div class="form-item">
                <label for="Nama">Nama Lengkap</label>
                <input type="text" name="Nama" id="Nama">
            </div>
            <div class="form-item">
                <label for="Telepon">Nomor Telepon</label>
                <input type="text" name="Telepon" id="Telepon">
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
            <a href="login.php">Batal</a>
        </form>
    </body>
</html>