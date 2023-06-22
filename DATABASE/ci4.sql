-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2023 at 12:05 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci4`
--

-- --------------------------------------------------------

--
-- Table structure for table `komik`
--

CREATE TABLE `komik` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `penulis` varchar(255) NOT NULL,
  `penerbit` varchar(255) NOT NULL,
  `sampul` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `komik`
--

INSERT INTO `komik` (`id`, `judul`, `slug`, `penulis`, `penerbit`, `sampul`, `created_at`, `updated_at`) VALUES
(1, 'Naruto', 'naruto', 'Massashi Kishimoto', 'Shonen Jump', 'naruto.jpg', NULL, '2023-06-20 04:07:51'),
(2, 'One Piece', 'one-piece', 'Eichiro Oda', 'Gramedia', 'onepiece.jpg', NULL, NULL),
(8, 'coba', 'coba', 'test', 'test', '1687270930_b11a6cc1249c1d0c6e01.png', '2023-06-20 08:17:43', '2023-06-20 09:22:10');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` text NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2023-06-21-063144', 'App\\Database\\Migrations\\Orang', 'default', 'App', 1687329775, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orang`
--

CREATE TABLE `orang` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orang`
--

INSERT INTO `orang` (`id`, `nama`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'Sanas', 'JL. ABV No. 123', NULL, NULL),
(2, 'Sanas', 'JL. ABV No. 123', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Akmal', 'Jl. ABC No. 123', NULL, NULL),
(4, 'Alwin', 'Jl. ABC No. 123', NULL, NULL),
(5, 'Win', 'Jl. ABC No. 123', NULL, NULL),
(6, 'Balqis', 'Jl. ABC No. 123', NULL, NULL),
(7, 'Ardi', 'Jl. ABC No. 123', NULL, NULL),
(8, 'Jafar', 'Jl. ABC No. 123', NULL, NULL),
(9, 'Agi', 'Jl. ABC No. 123', NULL, NULL),
(10, 'Sandi', 'Jl. ABC No. 123', NULL, NULL),
(11, 'Maxwell', 'Jl. ABC No. 123', NULL, NULL),
(12, 'Ilham', 'Jl. ABC No. 123', NULL, NULL),
(13, 'Agung', 'Jl. ABC No. 123', NULL, NULL),
(14, 'Bibo', 'Jl. ABC No. 123', NULL, NULL),
(15, 'Surya', 'Jl. ABC No. 123', NULL, NULL),
(16, 'Fais', 'Jl. ABC No. 123', NULL, NULL),
(17, 'Gilbert', 'Jl. ABC No. 123', NULL, NULL),
(18, 'Zico', 'Jl. ABC No. 123', NULL, NULL),
(19, 'Tasya', 'Jl. ABC No. 123', NULL, NULL),
(20, 'Novi', 'Jl. ABC No. 123', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `komik`
--
ALTER TABLE `komik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orang`
--
ALTER TABLE `orang`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `komik`
--
ALTER TABLE `komik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orang`
--
ALTER TABLE `orang`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
