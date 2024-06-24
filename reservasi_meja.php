<?php
session_start();
include 'db_config.php'; 

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['meja_id'])) {
    $meja_id = $_GET['meja_id'];

    $_SESSION['selected_meja_id'] = $meja_id;
}

if (!isset($_SESSION['selected_meja_id'])) {
    echo "Tidak ada meja yang dipilih untuk reservasi.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="reservasi_meja.css">
    <title>Reservasi Meja</title>
</head>
<body>
    <h2></h2>
    <form action="proses_pesanan_meja.php" method="POST">
        <label for="name">Nama:</label><br>
        <input type="text" id="name" name="name" required><br><br>

        <label for="phone">Nomor Telepon:</label><br>
        <input type="text" id="phone" name="phone" required><br><br>

        
        <label for="address">Alamat:</label><br>
        <textarea id="address" name="address" rows="4" required></textarea><br><br>
        
        <label for="date">Tanggal Reservasi</label>
        <input type="date" id="date" name="date" required>

        <label for="time">Waktu</label>
        <input type="time" id="time" name="time" required>

        <input type="submit" value="Reservasi Meja">
    </form>
</body>
</html>
