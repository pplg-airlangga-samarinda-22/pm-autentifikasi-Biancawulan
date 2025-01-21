<?php
    session_start();
    require "../db/koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Pengaduan</title>
</head>
<body>
    <h1>Halaman Pengaduan</h1>
    <a href="from-aduan.php">Tambah</a>

    <table>
        <thead>
            <th>NO</th>
            <th>Tanggal</th>
            <th>Laporan</th>
            <th>Status</th>
            <th>Aksi</th>
        </thead>

        <tbody>
            <?php
            $nik = $_SESSION['NIK'];
            $no = 0;
            $sql = "SELECT * FROM pengaduan WHERE NIK=? order by id_pengaduan desc";
            $pengaduan = $koneksi->execute_query($sql, [$nik])-> fetch_all(MYSQLI_ASSOC);
            foreach($pengaduan as $item){
            ?>
            <tr>
                <td><?= ++$no; ?></td>
                <td><?= $item['tgl_pengaduan']; ?></td>
                <td><?= $item['isi_laporan'] ?></td>
                <td><?= ($item ['status'] == '0')?'menunggu':(($item['status'] == 'proses')?'diproses':'selesai') ?></td>
                <td><a href='edit_aduan.php?id=<?=$item['id_pengaduan']?>'>Edit</a></td>
            </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
</body>
</html>