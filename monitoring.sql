-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Nov 2021 pada 05.17
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `monitoring`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `angkutan_time`
--

CREATE TABLE `angkutan_time` (
  `kode_angkutan` int(255) NOT NULL,
  `nama_angkutan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan_angkutan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `angkutan_time`
--

INSERT INTO `angkutan_time` (`kode_angkutan`, `nama_angkutan`, `keterangan_angkutan`, `created_at`, `updated_at`) VALUES
(1, 'KM Anugerah Buana VI', '-', NULL, '2021-10-27 20:49:58'),
(2, 'PT Kapuas Mekar Jaya', '-', '2021-10-05 00:58:34', '2021-10-05 00:58:34'),
(3, 'PT Linc Bintang Line', '-', '2021-10-05 00:58:34', '2021-10-05 00:58:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gudang_petroganik`
--

CREATE TABLE `gudang_petroganik` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_rekanan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lokasi_gudang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_gudang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provinsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `gudang_petroganik`
--

INSERT INTO `gudang_petroganik` (`id`, `nama_rekanan`, `lokasi_gudang`, `alamat_gudang`, `provinsi`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'Agro Tani Marisi', '-', '-', 'Kalimantan Tengah', '-', NULL, '2021-10-18 18:05:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gudang_pkg`
--

CREATE TABLE `gudang_pkg` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lokasi_gudang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_gudang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provinsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_rekanan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kap_GP_Ton` int(11) NOT NULL,
  `Kapasitas_Anper_Lain` int(11) NOT NULL,
  `sewa_Gudang_Rpbulan` int(11) NOT NULL,
  `pengelolan_Stock_Rpbulan` int(11) NOT NULL,
  `BM_RpTon` int(11) NOT NULL,
  `rebag_RpTon` int(11) NOT NULL,
  `lembur_RpTon` int(11) NOT NULL,
  `restapel_RpTon` int(11) NOT NULL,
  `nomor_surat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_kontrak` date NOT NULL,
  `mulai` date NOT NULL,
  `akhir` date NOT NULL,
  `jenis_surat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `gudang_pkg`
--

INSERT INTO `gudang_pkg` (`id`, `lokasi_gudang`, `alamat_gudang`, `provinsi`, `nama_rekanan`, `kap_GP_Ton`, `Kapasitas_Anper_Lain`, `sewa_Gudang_Rpbulan`, `pengelolan_Stock_Rpbulan`, `BM_RpTon`, `rebag_RpTon`, `lembur_RpTon`, `restapel_RpTon`, `nomor_surat`, `tgl_kontrak`, `mulai`, `akhir`, `jenis_surat`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'GP Aceh Tamiang (Langsa)', 'Jl. Kuala Simpang Langsa Km 12 Tanjung Seumantah-Manyak Payed-Kab. Aceh Tamiang-Aceh', 'Aceh', 'PT Varuna Tirta Prakasya (Persero)', 1000, 0, 8750000, 14840000, 41000, 82000, 82000, 82000, '0458/B/HK.01.02/35/SP/2020', '2020-04-27', '2020-04-01', '2022-08-28', 'Kontrak/ SP', '-', NULL, '2021-10-31 17:39:08'),
(2, 'ASDASD', 'asd', 'Aceh', 'CV Bintang Enim', 123, 123, 123, 123, 123, 123, 123, 123, '1231', '2021-11-02', '2021-11-11', '2021-11-27', 'dasdad', 'ASDASD', '2021-10-31 17:59:07', '2021-10-31 17:59:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jalur_alihstok`
--

CREATE TABLE `jalur_alihstok` (
  `kode_rute` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `asal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tujuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wilayah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tarif` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jalur_alihstok`
--

INSERT INTO `jalur_alihstok` (`kode_rute`, `asal`, `tujuan`, `wilayah`, `tarif`, `created_at`, `updated_at`) VALUES
('GPAceh-Gresik', 'GP Aceh Tamiang (Langsa)', 'GP Aceh Tamiang (Langsa)', 'Jawa Timur', '400000', '2021-10-26 19:31:36', '2021-10-26 19:31:36'),
('Gresik-Bitung', 'GP Aceh Tamiang (Langsa)', 'GP Aceh Tamiang (Langsa)', 'Sulawesi', '300000', '2021-10-22 00:18:12', '2021-10-25 00:10:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jalur_container`
--

CREATE TABLE `jalur_container` (
  `kode_rute` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `asal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tujuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wilayah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tarif` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jalur_container`
--

INSERT INTO `jalur_container` (`kode_rute`, `asal`, `tujuan`, `wilayah`, `tarif`, `created_at`, `updated_at`) VALUES
('Gresik-Ambon', 'Kabupaten Gresik', 'Kota Ambon', 'Maluku, Maluku Utara, Irian Jaya, Irian Barat', 576296, '2021-10-28 15:24:02', '2021-10-28 15:24:02'),
('Gresik-Attambua', 'Kabupaten Gresik', 'Attambua', 'NTT & NTB', 572000, '2021-10-28 15:24:02', '2021-10-28 15:24:02'),
('Gresik-Balikpapan', 'Kabupaten Gresik', 'Kota Balikpapan', 'Kalimantan', 448864, '2021-10-28 15:24:02', '2021-10-28 15:24:02'),
('Gresik-Banjarmasin', 'Kabupaten Gresik', 'Kota Banjarmasin', 'Kalimantan', 380982, '2021-10-28 15:24:02', '2021-10-28 15:24:02'),
('Gresik-Bau-Bau', 'Kabupaten Gresik', 'Kota Bau-Bau', 'Sulawesi', 477134, '2021-10-28 15:24:02', '2021-10-28 15:24:02'),
('Gresik-Belitung', 'Kabupaten Gresik', 'Kota Belitung', 'Sumatera', 716982, '2021-10-28 15:24:02', '2021-10-28 15:24:02'),
('Gresik-Bengkulu', 'Kabupaten Gresik', 'Kota Bengkulu', 'Sumatera', 656546, '2021-10-28 15:24:02', '2021-10-28 15:24:02'),
('Gresik-Biak', 'Kabupaten Gresik', 'Kabupaten Biak Numfor', 'Maluku, Maluku Utara, Irian Jaya, Irian Barat', 720682, '2021-10-28 15:24:02', '2021-10-28 15:24:02'),
('Gresik-Bima', 'Kabupaten Gresik', 'Kota Bima', 'NTT & NTB', 610864, '2021-10-28 15:24:02', '2021-10-28 15:24:02'),
('Gresik-Bitung', 'Kabupaten Gresik', 'Kota Bitung', 'Sulawesi', 487546, '2021-10-28 15:24:02', '2021-10-28 15:24:02'),
('Gresik-Bulungan', 'Kabupaten Gresik', 'Kabupaten Bulungan', 'Kalimantan', 854984, '2021-10-28 15:24:02', '2021-10-28 15:24:02'),
('Gresik-Dumai', 'Kabupaten Gresik', 'Kota Dumai', 'Sumatera', 457500, '2021-10-28 15:24:02', '2021-10-28 15:24:02'),
('Gresik-Ende', 'Kabupaten Gresik', 'Kabupaten Ende', 'NTT & NTB', 465364, '2021-10-28 15:24:02', '2021-10-28 15:24:02'),
('Gresik-Fakfak', 'Kabupaten Gresik', 'Kabupaten Fakfak', 'Maluku, Maluku Utara, Irian Jaya, Irian Barat', 837132, '2021-10-28 15:24:02', '2021-10-28 15:24:02'),
('Gresik-Gorontalo', 'Kabupaten Gresik', 'Kabupaten Gorontalo', 'Sulawesi', 503546, '2021-10-28 15:24:02', '2021-10-28 15:24:02'),
('Gresik-IndragiriHulu', 'Kabupaten Gresik', 'Kabupaten Indragiri Hulu', 'Sumatera', 589000, '2021-10-28 15:24:02', '2021-10-28 15:24:02'),
('Gresik-Jambi', 'Kabupaten Gresik', 'Kota Jambi', 'Sumatera', 647119, '2021-10-28 15:24:02', '2021-10-28 15:24:02'),
('Gresik-Jayapura / Keroom', 'Kabupaten Gresik', 'Kabupaten Jayapura', 'Maluku, Maluku Utara, Irian Jaya, Irian Barat', 657082, '2021-10-28 15:24:02', '2021-10-28 15:24:02'),
('Gresik-Kaimana', 'Kabupaten Gresik', 'Kabupaten Kaimana', 'Maluku, Maluku Utara, Irian Jaya, Irian Barat', 827182, '2021-10-28 15:24:02', '2021-10-28 15:24:02'),
('Gresik-Kendari', 'Kabupaten Gresik', 'Kota Kendari', 'Sulawesi', 475864, '2021-10-28 15:24:02', '2021-10-28 15:24:02'),
('Gresik-Kolaka', 'Kabupaten Gresik', 'KabupatenKolaka', 'Sulawesi', 580364, '2021-10-28 15:24:02', '2021-10-28 15:24:02'),
('Gresik-KotawaringinBarat', 'Kabupaten Gresik', 'Kabupaten Kotawaringin Barat', 'Kalimantan', 421182, '2021-10-28 15:24:02', '2021-10-28 15:24:02'),
('Gresik-Kupang', 'Kabupaten Gresik', 'Kabupaten Kupang', 'NTT & NTB', 476364, '2021-10-28 15:24:02', '2021-10-28 15:24:02'),
('Gresik-L. Banggai / Bunta', 'Kabupaten Gresik', 'L. Banggai / Bunta', 'Sulawesi', 740182, '2021-10-28 15:24:02', '2021-10-28 15:24:02'),
('Gresik-L. Banggai / Toili', 'Kabupaten Gresik', 'L. Banggai / Toili', 'Sulawesi', 668432, '2021-10-28 15:24:02', '2021-10-28 15:24:02'),
('Gresik-Labuhan Bajo', 'Kabupaten Gresik', 'Kabupaten Manggarai Barat', 'NTT & NTB', 600931, '2021-10-28 15:24:02', '2021-10-28 15:24:02'),
('Gresik-Lembar', 'Kabupaten Gresik', 'Kabupaten Lombok Barat', 'NTT & NTB', 395382, '2021-10-28 15:24:02', '2021-10-28 15:24:02'),
('Gresik-Lombok Tengah', 'Kabupaten Gresik', 'Kabupaten Lombok Tengah', 'NTT & NTB', 453182, '2021-10-28 15:24:02', '2021-10-28 15:24:02'),
('Gresik-Lombok Timur', 'Kabupaten Gresik', 'Kabupaten Lombok Timur', 'NTT & NTB', 461182, '2021-10-28 15:24:02', '2021-10-28 15:24:02'),
('Gresik-Makassar', 'Kabupaten Gresik', 'Kota Makassar', 'Sulawesi', 371364, '2021-10-28 15:24:02', '2021-10-28 15:24:02'),
('Gresik-Manokwari', 'Kabupaten Gresik', 'Kabupaten Manokwari', 'Maluku, Maluku Utara, Irian Jaya, Irian Barat', 747182, '2021-10-28 15:24:02', '2021-10-28 15:24:02'),
('Gresik-Medan', 'Kabupaten Gresik', 'Kota Medan', 'Sumatera', 514546, '2021-10-28 15:24:02', '2021-10-28 15:24:02'),
('Gresik-Merauke I - Tanah Miring', 'Kabupaten Gresik', 'Merauke I - Tanah Miring', 'Maluku, Maluku Utara, Irian Jaya, Irian Barat', 680091, '2021-10-28 15:24:02', '2021-10-28 15:24:02'),
('Gresik-Merauke II - Kota', 'Kabupaten Gresik', 'Merauke II - Kota', 'Maluku, Maluku Utara, Irian Jaya, Irian Barat', 621091, '2021-10-28 15:24:02', '2021-10-28 15:24:02'),
('Gresik-Nabire', 'Kabupaten Gresik', 'Kabupaten Nabire', 'Maluku, Maluku Utara, Irian Jaya, Irian Barat', 678082, '2021-10-28 15:24:02', '2021-10-28 15:24:02'),
('Gresik-Padang', 'Kabupaten Gresik', 'Kota Padang', 'Sumatera', 553546, '2021-10-28 15:24:02', '2021-10-28 15:24:02'),
('Gresik-Pagatan', 'Kabupaten Gresik', 'Kota Pagatan  / Batulicin', 'Kalimantan', 595182, '2021-10-28 15:24:02', '2021-10-28 15:24:02'),
('Gresik-Palu', 'Kabupaten Gresik', 'Kota Palu', 'Sulawesi', 430364, '2021-10-28 15:24:02', '2021-10-28 15:24:02'),
('Gresik-Pangkal Pinang', 'Kabupaten Gresik', 'Kota Pangkal Pinang', 'Sumatera', 630628, '2021-10-28 15:24:02', '2021-10-28 15:24:02'),
('Gresik-Pare Pare', 'Kabupaten Gresik', 'Kota ParePare', 'Sulawesi', 453364, '2021-10-28 15:24:02', '2021-10-28 15:24:02'),
('Gresik-Paser', 'Kabupaten Gresik', 'Kabupaten Paser', 'Kalimantan', 615364, '2021-10-28 15:24:02', '2021-10-28 15:24:02'),
('Gresik-Pekanbaru', 'Kabupaten Gresik', 'Kota Pekanbaru', 'Sumatera', 499820, '2021-10-28 15:24:02', '2021-10-28 15:24:02'),
('Gresik-Pontianak', 'Kabupaten Gresik', 'Kota Pontianak', 'Kalimantan', 540364, '2021-10-28 15:24:02', '2021-10-28 15:24:02'),
('Gresik-Pringgabaya', 'Kabupaten Gresik', 'Pringgabaya', 'NTT & NTB', 462182, '2021-10-28 15:24:02', '2021-10-28 15:24:02'),
('Gresik-Reo', 'Kabupaten Gresik', 'Reo', 'NTT & NTB', 456314, '2021-10-28 15:24:02', '2021-10-28 15:24:02'),
('Gresik-Samarinda', 'Kabupaten Gresik', 'Kota Samarinda', 'Kalimantan', 480864, '2021-10-28 15:24:02', '2021-10-28 15:24:02'),
('Gresik-Sampit', 'Kabupaten Gresik', 'Kabupaten Kotawaringin Timur ', 'Kalimantan', 437681, '2021-10-28 15:24:02', '2021-10-28 15:24:02'),
('Gresik-Siak', 'Kabupaten Gresik', 'Kabupaten Siak', 'Sumatera', 554970, '2021-10-28 15:24:02', '2021-10-28 15:24:02'),
('Gresik-Sorong', 'Kabupaten Gresik', 'Kabupaten Sorong', 'Maluku, Maluku Utara, Irian Jaya, Irian Barat', 676082, '2021-10-28 15:24:02', '2021-10-28 15:24:02'),
('Gresik-Sumbawa', 'Kabupaten Gresik', 'Kabupaten Sumbawa', 'NTT & NTB', 593182, '2021-10-28 15:24:02', '2021-10-28 15:24:02'),
('Gresik-TanjungPinang', 'Kabupaten Gresik', 'Kota Tanjung Pinang', 'Sumatera', 872546, '2021-10-28 15:24:02', '2021-10-28 15:24:02'),
('Gresik-Tarakan', 'Kabupaten Gresik', 'Kota Tarakan', 'Kalimantan', 605364, '2021-10-28 15:24:02', '2021-10-28 15:24:02'),
('Gresik-Ternate', 'Kabupaten Gresik', 'Kota Ternate', 'Maluku, Maluku Utara, Irian Jaya, Irian Barat', 716846, '2021-10-28 15:24:02', '2021-10-28 15:24:02'),
('Gresik-Timika', 'Kabupaten Gresik', 'Timika', 'Maluku, Maluku Utara, Irian Jaya, Irian Barat', 641159, '2021-10-28 15:24:02', '2021-10-28 15:24:02'),
('Gresik-Toli-Toli', 'Kabupaten Gresik', 'Kabupaten Toli-Toli', 'Sulawesi', 561064, '2021-10-28 15:24:02', '2021-10-28 15:24:02'),
('Gresik-Waikabubak / Sumba Barat', 'Kabupaten Gresik', 'Waikabubak / Sumba Barat', 'NTT & NTB', 781364, '2021-10-28 15:24:02', '2021-10-28 15:24:02'),
('Gresik-Waingapu/ Sumba Timur', 'Kabupaten Gresik', 'Waingapu/ Sumba Timur', 'NTT & NTB', 575364, '2021-10-28 15:24:02', '2021-10-28 15:24:02'),
('Makassar-Bitung', 'Kota Makassar', 'Kota Bitung', 'Sulawesi', 396364, '2021-10-28 15:24:02', '2021-10-28 15:24:02'),
('Makassar-Gorontalo', 'Kota Makassar', 'Kbupaten Gorontalo', 'Sulawesi', 428500, '2021-10-28 15:24:02', '2021-10-28 15:24:02'),
('Makassar-Kendari', 'Kota Makassar', 'Kota Kendari', 'Sulawesi', 420000, '2021-10-28 15:24:02', '2021-10-28 15:24:02'),
('Makassar-Manokwari', 'Kota Makassar', 'Kabupaten Manokwari', 'Maluku, Maluku Utara, Irian Jaya, Irian Barat', 698546, '2021-10-28 15:24:02', '2021-10-28 15:24:02'),
('Makassar-Merauke I - Tanah Miring', 'Kota Makassar', 'Merauke I - Tanah Miring', 'Maluku, Maluku Utara, Irian Jaya, Irian Barat', 596591, '2021-10-28 15:24:02', '2021-10-28 15:24:02'),
('Makassar-Merauke II - Kota', 'Kota Makassar', 'Merauke II - Kota', 'Maluku, Maluku Utara, Irian Jaya, Irian Barat', 596591, '2021-10-28 15:24:02', '2021-10-28 15:24:02'),
('Makassar-Nabire', 'Kota Makassar', 'Kabupaten Nabire', 'Maluku, Maluku Utara, Irian Jaya, Irian Barat', 658682, '2021-10-28 15:24:02', '2021-10-28 15:24:02'),
('Makassar-Palu', 'Kota Makassar', 'Kota Palu', 'Sulawesi', 436364, '2021-10-28 15:24:02', '2021-10-28 15:24:02'),
('Makassar-Sorong', 'Kota Makassar', 'Kabupaten Sorong', 'Maluku, Maluku Utara, Irian Jaya, Irian Barat', 631982, '2021-10-28 15:24:02', '2021-10-28 15:24:02'),
('Makassar-Ternate', 'Kota Makassar', 'Kota Ternate', 'Maluku, Maluku Utara, Irian Jaya, Irian Barat', 633400, '2021-10-28 15:24:02', '2021-10-28 15:24:02'),
('Makassar-Timika', 'Kota Makassar', 'Timika', 'Maluku, Maluku Utara, Irian Jaya, Irian Barat', 540682, '2021-10-28 15:24:02', '2021-10-28 15:24:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jalur_generalcargo`
--

CREATE TABLE `jalur_generalcargo` (
  `kode_rute` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `asal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tujuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wilayah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tarif` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jalur_generalcargo`
--

INSERT INTO `jalur_generalcargo` (`kode_rute`, `asal`, `tujuan`, `wilayah`, `tarif`, `created_at`, `updated_at`) VALUES
('Gresik-Buru', 'Gresik', 'Kabupaten Buru', 'Maluku', 1039546, '2021-10-30 22:47:57', '2021-10-30 22:47:57'),
('Gresik-Malteg', 'Gresik', 'Kabupaten Maluku Tengah', 'Maluku', 956746, '2021-10-30 22:47:57', '2021-10-30 22:47:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jalur_kapallayar`
--

CREATE TABLE `jalur_kapallayar` (
  `kode_rute` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `asal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tujuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wilayah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tarif` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jalur_kapallayar`
--

INSERT INTO `jalur_kapallayar` (`kode_rute`, `asal`, `tujuan`, `wilayah`, `tarif`, `created_at`, `updated_at`) VALUES
('Gresik-Gorontalo', 'Gresik', 'Gorontalo', 'Kalimantan Tengah', '400000', '2021-10-26 15:22:22', '2021-10-26 15:22:22'),
('Lampung-Belitung', 'Lampung', 'Belitung', '-', '323000', '2021-10-09 22:13:26', '2021-10-26 15:14:04'),
('Lampung-Pangkal Pinang', 'Lampung', 'Pangkal Pinang', '-', '313.000', NULL, '2021-10-09 22:12:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jalur_taripfranco`
--

CREATE TABLE `jalur_taripfranco` (
  `kode_rute` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `asal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tujuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wilayah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tarif` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jalur_taripfranco`
--

INSERT INTO `jalur_taripfranco` (`kode_rute`, `asal`, `tujuan`, `wilayah`, `tarif`, `created_at`, `updated_at`) VALUES
('Gresik-Bitung', 'GP Aceh Tamiang (Langsa)', 'Gresik', 'Sulawesi', '111111', '2021-10-25 01:46:44', '2021-10-25 18:12:47'),
('Gresik-Gorontalo', 'GP Aceh Tamiang (Langsa)', 'Gorontalo', 'Kalimantan Tengah', '400000', '2021-10-26 15:55:32', '2021-10-26 15:55:32'),
('GPAceh-Gresik', 'GP Aceh Tamiang (Langsa)', 'Kabupaten Gresik', 'Jawa Timur', '400000', '2021-10-26 19:15:59', '2021-10-26 19:15:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jalur_voyage`
--

CREATE TABLE `jalur_voyage` (
  `kode_rute` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `asal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tujuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tarif_lebihdari_10000ton` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tarif_kurangdari_10000ton` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jalur_voyage`
--

INSERT INTO `jalur_voyage` (`kode_rute`, `asal`, `tujuan`, `tarif_lebihdari_10000ton`, `tarif_kurangdari_10000ton`, `created_at`, `updated_at`) VALUES
('Gresik-Banjarmasin', 'Kabupaten Gresik', ' Kota Banjarmasin ', '205000', '0', '2021-10-27 16:01:23', '2021-10-27 16:01:23'),
('Gresik-Bengkulu', 'Kabupaten Gresik', 'Kota Bengkulu', '287000', '0', '2021-10-27 16:01:23', '2021-10-27 16:01:23'),
('Gresik-Bima', 'Kabupaten Gresik', ' Kota Bima ', '268000', '0', '2021-10-27 16:01:23', '2021-10-27 16:01:23'),
('Gresik-Bitung', 'Kabupaten Gresik', 'Kota Bitung', '330000', '0', '2021-10-27 16:01:23', '2021-10-27 16:01:23'),
('Gresik-Dumai', 'Kabupaten Gresik', ' Kota Dumai ', '207350', '0', '2021-10-27 16:01:23', '2021-10-27 16:01:23'),
('Gresik-Ende', 'Kabupaten Gresik', 'Kabupaten Ende ', '0', '0', '2021-10-27 16:01:23', '2021-10-27 16:01:23'),
('Gresik-Kendari', 'Kabupaten Gresik', 'Kota Kendari', '345000', '0', '2021-10-27 16:01:23', '2021-10-27 16:01:23'),
('Gresik-Ketapang', 'Kabupaten Gresik', 'Kabupaten Ketapang', '356500', '0', '2021-10-27 16:01:23', '2021-10-27 16:01:23'),
('Gresik-KotawaringinBrt', 'Kabupaten Gresik', 'Kabupaten Kotawaringin Barat', '315000', '0', '2021-10-27 16:01:23', '2021-10-27 16:01:23'),
('Gresik-Lampung', 'Kabupaten Gresik', 'Kota Bandar Lampung', '0', '154500', '2021-10-27 16:01:23', '2021-10-27 16:01:23'),
('Gresik-Lampung1', 'Kabupaten Gresik', 'Kota Bandar Lampung', '188000', '0', '2021-10-27 16:01:23', '2021-10-27 16:01:23'),
('Gresik-Lhokseumawe', 'Kabupaten Gresik', 'Kota Lhokseumawe', '334000', '0', '2021-10-27 16:01:23', '2021-10-27 16:01:23'),
('Gresik-LombokBrt', 'Kabupaten Gresik', 'Kabupaten Lombok Barat', '196500', '0', '2021-10-27 16:01:23', '2021-10-27 16:01:23'),
('Gresik-Makassar', 'Kabupaten Gresik', ' Kota Makassar ', '0', '162500', '2021-10-27 16:01:23', '2021-10-27 16:01:23'),
('Gresik-Makassar1', 'Kabupaten Gresik', ' Kota Makassar ', '0', '166000', '2021-10-27 16:01:23', '2021-10-27 16:01:23'),
('Gresik-ManggaraiBrt', 'Kabupaten Gresik', 'Kabupaten Manggarai Barat', '360000', '0', '2021-10-27 16:01:23', '2021-10-27 16:01:23'),
('Gresik-Medan', 'Kabupaten Gresik', 'Kota Medan', '0', '198500', '2021-10-27 16:01:23', '2021-10-27 16:01:23'),
('Gresik-Medan1', 'Kabupaten Gresik', 'Kota Medan', '263000', '0', '2021-10-27 16:01:23', '2021-10-27 16:01:23'),
('Gresik-Padang', 'Kabupaten Gresik', 'Kota Padang', '0', '253300', '2021-10-27 16:01:23', '2021-10-27 16:01:23'),
('Gresik-Padang1', 'Kabupaten Gresik', 'Kota Padang', '283000', '0', '2021-10-27 16:01:23', '2021-10-27 16:01:23'),
('Gresik-PangkalPinang', 'Kabupaten Gresik', 'Kota Pangkal Pinang', '300000', '0', '2021-10-27 16:01:23', '2021-10-27 16:01:23'),
('Gresik-ParePare', 'Kabupaten Gresik', 'Kota ParePare ', '223000', '0', '2021-10-27 16:01:23', '2021-10-27 16:01:23'),
('Gresik-Pontianak', 'Kabupaten Gresik', 'Kota Pontianak', '247875', '0', '2021-10-27 16:01:23', '2021-10-27 16:01:23'),
('Gresik-Samarinda', 'Kabupaten Gresik', 'Kota Samarinda', '255000', '0', '2021-10-27 16:01:23', '2021-10-27 16:01:23'),
('Gresik-Sumbawa', 'Kabupaten Gresik', 'Kabupaten Sumbawa ', '224495', '0', '2021-10-27 16:01:23', '2021-10-27 16:01:23'),
('Singkawang-Banjarmasin', 'Kota Singkawang', 'Kota Banjarmasin', '700000', '0', '2021-10-27 16:01:23', '2021-10-27 16:01:23'),
('Singkawang-Gresik', 'Kota Singkawang', 'Kabupaten Gresik', '390000', '0', '2021-10-27 16:01:23', '2021-10-27 16:01:23'),
('Singkawang-Lombok', 'Kota Singkawang', 'Kabupaten Lombok', '588000', '0', '2021-10-27 16:01:23', '2021-10-27 16:01:23'),
('Singkawang-Makassar', 'Kota Singkawang', 'Kota Makassar', '613000', '0', '2021-10-27 16:01:23', '2021-10-27 16:01:23'),
('Singkawang-PangkalPinang', 'Kota Singkawang', 'Kota Pangkal Pinang', '438000', '0', '2021-10-27 16:01:23', '2021-10-27 16:01:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jasacontainer`
--

CREATE TABLE `jasacontainer` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_rutes` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_vendor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_pemenang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kontrak` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_kontrak` date NOT NULL,
  `mulai` date NOT NULL,
  `akhir` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jasacontainer`
--

INSERT INTO `jasacontainer` (`id`, `kode_rutes`, `nama_vendor`, `status_pemenang`, `kontrak`, `tgl_kontrak`, `mulai`, `akhir`, `created_at`, `updated_at`) VALUES
(1, 'Gresik-Gorontalo', 'PT ANUGERAH TRANS MARITIM', 'Pemenang I', '3032/B/HK.01.02/35/SP/2019', '2021-09-29', '2021-10-08', '2021-10-30', '2021-10-05 21:00:38', '2021-10-30 22:26:19'),
(3, 'Gresik-Gorontalo', 'PT KRIS CARGO BAHTERA', 'Pemenang III', '1404/HK.01.02/35/SP/2019', '2021-09-26', '2021-10-29', '2022-06-11', '2021-10-25 23:46:34', '2021-10-30 22:26:26'),
(4, 'gresik-kendari1', 'KRIS CARGO BAHTERA, PT', 'Pemenang I', '3032/B/HK.01.02/35/SP/2019', '2021-09-27', '2021-10-27', '2022-02-05', '2021-10-26 19:11:39', '2021-10-26 19:11:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jasageneralcargo`
--

CREATE TABLE `jasageneralcargo` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_rutes` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_vendor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_pemenang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kontrak` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_kontrak` date NOT NULL,
  `mulai` date NOT NULL,
  `akhir` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jasageneralcargo`
--

INSERT INTO `jasageneralcargo` (`id`, `kode_rutes`, `nama_vendor`, `status_pemenang`, `kontrak`, `tgl_kontrak`, `mulai`, `akhir`, `created_at`, `updated_at`) VALUES
(4, 'Gresik-Maluku', 'PT. CITRA BORNEO MANDIRI', 'Pemenang I', '3032/B/HK.01.02/35/SP/2019', '2021-10-05', '2021-10-22', '2021-11-06', '2021-10-07 00:36:15', '2021-10-07 00:36:15'),
(5, 'Gresik-Malteg', 'PT Berkah Samudra Line', 'Pemenang III', '3032/B/HK.01.02/35/SP/2019', '2021-09-26', '2021-10-20', '2021-11-06', '2021-10-26 00:32:35', '2021-10-31 01:05:54'),
(6, 'Gresik-Malteg', 'CITRA BORNEO MANDIRI, PT', 'Pemenang II', '11111111111111', '2021-10-10', '2021-10-28', '2021-11-06', '2021-10-27 14:59:34', '2021-10-30 21:11:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jasakapallayar`
--

CREATE TABLE `jasakapallayar` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_rutes` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_vendor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_pemenang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kontrak` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_kontrak` date NOT NULL,
  `mulai` date NOT NULL,
  `akhir` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jasakapallayar`
--

INSERT INTO `jasakapallayar` (`id`, `kode_rutes`, `nama_vendor`, `status_pemenang`, `kontrak`, `tgl_kontrak`, `mulai`, `akhir`, `created_at`, `updated_at`) VALUES
(1, 'Lampung-Pangkal Pinang', 'PELAYARAN RAKYAT BONE JAYA BARU, PT', 'Pemenang I', '1111111111111', '2021-09-27', '2021-10-10', '2021-11-06', '2021-10-09 21:12:56', '2021-10-31 04:39:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jasatimecharter`
--

CREATE TABLE `jasatimecharter` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_angkutan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas_kapasitas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_vendor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tarif` int(11) NOT NULL,
  `kapasitas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kontrak` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_kontrak` date NOT NULL,
  `mulai` date NOT NULL,
  `akhir` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jasatimecharter`
--

INSERT INTO `jasatimecharter` (`id`, `nama_angkutan`, `kelas_kapasitas`, `nama_vendor`, `tarif`, `kapasitas`, `kontrak`, `tgl_kontrak`, `mulai`, `akhir`, `created_at`, `updated_at`) VALUES
(2, 'KM Anugerah Buana VI', '3000-3500', 'PT Linc Bintang Line', 123, '3400', '3032/B/HK.01.02/35/SP/2019', '2021-09-28', '2021-10-07', '2021-11-02', '2021-10-04 19:38:14', '2021-10-31 01:08:38'),
(3, '1', '3000-3500', 'PT Kapuas Mekar Jaya', 90, '3400', '3032/B/HK.01.02/35/SP/2019', '2021-10-01', '2021-10-01', '2021-10-21', '2021-10-04 19:43:10', '2021-10-04 20:16:27'),
(4, '1', '3000-3500', 'PT Kapuas Mekar Jaya', 55555, '3400', '3032/B/HK.01.02/35/SP/2019', '2021-10-07', '2021-10-30', '2021-10-10', '2021-10-04 19:43:37', '2021-10-04 19:43:37'),
(26, '1', '3000-3500', 'PT Kapuas Mekar Jaya', 518415000, '3400', '1404/HK.01.02/35/SP/2019', '2019-07-31', '2019-08-01', '2021-07-01', '2021-10-04 23:00:28', '2021-10-04 23:00:28'),
(27, 'KM Anugerah Buana VI', '3000-3500', 'PT Linc Bintang Line', 222222, '3400', '3032/B/HK.01.02/35/SP/2019', '2021-10-06', '2021-10-16', '2021-11-03', '2021-10-04 23:23:55', '2021-10-30 14:55:31'),
(28, 'KM Anugerah Buana VI', '3000-3500', 'PT Kapuas Mekar Jaya', 400000, '3400', '1010101', '2021-10-04', '2021-10-15', '2021-10-28', '2021-10-26 01:27:15', '2021-10-30 14:56:09'),
(30, 'KM Anugerah Buana VI', '3000-3500', 'PT Linc Bintang Line', 400000, '3400', '1404/HK.01.02/35/SP/2019', '2021-09-26', '2021-11-06', '2023-03-11', '2021-10-26 18:59:28', '2021-10-26 18:59:28'),
(34, 'KM Anugerah Buana VI', '3000-3500', 'PT Kapuas Mekar Jaya', 400000, '1111111', '3032/B/HK.01.02/35/SP/2019', '2021-10-31', '2021-11-01', '2021-10-24', '2021-10-31 20:34:46', '2021-10-31 20:34:46'),
(35, 'KM Anugerah Buana VI', '3000-3500', 'PT Kapuas Mekar Jaya', 400000, '3400', '22222222', '2021-11-01', '2021-11-10', '2021-10-17', '2021-10-31 20:50:20', '2021-10-31 20:50:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jasavoyagecharter`
--

CREATE TABLE `jasavoyagecharter` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_rutes` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_vendor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_pemenang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kontrak` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_kontrak` date NOT NULL,
  `mulai` date NOT NULL,
  `akhir` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jasavoyagecharter`
--

INSERT INTO `jasavoyagecharter` (`id`, `kode_rutes`, `nama_vendor`, `status_pemenang`, `kontrak`, `tgl_kontrak`, `mulai`, `akhir`, `created_at`, `updated_at`) VALUES
(36, 'Gresik-Lhokseumawe', 'PT  Mandiri Sejahtera Abadi Line', 'Pemenang II', '1111111111111', '2021-10-03', '2021-10-29', '2023-02-11', '2021-10-27 14:52:00', '2021-10-30 16:17:40'),
(45, 'Gresik-Banjarmasin', 'PT Berkah Samudra Line', 'Pemenang I', '1111111111111', '2021-10-03', '2021-10-28', '2021-10-28', '2021-10-27 15:12:05', '2021-10-30 16:18:53'),
(46, 'Gresik-Bengkulu', 'PT  Intan Borneo Wisesa', 'Pemenang I', '090909090', '2021-09-27', '2021-10-01', '2021-10-25', '2021-10-30 16:17:10', '2021-10-30 16:17:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kabupaten`
--

CREATE TABLE `kabupaten` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kabupaten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provinsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kabupaten`
--

INSERT INTO `kabupaten` (`id`, `nama_kabupaten`, `provinsi`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'Kabupaten Aceh Barat', 'Aceh', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(2, 'Kabupaten Aceh Barat Daya', 'Aceh', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(3, 'Kabupaten Aceh Besar', 'Aceh', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(4, 'Kabupaten Aceh Jaya', 'Aceh', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(5, 'Kabupaten Aceh Selatan', 'Aceh', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(6, 'Kabupaten Aceh Singkil', 'Aceh', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(7, 'Kabupaten Aceh Tamiang', 'Aceh', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(8, 'Kabupaten Aceh Tengah', 'Aceh', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(9, 'Kabupaten Aceh Tenggara', 'Aceh', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(10, 'Kabupaten Aceh Timur', 'Aceh', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(11, 'Kabupaten Aceh Utara', 'Aceh', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(12, 'Kabupaten Bener Meriah', 'Aceh', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(13, 'Kabupaten Bireuen', 'Aceh', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(14, 'Kabupaten Gayo Lues', 'Aceh', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(15, 'Kabupaten Nagan Raya', 'Aceh', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(16, 'Kabupaten Pidie', 'Aceh', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(17, 'Kabupaten Pidie Jaya', 'Aceh', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(18, 'Kabupaten Simeulue', 'Aceh', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(19, 'Kota Banda Aceh', 'Aceh', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(20, 'Kota Langsa', 'Aceh', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(21, 'Kota Lhokseumawe', 'Aceh', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(22, 'Kota Sabang', 'Aceh', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(23, 'Kota Subulussalam', 'Aceh', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(24, 'Kabupaten Asahan', 'Sumatra Utara', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(25, 'Kabupaten Batu Bara', 'Sumatra Utara', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(26, 'Kabupaten Dairi', 'Sumatra Utara', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(27, 'Kabupaten Deli Serdang', 'Sumatra Utara', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(28, 'Kabupaten Humbang Hasundutan', 'Sumatra Utara', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(29, 'Kabupaten Karo', 'Sumatra Utara', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(30, 'Kabupaten Labuhanbatu', 'Sumatra Utara', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(31, 'Kabupaten Labuhanbatu Selatan', 'Sumatra Utara', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(32, 'Kabupaten Labuhanbatu Utara', 'Sumatra Utara', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(33, 'Kabupaten Langkat', 'Sumatra Utara', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(34, 'Kabupaten Mandailing Natal', 'Sumatra Utara', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(35, 'Kabupaten Nias', 'Sumatra Utara', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(36, 'Kabupaten Nias Barat', 'Sumatra Utara', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(37, 'Kabupaten Nias Selatan', 'Sumatra Utara', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(38, 'Kabupaten Nias Utara', 'Sumatra Utara', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(39, 'Kabupaten Padang Lawas', 'Sumatra Utara', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(40, 'Kabupaten Padang Lawas Utara', 'Sumatra Utara', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(41, 'Kabupaten Pakpak Bharat', 'Sumatra Utara', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(42, 'Kabupaten Samosir', 'Sumatra Utara', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(43, 'Kabupaten Serdang Bedagai', 'Sumatra Utara', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(44, 'Kabupaten Simalungun', 'Sumatra Utara', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(45, 'Kabupaten Tapanuli Selatan', 'Sumatra Utara', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(46, 'Kabupaten Tapanuli Tengah', 'Sumatra Utara', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(47, 'Kabupaten Tapanuli Utara', 'Sumatra Utara', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(48, 'Kabupaten Toba Samosir', 'Sumatra Utara', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(49, 'Kota Binjai', 'Sumatra Utara', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(50, 'Kota Gunungsitoli', 'Sumatra Utara', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(51, 'Kota Medan', 'Sumatra Utara', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(52, 'Kota Padangsidempuan', 'Sumatra Utara', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(53, 'Kota Pematangsiantar', 'Sumatra Utara', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(54, 'Kota Sibolga', 'Sumatra Utara', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(55, 'Kota Tanjungbalai', 'Sumatra Utara', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(56, 'Kota Tebing Tinggi', 'Sumatra Utara', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(57, 'Kabupaten Agam', 'Sumatra Barat', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(58, 'Kabupaten Dharmasraya', 'Sumatra Barat', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(59, 'Kabupaten Kepulauan Mentawai', 'Sumatra Barat', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(60, 'Kabupaten Lima Puluh Kota', 'Sumatra Barat', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(61, 'Kabupaten Padang Pariaman', 'Sumatra Barat', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(62, 'Kabupaten Pasaman', 'Sumatra Barat', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(63, 'Kabupaten Pasaman Barat', 'Sumatra Barat', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(64, 'Kabupaten Pesisir Selatan', 'Sumatra Barat', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(65, 'Kabupaten Sijunjung', 'Sumatra Barat', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(66, 'Kabupaten Solok', 'Sumatra Barat', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(67, 'Kabupaten Solok Selatan', 'Sumatra Barat', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(68, 'Kabupaten Tanah Datar', 'Sumatra Barat', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(69, 'Kota Bukittinggi', 'Sumatra Barat', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(70, 'Kota Padang', 'Sumatra Barat', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(71, 'Kota Padangpanjang', 'Sumatra Barat', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(72, 'Kota Pariaman', 'Sumatra Barat', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(73, 'Kota Payakumbuh', 'Sumatra Barat', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(74, 'Kota Sawahlunto', 'Sumatra Barat', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(75, 'Kota Solok', 'Sumatra Barat', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(76, 'Kabupaten Bengkalis', 'Riau', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(77, 'Kabupaten Indragiri Hilir', 'Riau', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(78, 'Kabupaten Indragiri Hulu', 'Riau', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(79, 'Kabupaten Kampar', 'Riau', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(80, 'Kabupaten Kepulauan Meranti', 'Riau', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(81, 'Kabupaten Kuantan Singingi', 'Riau', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(82, 'Kabupaten Pelalawan', 'Riau', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(83, 'Kabupaten Rokan Hilir', 'Riau', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(84, 'Kabupaten Rokan Hulu', 'Riau', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(85, 'Kabupaten Siak', 'Riau', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(86, 'Kota Dumai', 'Riau', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(87, 'Kota Pekanbaru', 'Riau', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(88, 'Kabupaten Bintan', 'Kepulauan Riau', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(89, 'Kabupaten Karimun', 'Kepulauan Riau', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(90, 'Kabupaten Kepulauan Anambas', 'Kepulauan Riau', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(91, 'Kabupaten Lingga', 'Kepulauan Riau', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(92, 'Kabupaten Natuna', 'Kepulauan Riau', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(93, 'Kota Batam', 'Kepulauan Riau', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(94, 'Kota Tanjung Pinang', 'Kepulauan Riau', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(95, 'Kabupaten Batanghari', 'Jambi', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(96, 'Kabupaten Bungo', 'Jambi', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(97, 'Kabupaten Kerinci', 'Jambi', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(98, 'Kabupaten Merangin', 'Jambi', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(99, 'Kabupaten Muaro Jambi', 'Jambi', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(100, 'Kabupaten Sarolangun', 'Jambi', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(101, 'Kabupaten Tanjung Jabung Barat', 'Jambi', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(102, 'Kabupaten Tanjung Jabung Timur', 'Jambi', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(103, 'Kabupaten Tebo', 'Jambi', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(104, 'Kota Jambi', 'Jambi', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(105, 'Kota Sungaipenuh', 'Jambi', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(106, 'Kabupaten Bengkulu Selatan', 'Bengkulu', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(107, 'Kabupaten Bengkulu Tengah', 'Bengkulu', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(108, 'Kabupaten Bengkulu Utara', 'Bengkulu', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(109, 'Kabupaten Kaur', 'Bengkulu', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(110, 'Kabupaten Kepahiang', 'Bengkulu', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(111, 'Kabupaten Lebong', 'Bengkulu', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(112, 'Kabupaten Mukomuko', 'Bengkulu', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(113, 'Kabupaten Rejang Lebong', 'Bengkulu', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(114, 'Kabupaten Seluma', 'Bengkulu', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(115, 'Kota Bengkulu', 'Bengkulu', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(116, 'Kabupaten Banyuasin', 'Sumatera Selatan', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(117, 'Kabupaten Empat Lawang', 'Sumatera Selatan', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(118, 'Kabupaten Lahat', 'Sumatera Selatan', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(119, 'Kabupaten Muara Enim', 'Sumatera Selatan', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(120, 'Kabupaten Musi Banyuasin', 'Sumatera Selatan', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(121, 'Kabupaten Musi Rawas', 'Sumatera Selatan', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(122, 'Kabupaten Musi Rawas Utara', 'Sumatera Selatan', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(123, 'Kabupaten Ogan Ilir', 'Sumatera Selatan', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(124, 'Kabupaten Ogan Komering Ilir', 'Sumatera Selatan', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(125, 'Kabupaten Ogan Komering Ulu', 'Sumatera Selatan', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(126, 'Kabupaten Ogan Komering Ulu Selatan', 'Sumatera Selatan', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(127, 'Kabupaten Ogan Komering Ulu Timur', 'Sumatera Selatan', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(128, 'Kabupaten Penukal Abab Lematang Ilir', 'Sumatera Selatan', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(129, 'Kota Lubuklinggau', 'Sumatera Selatan', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(130, 'Kota Pagar Alam', 'Sumatera Selatan', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(131, 'Kota Palembang', 'Sumatera Selatan', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(132, 'Kota Prabumulih', 'Sumatera Selatan', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(133, 'Kabupaten Bangka', 'Kepulauan Bangka Belitung', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(134, 'Kabupaten Bangka Barat', 'Kepulauan Bangka Belitung', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(135, 'Kabupaten Bangka Selatan', 'Kepulauan Bangka Belitung', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(136, 'Kabupaten Bangka Tengah', 'Kepulauan Bangka Belitung', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(137, 'Kabupaten Belitung', 'Kepulauan Bangka Belitung', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(138, 'Kabupaten Belitung Timur', 'Kepulauan Bangka Belitung', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(139, 'Kota Pangkal Pinang', 'Kepulauan Bangka Belitung', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(140, 'Kabupaten Lampung Barat', 'Lampung', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(141, 'Kabupaten Lampung Selatan', 'Lampung', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(142, 'Kabupaten Lampung Tengah', 'Lampung', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(143, 'Kabupaten Lampung Timur', 'Lampung', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(144, 'Kabupaten Lampung Utara', 'Lampung', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(145, 'Kabupaten Mesuji', 'Lampung', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(146, 'Kabupaten Pesawaran', 'Lampung', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(147, 'Kabupaten Pesisir Barat', 'Lampung', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(148, 'Kabupaten Pringsewu', 'Lampung', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(149, 'Kabupaten Tanggamus', 'Lampung', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(150, 'Kabupaten Tulang Bawang', 'Lampung', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(151, 'Kabupaten Tulang Bawang Barat', 'Lampung', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(152, 'Kabupaten Way Kanan', 'Lampung', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(153, 'Kota Bandar Lampung', 'Lampung', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(154, 'Kota Metro', 'Lampung', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(155, 'Kabupaten Lebak', 'Banten', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(156, 'Kabupaten Pandeglang', 'Banten', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(157, 'Kabupaten Serang', 'Banten', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(158, 'Kabupaten Tangerang', 'Banten', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(159, 'Kota Cilegon', 'Banten', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(160, 'Kota Serang', 'Banten', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(161, 'Kota Tangerang', 'Banten', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(162, 'Kota Tangerang Selatan', 'Banten', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(163, 'Kabupaten Bandung', 'Jawa Barat', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(164, 'Kabupaten Bandung Barat', 'Jawa Barat', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(165, 'Kabupaten Bekasi', 'Jawa Barat', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(166, 'Kabupaten Bogor', 'Jawa Barat', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(167, 'Kabupaten Ciamis', 'Jawa Barat', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(168, 'Kabupaten Cianjur', 'Jawa Barat', '-', '2021-10-26 18:45:17', '2021-10-26 18:45:17'),
(169, 'Kabupaten Cirebon', 'Jawa Barat', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(170, 'Kabupaten Garut', 'Jawa Barat', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(171, 'Kabupaten Indramayu', 'Jawa Barat', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(172, 'Kabupaten Karawang', 'Jawa Barat', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(173, 'Kabupaten Kuningan', 'Jawa Barat', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(174, 'Kabupaten Majalengka', 'Jawa Barat', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(175, 'Kabupaten Pangandaran', 'Jawa Barat', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(176, 'Kabupaten Purwakarta', 'Jawa Barat', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(177, 'Kabupaten Subang', 'Jawa Barat', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(178, 'Kabupaten Sukabumi', 'Jawa Barat', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(179, 'Kabupaten Sumedang', 'Jawa Barat', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(180, 'Kabupaten Tasikmalaya', 'Jawa Barat', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(181, 'Kota Bandung', 'Jawa Barat', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(182, 'Kota Banjar', 'Jawa Barat', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(183, 'Kota Bekasi', 'Jawa Barat', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(184, 'Kota Bogor', 'Jawa Barat', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(185, 'Kota Cimahi', 'Jawa Barat', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(186, 'Kota Cirebon', 'Jawa Barat', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(187, 'Kota Depok', 'Jawa Barat', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(188, 'Kota Sukabumi', 'Jawa Barat', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(189, 'Kota Tasikmalaya', 'Jawa Barat', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(190, 'Kabupaten Kepulauan Seribu', 'Jakarta', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(191, 'Kota Jakarta Barat', 'Jakarta', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(192, 'Kota Jakarta Pusat', 'Jakarta', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(193, 'Kota Jakarta Selatan', 'Jakarta', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(194, 'Kota Jakarta Timur', 'Jakarta', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(195, 'Kota Jakarta Utara', 'Jakarta', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(196, 'Kabupaten Banjarnegara', 'Jawa Tengah', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(197, 'Kabupaten Banyumas', 'Jawa Tengah', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(198, 'Kabupaten Batang', 'Jawa Tengah', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(199, 'Kabupaten Blora', 'Jawa Tengah', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(200, 'Kabupaten Boyolali', 'Jawa Tengah', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(201, 'Kabupaten Brebes', 'Jawa Tengah', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(202, 'Kabupaten Cilacap', 'Jawa Tengah', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(203, 'Kabupaten Demak', 'Jawa Tengah', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(204, 'Kabupaten Grobogan', 'Jawa Tengah', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(205, 'Kabupaten Jepara', 'Jawa Tengah', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(206, 'Kabupaten Karanganyar', 'Jawa Tengah', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(207, 'Kabupaten Kebumen', 'Jawa Tengah', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(208, 'Kabupaten Kendal', 'Jawa Tengah', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(209, 'Kabupaten Klaten', 'Jawa Tengah', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(210, 'Kabupaten Kudus', 'Jawa Tengah', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(211, 'Kabupaten Magelang', 'Jawa Tengah', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(212, 'Kabupaten Pati', 'Jawa Tengah', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(213, 'Kabupaten Pekalongan', 'Jawa Tengah', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(214, 'Kabupaten Pemalang', 'Jawa Tengah', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(215, 'Kabupaten Purbalingga', 'Jawa Tengah', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(216, 'Kabupaten Purworejo', 'Jawa Tengah', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(217, 'Kabupaten Rembang', 'Jawa Tengah', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(218, 'Kabupaten Semarang', 'Jawa Tengah', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(219, 'Kabupaten Sragen', 'Jawa Tengah', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(220, 'Kabupaten Sukoharjo', 'Jawa Tengah', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(221, 'Kabupaten Tegal', 'Jawa Tengah', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(222, 'Kabupaten Temanggung', 'Jawa Tengah', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(223, 'Kabupaten Wonogiri', 'Jawa Tengah', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(224, 'Kabupaten Wonosobo', 'Jawa Tengah', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(225, 'Kota Magelang', 'Jawa Tengah', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(226, 'Kota Pekalongan', 'Jawa Tengah', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(227, 'Kota Salatiga', 'Jawa Tengah', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(228, 'Kota Semarang', 'Jawa Tengah', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(229, 'Kota Surakarta', 'Jawa Tengah', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(230, 'Kota Tegal', 'Jawa Tengah', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(231, 'Kabupaten Bantul', 'Yogyakarta', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(232, 'Kabupaten Gunungkidul', 'Yogyakarta', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(233, 'Kabupaten Kulon Progo', 'Yogyakarta', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(234, 'Kabupaten Sleman', 'Yogyakarta', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(235, 'Kota Yogyakarta', 'Yogyakarta', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(236, 'Kabupaten Bangkalan', 'Jawa Timur', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(237, 'Kabupaten Banyuwangi', 'Jawa Timur', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(238, 'Kabupaten Blitar', 'Jawa Timur', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(239, 'Kabupaten Bojonegoro', 'Jawa Timur', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(240, 'Kabupaten Bondowoso', 'Jawa Timur', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(241, 'Kabupaten Gresik', 'Jawa Timur', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(242, 'Kabupaten Jember', 'Jawa Timur', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(243, 'Kabupaten Jombang', 'Jawa Timur', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(244, 'Kabupaten Kediri', 'Jawa Timur', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(245, 'Kabupaten Lamongan', 'Jawa Timur', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(246, 'Kabupaten Lumajang', 'Jawa Timur', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(247, 'Kabupaten Madiun', 'Jawa Timur', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(248, 'Kabupaten Magetan', 'Jawa Timur', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(249, 'Kabupaten Malang', 'Jawa Timur', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(250, 'Kabupaten Mojokerto', 'Jawa Timur', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(251, 'Kabupaten Nganjuk', 'Jawa Timur', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(252, 'Kabupaten Ngawi', 'Jawa Timur', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(253, 'Kabupaten Pacitan', 'Jawa Timur', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(254, 'Kabupaten Pamekasan', 'Jawa Timur', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(255, 'Kabupaten Pasuruan', 'Jawa Timur', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(256, 'Kabupaten Ponorogo', 'Jawa Timur', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(257, 'Kabupaten Probolinggo', 'Jawa Timur', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(258, 'Kabupaten Sampang', 'Jawa Timur', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(259, 'Kabupaten Sidoarjo', 'Jawa Timur', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(260, 'Kabupaten Situbondo', 'Jawa Timur', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(261, 'Kabupaten Sumenep', 'Jawa Timur', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(262, 'Kabupaten Trenggalek', 'Jawa Timur', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(263, 'Kabupaten Tuban', 'Jawa Timur', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(264, 'Kabupaten Tulungagung', 'Jawa Timur', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(265, 'Kota Batu', 'Jawa Timur', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(266, 'Kota Blitar', 'Jawa Timur', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(267, 'Kota Kediri', 'Jawa Timur', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(268, 'Kota Madiun', 'Jawa Timur', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(269, 'Kota Malang', 'Jawa Timur', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(270, 'Kota Mojokerto', 'Jawa Timur', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(271, 'Kota Pasuruan', 'Jawa Timur', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(272, 'Kota Probolinggo', 'Jawa Timur', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(273, 'Kota Surabaya', 'Jawa Timur', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(274, 'Kabupaten Badung', 'Bali', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(275, 'Kabupaten Bangli', 'Bali', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(276, 'Kabupaten Buleleng', 'Bali', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(277, 'Kabupaten Gianyar', 'Bali', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(278, 'Kabupaten Jembrana', 'Bali', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(279, 'Kabupaten Karangasem', 'Bali', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(280, 'Kabupaten Klungkung', 'Bali', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(281, 'Kabupaten Tabanan', 'Bali', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(282, 'Kota Denpasar', 'Bali', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(283, 'Kabupaten Bima', 'Nusa Tenggara Barat', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(284, 'Kabupaten Dompu', 'Nusa Tenggara Barat', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(285, 'Kabupaten Lombok Barat', 'Nusa Tenggara Barat', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(286, 'Kabupaten Lombok Tengah', 'Nusa Tenggara Barat', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(287, 'Kabupaten Lombok Timur', 'Nusa Tenggara Barat', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(288, 'Kabupaten Lombok Utara', 'Nusa Tenggara Barat', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(289, 'Kabupaten Sumbawa', 'Nusa Tenggara Barat', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(290, 'Kabupaten Sumbawa Barat', 'Nusa Tenggara Barat', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(291, 'Kota Bima', 'Nusa Tenggara Barat', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(292, 'Kota Mataram', 'Nusa Tenggara Barat', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(293, 'Kabupaten Alor', 'Nusa Tenggara Timur', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(294, 'Kabupaten Belu', 'Nusa Tenggara Timur', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(295, 'Kabupaten Ende', 'Nusa Tenggara Timur', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(296, 'Kabupaten Flores Timur', 'Nusa Tenggara Timur', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(297, 'Kabupaten Kupang', 'Nusa Tenggara Timur', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(298, 'Kabupaten Lembata', 'Nusa Tenggara Timur', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(299, 'Kabupaten Malaka', 'Nusa Tenggara Timur', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(300, 'Kabupaten Manggarai', 'Nusa Tenggara Timur', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(301, 'Kabupaten Manggarai Barat', 'Nusa Tenggara Timur', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(302, 'Kabupaten Manggarai Timur', 'Nusa Tenggara Timur', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(303, 'Kabupaten Nagekeo', 'Nusa Tenggara Timur', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(304, 'Kabupaten Ngada', 'Nusa Tenggara Timur', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(305, 'Kabupaten Rote Ndao', 'Nusa Tenggara Timur', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(306, 'Kabupaten Sabu Raijua', 'Nusa Tenggara Timur', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(307, 'Kabupaten Sikka', 'Nusa Tenggara Timur', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(308, 'Kabupaten Sumba Barat', 'Nusa Tenggara Timur', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(309, 'Kabupaten Sumba Barat Daya', 'Nusa Tenggara Timur', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(310, 'Kabupaten Sumba Tengah', 'Nusa Tenggara Timur', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(311, 'Kabupaten Sumba Timur', 'Nusa Tenggara Timur', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(312, 'Kabupaten Timor Tengah Selatan', 'Nusa Tenggara Timur', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(313, 'Kabupaten Timor Tengah Utara', 'Nusa Tenggara Timur', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(314, 'Kota Kupang', 'Nusa Tenggara Timur', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(315, 'Kabupaten Bengkayang', 'Kalimantan Barat', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(316, 'Kabupaten Kapuas Hulu', 'Kalimantan Barat', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(317, 'Kabupaten Kayong Utara', 'Kalimantan Barat', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(318, 'Kabupaten Ketapang', 'Kalimantan Barat', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(319, 'Kabupaten Kubu Raya', 'Kalimantan Barat', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(320, 'Kabupaten Landak', 'Kalimantan Barat', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(321, 'Kabupaten Melawi', 'Kalimantan Barat', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(322, 'Kabupaten Mempawah', 'Kalimantan Barat', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(323, 'Kabupaten Sambas', 'Kalimantan Barat', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(324, 'Kabupaten Sanggau', 'Kalimantan Barat', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(325, 'Kabupaten Sekadau', 'Kalimantan Barat', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(326, 'Kabupaten Sintang', 'Kalimantan Barat', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(327, 'Kota Pontianak', 'Kalimantan Barat', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(328, 'Kota Singkawang', 'Kalimantan Barat', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(329, 'Kabupaten Balangan', 'Kalimantan Selatan', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(330, 'Kabupaten Banjar', 'Kalimantan Selatan', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(331, 'Kabupaten Barito Kuala', 'Kalimantan Selatan', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(332, 'Kabupaten Hulu Sungai Selatan', 'Kalimantan Selatan', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(333, 'Kabupaten Hulu Sungai Tengah', 'Kalimantan Selatan', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(334, 'Kabupaten Hulu Sungai Utara', 'Kalimantan Selatan', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(335, 'Kabupaten Kotabaru', 'Kalimantan Selatan', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(336, 'Kabupaten Tabalong', 'Kalimantan Selatan', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(337, 'Kabupaten Tanah Bumbu', 'Kalimantan Selatan', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(338, 'Kabupaten Tanah Laut', 'Kalimantan Selatan', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(339, 'Kabupaten Tapin', 'Kalimantan Selatan', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(340, 'Kota Banjarbaru', 'Kalimantan Selatan', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(341, 'Kota Banjarmasin', 'Kalimantan Selatan', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(342, 'Kabupaten Barito Selatan', 'Kalimantan Tengah', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(343, 'Kabupaten Barito Timur', 'Kalimantan Tengah', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(344, 'Kabupaten Barito Utara', 'Kalimantan Tengah', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(345, 'Kabupaten Gunung Mas', 'Kalimantan Tengah', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(346, 'Kabupaten Kapuas', 'Kalimantan Tengah', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(347, 'Kabupaten Katingan', 'Kalimantan Tengah', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(348, 'Kabupaten Kotawaringin Barat', 'Kalimantan Tengah', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(349, 'Kabupaten Kotawaringin Timur', 'Kalimantan Tengah', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(350, 'Kabupaten Lamandau', 'Kalimantan Tengah', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(351, 'Kabupaten Murung Raya', 'Kalimantan Tengah', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(352, 'Kabupaten Pulang Pisau', 'Kalimantan Tengah', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(353, 'Kabupaten Sukamara', 'Kalimantan Tengah', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(354, 'Kabupaten Seruyan', 'Kalimantan Tengah', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(355, 'Kota Palangka Raya', 'Kalimantan Tengah', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(356, 'Kabupaten Berau', 'Kalimantan Timur', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(357, 'Kabupaten Kutai Barat', 'Kalimantan Timur', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(358, 'Kabupaten Kutai Kartanegara', 'Kalimantan Timur', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(359, 'Kabupaten Kutai Timur', 'Kalimantan Timur', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(360, 'Kabupaten Mahakam Ulu', 'Kalimantan Timur', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(361, 'Kabupaten Paser', 'Kalimantan Timur', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(362, 'Kabupaten Penajam Paser Utara', 'Kalimantan Timur', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(363, 'Kota Balikpapan', 'Kalimantan Timur', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(364, 'Kota Bontang', 'Kalimantan Timur', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(365, 'Kota Samarinda', 'Kalimantan Timur', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(366, 'Kabupaten Bulungan', 'Kalimantan Utara', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(367, 'Kabupaten Malinau', 'Kalimantan Utara', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(368, 'Kabupaten Nunukan', 'Kalimantan Utara', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(369, 'Kabupaten Tana Tidung', 'Kalimantan Utara', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(370, 'Kota Tarakan', 'Kalimantan Utara', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(371, 'Kabupaten Boalemo', 'Gorontalo', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(372, 'Kabupaten Bone Bolango', 'Gorontalo', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(373, 'Kabupaten Gorontalo', 'Gorontalo', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(374, 'Kabupaten Gorontalo Utara', 'Gorontalo', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(375, 'Kabupaten Pohuwato', 'Gorontalo', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(376, 'Kota Gorontalo', 'Gorontalo', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(377, 'Kabupaten Majene', 'Sulawesi Barat', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(378, 'Kabupaten Mamasa', 'Sulawesi Barat', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(379, 'Kabupaten Mamuju', 'Sulawesi Barat', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(380, 'Kabupaten Mamuju Tengah', 'Sulawesi Barat', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(381, 'Kabupaten Pasangkayu', 'Sulawesi Barat', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(382, 'Kabupaten Polewali Mandar', 'Sulawesi Barat', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(383, 'Kabupaten Bantaeng', 'Sulawesi Selatan', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(384, 'Kabupaten Barru', 'Sulawesi Selatan', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(385, 'Kabupaten Bone', 'Sulawesi Selatan', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(386, 'Kabupaten Bulukumba', 'Sulawesi Selatan', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(387, 'Kabupaten Enrekang', 'Sulawesi Selatan', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(388, 'Kabupaten Gowa', 'Sulawesi Selatan', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(389, 'Kabupaten Jeneponto', 'Sulawesi Selatan', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(390, 'Kabupaten Kepulauan Selayar', 'Sulawesi Selatan', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(391, 'Kabupaten Luwu', 'Sulawesi Selatan', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(392, 'Kabupaten Luwu Timur', 'Sulawesi Selatan', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(393, 'Kabupaten Luwu Utara', 'Sulawesi Selatan', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(394, 'Kabupaten Maros', 'Sulawesi Selatan', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(395, 'Kabupaten Pangkajene dan Kepulauan', 'Sulawesi Selatan', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(396, 'Kabupaten Pinrang', 'Sulawesi Selatan', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(397, 'Kabupaten Sidenreng Rappang', 'Sulawesi Selatan', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(398, 'Kabupaten Sinjai', 'Sulawesi Selatan', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(399, 'Kabupaten Soppeng', 'Sulawesi Selatan', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(400, 'Kabupaten Takalar', 'Sulawesi Selatan', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(401, 'Kabupaten Tana Toraja', 'Sulawesi Selatan', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(402, 'Kabupaten Toraja Utara', 'Sulawesi Selatan', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(403, 'Kabupaten Wajo', 'Sulawesi Selatan', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(404, 'Kota Makassar', 'Sulawesi Selatan', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(405, 'Kota Palopo', 'Sulawesi Selatan', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(406, 'Kota Parepare', 'Sulawesi Selatan', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(407, 'Kabupaten Bombana', 'Sulawesi Tenggara', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(408, 'Kabupaten Buton', 'Sulawesi Tenggara', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(409, 'Kabupaten Buton Selatan', 'Sulawesi Tenggara', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(410, 'Kabupaten Buton Tengah', 'Sulawesi Tenggara', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(411, 'Kabupaten Buton Utara', 'Sulawesi Tenggara', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(412, 'Kabupaten Kolaka', 'Sulawesi Tenggara', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(413, 'Kabupaten Kolaka Timur', 'Sulawesi Tenggara', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(414, 'Kabupaten Kolaka Utara', 'Sulawesi Tenggara', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(415, 'Kabupaten Konawe', 'Sulawesi Tenggara', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(416, 'Kabupaten Konawe Kepulauan', 'Sulawesi Tenggara', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(417, 'Kabupaten Konawe Selatan', 'Sulawesi Tenggara', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(418, 'Kabupaten Konawe Utara', 'Sulawesi Tenggara', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(419, 'Kabupaten Muna', 'Sulawesi Tenggara', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(420, 'Kabupaten Muna Barat', 'Sulawesi Tenggara', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(421, 'Kabupaten Wakatobi', 'Sulawesi Tenggara', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(422, 'Kota Bau-Bau', 'Sulawesi Tenggara', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(423, 'Kota Kendari', 'Sulawesi Tenggara', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(424, 'Kabupaten Banggai', 'Sulawesi Tengah', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(425, 'Kabupaten Banggai Kepulauan', 'Sulawesi Tengah', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(426, 'Kabupaten Banggai Laut', 'Sulawesi Tengah', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(427, 'Kabupaten Buol', 'Sulawesi Tengah', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(428, 'Kabupaten Donggala', 'Sulawesi Tengah', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(429, 'Kabupaten Morowali', 'Sulawesi Tengah', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(430, 'Kabupaten Morowali Utara', 'Sulawesi Tengah', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(431, 'Kabupaten Parigi Moutong', 'Sulawesi Tengah', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(432, 'Kabupaten Poso', 'Sulawesi Tengah', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(433, 'Kabupaten Sigi', 'Sulawesi Tengah', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(434, 'Kabupaten Tojo Una-Una', 'Sulawesi Tengah', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(435, 'Kabupaten Tolitoli', 'Sulawesi Tengah', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(436, 'Kota Palu', 'Sulawesi Tengah', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(437, 'Kabupaten Bolaang Mongondow', 'Sulawesi Utara', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(438, 'Kabupaten Bolaang Mongondow Selatan', 'Sulawesi Utara', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(439, 'Kabupaten Bolaang Mongondow Timur', 'Sulawesi Utara', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(440, 'Kabupaten Bolaang Mongondow Utara', 'Sulawesi Utara', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(441, 'Kabupaten Kepulauan Sangihe', 'Sulawesi Utara', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(442, 'Kabupaten Kepulauan Siau Tagulandang Biaro', 'Sulawesi Utara', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(443, 'Kabupaten Kepulauan Talaud', 'Sulawesi Utara', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(444, 'Kabupaten Minahasa', 'Sulawesi Utara', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(445, 'Kabupaten Minahasa Selatan', 'Sulawesi Utara', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(446, 'Kabupaten Minahasa Tenggara', 'Sulawesi Utara', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(447, 'Kabupaten Minahasa Utara', 'Sulawesi Utara', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(448, 'Kota Bitung', 'Sulawesi Utara', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(449, 'Kota Kotamobagu', 'Sulawesi Utara', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(450, 'Kota Manado', 'Sulawesi Utara', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(451, 'Kota Tomohon', 'Sulawesi Utara', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(452, 'Kabupaten Buru', 'Maluku', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(453, 'Kabupaten Buru Selatan', 'Maluku', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(454, 'Kabupaten Kepulauan Aru', 'Maluku', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(455, 'Kabupaten Maluku Barat Daya', 'Maluku', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(456, 'Kabupaten Maluku Tengah', 'Maluku', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(457, 'Kabupaten Maluku Tenggara', 'Maluku', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(458, 'Kabupaten Kepulauan Tanimbar', 'Maluku', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(459, 'Kabupaten Seram Bagian Barat', 'Maluku', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(460, 'Kabupaten Seram Bagian Timur', 'Maluku', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(461, 'Kota Ambon', 'Maluku', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(462, 'Kota Tual', 'Maluku', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(463, 'Kabupaten Halmahera Barat', 'Maluku Utara', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(464, 'Kabupaten Halmahera Tengah', 'Maluku Utara', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(465, 'Kabupaten Halmahera Timur', 'Maluku Utara', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(466, 'Kabupaten Halmahera Selatan', 'Maluku Utara', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(467, 'Kabupaten Halmahera Utara', 'Maluku Utara', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(468, 'Kabupaten Kepulauan Sula', 'Maluku Utara', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(469, 'Kabupaten Pulau Morotai', 'Maluku Utara', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(470, 'Kabupaten Pulau Taliabu', 'Maluku Utara', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(471, 'Kota Ternate', 'Maluku Utara', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(472, 'Kota Tidore Kepulauan', 'Maluku Utara', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(473, 'Kabupaten Asmat', 'Papua', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(474, 'Kabupaten Biak Numfor', 'Papua', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(475, 'Kabupaten Boven Digoel', 'Papua', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(476, 'Kabupaten Deiyai', 'Papua', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(477, 'Kabupaten Dogiyai', 'Papua', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(478, 'Kabupaten Intan Jaya', 'Papua', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(479, 'Kabupaten Jayapura', 'Papua', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(480, 'Kabupaten Jayawijaya', 'Papua', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(481, 'Kabupaten Keerom', 'Papua', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(482, 'Kabupaten Kepulauan Yapen', 'Papua', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(483, 'Kabupaten Lanny Jaya', 'Papua', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(484, 'Kabupaten Mamberamo Raya', 'Papua', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(485, 'Kabupaten Mamberamo Tengah', 'Papua', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(486, 'Kabupaten Mappi', 'Papua', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(487, 'Kabupaten Merauke', 'Papua', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(488, 'Kabupaten Mimika', 'Papua', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(489, 'Kabupaten Nabire', 'Papua', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(490, 'Kabupaten Nduga', 'Papua', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(491, 'Kabupaten Paniai', 'Papua', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(492, 'Kabupaten Pegunungan Bintang', 'Papua', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(493, 'Kabupaten Puncak', 'Papua', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(494, 'Kabupaten Puncak Jaya', 'Papua', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(495, 'Kabupaten Sarmi', 'Papua', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(496, 'Kabupaten Supiori', 'Papua', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(497, 'Kabupaten Tolikara', 'Papua', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(498, 'Kabupaten Waropen', 'Papua', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(499, 'Kabupaten Yahukimo', 'Papua', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(500, 'Kabupaten Yalimo', 'Papua', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(501, 'Kota Jayapura', 'Papua', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(502, 'Kabupaten Fakfak', 'Papua Barat', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(503, 'Kabupaten Kaimana', 'Papua Barat', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(504, 'Kabupaten Manokwari', 'Papua Barat', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(505, 'Kabupaten Manokwari Selatan', 'Papua Barat', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(506, 'Kabupaten Maybrat', 'Papua Barat', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(507, 'Kabupaten Pegunungan Arfak', 'Papua Barat', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(508, 'Kabupaten Raja Ampat', 'Papua Barat', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(509, 'Kabupaten Sorong', 'Papua Barat', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(510, 'Kabupaten Sorong Selatan', 'Papua Barat', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(511, 'Kabupaten Tambrauw', 'Papua Barat', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(512, 'Kabupaten Teluk Bintuni', 'Papua Barat', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(513, 'Kabupaten Teluk Wondama', 'Papua Barat', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(514, 'Kota Sorong', 'Papua Barat', '-', '2021-10-26 18:45:18', '2021-10-26 18:45:18'),
(515, 'Kendari1', 'Jawa Timur', '-', '2021-10-26 19:10:22', '2021-10-26 19:10:22'),
(516, 'Kota Pagatan  / Batulicin', 'Kalimantan Selatan', '-', '2021-10-28 00:40:44', '2021-10-28 00:40:44'),
(517, 'Reo', 'NTT & NTB', '-', '2021-10-28 15:16:34', '2021-10-28 15:16:34'),
(518, 'Attambua', 'NTT & NTB', '-', '2021-10-28 15:16:52', '2021-10-28 15:16:52'),
(519, 'Waingapu/ Sumba Timur', 'NTT & NTB', '-', '2021-10-28 15:17:11', '2021-10-28 15:17:11'),
(520, 'Waikabubak / Sumba Barat', 'NTT & NTB', '-', '2021-10-28 15:17:32', '2021-10-28 15:17:32'),
(521, 'L. Banggai / Bunta', 'Sulawesi', '-', '2021-10-28 15:17:53', '2021-10-28 15:17:53'),
(522, 'L. Banggai / Toili', 'Sulawesi', '-', '2021-10-28 15:18:13', '2021-10-28 15:18:13'),
(523, 'Merauke I - Tanah Miring', 'Maluku, Maluku Utara, Irian Jaya, Irian Barat', '-', '2021-10-28 15:18:42', '2021-10-28 15:18:42'),
(524, 'Merauke II - Kota', 'Maluku, Maluku Utara, Irian Jaya, Irian Barat', '-', '2021-10-28 15:19:00', '2021-10-28 15:19:00'),
(525, 'Timika', 'Maluku, Maluku Utara, Irian Jaya, Irian Barat', '-', '2021-10-28 15:19:32', '2021-10-28 15:19:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas_kapasitas_time`
--

CREATE TABLE `kelas_kapasitas_time` (
  `id_kelas_kapasitas` int(11) NOT NULL,
  `kelas_kapasitas` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kelas_kapasitas_time`
--

INSERT INTO `kelas_kapasitas_time` (`id_kelas_kapasitas`, `kelas_kapasitas`, `created_at`, `updated_at`) VALUES
(1, '3000-3500', '2021-10-05 23:03:28', '2021-10-05 23:03:51'),
(2, '1500-2000', '2021-10-05 16:04:07', '2021-10-05 16:04:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2021_09_27_070329_create_table_jasavoyagecharter', 2),
(4, '2021_09_28_012818_create_table_jalurvoyage', 3),
(5, '2021_09_28_213253_create_table_vendorvoyage', 4),
(6, '2021_09_29_111309_create_table_statuspemenang', 5),
(10, '2021_10_04_032225_create_table_jasatimecharter', 6),
(11, '2021_10_04_040924_create_table_angkutantime', 7),
(12, '2021_10_06_003256_create_table_jasacontainer', 8),
(13, '2021_10_06_030554_create_table_jalurcontainer', 9),
(14, '2021_10_06_031327_create_table_vendor_container', 10),
(15, '2021_10_06_073350_create_table_jasageneralcargo', 11),
(16, '2021_10_07_024547_create_table_jalurgeneralcargo', 12),
(17, '2021_10_07_025158_create_table_vendorgeneralcargo', 13),
(18, '2021_10_10_032742_create_table_jasakapallayar', 14),
(19, '2021_10_10_035414_create_table_jalur_kapallayar', 15),
(20, '2021_10_10_035639_create_table_vendor_kapallayar', 16),
(21, '2021_10_10_060823_create_table_gudang__p_k_g', 17),
(22, '2021_10_10_090043_create_table_provinsi', 18),
(24, '2021_10_18_020920_create_table_gudang_petroganik', 19),
(25, '2021_10_19_014031_create_table_rekapalihstok', 20),
(26, '2021_10_19_031144_create_table_jalur_alihstok', 21),
(27, '2021_10_25_044149_create_table_vendor_alihstok', 22),
(28, '2021_10_25_073931_create_table_rekaptaripfranco', 23),
(29, '2021_10_25_082217_create_table_jalur_taripfanco', 24),
(30, '2021_10_25_091123_create_table_vendor_taripfranco', 25),
(31, '2021_10_25_223513_create_table_kabupaten', 26);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `provinsi`
--

CREATE TABLE `provinsi` (
  `id_prov` bigint(20) UNSIGNED NOT NULL,
  `nama_provinsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `provinsi`
--

INSERT INTO `provinsi` (`id_prov`, `nama_provinsi`, `created_at`, `updated_at`) VALUES
(1, 'Aceh', '2021-10-27 01:40:12', '2021-10-27 01:40:12'),
(2, 'Bali', '2021-10-27 01:40:12', '2021-10-27 01:40:12'),
(3, 'Banten', '2021-10-27 01:40:12', '2021-10-27 01:40:12'),
(4, 'Bengkulu', '2021-10-27 01:40:12', '2021-10-27 01:40:12'),
(5, 'Gorontalo', '2021-10-27 01:40:12', '2021-10-27 01:40:12'),
(6, 'Jakarta', '2021-10-27 01:40:12', '2021-10-27 01:40:12'),
(7, 'Jambi', '2021-10-27 01:40:12', '2021-10-27 01:40:12'),
(8, 'Jawa Barat', '2021-10-27 01:40:12', '2021-10-27 01:40:12'),
(9, 'Jawa Tengah', '2021-10-27 01:40:12', '2021-10-27 01:40:12'),
(10, 'Jawa Timur', '2021-10-27 01:40:12', '2021-10-27 01:40:12'),
(11, 'Kalimantan Barat', '2021-10-27 01:40:12', '2021-10-27 01:40:12'),
(12, 'Kalimantan Selatan', '2021-10-27 01:40:12', '2021-10-27 01:40:12'),
(13, 'Kalimantan Tengah', '2021-10-27 01:40:12', '2021-10-27 01:40:12'),
(14, 'Kalimantan Timur', '2021-10-27 01:40:12', '2021-10-27 01:40:12'),
(15, 'Kalimantan Utara', '2021-10-27 01:40:12', '2021-10-27 01:40:12'),
(16, 'Kepulauan Bangka Belitung', '2021-10-27 01:40:12', '2021-10-27 01:40:12'),
(17, 'Kepulauan Riau', '2021-10-27 01:40:12', '2021-10-27 01:40:12'),
(18, 'Lampung', '2021-10-27 01:40:12', '2021-10-27 01:40:12'),
(19, 'Maluku', '2021-10-27 01:40:12', '2021-10-27 01:40:12'),
(20, 'Maluku Utara', '2021-10-27 01:40:12', '2021-10-27 01:40:12'),
(21, 'Nusa Tenggara Barat', '2021-10-27 01:40:12', '2021-10-27 01:40:12'),
(22, 'Nusa Tenggara Timur', '2021-10-27 01:40:12', '2021-10-27 01:40:12'),
(23, 'Papua', '2021-10-27 01:40:12', '2021-10-27 01:40:12'),
(24, 'Papua Barat', '2021-10-27 01:40:12', '2021-10-27 01:40:12'),
(25, 'Riau', '2021-10-27 01:40:12', '2021-10-27 01:40:12'),
(26, 'Sulawesi Barat', '2021-10-27 01:40:12', '2021-10-27 01:40:12'),
(27, 'Sulawesi Selatan', '2021-10-27 01:40:12', '2021-10-27 01:40:12'),
(28, 'Sulawesi Tengah', '2021-10-27 01:40:12', '2021-10-27 01:40:12'),
(29, 'Sulawesi Tenggara', '2021-10-27 01:40:12', '2021-10-27 01:40:12'),
(30, 'Sulawesi Utara', '2021-10-27 01:40:12', '2021-10-27 01:40:12'),
(31, 'Sumatera Selatan', '2021-10-27 01:40:12', '2021-10-27 01:40:12'),
(32, 'Sumatra Barat', '2021-10-27 01:40:12', '2021-10-27 01:40:12'),
(33, 'Sumatra Utara', '2021-10-27 01:40:12', '2021-10-27 01:40:12'),
(34, 'Yogyakarta', '2021-10-27 01:40:12', '2021-10-27 01:40:12'),
(35, 'Sumatra', '2021-10-28 15:13:57', '2021-10-28 15:13:57'),
(36, 'Kalimantan', '2021-10-28 15:14:11', '2021-10-28 15:14:11'),
(37, 'NTT & NTB', '2021-10-28 15:14:21', '2021-10-28 15:14:21'),
(38, 'Sulawesi', '2021-10-28 15:14:45', '2021-10-28 15:14:45'),
(39, 'Maluku, Maluku Utara, Irian Jaya, Irian Barat', '2021-10-28 15:15:21', '2021-10-28 15:15:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekapalihstok`
--

CREATE TABLE `rekapalihstok` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_rutes` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_vendor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_pemenang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kontrak` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_kontrak` date NOT NULL,
  `mulai` date NOT NULL,
  `akhir` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `rekapalihstok`
--

INSERT INTO `rekapalihstok` (`id`, `kode_rutes`, `nama_vendor`, `status_pemenang`, `kontrak`, `tgl_kontrak`, `mulai`, `akhir`, `created_at`, `updated_at`) VALUES
(1, 'Gresik-Bitung', 'CITRA BORNEO MANDIRI, PT', 'Pemenang II', '555555555555', '2021-10-28', '2021-11-06', '2021-12-04', '2021-10-25 00:06:32', '2021-10-25 00:06:32'),
(3, 'Gresik-Bitung', 'SINAR BAYU SEJAHTERA, PT', 'Pemenang II', '555555555555', '2021-09-27', '2021-10-06', '2021-11-06', '2021-10-25 18:30:13', '2021-10-25 18:30:13'),
(4, 'Gresik-Bitung', 'SINAR BAYU SEJAHTERA, PT', 'Pemenang II', '555555555555', '2021-09-27', '2021-10-06', '2021-11-06', '2021-10-25 18:32:08', '2021-10-25 18:32:08'),
(5, 'Gresik-Bitung', 'CITRA BORNEO MANDIRI, PT', 'Pemenang I', '3032/B/HK.01.02/35/SP/2019', '2021-10-03', '2021-10-27', '2021-11-06', '2021-10-26 19:27:16', '2021-10-26 19:27:16'),
(6, 'Gresik-Bitung', 'CITRA BORNEO MANDIRI, PT', 'Pemenang I', '3032/B/HK.01.02/35/SP/2019', '2021-09-26', '2021-10-27', '2021-11-06', '2021-10-26 19:32:21', '2021-10-26 19:32:21'),
(7, 'GPAceh-Gresik', 'CITRA BORNEO MANDIRI, PT', 'Pemenang II', '555555555555', '2021-10-31', '2021-11-09', '2022-04-01', '2021-10-31 18:59:33', '2021-10-31 18:59:33'),
(8, 'GPAceh-Gresik', 'CITRA BORNEO MANDIRI, PT', 'Pemenang II', '1111111111111', '2021-11-08', '2021-11-25', '2022-06-01', '2021-10-31 19:00:30', '2021-10-31 19:00:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekaptaripfranco`
--

CREATE TABLE `rekaptaripfranco` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_rutes` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_vendor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_pemenang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kontrak` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_kontrak` date NOT NULL,
  `mulai` date NOT NULL,
  `akhir` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `rekaptaripfranco`
--

INSERT INTO `rekaptaripfranco` (`id`, `kode_rutes`, `nama_vendor`, `status_pemenang`, `kontrak`, `tgl_kontrak`, `mulai`, `akhir`, `created_at`, `updated_at`) VALUES
(1, 'Gresik-Bitung', 'SINAR BAYU SEJAHTERA, PT', 'Pemenang II', '555555555555', '2021-10-04', '2021-10-09', '2021-11-06', '2021-10-25 18:32:29', '2021-10-25 18:32:29'),
(2, 'Gresik-Bitung', 'SINAR BAYU SEJAHTERA, PT', 'Pemenang I', '1111111111111', '2021-10-10', '2021-10-04', '2021-10-02', '2021-10-25 18:33:48', '2021-10-25 18:33:48'),
(6, 'GPAceh-Gresik', 'SINAR BAYU SEJAHTERA, PT', 'Pemenang III', '3032/B/HK.01.02/35/SP/2019', '2021-09-26', '2021-10-29', '2021-12-11', '2021-10-26 19:16:38', '2021-10-26 19:16:38'),
(7, 'Gresik-Gorontalo', 'SINAR BAYU SEJAHTERA, PT', 'Pemenang III', '3032/B/HK.01.02/35/SP/2019', '2021-09-26', '2021-10-27', '2021-12-27', '2021-10-26 19:18:28', '2021-10-26 19:18:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `statuspemenang`
--

CREATE TABLE `statuspemenang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status_pemenang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `statuspemenang`
--

INSERT INTO `statuspemenang` (`id`, `status_pemenang`, `created_at`, `updated_at`) VALUES
(1, 'Pemenang I', NULL, NULL),
(2, 'Pemenang II', '2021-09-29 04:40:52', '2021-09-29 04:40:52'),
(3, 'Pemenang III', '2021-09-29 04:59:00', '2021-09-29 04:59:00'),
(4, 'Pemenang', '2021-09-29 04:59:26', '2021-09-29 04:59:26'),
(5, 'Spot', '2021-09-29 04:59:58', '2021-09-29 04:59:58'),
(7, 'Pemenang II - 80%', '2021-09-29 05:21:14', '2021-09-29 05:21:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
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

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'adminsar', 'admin@adminsar.com', NULL, '$2y$10$9l6H72NEyXckDTPhs6L8qeStZKqwmNG3k4YH1BquBmjUixnsPNCvK', 'r1UPSYvqlejFMltSygZRYG09ZJiIgOXD6qNd9BFl3ULin9ni6V9sn1rmniag', '2021-09-27 00:34:03', '2021-09-27 00:34:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `vendor_alihstok`
--

CREATE TABLE `vendor_alihstok` (
  `id_vendor` int(11) NOT NULL,
  `nama_vendor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan_vendor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `vendor_alihstok`
--

INSERT INTO `vendor_alihstok` (`id_vendor`, `nama_vendor`, `keterangan_vendor`, `created_at`, `updated_at`) VALUES
(2, 'CITRA BORNEO MANDIRI, PT', 'CITRA BORNEO MANDIRI, PT ket', '2021-10-25 00:02:40', '2021-10-25 00:02:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `vendor_container`
--

CREATE TABLE `vendor_container` (
  `id_vendor` int(255) NOT NULL,
  `nama_vendor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan_vendor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `vendor_container`
--

INSERT INTO `vendor_container` (`id_vendor`, `nama_vendor`, `keterangan_vendor`, `created_at`, `updated_at`) VALUES
(1, 'PT ANUGERAH JELAJAH INDONESIA LOGISTIC', '-', '2021-10-28 15:38:05', '2021-10-28 15:38:05'),
(2, 'PT ANUGERAH TRANS MARITIM', '-', '2021-10-28 15:38:05', '2021-10-28 15:38:05'),
(3, 'PT BHANDA GHARA REKSA (PERSERO)', '-', '2021-10-28 15:38:05', '2021-10-28 15:38:05'),
(4, 'PT CITRA NIAGA LOGISTIK', '-', '2021-10-28 15:38:05', '2021-10-28 15:38:05'),
(5, 'PT DINAMIKA EXPRESSINDO', '-', '2021-10-28 15:38:05', '2021-10-28 15:38:05'),
(6, 'PT DIRGANTARA SURYA PERSADA', '-', '2021-10-28 15:38:05', '2021-10-28 15:38:05'),
(7, 'PT HARINDRA SURYASEMPURNA', '-', '2021-10-28 15:38:05', '2021-10-28 15:38:05'),
(8, 'PT HERSINDO ANUGERAH MULTITRANS', '-', '2021-10-28 15:38:05', '2021-10-28 15:38:05'),
(9, 'PT JASA PRIMA LOGISTIK BULOG', '-', '2021-10-28 15:38:05', '2021-10-28 15:38:05'),
(10, 'PT KAMADJAJA LOGISTICS', '-', '2021-10-28 15:38:05', '2021-10-28 15:38:05'),
(11, 'PT KENDANG SARI UTAMA', '-', '2021-10-28 15:38:05', '2021-10-28 15:38:05'),
(12, 'PT KOPINDO CIPTA SEJAHTERA', '-', '2021-10-28 15:38:05', '2021-10-28 15:38:05'),
(13, 'PT KRIS CARGO BAHTERA', '-', '2021-10-28 15:38:05', '2021-10-28 15:38:05'),
(14, 'PT KURNIA JAYA BAHARI', '-', '2021-10-28 15:38:05', '2021-10-28 15:38:05'),
(15, 'PT LINTANG EMAS PASIFIK', '-', '2021-10-28 15:38:05', '2021-10-28 15:38:05'),
(16, 'PT LINTAS LAUT BIRU', '-', '2021-10-28 15:38:05', '2021-10-28 15:38:05'),
(17, 'PT LYONO TRANSPORTASI LOGISTIK', '-', '2021-10-28 15:38:05', '2021-10-28 15:38:05'),
(18, 'PT MARAJASA TRANSPORTAMA', '-', '2021-10-28 15:38:05', '2021-10-28 15:38:05'),
(19, 'PT MITRA INTERTRANS FORWARDING', '-', '2021-10-28 15:38:05', '2021-10-28 15:38:05'),
(20, 'PT PULAU LAUT LINE', '-', '2021-10-28 15:38:05', '2021-10-28 15:38:05'),
(21, 'PT PUPUK INDONESIA LOGISTIK', '-', '2021-10-28 15:38:05', '2021-10-28 15:38:05'),
(22, 'PT PUTERA UTAMA LAUTAN', '-', '2021-10-28 15:38:05', '2021-10-28 15:38:05'),
(23, 'PT PUTRA JAYA MARINE LOGISTICS', '-', '2021-10-28 15:38:05', '2021-10-28 15:38:05'),
(24, 'PT SAHABAT MARINE LOGISTICS', '-', '2021-10-28 15:38:05', '2021-10-28 15:38:05'),
(25, 'PT SINAR BAYU SEJAHTERA', '-', '2021-10-28 15:38:05', '2021-10-28 15:38:05'),
(26, 'PT SUKOHARJO PERMAI ', '-', '2021-10-28 15:38:05', '2021-10-28 15:38:05'),
(27, 'PT SUN RISE LOGISTICS', '-', '2021-10-28 15:38:05', '2021-10-28 15:38:05'),
(28, 'PT SURYA BUANA SENTOSA', '-', '2021-10-28 15:38:05', '2021-10-28 15:38:05'),
(29, 'PT TPIL LOGISTICS', '-', '2021-10-28 15:38:05', '2021-10-28 15:38:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `vendor_generalcargo`
--

CREATE TABLE `vendor_generalcargo` (
  `id_vendor` int(11) NOT NULL,
  `nama_vendor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan_vendor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `vendor_generalcargo`
--

INSERT INTO `vendor_generalcargo` (`id_vendor`, `nama_vendor`, `keterangan_vendor`, `created_at`, `updated_at`) VALUES
(1, 'PT Berkah Samudra Line', '-', '2021-10-30 23:19:19', '2021-10-31 01:01:25'),
(2, 'PT  Intan Borneo Wisesa', '-', '2021-10-30 23:19:19', '2021-10-30 23:19:19'),
(3, 'PT  Mandiri Sejahtera Abadi Line', '-', '2021-10-30 23:19:19', '2021-10-30 23:19:19'),
(4, 'PT Pelayaran Cahaya Lintang Samudera', '-', '2021-10-30 23:19:19', '2021-10-30 23:19:19'),
(5, 'PT Pelayaran Kapuas Mekar Jaya ', '-', '2021-10-30 23:19:19', '2021-10-30 23:19:19'),
(6, 'PT Pelayaran Sahabat Karya Abadi', '-', '2021-10-30 23:19:19', '2021-10-30 23:19:19'),
(9, 'PT Pelayaran Surya Bintang Timur', '-', '2021-10-30 23:19:19', '2021-10-30 23:19:19'),
(10, 'PT Ppn Bandar Bahari Permai', '-', '2021-10-30 23:19:19', '2021-10-30 23:19:19'),
(11, 'PT Isa Lines', '-', '2021-10-30 23:19:19', '2021-10-30 23:19:19'),
(12, 'PT Kopindo Cipta Sejahtera', '-', '2021-10-30 23:19:19', '2021-10-30 23:19:19'),
(13, 'PT Pelayaran Berkah Setanggi Timur', '-', '2021-10-30 23:19:19', '2021-10-30 23:19:19'),
(14, 'PT Pelayaran Niaga Sukses Bersama', '-', '2021-10-30 23:19:19', '2021-10-30 23:19:19'),
(15, 'PT Perusahaan Pelayaran Gurita Lintas Samudera', '-', '2021-10-30 23:19:19', '2021-10-30 23:19:19'),
(16, 'PT Perusahaan Pelnas Bandar Bahari Permai', '-', '2021-10-30 23:19:19', '2021-10-30 23:19:19'),
(17, 'PT Pupuk Indonesia Logistik', '-', '2021-10-30 23:19:19', '2021-10-30 23:19:19'),
(18, 'PT Sahabat Karya Abadi Line', '-', '2021-10-30 23:19:19', '2021-10-30 23:19:19'),
(19, 'PT Samudra Usaha Jaya Line', '-', '2021-10-30 23:19:19', '2021-10-30 23:19:19'),
(20, 'PT Varia Usaha Lintas Segara', '-', '2021-10-30 23:19:19', '2021-10-30 23:19:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `vendor_kapallayar`
--

CREATE TABLE `vendor_kapallayar` (
  `id_vendor` bigint(20) UNSIGNED NOT NULL,
  `nama_vendor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan_vendor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `vendor_kapallayar`
--

INSERT INTO `vendor_kapallayar` (`id_vendor`, `nama_vendor`, `keterangan_vendor`, `created_at`, `updated_at`) VALUES
(1, 'PELAYARAN RAKYAT BONE JAYA BARU, PT', 'PELAYARAN RAKYAT BONE JAYA BARU, PT KETERANGAN', NULL, '2021-10-09 23:03:22'),
(3, 'CITRA BORNEO MANDIRI, PT', 'CITRA BORNEO MANDIRI, PT ket', '2021-10-09 23:03:59', '2021-10-09 23:03:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `vendor_taripfranco`
--

CREATE TABLE `vendor_taripfranco` (
  `id_vendor` int(11) NOT NULL,
  `nama_vendor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan_vendor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `vendor_taripfranco`
--

INSERT INTO `vendor_taripfranco` (`id_vendor`, `nama_vendor`, `keterangan_vendor`, `created_at`, `updated_at`) VALUES
(2, 'SINAR BAYU SEJAHTERA, PT', 'PT Linc B k', '2021-10-25 18:29:27', '2021-10-25 18:29:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `vendor_time`
--

CREATE TABLE `vendor_time` (
  `id_vendor` int(11) NOT NULL,
  `nama_vendor` varchar(255) NOT NULL,
  `keterangan_vendor` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `vendor_time`
--

INSERT INTO `vendor_time` (`id_vendor`, `nama_vendor`, `keterangan_vendor`, `created_at`, `updated_at`) VALUES
(1, 'PT Kapuas Mekar Jaya', 'PT Kapuas Mekar Jaya w', '2021-10-05 21:32:10', '0000-00-00 00:00:00'),
(2, 'PT Linc Bintang Line', 'PT Linc Bintang Line k', '2021-10-05 14:35:32', '2021-10-05 14:35:32'),
(3, 'CITRA BORNEO MANDIRI, PT', 'CITRA BORNEO MANDIRI, PT ket', '2021-10-26 18:57:00', '2021-10-26 18:57:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `vendor_voyage`
--

CREATE TABLE `vendor_voyage` (
  `id_vendor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_vendor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan_vendor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `vendor_voyage`
--

INSERT INTO `vendor_voyage` (`id_vendor`, `nama_vendor`, `keterangan_vendor`, `created_at`, `updated_at`) VALUES
('1', 'PT Berkah Samudra Line', '-', '2021-10-26 17:31:57', '2021-10-27 17:23:52'),
('2', 'PT  Intan Borneo Wisesa', '-', '2021-10-26 17:31:57', '2021-10-26 17:31:57'),
('3', 'PT  Mandiri Sejahtera Abadi Line', '-', '2021-10-26 17:31:57', '2021-10-26 17:31:57'),
('4', 'PT Pelayaran Cahaya Lintang Samudera', '-', '2021-10-26 17:31:57', '2021-10-26 17:31:57'),
('5', 'PT Pelayaran Kapuas Mekar Jaya ', '-', '2021-10-26 17:31:57', '2021-10-26 17:31:57'),
('6', 'PT Pelayaran Sahabat Karya Abadi', '-', '2021-10-26 17:31:57', '2021-10-26 17:31:57'),
('9', 'PT Pelayaran Surya Bintang Timur', '-', '2021-10-26 17:31:57', '2021-10-26 17:31:57'),
('10', 'PT Ppn Bandar Bahari Permai', '-', '2021-10-26 17:31:57', '2021-10-26 17:31:57'),
('11', 'PT Isa Lines', '-', '2021-10-26 17:31:57', '2021-10-26 17:31:57'),
('12', 'PT Kopindo Cipta Sejahtera', '-', '2021-10-26 17:31:57', '2021-10-26 17:31:57'),
('13', 'PT Pelayaran Berkah Setanggi Timur', '-', '2021-10-26 17:31:57', '2021-10-26 17:31:57'),
('14', 'PT Pelayaran Niaga Sukses Bersama', '-', '2021-10-26 17:31:57', '2021-10-26 17:31:57'),
('15', 'PT Perusahaan Pelayaran Gurita Lintas Samudera', '-', '2021-10-26 17:31:57', '2021-10-26 17:31:57'),
('16', 'PT Perusahaan Pelnas Bandar Bahari Permai', '-', '2021-10-26 17:31:57', '2021-10-26 17:31:57'),
('17', 'PT Pupuk Indonesia Logistik', '-', '2021-10-26 17:31:57', '2021-10-26 17:31:57'),
('18', 'PT Sahabat Karya Abadi Line', '-', '2021-10-26 17:31:57', '2021-10-26 17:31:57'),
('19', 'PT Samudra Usaha Jaya Line', '-', '2021-10-26 17:31:57', '2021-10-26 17:31:57'),
('20', 'PT Varia Usaha Lintas Segara', '-', '2021-10-26 17:31:57', '2021-10-26 17:31:57');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `angkutan_time`
--
ALTER TABLE `angkutan_time`
  ADD PRIMARY KEY (`kode_angkutan`);

--
-- Indeks untuk tabel `gudang_petroganik`
--
ALTER TABLE `gudang_petroganik`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `gudang_pkg`
--
ALTER TABLE `gudang_pkg`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jalur_alihstok`
--
ALTER TABLE `jalur_alihstok`
  ADD PRIMARY KEY (`kode_rute`);

--
-- Indeks untuk tabel `jalur_container`
--
ALTER TABLE `jalur_container`
  ADD PRIMARY KEY (`kode_rute`);

--
-- Indeks untuk tabel `jalur_generalcargo`
--
ALTER TABLE `jalur_generalcargo`
  ADD PRIMARY KEY (`kode_rute`);

--
-- Indeks untuk tabel `jalur_kapallayar`
--
ALTER TABLE `jalur_kapallayar`
  ADD PRIMARY KEY (`kode_rute`);

--
-- Indeks untuk tabel `jalur_voyage`
--
ALTER TABLE `jalur_voyage`
  ADD PRIMARY KEY (`kode_rute`);

--
-- Indeks untuk tabel `jasacontainer`
--
ALTER TABLE `jasacontainer`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jasageneralcargo`
--
ALTER TABLE `jasageneralcargo`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jasakapallayar`
--
ALTER TABLE `jasakapallayar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jasatimecharter`
--
ALTER TABLE `jasatimecharter`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jasavoyagecharter`
--
ALTER TABLE `jasavoyagecharter`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kabupaten`
--
ALTER TABLE `kabupaten`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kelas_kapasitas_time`
--
ALTER TABLE `kelas_kapasitas_time`
  ADD PRIMARY KEY (`id_kelas_kapasitas`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`id_prov`);

--
-- Indeks untuk tabel `rekapalihstok`
--
ALTER TABLE `rekapalihstok`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rekaptaripfranco`
--
ALTER TABLE `rekaptaripfranco`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `statuspemenang`
--
ALTER TABLE `statuspemenang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `vendor_alihstok`
--
ALTER TABLE `vendor_alihstok`
  ADD PRIMARY KEY (`id_vendor`);

--
-- Indeks untuk tabel `vendor_container`
--
ALTER TABLE `vendor_container`
  ADD PRIMARY KEY (`id_vendor`);

--
-- Indeks untuk tabel `vendor_generalcargo`
--
ALTER TABLE `vendor_generalcargo`
  ADD PRIMARY KEY (`id_vendor`);

--
-- Indeks untuk tabel `vendor_kapallayar`
--
ALTER TABLE `vendor_kapallayar`
  ADD PRIMARY KEY (`id_vendor`);

--
-- Indeks untuk tabel `vendor_taripfranco`
--
ALTER TABLE `vendor_taripfranco`
  ADD PRIMARY KEY (`id_vendor`);

--
-- Indeks untuk tabel `vendor_time`
--
ALTER TABLE `vendor_time`
  ADD PRIMARY KEY (`id_vendor`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `angkutan_time`
--
ALTER TABLE `angkutan_time`
  MODIFY `kode_angkutan` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `gudang_petroganik`
--
ALTER TABLE `gudang_petroganik`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `gudang_pkg`
--
ALTER TABLE `gudang_pkg`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `jasacontainer`
--
ALTER TABLE `jasacontainer`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `jasageneralcargo`
--
ALTER TABLE `jasageneralcargo`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `jasakapallayar`
--
ALTER TABLE `jasakapallayar`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `jasatimecharter`
--
ALTER TABLE `jasatimecharter`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `jasavoyagecharter`
--
ALTER TABLE `jasavoyagecharter`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT untuk tabel `kabupaten`
--
ALTER TABLE `kabupaten`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=526;

--
-- AUTO_INCREMENT untuk tabel `kelas_kapasitas_time`
--
ALTER TABLE `kelas_kapasitas_time`
  MODIFY `id_kelas_kapasitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `provinsi`
--
ALTER TABLE `provinsi`
  MODIFY `id_prov` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `rekapalihstok`
--
ALTER TABLE `rekapalihstok`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `rekaptaripfranco`
--
ALTER TABLE `rekaptaripfranco`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `statuspemenang`
--
ALTER TABLE `statuspemenang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `vendor_alihstok`
--
ALTER TABLE `vendor_alihstok`
  MODIFY `id_vendor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `vendor_container`
--
ALTER TABLE `vendor_container`
  MODIFY `id_vendor` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `vendor_generalcargo`
--
ALTER TABLE `vendor_generalcargo`
  MODIFY `id_vendor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `vendor_kapallayar`
--
ALTER TABLE `vendor_kapallayar`
  MODIFY `id_vendor` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `vendor_taripfranco`
--
ALTER TABLE `vendor_taripfranco`
  MODIFY `id_vendor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `vendor_time`
--
ALTER TABLE `vendor_time`
  MODIFY `id_vendor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
