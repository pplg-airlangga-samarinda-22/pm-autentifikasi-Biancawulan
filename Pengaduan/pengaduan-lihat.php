<?php
    session_start();
    require "../db/koneksi.php";

    if ($_SERVER['REQUEST_METHOD'] === 'GET'){
        $id = $_GET['id'];
        $sql = "SELECT * FROM pengaduan WHERE id_pengaduan=?";
        $row = $koneksi ->execute_query($sql, [$id])->fetch_assoc();
        $nik = $row['NIK'];
        $laporan = $row['isi_laporan'];
        $foto = $row['foto'];
        $status = $row['status'];
    
        $sql = "SELECT * FROM tanggapan WHERE id_pengaduan=?";
        $row = $koneksi->execute_query($sql,[$id]) ->fetch_assoc();
        $tanggal_tanggapan = $row['tgl_tanggapan'];
        $tanggapan = $row['tanggapan'];
        $id_petugas = $row['id_petugas'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        </div><br>
        <div class="form-item">
            <label for="tgl_tanggapan">tanggal tanggapan</label>
            <input type="date" name="tgl_tanggapan" id="tgl_tanggapan" value="<?=$tanggal_tanggapan?>" disabled> 
        </div>

        <div class="form-item">
            <label for="tanggapan">tanggapan</label>
            <textarea name="tanggapan" id="tanggapan" readonly><?=$tanggapan?></textarea>
        </div>
        <a href="pengaduan.php">balikin tangga</a>
    </form>
</body>
</html>