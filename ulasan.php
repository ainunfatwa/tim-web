<?php
include 'db_config.php';
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Kode untuk membuat tabel ulasan
$tableCreateQuery = "CREATE TABLE IF NOT EXISTS ulasan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    rating INT NOT NULL,
    opinion TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
if (!$conn->query($tableCreateQuery)) {
    die("Error creating table: " . $conn->error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $rating = $_POST['rating'];
    $opinion = $_POST['opinion'];

    if ($rating && $opinion) {
        $stmt = $conn->prepare("INSERT INTO ulasan (rating, opinion) VALUES (?, ?)");
        $stmt->bind_param("is", $rating, $opinion);
        $stmt->execute();
        $stmt->close();
    }
}

$result = $conn->query("SELECT rating, opinion, created_at FROM ulasan ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap">   
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&family=Fugaz+One&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="ulasan.css">
</head>
<body>
    <div class="background-images">
        <img src="image/rat1.jpg" alt="Rat 1" class="left">
        <img src="image/rat2.jpg" alt="Rat 2" class="right">
    </div>
    <div class="wrapper">
        <h3>Enter your rating on this café</h3>
        <form id="ratingForm" method="POST" action="">
            <div class="rating">
                <input type="number" name="rating" hidden>
                <i class='bx bx-star star' style="--i: 0;"></i>
                <i class='bx bx-star star' style="--i: 1;"></i>
                <i class='bx bx-star star' style="--i: 2;"></i>
                <i class='bx bx-star star' style="--i: 3;"></i>
                <i class='bx bx-star star' style="--i: 4;"></i>
            </div>
            <textarea name="opinion" cols="30" rows="5" placeholder="Your opinion..."></textarea>
            <div class="btn-group">
                <button type="submit" class="btn submit">Submit</button>
                <button type="button" class="btn cancel">Cancel</button>
            </div>
        </form>
        <div class="results" id="results">
            <h4>Your Submitted Ratings</h4>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<div class='result-item'>";
                    echo "<p><strong>Rating:</strong> " . $row["rating"] . " / 5</p>";
                    echo "<p><strong>Opinion:</strong> " . $row["opinion"] . "</p>";
                    echo "<p><em>" . $row["created_at"] . "</em></p>";
                    echo "</div>";
                }
            } else {
                echo "<p>No reviews yet.</p>";
            }
            $conn->close();
            ?>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const stars = document.querySelectorAll('.star');
            const ratingInput = document.querySelector('input[name="rating"]');

            stars.forEach((star, index) => {
                star.addEventListener('click', () => {
                    ratingInput.value = index + 1;
                    stars.forEach((s, i) => {
                        if (i <= index) {
                            s.classList.add('selected');
                        } else {
                            s.classList.remove('selected');
                        }
                    });
                });

                star.addEventListener('mouseover', () => {
                    stars.forEach((s, i) => {
                        if (i <= index) {
                            s.classList.add('hover');
                        } else {
                            s.classList.remove('hover');
                        }
                    });
                });

                star.addEventListener('mouseout', () => {
                    stars.forEach((s) => {
                        s.classList.remove('hover');
                    });
                });
            });
        });
    </script>
</body>
</html>
