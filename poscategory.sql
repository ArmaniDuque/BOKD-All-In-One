-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2025 at 07:13 AM
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
-- Database: `lamareamenu`
--

-- --------------------------------------------------------

--
-- Table structure for table `postablecategory`
--

CREATE TABLE `postablecategory` (
  `id` int(11) NOT NULL,
  `category` varchar(250) NOT NULL,
  `sequence` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `icon` varchar(250) NOT NULL,
  `color` varchar(250) NOT NULL,
  `others` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `postablecategory`
--

INSERT INTO `postablecategory` (`id`, `category`, `sequence`, `created_at`, `icon`, `color`, `others`) VALUES
(1, 'Inn 1 Building', '', '2025-06-23 05:27:45', '🍽️', 'blue', ''),
(2, 'Inn 2 Building', '', '2025-06-23 05:27:27', '🍹', 'purple', ''),
(3, 'Inn 3 Building', '', '2025-06-23 05:27:55', '☕', 'yellow', ''),
(4, 'Inn 4 Building', '', '2025-06-23 05:27:55', '☕', 'yellow', ''),
(5, 'Inn 5 Building', '', '2025-06-23 05:27:55', '☕', 'yellow', ''),
(6, 'Lamarea 2nd Floor', '', '2025-06-23 05:27:55', '☕', 'yellow', ''),
(7, 'Lamarea 1st Floor', '', '2025-06-23 05:27:55', '☕', 'yellow', ''),
(8, 'Main Pavilion Pool', '', '2025-06-23 05:27:55', '☕', 'yellow', ''),
(9, 'Sports Bar', '', '2025-06-23 05:27:55', '☕', 'yellow', ''),
(10, 'Garden Area', '', '2025-06-23 05:27:55', '☕', 'yellow', ''),
(11, 'Lanai Function Hall', '', '2025-06-23 05:27:55', '☕', 'yellow', ''),
(12, 'Samat A Function Hall', '', '2025-06-23 05:27:55', '☕', 'yellow', ''),
(13, 'Samat B Function Hall', '', '2025-06-23 05:27:55', '☕', 'yellow', ''),
(14, 'Hermosa Function Hall', '', '2025-06-23 05:27:55', '☕', 'yellow', ''),
(15, 'Daytour', '', '2025-06-23 05:27:55', '☕', 'yellow', ''),
(16, 'Staytion A', '', '2025-06-23 05:27:55', '☕', 'yellow', ''),
(17, 'Staytion B', '', '2025-06-23 05:27:55', '☕', 'yellow', ''),
(18, 'Staytion C', '', '2025-06-23 05:27:55', '☕', 'yellow', ''),
(19, 'Staytion D', '', '2025-06-23 05:27:55', '☕', 'yellow', ''),
(20, 'Staytion E', '', '2025-06-23 05:27:55', '☕', 'yellow', ''),
(21, 'Staytion F', '', '2025-06-23 05:27:55', '☕', 'yellow', '');


--
-- Indexes for dumped tables
--

--
-- Indexes for table `postablecategory`
--
ALTER TABLE `postablecategory`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `postablecategory`
--
ALTER TABLE `postablecategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
