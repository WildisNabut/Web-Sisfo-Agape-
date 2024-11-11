-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2024 at 12:12 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`username`, `password`, `level`) VALUES
('guru01', '202cb962ac59075b964b07152d234b70', 2),
('guru02', '202cb962ac59075b964b07152d234b70', 2),
('guru03', '202cb962ac59075b964b07152d234b70', 2),
('guru04', '202cb962ac59075b964b07152d234b70', 2),
('guru05', '202cb962ac59075b964b07152d234b70', 2),
('guru06', '202cb962ac59075b964b07152d234b70', 2),
('guru07', '202cb962ac59075b964b07152d234b70', 2),
('guru08', '202cb962ac59075b964b07152d234b70', 2),
('murid1', '202cb962ac59075b964b07152d234b70', 3),
('murid2', '202cb962ac59075b964b07152d234b70', 3),
('murid3', '202cb962ac59075b964b07152d234b70', 3),
('Naldo', '202cb962ac59075b964b07152d234b70', 1),
('Wildis', '202cb962ac59075b964b07152d234b70', 1);

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `nip` char(10) NOT NULL,
  `nama_guru` varchar(50) DEFAULT NULL,
  `no_hp` varchar(30) NOT NULL,
  `jenkel` varchar(10) DEFAULT NULL,
  `agama` varchar(10) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`nip`, `nama_guru`, `no_hp`, `jenkel`, `agama`, `username`) VALUES
('1234456', 'Guruku Sayang', '08211223445', 'Laki-Laki', 'Kristen', 'guru08'),
('1978063020', 'Andi Setiawan', '082890123456', 'Laki-Laki', 'Katolik', 'guru07'),
('1979051720', 'Siti Nurhaliza', '082345678901', 'Perempuan', 'Islam', 'guru02'),
('1980010120', 'Budi Santoso', '081234567890', 'Laki-Laki', 'Kristen', 'guru01'),
('1983110720', 'Rina Melati', '084567890123', 'Perempuan', 'Kristen', 'guru04'),
('1985041620', 'Dewi Anggraini', '086789012345', 'Laki-Laki', 'Katolik', 'guru06'),
('1985121520', 'Ahmad Fauzi', '083456789012', 'Laki-Laki', 'Islam', 'guru03'),
('1990010120', 'Joko Prasetyo', '085678901234', 'Laki-Laki', 'Katolik', 'guru05');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`) VALUES
(1, '7 A'),
(2, '7 B');

-- --------------------------------------------------------

--
-- Table structure for table `mata_pelajaran`
--

CREATE TABLE `mata_pelajaran` (
  `kode_mata_pelajaran` varchar(50) NOT NULL,
  `nama_matapelajaran` varchar(50) NOT NULL,
  `id_kelas` int(5) NOT NULL,
  `nip` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `mata_pelajaran`
--

INSERT INTO `mata_pelajaran` (`kode_mata_pelajaran`, `nama_matapelajaran`, `id_kelas`, `nip`) VALUES
('00107', 'Bahasa Indonesia', 1, '1978063020'),
('00207', 'Bahasa Inggris', 1, '1979051720');

-- --------------------------------------------------------

--
-- Table structure for table `murid`
--

CREATE TABLE `murid` (
  `nisn` char(10) NOT NULL,
  `nama_murid` varchar(50) DEFAULT NULL,
  `kota` varchar(45) DEFAULT NULL,
  `jenkel` varchar(45) DEFAULT NULL,
  `agama` varchar(45) DEFAULT NULL,
  `id_kelas` int(5) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `murid`
--

INSERT INTO `murid` (`nisn`, `nama_murid`, `kota`, `jenkel`, `agama`, `id_kelas`, `username`) VALUES
('12121212', 'Jesika', 'Kupang', 'Perempuan', 'Kristen', 1, 'murid1'),
('123444', 'Naldi ', 'Oesapa', 'Laki-Laki', 'Katolik', 1, 'murid2');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `nama_siswa` varchar(255) NOT NULL,
  `kelas` int(12) NOT NULL,
  `mata_pelajaran` varchar(255) NOT NULL,
  `nilai_UTS` int(11) NOT NULL,
  `nilai_USA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `Tanggal` varchar(10) DEFAULT NULL,
  `Subject` varchar(255) DEFAULT NULL,
  `Nama` varchar(50) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `No_HP` int(50) DEFAULT NULL,
  `Isi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`Tanggal`, `Subject`, `Nama`, `Email`, `No_HP`, `Isi`) VALUES
('18-05-2018', 'Test', 'Roma Debrian', 'test@yahoo.com', 2147483647, 'This messege of ded'),
('18-05-2018', 'Test', 'Roma Debrian', 'test@yahoo.com', 2147483647, 'ini adalah pesan kematian'),
('09-11-2024', 'Test', 'Wildis ', 'wildisnabut24@gmail.com', 0, 'selamat malam ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`nip`),
  ADD KEY `guru_ibfk_1` (`username`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD PRIMARY KEY (`kode_mata_pelajaran`),
  ADD KEY `mata_pelajaran_ibfk_1` (`nip`),
  ADD KEY `mata_pelajaran_fkkelas_1` (`id_kelas`);

--
-- Indexes for table `murid`
--
ALTER TABLE `murid`
  ADD PRIMARY KEY (`nisn`),
  ADD KEY `murid_ibfk_1` (`username`),
  ADD KEY `murid_fkkelas_1` (`id_kelas`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD KEY `nilai_fkmurid_1` (`nama_siswa`),
  ADD KEY `nila_fkkelas_1` (`kelas`),
  ADD KEY `nilai_fkmapel_1` (`mata_pelajaran`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `guru`
--
ALTER TABLE `guru`
  ADD CONSTRAINT `guru_ibfk_1` FOREIGN KEY (`username`) REFERENCES `akun` (`username`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD CONSTRAINT `mata_pelajaran_fkkelas_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`),
  ADD CONSTRAINT `mata_pelajaran_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `guru` (`nip`) ON DELETE SET NULL;

--
-- Constraints for table `murid`
--
ALTER TABLE `murid`
  ADD CONSTRAINT `murid_fkkelas_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`),
  ADD CONSTRAINT `murid_ibfk_1` FOREIGN KEY (`username`) REFERENCES `akun` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nila_fkkelas_1` FOREIGN KEY (`kelas`) REFERENCES `kelas` (`id_kelas`),
  ADD CONSTRAINT `nilai_fkmapel_1` FOREIGN KEY (`mata_pelajaran`) REFERENCES `mata_pelajaran` (`kode_mata_pelajaran`),
  ADD CONSTRAINT `nilai_fkmurid_1` FOREIGN KEY (`nama_siswa`) REFERENCES `murid` (`nisn`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
