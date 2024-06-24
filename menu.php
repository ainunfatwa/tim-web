<?php
include 'db_config.php';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="menu.css">
    <title>Menu Cafe</title>
</head>
<body>
    <section class="cart" id="cart-section">
        <h2>Keranjang Belanja</h2>
        <div id="cart-items">
            <?php
            if (isset($_SESSION['keranjang']) && count($_SESSION['keranjang']) > 0) {
                foreach ($_SESSION['keranjang'] as $item) {
                    echo "<p>ID Menu: " . $item['menu_id'] . ", Tipe: " . $item['menu_type'] . ", Jumlah: " . $item['quantity'] . "</p>";
                }
            } else {
                echo "<p>Keranjang belanja kosong</p>";
            }
            ?>
        </div>
        <form method="post" action="proses_order.php">
            <input type="hidden" name="checkout" value="true">
            <button type="submit" class="btn green waves-effect waves-light">Checkout</button>
        </form>
    </section>
    <div class="navbar">
        <a href="#" id="food-link" onclick="showFoodMenu()">Menu Makanan</a>
        <a href="#" id="drink-link" onclick="showDrinkMenu()">Menu Minuman</a>
    </div>
    <h1>Menu Cafe</h1>
    <div id="menu-container">
        <!-- Bagian Menu Makanan -->
        <div id="menu-makanan" class="menu-section">
            <h2 id="makanan">Makanan</h2>
            <div class="menu-container">
                <?php
                $sql_makanan = "SELECT * FROM menu_makanan";
                $result_makanan = $conn->query($sql_makanan);

                if ($result_makanan === FALSE) {
                    die("Error executing query: " . $conn->error);
                }

                if ($result_makanan->num_rows > 0) {
                    while($row = $result_makanan->fetch_assoc()) {
                        echo "<div class='menu-item'>";
                        echo "<h3>" . $row["name"] . "</h3>";
                        echo "<p>Price: Rp " . number_format($row["price"], 2) . "</p>";
                        echo "<img src='" . $row["image"] . "' alt='" . $row["name"] . "'>";
                        echo "<form method='post' action='proses_order.php' class='pesan-sekarang-form'>";
                        echo "<input type='hidden' name='menu_id' value='" . $row["id"] . "'>";
                        echo "<input type='hidden' name='menu_type' value='makanan'>";
                        echo "<input type='hidden' name='submitType' value=''>";
                        echo "<label for='quantity_" . $row["id"] . "'>Jumlah:</label>";
                        echo "<input type='number' id='quantity_" . $row["id"] . "' name='quantity' min='1' max='10' value='1'>";
                        echo "<button type='button' onclick='submitForm(this, \"tambah_ke_keranjang\")'>Tambah ke Keranjang</button>";
                        echo "<button type='button' onclick='submitForm(this, \"pesan\")'>Pesan Sekarang</button>";
                        echo "</form>";
                        echo "</div>";
                    }
                } else {
                    echo "No menu items found.";
                }
                ?>
            </div>
        </div>

        <!-- Bagian Menu Minuman -->
        <div id="menu-minuman" class="menu-section" style="display: none;">
            <h2 id="minuman">Minuman</h2>
            <div class="menu-container">
                <?php
                $sql_minuman = "SELECT * FROM menu_minuman";
                $result_minuman = $conn->query($sql_minuman);

                if ($result_minuman === FALSE) {
                    die("Error executing query: " . $conn->error);
                }

                if ($result_minuman->num_rows > 0) {
                    while($row = $result_minuman->fetch_assoc()) {
                        echo "<div class='menu-item'>";
                        echo "<h3>" . $row["name"] . "</h3>";
                        echo "<p>Price: Rp " . number_format($row["price"], 2) . "</p>";
                        echo "<img src='" . $row["image"] . "' alt='" . $row["name"] . "'>";
                        echo "<form method='post' action='proses_order.php' class='pesan-sekarang-form'>";
                        echo "<input type='hidden' name='menu_id' value='" . $row["id"] . "'>";
                        echo "<input type='hidden' name='menu_type' value='minuman'>";
                        echo "<input type='hidden' name='submitType' value=''>";
                        echo "<label for='quantity_" . $row["id"] . "'>Jumlah:</label>";
                        echo "<input type='number' id='quantity_" . $row["id"] . "' name='quantity' min='1' max='10' value='1'>";
                        echo "<button type='button' onclick='submitForm(this, \"tambah_ke_keranjang\")'>Tambah ke Keranjang</button>";
                        echo "<button type='button' onclick='submitForm(this, \"pesan\")'>Pesan Sekarang</button>";
                        echo "</form>";
                        echo "</div>";
                    }
                } else {
                    echo "No menu items found.";
                }

                $conn->close();
                ?>
            </div>
        </div>
    </div>

    <script>
    function submitForm(button, submitType) {
        var form = button.closest('form');
        form.querySelector('input[name="submitType"]').value = submitType;
        form.submit();
    }

    function showFoodMenu() {
        document.getElementById('menu-makanan').style.display = 'block';
        document.getElementById('menu-minuman').style.display = 'none';
    }

    function showDrinkMenu() {
        document.getElementById('menu-makanan').style.display = 'none';
        document.getElementById('menu-minuman').style.display = 'block';
    }
    </script>
</body>
</html>