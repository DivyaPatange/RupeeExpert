-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 26, 2020 at 04:34 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rupee_expert`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@admin.com', '$2y$10$kzzRstLT7roT36Ug8gho/epIo.MblX/SCNL3Jzik5kg8XG6SLUkzG', NULL, '2020-10-25 06:44:47', '2020-10-25 06:44:47');

-- --------------------------------------------------------

--
-- Table structure for table `daily_reports`
--

DROP TABLE IF EXISTS `daily_reports`;
CREATE TABLE IF NOT EXISTS `daily_reports` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `client_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gross` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remiser` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `daily_reports`
--

INSERT INTO `daily_reports` (`id`, `client_id`, `name`, `gross`, `remiser`, `created_at`, `updated_at`) VALUES
(1, 'AKHG1022            ', 'Atul Shalik Dahake', '3.4952', '1.7476', NULL, NULL),
(2, 'AKHG1034            ', 'SHUBHAM SHAKTI DAHIWALKAR', '19.767', '9.8836', NULL, NULL),
(3, 'AKHG1015            ', 'SANTOSH SHUKRACHARI JOGLEKAR', '1060', '530', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(13, '2014_10_12_000000_create_users_table', 1),
(14, '2014_10_12_100000_create_password_resets_table', 1),
(15, '2019_08_19_000000_create_failed_jobs_table', 1),
(16, '2020_10_24_092926_create_admins_table', 1),
(18, '2020_10_26_155459_create_daily_reports_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `contact_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password_1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reference_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_client_id_unique` (`client_id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `contact_no`, `address`, `password`, `password_1`, `client_id`, `reference_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Divya Patange', 'divyapatange0@gmail.com', NULL, '9595929216', 'Golibar chowk, Patvi galli, Nagpur', '$2y$10$ldZGCoinvLXiaYvf3mT5RuroB/W/q0gCHYDXvqLI2/GkIYFtwnjjO', '12345678', 'RE123456', '0', NULL, '2020-10-25 06:27:08', '2020-10-25 06:27:08'),
(2, 'Gaurav Patange', 'gauravpatange2013@gmail.com', NULL, '9595474847', 'Golibar chowk, Patvi galli, Nagpur', '$2y$10$IMui30TJCaZXjcavV3uQNuNKJZ2BaJfeg/MF9zfzvTqkwYYFMm2PC', '12345678', 'RE123457', '0', NULL, '2020-10-25 06:28:48', '2020-10-25 06:28:48'),
(3, 'Samruddhi', 'samruddhi@gmail.com', NULL, '7456987410', 'Golibar chowk, Patvi galli, Nagpur', '$2y$10$.xSUtK3HZ6DAB76lVNKFh.FZsOabsNyrkLgY8Kb/urIEdVTkzCFa2', '12345678', 'RE123458', '0', NULL, '2020-10-25 06:34:39', '2020-10-25 06:34:39'),
(4, 'Demo', 'demo@gmail.com', NULL, '1234567890', 'Golibar chowk, Patvi galli, Nagpur', '$2y$10$RcCpusiHJ85qBSiIIoXgbefTUifBlW3gX4sPoTpV4mnceITbvbbtu', '12345678', 'RE123459', '0', NULL, '2020-10-25 06:38:00', '2020-10-25 06:38:00'),
(5, 'demo2', 'demo2@gmail.com', NULL, '7456321548', 'Golibar chowk, Patvi galli, Nagpur', '$2y$10$wodY/A3VWuhd.14LqLebT.PVuS7VWJAzjj73YY.HVQxhY4AbiQ.c6', '12345678', 'RE123450', '0', NULL, '2020-10-25 06:40:33', '2020-10-25 06:40:33'),
(6, 'demo1', 'demo1@gmail.com', NULL, '6548720123', 'Golibar chowk, Patvi galli, Nagpur', '$2y$10$Juvwxox.JJksHFuo5noTJu7D3a3tnEKaK1sw4huvo0iDopTYFSbQe', '12345678', 'RE123452', '0', NULL, '2020-10-25 06:43:26', '2020-10-25 06:43:26'),
(7, 'demo4', 'demo4@gmail.com', NULL, '1234567890', 'Golibar chowk, Patvi galli, Nagpur', '$2y$10$5fUBoTmmpjs8BEdXPmTuOOv1jj.rLkhTADYr5DlOQh.9kG1PJnmYm', '12345678', 'RE123453', 'RE123452', NULL, '2020-10-25 08:09:07', '2020-10-25 08:09:07'),
(8, 'demo5', 'demo5@gmail.com', NULL, '1234567890', 'Golibar chowk, Patvi galli, Nagpur', '$2y$10$XjmbqjMfcXAHXGVtkLqqPuw5Uvqw9Y6M4S9yMUfRg9Kr9jNjH9a.y', '12345678', 'RE123410', 'RE123456', NULL, '2020-10-25 08:10:30', '2020-10-25 08:10:30'),
(9, 'demo6', 'demo6@gmail.com', NULL, '1234567890', 'Golibar chowk, Patvi galli, Nagpur', '$2y$10$PxoWjGJBEtJLxXVhSQKj0.Y3CbjMVzv/SgsueYbfkx8A8/J7ujRRm', '12345678', 'RE123411', 'RE123453', NULL, '2020-10-25 08:11:24', '2020-10-25 08:11:24'),
(10, 'demo7', 'demo7@gmail.com', NULL, '1234567890', 'Golibar chowk, Patvi galli, Nagpur', '$2y$10$/M5MRHd98y1D4.P6zQn6j.ysz.b8AfgeKkJqiDrAgtRnvff0d1hBi', '12345678', 'RE123413', 'RE123452', NULL, '2020-10-25 08:24:29', '2020-10-25 08:24:29'),
(11, 'demo8', 'demo8@gmail.com', NULL, '1234567890', 'Golibar chowk, Patvi galli, Nagpur', '$2y$10$HX3wyq9f.beeUiZpEI9SxOjWfcdjtUz1h13FsIe76bWPvPJ6WF1oK', '12345678', 'RE123414', 'RE123452', NULL, '2020-10-25 08:26:13', '2020-10-25 08:26:13'),
(12, 'demo8', 'demo9@gmail.com', NULL, '1234567890', 'Golibar chowk, Patvi galli, Nagpur', '$2y$10$Z4NQq8KysWX4B2oc.wl4q.M88/BbrlAETdyAEzLnHD.EOEKaskmSy', '12345678', 'RE123415', 'RE123452', NULL, '2020-10-25 08:28:50', '2020-10-25 08:28:50'),
(13, 'demo10', 'demo10@gmail.com', NULL, '1234567890', 'Golibar chowk, Patvi galli, Nagpur', '$2y$10$ISPchRRxyWRxCqWlo0ZoSOToZlSXoIXoitaFlC/IVD5IiH.zlVLjS', '12345678', 'RE123417', 'RE123453', NULL, '2020-10-25 08:33:04', '2020-10-25 08:33:04'),
(14, 'demo11', 'demo11@gmail.com', NULL, '1234567890', 'Golibar chowk, Patvi galli, Nagpur', '$2y$10$SGz.MIPJudri6Rd6ouz5HusmHm8KLmq6BdDCYnWoknbiBHUDMNeju', '12345678', 'RE123416', 'RE123453', NULL, '2020-10-25 10:27:06', '2020-10-25 10:27:06'),
(15, 'Atul Shalik Dahake', 'atual@gmail.com', NULL, '8452301539', 'ngfjdkghfk', '$2y$10$DRvEjeeMjrUcU267QJi/..3GUqK8L9cEU9CguVtGwsE3h98afz/Ya', '12345678', 'AKHG1022', '0', NULL, '2020-10-26 11:01:36', '2020-10-26 11:01:36'),
(16, 'SHUBHAM SHAKTI DAHIWALKAR', 'shubham@gmail.com', NULL, '8420365980', 'fbjdhfguhfi', '$2y$10$kmZB5lGg1Mr/OQV7AdD20u1roFqsEvjHz.07c3UfjU1gF4/bEqVmW', '12345678', 'AKHG1034', '0', NULL, '2020-10-26 11:03:10', '2020-10-26 11:03:10');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
