-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2023 at 05:29 AM
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
-- Database: `si_anak_pkl`
--

-- --------------------------------------------------------

--
-- Table structure for table `anak_magang`
--

CREATE TABLE `anak_magang` (
  `id_magang` int(11) NOT NULL,
  `id_user` bigint(20) NOT NULL,
  `id_minat` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `anak_magang`
--

INSERT INTO `anak_magang` (`id_magang`, `id_user`, `id_minat`, `created_at`, `updated_at`) VALUES
(8, 22, 1, '2023-10-17 18:58:06', '2023-10-17 18:58:06'),
(9, 21, 2, '2023-10-17 18:58:43', '2023-10-17 18:58:43');

-- --------------------------------------------------------

--
-- Table structure for table `bidang`
--

CREATE TABLE `bidang` (
  `id_bidang` int(11) NOT NULL,
  `bidang` varchar(50) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bidang`
--

INSERT INTO `bidang` (`id_bidang`, `bidang`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 'Web Developer', 'Seorang Leader Membimbing akan anak magang dalam meningkatakan skill pemrograman berbasis web ', NULL, NULL),
(2, 'mobile developer', 'mobile developer adalah profesi di bidang IT yang banyak dibutuhkan saat ini, apalagi kehidupan sehari-hari manusia hampir tidak bisa terlepas dari smartphone.', '2023-10-01 01:20:17', '2023-10-01 01:20:17');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leader`
--

CREATE TABLE `leader` (
  `id_leader` int(11) NOT NULL,
  `id_user` bigint(20) NOT NULL,
  `id_bidang` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leader`
--

INSERT INTO `leader` (`id_leader`, `id_user`, `id_bidang`, `created_at`, `updated_at`) VALUES
(5, 18, 1, '2023-10-11 22:30:02', '2023-10-17 18:27:55'),
(6, 19, 1, '2023-10-17 17:58:00', '2023-10-17 17:58:00');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_10_18_022535_buat_tabel_produk', 1),
(6, '2022_10_18_030456_ubah_tabel_produk', 1),
(7, '2022_11_15_032151_buat_tabel_pegawai', 1),
(8, '2022_11_29_015906_buat_tabel_kategori', 1),
(9, '2022_11_29_023258_tambah_kolom_tabel_produk', 1),
(10, '2023_10_11_083409_create_tasks_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `presensi`
--

CREATE TABLE `presensi` (
  `id` int(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `tgl` date DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `waktu_pulang` varchar(255) DEFAULT NULL,
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `presensi`
--

INSERT INTO `presensi` (`id`, `id_user`, `tanggal`, `status`, `tgl`, `keterangan`, `waktu_pulang`, `created_at`, `updated_at`) VALUES
(35, 21, '2023-10-29T23:23', 'Hadir', '2023-10-29', 'Telat 15 jam 23 menit', '2023-10-30 08:23:00', '2023-10-29 23:23:40', '2023-10-29 23:23:40');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `deadline` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `file_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `subject`, `description`, `deadline`, `file_path`, `created_at`, `updated_at`) VALUES
(23, 'ngnnt', 'asasa', '2023-10-14 07:59:00', 'storage/tasks/pertemuan7.pdf', '2023-10-13 23:59:07', '2023-10-13 23:59:07'),
(24, 'aji', 'aaajjj', '2023-10-14 09:02:00', 'storage/tasks/FIXX EVILA NUR AINI-LAPORAN PKL.pdf', '2023-10-14 00:00:48', '2023-10-14 00:00:48'),
(25, 'eksploitasi', 'semngat', '2023-10-16 08:36:00', 'storage/tasks/MODUL PRAKTIK EKPLORASI DATA.pdf', '2023-10-15 01:37:06', '2023-10-15 01:37:06'),
(26, 'anji', 'nynayi', '2023-10-18 00:05:00', 'storage/tasks/Berita Acara Ujian PKL.docx', '2023-10-17 19:00:33', '2023-10-17 19:00:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `level`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'rizal firdaus', 'admin', 'zal@gmail.com', NULL, '$2y$10$WLxpE8sVHsb0DScAlZI4auEa906RJdqQ.nZYPbT6y6hvkR8eWYVQm', NULL, '2023-05-10 20:55:46', '2023-05-10 20:55:46'),
(18, 'arema', 'leader', 'arema@gmail.com', NULL, '$2y$10$x/R8MxsD.MgxkwagW.zNreqEzHMkE3cIfAO9BVsiAyS7hgy4QXDxq', NULL, '2023-09-30 09:52:34', '2023-09-30 09:52:34'),
(19, 'apgan', 'leader', 'apgan@gmail.com', NULL, '$2y$10$rqp9FmWcSPHMlfYqiamWFuBlYb5tCpOjeaTDAuPB7SyI3REWXGHtS', NULL, '2023-09-30 21:14:31', '2023-09-30 21:14:31'),
(21, 'virgin', 'magang', 'virgin@gmail.com', NULL, '$2y$10$gFprhRQn7AxBdEZv0TgRQOIu0NjaLwDVgSPN5NOE9c8ALkg.a1suq', NULL, '2023-10-11 20:42:01', '2023-10-11 20:42:01'),
(22, 'elu', 'magang', 'ridwan@yahoo.com', NULL, '$2y$10$aqmLlGQURFgLtX3HG6GtPO9Th3NaYfPILH4abp3IvyKJ0ecVhHy1a', NULL, '2023-10-17 18:40:44', '2023-10-17 18:40:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anak_magang`
--
ALTER TABLE `anak_magang`
  ADD PRIMARY KEY (`id_magang`),
  ADD UNIQUE KEY `id_user` (`id_user`);

--
-- Indexes for table `bidang`
--
ALTER TABLE `bidang`
  ADD PRIMARY KEY (`id_bidang`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `leader`
--
ALTER TABLE `leader`
  ADD PRIMARY KEY (`id_leader`),
  ADD KEY `id_user` (`id_user`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `presensi`
--
ALTER TABLE `presensi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anak_magang`
--
ALTER TABLE `anak_magang`
  MODIFY `id_magang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `bidang`
--
ALTER TABLE `bidang`
  MODIFY `id_bidang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leader`
--
ALTER TABLE `leader`
  MODIFY `id_leader` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `presensi`
--
ALTER TABLE `presensi`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
