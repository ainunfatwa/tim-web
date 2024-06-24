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

    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $item) {
            $menu_id = $item['menu_id'];
            $menu_type = $item['menu_type'];
            $quantity = $item['quantity'];

            $sql = "INSERT INTO reservasi_menu (menu_id, menu_type, name, phone, address, quantity) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);

            if ($stmt === FALSE) {
                die("Error preparing statement: " . $conn->error);
            }

            $stmt->bind_param("issssi", $menu_id, $menu_type, $name, $phone, $address, $quantity);

            if ($stmt->execute() === TRUE) {
                echo "Reservasi menu berhasil dibuat.";
            } else {
                echo "Error: " . $stmt->error;
            }

            $stmt->close();
        }

        unset($_SESSION['cart']);
    }

    $conn->close();

    session_unset();
    session_destroy();
}
?>