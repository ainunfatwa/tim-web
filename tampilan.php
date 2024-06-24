<?php
session_start();

if (isset($_SESSION['user'])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservasi Cafe</title>
    <link rel="stylesheet" type="text/css" href="form.css">
    <link rel="stylesheet" type="text/css" href="aboutcontact.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>
<body>
    <header>
        <a href="#" class="logo">Reservasi Online Cafe ITH <i class="fas fa-shopping-cart"></i></a>
        <ul class="navbar">
            <li><a href="#home" id="home-link">Home</a></li>
            <li><a href="#about" id="about-link">About</a></li>
            <li class="dropdown">
                <a href="#" class="dropbtn">Menu</a>
                <div class="dropdown-content">
                    <a href="menu.php#menuCafe" id="menu-link">Menu</a>
                    <a href="meja.php" id="meja-link">Meja</a>
                </div>
            </li>
            <li><a href="#" id="contact-link">Contact</a></li>
            <li><a href="logout.php">Logout</a></li> 
        </ul>
    </header>

    <div id="menu-container" style="display:none;"></div> 

    <section class="home" id="home">
        <div class="home-text">
            <h1>Cafe Mahasiswa</h1>
            <h2>tell us your favorite menu at our cafe</h2>
            <h3>OPEN</h3>
            <h4>Monday-Sunday / 08.00 - 17.00 </h4>
            <!-- <a href="reservasi.html" class="btn">Enter Your Order</a> -->
            <a href="ulasan.php" class="btn-p">Penilaian & ulasan</a>
        </div>   
    </section>
    <section class="about" id="about-section" style="display: none;">
        <div class="about-container">
            <div class="about-content">
            <h2>About Us</h2>
            <p>Our cafe was established in 2024 with the aim of being
            a comfortable and inspiring gathering place for the
            student community. We offer a menu of food and drinks
            to suit the needs and tastes of students, made with fresh 
            ingredients and the best selection.</p>
                <p>Here, you can enjoy a delicious breakfast or lunch 
                while relaxing in a comfortable room and supported by adequate
                facilities for learning and creative needs. We also provide
                a selection of coffee, tea and fresh drinks that can accompany 
                your productive time.</p>
        </div>
</div>
    </section>
    <section class="contact-info" id="contact-section" style="display: none;">
        <div class="contact-container">
            <div class="contact-content">
            <p><i class="fas fa-map-marker-alt"></i>Address: Jalan Balai Kota</p>
            <p><i class="far fa-envelope"></i> Email: CafeITH@gmail.com</p>
            <p><i class="fas fa-phone-alt"></i>Phone: +6281234567876</p>
            <p><i class="far fa-clock"></i> Operational Hours: Mon-Sun / 08 AM - 05 PM</p>
        </div> 
    </div>
    </section>

        <li><a href="#" id="ulasan-link"></a></li>
        <div id="ulasan-container"></div>

    <script> 
    $(document).ready(function() {
        function loadMenu(url, category) {
            $.ajax({
                url: url,
                type: 'GET',
                success: function(data) {
                    $('#menu-container').html(data).show();
                    $('#home').hide();
                    $('#about-section').hide();
                    $('#contact-section').hide();
                    if (category === 'food') {
                        $('.drink-container').hide();
                        $('.food-container').show();
                    } else if (category === 'drink') {
                        $('.drink-container').show();
                        $('.food-container').hide();
                    }
                },
                error: function() {
                    alert('Gagal memuat menu. Silakan coba lagi.');
                }
            });
        }

        $('#ulasan-link').click(function(event) {
            event.preventDefault();
            $.ajax({
                url: 'ulasan.html',
                type: 'GET',
                success: function(data) {
                    $('#ulasan-container').html(data);
                    $('#home').hide();
                    $('#about-section').hide();
                    $('#contact-section').hide();
                    $('#menu-container').hide();
                    clearHomeText();
                },
                error: function() {
                    alert('Gagal memuat ulasan. Silakan coba lagi.');
                }
            });
        });

        $('#about-link').click(function(event) {
            event.preventDefault();
            $('#about-section').show();
            $('#home').hide();
            $('#contact-section').hide();
            $('#menu-container').hide();
            clearHomeText();
        });

        $('#contact-link').click(function(event) {
            event.preventDefault();
            $('#contact-section').show();
            $('#home').hide();
            $('#about-section').hide();
            $('#menu-container').hide();
            clearHomeText();
        });

        $('#home-link').click(function(event) {
            event.preventDefault();
            $('#home').show();
            $('#about-section').hide();
            $('#contact-section').hide();
            $('#menu-container').hide();
            restoreHomeText();
        });

        $('#ulasan-link').click(function(event) {
            event.preventDefault();
            $('#ulasan-section').show();
            $('#home').hide();
            $('#about-section').hide();
            $('#contact-section').hide();
            $('#menu-container').hide();
            clearHomeText();
        });

        function clearHomeText() {
            $('.home-text h1').text('');
            $('.home-text h2').text('');
            $('.home-text h3').hide();
            $('.home-text h4').hide();
            $('.home-text .btn').hide();
        }

        function restoreHomeText() {
            $('.home-text h1').text('Cafe Mahasiswa');
            $('.home-text h2').text('tell us your favorite menu at our cafe');
            $('.home-text h3').show();
            $('.home-text h4').show();
            $('.home-text .btn').show();
        }
    });
    </script>
</body>
</html>
<?php
} else {
    header("Location: login.php");
    exit;
}
?>
