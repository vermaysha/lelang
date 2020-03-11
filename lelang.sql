-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 03 Mar 2020 pada 00.21
-- Versi server: 10.1.44-MariaDB-0ubuntu0.18.04.1
-- Versi PHP: 7.3.15-2+ubuntu18.04.1+deb.sury.org+2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lelang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `history_lelang`
--

CREATE TABLE `history_lelang` (
  `id_history` int(10) UNSIGNED NOT NULL,
  `id_lelang` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `penawaran_harga` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `history_lelang`
--

INSERT INTO `history_lelang` (`id_history`, `id_lelang`, `id_user`, `penawaran_harga`) VALUES
(1, 2, 4, 16000000),
(2, 2, 4, 20000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` int(10) UNSIGNED NOT NULL,
  `nama_barang` varchar(25) NOT NULL,
  `tgl` date NOT NULL,
  `harga_awal` int(20) UNSIGNED NOT NULL,
  `deskripsi_barang` varchar(100) NOT NULL,
  `status_barang` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `nama_barang`, `tgl`, `harga_awal`, `deskripsi_barang`, `status_barang`) VALUES
(1, 'Akun BDM LV 60 Valkyrie', '2020-03-01', 500000, 'Class: Valkyrie\r\nLevel: 60 (Ready for Acsension)\r\nPet: 3 pets Tier 4\r\nHorse: 2 horse tier 5\r\nCP: 450', 0),
(2, 'Akun BDM LV 60 Witch', '2020-03-02', 3500000, 'Class: Witch\r\nLevel: 60 (Ready for Acsension)\r\nPet: 3 pets Tier 4\r\nHorse: 2 horse tier 5\r\nCP: 4500\r\n', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_lelang`
--

CREATE TABLE `tb_lelang` (
  `id_lelang` int(10) UNSIGNED NOT NULL,
  `id_barang` int(10) UNSIGNED NOT NULL,
  `tgl_lelang` datetime NOT NULL,
  `harga_akhir` int(20) UNSIGNED DEFAULT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `id_petugas` int(10) UNSIGNED NOT NULL,
  `status` enum('dibuka','ditutup') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_lelang`
--

INSERT INTO `tb_lelang` (`id_lelang`, `id_barang`, `tgl_lelang`, `harga_akhir`, `id_user`, `id_petugas`, `status`) VALUES
(1, 2, '2020-03-03 00:01:00', 20000000, 1, 1, 'ditutup'),
(2, 1, '2020-03-03 00:01:00', NULL, 2, 1, 'dibuka');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_level`
--

CREATE TABLE `tb_level` (
  `id_level` int(11) UNSIGNED NOT NULL,
  `level` enum('administrator','petugas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_level`
--

INSERT INTO `tb_level` (`id_level`, `level`) VALUES
(1, 'administrator'),
(2, 'petugas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_masyarakat`
--

CREATE TABLE `tb_masyarakat` (
  `id_user` int(10) UNSIGNED NOT NULL,
  `nama_lengkap` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(96) NOT NULL,
  `telp` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_masyarakat`
--

INSERT INTO `tb_masyarakat` (`id_user`, `nama_lengkap`, `username`, `password`, `telp`) VALUES
(1, 'John Doe', 'johndoe', '$argon2i$v=19$m=65536,t=4,p=1$cHM0NEZiNWNYaFl1Nzh2eg$zix3OI+6wM8hYOpMfeVMBiX+c2wbuxR0eurWMQzNg3Y', '085231231321'),
(2, 'Evaline', 'evaline', '$argon2i$v=19$m=65536,t=4,p=1$cHM0NEZiNWNYaFl1Nzh2eg$zix3OI+6wM8hYOpMfeVMBiX+c2wbuxR0eurWMQzNg3Y', '085231231321'),
(3, 'Leviathan', 'leviathan', '$argon2i$v=19$m=65536,t=4,p=1$cHM0NEZiNWNYaFl1Nzh2eg$zix3OI+6wM8hYOpMfeVMBiX+c2wbuxR0eurWMQzNg3Y', '085231231321'),
(4, 'Mammon', 'mammon', '$argon2i$v=19$m=65536,t=4,p=1$cHM0NEZiNWNYaFl1Nzh2eg$zix3OI+6wM8hYOpMfeVMBiX+c2wbuxR0eurWMQzNg3Y', ''),
(5, 'Asmodeus', 'asmodeus', '$argon2i$v=19$m=65536,t=4,p=1$cHM0NEZiNWNYaFl1Nzh2eg$zix3OI+6wM8hYOpMfeVMBiX+c2wbuxR0eurWMQzNg3Y', '085231231321'),
(6, 'Belphegor', 'belphegor', '$argon2i$v=19$m=65536,t=4,p=1$cHM0NEZiNWNYaFl1Nzh2eg$zix3OI+6wM8hYOpMfeVMBiX+c2wbuxR0eurWMQzNg3Y', '085231231321'),
(7, 'Amon', 'amon', '$argon2i$v=19$m=65536,t=4,p=1$cHM0NEZiNWNYaFl1Nzh2eg$zix3OI+6wM8hYOpMfeVMBiX+c2wbuxR0eurWMQzNg3Y', '085231231321');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_petugas`
--

CREATE TABLE `tb_petugas` (
  `id_petugas` int(10) UNSIGNED NOT NULL,
  `nama_petugas` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(96) NOT NULL,
  `id_level` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_petugas`
--

INSERT INTO `tb_petugas` (`id_petugas`, `nama_petugas`, `username`, `password`, `id_level`) VALUES
(1, 'Administrator', 'admin', '$argon2i$v=19$m=65536,t=4,p=1$cHM0NEZiNWNYaFl1Nzh2eg$zix3OI+6wM8hYOpMfeVMBiX+c2wbuxR0eurWMQzNg3Y', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `history_lelang`
--
ALTER TABLE `history_lelang`
  ADD PRIMARY KEY (`id_history`),
  ADD KEY `id_lelang` (`id_lelang`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `tb_lelang`
--
ALTER TABLE `tb_lelang`
  ADD PRIMARY KEY (`id_lelang`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_petugas` (`id_petugas`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `tb_level`
--
ALTER TABLE `tb_level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indeks untuk tabel `tb_masyarakat`
--
ALTER TABLE `tb_masyarakat`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `tb_petugas`
--
ALTER TABLE `tb_petugas`
  ADD PRIMARY KEY (`id_petugas`),
  ADD KEY `id_level` (`id_level`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `history_lelang`
--
ALTER TABLE `history_lelang`
  MODIFY `id_history` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_barang` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_lelang`
--
ALTER TABLE `tb_lelang`
  MODIFY `id_lelang` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_level`
--
ALTER TABLE `tb_level`
  MODIFY `id_level` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_masyarakat`
--
ALTER TABLE `tb_masyarakat`
  MODIFY `id_user` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tb_petugas`
--
ALTER TABLE `tb_petugas`
  MODIFY `id_petugas` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `history_lelang`
--
ALTER TABLE `history_lelang`
  ADD CONSTRAINT `history_lelang_ibfk_1` FOREIGN KEY (`id_lelang`) REFERENCES `tb_lelang` (`id_lelang`),
  ADD CONSTRAINT `history_lelang_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `tb_masyarakat` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `tb_lelang`
--
ALTER TABLE `tb_lelang`
  ADD CONSTRAINT `tb_lelang_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `tb_barang` (`id_barang`),
  ADD CONSTRAINT `tb_lelang_ibfk_2` FOREIGN KEY (`id_petugas`) REFERENCES `tb_petugas` (`id_petugas`),
  ADD CONSTRAINT `tb_lelang_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `tb_masyarakat` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `tb_petugas`
--
ALTER TABLE `tb_petugas`
  ADD CONSTRAINT `tb_petugas_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `tb_level` (`id_level`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
