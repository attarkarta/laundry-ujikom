-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2020 at 06:07 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laundry-ujikom`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(82, '2014_10_12_000000_create_users_table', 1),
(83, '2014_10_12_100000_create_password_resets_table', 1),
(84, '2019_08_19_000000_create_failed_jobs_table', 1),
(85, '2020_03_11_141054_create_tb_members_table', 1),
(86, '2020_03_11_141521_create_tb_outlets_table', 1),
(87, '2020_03_11_141844_create_tb_pakets_table', 1),
(88, '2020_03_11_142315_create_tb_detail_transaksis_table', 1),
(89, '2020_03_11_142854_create_tb_transaksis_table', 1);

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
-- Table structure for table `tb_detail_transaksis`
--

CREATE TABLE `tb_detail_transaksis` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_transaksi` int(10) UNSIGNED DEFAULT NULL,
  `id_paket` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `qty` double DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('keranjang','proses') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_detail_transaksis`
--

INSERT INTO `tb_detail_transaksis` (`id`, `id_transaksi`, `id_paket`, `id_user`, `qty`, `keterangan`, `status`, `created_at`, `updated_at`) VALUES
(96, 46, 40, 76, 5, 'Jangan pakai pemutih!', 'proses', '2020-04-14 03:14:58', '2020-04-14 03:15:09'),
(97, 46, 41, 76, 2, NULL, 'proses', '2020-04-14 03:15:05', '2020-04-14 03:15:09'),
(98, 47, 45, 76, 1, 'Baju, Celana dan Selimut', 'proses', '2020-04-14 03:16:02', '2020-04-14 03:16:06'),
(118, NULL, 40, 69, 2, 'Jangan di kucek ya gan!', 'keranjang', '2020-04-24 08:59:18', '2020-04-24 08:59:18'),
(119, NULL, 41, 69, 5, NULL, 'keranjang', '2020-04-24 08:59:25', '2020-04-24 08:59:25');

-- --------------------------------------------------------

--
-- Table structure for table `tb_members`
--

CREATE TABLE `tb_members` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` enum('L','P') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tlp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_members`
--

INSERT INTO `tb_members` (`id`, `nama`, `alamat`, `jenis_kelamin`, `tlp`, `created_at`, `updated_at`) VALUES
(15, 'Member A', 'Kota A', 'L', '0895-1212-3434', '2020-04-14 02:57:51', '2020-04-14 02:57:51'),
(16, 'Member B', 'Kota B', 'P', '0895-5656-7676', '2020-04-14 02:58:19', '2020-04-14 02:58:19'),
(17, 'Member C', 'Kota C', 'L', '0897-8986-8986', '2020-04-14 08:09:23', '2020-04-14 08:09:23'),
(18, 'Member D', 'Kota D', 'P', '0897-6865-7768', '2020-04-14 08:09:56', '2020-04-14 08:09:56'),
(19, 'Member E', 'Kota E', 'L', '0894-8986-2997', '2020-04-14 08:10:13', '2020-04-14 08:10:13');

-- --------------------------------------------------------

--
-- Table structure for table `tb_outlets`
--

CREATE TABLE `tb_outlets` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tlp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_outlets`
--

INSERT INTO `tb_outlets` (`id`, `nama`, `alamat`, `tlp`, `created_at`, `updated_at`) VALUES
(30, 'Laundry 01', 'Kota A', '021-1234-5678', '2020-04-14 02:55:54', '2020-04-14 02:55:54'),
(31, 'Laundry 02', 'Kota B', '021-3434-7676', '2020-04-14 02:59:14', '2020-04-14 02:59:14');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pakets`
--

CREATE TABLE `tb_pakets` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_outlet` int(10) UNSIGNED NOT NULL,
  `jenis` enum('kiloan','selimut','bed_cover','kaos','lain') COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_paket` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_pakets`
--

INSERT INTO `tb_pakets` (`id`, `id_outlet`, `jenis`, `nama_paket`, `harga`, `created_at`, `updated_at`) VALUES
(40, 30, 'kaos', 'Kaos Putih', 6000, '2020-04-14 03:12:43', '2020-04-14 03:12:43'),
(41, 30, 'kaos', 'Kaos Hitam', 5000, '2020-04-14 03:12:55', '2020-04-14 03:12:55'),
(42, 30, 'lain', 'Boneka', 15000, '2020-04-14 03:13:11', '2020-04-14 03:13:11'),
(43, 30, 'bed_cover', 'Bed Cover', 30000, '2020-04-14 03:13:31', '2020-04-14 03:13:31'),
(44, 30, 'selimut', 'Selimut', 10000, '2020-04-14 03:13:41', '2020-04-14 03:13:41'),
(45, 30, 'kiloan', 'Kiloan 1kg', 60000, '2020-04-14 03:14:39', '2020-04-14 03:14:39'),
(46, 31, 'kiloan', 'Kiloan 4kg', 100000, '2020-04-14 03:17:29', '2020-04-14 03:17:29'),
(47, 31, 'kaos', 'Kaos Putih', 7000, '2020-04-14 03:17:39', '2020-04-14 03:17:39'),
(48, 31, 'kaos', 'Kaos Hitam', 6000, '2020-04-14 03:17:48', '2020-04-14 03:17:48'),
(49, 31, 'lain', 'Lap/Kain', 2000, '2020-04-14 03:17:57', '2020-04-14 03:17:57'),
(50, 31, 'selimut', 'Selimut', 12000, '2020-04-14 03:18:06', '2020-04-14 03:18:06');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksis`
--

CREATE TABLE `tb_transaksis` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_outlet` int(10) UNSIGNED NOT NULL,
  `kode_invoice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_member` int(10) UNSIGNED NOT NULL,
  `tgl` date NOT NULL,
  `batas_waktu` date NOT NULL,
  `tgl_bayar` date DEFAULT NULL,
  `biaya_tambahan` int(11) DEFAULT NULL,
  `diskon` double DEFAULT NULL,
  `pajak` int(11) DEFAULT NULL,
  `status` enum('baru','proses','selesai','diambil') COLLATE utf8mb4_unicode_ci NOT NULL,
  `dibayar` enum('dibayar','belum_dibayar') COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_transaksis`
--

INSERT INTO `tb_transaksis` (`id`, `id_outlet`, `kode_invoice`, `id_member`, `tgl`, `batas_waktu`, `tgl_bayar`, `biaya_tambahan`, `diskon`, `pajak`, `status`, `dibayar`, `id_user`, `created_at`, `updated_at`) VALUES
(46, 30, 'aULekuBlcx', 15, '2020-04-14', '2020-04-17', '2020-04-21', NULL, NULL, NULL, 'diambil', 'dibayar', 76, '2020-04-14 03:15:09', '2020-04-23 23:43:54'),
(47, 30, 'M8BOp0UR8x', 16, '2020-04-14', '2020-04-17', '2020-04-14', 1500, 100, 100, 'diambil', 'dibayar', 76, '2020-04-14 03:16:06', '2020-04-14 03:16:42'),
(48, 30, 'yEOo0yzSnI', 15, '2020-04-14', '2020-04-17', '2020-04-14', 300, NULL, NULL, 'selesai', 'dibayar', 76, '2020-04-14 03:16:13', '2020-04-14 06:44:06'),
(49, 31, 'To0yqFaEM9', 15, '2020-04-14', '2020-04-17', NULL, NULL, NULL, NULL, 'baru', 'belum_dibayar', 77, '2020-04-14 03:19:52', '2020-04-14 03:19:52'),
(50, 31, 'uxrN4ZyctB', 16, '2020-04-14', '2020-04-17', '2020-04-14', 1500, 100, NULL, 'diambil', 'dibayar', 77, '2020-04-14 03:20:04', '2020-04-14 03:21:59'),
(51, 31, 'fg5VrgIhF2', 15, '2020-04-14', '2020-04-17', NULL, NULL, NULL, NULL, 'selesai', 'belum_dibayar', 77, '2020-04-14 03:20:16', '2020-04-14 03:22:04'),
(90, 30, 'rviZmpsVdb', 16, '2020-04-24', '2020-04-23', NULL, NULL, NULL, NULL, 'baru', 'belum_dibayar', 76, '2020-04-24 08:58:40', '2020-04-24 08:58:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_outlet` int(11) UNSIGNED DEFAULT NULL,
  `role` enum('superadmin','admin','kasir','owner') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `password`, `id_outlet`, `role`, `created_at`, `updated_at`) VALUES
(47, 'Super Admin', 'superadmin', '$2y$10$8ywxhMgHkU7HFJZElOlfE.b9VjXtMGrPYP4PMcGgdHlVnh8wYW9TK', NULL, 'superadmin', '2020-04-13 21:52:58', '2020-04-13 21:52:58'),
(69, 'Kasir 01', 'kasir01', '$2y$10$LPBL1OdBmchBaVX7gEV2m.MJY.bs7X9Q8ZoaIalBMgV.LwKyhXQmm', 30, 'kasir', '2020-04-14 02:56:09', '2020-04-14 02:56:09'),
(71, 'Owner 01', 'owner01', '$2y$10$D4IGgj6KYcQpmfY0170hd.J/DZn5Zq0VVbnYmzJit92KbPG6YT/ua', 30, 'owner', '2020-04-14 02:56:54', '2020-04-14 02:56:54'),
(73, 'Owner 02', 'owner02', '$2y$10$2yxub/3QtJoQcZh1sL8Iaugfs37GnoMrdFPuCfpvL1NMsnA1JSHOm', 31, 'owner', '2020-04-14 03:02:52', '2020-04-14 03:02:52'),
(74, 'Kasir 02', 'kasir02', '$2y$10$Mx3izUhXN/Mtg1c8gelMGu6RqwhP8NqV80K9JQ6bNGa8rjrxzSwxK', 31, 'kasir', '2020-04-14 03:03:08', '2020-04-14 03:03:08'),
(76, 'Admin 01', 'admin01', '$2y$10$ivetFJgIroXiu4lMp9F6QuKStMftZs37Z4bWxTjv2M.xA1pLm/po6', 30, 'admin', '2020-04-14 03:09:50', '2020-04-14 03:09:50'),
(77, 'Admin 02', 'admin02', '$2y$10$iqm5COFuuWfsjbVGLBRvEuS8Y4x7cz8b9/gvXRxmVqZLGdBx6wpX.', 31, 'admin', '2020-04-14 03:10:08', '2020-04-14 03:10:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
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
-- Indexes for table `tb_detail_transaksis`
--
ALTER TABLE `tb_detail_transaksis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_paket` (`id_paket`),
  ADD KEY `id_transaksi` (`id_transaksi`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_members`
--
ALTER TABLE `tb_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_outlets`
--
ALTER TABLE `tb_outlets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pakets`
--
ALTER TABLE `tb_pakets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_outlet` (`id_outlet`);

--
-- Indexes for table `tb_transaksis`
--
ALTER TABLE `tb_transaksis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_member` (`id_member`),
  ADD KEY `id_outlet` (`id_outlet`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_outlet` (`id_outlet`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `tb_detail_transaksis`
--
ALTER TABLE `tb_detail_transaksis`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `tb_members`
--
ALTER TABLE `tb_members`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tb_outlets`
--
ALTER TABLE `tb_outlets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tb_pakets`
--
ALTER TABLE `tb_pakets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `tb_transaksis`
--
ALTER TABLE `tb_transaksis`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_detail_transaksis`
--
ALTER TABLE `tb_detail_transaksis`
  ADD CONSTRAINT `tb_detail_transaksis_ibfk_1` FOREIGN KEY (`id_paket`) REFERENCES `tb_pakets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_detail_transaksis_ibfk_2` FOREIGN KEY (`id_transaksi`) REFERENCES `tb_transaksis` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_detail_transaksis_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_pakets`
--
ALTER TABLE `tb_pakets`
  ADD CONSTRAINT `tb_pakets_ibfk_1` FOREIGN KEY (`id_outlet`) REFERENCES `tb_outlets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_transaksis`
--
ALTER TABLE `tb_transaksis`
  ADD CONSTRAINT `tb_transaksis_ibfk_1` FOREIGN KEY (`id_member`) REFERENCES `tb_members` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_transaksis_ibfk_2` FOREIGN KEY (`id_outlet`) REFERENCES `tb_outlets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_transaksis_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_outlet`) REFERENCES `tb_outlets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
