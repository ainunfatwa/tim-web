-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2024 at 07:17 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cafe_ith`
--

-- --------------------------------------------------------

--
-- Table structure for table `meja`
--

CREATE TABLE `meja` (
  `id` int(11) NOT NULL,
  `nomor_meja` varchar(50) NOT NULL,
  `lokasi` varchar(50) NOT NULL,
  `lantai` int(11) NOT NULL,
  `kapasitas` int(11) NOT NULL,
  `status` enum('tersedia','dipesan') NOT NULL DEFAULT 'tersedia'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `meja`
--

INSERT INTO `meja` (`id`, `nomor_meja`, `lokasi`, `lantai`, `kapasitas`, `status`) VALUES
(1, 'M1', 'indoor', 1, 2, 'tersedia'),
(2, 'M2', 'indoor', 1, 4, 'tersedia'),
(3, 'M3', 'indoor', 1, 8, 'dipesan'),
(4, 'M4', 'indoor', 1, 12, 'tersedia'),
(5, 'M5', 'outdoor', 1, 2, 'tersedia'),
(6, 'M6', 'outdoor', 1, 4, 'tersedia'),
(7, 'M7', 'outdoor', 1, 8, 'dipesan'),
(8, 'M8', 'outdoor', 1, 12, 'dipesan'),
(9, 'M9', 'indoor', 2, 2, 'tersedia'),
(10, 'M10', 'indoor', 2, 4, 'tersedia'),
(11, 'M11', 'indoor', 2, 8, 'tersedia'),
(12, 'M12', 'indoor', 2, 12, 'tersedia'),
(13, 'M13', 'outdoor', 2, 2, 'tersedia'),
(14, 'M14', 'outdoor', 2, 4, 'tersedia'),
(15, 'M15', 'outdoor', 2, 8, 'tersedia'),
(16, 'M16', 'outdoor', 2, 12, 'tersedia');

-- --------------------------------------------------------

--
-- Table structure for table `menu_makanan`
--

CREATE TABLE `menu_makanan` (
  `id` int(6) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu_makanan`
--

INSERT INTO `menu_makanan` (`id`, `name`, `price`, `image`) VALUES
(1, 'Ayam Geprek', 15000.00, 'image/ayam geprek.jpeg'),
(2, 'Bakso', 18000.00, 'image/bakso.jpg'),
(3, 'Banana Roll', 10000.00, 'image/banana roll.jpg'),
(4, 'Burger', 10000.00, 'image/burger.jpg'),
(5, 'Chicken Katsu', 18000.00, 'image/chicken katsu.jpg'),
(6, 'Dimsum Ayam', 20000.00, 'image/dimsum ayam.jpeg'),
(7, 'Donat', 15000.00, 'image/donat.jpeg'),
(8, 'Kentang', 15000.00, 'image/kentang.jpg'),
(9, 'Mie Goreng', 18000.00, 'image/mie goreng.jpg'),
(10, 'Nasi Goreng', 15000.00, 'image/nasi goreng.jpeg'),
(11, 'Pisang Nugget', 10000.00, 'image/pisang nugget.jpg'),
(12, 'Rice Bowl Chicken', 15000.00, 'image/rice bowl chicken.jpg'),
(13, 'Sosis Bakar', 10000.00, 'image/sosis bakar.jpeg'),
(14, 'Spaghetti', 20000.00, 'image/spaghetti.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `menu_minuman`
--

CREATE TABLE `menu_minuman` (
  `id` int(6) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu_minuman`
--

INSERT INTO `menu_minuman` (`id`, `name`, `price`, `image`) VALUES
(1, 'Cappucino', 15000.00, 'image/cappucino.jpeg'),
(2, 'Caramel Latte', 15000.00, 'image/caramel latte.jpg'),
(3, 'Chocolate', 13000.00, 'image/chocolate.jpeg'),
(4, 'Dalgona Coffe', 18000.00, 'image/dalgona coffe.jpg'),
(5, 'Green Tea', 13000.00, 'image/greentea.jpeg'),
(6, 'Hazelnut Latte', 15000.00, 'image/hazelnut latte.jpg'),
(7, 'Jus Alpukat', 18000.00, 'image/jus alpukat.jpg'),
(8, 'Lemon Tea', 10000.00, 'image/lemon tea.jpeg'),
(9, 'Milk Shake Oreo', 18000.00, 'image/milk shake oreo.jpg'),
(10, 'Milk Tea', 15000.00, 'image/milk tea.jpg'),
(11, 'Nutella', 15000.00, 'image/nutella.jpg'),
(12, 'Smoothies Mangga', 18000.00, 'image/smoothies mangga.jpeg'),
(13, 'Smoothies Strawberry', 15000.00, 'image/smoothies strawberry.jpeg'),
(14, 'Thai Tea', 15000.00, 'image/thai tea.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(6) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `menu_id` int(6) UNSIGNED NOT NULL,
  `menu_type` enum('makanan','minuman') NOT NULL,
  `quantity` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `phone`, `address`, `menu_id`, `menu_type`, `quantity`) VALUES
(1, 'srirahayu', '082345435654', 'jalan mangga', 3, 'makanan', 1),
(2, 'ainun', '087765456789', 'jalan balai kota', 3, 'makanan', 1),
(3, 'srirahayu', '087654345234', 'Jalan Bau Massepe', 1, 'makanan', 1),
(4, 'ainun', '082345678908', 'jalan pemuda', 3, 'makanan', 1),
(5, 'jian', '082345678908', 'jalan pemuda', 1, 'makanan', 1),
(6, 'widya', '082345654678', 'jalan agussalim', 4, 'makanan', 1),
(7, 'sri lagi', '082345678908', 'jalan andi cammi', 14, 'makanan', 1);

-- --------------------------------------------------------

--
-- Table structure for table `reservasi_meja`
--

CREATE TABLE `reservasi_meja` (
  `id` int(11) NOT NULL,
  `meja_id` int(11) NOT NULL,
  `nama_pemesan` varchar(100) NOT NULL,
  `nomor_telepon` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `tanggal_reservasi` date NOT NULL,
  `waktu_reservasi` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservasi_meja`
--

INSERT INTO `reservasi_meja` (`id`, `meja_id`, `nama_pemesan`, `nomor_telepon`, `alamat`, `tanggal_reservasi`, `waktu_reservasi`) VALUES
(1, 3, 'sri', '082196986899', 'Jalan Jambu', '2024-06-07', '01:22:00'),
(2, 7, 'srirahayu', '082345678908', 'jalan mangga', '2024-06-10', '12:49:00'),
(3, 8, 'jian', '082345654678', 'jalan balai kota', '2024-06-19', '20:35:00');

-- --------------------------------------------------------

--
-- Table structure for table `ulasan`
--

CREATE TABLE `ulasan` (
  `id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `opinion` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ulasan`
--

INSERT INTO `ulasan` (`id`, `rating`, `opinion`, `created_at`) VALUES
(1, 5, 'mantap', '2024-06-23 05:55:51'),
(2, 5, 'keren', '2024-06-23 05:56:16'),
(3, 5, 'makanannya enak', '2024-06-25 03:28:51');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`) VALUES
(1, 'srirahayu', 'sri', 'd1565ebd8247bbb01472f80e24ad29b6'),
(2, 'proyek web', 'web', '2567a5ec9705eb7ac2c984033e06189d');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `meja`
--
ALTER TABLE `meja`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_makanan`
--
ALTER TABLE `menu_makanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_minuman`
--
ALTER TABLE `menu_minuman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservasi_meja`
--
ALTER TABLE `reservasi_meja`
  ADD PRIMARY KEY (`id`),
  ADD KEY `meja_id` (`meja_id`);

--
-- Indexes for table `ulasan`
--
ALTER TABLE `ulasan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `meja`
--
ALTER TABLE `meja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `menu_makanan`
--
ALTER TABLE `menu_makanan`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `menu_minuman`
--
ALTER TABLE `menu_minuman`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `reservasi_meja`
--
ALTER TABLE `reservasi_meja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ulasan`
--
ALTER TABLE `ulasan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservasi_meja`
--
ALTER TABLE `reservasi_meja`
  ADD CONSTRAINT `reservasi_meja_ibfk_1` FOREIGN KEY (`meja_id`) REFERENCES `meja` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
