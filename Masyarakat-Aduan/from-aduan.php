<?php
    session_start();
    require "../db/koneksi.php";

    if ($_SERVER['REQUEST_METHOD'] === "POST"){
        var_dump($_POST );
        $tanggal = date('Y-m-d');
        $nik = $_SESSION['NIK'];
        $laporan = $_POST['laporan'];
        $foto = (isset($_FILES['foto']))?$_FILES['foto']['name']:"";
        $status = 0;

        $sql = "INSERT INTO pengaduan (tgl_pengaduan, NIK, isi_laporan, foto, status) values (?, ?, ?, ?, ?)";
        $row = $koneksi->execute_query($sql, [$tanggal, $nik, $laporan, $foto, $status]);

        if (!empty($foto)){
            move_uploaded_file($_FILES['foto']['tmp_name'], 'gambar/'.$_FILES['foto']['name']);
        }

        if ($koneksi){
            echo "<script>alert('Pengaduan baru telah berhasil disimpan!')</script>";
            header("location:aduan.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tambah Aduan</title>
</head>
<body>
    <h1>Tambbah aduan</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-item">
            <label for="laporan">Isi Laporan</label>
            <textarea name="laporan" id="laporan"></textarea>
        </div>
        <div class="form-item">
            <label for="foto">  Foto Pendukung </label>
            <input type="file" name="foto" id="foto">
        </div>
        <button type="submit">Kirim</button>
    </form>
</body>
</html>

