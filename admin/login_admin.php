<?php
require "../db/koneksi.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id = $_POST['id_petugas'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    //fungsi execute_query
    $sql = "SELECT * FROM petugas WHERE id_petugas=? AND username=? AND password=?";
    $row = $koneksi->execute_query($sql, [$id, $username, $password]);

    
    if (mysqli_num_rows($row) == 1){
        session_start();
        $_SESSION['username'] = $username;
        header("Location:index_admin.php");
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
            <label for="id_petugas">ID</label>
            <input type="text" name="id_petugas" id="required">
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
    </form>
</body>
</html>