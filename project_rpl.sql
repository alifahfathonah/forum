-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 13 Des 2016 pada 04.50
-- Versi Server: 10.1.16-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_rpl`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokter`
--

CREATE TABLE `dokter` (
  `id_dokter` int(30) NOT NULL,
  `nama_dokter` varchar(30) DEFAULT NULL,
  `id_member` int(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` smallint(5) NOT NULL,
  `isi_kategori` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `isi_kategori`) VALUES
(1, 'Mamalia'),
(2, 'Unggas'),
(3, 'Reptil'),
(4, 'Ikan'),
(5, 'Serangga');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int(30) NOT NULL,
  `id_topik` int(15) NOT NULL,
  `isi_komentar` text,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `id_topik`, `isi_komentar`, `status`) VALUES
(1, 1, 'haiiiiiii', 'Raisa'),
(2, 21, 'dokter solusinya gmn 1 minggu gak dibales?', 'Rozaq'),
(4, 21, 'hai,rozaq\r\nbisa diajak jalan - jalan dulu biar gak stress ', 'Reinisa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
--

CREATE TABLE `member` (
  `id_member` int(100) NOT NULL,
  `nama_member` varchar(200) NOT NULL,
  `username_member` varchar(30) NOT NULL,
  `email_member` varchar(200) NOT NULL,
  `TTL_member` varchar(200) NOT NULL,
  `jenisKelamin_member` varchar(20) NOT NULL,
  `foto_member` varchar(200) NOT NULL,
  `password_member` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `nip_dokter` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `member`
--

INSERT INTO `member` (`id_member`, `nama_member`, `username_member`, `email_member`, `TTL_member`, `jenisKelamin_member`, `foto_member`, `password_member`, `status`, `nip_dokter`) VALUES
(15, 'puja', 'puja', 'Dinara100mufitasari@gmail.com', 'Malang,25 September 1995', 'Male', 'file_1480939174.JPG', 'puja', 'member', 'tidak ada'),
(16, 'Irma', 'Raisa', 'irmapujadayanti@gmail.com', 'Malang,25 September 1995', 'Female', 'file_1481569976.jpg', 'raisa4256', 'member', 'tidak ada'),
(17, 'Amalia', 'Rozaq', 'miftahur_rozaq123@gmail.com', 'Gresik,6 juli 1991', 'Female', 'file_1481590506.jpg', 'rozaq', 'member', 'tidak ada'),
(18, 'Reinisa', 'Reinisa', 'reinisa6690@gmail.com', 'Malang,27 Januari 1989', 'Female', 'file_1481599133.jpg', 'reinisa', 'dokter', '434343');

-- --------------------------------------------------------

--
-- Struktur dari tabel `topik`
--

CREATE TABLE `topik` (
  `id_topik` int(15) NOT NULL,
  `judul_topik` varchar(80) NOT NULL,
  `isi_topik` text,
  `tanggal_topik` date DEFAULT NULL,
  `id_kategori` smallint(5) DEFAULT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `topik`
--

INSERT INTO `topik` (`id_topik`, `judul_topik`, `isi_topik`, `tanggal_topik`, `id_kategori`, `status`) VALUES
(1, 'hewan buas', 'adalah hewan yang tidak bisa dijinakan dan hidup di alam liar. hewan buas sulit untuk dipelihara dan membutuhkan biaya yang besar untuk merawatnya.', '2016-12-12', 1, 'Raisa'),
(10, 'Landak', 'dok, landak saya diem, tidak mau makan, dan muntah,muntah, gmn solusinya?', '2016-12-12', 1, 'Raisa'),
(11, 'Serangga', 'Obat pembasmi serangga yang efektif apa dok?', '2016-12-12', 4, 'Rozaq'),
(20, 'Batuk - batuk pada kucing', '1 minggu kucing saya batuk - batuk terus, trus bagaimana dok?', '2016-12-12', 0, 'Raisa'),
(21, 'Kelinci', 'Kelinci tiba - tiba tidak mau makan ? obatnya', '2016-12-13', 0, 'Rozaq');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id_dokter`),
  ADD KEY `id_member` (`id_member`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`),
  ADD KEY `id_topik` (`id_topik`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`),
  ADD UNIQUE KEY `username_member` (`username_member`);

--
-- Indexes for table `topik`
--
ALTER TABLE `topik`
  ADD PRIMARY KEY (`id_topik`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id_dokter` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id_member` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `topik`
--
ALTER TABLE `topik`
  MODIFY `id_topik` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `dokter`
--
ALTER TABLE `dokter`
  ADD CONSTRAINT `dokter_ibfk_1` FOREIGN KEY (`id_member`) REFERENCES `member` (`id_member`);

--
-- Ketidakleluasaan untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`id_topik`) REFERENCES `topik` (`id_topik`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
