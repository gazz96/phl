-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 18, 2024 at 03:31 AM
-- Server version: 10.2.31-MariaDB-log
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phl`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id` int(11) NOT NULL,
  `nama` varchar(150) NOT NULL DEFAULT '',
  `wilayah_hukum_id` int(11) DEFAULT NULL,
  `tempat_lahir` int(11) NOT NULL,
  `tanggal_lahir` int(11) NOT NULL,
  `agama` int(11) NOT NULL,
  `suku` int(11) NOT NULL,
  `hp` int(11) NOT NULL,
  `nama_panggilan` varchar(150) DEFAULT NULL,
  `golongan_daran` varchar(30) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `jenis_kelamin` int(1) DEFAULT NULL,
  `jenis_rambut` int(11) NOT NULL,
  `warna_mata` int(11) NOT NULL,
  `warna_kulit` int(11) NOT NULL,
  `warna_rambut` int(11) NOT NULL,
  `anak_ke` int(2) NOT NULL,
  `anak_dari` int(2) NOT NULL,
  `alamat` text NOT NULL,
  `tinggi` float NOT NULL,
  `berat` float NOT NULL,
  `ukuran_topi` varchar(10) NOT NULL,
  `ukuran_sepatu` varchar(10) NOT NULL,
  `ukuran_celana` varchar(10) NOT NULL,
  `ukuran_baju` varchar(10) NOT NULL,
  `sidik_jari_1` text DEFAULT NULL,
  `sidik_jari_2` text DEFAULT NULL,
  `file_bpjs` text DEFAULT NULL,
  `file_npwp` text DEFAULT NULL,
  `nik` varchar(16) DEFAULT NULL,
  `file_akte_lahir` text DEFAULT NULL,
  `jenis_anggota_id` int(11) DEFAULT NULL,
  `foto` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_anggota`
--

CREATE TABLE `jenis_anggota` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `keluarga_anggota`
--

CREATE TABLE `keluarga_anggota` (
  `id` int(11) NOT NULL,
  `anggota_id` int(11) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `jenis_kelamin` int(1) DEFAULT NULL,
  `hubungan_keluarga` varchar(50) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  `pekerjaan` varchar(50) DEFAULT NULL,
  `nik` varchar(30) DEFAULT NULL,
  `file_nik` text DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `foto` text DEFAULT NULL,
  `telp` varchar(15) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE `kota` (
  `id` int(11) NOT NULL,
  `nama` varchar(70) DEFAULT NULL,
  `provinsi_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`id`, `nama`, `provinsi_id`, `created_at`, `updated_at`) VALUES
(1, 'Bandung', 3, '2024-05-17 20:01:09', '2024-05-17 20:01:09');

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

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
-- Table structure for table `pendidikan_anggota`
--

CREATE TABLE `pendidikan_anggota` (
  `id` int(11) NOT NULL,
  `anggota_id` int(11) NOT NULL,
  `tingkat` varchar(30) NOT NULL,
  `institusi` varchar(150) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `tampilkan_gelar` int(11) NOT NULL DEFAULT 1,
  `tanggal_mulai_pendidikan` date DEFAULT NULL,
  `akreditasi` varchar(10) DEFAULT NULL,
  `file_akreditasi` text DEFAULT NULL,
  `transkrip_nilai` text DEFAULT NULL,
  `tanggal_lulus` date DEFAULT NULL,
  `jurusan` varchar(150) DEFAULT NULL,
  `nomor_ijazah` varchar(150) DEFAULT NULL,
  `file_ijazah` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `provinsi`
--

CREATE TABLE `provinsi` (
  `id` int(11) NOT NULL,
  `nama` varchar(150) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `provinsi`
--

INSERT INTO `provinsi` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(2, 'Sumatera Utara', '2024-05-17 19:33:37', '2024-05-17 19:34:08'),
(3, 'Jawa Barat', '2024-05-17 19:34:28', '2024-05-17 19:34:28');

-- --------------------------------------------------------

--
-- Table structure for table `satuan_kerja`
--

CREATE TABLE `satuan_kerja` (
  `id` int(11) NOT NULL,
  `nama` varchar(150) DEFAULT NULL,
  `provinsi_id` int(11) DEFAULT NULL,
  `kota_id` int(11) DEFAULT NULL,
  `kecamatan_id` int(11) DEFAULT NULL,
  `kelurahan_id` int(11) DEFAULT NULL,
  `wilayah_hukum_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `logo` text DEFAULT NULL,
  `alamat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sim_anggota`
--

CREATE TABLE `sim_anggota` (
  `id` int(11) NOT NULL,
  `anggota_id` int(11) DEFAULT NULL,
  `jenis` varchar(3) NOT NULL,
  `nomor` varchar(16) DEFAULT NULL,
  `file` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wilayah_hukum`
--

CREATE TABLE `wilayah_hukum` (
  `id` int(11) NOT NULL,
  `wilayah_hukum_id` int(11) DEFAULT NULL,
  `nama` varchar(150) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wilayah_hukum`
--

INSERT INTO `wilayah_hukum` (`id`, `wilayah_hukum_id`, `nama`, `created_at`, `updated_at`) VALUES
(1, NULL, 'MABES', '2024-05-17 20:17:40', '2024-05-17 20:24:41'),
(2, 1, 'POLDA', '2024-05-17 20:18:37', '2024-05-17 20:18:37'),
(3, 2, 'POLRES', '2024-05-17 20:18:50', '2024-05-17 20:18:50'),
(4, 3, 'POLSEK', '2024-05-17 20:19:03', '2024-05-17 20:19:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jenis_anggota`
--
ALTER TABLE `jenis_anggota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keluarga_anggota`
--
ALTER TABLE `keluarga_anggota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
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
-- Indexes for table `pendidikan_anggota`
--
ALTER TABLE `pendidikan_anggota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `satuan_kerja`
--
ALTER TABLE `satuan_kerja`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sim_anggota`
--
ALTER TABLE `sim_anggota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wilayah_hukum`
--
ALTER TABLE `wilayah_hukum`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenis_anggota`
--
ALTER TABLE `jenis_anggota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `keluarga_anggota`
--
ALTER TABLE `keluarga_anggota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kota`
--
ALTER TABLE `kota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pendidikan_anggota`
--
ALTER TABLE `pendidikan_anggota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `provinsi`
--
ALTER TABLE `provinsi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `satuan_kerja`
--
ALTER TABLE `satuan_kerja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sim_anggota`
--
ALTER TABLE `sim_anggota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wilayah_hukum`
--
ALTER TABLE `wilayah_hukum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
