<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .table-section {
            display: none; /* Sembunyikan semua section */
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Admin Reservasi Cafe ITH</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#" data-target="table-reservations-section">Reservasi Meja</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-target="table-orders-section">Reservasi Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-target="table-reviews-section">Ulasan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-target="table-menu_makanan-section">Menu Makanan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-target="table-minuman-section">Menu Minuman</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-target="table-meja-section">Meja</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        <div id="table-reservations-section" class="table-section">
            <h1 class="my-4">Tabel Reservasi Meja</h1>
            <!-- Table Reservations Section -->
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nama Pemesan</th>
                        <th scope="col">Nomor Telepon</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Tanggal Reservasi</th>
                        <th scope="col">Waktu Reservasi</th>
                        <!-- <th scope="col">Aksi</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Include your database connection file
                    include 'db_connect.php';

                    // Query to fetch data from reservasi_meja table
                    $sql_reservasi_meja = "SELECT * FROM reservasi_meja";
                    $result_reservasi_meja = $conn->query($sql_reservasi_meja);

                    if ($result_reservasi_meja->num_rows > 0) {
                        while($row = $result_reservasi_meja->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['nama_pemesan'] . "</td>";
                            echo "<td>" . $row['nomor_telepon'] . "</td>";
                            echo "<td>" . $row['alamat'] . "</td>";
                            echo "<td>" . $row['tanggal_reservasi'] . "</td>";
                            echo "<td>" . $row['waktu_reservasi'] . "</td>";
                            // echo '<td><a href="#" class="btn btn-primary">Edit</a> <a href="#" class="btn btn-danger">Hapus</a></td>';
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7'>Tidak ada data tersedia</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <div id="table-orders-section" class="table-section">
            <h1 class="my-4">Tabel Reservasi Menu</h1>
            <!-- Table Orders Section -->
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Menu ID</th>
                        <th scope="col">Menu Type</th>
                        <th scope="col">Quantity</th>
                        <!-- <th scope="col">Aksi</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Query to fetch data from orders table
                    $sql_orders = "SELECT * FROM orders";
                    $result_orders = $conn->query($sql_orders);

                    if ($result_orders->num_rows > 0) {
                        while($row = $result_orders->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['name'] . "</td>";
                            echo "<td>" . $row['phone'] . "</td>";
                            echo "<td>" . $row['address'] . "</td>";
                            echo "<td>" . $row['menu_id'] . "</td>";
                            echo "<td>" . $row['menu_type'] . "</td>";
                            echo "<td>" . $row['quantity'] . "</td>";
                            // echo '<td><a href="#" class="btn btn-primary">Edit</a> <a href="#" class="btn btn-danger">Hapus</a></td>';
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='8'>Tidak ada data tersedia</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <div id="table-reviews-section" class="table-section">
            <h1 class="my-4">Tabel Ulasan</h1>
            <!-- Table Reviews Section -->
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Rating</th>
                        <th scope="col">Opinion</th>
                        <th scope="col">Created At</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Query to fetch data from ulasan table
                    $sql_ulasan = "SELECT * FROM ulasan";
                    $result_ulasan = $conn->query($sql_ulasan);

                    if ($result_ulasan->num_rows > 0) {
                        while($row = $result_ulasan->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['rating'] . "</td>";
                            echo "<td>" . $row['opinion'] . "</td>";
                            echo "<td>" . $row['created_at'] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>Tidak ada ulasan saat ini</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <div id="table-menu_makanan-section" class="table-section">
            <h1 class="my-4">Tabel Menu Makanan</h1>
            <!-- Table Menu Makanan Section -->
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nama Makanan</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Gambar</th>
                        <!-- <th scope="col">Aksi</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Query to fetch data from menu_makanan table
                    $sql_menu_makanan = "SELECT * FROM menu_makanan";
                    $result_menu_makanan = $conn->query($sql_menu_makanan);

                    if ($result_menu_makanan->num_rows > 0) {
                        while($row = $result_menu_makanan->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['name'] . "</td>";
                            echo "<td>" . $row['price'] . "</td>";
                            echo "<td><img src='" . $row['image'] . "' style='max-width: 100px; max-height: 100px;' /></td>";
                            // echo '<td><a href="#" class="btn btn-primary">Edit</a> <a href="#" class="btn btn-danger">Hapus</a></td>';
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>Tidak ada menu makanan tersedia</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <div id="table-minuman-section" class="table-section">
            <h1 class="my-4">Tabel Menu Minuman</h1>
            <!-- Table Menu Minuman Section -->
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nama Minuman</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Gambar</th>
                        <!-- <th scope="col">Aksi</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Query to fetch data from menu_minuman table
                    $sql_menu_minuman = "SELECT * FROM menu_minuman";
                    $result_menu_minuman = $conn->query($sql_menu_minuman);

                    if ($result_menu_minuman->num_rows > 0) {
                        while($row = $result_menu_minuman->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['name'] . "</td>";
                            echo "<td>" . $row['price'] . "</td>";
                            echo "<td><img src='" . $row['image'] . "' style='max-width: 100px; max-height: 100px;' /></td>";
                            // echo '<td><a href="#" class="btn btn-primary">Edit</a> <a href="#" class="btn btn-danger">Hapus</a></td>';
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>Tidak ada menu minuman tersedia</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <div id="table-meja-section" class="table-section">
            <h1 class="my-4">Tabel Meja</h1>
            <!-- Table Meja Section -->
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nomor Meja</th>
                        <th scope="col">Status</th>
                        <th scope="col">Kapasitas</th>
                        <!-- <th scope="col">Aksi</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Query to fetch data from meja table
                    $sql_meja = "SELECT * FROM meja";
                    $result_meja = $conn->query($sql_meja);

                    if ($result_meja->num_rows > 0) {
                        while($row = $result_meja->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['nomor_meja'] . "</td>";
                            echo "<td>" . $row['status'] . "</td>";
                            echo "<td>" . $row['kapasitas'] . "</td>";
                            // echo '<td><a href="#" class="btn btn-primary">Edit</a> <a href="#" class="btn btn-danger">Hapus</a></td>';
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>Tidak ada data meja tersedia</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        // JavaScript to toggle table sections based on navigation clicks
        document.addEventListener("DOMContentLoaded", function() {
            const links = document.querySelectorAll('.navbar-nav .nav-link');
            links.forEach(function(link) {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    const targetId = this.getAttribute('data-target');
                    const targetSection = document.getElementById(targetId);
                    if (targetSection) {
                        const allSections = document.querySelectorAll('.table-section');
                        allSections.forEach(function(section) {
                            section.style.display = 'none';
                        });
                        targetSection.style.display = 'block';
                    }
                });
            });
        });
    </script>
</body>
</html>
