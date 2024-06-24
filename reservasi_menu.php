<?php
session_start();
include 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if (isset($_SESSION['keranjang'])) {
        foreach ($_SESSION['keranjang'] as $item) {
            $menu_id = $item['menu_id'];
            $menu_type = $item['menu_type'];
            $quantity = $item['quantity'];

            $sql = "INSERT INTO orders (name, phone, address, menu_id, menu_type, quantity) VALUES ('$name', '$phone', '$address', '$menu_id', '$menu_type', '$quantity')";

            if ($conn->query($sql) !== TRUE) {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
        unset($_SESSION['keranjang']);
        echo "";
    } else {
        echo "Keranjang belanja kosong.";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="reservasi_menu.css">
    <title>Reservasi Menu</title>
</head>
<body>
    <h1></h1>
    <form method="post" action="reservasi_menu.php">
        <label for="name">Nama:</label>
        <input type="text" id="name" name="name" required><br>

        <label for="phone">No. Telepon:</label>
        <input type="text" id="phone" name="phone" required><br>

        <label for="address">Alamat:</label>
        <input type="text" id="address" name="address" required><br>

        <button type="submit">Kirim</button>
    </form>
</body>
</html>
