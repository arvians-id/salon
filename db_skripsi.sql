-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 23, 2023 at 06:41 AM
-- Server version: 8.0.30
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_skripsi`
--

-- --------------------------------------------------------

--
-- Table structure for table `login_admin`
--

CREATE TABLE `login_admin` (
  `id` int NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `login_admin`
--

INSERT INTO `login_admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `login_pelanggan`
--

CREATE TABLE `login_pelanggan` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_active` int NOT NULL,
  `date_created` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `login_pelanggan`
--

INSERT INTO `login_pelanggan` (`id`, `name`, `username`, `email`, `password`, `is_active`, `date_created`) VALUES
(1, 'daffa', 'daffa', 'daffa@daffa.com', 'admin', 1, 1616226085),
(6, 'mad', 'mad1', '1.pubargain@gmail.com', '1234', 1, 1616230283);

-- --------------------------------------------------------

--
-- Table structure for table `tb_gejala`
--

CREATE TABLE `tb_gejala` (
  `id_gejala` int NOT NULL,
  `kode_jenis_perawatan` varchar(20) NOT NULL,
  `kode_gejala` varchar(20) NOT NULL,
  `gejala` varchar(256) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_gejala`
--

INSERT INTO `tb_gejala` (`id_gejala`, `kode_jenis_perawatan`, `kode_gejala`, `gejala`, `created_at`, `updated_at`) VALUES
(21, 'P2', 'G001', 'Temporibus doloribus', '2023-01-21 19:37:43', '2023-01-21 19:41:53');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenis_perawatan`
--

CREATE TABLE `tb_jenis_perawatan` (
  `id_jenis_perawatan` int NOT NULL,
  `kode_jenis_perawatan` varchar(20) NOT NULL,
  `nama_jenis_perawatan` varchar(256) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jenis_perawatan`
--

INSERT INTO `tb_jenis_perawatan` (`id_jenis_perawatan`, `kode_jenis_perawatan`, `nama_jenis_perawatan`, `created_at`, `updated_at`) VALUES
(18, 'P1', 'Voluptatem quibusdam', '2023-01-21 19:20:58', '2023-01-21 19:26:12'),
(19, 'P2', 'Dolorum maxime venia', '2023-01-21 19:21:04', '2023-01-21 19:26:17');

-- --------------------------------------------------------

--
-- Table structure for table `tb_reservasi`
--

CREATE TABLE `tb_reservasi` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `perawatan` varchar(255) NOT NULL,
  `tanggal` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_reservasi`
--

INSERT INTO `tb_reservasi` (`id`, `name`, `perawatan`, `tanggal`, `email`, `phone`) VALUES
(9, 'mads', 'Rebonding', '2021-03-26', '1.pubargain@gmail.com', 2421424),
(12, 'gsahdghas', 'Rebonding', '2021-04-21', 'daffa@daffa.com', 765757656),
(13, 'daffa a', 'Rebonding', '2021-04-18', 'daffa@daffa.com', 423423432),
(14, 'fsfsfsf', 'Rebonding', '2021-04-30', 'daffa@daffa.com', 6554564),
(15, 'weqwewqe', 'Rebonding', '2021-04-30', 'daffa@daffa.com', 87654636),
(16, 'weqwewqe', 'Rebonding', '2021-04-30', 'daffa@daffa.com', 87654636);

-- --------------------------------------------------------

--
-- Table structure for table `tb_riwayat`
--

CREATE TABLE `tb_riwayat` (
  `id_riwayat` int NOT NULL,
  `kode_riwayat` varchar(20) NOT NULL,
  `nama_pelanggan` varchar(15) NOT NULL,
  `kode_jenis_perawatan` varchar(20) NOT NULL,
  `jawaban` text,
  `kode_solusi` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_rules`
--

CREATE TABLE `tb_rules` (
  `id_rules` int NOT NULL,
  `kode_rules` varchar(20) NOT NULL,
  `kode_solusi_rules` varchar(20) NOT NULL,
  `kode_gejala_rules` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_rules`
--

INSERT INTO `tb_rules` (`id_rules`, `kode_rules`, `kode_solusi_rules`, `kode_gejala_rules`) VALUES
(6, 'R1', 'SO001', 'S002');

-- --------------------------------------------------------

--
-- Table structure for table `tb_solusi`
--

CREATE TABLE `tb_solusi` (
  `id_solusi` int NOT NULL,
  `kode_solusi` varchar(20) NOT NULL,
  `judul` varchar(256) NOT NULL,
  `solusi` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_solusi`
--

INSERT INTO `tb_solusi` (`id_solusi`, `kode_solusi`, `judul`, `solusi`, `created_at`, `updated_at`) VALUES
(10, 'SO001', 'Maxime hic cillum sa', '<u>Sint pariatur? Vel e.</u>', '2023-01-21 18:49:49', '2023-01-21 18:50:03');

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `date_created` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(3, 'daffa26@gmail.com', 'lpA1iVnL7Yaf9/vRxFPh5M1DhIoQ6izW2QUid3pOPpI=', 1616230157);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login_admin`
--
ALTER TABLE `login_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_pelanggan`
--
ALTER TABLE `login_pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_gejala`
--
ALTER TABLE `tb_gejala`
  ADD PRIMARY KEY (`id_gejala`),
  ADD UNIQUE KEY `kode_gejala` (`kode_gejala`),
  ADD KEY `kode_jenis_perawatan` (`kode_jenis_perawatan`);

--
-- Indexes for table `tb_jenis_perawatan`
--
ALTER TABLE `tb_jenis_perawatan`
  ADD PRIMARY KEY (`id_jenis_perawatan`),
  ADD UNIQUE KEY `kode_jenis_perawatan` (`kode_jenis_perawatan`);

--
-- Indexes for table `tb_reservasi`
--
ALTER TABLE `tb_reservasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_riwayat`
--
ALTER TABLE `tb_riwayat`
  ADD PRIMARY KEY (`id_riwayat`),
  ADD KEY `kode_jenis_perawatan` (`kode_jenis_perawatan`);

--
-- Indexes for table `tb_rules`
--
ALTER TABLE `tb_rules`
  ADD PRIMARY KEY (`id_rules`),
  ADD UNIQUE KEY `kode_rules` (`kode_rules`) USING BTREE,
  ADD KEY `kode_solusi_rules` (`kode_solusi_rules`);

--
-- Indexes for table `tb_solusi`
--
ALTER TABLE `tb_solusi`
  ADD PRIMARY KEY (`id_solusi`),
  ADD UNIQUE KEY `kode_solusi` (`kode_solusi`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login_admin`
--
ALTER TABLE `login_admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `login_pelanggan`
--
ALTER TABLE `login_pelanggan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_gejala`
--
ALTER TABLE `tb_gejala`
  MODIFY `id_gejala` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tb_jenis_perawatan`
--
ALTER TABLE `tb_jenis_perawatan`
  MODIFY `id_jenis_perawatan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tb_reservasi`
--
ALTER TABLE `tb_reservasi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_riwayat`
--
ALTER TABLE `tb_riwayat`
  MODIFY `id_riwayat` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tb_rules`
--
ALTER TABLE `tb_rules`
  MODIFY `id_rules` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_solusi`
--
ALTER TABLE `tb_solusi`
  MODIFY `id_solusi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_gejala`
--
ALTER TABLE `tb_gejala`
  ADD CONSTRAINT `tb_gejala_ibfk_1` FOREIGN KEY (`kode_jenis_perawatan`) REFERENCES `tb_jenis_perawatan` (`kode_jenis_perawatan`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `tb_riwayat`
--
ALTER TABLE `tb_riwayat`
  ADD CONSTRAINT `tb_riwayat_ibfk_1` FOREIGN KEY (`kode_jenis_perawatan`) REFERENCES `tb_jenis_perawatan` (`kode_jenis_perawatan`);

--
-- Constraints for table `tb_rules`
--
ALTER TABLE `tb_rules`
  ADD CONSTRAINT `tb_rules_ibfk_1` FOREIGN KEY (`kode_solusi_rules`) REFERENCES `tb_solusi` (`kode_solusi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
