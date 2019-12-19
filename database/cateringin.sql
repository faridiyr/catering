-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Nov 2019 pada 11.30
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cateringin`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` int(10) NOT NULL,
  `id_pembeli` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `tanggal_pemesanan` int(11) NOT NULL,
  `status_pemesanan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `id_pembeli`, `id_produk`, `jumlah`, `total_harga`, `tanggal_pemesanan`, `status_pemesanan`) VALUES
(5, 2, 0, 0, 0, 1574128484, 1),
(6, 9, 12, 4, 40000, 1574847229, 1),
(7, 9, 11, 6, 150000, 1574838205, 2),
(14, 2, 3, 5, 50000, 1574240510, 1),
(16, 2, 2, 3, 27000, 1574240612, 1),
(17, 2, 12, 123, 1230000, 1574771406, 1),
(20, 2, 12, 50, 500000, 1574782495, 2),
(21, 7, 5, 60, 300000, 1574782611, 1),
(23, 2, 5, 12, 60000, 1574786045, 2),
(24, 2, 12, 4, 40000, 1574793009, 2),
(25, 2, 3, 12, 120000, 1574838902, 2),
(26, 7, 6, 10, 120000, 1574794292, 1),
(28, 3, 3, 78, 780000, 1574838145, 2),
(29, 2, 3, 123, 1230000, 1574855553, 2),
(30, 9, 12, 123, 1230000, 1574927541, 2),
(32, 2, 3, 12, 120000, 1575013331, 1),
(33, 9, 6, 10, 120000, 1575014266, 1),
(34, 7, 6, 500, 6000000, 1575014833, 1),
(36, 2, 4, 88, 880000, 1575107469, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan_status`
--

CREATE TABLE `pemesanan_status` (
  `id_status` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemesanan_status`
--

INSERT INTO `pemesanan_status` (`id_status`, `status`) VALUES
(1, 'Sedang diproses'),
(2, 'Selesai'),
(3, 'Dibatalkan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `id_penjual` int(11) NOT NULL,
  `nama_produk` varchar(25) NOT NULL,
  `harga` int(11) NOT NULL,
  `deskripsi` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `gambar`, `id_penjual`, `nama_produk`, `harga`, `deskripsi`) VALUES
(3, 'nasijamur.jpg', 2, 'Nasi Jamur', 20000, 'Jln. Banjarsari Raya'),
(4, 'nasibali.jpg', 9, 'Nasi Ayam Bali', 10000, 'Jl. Sipodang'),
(6, 'nasibakar.jpg', 13, 'Nasi Bakar', 12000, 'Jalan Setiabudi'),
(12, 'catering5.jpg', 13, 'Nasi Kuning', 10000, 'Mantab'),
(24, 'nasibakar1.jpg', 7, 'Nasi Bakar', 20000, 'Makanan untuk anak kos.'),
(40, 'nasijamur21.jpg', 2, 'Cah Jamur', 20000, 'best seller'),
(41, 'nasibakar11.jpg', 9, 'Nasi Goreng', 20000, 'mantap'),
(43, 'catering31.jpg', 2, 'enak', 20000, 'wasd'),
(44, 'nasibakar2.jpg', 2, 'passwordku', 200000, 'mobile legend');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `image` varchar(200) NOT NULL,
  `date_created` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `role_id`, `is_active`, `image`, `date_created`) VALUES
(2, 'Wahyu Adi Kusuma', 'wahyuadikusuma@gmail.com', '32c9e71e866ecdbc93e497482aa6779f', 2, 1, 'chilled.gif', 1572508011),
(3, 'mas wahyu', 'wahyuadi425@gmail.com', '32c9e71e866ecdbc93e497482aa6779f', 1, 1, 'wahyu.jpg', 1572525751),
(7, 'Anisa Catur Wahyuni', 'ansctrwhyn@gmail.com', 'e00cf25ad42683b3df678c61f42c6bda', 1, 1, 'anisa.jpg', 1572751081),
(9, 'faridiii yr', 'faridiyr@gmail.com', '4a7d1ed414474e4033ac29ccb8653d9b', 2, 1, 'gambar2.jpg', 1574170651),
(13, 'Erlina', 'erlina@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 2, 1, 'default.jpg', 1574928022),
(22, 'wahyu', 'kelompokpbp@gmail.com', '32c9e71e866ecdbc93e497482aa6779f', 1, 1, 'Pgumpul_berkasnomor_190208_00021.jpg', 1575014895);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(7, 'julie@gmail.com', 'mMChOW3ruoC+Ib9ZYW8mFQ8Ok6JC+hoxFTP3AgP0h7U=', 1572525827),
(8, 'julie23@gmail.com', 'yFqmiAtbABl1Pjo/9riWdkbGiaEH32bnlvWD1ZSOD7Y=', 1572529424),
(9, 'millee@gmail.com', 'Kzm4P0KtctYXzxyBT5KdrmIfsSAmumdRp6JW1/2JUfg=', 1572750994),
(10, 'ansctrwhyn@gmail.com', 'rUZyJrTLSPGL4elFJh2ajIzcRNHpN31tTf0RYg3KHes=', 1572751081),
(11, 'faridiyr@gmail.com', 'R3Gm0YJVS+dqBSaSUclPtrd2g8FKEEKoTDrw5gjM70s=', 1574170462),
(12, 'faridiyr@gmail.com', 'VNR7Phmp6rZlO7i9ka5xk/qTVRQfGPEDlH9oXg7FWV8=', 1574170651),
(13, 'pejalansantuy@gmail.com', 'rcF/Jcx9bSzFZhm/zIelGfmbVmme9XJS6UmrbpvsIro=', 1574786445),
(14, 'erlina@gmail.com', 'V5ZHH8XoCTdW1uAo4Fwqnlh5igtOlH2kvvSZBCxKUhI=', 1574928022);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`),
  ADD KEY `id_pembeli` (`id_pembeli`);

--
-- Indeks untuk tabel `pemesanan_status`
--
ALTER TABLE `pemesanan_status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `pemesanan_status`
--
ALTER TABLE `pemesanan_status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `id_pembeli` FOREIGN KEY (`id_pembeli`) REFERENCES `user` (`id`);

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `role_id` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
