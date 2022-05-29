-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `precons_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `foto_usg`
--

CREATE TABLE `foto_usg` (
  `id` int(200) NOT NULL,
  `id_pasien` int(200) NOT NULL,
  `id_penyakit` int(200) NOT NULL,
  `biaya` int(200) NOT NULL,
  `directory` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `id` int(200) NOT NULL,
  `nama_obat` varchar(300) NOT NULL,
  `stok` int(200) NOT NULL,
  `harga` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`id`, `nama_obat`, `stok`, `harga`) VALUES
(1, 'Blackmores Pregnancy & Breastfeeding Gold', 1000, 165000),
(2, 'Osfit DHA', 1000, 200000),
(3, 'Promavit', 1000, 45000),
(4, 'Prolacta Mother', 1000, 100000),
(5, 'Folamil Genio', 1000, 20000),
(6, 'Neurodex', 1000, 30000),
(7, 'Elkana', 1000, 80000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `id` int(200) NOT NULL,
  `mail` varchar(200) NOT NULL,
  `nama_pasien` varchar(200) NOT NULL,
  `tgl_lahir` varchar(200) NOT NULL,
  `nik` int(16) NOT NULL,
  `umurs` int(16) NOT NULL,
  `alamat` text NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`id`, `mail`, `nama_pasien`, `tgl_lahir`, `nik`, `alamat`, `username`, `password`) VALUES
(1, 'ayu@gmail.com', 'Ayu Hardiani', '1992-07-02', '12345678910', 'Banda Aceh', 'ayu', 'pasien'),
(2, 'haura@gmail.com', 'Haura Mutia', '1994-10-13', '12345678910', 'Banda Aceh', 'haura', 'pasien'),
(3, 'amanda@gmail.com', 'Amanda Putri', '1980-09-20', '12345678910',  'Banda Aceh', 'amanda', 'pasien'),
(4, 'aulia@gmail.com', 'Aulia Putri', '1989-11-29', '12345678910', 'Banda Aceh', 'aulia', 'pasien'),
(5, 'marlinda@gmail.com', 'Atika Marlinda', '1995-12-19', '12345678910', 'Banda Aceh', 'marlinda', 'pasien');

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_pegawai` varchar(200) NOT NULL,
  `hari` varchar(200) NOT NULL,
  `jam` varchar(200) NOT NULL,
  `alamat` varchar(360) NOT NULL,
  `pekerjaan` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id`, `username`, `password`, `nama_pegawai`, `hari`, `jam`, `alamat`, `pekerjaan`) VALUES
(1, 'atika', 'admin', 'Atika Marlinda', 'Senin-Jumat', '08.00-12.00', 'Banda Aceh', 1),
(2, 'ayu', 'admin', 'Ayu Hardiani', 'Senin-Jumat', '09:00-11:00', 'Banda Aceh', 1),
(3, 'aura', 'admin', 'Aura Lativa', 'Senin-Jumat', '14:00-16:00', 'Banda Aceh', 1),
(9, 'aulia', 'admin', 'Refky Aulia', 'Senin-Jumat', '16:00-18:00', 'Banda Aceh', 2),
(10, 'ade', 'admin', 'Ade Amanda', 'Senin-Jumat', '19:30-21:00', 'Banda Aceh', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_obat`
--

CREATE TABLE `riwayat_obat` (
  `id` int(200) NOT NULL,
  `id_penyakit` int(200) NOT NULL,
  `id_pasien` int(200) NOT NULL,
  `id_obat` int(200) NOT NULL,
  `jumlah` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_penyakit`
--

CREATE TABLE `riwayat_penyakit` (
  `id` int(200) NOT NULL,
  `id_pasien` int(200) NOT NULL,
  `penyakit` varchar(300) NOT NULL,
  `diagnosa` text NOT NULL,
  `tgl` varchar(200) NOT NULL,
  `id_rawatinap` varchar(200) NOT NULL,
  `biaya_pengobatan` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_rawatinap`
--

CREATE TABLE `riwayat_rawatinap` (
  `id` int(200) NOT NULL,
  `id_pasien` int(200) NOT NULL,
  `tgl_masuk` varchar(200) NOT NULL,
  `tgl_keluar` varchar(200) NOT NULL,
  `biaya` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruang_inap`
--

CREATE TABLE `ruang_inap` (
  `id` int(200) NOT NULL,
  `nama_ruang` varchar(200) NOT NULL,
  `id_pasien` varchar(200) DEFAULT NULL,
  `tgl_masuk` varchar(200) DEFAULT NULL,
  `jam_masuk` varchar(100) NOT NULL,
  `status` int(200) DEFAULT NULL,
  `biaya` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ruang_inap`
--

INSERT INTO `ruang_inap` (`id`, `nama_ruang`, `id_pasien`, `tgl_masuk`, `jam_masuk`, `status`, `biaya`) VALUES
(1, 'Anggur', NULL, NULL, '', 2, 900000),
(2, 'Durian', NULL, NULL, '', 0, 600000),
(3, 'Mangga', NULL, NULL, '', 2, 400000),
(4, 'Pepaya', NULL, NULL, '', 0, 750000),
(5, 'Semangka', NULL, NULL, '', 0, 650000);

--
-- Struktur dari tabel `antrian`
--

CREATE TABLE `antrian` (
  `id` int(200) NOT NULL,
  `id_pasien` int(200) NOT NULL,
  `nama_pasien` varchar(200) NOT NULL,
  `dokter_pilih` varchar(200) NOT NULL,
  `tanggal` varchar(200) NOT NULL,
  `pukul` varchar(200) NOT NULL,
  `fasilitas` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `foto_usg`
--
ALTER TABLE `foto_usg`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `riwayat_obat`
--
ALTER TABLE `riwayat_obat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `riwayat_penyakit`
--
ALTER TABLE `riwayat_penyakit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pasien` (`id_pasien`),
  ADD KEY `id_pasien_2` (`id_pasien`);

--
-- Indeks untuk tabel `riwayat_rawatinap`
--
ALTER TABLE `riwayat_rawatinap`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ruang_inap`
--
ALTER TABLE `ruang_inap`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_pasien` (`id_pasien`);

--
-- Indeks untuk tabel `antrian`
--
ALTER TABLE `antrian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pasien` (`id_pasien`);
  
--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `foto_usg`
--
ALTER TABLE `foto_usg`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `obat`
--
ALTER TABLE `obat`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `riwayat_obat`
--
ALTER TABLE `riwayat_obat`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `riwayat_penyakit`
--
ALTER TABLE `riwayat_penyakit`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `riwayat_rawatinap`
--
ALTER TABLE `riwayat_rawatinap`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ruang_inap`
--
ALTER TABLE `ruang_inap`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

--
-- AUTO_INCREMENT untuk tabel `antrian`
--
ALTER TABLE `antrian`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
