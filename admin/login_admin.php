<?php
require "../db/koneksi.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $sql = "SELECT * FROM petugas WHERE username=? AND password=?";
    $row = $koneksi->execute_query($sql, [$username, $password])->fetch_assoc();

    
    if ($row) {
        session_start();
        $_SESSION ['id'] = $row['id_petugas'];
        $_SESSION ['level'] = $row['level'];
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
    <h1>LOGIN DULU LE</h1>
    <form action="" method="post" class="form-login">
        <p>Silahkan Login</p>
    <!-- USERNAME -->
        <div class="form-item">
            <label for="username">Username</label>
            <input type="text" name="username" id="username">
        </div>
    <!-- PASSWORD -->
        <div class="form-item">
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
        </div>

        <button type="submit">Login</button>
    </form>
</body>
</html>