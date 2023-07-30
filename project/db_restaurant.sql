-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Jul 2023 pada 11.17
-- Versi server: 10.1.32-MariaDB
-- Versi PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_restaurant`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akses_level`
--

CREATE TABLE `akses_level` (
  `id_level` int(10) NOT NULL,
  `nama_level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `akses_level`
--

INSERT INTO `akses_level` (`id_level`, `nama_level`) VALUES
(1, 'admin'),
(2, 'waiter'),
(3, 'kasir'),
(4, 'owner'),
(5, 'pelanggan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_order`
--

CREATE TABLE `detail_order` (
  `id_detail_order` int(11) NOT NULL,
  `id_order` int(10) DEFAULT NULL,
  `id_masakan` int(10) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `status_detail_order` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_order`
--

INSERT INTO `detail_order` (`id_detail_order`, `id_order`, `id_masakan`, `keterangan`, `status_detail_order`) VALUES
(203, 203, 1, '1', 'sudah bayar'),
(207, 207, 1, '21', 'sudah bayar'),
(209, 209, 1, '28', 'sudah bayar'),
(210, 210, 2, '28', 'sudah bayar'),
(211, 211, 3, '28', 'sudah bayar'),
(212, 212, 1, '1', 'sudah bayar'),
(214, 214, 3, '1', 'sudah bayar'),
(215, 215, 2, '1', 'sudah bayar'),
(216, 216, 1, '1', 'sudah bayar'),
(217, 217, 1, '28', 'sudah bayar'),
(218, 218, 2, '28', 'sudah bayar'),
(219, 219, 3, '28', 'sudah bayar'),
(220, 220, 1, '1', 'sudah bayar'),
(221, 221, 2, '28', 'sudah bayar'),
(222, 222, 3, '28', 'sudah bayar'),
(231, 232, 1, '1', 'sudah bayar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `masakan`
--

CREATE TABLE `masakan` (
  `id_masakan` int(11) NOT NULL,
  `nama_masakan` varchar(80) NOT NULL,
  `harga` int(100) NOT NULL,
  `status_makanan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `masakan`
--

INSERT INTO `masakan` (`id_masakan`, `nama_masakan`, `harga`, `status_makanan`) VALUES
(1, 'Nasi Goreng', 10000, ''),
(2, 'Burger', 7000, ''),
(3, 'Kebab', 11000, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_pesanan`
--

CREATE TABLE `order_pesanan` (
  `id_order` int(11) NOT NULL,
  `no_meja` int(50) DEFAULT NULL,
  `tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `id_user` int(10) NOT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  `status_order` varchar(50) DEFAULT NULL,
  `id_masakan` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `order_pesanan`
--

INSERT INTO `order_pesanan` (`id_order`, `no_meja`, `tanggal`, `id_user`, `keterangan`, `status_order`, `id_masakan`) VALUES
(203, NULL, '2022-09-13 15:04:08', 1, NULL, 'sudah bayar', 1),
(207, NULL, '2022-09-13 15:23:24', 21, NULL, 'sudah bayar', 1),
(209, NULL, '2022-09-13 15:47:53', 28, NULL, 'sudah bayar', 1),
(210, NULL, '2022-09-13 15:48:13', 28, NULL, 'sudah bayar', 2),
(211, NULL, '2022-09-13 15:48:23', 28, NULL, 'sudah bayar', 3),
(212, NULL, '2022-09-13 16:10:19', 1, NULL, 'sudah bayar', 1),
(214, NULL, '2022-09-13 16:10:39', 1, NULL, 'sudah bayar', 3),
(215, NULL, '2022-09-13 16:10:42', 1, NULL, 'sudah bayar', 2),
(216, NULL, '2022-09-13 16:10:45', 1, NULL, 'sudah bayar', 1),
(217, NULL, '2022-09-13 16:10:57', 28, NULL, 'sudah bayar', 1),
(218, NULL, '2022-09-13 16:11:02', 28, NULL, 'sudah bayar', 2),
(219, NULL, '2022-09-13 16:11:04', 28, NULL, 'sudah bayar', 3),
(220, NULL, '2022-09-13 16:11:30', 1, NULL, 'sudah bayar', 1),
(221, NULL, '2022-09-13 16:11:41', 28, NULL, 'sudah bayar', 2),
(222, NULL, '2022-09-13 16:11:43', 28, NULL, 'sudah bayar', 3),
(232, NULL, '2023-07-26 09:12:45', 1, NULL, 'sudah bayar', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_order` int(10) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `total_bayar` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `id_order`, `tanggal`, `total_bayar`) VALUES
(8432, 1, 203, NULL, NULL),
(8433, 21, 207, NULL, NULL),
(8434, 28, 209, NULL, NULL),
(8435, 1, 212, NULL, NULL),
(8436, 1, 214, NULL, NULL),
(8437, 28, 217, NULL, NULL),
(8438, 1, 220, NULL, NULL),
(8439, 28, 221, NULL, NULL),
(8440, 1, 232, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `id_level` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `nama_user`, `id_level`) VALUES
(1, 'admin', 'admin', 'admin', 1),
(11, 'waiter', 'waiter', 'waiter', 2),
(13, 'Owner', '123', 'owner', 4),
(20, '', '', '', 5),
(21, 'p', 'p', 'p', 5),
(23, 'u', 'u', 'u', 3),
(25, 'maulia', '123', 'Maulia ', 5),
(26, 'qwerty', '123', 'R', 2),
(27, 'lp', 'lp', 'Roger', 5),
(28, 'x', 'x', 'Ravi', 5),
(29, 'demo', '123', 'User 1', 5);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akses_level`
--
ALTER TABLE `akses_level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indeks untuk tabel `detail_order`
--
ALTER TABLE `detail_order`
  ADD PRIMARY KEY (`id_detail_order`),
  ADD KEY `id_masakan` (`id_masakan`),
  ADD KEY `id_order` (`id_order`);

--
-- Indeks untuk tabel `masakan`
--
ALTER TABLE `masakan`
  ADD PRIMARY KEY (`id_masakan`);

--
-- Indeks untuk tabel `order_pesanan`
--
ALTER TABLE `order_pesanan`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_masakan` (`id_masakan`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_order` (`id_order`),
  ADD KEY `tanggal` (`tanggal`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `level` (`id_level`),
  ADD KEY `id_level` (`id_level`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akses_level`
--
ALTER TABLE `akses_level`
  MODIFY `id_level` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `detail_order`
--
ALTER TABLE `detail_order`
  MODIFY `id_detail_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=232;

--
-- AUTO_INCREMENT untuk tabel `masakan`
--
ALTER TABLE `masakan`
  MODIFY `id_masakan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `order_pesanan`
--
ALTER TABLE `order_pesanan`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=233;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8441;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_order`
--
ALTER TABLE `detail_order`
  ADD CONSTRAINT `detail_order_ibfk_2` FOREIGN KEY (`id_order`) REFERENCES `order_pesanan` (`id_order`),
  ADD CONSTRAINT `detail_order_ibfk_3` FOREIGN KEY (`id_masakan`) REFERENCES `masakan` (`id_masakan`);

--
-- Ketidakleluasaan untuk tabel `order_pesanan`
--
ALTER TABLE `order_pesanan`
  ADD CONSTRAINT `order_pesanan_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `order_pesanan_ibfk_3` FOREIGN KEY (`id_masakan`) REFERENCES `masakan` (`id_masakan`);

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `order_pesanan` (`id_order`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `akses_level` (`id_level`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
