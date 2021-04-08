-- --------------------------------------------------------
-- Host:                         localhost
-- Versi server:                 5.7.24 - MySQL Community Server (GPL)
-- OS Server:                    Win64
-- HeidiSQL Versi:               10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Membuang struktur basisdata untuk e_contract_dev
CREATE DATABASE IF NOT EXISTS `e_contract_dev` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `e_contract_dev`;

-- membuang struktur untuk table e_contract_dev.attachments
CREATE TABLE IF NOT EXISTS `attachments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_attachment` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attachment` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `attachments_id_attachment_index` (`id_attachment`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel e_contract_dev.attachments: ~8 rows (lebih kurang)
/*!40000 ALTER TABLE `attachments` DISABLE KEYS */;
INSERT INTO `attachments` (`id`, `id_attachment`, `attachment`, `created_at`, `updated_at`) VALUES
	(1, '1', 'RAB (Rencana Anggaran Biaya)', NULL, NULL),
	(2, '2', 'SPM', NULL, NULL),
	(3, '3', 'Time Schedule', NULL, NULL),
	(4, '4', 'PHO', NULL, NULL),
	(5, '5', 'SPK (Surat Perintah Kerja)', NULL, NULL),
	(6, '6', 'Surat Pesanan', NULL, NULL),
	(7, '7', 'Surat Perjanjian', NULL, NULL),
	(8, '8', 'Kontrak', NULL, NULL);
/*!40000 ALTER TABLE `attachments` ENABLE KEYS */;

-- membuang struktur untuk table e_contract_dev.contracts
CREATE TABLE IF NOT EXISTS `contracts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `contract_number` text COLLATE utf8mb4_unicode_ci,
  `job_name` text COLLATE utf8mb4_unicode_ci,
  `id_skpd` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_field` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_user` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ppk_name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ceiling` bigint(20) DEFAULT NULL,
  `contract_value` bigint(20) DEFAULT NULL,
  `procuretment_type` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `source_founds` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `method_selection` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `addendum` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` text COLLATE utf8mb4_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel e_contract_dev.contracts: ~7 rows (lebih kurang)
/*!40000 ALTER TABLE `contracts` DISABLE KEYS */;
INSERT INTO `contracts` (`id`, `contract_number`, `job_name`, `id_skpd`, `id_field`, `id_user`, `ppk_name`, `ceiling`, `contract_value`, `procuretment_type`, `source_founds`, `status`, `method_selection`, `addendum`, `provider`, `deleted_at`, `created_at`, `updated_at`) VALUES
	(1, '360/1522/SPK/PPK/BPBD-Pdg/XII/2020', 'DAK Jalan Paket 1', '1', '1', '3', 'Refdizalis', 2000000000, 18000000, '1', '1', 'process', '1', NULL, 'CV Ani', NULL, NULL, '2021-04-04 20:46:59'),
	(2, '360/1522/SPK/PPK/BPBD-Pdg/XII/2021', NULL, '1', '1', '3', NULL, NULL, NULL, '1', NULL, 'draf', NULL, NULL, NULL, '2021-04-04 20:18:36', '2021-04-04 06:23:19', '2021-04-04 20:18:36'),
	(3, '360/1522/SPK/PPK/BPBD-Pdg/XII/2023', NULL, '1', '1', '3', NULL, NULL, NULL, '1', NULL, 'draf', NULL, NULL, NULL, '2021-04-04 20:15:47', '2021-04-04 07:13:04', '2021-04-04 20:15:47'),
	(4, '360/1522/SPK/PPK/BPBD-Pdg/XII/2023', NULL, '1', '1', '3', NULL, NULL, NULL, '1', NULL, 'draf', NULL, NULL, NULL, '2021-04-04 20:21:12', '2021-04-04 20:16:13', '2021-04-04 20:21:12'),
	(5, '360/1522/SPK/PPK/BPBD-Pdg/XII/2023', NULL, '1', '1', '3', NULL, NULL, NULL, '1', NULL, 'draf', NULL, NULL, NULL, '2021-04-04 20:46:51', '2021-04-04 20:21:27', '2021-04-04 20:46:51'),
	(6, '360/1522/SPK/PPK/BPBD-Pdg/XII/2021', NULL, '1', '1', '3', NULL, NULL, NULL, '4', NULL, 'draf', NULL, NULL, NULL, NULL, '2021-04-05 07:30:07', '2021-04-05 09:24:57'),
	(7, '360/1522/SPK/PPK/BPBD-Pdg/XII/2023', NULL, '1', '1', '3', NULL, NULL, NULL, '1', NULL, 'draf', NULL, NULL, NULL, NULL, '2021-04-05 09:25:20', '2021-04-05 09:25:23');
/*!40000 ALTER TABLE `contracts` ENABLE KEYS */;

-- membuang struktur untuk table e_contract_dev.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel e_contract_dev.failed_jobs: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- membuang struktur untuk table e_contract_dev.file_attachments
CREATE TABLE IF NOT EXISTS `file_attachments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_contract` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_attachment` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_attachment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `file_attachments_id_contract_index` (`id_contract`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel e_contract_dev.file_attachments: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `file_attachments` DISABLE KEYS */;
INSERT INTO `file_attachments` (`id`, `id_contract`, `id_attachment`, `file_attachment`, `created_at`, `updated_at`) VALUES
	(1, '1', '5', '1617413788.pdf', NULL, '2021-04-03 08:36:28'),
	(2, '1', '6', '1617508853.pdf', NULL, NULL);
/*!40000 ALTER TABLE `file_attachments` ENABLE KEYS */;

-- membuang struktur untuk table e_contract_dev.maps
CREATE TABLE IF NOT EXISTS `maps` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel e_contract_dev.maps: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `maps` DISABLE KEYS */;
/*!40000 ALTER TABLE `maps` ENABLE KEYS */;

-- membuang struktur untuk table e_contract_dev.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel e_contract_dev.migrations: ~12 rows (lebih kurang)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
	(4, '2019_08_19_000000_create_failed_jobs_table', 1),
	(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(6, '2021_02_19_012248_create_sessions_table', 1),
	(7, '2021_03_07_221851_create_contracts_table', 1),
	(8, '2021_03_07_234331_create_skpds_table', 1),
	(9, '2021_03_09_154547_create_maps_table', 1),
	(10, '2021_03_11_202800_create_attachments_table', 1),
	(11, '2021_03_11_223118_create_file_attachments_table', 1),
	(12, '2021_03_12_110853_create_uploads_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- membuang struktur untuk table e_contract_dev.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel e_contract_dev.password_resets: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- membuang struktur untuk table e_contract_dev.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel e_contract_dev.personal_access_tokens: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;

-- membuang struktur untuk table e_contract_dev.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel e_contract_dev.sessions: ~3 rows (lebih kurang)
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('HgT1BvggZzNsiHJBs6Rp5vxos30JmfhvO8H8hZTp', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.114 Safari/537.36', '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', 1617589523),
	('jks6nFG8Cklk9W4kTp57gt9tpIoc8A1Yh3SlkEKf', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.114 Safari/537.36', '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', 1617526632),
	('vflBgZlXab3ZP4Bbefo8gi43nI0okoBLYWUXQD2k', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.114 Safari/537.36', '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', 1617544727);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;

-- membuang struktur untuk table e_contract_dev.skpds
CREATE TABLE IF NOT EXISTS `skpds` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_skpd` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skpd_name` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel e_contract_dev.skpds: ~30 rows (lebih kurang)
/*!40000 ALTER TABLE `skpds` DISABLE KEYS */;
INSERT INTO `skpds` (`id`, `id_skpd`, `skpd_name`, `created_at`, `updated_at`) VALUES
	(1, '1', 'Sekretariat Daerah', NULL, NULL),
	(2, '2', 'Dinas Komunikasi dan Informatika', NULL, NULL),
	(3, '3', 'Badan Perencanaan, Penelitian, dan Pengembangan', NULL, NULL),
	(4, '4', 'Dinas Pekerjaan Umum Penataan Ruang dan Pertanahan', NULL, NULL),
	(5, '5', ' Dinas Perumahan Rakyat Kawasan Permukiman Lingkungan Hidup', NULL, NULL),
	(6, '6', ' Dinas Penanaman Modal Pelayanan Terpadu Satu Pintu dan Tenaga Kerja', NULL, NULL),
	(7, '6', ' Dinas Penanaman Modal Pelayanan Terpadu Satu Pintu dan Tenaga Kerja', NULL, NULL),
	(8, '6', ' Dinas Penanaman Modal Pelayanan Terpadu Satu Pintu dan Tenaga Kerja', NULL, NULL),
	(9, '6', ' Dinas Penanaman Modal Pelayanan Terpadu Satu Pintu dan Tenaga Kerja', NULL, NULL),
	(10, '6', ' Dinas Penanaman Modal Pelayanan Terpadu Satu Pintu dan Tenaga Kerja', NULL, NULL),
	(11, '6', ' Dinas Penanaman Modal Pelayanan Terpadu Satu Pintu dan Tenaga Kerja', NULL, NULL),
	(12, '6', ' Dinas Penanaman Modal Pelayanan Terpadu Satu Pintu dan Tenaga Kerja', NULL, NULL),
	(13, '6', ' Dinas Penanaman Modal Pelayanan Terpadu Satu Pintu dan Tenaga Kerja', NULL, NULL),
	(14, '6', ' Dinas Penanaman Modal Pelayanan Terpadu Satu Pintu dan Tenaga Kerja', NULL, NULL),
	(15, '6', ' Dinas Penanaman Modal Pelayanan Terpadu Satu Pintu dan Tenaga Kerja', NULL, NULL),
	(16, '6', ' Dinas Penanaman Modal Pelayanan Terpadu Satu Pintu dan Tenaga Kerja', NULL, NULL),
	(17, '6', ' Dinas Penanaman Modal Pelayanan Terpadu Satu Pintu dan Tenaga Kerja', NULL, NULL),
	(18, '6', ' Dinas Penanaman Modal Pelayanan Terpadu Satu Pintu dan Tenaga Kerja', NULL, NULL),
	(19, '6', ' Dinas Penanaman Modal Pelayanan Terpadu Satu Pintu dan Tenaga Kerja', NULL, NULL),
	(20, '6', ' Dinas Penanaman Modal Pelayanan Terpadu Satu Pintu dan Tenaga Kerja', NULL, NULL),
	(21, '6', ' Dinas Penanaman Modal Pelayanan Terpadu Satu Pintu dan Tenaga Kerja', NULL, NULL),
	(22, '6', ' Dinas Penanaman Modal Pelayanan Terpadu Satu Pintu dan Tenaga Kerja', NULL, NULL),
	(23, '6', ' Dinas Penanaman Modal Pelayanan Terpadu Satu Pintu dan Tenaga Kerja', NULL, NULL),
	(24, '6', ' Dinas Penanaman Modal Pelayanan Terpadu Satu Pintu dan Tenaga Kerja', NULL, NULL),
	(25, '6', ' Dinas Penanaman Modal Pelayanan Terpadu Satu Pintu dan Tenaga Kerja', NULL, NULL),
	(26, '6', ' Dinas Penanaman Modal Pelayanan Terpadu Satu Pintu dan Tenaga Kerja', NULL, NULL),
	(27, '6', ' Dinas Penanaman Modal Pelayanan Terpadu Satu Pintu dan Tenaga Kerja', NULL, NULL),
	(28, '6', ' Dinas Penanaman Modal Pelayanan Terpadu Satu Pintu dan Tenaga Kerja', NULL, NULL),
	(29, '6', ' Dinas Penanaman Modal Pelayanan Terpadu Satu Pintu dan Tenaga Kerja', NULL, NULL),
	(30, '6', ' Dinas Penanaman Modal Pelayanan Terpadu Satu Pintu dan Tenaga Kerja', NULL, NULL);
/*!40000 ALTER TABLE `skpds` ENABLE KEYS */;

-- membuang struktur untuk table e_contract_dev.uploads
CREATE TABLE IF NOT EXISTS `uploads` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel e_contract_dev.uploads: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `uploads` DISABLE KEYS */;
/*!40000 ALTER TABLE `uploads` ENABLE KEYS */;

-- membuang struktur untuk table e_contract_dev.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `id_skpd` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_field` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_account` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) unsigned DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel e_contract_dev.users: ~3 rows (lebih kurang)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `id_skpd`, `id_field`, `remember_token`, `role`, `status_account`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'lutvi1500@gmail.com', NULL, '$2y$10$XVe9EE0Gd.7BoWCBpSC4t.mrCP2gBkJlYehSTECcknpY9fSuelCx2', NULL, NULL, '1', '1', NULL, '3', '2', NULL, NULL, NULL, NULL),
	(2, 'Verificator', 'verificator@gmail.com', NULL, '$2y$10$N0KgWa8EWWJUCuQ4OTsFaeJmHL26C7ujrlNtp/Mta4aDk3Bi2KrYK', NULL, NULL, '1', '1', NULL, '2', '2', NULL, NULL, NULL, NULL),
	(3, 'User', 'user@gmail.com', NULL, '$2y$10$QVgDiwIr5Zgr1FFI344rGucsq4mp0sdfbRTn.K55WeTbsph9K7FbW', NULL, NULL, '1', '1', NULL, '1', '2', NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
