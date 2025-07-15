-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2025 at 07:25 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_gereja_santo_harolus`
--

-- --------------------------------------------------------

--
-- Table structure for table `baptis`
--

CREATE TABLE `baptis` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `ortu` varchar(100) NOT NULL,
  `wali` varchar(100) NOT NULL,
  `tgl_bpt` date NOT NULL,
  `lokasi_bpt` varchar(150) NOT NULL,
  `petugas` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `baptis`
--

INSERT INTO `baptis` (`id`, `nama`, `tempat_lahir`, `tgl_lahir`, `ortu`, `wali`, `tgl_bpt`, `lokasi_bpt`, `petugas`, `created_at`, `updated_at`) VALUES
(1, 'Rifki Sadboy', 'Hulu Sungai Tengah', '2025-07-11', 'Norpah', 'Norpah', '2025-07-25', 'Purwokerto', 'Fidelis Golu', '2025-07-10 17:23:28', '2025-07-10 17:24:31');

-- --------------------------------------------------------

--
-- Table structure for table `data_kk`
--

CREATE TABLE `data_kk` (
  `id` int(11) NOT NULL,
  `nama_kk` varchar(100) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `alamat` text NOT NULL,
  `telp` varchar(20) NOT NULL,
  `pekerjaan` varchar(100) NOT NULL,
  `rayon` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_kk`
--

INSERT INTO `data_kk` (`id`, `nama_kk`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `telp`, `pekerjaan`, `rayon`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Muhammad Rifki', 'Hulu Sungai Tengah', '2003-06-02', 'L', 'Purwokero', '085751748482', 'Mahasiswa', 'Haijei Update Bro', 'Pindah', '2025-07-10 10:37:08', '2025-07-10 10:37:59'),
(3, 'Fidelis Golu', 'Nias Barat', '2003-06-02', 'L', 'Purwokerto Selatan', '085751748482', 'Mahasiswa', 'Pamijen', 'Aktif', '2025-07-10 16:54:45', '2025-07-10 16:54:45');

-- --------------------------------------------------------

--
-- Table structure for table `ekaristi`
--

CREATE TABLE `ekaristi` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tempat_komuni` varchar(150) NOT NULL,
  `tgl_komuni` date NOT NULL,
  `paroki_asal` varchar(150) NOT NULL,
  `petugas` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ekaristi`
--

INSERT INTO `ekaristi` (`id`, `nama`, `tempat_komuni`, `tgl_komuni`, `paroki_asal`, `petugas`, `created_at`, `updated_at`) VALUES
(1, 'Muhammad Rifki Diupdate', 'Purwokerto', '2025-07-11', 'STMIK Widya Ytama', 'Fidelis Gulo', '2025-07-11 07:49:04', '2025-07-11 07:49:18');

-- --------------------------------------------------------

--
-- Table structure for table `imamat`
--

CREATE TABLE `imamat` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tempat_tahbisan` varchar(150) NOT NULL,
  `tgl_tahbisan` date NOT NULL,
  `penahbis` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `imamat`
--

INSERT INTO `imamat` (`id`, `nama`, `tempat_tahbisan`, `tgl_tahbisan`, `penahbis`, `created_at`, `updated_at`) VALUES
(1, 'Muhammad Rifki Updated', 'Purwokerto', '2025-07-11', 'Fidelis Gulo', '2025-07-11 08:08:04', '2025-07-11 08:08:12');

-- --------------------------------------------------------

--
-- Table structure for table `jemaat`
--

CREATE TABLE `jemaat` (
  `id` int(11) NOT NULL,
  `id_kk` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `alamat` text NOT NULL,
  `telp` varchar(20) NOT NULL,
  `pekerjaan` varchar(100) NOT NULL,
  `rayon` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jemaat`
--

INSERT INTO `jemaat` (`id`, `id_kk`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `telp`, `pekerjaan`, `rayon`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 'Fidelis Golu Ananta', 'Nias', '2025-07-10', 'L', 'Purwokerto', '0857594834398', 'Mahasiswa', 'Purwokerto Selatan', 'Aktif', '2025-07-10 16:53:11', '2025-07-10 16:55:30');

-- --------------------------------------------------------

--
-- Table structure for table `keuangan`
--

CREATE TABLE `keuangan` (
  `id` int(11) UNSIGNED NOT NULL,
  `jenis` enum('pemasukan','pengeluaran') NOT NULL,
  `harga` decimal(15,2) NOT NULL DEFAULT 0.00,
  `kategori` varchar(100) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `keuangan`
--

INSERT INTO `keuangan` (`id`, `jenis`, `harga`, `kategori`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'pemasukan', 5000000.00, 'Gajian', 'Tidak ada', '2025-07-11 08:52:56', '2025-07-11 08:55:49');

-- --------------------------------------------------------

--
-- Table structure for table `krisma`
--

CREATE TABLE `krisma` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tempat_krisma` varchar(150) NOT NULL,
  `tgl_krisma` date NOT NULL,
  `ortu` varchar(100) NOT NULL,
  `wali` varchar(100) NOT NULL,
  `petugas` varchar(100) NOT NULL,
  `paroki_asal` varchar(150) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `krisma`
--

INSERT INTO `krisma` (`id`, `nama`, `tempat_krisma`, `tgl_krisma`, `ortu`, `wali`, `petugas`, `paroki_asal`, `created_at`, `updated_at`) VALUES
(1, 'Muhammad Rifki Diupdate', 'Purwokerto', '2025-07-11', 'Norpah', 'Sahwi', 'Fidelis Gulu', 'Purwokerto', '2025-07-11 07:39:34', '2025-07-11 07:39:57');

-- --------------------------------------------------------

--
-- Table structure for table `lektor`
--

CREATE TABLE `lektor` (
  `id` int(5) UNSIGNED NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tempat_lahir` varchar(150) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL DEFAULT 'L',
  `status` varchar(50) NOT NULL,
  `tahun_masuk` year(4) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lektor`
--

INSERT INTO `lektor` (`id`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `status`, `tahun_masuk`, `created_at`, `updated_at`) VALUES
(1, 'Muhammad Rifki Update', 'Hulu Sungai Tengah', '2025-07-08', 'L', 'Tidak Aktif', '2025', '2025-07-08 00:04:17', '2025-07-10 08:48:31'),
(3, 'Fauzan ', 'Purwokerto', '2025-07-08', 'L', 'Aktif', '2025', '2025-07-10 08:53:34', '2025-07-10 08:53:34'),
(4, 'Silva Septika Sari', 'Purwokerto', '2004-09-09', 'P', 'Aktif', '2025', '2025-07-10 08:54:22', '2025-07-10 08:54:22');

-- --------------------------------------------------------

--
-- Table structure for table `majelis`
--

CREATE TABLE `majelis` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `rayon` varchar(100) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `tahun_masuk` year(4) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `majelis`
--

INSERT INTO `majelis` (`id`, `nama`, `rayon`, `jenis_kelamin`, `tahun_masuk`, `created_at`, `updated_at`) VALUES
(1, 'Fidelis Golu', 'Pamijen', 'L', '2025', '2025-07-10 10:06:48', '2025-07-10 10:07:19');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2025-06-29-044737', 'App\\Database\\Migrations\\CreateUsersTable', 'default', 'App', 1751172913, 1),
(2, '2025-07-07-082940', 'App\\Database\\Migrations\\CreateRayonTable', 'default', 'App', 1751877031, 2),
(3, '2025-07-07-092506', 'App\\Database\\Migrations\\CreateLektorTable', 'default', 'App', 1751880400, 3),
(4, '2025-07-07-104253', 'App\\Database\\Migrations\\AlterLektorAddTempatTanggal', 'default', 'App', 1751884995, 4),
(5, '2025-07-10-093928', 'App\\Database\\Migrations\\CreateTableMajelis', 'default', 'App', 1752140431, 5),
(6, '2025-07-10-101543', 'App\\Database\\Migrations\\CreateDataKK', 'default', 'App', 1752142713, 6),
(7, '2025-07-10-163814', 'App\\Database\\Migrations\\CreateTableJemaat', 'default', 'App', 1752165524, 7),
(8, '2025-07-10-170627', 'App\\Database\\Migrations\\CreateBaptisTable', 'default', 'App', 1752167720, 8),
(9, '2025-07-11-073006', 'App\\Database\\Migrations\\CreateKrismaTable', 'default', 'App', 1752219525, 9),
(10, '2025-07-11-074517', 'App\\Database\\Migrations\\CreateEkaristiTable', 'default', 'App', 1752220072, 10),
(11, '2025-07-11-075306', 'App\\Database\\Migrations\\CreatePengurapanTable', 'default', 'App', 1752220488, 11),
(12, '2025-07-11-080352', 'App\\Database\\Migrations\\CreateImamatTable', 'default', 'App', 1752221230, 12),
(13, '2025-07-11-081109', 'App\\Database\\Migrations\\CreatePerkawinanTable', 'default', 'App', 1752222188, 13),
(14, '2025-07-11-083813', 'App\\Database\\Migrations\\CreateTobatTable', 'default', 'App', 1752223116, 14),
(15, '2025-07-11-084808', 'App\\Database\\Migrations\\CreateKeuanganTable', 'default', 'App', 1752223844, 15);

-- --------------------------------------------------------

--
-- Table structure for table `pengurapan`
--

CREATE TABLE `pengurapan` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama` varchar(100) NOT NULL,
  `umur` int(3) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `tgl_pengurapan` date NOT NULL,
  `petugas` varchar(100) NOT NULL,
  `kondisi` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengurapan`
--

INSERT INTO `pengurapan` (`id`, `nama`, `umur`, `alamat`, `tgl_pengurapan`, `petugas`, `kondisi`, `created_at`, `updated_at`) VALUES
(1, 'Muhammad Rifki Update', 20, 'Purwokerto', '2025-07-11', 'Fidelis Gulo', 'Tidak sehat', '2025-07-11 08:00:19', '2025-07-11 08:00:59'),
(3, 'Fatih', 25, 'Purwokerto Selatan', '2025-07-15', 'Fidelis Gulo', 'Sakit', '2025-07-15 15:40:09', '2025-07-15 15:40:09');

-- --------------------------------------------------------

--
-- Table structure for table `perkawinan`
--

CREATE TABLE `perkawinan` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama_pria` varchar(100) NOT NULL,
  `tempat_lhr_pria` varchar(100) NOT NULL,
  `tgl_lhr_pria` date NOT NULL,
  `paroki_pria` varchar(150) NOT NULL,
  `ortu_pria` varchar(150) NOT NULL,
  `nama_wanita` varchar(100) NOT NULL,
  `tempat_lhr_wanita` varchar(100) NOT NULL,
  `tgl_lhr_wanita` date NOT NULL,
  `paroki_wanita` varchar(150) NOT NULL,
  `ortu_wanita` varchar(150) NOT NULL,
  `tempat_nikah` varchar(150) NOT NULL,
  `tgl_nikah` date NOT NULL,
  `petugas` varchar(100) NOT NULL,
  `status_pria` varchar(50) NOT NULL,
  `status_wanita` varchar(50) NOT NULL,
  `saksi` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `perkawinan`
--

INSERT INTO `perkawinan` (`id`, `nama_pria`, `tempat_lhr_pria`, `tgl_lhr_pria`, `paroki_pria`, `ortu_pria`, `nama_wanita`, `tempat_lhr_wanita`, `tgl_lhr_wanita`, `paroki_wanita`, `ortu_wanita`, `tempat_nikah`, `tgl_nikah`, `petugas`, `status_pria`, `status_wanita`, `saksi`, `created_at`, `updated_at`) VALUES
(1, 'Muhammad Rifki Updated', 'Hulu Sungai Tengah', '2003-06-02', 'STMIK Widya Utama', 'Norpah', 'Silva Septika Sari Updated', 'Purwokerto', '2025-07-11', 'STMIK Widya Utama', 'Norpah', 'Desa Alat, Hantakan', '2027-06-02', 'Fidelis Gulo', 'Sudah ', 'Sudah', 'Wita', '2025-07-11 08:28:38', '2025-07-11 08:33:02');

-- --------------------------------------------------------

--
-- Table structure for table `rayon`
--

CREATE TABLE `rayon` (
  `id` int(5) UNSIGNED NOT NULL,
  `nama_rayon` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rayon`
--

INSERT INTO `rayon` (`id`, `nama_rayon`, `created_at`, `updated_at`) VALUES
(2, 'Haijei Update Bro', '2025-07-07 09:19:57', '2025-07-07 09:20:05'),
(3, 'Pamijen', '2025-07-07 23:42:58', '2025-07-07 23:42:58'),
(4, 'Purwokerto Selatan', '2025-07-08 00:00:50', '2025-07-08 00:00:50');

-- --------------------------------------------------------

--
-- Table structure for table `tobat`
--

CREATE TABLE `tobat` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tempat_tobat` varchar(150) NOT NULL,
  `tgl_tobat` date NOT NULL,
  `paroki_asal` varchar(150) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tobat`
--

INSERT INTO `tobat` (`id`, `nama`, `tempat_tobat`, `tgl_tobat`, `paroki_asal`, `created_at`, `updated_at`) VALUES
(1, 'Muhammad Rifki Updated', 'Purwokerto', '2025-07-11', 'STMIK Widya Ytama', '2025-07-11 08:41:10', '2025-07-11 08:41:17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', '$2y$10$I.8T3x2b/kPJIpnaG8casu1A6oPnZ2HJFNh1UUHx77wGSSBmvCYyS', '2025-06-29 12:57:15', '2025-07-11 15:06:34'),
(2, 'admin', '$2y$10$pf5PuFHlxQ6WflGbfHDoDeq6WAh8cOOorBUIggEZfITaPZ0zZ3LA2', '2025-07-11 15:06:24', '2025-07-11 15:11:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `baptis`
--
ALTER TABLE `baptis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_kk`
--
ALTER TABLE `data_kk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ekaristi`
--
ALTER TABLE `ekaristi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `imamat`
--
ALTER TABLE `imamat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jemaat`
--
ALTER TABLE `jemaat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jemaat_id_kk_foreign` (`id_kk`);

--
-- Indexes for table `keuangan`
--
ALTER TABLE `keuangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `krisma`
--
ALTER TABLE `krisma`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lektor`
--
ALTER TABLE `lektor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `majelis`
--
ALTER TABLE `majelis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengurapan`
--
ALTER TABLE `pengurapan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perkawinan`
--
ALTER TABLE `perkawinan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rayon`
--
ALTER TABLE `rayon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tobat`
--
ALTER TABLE `tobat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `baptis`
--
ALTER TABLE `baptis`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `data_kk`
--
ALTER TABLE `data_kk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ekaristi`
--
ALTER TABLE `ekaristi`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `imamat`
--
ALTER TABLE `imamat`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jemaat`
--
ALTER TABLE `jemaat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `keuangan`
--
ALTER TABLE `keuangan`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `krisma`
--
ALTER TABLE `krisma`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lektor`
--
ALTER TABLE `lektor`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `majelis`
--
ALTER TABLE `majelis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `pengurapan`
--
ALTER TABLE `pengurapan`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `perkawinan`
--
ALTER TABLE `perkawinan`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rayon`
--
ALTER TABLE `rayon`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tobat`
--
ALTER TABLE `tobat`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jemaat`
--
ALTER TABLE `jemaat`
  ADD CONSTRAINT `jemaat_id_kk_foreign` FOREIGN KEY (`id_kk`) REFERENCES `data_kk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
