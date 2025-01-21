<?php
session_start();
require "../db/koneksi.php";

if ($_SERVER['REQUEST_METHOD'] === 'GET'){
    $nik = $_GET['nik'];

    $sql = "DELETE FROM masyarakat WHERE NIK=?";
    $row = $koneksi->execute_query($sql, [$nik]);
    if ($row){
        header("location:masyarakat.php");
    }
}
?>