<?php
session_start();
require "../db/koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Data-Masyarakat</title>
</head>
<body>
    <h1>Data Masyarakat</h1>
    <a href="../admin/index_admin.php"> << Kembali </a>
    <a href="masyarakat-form.php">Tambah Masyarakat</a>
    <table>
        <thead>
            <th>No</th>
            <th>NIK</th>
            <th>Nama</th>
            <th>Username</th>
            <th>Telepon</th>
            <th>Aksi</th>
        </thead>
        <tbody>
            <?php
                $no = 0;
                $sql = "SELECT * FROM masyarakat";
                $rows = $koneksi->execute_query($sql)->fetch_all(MYSQLI_ASSOC);
                foreach ($rows as $row){
            ?>
            <tr>
                <td><?=++$no?></td>
                <td><?=$row['NIK']?></td>
                <td><?=$row['Nama']?></td>
                <td><?=$row['username']?></td>
                <td><?=$row['Telepon']?></td>
                <td>
                    <a href="masyarakat-edit.php?nik=<?=$row['NIK']?>">Edit</a>
                    <a href="masyarakat-hapus.php?nik=<?=$row['NIK']?>">Hapus</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <a href="../admin/index_admin.php"></a>
</body>
</html>