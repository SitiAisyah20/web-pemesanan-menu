-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2023 at 01:23 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rpl`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `idAdmin` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idAdmin`, `username`, `password`) VALUES
(1, 'q', '`'),
(2, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `detail_order`
--

CREATE TABLE `detail_order` (
  `idDetailOrder` int(11) NOT NULL,
  `jmlOrder` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `idMenu` int(5) NOT NULL,
  `idOrder` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_order`
--

INSERT INTO `detail_order` (`idDetailOrder`, `jmlOrder`, `subtotal`, `idMenu`, `idOrder`) VALUES
(1, 2, 8000, 4, 1),
(2, 1, 5000, 3, 2),
(3, 2, 8000, 4, 3),
(4, 2, 10000, 3, 3),
(5, 1, 10000, 5, 4),
(6, 2, 20000, 14, 4),
(7, 2, 8000, 18, 4),
(8, 1, 4000, 4, 5),
(9, 1, 4000, 17, 6),
(10, 1, 5000, 3, 6),
(11, 1, 4000, 19, 7),
(12, 3, 12000, 17, 8),
(13, 1, 5000, 3, 9),
(14, 1, 4000, 17, 10);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `idkat` int(5) NOT NULL,
  `namakat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`idkat`, `namakat`) VALUES
(1, 'makanan'),
(2, 'minuman'),
(4, 'snack');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `idMenu` int(5) NOT NULL,
  `namaMenu` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `idkat` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`idMenu`, `namaMenu`, `harga`, `deskripsi`, `gambar`, `idkat`) VALUES
(3, 'Soto Ayam', 5000, 'Soto ayam berkuah kuning segar', 'Soto Ayam-gambar.png', 1),
(4, 'es milo', 4000, 'Minuman saset susu Milo', 'es milo-gambar.png', 2),
(5, 'Indomie Telur', 10000, 'Indomie rebus atau goreng dengan telur', 'Indomie Telur-gambar.png', 1),
(6, 'Indomie Rebus Istimewa', 15000, 'Indomie Rebus + telur + sosis + bakso/ayam', 'Indomie Rebus Istimewa-gambar.png', 1),
(7, 'Nasi Goreng', 12000, 'Nasi goreng dengan cita rasa khas + telur', 'Nasi Goreng-gambar.png', 1),
(8, 'Ayam Goreng', 15000, 'Ayam goreng + nasi', 'Ayam Goreng-gambar.png', 1),
(9, 'Tongseng Ayam', 20000, 'Tongseng ayam dengan bumbu rempah', 'Tongseng Ayam-gambar.png', 1),
(10, 'Sate Kambing', 25000, 'Sate kambing dengan bumbu kacang', 'Sate Kambing-gambar.png', 1),
(11, 'Terong Crispy', 6000, 'Terong digoreng dengan tepung', 'Terong Crispy-gambar.png', 1),
(12, 'Tahu Goreng', 6000, 'Tahu goreng isi 4', 'Tahu Goreng-gambar.png', 1),
(13, 'Mendoan', 8000, 'Tempe mendoan isi 5', 'Mendoan-gambar.png', 1),
(14, 'Gedang Goreng Coklat Keju', 10000, 'Pisang goreng dengan toping coklat keju', 'Gedang Goreng Coklat Keju-gambar.png', 1),
(15, 'Telo Goreng Original', 8000, 'Singkong goreng original', 'Telo Goreng Original-gambar.png', 1),
(16, 'Telo Goreng Keju', 10000, 'Singkong goreng dengan toping keju', 'Telo Goreng Keju-gambar.png', 1),
(17, 'Good Day Chococinno', 4000, 'Kopi saset Good Day rasa chochocinno', 'Good Day Chococinno-gambar.png', 2),
(18, 'Good Day Cappucinno', 4000, 'Kopi saset Good Day rasa cappucino', 'Good Day Cappucinno-gambar.png', 2),
(19, 'Kopi', 4000, 'Minuman yang dibuat dari olahan biji kopi', 'Kopi-gambar.png', 2),
(21, 'Teh Jahe', 6000, 'Minuman teh dengan jahe', 'Teh Jahe-gambar.png', 2),
(22, 'Wedang Secang', 8000, 'Minuman dari rebusan kayu secang', 'Wedang Secang-gambar.png', 2);

-- --------------------------------------------------------

--
-- Table structure for table `pemesan`
--

CREATE TABLE `pemesan` (
  `idPemesan` int(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nomorMeja` char(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemesan`
--

INSERT INTO `pemesan` (`idPemesan`, `nama`, `nomorMeja`) VALUES
(1, 'q', '00'),
(2, 'hc', '1'),
(3, 'ga', '13'),
(4, 'gaga', '8'),
(5, 'gagag', '1'),
(6, 'dhans', '4'),
(7, 'hai', '2'),
(8, 'gaga', '4'),
(9, 'salsa', '07'),
(10, 'Siti', '1');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `idOrder` int(11) NOT NULL,
  `tglOrder` datetime NOT NULL,
  `total` int(11) NOT NULL,
  `idPemesan` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`idOrder`, `tglOrder`, `total`, `idPemesan`) VALUES
(1, '2023-01-05 00:00:00', 8000, 1),
(2, '2023-01-05 00:00:00', 5000, 2),
(3, '2023-01-06 10:28:04', 18000, 3),
(4, '2023-01-06 10:58:01', 38000, 4),
(5, '2023-01-06 16:00:34', 4000, 5),
(6, '2023-01-06 16:29:37', 9000, 6),
(7, '2023-01-07 10:40:47', 4000, 7),
(8, '2023-01-08 11:03:22', 12000, 8),
(9, '2023-01-12 08:10:43', 5000, 9),
(10, '2023-07-08 06:20:27', 4000, 10);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vdetailorder`
-- (See below for the actual view)
--
CREATE TABLE `vdetailorder` (
`idOrder` int(11)
,`tglOrder` datetime
,`nomorMeja` char(3)
,`nama` varchar(50)
,`namaMenu` varchar(50)
,`harga` int(11)
,`jmlOrder` int(11)
,`subtotal` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vmakanan`
-- (See below for the actual view)
--
CREATE TABLE `vmakanan` (
`idMenu` int(5)
,`namaMenu` varchar(50)
,`harga` int(11)
,`deskripsi` text
,`gambar` varchar(100)
,`idkat` int(5)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vminuman`
-- (See below for the actual view)
--
CREATE TABLE `vminuman` (
`idMenu` int(5)
,`namaMenu` varchar(50)
,`harga` int(11)
,`deskripsi` text
,`gambar` varchar(100)
,`idkat` int(5)
);

-- --------------------------------------------------------

--
-- Structure for view `vdetailorder`
--
DROP TABLE IF EXISTS `vdetailorder`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vdetailorder`  AS SELECT `pesanan`.`idOrder` AS `idOrder`, `pesanan`.`tglOrder` AS `tglOrder`, `pemesan`.`nomorMeja` AS `nomorMeja`, `pemesan`.`nama` AS `nama`, `menu`.`namaMenu` AS `namaMenu`, `menu`.`harga` AS `harga`, `detail_order`.`jmlOrder` AS `jmlOrder`, `detail_order`.`subtotal` AS `subtotal` FROM (((`menu` join `detail_order` on(`menu`.`idMenu` = `detail_order`.`idMenu`)) join `pesanan` on(`detail_order`.`idOrder` = `pesanan`.`idOrder`)) join `pemesan` on(`pesanan`.`idPemesan` = `pemesan`.`idPemesan`)) ORDER BY `pesanan`.`idOrder` ASC  ;

-- --------------------------------------------------------

--
-- Structure for view `vmakanan`
--
DROP TABLE IF EXISTS `vmakanan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vmakanan`  AS SELECT `menu`.`idMenu` AS `idMenu`, `menu`.`namaMenu` AS `namaMenu`, `menu`.`harga` AS `harga`, `menu`.`deskripsi` AS `deskripsi`, `menu`.`gambar` AS `gambar`, `menu`.`idkat` AS `idkat` FROM (`menu` join `kategori` on(`menu`.`idkat` = `kategori`.`idkat`)) WHERE `kategori`.`idkat` = 11  ;

-- --------------------------------------------------------

--
-- Structure for view `vminuman`
--
DROP TABLE IF EXISTS `vminuman`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vminuman`  AS SELECT `menu`.`idMenu` AS `idMenu`, `menu`.`namaMenu` AS `namaMenu`, `menu`.`harga` AS `harga`, `menu`.`deskripsi` AS `deskripsi`, `menu`.`gambar` AS `gambar`, `menu`.`idkat` AS `idkat` FROM (`menu` join `kategori` on(`menu`.`idkat` = `kategori`.`idkat`)) WHERE `kategori`.`idkat` = 22  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Indexes for table `detail_order`
--
ALTER TABLE `detail_order`
  ADD PRIMARY KEY (`idDetailOrder`),
  ADD KEY `idOrder` (`idOrder`),
  ADD KEY `detail_order_ibfk_4` (`idMenu`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`idkat`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`idMenu`),
  ADD KEY `fk_kategori_id` (`idkat`);

--
-- Indexes for table `pemesan`
--
ALTER TABLE `pemesan`
  ADD PRIMARY KEY (`idPemesan`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`idOrder`),
  ADD KEY `fk_pemesan_id` (`idPemesan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `idAdmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `detail_order`
--
ALTER TABLE `detail_order`
  MODIFY `idDetailOrder` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `idkat` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `idMenu` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `pemesan`
--
ALTER TABLE `pemesan`
  MODIFY `idPemesan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `idOrder` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_order`
--
ALTER TABLE `detail_order`
  ADD CONSTRAINT `detail_order_ibfk_1` FOREIGN KEY (`idOrder`) REFERENCES `pesanan` (`idOrder`),
  ADD CONSTRAINT `detail_order_ibfk_4` FOREIGN KEY (`idMenu`) REFERENCES `menu` (`idMenu`);

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `fk_kategori_id` FOREIGN KEY (`idkat`) REFERENCES `kategori` (`idkat`);

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `fk_pemesan_id` FOREIGN KEY (`idPemesan`) REFERENCES `pemesan` (`idPemesan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
