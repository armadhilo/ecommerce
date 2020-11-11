-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2020 at 11:29 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`) VALUES
(1, 'buku'),
(2, 'kosmetik'),
(3, 'kesehatan');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_11_08_105939_users', 2),
(4, '2020_11_08_110531_category', 2),
(5, '2020_11_08_110738_product', 2),
(6, '2020_11_08_114458_users_log', 2),
(7, '2020_11_08_131246_add_role_to_users', 2),
(8, '2020_11_08_153119_add_datetime_to_users_log', 2),
(9, '2020_11_10_075927_slider', 3),
(10, '2020_11_10_083654_add_softdelete_to_slider', 3),
(11, '2020_11_10_112509_add_nama_lengkap_to_product', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `users_id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pic` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mitra` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isbn` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jml_halaman` int(11) DEFAULT NULL,
  `penerbit` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `nama_lengkap` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `category_id`, `users_id`, `product_name`, `description`, `image`, `pic`, `mitra`, `isbn`, `jml_halaman`, `penerbit`, `status`, `deleted_at`, `nama_lengkap`) VALUES
(10, 1, 1, 'consectetur adipisicing elit', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '16050139451b654391780815.5e3ab26704cc0.jpg', NULL, NULL, '988894', 5, '5', 1, NULL, 'consectetur adipisicing elit'),
(11, 2, 1, 'alenbh', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '16050264588.jpg', 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet', NULL, NULL, NULL, 1, NULL, NULL),
(12, 2, 1, 'Alen', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '16050264588.jpg', NULL, 'Lorem ipsum dolor sit amet', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slider` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `slider`, `created_at`, `updated_at`, `deleted_at`) VALUES
(6, '1605014944orange.jpg', '2020-11-10 06:29:04', NULL, NULL),
(7, '1605014957coffee.jpg', '2020-11-10 06:29:17', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `role` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `nama`, `no_hp`, `alamat`, `deleted_at`, `role`) VALUES
(1, 'admin', '$2y$10$s3oqCXU3m/pJ0i0qqE.rwen4cxg3KK0yJvrUoX6Tu4V.krJYUOgsi', 'Administrator', NULL, NULL, NULL, '1'),
(20, 'dinda.ang', '$2y$10$vUjzr3K1awHb.bVRS0PcxOvPCfflTNZMCOuKkeqOiSMEXf3hTbIn2', 'Dinda', NULL, NULL, NULL, '2'),
(21, 'a', '$2y$10$n76cmY4hOc/9lErilxhVA.L0KkfdjG6Ot0me4mkTeHRIUHGlZeJVm', 'a', 'sdef', 'rg', NULL, '2'),
(22, 'b', '$2y$10$zuxwLhI4txz2lE3Uic.Q6e3O.fpsk32FmX5gO82iHWUYqvGc/roX.', 'bcc', NULL, NULL, NULL, '2'),
(23, 'b', '$2y$10$lXU.lPwp7ia7YG0c6D5pnO8hmxCJ70KBSPQ7UZ1IuAeKFCvEFtxEW', 'bbbbb', NULL, NULL, NULL, '2'),
(24, 'aaaaa', '$2y$10$BYM9cMAh2lnBWesAQLurh.9xqOzszuXavZzlfbOatxdH98p7Cyr8m', 'bb', 'bb', 'bb', NULL, '2'),
(25, 'a', '$2y$10$RGCJ3etGDcpdPfdpr0luu.TmmyNriss/Ma.W152sTD6.LIzjWOuni', 'a', 'a', 'a', NULL, '2'),
(26, 'alen', '$2y$10$NwCoSR8g.iVcAQZdNX0.ouMqWc0LSL8I2JV9kMQiiz7fO0fZsuR3y', 'alen', NULL, NULL, NULL, '2'),
(27, 'dinda', '$2y$10$ytmfEjEgsZhaXUejp/ne4OCzYymH/j7tNmO6kHb.Q3q/TU.b5Q6Hu', 'dinda', NULL, NULL, NULL, '2'),
(28, 'kevin', '$2y$10$UbkOm.z1cy7RUVXz8xHpj.D4rVMHzlCZYakgbDTUle4tBKgMJRNl2', 'kevin', NULL, NULL, NULL, '2'),
(29, 'dinda.ang', '$2y$10$s3oqCXU3m/pJ0i0qqE.rwen4cxg3KK0yJvrUoX6Tu4V.krJYUOgsi', 'Dinda Anggraini', NULL, NULL, NULL, '2');

-- --------------------------------------------------------

--
-- Table structure for table `users_log`
--

CREATE TABLE `users_log` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `users_id` int(10) UNSIGNED NOT NULL,
  `action` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_log`
--

INSERT INTO `users_log` (`id`, `users_id`, `action`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'INSERT', 6, '2020-11-10 04:20:04', '2020-11-10 04:20:04'),
(2, 1, 'INSERT', 7, '2020-11-10 04:32:30', '2020-11-10 04:32:30'),
(3, 1, 'DELETE', 7, '2020-11-10 04:32:37', '2020-11-10 04:32:37'),
(4, 1, 'INSERT', 8, '2020-11-10 04:33:38', '2020-11-10 04:33:38'),
(5, 1, 'UPDATE', 1, '2020-11-10 04:35:20', '2020-11-10 04:35:20'),
(6, 1, 'INSERT', 9, '2020-11-10 06:02:43', '2020-11-10 06:02:43'),
(7, 1, 'UPDATE', 0, '2020-11-10 06:02:59', '2020-11-10 06:02:59'),
(8, 1, 'DELETE', 8, '2020-11-10 06:03:27', '2020-11-10 06:03:27'),
(9, 1, 'INSERT', 10, '2020-11-10 06:12:25', '2020-11-10 06:12:25'),
(10, 1, 'UPDATE', 0, '2020-11-10 06:12:51', '2020-11-10 06:12:51'),
(11, 1, 'INSERT', 11, '2020-11-10 06:13:18', '2020-11-10 06:13:18'),
(12, 1, 'UPDATE', 0, '2020-11-10 09:46:12', '2020-11-10 09:46:12'),
(13, 1, 'UPDATE', 1, '2020-11-10 09:46:48', '2020-11-10 09:46:48'),
(14, 1, 'UPDATE', 1, '2020-11-10 09:48:19', '2020-11-10 09:48:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_log`
--
ALTER TABLE `users_log`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users_log`
--
ALTER TABLE `users_log`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
