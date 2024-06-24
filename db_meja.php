<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cafe_ith";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conn->set_charset("utf8");

if (!$conn->select_db($dbname)) {
    die("Database selection failed: " . $conn->error);
}

// Kode untuk membuat tabel meja
$sql_create_meja = "CREATE TABLE IF NOT EXISTS meja (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nomor_meja VARCHAR(50) NOT NULL,
    lokasi VARCHAR(50) NOT NULL,
    lantai INT NOT NULL,
    kapasitas INT NOT NULL,
    status ENUM('tersedia', 'dipesan') NOT NULL DEFAULT 'tersedia'
)";
if ($conn->query($sql_create_meja) === FALSE) {
    die("Error creating table meja: " . $conn->error);
}

// Buat tabel reservasi_meja 
$sql_create_reservasi_meja = "CREATE TABLE IF NOT EXISTS reservasi_meja (
    id INT AUTO_INCREMENT PRIMARY KEY,
    meja_id INT NOT NULL,
    nama_pemesan VARCHAR(100) NOT NULL,
    nomor_telepon VARCHAR(20) NOT NULL,
    alamat TEXT NOT NULL,
    tanggal_reservasi DATE NOT NULL,
    waktu_reservasi TIME NOT NULL,
    FOREIGN KEY (meja_id) REFERENCES meja(id)
)";
if ($conn->query($sql_create_reservasi_meja) === FALSE) {
    die("Error creating table reservasi_meja: " . $conn->error);
}

$sql_check_meja = "SELECT COUNT(*) AS count FROM meja";
$result_check_meja = $conn->query($sql_check_meja);
$row_meja = $result_check_meja->fetch_assoc();
if ($row_meja['count'] == 0) {
    $sql_insert_meja = "INSERT INTO meja (nomor_meja, lokasi, lantai, kapasitas, status) VALUES 
    ('M1', 'indoor', 1, 2, 'tersedia'),
    ('M2', 'indoor', 1, 4, 'tersedia'),
    ('M3', 'indoor', 1, 8, 'tersedia'),
    ('M4', 'indoor', 1, 12, 'tersedia'),
    ('M5', 'outdoor', 1, 2, 'tersedia'),
    ('M6', 'outdoor', 1, 4, 'tersedia'),
    ('M7', 'outdoor', 1, 8, 'tersedia'),
    ('M8', 'outdoor', 1, 12, 'tersedia'),
    ('M9', 'indoor', 2, 2, 'tersedia'),
    ('M10', 'indoor', 2, 4, 'tersedia'),
    ('M11', 'indoor', 2, 8, 'tersedia'),
    ('M12', 'indoor', 2, 12, 'tersedia'),
    ('M13', 'outdoor', 2, 2, 'tersedia'),
    ('M14', 'outdoor', 2, 4, 'tersedia'),
    ('M15', 'outdoor', 2, 8, 'tersedia'),
    ('M16', 'outdoor', 2, 12, 'tersedia')";
    if ($conn->query($sql_insert_meja) === FALSE) {
        die("Error inserting data into meja: " . $conn->error);
    }
}

return $conn;
?>
