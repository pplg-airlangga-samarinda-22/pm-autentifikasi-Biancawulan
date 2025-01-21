<?php
    session_start();
    require "../db/koneksi.php";

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $nik = $_GET['nik'];
        $sql = "SELECT * FROM masyarakat where nik=?";
        $row = $koneksi->execute_query($sql, [$nik])->fetch_assoc();
        $nama = $row['Nama'];
        $username = $row['username'];
        $telepon = $row['Telepon'];
    }elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nik = $_GET['nik'];
        $nama = $_POST ['Nama'];
        $telepon = $_POST['Telepon'];

        $sql = "UPDATE masyarakat SET Nama=? , Telepon=? WHERE nik=?";
        $row = $koneksi->execute_query($sql, [$nama, $telepon, $nik]);
        if ($row){
            header("location:masyarakat.php");
        }
    }
?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>Edit-masyarakat</title>
    </head>
    <body>
        <h1>Edit masyarakat</h1>
        <form action="" method="post">
            <div class="form-item">
                <label for="nik">nik</label>
                <input type="text" name="nik" id="nik" value="<?=$nik ?>" disabled>
            </div>
            <div class="form-item">
                <label for="Nama">Nama</label>
                <input type="text" name="Nama" id="Nama" value="<?=$nama ?>">
            </div>
            <div class="form-item">
                <label for="telepon">telepon</label>
                <input type="tel" name="telepon" id="telepon" value="<?=$telepon ?>">
            </div>
            <div class="form-item">
                <label for="username">username</label>
                <input type="text" name="username" id="username" value="<?=$username ?>" disabled>
            </div>
            <button type="submit">Kirim</button>

            <a href="masyarakat.php">batal</a>
        </form>
    </body>
    </html>