-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Des 2019 pada 17.22
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `opensid`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `hotline`
--

CREATE TABLE `hotline` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `nomer` varchar(150) DEFAULT NULL,
  `urut` int(5) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `hotline`
--

INSERT INTO `hotline` (`id`, `nama`, `nomer`, `urut`, `created_at`, `created_by`, `updated_at`, `updated_by`, `status`) VALUES
(1, 'PLN', '123', 1, '2019-12-06 15:04:49', 0, '2019-12-06 15:04:49', NULL, 1),
(2, 'Polsek Karangrayung', '(0292) 658444', 2, '2019-12-06 15:06:49', 0, '2019-12-06 15:06:49', NULL, 1);

--
-- Indexes for dumped tables
--
--
-- Dumping data untuk tabel `setting_modul` dan tabel widget
--

INSERT INTO `setting_modul` (`id`, `modul`, `url`, `aktif`, `ikon`, `urut`, `level`, `hidden`, `ikon_kecil`, `parent`) VALUES
('', 'Hotline', 'hotline', 1, 'fa-phone', 15, 4, 0, 'fa-phone', 13);

INSERT INTO `widget` (`id`, `isi`, `enabled`, `judul`, `jenis_widget`, `urut`, `form_admin`, `setting`) VALUES
('', 'hotline.php', 1, 'Hotline', 1, 16, 'hotline', '');

--
-- Indeks untuk tabel `hotline`
--
ALTER TABLE `hotline`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `hotline`
--
ALTER TABLE `hotline`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
