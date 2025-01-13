<?php
require "./db/koneksi.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nik = $_POST['NIK'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    //fungsi execute_query
    $sql = "SELECT * FROM masyarakat WHERE NIK=? AND username=? AND password=?";
    $row = $koneksi->execute_query($sql, [$nik, $username, $password]);

    
    if (mysqli_num_rows($row) == 1){
        session_start();
        $_SESSION['NIK'] = $nik;
        header("Location:index.php");
    }else{
        echo"<script>alert('Gagal Login!')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
</head>
<body>
    <form action="" method="post" class="form-login">
        <p>Silahkan Login</p>
    <!-- NIK -->
        <div class="form-item">
            <label for="nik">NIK</label>
            <input type="text" name="nik" id="required">
        </div>
    <!-- USERNAME -->
        <div class="form-item">
            <label for="username">Username</label>
            <input type="text" name="username" id="required">
        </div>
    <!-- PASSWORD -->
        <div class="form-item">
            <label for="password">Password</label>
            <input type="text" name="password" id="required">
        </div>

        <button type="submit">Login</button>
        <a href="register.php">Register</a>
    </form>
</body>
</html>