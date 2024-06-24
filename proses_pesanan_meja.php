<?php
session_start();
include 'db_meja.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['name'], $_POST['phone'], $_POST['address'], $_SESSION['selected_meja_id'])) {
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        $meja_id = $_SESSION['selected_meja_id'];

        $name = mysqli_real_escape_string($conn, $name);
        $phone = mysqli_real_escape_string($conn, $phone);
        $address = mysqli_real_escape_string($conn, $address);

        // Query untuk menyimpan pesanan meja ke dalam tabel reservasi_meja
        $sql = "INSERT INTO reservasi_meja (meja_id, nama_pemesan, nomor_telepon, alamat, tanggal_reservasi, waktu_reservasi) 
                VALUES ($meja_id, '$name', '$phone', '$address', '$date', '$time')";

        if ($conn->query($sql) === TRUE) {
            $sql_update_status = "UPDATE meja SET status = 'dipesan' WHERE id = $meja_id";
            if ($conn->query($sql_update_status) === FALSE) {
                echo "Error updating meja status: " . $conn->error;
            } else {
                echo "Reservasi meja berhasil.";
                unset($_SESSION['selected_meja_id']);
            }
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Form reservasi tidak lengkap.";
    }
} else {
    echo "Akses tidak valid.";
}

$conn->close();
?>
