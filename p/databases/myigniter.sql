-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Jun 2022 pada 13.25
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myigniter`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `harga_beli` int(100) NOT NULL,
  `harga_jual` int(100) NOT NULL,
  `stok` int(11) NOT NULL,
  `tgl` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id`, `nama`, `harga_beli`, `harga_jual`, `stok`, `tgl`) VALUES
(1, 'AGUS', 2000, 3000, 50, 1651386979),
(2, 'KECAP ABC', 5400, 6000, 23, 1655467842),
(4, 'SAMBAL AYU TINTING', 5000, 20000, 20, 1655467969),
(12, '12', 12, 12, 12, 1651385176),
(123, 'Buku', 1500, 2000, 10, 0),
(258, 'Mouse', 50000, 55000, 10, 0),
(456, 'Kertas A4', 5000, 5500, 12, 0),
(789, 'Keyboard', 40000, 45000, 15, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `id` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `setor` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`id`, `id_barang`, `qty`, `total_harga`, `tgl`, `setor`) VALUES
(14, 123, 2, 3000, '2014-10-20', 1),
(15, 456, 2, 10000, '2014-10-20', 1),
(16, 123, 2, 3000, '2014-10-19', 0),
(17, 1, 1, 3000, '2022-05-01', 0),
(18, 2, 10, 60000, '2022-06-17', 0),
(19, 4, 1, 20000, '2022-06-17', 0),
(20, 2, 1, 6000, '2022-06-17', 0),
(21, 2, 5, 30000, '2022-06-25', 0),
(22, 4, 1, 20000, '2022-06-25', 0),
(23, 1, 3, 9000, '2022-06-28', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `setor`
--

CREATE TABLE `setor` (
  `id` int(11) NOT NULL,
  `penyetor` varchar(50) NOT NULL,
  `tgl_jual` date NOT NULL,
  `tgl_setor` date NOT NULL,
  `total_jual` int(100) NOT NULL,
  `total_setor` int(100) NOT NULL,
  `selisih` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `setor`
--

INSERT INTO `setor` (`id`, `penyetor`, `tgl_jual`, `tgl_setor`, `total_jual`, `total_setor`, `selisih`) VALUES
(2, 'admin', '2014-10-20', '2014-10-23', 13000, 10000, -3000);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `setor`
--
ALTER TABLE `setor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=790;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `setor`
--
ALTER TABLE `setor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
