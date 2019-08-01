-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2019 at 07:50 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_oppastudio`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_admin`
--

CREATE TABLE `t_admin` (
  `id_admin` varchar(8) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_admin`
--

INSERT INTO `t_admin` (`id_admin`, `nama_admin`, `password`) VALUES
('agam21', 'Agam Nugroho', '21232f297a57a5a743894a0e4a801fc3'),
('ajay', 'Fajar Ramadan', '24bc50d85ad8fa9cda686145cf1f8aca');

-- --------------------------------------------------------

--
-- Table structure for table `t_booking`
--

CREATE TABLE `t_booking` (
  `no_booking` int(4) NOT NULL,
  `status_member` enum('Member','Non Member') NOT NULL,
  `id_member` varchar(8) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `no_telepon` varchar(13) NOT NULL,
  `tanggal_booking` date NOT NULL,
  `lama_sewa` int(3) NOT NULL,
  `waktu_mulai` time NOT NULL,
  `id_admin` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_booking`
--

INSERT INTO `t_booking` (`no_booking`, `status_member`, `id_member`, `nama_pelanggan`, `no_telepon`, `tanggal_booking`, `lama_sewa`, `waktu_mulai`, `id_admin`) VALUES
(1, 'Member', '1', 'Fuad Asfrilly', '081321212121', '2019-05-12', 2, '12:00:00', 'agam21');

-- --------------------------------------------------------

--
-- Table structure for table `t_member`
--

CREATE TABLE `t_member` (
  `id_member` int(11) NOT NULL,
  `nama_member` varchar(50) NOT NULL,
  `no_telepon` varchar(13) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `point` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_member`
--

INSERT INTO `t_member` (`id_member`, `nama_member`, `no_telepon`, `alamat`, `point`) VALUES
(1, 'Fuad Asfrilly', '081321212121', 'Jl. Cicadas No 99', 0);

-- --------------------------------------------------------

--
-- Table structure for table `t_operasional`
--

CREATE TABLE `t_operasional` (
  `no_kebutuhan` int(3) NOT NULL,
  `tanggal` time NOT NULL,
  `kebutuhan` varchar(20) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `biaya` varchar(7) NOT NULL,
  `id_admin` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_promo`
--

CREATE TABLE `t_promo` (
  `id_promo` varchar(8) NOT NULL,
  `nama_promo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_transaksi`
--

CREATE TABLE `t_transaksi` (
  `no_pelanggan` int(3) NOT NULL,
  `no_booking` int(3) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `tanggal_sewa` date NOT NULL,
  `waktu_sewa` time NOT NULL,
  `lama_sewa` int(2) NOT NULL,
  `biaya_sewa` varchar(7) NOT NULL,
  `biaya_tambahan` varchar(7) NOT NULL,
  `total_biaya` varchar(7) NOT NULL,
  `keterangan_tambahan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_admin`
--
ALTER TABLE `t_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `t_booking`
--
ALTER TABLE `t_booking`
  ADD PRIMARY KEY (`no_booking`);

--
-- Indexes for table `t_member`
--
ALTER TABLE `t_member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indexes for table `t_promo`
--
ALTER TABLE `t_promo`
  ADD PRIMARY KEY (`id_promo`);

--
-- Indexes for table `t_transaksi`
--
ALTER TABLE `t_transaksi`
  ADD PRIMARY KEY (`no_pelanggan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_member`
--
ALTER TABLE `t_member`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
