<?php
include 'db_config.php';

session_start();

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM meja";
$result = $conn->query($sql);

if ($result === FALSE) {
    die("Error executing query: " . $conn->error);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="meja.css">
    <title>Daftar Meja Cafe</title>
</head>
<body>
    <h1>Daftar Meja Cafe</h1>

    <div class="container">
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<div class='meja'>";
                echo "<h3>Nomor Meja: " . $row["nomor_meja"] . "</h3>";
                echo "<p>Lokasi: " . $row["lokasi"] . "</p>";
                echo "<p>Lantai: " . $row["lantai"] . "</p>";
                echo "<p>Kapasitas: " . $row["kapasitas"] . "</p>";
                echo "<p>Status: " . $row["status"] . "</p>";

                echo "<form method='get' action='reservasi_meja.php'>";
                echo "<input type='hidden' name='meja_id' value='" . $row["id"] . "'>";
                echo "<button type='submit'>Pilih Meja</button>";
                echo "</form>";

                echo "</div>";
            }
        } else {
            echo "<p>Tidak ada data meja.</p>";
        }
        ?>
    </div>

    <?php
    $conn->close();
    ?>
</body>
</html>
