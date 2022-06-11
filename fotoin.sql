-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2022 at 10:00 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fotoin`
--

-- --------------------------------------------------------

--
-- Table structure for table `camera`
--

CREATE TABLE `camera` (
  `id` int(11) NOT NULL,
  `gambar` varchar(1000) NOT NULL,
  `nama` varchar(1000) NOT NULL,
  `deskripsi` varchar(1000) NOT NULL,
  `harga` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `camera`
--

INSERT INTO `camera` (`id`, `gambar`, `nama`, `deskripsi`, `harga`) VALUES
(1, 'dronev3.png', 'Drone v3 Pro', 'Frekuensi : 2.4ghz <br/>\r\nWaktu terbang : 30menit <br/>\r\njangkauan : 100m <br/>\r\nFPV Wifi Camera', '2000000'),
(3, 'canon.png', 'Canon Eos m3', 'Camera pixel : 24.2 MP <br/>\r\nVideo : FullHD 1080p 60fps <br/>\r\nISO 100-12800 <br/>\r\nLensa : EF 15-45mm f/3.5-5.6 IS', '1400000'),
(4, 'tripod.png', 'Zomei Q111', 'Folded length : 50cm <br/>\r\nMax Height : 145cm <br/>\r\nMax Load : 5kg <br/>\r\nTube diameter : 20mm', '500000');

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `id` int(11) NOT NULL,
  `gambar` varchar(1000) NOT NULL,
  `nama` varchar(1000) NOT NULL,
  `deskripsi` varchar(1000) NOT NULL,
  `harga` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`id`, `gambar`, `nama`, `deskripsi`, `harga`) VALUES
(1, 'fotowisuda.png', 'Jasa Foto Wisuda', 'Durasi Foto : 1jam / 2jam / 3jam', '500000'),
(2, 'wedding.png', 'Jasa Foto Prewedding', 'Durasi Foto : 2jam / 3jam / 4jam', '700000'),
(3, 'fotobayi.png', 'Jasa Foto Bayi', 'Durasi Foto : 2jam / 3jam / 4jam', '1000000');

-- --------------------------------------------------------

--
-- Table structure for table `ordered`
--

CREATE TABLE `ordered` (
  `kode_pesanan` varchar(100) NOT NULL,
  `pesanan` text NOT NULL,
  `gambar` varchar(1000) NOT NULL,
  `deskripsi` varchar(1000) NOT NULL,
  `totalHarga` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(1000) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `kode_pesanan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `camera`
--
ALTER TABLE `camera`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ordered`
--
ALTER TABLE `ordered`
  ADD PRIMARY KEY (`kode_pesanan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `camera`
--
ALTER TABLE `camera`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
