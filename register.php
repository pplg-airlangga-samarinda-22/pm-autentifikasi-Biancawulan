<?php
require "./db/koneksi.php";

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