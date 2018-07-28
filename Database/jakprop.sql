-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 28, 2018 at 06:39 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jakprop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `no_telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `email`, `nama_admin`, `password`, `no_telp`) VALUES
('admin', 'admin@gmail.com', 'zackyburhani', 'admin', '083817447382');

-- --------------------------------------------------------

--
-- Table structure for table `detail_fasilitas`
--

CREATE TABLE `detail_fasilitas` (
  `kd_property` char(10) DEFAULT NULL,
  `kd_fasilitas` char(10) DEFAULT NULL,
  `jml_fasilitas` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas`
--

CREATE TABLE `fasilitas` (
  `kd_fasilitas` char(10) NOT NULL,
  `nm_fasilitas` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fasilitas`
--

INSERT INTO `fasilitas` (`kd_fasilitas`, `nm_fasilitas`) VALUES
('FST0000001', 'Tempat Bermain'),
('FST0000002', 'Tempat Olahraga'),
('FST0000003', 'Taman ');

-- --------------------------------------------------------

--
-- Table structure for table `gambar`
--

CREATE TABLE `gambar` (
  `img` int(11) DEFAULT NULL,
  `kd_property` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kd_kategori` char(10) NOT NULL,
  `nm_kategori` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kd_kategori`, `nm_kategori`) VALUES
('KTG0000001', 'Rumah Sewa 99'),
('KTG0000002', 'Sewa');

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE `property` (
  `kd_property` char(10) NOT NULL,
  `nm_property` varchar(50) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `kecamatan` varchar(50) DEFAULT NULL,
  `kabupaten` varchar(50) DEFAULT NULL,
  `provinsi` varchar(50) DEFAULT NULL,
  `harga` int(10) DEFAULT NULL,
  `jenis` varchar(20) DEFAULT NULL,
  `luas_tanah` int(5) DEFAULT NULL,
  `kamar_tidur` int(5) DEFAULT NULL,
  `kamar_mandi` int(5) DEFAULT NULL,
  `angsuran` varchar(15) DEFAULT NULL,
  `status` enum('0','1') DEFAULT NULL COMMENT '0 masih ada, 1 sudah terjual',
  `deskripsi` text,
  `tgl_input` timestamp NULL DEFAULT NULL,
  `kd_kategori` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `detail_fasilitas`
--
ALTER TABLE `detail_fasilitas`
  ADD KEY `kd_fasilitas` (`kd_fasilitas`),
  ADD KEY `kd_property` (`kd_property`);

--
-- Indexes for table `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`kd_fasilitas`);

--
-- Indexes for table `gambar`
--
ALTER TABLE `gambar`
  ADD KEY `kd_property` (`kd_property`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kd_kategori`);

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`kd_property`),
  ADD KEY `kd_kategori` (`kd_kategori`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_fasilitas`
--
ALTER TABLE `detail_fasilitas`
  ADD CONSTRAINT `detail_fasilitas_ibfk_1` FOREIGN KEY (`kd_fasilitas`) REFERENCES `fasilitas` (`kd_fasilitas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_fasilitas_ibfk_2` FOREIGN KEY (`kd_property`) REFERENCES `property` (`kd_property`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gambar`
--
ALTER TABLE `gambar`
  ADD CONSTRAINT `gambar_ibfk_1` FOREIGN KEY (`kd_property`) REFERENCES `property` (`kd_property`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `property`
--
ALTER TABLE `property`
  ADD CONSTRAINT `property_ibfk_1` FOREIGN KEY (`kd_kategori`) REFERENCES `kategori` (`kd_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
