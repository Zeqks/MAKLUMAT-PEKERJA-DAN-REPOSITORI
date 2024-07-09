-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2024 at 06:19 AM
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
-- Database: `datapekerja`
--

-- --------------------------------------------------------

--
-- Table structure for table `pekerja`
--

CREATE TABLE `pekerja` (
  `id` int(11) NOT NULL,
  `nama_pekerja` varchar(50) NOT NULL,
  `no_kp` varchar(12) NOT NULL,
  `jantina` varchar(50) NOT NULL,
  `no_hp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pekerja`
--

INSERT INTO `pekerja` (`id`, `nama_pekerja`, `no_kp`, `jantina`, `no_hp`) VALUES
(8, 'MUHAMMAD HAZEQ BIN MOHD SOHAIMI', '041018110277', 'lelaki', '0168278985');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pekerja`
--
ALTER TABLE `pekerja`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pekerja`
--
ALTER TABLE `pekerja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
