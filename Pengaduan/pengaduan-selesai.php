<?php
session_start();
require "../db/koneksi.php";

if($_SERVER['REQUEST_METHOD'] === 'GET'){
    $id = $_GET['id'];
    $sql = "SELECT * FROM pengaduan WHERE id_pengaduan=?";
    $row = $koneksi->execute_query($sql, [$id])-> fetch_assoc();
    $nik = $row['NIK'];
    $laporan = $row['isi_laporan'];
    $foto = $row['foto'];
    $status = $row['status'];
}elseif ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id_petugas = $_SESSION['id'];
    $id_pengaduan = $_GET['id'];
    $tanggal = date('Y-m-d');
    $tanggapan = $_POST['tanggapan'];
    $status = 'selesai';

    //UPDATE x PENGADUAN
    $sql = "UPDATE pengaduan SET status=? WHERE id_pengaduan=?";
    $row = $koneksi->execute_query($sql, [$status, $id_pengaduan]);

    //KIRIM TANGGA PAN
    $sql = "INSERT INTO tanggapan (id_pengaduan, tgl_tanggapan, tanggapan,id_petugas) values (?, ?, ?, ?)";
    $row = $koneksi->execute_query($sql, [$id_pengaduan, $tanggal, $tanggapan, $id_petugas]);

        header("location:pengaduan.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>tanggapi-pengaduan</title>
</head>

<body>
<h1>Tanggapi Pengaduan</h1>
    <a href="pengaduan.php">Kembali</a>
    <form action="" method="post">
        <div class="form-item">
            <label for="laporan">Isi Laporan</label>
            <textarea name="laporan" id="laporan" readonly><?= $laporan ?></textarea>
        </div>

        <div class="form-item">
            <label for="foto">foto pendukung</label>
            <img src="../Masyarakat-Aduan/gambar/<?= $foto ?>" alt="" width="250px">
        </div>
        <div class="form-item">
            <label for="tanggapan">tanggapan</label>
            <textarea name="tanggapan" id="tanggapan"></textarea>
        </div>
        <button type="submit" name="selesai">kirim tangga</button>
    </form>
</body>
</html>