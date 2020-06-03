-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 30, 2020 at 03:32 PM
-- Server version: 8.0.20-0ubuntu0.20.04.1
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `company`
--

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint UNSIGNED NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `phone` bigint DEFAULT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shareholders` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `nepalidate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `company`, `type`, `address`, `phone`, `owner`, `shareholders`, `description`, `nepalidate`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'prasai suppliers', 'firm', 'this', 9801192187, 'this', 'this', 'this', 'this', 1, '2020-05-29 07:38:47', '2020-05-29 07:38:47'),
(2, 'coca cola', 'brewery', 'lasjhd', 2345, 'skldj', 'laskdjf', 'lasjk', 'aslkdj', 0, '2020-05-29 10:45:55', '2020-05-29 10:45:55'),
(3, 'pepsi', 'j', 'jhg', 7896868, 'jhg', 'jhg', 'jhg', 'jhg', 1, '2020-05-29 10:52:14', '2020-05-29 10:52:14'),
(4, 'jersy', 'cloth', 'jhk', 9879, 'ljkklh', 'kjh', 'kjh', 'kjh', 1, '2020-05-29 11:01:57', '2020-05-29 11:01:57'),
(5, 'cool company', 'hjg', 'jkhg', 78686, 'kjh', 'kjh', 'kjh', 'kjh', 1, '2020-05-29 11:03:56', '2020-05-29 11:03:56'),
(6, 'kamakya Gas', 'Gas', 'duhabi, sunsari', 986896, 'ram baran yadav', 'ravi, keshav, shyam', 'a gas company', 'nepali date is not compulsory', 0, '2020-05-29 11:20:47', '2020-05-29 11:20:47'),
(7, 'Nepal Gas', 'gas company', 'kathmandu', 9879879, 'ram kaji', 'shyam, hari, kaji', 'this is gas company.', '90879lkh', 1, '2020-05-30 03:26:06', '2020-05-30 03:26:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `companies_company_unique` (`company`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
