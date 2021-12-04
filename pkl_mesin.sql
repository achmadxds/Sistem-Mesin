-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2021 at 03:39 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pkl_mesin`
--

-- --------------------------------------------------------

--
-- Table structure for table `keluhan`
--

CREATE TABLE `keluhan` (
  `idKeluhan` int(11) NOT NULL,
  `idMesin` int(11) NOT NULL,
  `jenisKeluhan` varchar(20) NOT NULL,
  `keluhan` varchar(20) NOT NULL,
  `ket_perbaikan` text DEFAULT '-',
  `status` int(11) NOT NULL,
  `usrInput` int(11) NOT NULL,
  `usrPerbaikan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `leveluser`
--

CREATE TABLE `leveluser` (
  `idLevel` int(11) NOT NULL,
  `nmLevel` varchar(50) NOT NULL,
  `ket` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `leveluser`
--

INSERT INTO `leveluser` (`idLevel`, `nmLevel`, `ket`) VALUES
(2, 'TEKNISI', 'teknisi'),
(4, 'ADMIN', 'shyt'),
(6, 'OPERATOR', 'OP');

-- --------------------------------------------------------

--
-- Table structure for table `mesin`
--

CREATE TABLE `mesin` (
  `idMesin` int(11) NOT NULL,
  `nmMesin` varchar(50) NOT NULL,
  `seriMesin` varchar(20) NOT NULL,
  `buatan` varchar(60) NOT NULL,
  `thn_operasi` year(4) NOT NULL,
  `usrInput` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `idPengguna` int(11) NOT NULL,
  `namaPengguna` varchar(225) NOT NULL,
  `nokaryawan` varchar(50) NOT NULL,
  `jekel` enum('Pria','Wanita') NOT NULL COMMENT '1 = Laki; 2 = Perempuan',
  `alamat` text NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `tglDaftar` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`idPengguna`, `namaPengguna`, `nokaryawan`, `jekel`, `alamat`, `jabatan`, `tglDaftar`) VALUES
(1, 'Admin', '195030', 'Pria', 'Mejobo', 'Penguasa', '2021-12-02 06:37:31');

-- --------------------------------------------------------

--
-- Table structure for table `peralatan`
--

CREATE TABLE `peralatan` (
  `idPeralatan` int(11) UNSIGNED NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `kondisi` varchar(50) NOT NULL COMMENT '1 = ? 2 = ? 3 = ?',
  `keterangan` text NOT NULL,
  `lokasi` varchar(50) NOT NULL,
  `usrInput` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `perawatan`
--

CREATE TABLE `perawatan` (
  `idPerawatan` int(10) UNSIGNED NOT NULL,
  `idMesin` int(11) NOT NULL,
  `idPengguna` int(11) NOT NULL,
  `kodePerawatan` varchar(100) NOT NULL,
  `tgl_perawatan` date NOT NULL,
  `ket_perawatan` text NOT NULL,
  `status` int(11) NOT NULL,
  `usrInput` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `idUser` int(11) NOT NULL,
  `nmPengguna` varchar(100) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `status` int(2) NOT NULL,
  `idLevel` int(11) NOT NULL,
  `idPengguna` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`idUser`, `nmPengguna`, `username`, `password`, `status`, `idLevel`, `idPengguna`) VALUES
(1, 'Admin', 'admin', 'admin123', 1, 4, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `keluhan`
--
ALTER TABLE `keluhan`
  ADD PRIMARY KEY (`idKeluhan`);

--
-- Indexes for table `leveluser`
--
ALTER TABLE `leveluser`
  ADD PRIMARY KEY (`idLevel`);

--
-- Indexes for table `mesin`
--
ALTER TABLE `mesin`
  ADD PRIMARY KEY (`idMesin`),
  ADD KEY `usrInput` (`usrInput`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`idPengguna`);

--
-- Indexes for table `peralatan`
--
ALTER TABLE `peralatan`
  ADD PRIMARY KEY (`idPeralatan`),
  ADD KEY `usrInput` (`usrInput`);

--
-- Indexes for table `perawatan`
--
ALTER TABLE `perawatan`
  ADD PRIMARY KEY (`idPerawatan`),
  ADD KEY `usrInput` (`usrInput`),
  ADD KEY `idMesin` (`idMesin`),
  ADD KEY `idPengguna` (`idPengguna`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`),
  ADD KEY `idLevel` (`idLevel`),
  ADD KEY `idPengguna` (`idPengguna`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `keluhan`
--
ALTER TABLE `keluhan`
  MODIFY `idKeluhan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `leveluser`
--
ALTER TABLE `leveluser`
  MODIFY `idLevel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mesin`
--
ALTER TABLE `mesin`
  MODIFY `idMesin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `idPengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `peralatan`
--
ALTER TABLE `peralatan`
  MODIFY `idPeralatan` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `perawatan`
--
ALTER TABLE `perawatan`
  MODIFY `idPerawatan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
