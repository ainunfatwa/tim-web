<?php
session_start();
include "koneksi.php";

if(isset($_SESSION['user'])){
    header("Location: tampilan.php");
    exit;
}

if(isset($_POST['username']) && isset($_POST['password'])){
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $query = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password'");

    if(mysqli_num_rows($query) > 0){
        $data = mysqli_fetch_array($query);
        $_SESSION['user'] = $data;
        header("Location: tampilan.php"); 
        exit; 
    } else {
        echo '<script>alert("Username atau Password Salah.");</script>';
    }
}


// Query untuk membuat tabel user jika belum ada
$sql_create_user = "CREATE TABLE IF NOT EXISTS `user` (
    `id_user` INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `nama` VARCHAR(255) NOT NULL,
    `username` VARCHAR(100) NOT NULL,
    `password` VARCHAR(32) NOT NULL
)";

// Eksekusi query
if ($koneksi->query($sql_create_user) === FALSE) {
    die("Error creating table user: " . $koneksi->error);
} else {
    echo "";
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Login Ke Web Reservasi Cafe ITH</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <form method="post">
        <table align="center">
            <tr>
                <td colspan="2" align="center">
                    <h3>Login</h3>
                </td>
            </tr>
            <tr>
                <td><i class="fas fa-user"></i></td>
                <td><input type="text" name="username" placeholder="Username"></td>
            </tr>
            <tr>
                <td><i class="fas fa-lock"></i></td>
                <td><input type="password" name="password" placeholder="Password"></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button type="submit" name="login">Login</button>
                    <a href="registrasi.php">Registrasi</a>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>