-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2023 at 11:26 AM
-- Server version: 10.4.11-MariaDB
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
-- Database: `ta_gerald`
--

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
-- Table structure for table `jenis_kebuns`
--

CREATE TABLE `jenis_kebuns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jenis_kebun` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenis_kebuns`
--

INSERT INTO `jenis_kebuns` (`id`, `jenis_kebun`, `created_at`, `updated_at`) VALUES
(1, 'Tanaman Biofarmaka', '2023-08-30 14:33:24', '2023-08-30 14:34:24'),
(2, 'Kebun', '2023-12-16 18:13:13', '2023-12-16 18:13:13');

-- --------------------------------------------------------

--
-- Table structure for table `kebuns`
--

CREATE TABLE `kebuns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_kecamatan` bigint(20) UNSIGNED DEFAULT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_kebun` bigint(20) UNSIGNED DEFAULT NULL,
  `informasi_tambahan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `lokasi_gps` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kebuns`
--

INSERT INTO `kebuns` (`id`, `id_kecamatan`, `nama`, `jenis_kebun`, `informasi_tambahan`, `tanggal`, `lokasi_gps`, `gambar`, `created_at`, `updated_at`) VALUES
(2, 1, 'Batang Bawang', 2, NULL, '2023-12-16', '1.354448, 124.827017', '1702721699118.msg-4091811550-2686.jpg', '2023-12-16 18:14:59', '2023-12-16 18:14:59'),
(3, 1, 'Bunga', 2, NULL, '2023-12-16', '1.357450, 124.827370', '1702721766908.msg-4091811550-2685.jpg', '2023-12-16 18:16:06', '2023-12-16 18:16:06'),
(4, 1, 'Cabe', 2, NULL, '2023-12-16', '1.346282, 124.824555', '1702721817842.msg-4091811550-2688.jpg', '2023-12-16 18:16:57', '2023-12-16 18:16:57'),
(5, 1, 'Chaishin', 2, NULL, '2023-12-16', '1.357719, 124.827374', '1702721870403.msg-4091811550-2682.jpg', '2023-12-16 18:17:50', '2023-12-16 18:17:50'),
(6, 5, 'Dll', 2, NULL, '2023-12-16', '1.329839, 124.858577', '1702721948717.msg-4091811550-2734.jpg', '2023-12-16 18:19:08', '2023-12-16 18:19:08'),
(7, 3, 'Kol', 2, NULL, '2023-12-16', '1.303115, 124.841458', '1702722009444.msg-4091811550-2679.jpg', '2023-12-16 18:20:09', '2023-12-16 18:20:09'),
(8, 3, 'Terong', 2, NULL, '2023-12-16', '1.306686, 124.839865', '1702722080577.msg-4091811550-2676.jpg', '2023-12-16 18:21:20', '2023-12-16 18:21:20'),
(9, 5, 'Timun Jepang', 2, NULL, '2023-12-16', '1.331311, 124.859172', '1702722146162.msg-4091811550-2735.jpg', '2023-12-16 18:22:26', '2023-12-16 18:22:26'),
(10, 3, 'Tomat', 2, NULL, '2023-12-16', '1.304668, 124.841657', '1702722247185.msg-4091811550-2680.jpg', '2023-12-16 18:24:07', '2023-12-16 18:24:07');

-- --------------------------------------------------------

--
-- Table structure for table `kecamatans`
--

CREATE TABLE `kecamatans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kecamatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `informasi_tambahan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kecamatans`
--

INSERT INTO `kecamatans` (`id`, `nama_kecamatan`, `informasi_tambahan`, `created_at`, `updated_at`) VALUES
(1, 'Tomohon Utara', '<table style=\"border-collapse: collapse; width: 1806px; border-width: 5px; border-spacing: 5px; background-color: rgb(191, 237, 210); border-color: rgb(22, 145, 121); margin-left: auto; margin-right: auto;\" border=\"1\" width=\"1347\" cellspacing=\"0\" cellpadding=\"0\"><colgroup><col style=\"width: 112px;\" width=\"134\"> <col style=\"width: 112px;\" width=\"87\"> <col style=\"width: 118px;\" width=\"94\"> <col style=\"width: 64.0767px;\" span=\"3\" width=\"64\"> <col style=\"width: 127px;\" width=\"56\"> <col style=\"width: 131px;\" width=\"64\"> <col style=\"width: 125px;\" width=\"93\"> <col style=\"width: 76px;\" width=\"60\"> <col style=\"width: 218px;\" width=\"113\"> <col style=\"width: 81px;\" width=\"64\"> <col style=\"width: 119px;\" width=\"93\"> <col style=\"width: 64.0767px;\" span=\"2\" width=\"64\"> <col style=\"width: 141px;\" width=\"105\"> <col style=\"width: 84px;\" width=\"64\"> </colgroup>\r\n<tbody>\r\n<tr style=\"mso-height-source: userset; height: 15.0pt;\">\r\n<td class=\"xl63\" style=\"height: 120pt; width: 101pt; border-width: 5px; padding: 5px; border-color: rgb(22, 145, 121);\" rowspan=\"2\" width=\"134\" height=\"160\">KELURAHAN</td>\r\n<td class=\"xl63\" style=\"width: 65pt; border-width: 5px; padding: 5px; border-color: rgb(22, 145, 121);\" rowspan=\"2\" width=\"87\">LUAS WILAYAH KELURAHAN (Ha)</td>\r\n<td class=\"xl63\" style=\"border-width: 5px; border-left-style: none; border-color: rgb(22, 145, 121); width: 215pt; padding: 5px;\" colspan=\"4\" width=\"286\">LAHAN SAWAH</td>\r\n<td class=\"xl64\" style=\"border-width: 5px; border-right-style: solid; border-color: rgb(22, 145, 121); border-left-style: none; width: 504pt; padding: 5px;\" colspan=\"9\" width=\"671\">LAHAN PERTANIAN BUKAN SAWAH</td>\r\n<td class=\"xl63\" style=\"width: 79pt; border-width: 5px; padding: 5px; border-color: rgb(22, 145, 121);\" rowspan=\"2\" width=\"105\">LAHAN BUKAN PERTANIAN (JALAN. PEMUKIMAN, PERKANTORAN, SUNGAI DLL) (Ha)</td>\r\n<td class=\"xl67\" style=\"border-width: 5px; border-bottom-style: solid; border-color: rgb(22, 145, 121); width: 48pt; padding: 5px;\" rowspan=\"2\" width=\"64\">TOTAL WILAYAH (Ha)</td>\r\n</tr>\r\n<tr style=\"mso-height-source: userset; height: 105.0pt;\">\r\n<td class=\"xl63\" style=\"height: 105pt; border-width: 5px; border-top-style: none; border-color: rgb(22, 145, 121); border-left-style: none; width: 71pt; padding: 5px;\" width=\"94\" height=\"140\">LUAS LAHAN SAWAH BERPOTENSI DIGUNAKAN / DI BUKA KEMBALI (Ha)</td>\r\n<td class=\"xl63\" style=\"border-width: 5px; border-top-style: none; border-color: rgb(22, 145, 121); border-left-style: none; width: 48pt; padding: 5px;\" width=\"64\">IRIGASI (Ha)</td>\r\n<td class=\"xl63\" style=\"border-width: 5px; border-top-style: none; border-color: rgb(22, 145, 121); border-left-style: none; width: 48pt; padding: 5px;\" width=\"64\">TADAH HUJAN (Ha)</td>\r\n<td class=\"xl63\" style=\"border-width: 5px; border-top-style: none; border-color: rgb(22, 145, 121); border-left-style: none; width: 48pt; padding: 5px;\" width=\"64\">TOTAL (Ha)</td>\r\n<td class=\"xl63\" style=\"border-width: 5px; border-top-style: none; border-color: rgb(22, 145, 121); border-left-style: none; width: 42pt; padding: 5px;\" width=\"56\">TEGAL/KEBUN (Ha)</td>\r\n<td class=\"xl63\" style=\"border-width: 5px; border-top-style: none; border-color: rgb(22, 145, 121); border-left-style: none; width: 48pt; padding: 5px;\" width=\"64\">LADANG/HUMA (Ha)</td>\r\n<td class=\"xl63\" style=\"border-width: 5px; border-top-style: none; border-color: rgb(22, 145, 121); border-left-style: none; width: 70pt; padding: 5px;\" width=\"93\">PERKEBUNAN (Ha)</td>\r\n<td class=\"xl63\" style=\"border-width: 5px; border-top-style: none; border-color: rgb(22, 145, 121); border-left-style: none; width: 45pt; padding: 5px;\" width=\"60\">HUTAN RAKYAT (Ha)</td>\r\n<td class=\"xl63\" style=\"border-width: 5px; border-top-style: none; border-color: rgb(22, 145, 121); border-left-style: none; width: 85pt; padding: 5px;\" width=\"113\">PADANG PENGEMBALAAN/PADANG RUMPUT (Ha)</td>\r\n<td class=\"xl63\" style=\"border-width: 5px; border-top-style: none; border-color: rgb(22, 145, 121); border-left-style: none; width: 48pt; padding: 5px;\" width=\"64\">HUTAN NEGARA (Ha)</td>\r\n<td class=\"xl63\" style=\"border-width: 5px; border-top-style: none; border-color: rgb(22, 145, 121); border-left-style: none; width: 70pt; padding: 5px;\" width=\"93\">SEMENTARA TDK DIUSAHAKAN (Ha)</td>\r\n<td class=\"xl64\" style=\"border-width: 5px; border-top-style: none; border-color: rgb(22, 145, 121); border-left-style: none; width: 48pt; padding: 5px;\" width=\"64\">LAINNYA (TAMBAK, KOLAM, EMPANG DLL) (Ha)</td>\r\n<td class=\"xl64\" style=\"border-width: 5px; border-top-style: none; border-color: rgb(22, 145, 121); width: 48pt; padding: 5px;\" width=\"64\">TOTAL (Ha)</td>\r\n</tr>\r\n<tr style=\"mso-height-source: userset; height: 22.5pt;\">\r\n<td class=\"xl69\" style=\"height: 22.5pt; border-width: 5px; border-top-style: none; border-color: rgb(22, 145, 121); padding: 5px;\" height=\"30\">TOMOHON UTARA</td>\r\n<td class=\"xl70\" style=\"border-width: 5px; border-top-style: none; border-color: rgb(22, 145, 121); border-left-style: none; padding: 5px;\">4355</td>\r\n<td class=\"xl70\" style=\"border-width: 5px; border-top-style: none; border-color: rgb(22, 145, 121); border-left-style: none; padding: 5px;\">5</td>\r\n<td class=\"xl70\" style=\"border-width: 5px; border-top-style: none; border-color: rgb(22, 145, 121); border-left-style: none; padding: 5px;\">80</td>\r\n<td class=\"xl70\" style=\"border-width: 5px; border-top-style: none; border-color: rgb(22, 145, 121); border-left-style: none; padding: 5px;\">18</td>\r\n<td class=\"xl70\" style=\"border-width: 5px; border-top-style: none; border-color: rgb(22, 145, 121); border-left-style: none; padding: 5px;\">103</td>\r\n<td class=\"xl70\" style=\"border-width: 5px; border-top-style: none; border-color: rgb(22, 145, 121); border-left-style: none; padding: 5px;\">1535.5</td>\r\n<td class=\"xl70\" style=\"border-width: 5px; border-top-style: none; border-color: rgb(22, 145, 121); border-left-style: none; padding: 5px;\">154</td>\r\n<td class=\"xl70\" style=\"border-width: 5px; border-top-style: none; border-color: rgb(22, 145, 121); border-left-style: none; padding: 5px;\">765</td>\r\n<td class=\"xl70\" style=\"border-width: 5px; border-top-style: none; border-color: rgb(22, 145, 121); border-left-style: none; padding: 5px;\">439</td>\r\n<td class=\"xl70\" style=\"border-width: 5px; border-top-style: none; border-color: rgb(22, 145, 121); border-left-style: none; padding: 5px;\">1</td>\r\n<td class=\"xl70\" style=\"border-width: 5px; border-top-style: none; border-color: rgb(22, 145, 121); border-left-style: none; padding: 5px;\">364</td>\r\n<td class=\"xl70\" style=\"border-width: 5px; border-top-style: none; border-color: rgb(22, 145, 121); border-left-style: none; padding: 5px;\">115</td>\r\n<td class=\"xl70\" style=\"border-width: 5px; border-top-style: none; border-color: rgb(22, 145, 121); border-left-style: none; padding: 5px;\">23</td>\r\n<td class=\"xl70\" style=\"border-width: 5px; border-top-style: none; border-color: rgb(22, 145, 121); border-left-style: none; padding: 5px;\">3396.5</td>\r\n<td class=\"xl70\" style=\"border-width: 5px; border-top-style: none; border-color: rgb(22, 145, 121); border-left-style: none; padding: 5px;\">855.5</td>\r\n<td class=\"xl69\" style=\"border-width: 5px; border-top-style: none; border-color: rgb(22, 145, 121); border-left-style: none; padding: 5px;\" align=\"right\">4355</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<p style=\"text-align: justify;\">Tomohon Utara adalah sebuah kecamatan di Kota Tomohon, Provinsi Sulawesi Utara, Indonesia. Membentang dari Utara yakni Kelurahan Tinoor I &amp; II hingga ke selatan yakni Kelurahan Kakaskasen (Kakaskasen Raya terdiri dari Kakaskasen 1.2.3.dan Kakaskasen) dan di bagian Barat terdapat Desa Wailan dan Kayawu. Pusat pemerintah Kecamatan Tomohon Utara berada di Kelurahan Kakaskasen III yakni di jalan menuju ke Kelurahan Wailan dan Kayawu. Di Kelurahan Kakaskasen III dulunya berlokasi Kantor Wali kota Tomohon,di kompleks Militer Rindam XIII Mdk, tetapi sejak Maret 2008 Kantor Wali kota pindah ke lokasi yang baru di Kelurahan Kolongan, Kecamatan Tomohon Tengah.Kompleks Militer yg pernah digunakan sementara menjadi Kantor Walikota Tomohon, telah dimanfaatkan kembali oleh Rindam XIII Merdeka.</p>\r\n<p style=\"text-align: justify;\">Kepala Kecamatan :&nbsp;<strong>RICKYANTO UNTUNG SUPIT</strong></p>', '2023-08-16 03:54:13', '2023-08-21 11:56:08'),
(2, 'Tomohon Barat', '<table style=\"border-collapse: collapse; width: 1012pt;\" border=\"0\" width=\"1347\" cellspacing=\"0\" cellpadding=\"0\"><colgroup><col style=\"mso-width-source: userset; mso-width-alt: 4900; width: 101pt;\" width=\"134\"> <col style=\"mso-width-source: userset; mso-width-alt: 3181; width: 65pt;\" width=\"87\"> <col style=\"mso-width-source: userset; mso-width-alt: 3437; width: 71pt;\" width=\"94\"> <col style=\"width: 48pt;\" span=\"3\" width=\"64\"> <col style=\"mso-width-source: userset; mso-width-alt: 2048; width: 42pt;\" width=\"56\"> <col style=\"width: 48pt;\" width=\"64\"> <col style=\"mso-width-source: userset; mso-width-alt: 3401; width: 70pt;\" width=\"93\"> <col style=\"mso-width-source: userset; mso-width-alt: 2194; width: 45pt;\" width=\"60\"> <col style=\"mso-width-source: userset; mso-width-alt: 4132; width: 85pt;\" width=\"113\"> <col style=\"width: 48pt;\" width=\"64\"> <col style=\"mso-width-source: userset; mso-width-alt: 3401; width: 70pt;\" width=\"93\"> <col style=\"width: 48pt;\" span=\"2\" width=\"64\"> <col style=\"mso-width-source: userset; mso-width-alt: 3840; width: 79pt;\" width=\"105\"> <col style=\"width: 48pt;\" width=\"64\"> </colgroup>\r\n<tbody>\r\n<tr style=\"mso-height-source: userset; height: 15.0pt;\">\r\n<td class=\"xl64\" style=\"height: 120.0pt; width: 101pt;\" rowspan=\"2\" width=\"134\" height=\"160\">KELURAHAN</td>\r\n<td class=\"xl64\" style=\"width: 65pt;\" rowspan=\"2\" width=\"87\">LUAS WILAYAH KELURAHAN (Ha)</td>\r\n<td class=\"xl64\" style=\"border-left: none; width: 215pt;\" colspan=\"4\" width=\"286\">LAHAN SAWAH</td>\r\n<td class=\"xl66\" style=\"border-right: .5pt solid black; border-left: none; width: 504pt;\" colspan=\"9\" width=\"671\">LAHAN PERTANIAN BUKAN SAWAH</td>\r\n<td class=\"xl64\" style=\"width: 79pt;\" rowspan=\"2\" width=\"105\">LAHAN BUKAN PERTANIAN (JALAN. PEMUKIMAN, PERKANTORAN, SUNGAI DLL) (Ha)</td>\r\n<td class=\"xl67\" style=\"border-bottom: .5pt solid black; width: 48pt;\" rowspan=\"2\" width=\"64\">TOTAL WILAYAH (Ha)</td>\r\n</tr>\r\n<tr style=\"mso-height-source: userset; height: 105.0pt;\">\r\n<td class=\"xl64\" style=\"height: 105.0pt; border-top: none; border-left: none; width: 71pt;\" width=\"94\" height=\"140\">LUAS LAHAN SAWAH BERPOTENSI DIGUNAKAN / DI BUKA KEMBALI (Ha)</td>\r\n<td class=\"xl64\" style=\"border-top: none; border-left: none; width: 48pt;\" width=\"64\">IRIGASI (Ha)</td>\r\n<td class=\"xl64\" style=\"border-top: none; border-left: none; width: 48pt;\" width=\"64\">TADAH HUJAN (Ha)</td>\r\n<td class=\"xl64\" style=\"border-top: none; border-left: none; width: 48pt;\" width=\"64\">TOTAL (Ha)</td>\r\n<td class=\"xl64\" style=\"border-top: none; border-left: none; width: 42pt;\" width=\"56\">TEGAL/KEBUN (Ha)</td>\r\n<td class=\"xl64\" style=\"border-top: none; border-left: none; width: 48pt;\" width=\"64\">LADANG/HUMA (Ha)</td>\r\n<td class=\"xl64\" style=\"border-top: none; border-left: none; width: 70pt;\" width=\"93\">PERKEBUNAN (Ha)</td>\r\n<td class=\"xl64\" style=\"border-top: none; border-left: none; width: 45pt;\" width=\"60\">HUTAN RAKYAT (Ha)</td>\r\n<td class=\"xl64\" style=\"border-top: none; border-left: none; width: 85pt;\" width=\"113\">PADANG PENGEMBALAAN/PADANG RUMPUT (Ha)</td>\r\n<td class=\"xl64\" style=\"border-top: none; border-left: none; width: 48pt;\" width=\"64\">HUTAN NEGARA (Ha)</td>\r\n<td class=\"xl64\" style=\"border-top: none; border-left: none; width: 70pt;\" width=\"93\">SEMENTARA TDK DIUSAHAKAN (Ha)</td>\r\n<td class=\"xl66\" style=\"border-top: none; border-left: none; width: 48pt;\" width=\"64\">LAINNYA (TAMBAK, KOLAM, EMPANG DLL) (Ha)</td>\r\n<td class=\"xl66\" style=\"border-top: none; width: 48pt;\" width=\"64\">TOTAL (Ha)</td>\r\n</tr>\r\n<tr style=\"mso-height-source: userset; height: 22.5pt;\">\r\n<td class=\"xl63\" style=\"height: 22.5pt; border-top: none;\" height=\"30\">TOMOHON UTARA</td>\r\n<td class=\"xl65\" style=\"border-top: none; border-left: none;\">4355</td>\r\n<td class=\"xl65\" style=\"border-top: none; border-left: none;\">5</td>\r\n<td class=\"xl65\" style=\"border-top: none; border-left: none;\">80</td>\r\n<td class=\"xl65\" style=\"border-top: none; border-left: none;\">18</td>\r\n<td class=\"xl65\" style=\"border-top: none; border-left: none;\">103</td>\r\n<td class=\"xl65\" style=\"border-top: none; border-left: none;\">1535.5</td>\r\n<td class=\"xl65\" style=\"border-top: none; border-left: none;\">154</td>\r\n<td class=\"xl65\" style=\"border-top: none; border-left: none;\">765</td>\r\n<td class=\"xl65\" style=\"border-top: none; border-left: none;\">439</td>\r\n<td class=\"xl65\" style=\"border-top: none; border-left: none;\">1</td>\r\n<td class=\"xl65\" style=\"border-top: none; border-left: none;\">364</td>\r\n<td class=\"xl65\" style=\"border-top: none; border-left: none;\">115</td>\r\n<td class=\"xl65\" style=\"border-top: none; border-left: none;\">23</td>\r\n<td class=\"xl65\" style=\"border-top: none; border-left: none;\">3396.5</td>\r\n<td class=\"xl65\" style=\"border-top: none; border-left: none;\">855.5</td>\r\n<td class=\"xl63\" style=\"border-top: none; border-left: none;\" align=\"right\">4355</td>\r\n</tr>\r\n<tr style=\"mso-height-source: userset; height: 22.5pt;\">\r\n<td class=\"xl63\" style=\"height: 22.5pt; border-top: none;\" height=\"30\">TOMOHON BARAT</td>\r\n<td class=\"xl65\" style=\"border-top: none; border-left: none;\">3823.04</td>\r\n<td class=\"xl65\" style=\"border-top: none; border-left: none;\">40</td>\r\n<td class=\"xl65\" style=\"border-top: none; border-left: none;\">417</td>\r\n<td class=\"xl65\" style=\"border-top: none; border-left: none;\">29.8</td>\r\n<td class=\"xl65\" style=\"border-top: none; border-left: none;\">486.8</td>\r\n<td class=\"xl65\" style=\"border-top: none; border-left: none;\">1629.6</td>\r\n<td class=\"xl65\" style=\"border-top: none; border-left: none;\">153</td>\r\n<td class=\"xl65\" style=\"border-top: none; border-left: none;\">689.7</td>\r\n<td class=\"xl65\" style=\"border-top: none; border-left: none;\">281.5</td>\r\n<td class=\"xl65\" style=\"border-top: none; border-left: none;\">6</td>\r\n<td class=\"xl65\" style=\"border-top: none; border-left: none;\">264.61</td>\r\n<td class=\"xl65\" style=\"border-top: none; border-left: none;\">52</td>\r\n<td class=\"xl65\" style=\"border-top: none; border-left: none;\">31.9</td>\r\n<td class=\"xl65\" style=\"border-top: none; border-left: none;\">3108.31</td>\r\n<td class=\"xl65\" style=\"border-top: none; border-left: none;\">227.93</td>\r\n<td class=\"xl63\" style=\"border-top: none; border-left: none;\" align=\"right\">3823.04</td>\r\n</tr>\r\n</tbody>\r\n</table>', '2023-08-20 18:17:13', '2023-08-20 18:17:13'),
(3, 'Tomohon Selatan', '<table style=\"border-collapse: collapse; width: 1012pt;\" border=\"0\" width=\"1347\" cellspacing=\"0\" cellpadding=\"0\"><colgroup><col style=\"mso-width-source: userset; mso-width-alt: 4900; width: 101pt;\" width=\"134\"> <col style=\"mso-width-source: userset; mso-width-alt: 3181; width: 65pt;\" width=\"87\"> <col style=\"mso-width-source: userset; mso-width-alt: 3437; width: 71pt;\" width=\"94\"> <col style=\"width: 48pt;\" span=\"3\" width=\"64\"> <col style=\"mso-width-source: userset; mso-width-alt: 2048; width: 42pt;\" width=\"56\"> <col style=\"width: 48pt;\" width=\"64\"> <col style=\"mso-width-source: userset; mso-width-alt: 3401; width: 70pt;\" width=\"93\"> <col style=\"mso-width-source: userset; mso-width-alt: 2194; width: 45pt;\" width=\"60\"> <col style=\"mso-width-source: userset; mso-width-alt: 4132; width: 85pt;\" width=\"113\"> <col style=\"width: 48pt;\" width=\"64\"> <col style=\"mso-width-source: userset; mso-width-alt: 3401; width: 70pt;\" width=\"93\"> <col style=\"width: 48pt;\" span=\"2\" width=\"64\"> <col style=\"mso-width-source: userset; mso-width-alt: 3840; width: 79pt;\" width=\"105\"> <col style=\"width: 48pt;\" width=\"64\"> </colgroup>\r\n<tbody>\r\n<tr style=\"mso-height-source: userset; height: 15.0pt;\">\r\n<td class=\"xl66\" style=\"height: 120.0pt; width: 101pt;\" rowspan=\"2\" width=\"134\" height=\"160\">KELURAHAN</td>\r\n<td class=\"xl66\" style=\"width: 65pt;\" rowspan=\"2\" width=\"87\">LUAS WILAYAH KELURAHAN (Ha)</td>\r\n<td class=\"xl66\" style=\"border-left: none; width: 215pt;\" colspan=\"4\" width=\"286\">LAHAN SAWAH</td>\r\n<td class=\"xl68\" style=\"border-right: .5pt solid black; border-left: none; width: 504pt;\" colspan=\"9\" width=\"671\">LAHAN PERTANIAN BUKAN SAWAH</td>\r\n<td class=\"xl66\" style=\"width: 79pt;\" rowspan=\"2\" width=\"105\">LAHAN BUKAN PERTANIAN (JALAN. PEMUKIMAN, PERKANTORAN, SUNGAI DLL) (Ha)</td>\r\n<td class=\"xl69\" style=\"border-bottom: .5pt solid black; width: 48pt;\" rowspan=\"2\" width=\"64\">TOTAL WILAYAH (Ha)</td>\r\n</tr>\r\n<tr style=\"mso-height-source: userset; height: 105.0pt;\">\r\n<td class=\"xl66\" style=\"height: 105.0pt; border-top: none; border-left: none; width: 71pt;\" width=\"94\" height=\"140\">LUAS LAHAN SAWAH BERPOTENSI DIGUNAKAN / DI BUKA KEMBALI (Ha)</td>\r\n<td class=\"xl66\" style=\"border-top: none; border-left: none; width: 48pt;\" width=\"64\">IRIGASI (Ha)</td>\r\n<td class=\"xl66\" style=\"border-top: none; border-left: none; width: 48pt;\" width=\"64\">TADAH HUJAN (Ha)</td>\r\n<td class=\"xl66\" style=\"border-top: none; border-left: none; width: 48pt;\" width=\"64\">TOTAL (Ha)</td>\r\n<td class=\"xl66\" style=\"border-top: none; border-left: none; width: 42pt;\" width=\"56\">TEGAL/KEBUN (Ha)</td>\r\n<td class=\"xl66\" style=\"border-top: none; border-left: none; width: 48pt;\" width=\"64\">LADANG/HUMA (Ha)</td>\r\n<td class=\"xl66\" style=\"border-top: none; border-left: none; width: 70pt;\" width=\"93\">PERKEBUNAN (Ha)</td>\r\n<td class=\"xl66\" style=\"border-top: none; border-left: none; width: 45pt;\" width=\"60\">HUTAN RAKYAT (Ha)</td>\r\n<td class=\"xl66\" style=\"border-top: none; border-left: none; width: 85pt;\" width=\"113\">PADANG PENGEMBALAAN/PADANG RUMPUT (Ha)</td>\r\n<td class=\"xl66\" style=\"border-top: none; border-left: none; width: 48pt;\" width=\"64\">HUTAN NEGARA (Ha)</td>\r\n<td class=\"xl66\" style=\"border-top: none; border-left: none; width: 70pt;\" width=\"93\">SEMENTARA TDK DIUSAHAKAN (Ha)</td>\r\n<td class=\"xl68\" style=\"border-top: none; border-left: none; width: 48pt;\" width=\"64\">LAINNYA (TAMBAK, KOLAM, EMPANG DLL) (Ha)</td>\r\n<td class=\"xl68\" style=\"border-top: none; width: 48pt;\" width=\"64\">TOTAL (Ha)</td>\r\n</tr>\r\n<tr style=\"mso-height-source: userset; height: 22.5pt;\">\r\n<td class=\"xl65\" style=\"height: 22.5pt; border-top: none;\" height=\"30\">TOMOHON UTARA</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">4355</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">5</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">80</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">18</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">103</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">1535.5</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">154</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">765</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">439</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">1</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">364</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">115</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">23</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">3396.5</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">855.5</td>\r\n<td class=\"xl65\" style=\"border-top: none; border-left: none;\" align=\"right\">4355</td>\r\n</tr>\r\n<tr style=\"mso-height-source: userset; height: 22.5pt;\">\r\n<td class=\"xl65\" style=\"height: 22.5pt; border-top: none;\" height=\"30\">TOMOHON BARAT</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">3823.04</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">40</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">417</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">29.8</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">486.8</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">1629.6</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">153</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">689.7</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">281.5</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">6</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">264.61</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">52</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">31.9</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">3108.31</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">227.93</td>\r\n<td class=\"xl65\" style=\"border-top: none; border-left: none;\" align=\"right\">3823.04</td>\r\n</tr>\r\n<tr style=\"mso-height-source: userset; height: 22.5pt;\">\r\n<td class=\"xl65\" style=\"height: 22.5pt; border-top: none;\" height=\"30\">TOMOHON SELATAN</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">3292</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">31</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">0</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">44</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">75</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">1859.2</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">46</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">551</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">20</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">10</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">0</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">0</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">10</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">2496.2</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">720.8</td>\r\n<td class=\"xl65\" style=\"border-top: none; border-left: none;\" align=\"right\">3292</td>\r\n</tr>\r\n</tbody>\r\n</table>', '2023-08-20 18:17:35', '2023-08-20 18:17:35'),
(4, 'Tomohon Tengah', '<table style=\"border-collapse: collapse; width: 1012pt;\" border=\"0\" width=\"1347\" cellspacing=\"0\" cellpadding=\"0\"><colgroup><col style=\"mso-width-source: userset; mso-width-alt: 4900; width: 101pt;\" width=\"134\"> <col style=\"mso-width-source: userset; mso-width-alt: 3181; width: 65pt;\" width=\"87\"> <col style=\"mso-width-source: userset; mso-width-alt: 3437; width: 71pt;\" width=\"94\"> <col style=\"width: 48pt;\" span=\"3\" width=\"64\"> <col style=\"mso-width-source: userset; mso-width-alt: 2048; width: 42pt;\" width=\"56\"> <col style=\"width: 48pt;\" width=\"64\"> <col style=\"mso-width-source: userset; mso-width-alt: 3401; width: 70pt;\" width=\"93\"> <col style=\"mso-width-source: userset; mso-width-alt: 2194; width: 45pt;\" width=\"60\"> <col style=\"mso-width-source: userset; mso-width-alt: 4132; width: 85pt;\" width=\"113\"> <col style=\"width: 48pt;\" width=\"64\"> <col style=\"mso-width-source: userset; mso-width-alt: 3401; width: 70pt;\" width=\"93\"> <col style=\"width: 48pt;\" span=\"2\" width=\"64\"> <col style=\"mso-width-source: userset; mso-width-alt: 3840; width: 79pt;\" width=\"105\"> <col style=\"width: 48pt;\" width=\"64\"> </colgroup>\r\n<tbody>\r\n<tr style=\"mso-height-source: userset; height: 15.0pt;\">\r\n<td class=\"xl66\" style=\"height: 120.0pt; width: 101pt;\" rowspan=\"2\" width=\"134\" height=\"160\">KELURAHAN</td>\r\n<td class=\"xl66\" style=\"width: 65pt;\" rowspan=\"2\" width=\"87\">LUAS WILAYAH KELURAHAN (Ha)</td>\r\n<td class=\"xl66\" style=\"border-left: none; width: 215pt;\" colspan=\"4\" width=\"286\">LAHAN SAWAH</td>\r\n<td class=\"xl68\" style=\"border-right: .5pt solid black; border-left: none; width: 504pt;\" colspan=\"9\" width=\"671\">LAHAN PERTANIAN BUKAN SAWAH</td>\r\n<td class=\"xl66\" style=\"width: 79pt;\" rowspan=\"2\" width=\"105\">LAHAN BUKAN PERTANIAN (JALAN. PEMUKIMAN, PERKANTORAN, SUNGAI DLL) (Ha)</td>\r\n<td class=\"xl69\" style=\"border-bottom: .5pt solid black; width: 48pt;\" rowspan=\"2\" width=\"64\">TOTAL WILAYAH (Ha)</td>\r\n</tr>\r\n<tr style=\"mso-height-source: userset; height: 105.0pt;\">\r\n<td class=\"xl66\" style=\"height: 105.0pt; border-top: none; border-left: none; width: 71pt;\" width=\"94\" height=\"140\">LUAS LAHAN SAWAH BERPOTENSI DIGUNAKAN / DI BUKA KEMBALI (Ha)</td>\r\n<td class=\"xl66\" style=\"border-top: none; border-left: none; width: 48pt;\" width=\"64\">IRIGASI (Ha)</td>\r\n<td class=\"xl66\" style=\"border-top: none; border-left: none; width: 48pt;\" width=\"64\">TADAH HUJAN (Ha)</td>\r\n<td class=\"xl66\" style=\"border-top: none; border-left: none; width: 48pt;\" width=\"64\">TOTAL (Ha)</td>\r\n<td class=\"xl66\" style=\"border-top: none; border-left: none; width: 42pt;\" width=\"56\">TEGAL/KEBUN (Ha)</td>\r\n<td class=\"xl66\" style=\"border-top: none; border-left: none; width: 48pt;\" width=\"64\">LADANG/HUMA (Ha)</td>\r\n<td class=\"xl66\" style=\"border-top: none; border-left: none; width: 70pt;\" width=\"93\">PERKEBUNAN (Ha)</td>\r\n<td class=\"xl66\" style=\"border-top: none; border-left: none; width: 45pt;\" width=\"60\">HUTAN RAKYAT (Ha)</td>\r\n<td class=\"xl66\" style=\"border-top: none; border-left: none; width: 85pt;\" width=\"113\">PADANG PENGEMBALAAN/PADANG RUMPUT (Ha)</td>\r\n<td class=\"xl66\" style=\"border-top: none; border-left: none; width: 48pt;\" width=\"64\">HUTAN NEGARA (Ha)</td>\r\n<td class=\"xl66\" style=\"border-top: none; border-left: none; width: 70pt;\" width=\"93\">SEMENTARA TDK DIUSAHAKAN (Ha)</td>\r\n<td class=\"xl68\" style=\"border-top: none; border-left: none; width: 48pt;\" width=\"64\">LAINNYA (TAMBAK, KOLAM, EMPANG DLL) (Ha)</td>\r\n<td class=\"xl68\" style=\"border-top: none; width: 48pt;\" width=\"64\">TOTAL (Ha)</td>\r\n</tr>\r\n<tr style=\"mso-height-source: userset; height: 22.5pt;\">\r\n<td class=\"xl65\" style=\"height: 22.5pt; border-top: none;\" height=\"30\">TOMOHON UTARA</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">4355</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">5</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">80</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">18</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">103</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">1535.5</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">154</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">765</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">439</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">1</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">364</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">115</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">23</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">3396.5</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">855.5</td>\r\n<td class=\"xl65\" style=\"border-top: none; border-left: none;\" align=\"right\">4355</td>\r\n</tr>\r\n<tr style=\"mso-height-source: userset; height: 22.5pt;\">\r\n<td class=\"xl65\" style=\"height: 22.5pt; border-top: none;\" height=\"30\">TOMOHON BARAT</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">3823.04</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">40</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">417</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">29.8</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">486.8</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">1629.6</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">153</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">689.7</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">281.5</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">6</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">264.61</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">52</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">31.9</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">3108.31</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">227.93</td>\r\n<td class=\"xl65\" style=\"border-top: none; border-left: none;\" align=\"right\">3823.04</td>\r\n</tr>\r\n<tr style=\"mso-height-source: userset; height: 22.5pt;\">\r\n<td class=\"xl65\" style=\"height: 22.5pt; border-top: none;\" height=\"30\">TOMOHON SELATAN</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">3292</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">31</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">0</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">44</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">75</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">1859.2</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">46</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">551</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">20</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">10</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">0</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">0</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">10</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">2496.2</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">720.8</td>\r\n<td class=\"xl65\" style=\"border-top: none; border-left: none;\" align=\"right\">3292</td>\r\n</tr>\r\n<tr style=\"mso-height-source: userset; height: 22.5pt;\">\r\n<td class=\"xl65\" style=\"height: 22.5pt; border-top: none;\" height=\"30\">TOMOHON TENGAH</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">2154.35</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">4</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">30</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">1</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">35</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">907.7</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">0</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">129</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">16.3</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">20</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">345</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">149.4</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">11.01</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">1578.41</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">540.94</td>\r\n<td class=\"xl65\" style=\"border-top: none; border-left: none;\" align=\"right\">2154.35</td>\r\n</tr>\r\n</tbody>\r\n</table>', '2023-08-20 18:17:58', '2023-08-20 18:17:58'),
(5, 'Tomohon Timur', '<table style=\"border-collapse: collapse; width: 1012pt;\" border=\"0\" width=\"1347\" cellspacing=\"0\" cellpadding=\"0\"><colgroup><col style=\"mso-width-source: userset; mso-width-alt: 4900; width: 101pt;\" width=\"134\"><col style=\"mso-width-source: userset; mso-width-alt: 3181; width: 65pt;\" width=\"87\"><col style=\"mso-width-source: userset; mso-width-alt: 3437; width: 71pt;\" width=\"94\"><col style=\"width: 48pt;\" span=\"3\" width=\"64\"><col style=\"mso-width-source: userset; mso-width-alt: 2048; width: 42pt;\" width=\"56\"><col style=\"width: 48pt;\" width=\"64\"><col style=\"mso-width-source: userset; mso-width-alt: 3401; width: 70pt;\" width=\"93\"><col style=\"mso-width-source: userset; mso-width-alt: 2194; width: 45pt;\" width=\"60\"><col style=\"mso-width-source: userset; mso-width-alt: 4132; width: 85pt;\" width=\"113\"><col style=\"width: 48pt;\" width=\"64\"><col style=\"mso-width-source: userset; mso-width-alt: 3401; width: 70pt;\" width=\"93\"><col style=\"width: 48pt;\" span=\"2\" width=\"64\"><col style=\"mso-width-source: userset; mso-width-alt: 3840; width: 79pt;\" width=\"105\"><col style=\"width: 48pt;\" width=\"64\"></colgroup>\r\n<tbody>\r\n<tr style=\"mso-height-source: userset; height: 15.0pt;\">\r\n<td class=\"xl66\" style=\"height: 120.0pt; width: 101pt;\" rowspan=\"2\" width=\"134\" height=\"160\">KELURAHAN</td>\r\n<td class=\"xl66\" style=\"width: 65pt;\" rowspan=\"2\" width=\"87\">LUAS WILAYAH KELURAHAN (Ha)</td>\r\n<td class=\"xl66\" style=\"border-left: none; width: 215pt;\" colspan=\"4\" width=\"286\">LAHAN SAWAH</td>\r\n<td class=\"xl68\" style=\"border-right: .5pt solid black; border-left: none; width: 504pt;\" colspan=\"9\" width=\"671\">LAHAN PERTANIAN BUKAN SAWAH</td>\r\n<td class=\"xl66\" style=\"width: 79pt;\" rowspan=\"2\" width=\"105\">LAHAN BUKAN PERTANIAN (JALAN. PEMUKIMAN, PERKANTORAN, SUNGAI DLL) (Ha)</td>\r\n<td class=\"xl69\" style=\"border-bottom: .5pt solid black; width: 48pt;\" rowspan=\"2\" width=\"64\">TOTAL WILAYAH (Ha)</td>\r\n</tr>\r\n<tr style=\"mso-height-source: userset; height: 105.0pt;\">\r\n<td class=\"xl66\" style=\"height: 105.0pt; border-top: none; border-left: none; width: 71pt;\" width=\"94\" height=\"140\">LUAS LAHAN SAWAH BERPOTENSI DIGUNAKAN / DI BUKA KEMBALI (Ha)</td>\r\n<td class=\"xl66\" style=\"border-top: none; border-left: none; width: 48pt;\" width=\"64\">IRIGASI (Ha)</td>\r\n<td class=\"xl66\" style=\"border-top: none; border-left: none; width: 48pt;\" width=\"64\">TADAH HUJAN (Ha)</td>\r\n<td class=\"xl66\" style=\"border-top: none; border-left: none; width: 48pt;\" width=\"64\">TOTAL (Ha)</td>\r\n<td class=\"xl66\" style=\"border-top: none; border-left: none; width: 42pt;\" width=\"56\">TEGAL/KEBUN (Ha)</td>\r\n<td class=\"xl66\" style=\"border-top: none; border-left: none; width: 48pt;\" width=\"64\">LADANG/HUMA (Ha)</td>\r\n<td class=\"xl66\" style=\"border-top: none; border-left: none; width: 70pt;\" width=\"93\">PERKEBUNAN (Ha)</td>\r\n<td class=\"xl66\" style=\"border-top: none; border-left: none; width: 45pt;\" width=\"60\">HUTAN RAKYAT (Ha)</td>\r\n<td class=\"xl66\" style=\"border-top: none; border-left: none; width: 85pt;\" width=\"113\">PADANG PENGEMBALAAN/PADANG RUMPUT (Ha)</td>\r\n<td class=\"xl66\" style=\"border-top: none; border-left: none; width: 48pt;\" width=\"64\">HUTAN NEGARA (Ha)</td>\r\n<td class=\"xl66\" style=\"border-top: none; border-left: none; width: 70pt;\" width=\"93\">SEMENTARA TDK DIUSAHAKAN (Ha)</td>\r\n<td class=\"xl68\" style=\"border-top: none; border-left: none; width: 48pt;\" width=\"64\">LAINNYA (TAMBAK, KOLAM, EMPANG DLL) (Ha)</td>\r\n<td class=\"xl68\" style=\"border-top: none; width: 48pt;\" width=\"64\">TOTAL (Ha)</td>\r\n</tr>\r\n<tr style=\"mso-height-source: userset; height: 22.5pt;\">\r\n<td class=\"xl65\" style=\"height: 22.5pt; border-top: none;\" height=\"30\">TOMOHON UTARA</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">4355</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">5</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">80</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">18</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">103</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">1535.5</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">154</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">765</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">439</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">1</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">364</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">115</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">23</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">3396.5</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">855.5</td>\r\n<td class=\"xl65\" style=\"border-top: none; border-left: none;\" align=\"right\">4355</td>\r\n</tr>\r\n<tr style=\"mso-height-source: userset; height: 22.5pt;\">\r\n<td class=\"xl65\" style=\"height: 22.5pt; border-top: none;\" height=\"30\">TOMOHON BARAT</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">3823.04</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">40</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">417</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">29.8</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">486.8</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">1629.6</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">153</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">689.7</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">281.5</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">6</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">264.61</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">52</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">31.9</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">3108.31</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">227.93</td>\r\n<td class=\"xl65\" style=\"border-top: none; border-left: none;\" align=\"right\">3823.04</td>\r\n</tr>\r\n<tr style=\"mso-height-source: userset; height: 22.5pt;\">\r\n<td class=\"xl65\" style=\"height: 22.5pt; border-top: none;\" height=\"30\">TOMOHON SELATAN</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">3292</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">31</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">0</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">44</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">75</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">1859.2</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">46</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">551</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">20</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">10</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">0</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">0</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">10</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">2496.2</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">720.8</td>\r\n<td class=\"xl65\" style=\"border-top: none; border-left: none;\" align=\"right\">3292</td>\r\n</tr>\r\n<tr style=\"mso-height-source: userset; height: 22.5pt;\">\r\n<td class=\"xl65\" style=\"height: 22.5pt; border-top: none;\" height=\"30\">TOMOHON TENGAH</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">2154.35</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">4</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">30</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">1</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">35</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">907.7</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">0</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">129</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">16.3</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">20</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">345</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">149.4</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">11.01</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">1578.41</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">540.94</td>\r\n<td class=\"xl65\" style=\"border-top: none; border-left: none;\" align=\"right\">2154.35</td>\r\n</tr>\r\n<tr style=\"mso-height-source: userset; height: 22.5pt;\">\r\n<td class=\"xl65\" style=\"height: 22.5pt; border-top: none;\" height=\"30\">TOMOHON TIMUR</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">1414.8</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">0</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">0</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">0</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">0</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">1023.8</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">0</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">65</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">143</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">0</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">0</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">0</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">11</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">1242.8</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none;\">172</td>\r\n<td class=\"xl65\" style=\"border-top: none; border-left: none;\" align=\"right\">1414.8</td>\r\n</tr>\r\n<tr>\r\n<td style=\"border-top: none;\">&nbsp;</td>\r\n<td style=\"border-top: none; border-left: none;\">&nbsp;</td>\r\n<td style=\"border-top: none; border-left: none;\">&nbsp;</td>\r\n<td style=\"border-top: none; border-left: none;\">&nbsp;</td>\r\n<td style=\"border-top: none; border-left: none;\">&nbsp;</td>\r\n<td style=\"border-top: none; border-left: none;\">&nbsp;</td>\r\n<td style=\"border-top: none; border-left: none;\">&nbsp;</td>\r\n<td style=\"border-top: none; border-left: none;\">&nbsp;</td>\r\n<td style=\"border-top: none; border-left: none;\">&nbsp;</td>\r\n<td style=\"border-top: none; border-left: none;\">&nbsp;</td>\r\n<td style=\"border-top: none; border-left: none;\">&nbsp;</td>\r\n<td style=\"border-top: none; border-left: none;\">&nbsp;</td>\r\n<td style=\"border-top: none; border-left: none;\">&nbsp;</td>\r\n<td style=\"border-top: none; border-left: none;\">&nbsp;</td>\r\n<td style=\"border-top: none; border-left: none;\">&nbsp;</td>\r\n<td style=\"border-top: none; border-left: none;\">&nbsp;</td>\r\n<td style=\"border-top: none; border-left: none;\">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>', '2023-08-20 18:18:18', '2023-08-20 18:18:18');

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produksis`
--

CREATE TABLE `produksis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_kecamatan` bigint(20) UNSIGNED DEFAULT NULL,
  `nama_produksi` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `luas_tanam` float DEFAULT NULL,
  `luas_panen` float DEFAULT NULL,
  `produksi` float DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `lokasi_gps` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `informasi_tambahan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produksis`
--

INSERT INTO `produksis` (`id`, `id_kecamatan`, `nama_produksi`, `luas_tanam`, `luas_panen`, `produksi`, `tanggal`, `lokasi_gps`, `gambar`, `informasi_tambahan`, `created_at`, `updated_at`) VALUES
(3, 1, 'UBI TALAS', 1.6, 2, 24, '2022-01-01', '1.326337, 124.805111', '1692584668968.panen.jpeg', '<p style=\"text-align: center;\"><strong>REALISASI TANAM, PANEN DAN PRODUKSI KOTA TOMOHON</strong></p>\r\n<p style=\"text-align: center;\"><strong>UBI TALAS 2022</strong></p>\r\n<table style=\"border-collapse: collapse; width: 344pt; border-spacing: 5px; background-color: rgb(191, 237, 210); border: 1px solid rgb(0, 0, 0); margin-left: auto; margin-right: auto;\" border=\"1\" width=\"455\" cellspacing=\"0\" cellpadding=\"0\"><colgroup><col style=\"width: 36px;\" width=\"30\"> <col style=\"width: 118px;\" width=\"141\"> <col style=\"width: 81px;\" width=\"66\"> <col style=\"width: 68.6932px;\" span=\"3\" width=\"54\"> <col style=\"width: 59px;\" width=\"56\"> </colgroup>\r\n<tbody>\r\n<tr style=\"height: 15.0pt;\">\r\n<td class=\"xl66\" style=\"border-width: 1px; border-bottom-style: solid; height: 45.75pt; width: 23pt; padding: 5px; border-color: rgb(0, 0, 0);\" rowspan=\"3\" width=\"30\" height=\"61\">NO</td>\r\n<td class=\"xl69\" style=\"border-width: 1px; border-bottom-style: solid; width: 106pt; padding: 5px; border-color: rgb(0, 0, 0);\" rowspan=\"3\" width=\"141\">KECAMATAN</td>\r\n<td class=\"xl72\" style=\"border-width: 1px; border-bottom-style: solid; width: 50pt; padding: 5px; border-color: rgb(0, 0, 0);\" rowspan=\"3\" width=\"66\">POTENSI</td>\r\n<td class=\"xl75\" style=\"border-width: 1px; border-left-style: none; width: 165pt; text-align: center; padding: 5px; border-color: rgb(0, 0, 0);\" colspan=\"4\" width=\"218\">JANUARI</td>\r\n</tr>\r\n<tr style=\"height: 15.0pt;\">\r\n<td class=\"xl76\" style=\"border-width: 1px; border-bottom-style: solid; height: 30.75pt; border-top-style: none; width: 41pt; padding: 5px; border-color: rgb(0, 0, 0);\" rowspan=\"2\" width=\"54\" height=\"41\">LT<br>(Ha)</td>\r\n<td class=\"xl78\" style=\"border-width: 1px; border-bottom-style: solid; border-top-style: none; width: 41pt; padding: 5px; border-color: rgb(0, 0, 0);\" rowspan=\"2\" width=\"54\">LP<br>(Ha)</td>\r\n<td class=\"xl80\" style=\"border-width: 1px; border-bottom-style: solid; border-top-style: none; width: 41pt; padding: 5px; border-color: rgb(0, 0, 0);\" rowspan=\"2\" width=\"54\">PROV<br>(Kw/Ha)</td>\r\n<td class=\"xl80\" style=\"border-width: 1px; border-bottom-style: solid; border-top-style: none; width: 42pt; padding: 5px; border-color: rgb(0, 0, 0);\" rowspan=\"2\" width=\"56\">PROD<br>(Ton)</td>\r\n</tr>\r\n<tr style=\"height: 15.75pt;\"></tr>\r\n<tr style=\"mso-height-source: userset; height: 31.5pt;\">\r\n<td class=\"xl63\" style=\"height: 31.5pt; border-width: 1px; padding: 5px; border-color: rgb(0, 0, 0);\" align=\"right\" height=\"42\">1</td>\r\n<td class=\"xl63\" style=\"border-width: 1px; border-left-style: none; padding: 5px; border-color: rgb(0, 0, 0);\">Tomohon Utara</td>\r\n<td class=\"xl63\" style=\"border-width: 1px; border-left-style: none; padding: 5px; border-color: rgb(0, 0, 0);\">&nbsp;</td>\r\n<td class=\"xl65\" style=\"border-width: 1px; border-left-style: none; padding: 5px; border-color: rgb(0, 0, 0);\" align=\"right\">1.6</td>\r\n<td class=\"xl64\" style=\"border-width: 1px; border-left-style: none; padding: 5px; border-color: rgb(0, 0, 0);\" align=\"right\">2</td>\r\n<td class=\"xl63\" style=\"border-width: 1px; border-left-style: none; padding: 5px; border-color: rgb(0, 0, 0);\" align=\"right\">120</td>\r\n<td class=\"xl63\" style=\"border-width: 1px; border-left-style: none; padding: 5px; border-color: rgb(0, 0, 0);\" align=\"right\">24</td>\r\n</tr>\r\n</tbody>\r\n</table>', '2023-08-20 18:24:28', '2023-08-20 20:39:02'),
(4, 1, 'JAGUNG', 0, 0.2, 0.4, '2023-04-01', '1.325515, 124.806888', '1692584950423.PANEN1.jpeg', '<p style=\"text-align: center;\"><strong>DATA PRODUKSI KACANG TANAH KOTA TOMOHON</strong></p>\r\n<p style=\"text-align: center;\"><strong>PERIODE JANUARI - APRIL &nbsp;TAHUN 2023</strong></p>\r\n<table style=\"border-collapse: collapse; width: 544px;\" border=\"0\" width=\"322\" cellspacing=\"0\" cellpadding=\"0\"><colgroup><col style=\"width: 58.4px;\" width=\"32\"> <col style=\"width: 144.4px;\" width=\"136\"> <col style=\"width: 109.4px;\" width=\"54\"> <col style=\"width: 118.4px;\" span=\"2\" width=\"50\"> </colgroup>\r\n<tbody>\r\n<tr style=\"height: 15.0pt;\">\r\n<td class=\"xl73\" style=\"height: 80.25pt; width: 24pt;\" rowspan=\"2\" width=\"32\" height=\"107\">NO</td>\r\n<td class=\"xl73\" style=\"width: 102pt;\" rowspan=\"2\" width=\"136\">KECAMATAN</td>\r\n<td class=\"xl70\" style=\"border-right: 0.5pt solid black; border-left: none; width: 117pt; text-align: center;\" colspan=\"3\" width=\"154\">JANUARI</td>\r\n</tr>\r\n<tr style=\"mso-height-source: userset; height: 65.25pt;\">\r\n<td class=\"xl67\" style=\"height: 65.25pt; border-top: none; border-left: none; width: 41pt;\" width=\"54\" height=\"87\">LUAS TANAM (Ha)</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none; width: 38pt;\" width=\"50\">LUAS PANEN (Ha)</td>\r\n<td class=\"xl67\" style=\"border-top: none; border-left: none; width: 38pt;\" width=\"50\">PRODUKSI (Ton)</td>\r\n</tr>\r\n<tr style=\"height: 15.0pt;\">\r\n<td class=\"xl65\" style=\"height: 15.0pt; border-top: none;\" height=\"20\">1</td>\r\n<td class=\"xl66\" style=\"border-top: none; border-left: none;\">TOMOHON UTARA</td>\r\n<td class=\"xl69\" style=\"border-left: none;\" align=\"right\">0</td>\r\n<td class=\"xl68\" style=\"border-left: none;\" align=\"right\">0.2</td>\r\n<td class=\"xl65\" style=\"border-top: none; border-left: none;\">2.4</td>\r\n</tr>\r\n</tbody>\r\n</table>', '2023-08-20 18:29:10', '2023-08-20 18:29:10');

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `level` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `level`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$hVx8k4QKucKPXnia6.XaY.ggf4xVatRdHF3CMYkGizCw8wctKnEHK', NULL, '2023-08-15 15:08:30', '2023-08-15 15:08:30', 'Admin');

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
-- Indexes for table `jenis_kebuns`
--
ALTER TABLE `jenis_kebuns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kebuns`
--
ALTER TABLE `kebuns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kecamatans`
--
ALTER TABLE `kecamatans`
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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `produksis`
--
ALTER TABLE `produksis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kecamatan` (`id_kecamatan`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenis_kebuns`
--
ALTER TABLE `jenis_kebuns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kebuns`
--
ALTER TABLE `kebuns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `kecamatans`
--
ALTER TABLE `kecamatans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produksis`
--
ALTER TABLE `produksis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `produksis`
--
ALTER TABLE `produksis`
  ADD CONSTRAINT `produksis_ibfk_1` FOREIGN KEY (`id_kecamatan`) REFERENCES `kecamatans` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
