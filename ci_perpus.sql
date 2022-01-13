-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 04 Jan 2022 pada 05.32
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci_perpus`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_absensi`
--

CREATE TABLE `tbl_absensi` (
  `id` int(11) NOT NULL,
  `nis` int(32) NOT NULL,
  `keperluan` varchar(32) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_absensi`
--

INSERT INTO `tbl_absensi` (`id`, `nis`, `keperluan`, `tanggal`) VALUES
(1, 1232441, 'baca', '2021-12-13 17:00:00'),
(2, 1232441, 'baca', '2021-12-13 17:00:00'),
(3, 1232441, 'wifi', '2021-12-13 17:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_announcement`
--

CREATE TABLE `tbl_announcement` (
  `id_announcement` int(11) NOT NULL,
  `kepada` varchar(225) NOT NULL,
  `judul` varchar(225) NOT NULL,
  `slug` varchar(225) NOT NULL,
  `ringkasan` varchar(225) NOT NULL,
  `isi` varchar(225) NOT NULL,
  `tanggal` datetime NOT NULL,
  `status` enum('terbit','draft','terhapus','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_buku`
--

CREATE TABLE `tbl_buku` (
  `id` int(11) NOT NULL,
  `nama_buku` varchar(100) NOT NULL,
  `kategori` varchar(14) NOT NULL,
  `pengarang` varchar(100) NOT NULL,
  `tahun_terbit` int(11) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `file` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_buku`
--

INSERT INTO `tbl_buku` (`id`, `nama_buku`, `kategori`, `pengarang`, `tahun_terbit`, `foto`, `file`) VALUES
(1, 'Azab Sengketa lahan bangun masjid', '1', 'Muhammad Anshor', 2019, '', ''),
(2, 'Saudagar', '1', 'Aldi taher', 2021, 'lemper3.jpg', 'cerita4.pdf'),
(3, 'Bumi Saudagar', '2', 'Aldi taher', 2021, 'Images-circular_3x_DOdazHv_R.png', 'cerita5.pdf'),
(4, 'Warga nestapa', '1', 'Aldi taher', 2020, 'fbb976dc334c0186765915d2b6aa1af7.jpeg', 'cerita6.pdf'),
(5, 'Saudagar hore', '2', 'Aldi taher', 2021, 'user.png', 'cerita7.pdf'),
(6, 'Saudagar', '2', 'Aldi taher', 2021, '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id` int(11) NOT NULL,
  `kategori` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id`, `kategori`) VALUES
(1, 'Cerita'),
(2, 'Kisah Nabi'),
(3, 'Anatomi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_siswa`
--

CREATE TABLE `tbl_siswa` (
  `id` int(11) NOT NULL,
  `nis` int(32) NOT NULL,
  `nama_siswa` varchar(32) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `kelas` varchar(14) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `password` varchar(100) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`id`, `nis`, `nama_siswa`, `alamat`, `kelas`, `tempat_lahir`, `tanggal_lahir`, `password`, `foto`, `status`) VALUES
(3, 1232441, 'Muhammad Shobirin', 'Tosari', 'VII A', 'Pasuruan', '2021-12-13', '$2y$11$D1HsbMjVSMxAFNP04IgvWOG2PcpKfsVlSaCXa01kzmAamuaNiAw0a', 'lemper.jpg', 1),
(4, 1232221, 'Muhammad Firdaus', 'Gondang Wetan Pasuruan', 'VII A', 'Pasuruan', '2021-11-30', '$2y$11$4rTNeaW4Etxh.9tOUraDeesktmQ5jQpf1lCzufVnhvrFrNhFfcnjy', 'Images-circular_3x_DOdazHv_R.png', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_tamu`
--

CREATE TABLE `tbl_tamu` (
  `id_pengunjung` varchar(225) NOT NULL,
  `nama_pengunjung` varchar(225) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tujuan` varchar(225) NOT NULL,
  `alamat_ip` varchar(225) NOT NULL,
  `alamat` longtext NOT NULL,
  `jk` enum('lk','pr','wr','un') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_tamu`
--

INSERT INTO `tbl_tamu` (`id_pengunjung`, `nama_pengunjung`, `waktu`, `tujuan`, `alamat_ip`, `alamat`, `jk`) VALUES
('VIS_1625087959', 'Rifki Andika Dwi Rahardjo', '2020-02-29 18:40:40', 'baca', '127.0.0.1', 'Jl. Branjangan, Ngawi', 'lk'),
('VIS_2106476224', 'Amir Zuhdi Wibowo', '2020-02-29 18:59:21', 'wifi', '127.0.0.1', 'Jl. Ketintang, No 21 Surabaya', 'lk'),
('VIS_1486684956', 'Bagus Panji', '2021-12-07 01:36:07', 'baca', '::1', 'Tosari\r\nPasuruan', 'lk'),
('VIS_1406303914', 'Bagus Panji', '2021-12-14 00:35:49', 'baca', '::1', 'Tosari\r\nPasuruan', 'lk'),
('VIS_900240720', 'Bagus Panji', '2021-12-14 00:36:03', 'baca', '::1', 'Tosari\r\nPasuruan', 'lk'),
('VIS_843917879', 'Bagus Panji', '2021-12-14 00:36:31', 'koran', '::1', 'Tosari\r\nPasuruan', 'lk'),
('VIS_1981122414', 'Bagus Panji', '2021-12-14 00:37:00', 'baca', '::1', 'Tosari\r\nPasuruan', 'lk'),
('VIS_2104302442', 'Bagus Panji', '2021-12-14 00:37:34', 'pertemuan', '::1', 'Tosari\r\nPasuruan', 'lk'),
('VIS_1674125156', 'Bagus Panji', '2021-12-14 00:37:59', 'wifi', '::1', 'Tosari\r\nPasuruan', 'lk');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(225) NOT NULL,
  `role` varchar(12) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `nama`, `password`, `role`, `status`) VALUES
(2, 'admin', 'Administrator', '$2y$11$bPfBdCwFyr6Br.OWTV8YCeg2oPtCctz4DI3GkJp3qge2ghq.DnNT.', 'admin', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_absensi`
--
ALTER TABLE `tbl_absensi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_announcement`
--
ALTER TABLE `tbl_announcement`
  ADD PRIMARY KEY (`id_announcement`);

--
-- Indeks untuk tabel `tbl_buku`
--
ALTER TABLE `tbl_buku`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_absensi`
--
ALTER TABLE `tbl_absensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_announcement`
--
ALTER TABLE `tbl_announcement`
  MODIFY `id_announcement` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_buku`
--
ALTER TABLE `tbl_buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
