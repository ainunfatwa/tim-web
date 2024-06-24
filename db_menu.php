<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cafe_ith";

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql_create_db = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql_create_db) === FALSE) {
    die("Error creating database: " . $conn->error);
}

$conn->select_db($dbname);

// Kode untuk membuat tabel menu_makanan
$sql_create_menu_makanan = "CREATE TABLE IF NOT EXISTS menu_makanan (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    image VARCHAR(255) NOT NULL
)";
if ($conn->query($sql_create_menu_makanan) === FALSE) {
    die("Error creating table menu_makanan: " . $conn->error);
}

// Kode untuk membuat tabel menu_minuman
$sql_create_menu_minuman = "CREATE TABLE IF NOT EXISTS menu_minuman (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    image VARCHAR(255) NOT NULL
)";
if ($conn->query($sql_create_menu_minuman) === FALSE) {
    die("Error creating table menu_minuman: " . $conn->error);
}

// Kode untuk membuat tabel orders
$sql_create_orders = "CREATE TABLE IF NOT EXISTS orders (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    phone VARCHAR(15) NOT NULL,
    address TEXT NOT NULL,
    menu_id INT(6) UNSIGNED NOT NULL,
    menu_type ENUM('makanan', 'minuman') NOT NULL,
    quantity INT(3) NOT NULL
)";
if ($conn->query($sql_create_orders) === FALSE) {
    die("Error creating table orders: " . $conn->error);
}

$sql_check_menu_makanan = "SELECT COUNT(*) AS count FROM menu_makanan";
$result_check_menu_makanan = $conn->query($sql_check_menu_makanan);
$row_menu_makanan = $result_check_menu_makanan->fetch_assoc();
if ($row_menu_makanan['count'] == 0) {
    $sql_insert_menu_makanan = "INSERT INTO menu_makanan (name, price, image) VALUES 
    ('Ayam Geprek', 15000, 'image/ayam geprek.jpeg'),
    ('Bakso', 18000, 'image/bakso.jpg'),
    ('Banana Roll', 10000, 'image/banana roll.jpg'),
    ('Burger', 10000, 'image/burger.jpg'),
    ('Chicken Katsu', 18000, 'image/chicken katsu.jpg'),
    ('Dimsum Ayam', 20000, 'image/dimsum ayam.jpeg'),
    ('Donat', 15000, 'image/donat.jpeg'),
    ('Kentang', 15000, 'image/kentang.jpg'),
    ('Mie Goreng', 18000, 'image/mie goreng.jpg'),
    ('Nasi Goreng', 15000, 'image/nasi goreng.jpeg'),
    ('Pisang Nugget', 10000, 'image/pisang nugget.jpg'),
    ('Rice Bowl Chicken', 15000, 'image/rice bowl chicken.jpg'),
    ('Sosis Bakar', 10000, 'image/sosis bakar.jpeg'),
    ('Spaghetti', 20000, 'image/spaghetti.jpg')";
    if ($conn->query($sql_insert_menu_makanan) === FALSE) {
        die("Error inserting data into menu_makanan: " . $conn->error);
    }
}

$sql_check_menu_minuman = "SELECT COUNT(*) AS count FROM menu_minuman";
$result_check_menu_minuman = $conn->query($sql_check_menu_minuman);
$row_menu_minuman = $result_check_menu_minuman->fetch_assoc();
if ($row_menu_minuman['count'] == 0) {
    $sql_insert_menu_minuman = "INSERT INTO menu_minuman (name, price, image) VALUES 
    ('Cappucino', 15000, 'image/cappucino.jpeg'),
    ('Caramel Latte', 15000, 'image/caramel latte.jpg'),
    ('Chocolate', 13000, 'image/chocolate.jpeg'),
    ('Dalgona Coffe', 18000, 'image/dalgona coffe.jpg'),
    ('Green Tea', 13000, 'image/greentea.jpeg'),
    ('Hazelnut Latte', 15000, 'image/hazelnut latte.jpg'),
    ('Jus Alpukat', 18000, 'image/jus alpukat.jpg'),
    ('Lemon Tea', 10000, 'image/lemon tea.jpeg'),
    ('Milk Shake Oreo', 18000, 'image/milk shake oreo.jpg'),
    ('Milk Tea', 15000, 'image/milk tea.jpg'),
    ('Nutella', 15000, 'image/nutella.jpg'),
    ('Smoothies Mangga', 18000, 'image/smoothies mangga.jpeg'),
    ('Smoothies Strawberry', 15000, 'image/smoothies strawberry.jpeg'),
    ('Thai Tea', 15000, 'image/thai tea.jpeg')";
    if ($conn->query($sql_insert_menu_minuman) === FALSE) {
        die("Error inserting data into menu_minuman: " . $conn->error);
    }
}

$conn->close();
?>