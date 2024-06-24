<?php
session_start();
include 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['checkout']) && $_POST['checkout'] == "true") {
        header("Location: reservasi_menu.php");
        exit();
    } else {
        $menu_id = $_POST["menu_id"];
        $menu_type = $_POST["menu_type"];
        $quantity = $_POST["quantity"];
        $submitType = $_POST["submitType"];

        if ($submitType == "pesan") {
            $_SESSION['menu_id'] = $menu_id;
            $_SESSION['menu_type'] = $menu_type;
            $_SESSION['quantity'] = $quantity;
            header("Location: reservasi_menu.php");
            exit();
        } else if ($submitType == "tambah_ke_keranjang") {
            $item = [
                'menu_id' => $menu_id,
                'menu_type' => $menu_type,
                'quantity' => $quantity
            ];

            if (!isset($_SESSION['keranjang'])) {
                $_SESSION['keranjang'] = [];
            }

            $_SESSION['keranjang'][] = $item;
            header("Location: menu.php");
            exit();
        }
    }
}
?>