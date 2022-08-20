-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2022 at 02:05 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `banksampah`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `nia` varchar(9) NOT NULL DEFAULT '',
  `nama` varchar(20) NOT NULL,
  `telepon` varchar(13) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `level` enum('Master-admin','Admin') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`nia`, `nama`, `telepon`, `password`, `level`) VALUES
('admin', 'Bagus  Rizky Z ', '08813112407', 'admin', 'Master-admin'),
('admin01', 'dada', '0888111222', 'admin', 'Admin'),
('dada', 'dada ', '0888111222', 'dadaa', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `nasabah`
--

CREATE TABLE `nasabah` (
  `nin` varchar(10) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `rt` int(1) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `telepon` varchar(12) NOT NULL,
  `saldo` int(8) DEFAULT NULL,
  `sampah` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nasabah`
--

INSERT INTO `nasabah` (`nin`, `nama`, `rt`, `alamat`, `telepon`, `saldo`, `sampah`) VALUES
('ID2207001', 'Andra dadada  ', 0, 'Jalan Jeruka', '08813112403', 10800, 23),
('ID2207002', 'Anisa', 2, 'Sleman', '0810202020', 101800, 22),
('ID2207003', 'Anto', 3, 'Jalan Jeruk', '0810202020', 40000, 20),
('ID2207004', 'Rindi', 1, 'Sleman', '0810202020', 0, 0),
('ID2207005', 'Prapto', 1, 'Jalan Jeruk', '0810202020', 0, 0),
('ID2207006', 'Rendi', 1, 'Concat', '08813112407', 0, 0),
('ID2208007', 'abc', 1, 'Sleman', '0810202020', 0, 0),
('ID2208008', 'darma', 1, 'Jalan Jeruk', '08813112407', 0, 0),
('ID2208009', 'sulaeman', 2, 'yagya', '918388238883', 0, 0),
('ID2208010', 'Bagus  Rizky', 1, 'Sleman', '0888111222', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sampah`
--

CREATE TABLE `sampah` (
  `id` int(11) NOT NULL,
  `jenis_sampah` varchar(15) NOT NULL,
  `satuan` enum('KG','PC','LT') NOT NULL,
  `harga` int(5) NOT NULL,
  `gambar` varchar(150) NOT NULL,
  `deskripsi` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sampah`
--

INSERT INTO `sampah` (`id`, `jenis_sampah`, `satuan`, `harga`, `gambar`, `deskripsi`) VALUES
(5, 'Kaleng', 'KG', 1400, 'kaleng.jpeg', 'Kaleng makanan, kaleng susu, tidak dipre'),
(6, 'Botol Plastik', 'KG', 5000, 'botol-plastik.jpg', 'Aqua, Club, JS tanpa label'),
(7, 'sampah plastik', 'KG', 3000, '6300a603299cb.jpg', 'dadasdsad'),
(9, 'aa', 'KG', 3000, '6300a6fd694ed.jpg', 'aa'),
(10, '$jenis_sampah', '', 0, '$namaFileBaru', '$deskripsi'),
(11, 'plastik', 'KG', 3000, '408642399_download.jpg', 'sampajh');

-- --------------------------------------------------------

--
-- Table structure for table `setor`
--

CREATE TABLE `setor` (
  `id_setor` int(5) NOT NULL,
  `tanggal_setor` date NOT NULL,
  `nin` varchar(10) NOT NULL,
  `jenis_sampah` varchar(15) NOT NULL,
  `berat` int(4) NOT NULL,
  `harga` int(6) NOT NULL,
  `total` int(8) NOT NULL,
  `nia` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setor`
--

INSERT INTO `setor` (`id_setor`, `tanggal_setor`, `nin`, `jenis_sampah`, `berat`, `harga`, `total`, `nia`) VALUES
(35, '2022-07-25', 'ID2207002', 'Kaleng', 2, 1400, 2800, ''),
(36, '2022-08-29', 'ID2207001', 'Kaleng', 20, 1400, 28000, ''),
(37, '2022-07-04', 'ID2207001', 'Kaleng', 3, 1400, 4200, ''),
(38, '2022-07-04', 'ID2207002', 'Botol Plastik', 20, 5000, 100000, ''),
(39, '2022-07-22', 'ID2207003', 'sampah plastik', 20, 3000, 60000, '');

-- --------------------------------------------------------

--
-- Table structure for table `tarik`
--

CREATE TABLE `tarik` (
  `id_tarik` int(3) NOT NULL,
  `tanggal_tarik` date NOT NULL,
  `nin` varchar(10) NOT NULL,
  `saldo` int(7) NOT NULL,
  `jumlah_tarik` int(7) NOT NULL,
  `nia` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tarik`
--

INSERT INTO `tarik` (`id_tarik`, `tanggal_tarik`, `nin`, `saldo`, `jumlah_tarik`, `nia`) VALUES
(15, '2022-08-01', 'ID2207001', 28000, 20900, ''),
(16, '2022-08-29', 'ID2207002', 2800, 1000, ''),
(17, '2022-08-29', 'ID2207001', 7100, 500, ''),
(18, '2022-07-28', 'ID2207003', 60000, 20000, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`nia`);

--
-- Indexes for table `nasabah`
--
ALTER TABLE `nasabah`
  ADD PRIMARY KEY (`nin`);

--
-- Indexes for table `sampah`
--
ALTER TABLE `sampah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setor`
--
ALTER TABLE `setor`
  ADD PRIMARY KEY (`id_setor`);

--
-- Indexes for table `tarik`
--
ALTER TABLE `tarik`
  ADD PRIMARY KEY (`id_tarik`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sampah`
--
ALTER TABLE `sampah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `setor`
--
ALTER TABLE `setor`
  MODIFY `id_setor` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tarik`
--
ALTER TABLE `tarik`
  MODIFY `id_tarik` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
