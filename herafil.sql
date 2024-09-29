-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2024 at 09:46 AM
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
-- Database: `herafil`
--

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(12) NOT NULL,
  `nama_menu` varchar(50) NOT NULL,
  `harga` int(10) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `jenis_menu` varchar(10) NOT NULL,
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `nama_menu`, `harga`, `gambar`, `jenis_menu`, `deskripsi`) VALUES
(1, 'Cappucino', 30000, 'Cappucino.jpg', 'Coffee', 'Freshmilk with espresso, sugar & chocolate powder.'),
(2, 'Aren Creamy Latte', 28000, 'Aren Creamy Latte.jpg', 'Coffee', 'Fresh Milk With Espresso & Palm Sugar.'),
(3, 'Avo Mango Breeze', 42000, 'Avo Mango Breeze.jpg', 'Non Coffee', 'Coconut Milk With Avocado, Coconut Cream, Butterscotch & Mango Pudding.'),
(4, 'Creme Brulee Latte', 32000, 'Creme Brulee Latte.jpg', 'Coffee', 'Latte Caramel With Espresso & Hazelnut.'),
(5, 'Chocolate', 30000, 'Chocolate.jpg', 'Non Coffee', 'Fresh Milk With Belgium Chocolate.'),
(6, 'Matcha Latte', 30000, 'Matcha Latte.jpg', 'Non Coffee', 'Oat Milk With Matcha Pure & Creamer.'),
(7, 'Ebi Furai', 38000, 'Ebi Furai.jpg', 'Makanan', 'Fresh Shrimp Coated With Egg And Tempura Flour, Served With A Delicious Dipping Sauce.'),
(8, 'Spaghetti Aglio e Olio', 58000, 'Spaghetti aglio e olio.jpg', 'Makanan', 'Made From Sauteed Garlic, Chopped Or Crushed, In Olive Oil, Mixed With Spaghetti.'),
(9, 'Mongolian Beef', 62000, 'Mongolian Beef.jpg', 'Makanan', 'Beef Combined With Scallions Or Mixed Vegetables, Often Not Spicy.'),
(10, 'Chicken Wings', 48000, 'chicken wings.jpg', 'Makanan', 'Chicken Wings With Chili, Spicy Sauce And Butter.'),
(11, 'Nachos', 35000, 'Nachos.jpg', 'Makanan', 'Tortilla Chips Topped With Melted Cheese.'),
(12, 'Chicken Karage', 47000, 'Chicken Karage.jpg', 'Makanan', 'Crispy Japanese - Style Boneless Chicken Served With A Choice Of Balinese Raw Sambal.');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id_pemesanan` int(12) NOT NULL,
  `tanggal` date NOT NULL,
  `total` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id_pemesanan`, `tanggal`, `total`) VALUES
(9, '2024-08-16', 28000),
(12, '2024-09-01', 95000);

-- --------------------------------------------------------

--
-- Table structure for table `order_menu`
--

CREATE TABLE `order_menu` (
  `id_pesan_produk` int(12) NOT NULL,
  `id_pemesanan` int(12) NOT NULL,
  `id_menu` varchar(50) NOT NULL,
  `jumlah` int(12) NOT NULL,
  `ponsel` varchar(13) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_menu`
--

INSERT INTO `order_menu` (`id_pesan_produk`, `id_pemesanan`, `id_menu`, `jumlah`, `ponsel`, `nama`) VALUES
(14, 9, '2', 1, '02178546952', 'tiara'),
(19, 12, '6', 1, '988787', 'tiara'),
(20, 12, '11', 1, '988787', 'tiara'),
(21, 12, '1', 1, '988787', 'tiara'),
(22, 0, '4', 1, '1234567', 'Muti');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `hp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama_lengkap`, `jenis_kelamin`, `tanggal_lahir`, `alamat`, `hp`) VALUES
(12, 'Mutiara', 'mutiara123', 'Mutiara Zhafira', 'Perempuan', '2002-07-22', 'Jakarta', '0895638027084');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id_pemesanan`);

--
-- Indexes for table `order_menu`
--
ALTER TABLE `order_menu`
  ADD PRIMARY KEY (`id_pesan_produk`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id_pemesanan` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `order_menu`
--
ALTER TABLE `order_menu`
  MODIFY `id_pesan_produk` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
