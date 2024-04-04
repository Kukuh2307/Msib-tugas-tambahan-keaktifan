-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 04, 2024 at 06:55 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tugas_tambahan_keaktifan`
--

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `noWa` varchar(50) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `nama_orang_tua` varchar(50) NOT NULL,
  `pekerjaan_orang_tua` varchar(50) NOT NULL,
  `penghasilan_orang_tua` decimal(10,2) DEFAULT NULL,
  `nilai` varchar(50) NOT NULL,
  `major` varchar(50) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nama`, `email`, `password`, `noWa`, `tempat_lahir`, `date`, `nama_orang_tua`, `pekerjaan_orang_tua`, `penghasilan_orang_tua`, `nilai`, `major`, `alamat`) VALUES
(10, 'Kukhuh Agung Prasetyo', 'kukuhagung12@gmail.com', '$2y$10$1I4cwvy1YLFoEuBc9eD4J.Oncc1On8yrT90OOF9uI3ORjBCevNHoa', '081555762605', 'Kab. Tulungagung', '2000-07-23', 'Samsiyah', 'Guru', 5000000.00, '88', 'Teknik Informatika', 'Kepuhrejo\r\nKec.ngantru'),
(11, 'Sari', 'sari@gmail.com', '$2y$10$moG034mvOraaaEQRJ6HYUOt8LwUNUsUFQRUMsyj01hCNaI7HufHj.', '081555762605', 'Kab. Kediri', '2001-06-21', 'dadsad', 'buruh', 2000000.00, '76', 'Sistem Informasi', 'Kepuhrejo\r\nKec.ngantru'),
(12, 'Jojo', 'jojo@gmail.com', '$2y$10$ic2F81V/NFTHMD9ikeu5ZuZ4Fd1io458vDZ/rrfN6z13YjeXx.J2y', '081343532432', 'Kab. Tangerang', '2024-04-04', 'Bambang pamungkas', 'Atlet', 2000000.00, '59', 'Teknik Mesin', 'Kepuhrejo\r\nKec.ngantru'),
(14, 'Melati', 'melati@gmail.com', '$2y$10$LtiyPVfQmsn2T1iDQYi1V.ZCEP1BMh1ZOs8CulBiUMDEJP91m2vtO', '081555762605', 'Kab. Tulungagung', '2024-04-04', 'dadsad', 'Guru', 80000000.00, '88', 'Sistem Informasi', 'Kepuhrejo\r\nKec.ngantru');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
