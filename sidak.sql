-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2023 at 02:15 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sidak`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_anggota`
--

CREATE TABLE `tb_anggota` (
  `id_anggota` int(11) NOT NULL,
  `id_kk` int(11) NOT NULL,
  `id_pend` int(11) NOT NULL,
  `hubungan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_anggota`
--

INSERT INTO `tb_anggota` (`id_anggota`, `id_kk`, `id_pend`, `hubungan`) VALUES
(46, 27, 67, 'Kepala Keluarga'),
(49, 27, 68, 'Istri'),
(50, 28, 69, 'Kepala Keluarga'),
(51, 28, 70, 'Istri'),
(52, 29, 71, 'Kepala Keluarga'),
(53, 30, 72, 'Kepala Keluarga'),
(54, 30, 73, 'Istri'),
(55, 27, 75, 'Anak'),
(56, 30, 76, 'Anak'),
(57, 28, 77, 'Anak'),
(58, 31, 78, 'Kepala Keluarga');

-- --------------------------------------------------------

--
-- Table structure for table `tb_datang`
--

CREATE TABLE `tb_datang` (
  `id_datang` int(11) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `nama_datang` varchar(20) NOT NULL,
  `jekel` enum('LK','PR') NOT NULL,
  `tgl_datang` date NOT NULL,
  `tempat_asal` varchar(50) NOT NULL,
  `alasan_datang` varchar(50) NOT NULL,
  `pelapor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_datang`
--

INSERT INTO `tb_datang` (`id_datang`, `nik`, `nama_datang`, `jekel`, `tgl_datang`, `tempat_asal`, `alasan_datang`, `pelapor`) VALUES
(25, '100001032032032', 'Roni', 'LK', '2023-07-05', 'Banjarmasin', 'Pekerjaan', 67);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kk`
--

CREATE TABLE `tb_kk` (
  `id_kk` int(11) NOT NULL,
  `nomor_kartu_keluarga` varchar(50) NOT NULL,
  `no_kk` varchar(30) NOT NULL,
  `kepala` varchar(20) NOT NULL,
  `desa` varchar(100) NOT NULL,
  `rt` varchar(5) NOT NULL,
  `rw` varchar(5) NOT NULL,
  `kec` varchar(20) NOT NULL,
  `kab` varchar(20) NOT NULL,
  `prov` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kk`
--

INSERT INTO `tb_kk` (`id_kk`, `nomor_kartu_keluarga`, `no_kk`, `kepala`, `desa`, `rt`, `rw`, `kec`, `kab`, `prov`) VALUES
(27, '0011223344551122', '1122334455667788', 'Jodi Agustiawan', 'Pekauman No 29', '9', '2', 'Martapura ', 'Banjar', 'Kalimantan Selatan'),
(28, '0088032032032', '6500981762800021412', 'Abdul Aditya', 'Pekauman No 10', '1', '3', 'Martapura', 'Banjar', 'Kalimantan Selatan'),
(29, '988009032032032', '66454001002898091', 'Ahmad Rahman', 'Pekauman No 49', '1', '3', 'Martapura', 'Banjar', 'Kalimantan Selatan'),
(30, '00112233445511221234', '112233441214534543', 'Bambang Dwi Eka', 'Pekauman No 102', '9', '9', 'Martapura', 'Banjar', 'Kalimantan Selatan'),
(31, '12312312131212121032032', '100001032032032', 'Roni', 'Pekauman No 7', '7', '7', 'Martapura', 'Banjar', 'Kalimantan Selatan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_lahir`
--

CREATE TABLE `tb_lahir` (
  `id_lahir` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `tgl_lh` date NOT NULL,
  `jekel` enum('LK','PR') NOT NULL,
  `id_kk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_lahir`
--

INSERT INTO `tb_lahir` (`id_lahir`, `nama`, `tgl_lh`, `jekel`, `id_kk`) VALUES
(16, 'Raisha', '2023-06-30', 'PR', 27),
(17, 'Kurniawan Kusuma', '2023-06-28', 'LK', 30),
(18, 'Hermansyah', '2023-06-28', 'LK', 28);

-- --------------------------------------------------------

--
-- Table structure for table `tb_mendu`
--

CREATE TABLE `tb_mendu` (
  `id_mendu` int(11) NOT NULL,
  `id_pdd` int(11) NOT NULL,
  `tgl_mendu` date NOT NULL,
  `sebab` varchar(20) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `agama` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_mendu`
--

INSERT INTO `tb_mendu` (`id_mendu`, `id_pdd`, `tgl_mendu`, `sebab`, `pekerjaan`, `agama`, `alamat`) VALUES
(10, 74, '2023-05-18', 'Kecelakaan', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pdd`
--

CREATE TABLE `tb_pdd` (
  `id_pend` int(11) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `tempat_lh` varchar(15) NOT NULL,
  `tgl_lh` date NOT NULL,
  `jekel` enum('LK','PR') NOT NULL,
  `desa` varchar(100) NOT NULL,
  `rt` varchar(4) NOT NULL,
  `rw` varchar(4) NOT NULL,
  `agama` varchar(30) NOT NULL,
  `kawin` varchar(15) NOT NULL,
  `pekerjaan` varchar(30) NOT NULL,
  `negara` varchar(50) NOT NULL,
  `status` enum('Ada','Meninggal','Pindah') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pdd`
--

INSERT INTO `tb_pdd` (`id_pend`, `nik`, `nama`, `tempat_lh`, `tgl_lh`, `jekel`, `desa`, `rt`, `rw`, `agama`, `kawin`, `pekerjaan`, `negara`, `status`) VALUES
(67, '1122334455667788', 'Jodi Agustiawan', 'Banjarmasin', '2000-08-26', 'LK', 'Pekauman No 29', '9', '2', 'Islam', 'Sudah', 'Swasta', 'Indonesia', 'Ada'),
(68, '11188990098820018873', 'Azizah', 'Banjarmasin', '1999-12-14', 'PR', 'Pekauman No 29', '9', '2', 'Islam', 'Sudah', 'Swasta', 'Indonesia', 'Ada'),
(69, '6500981762800021412', 'Abdul Aditya', 'Martapura', '1990-12-02', 'LK', 'Pekauman No 10', '1', '3', 'Islam', 'Sudah', 'Swasta', 'Indonesia', 'Ada'),
(70, '112233441234324234', 'Aisyah Aminah', 'Jakarta', '2000-01-23', 'PR', 'Pekauman No 10', '1', '3', 'Islam', 'Sudah', 'Tidak Ada', 'Indonesia', 'Ada'),
(71, '66454001002898091', 'Ahmad Rahman', 'Palangkaraya', '1987-12-05', 'LK', 'Pekauman No 49', '1', '3', 'Islam', 'Cerai Mati', 'Swasta', 'Indonesia', 'Ada'),
(72, '112233441214534543', 'Bambang Dwi Eka', 'Banjarmasin', '1990-02-11', 'LK', 'Pekauman No 102', '9', '9', 'Islam', 'Sudah', 'Swasta', 'Indonesia', 'Ada'),
(73, '11223344123131', 'Lina Laila', 'Banjarmasin', '2001-02-20', 'PR', 'Pekauman No 102', '9', '9', 'Islam', 'Sudah', 'Swasta', 'Indonesia', 'Ada'),
(74, '11223344121213032', 'Ade Soraya', 'Surabaya', '2002-01-02', 'PR', 'Pekauman No 49', '1', '3', 'Islam', 'Sudah', 'Tidak Ada', 'Indonesia', 'Meninggal'),
(75, '112233441234032', 'Raisha', 'Pekauman', '2023-06-30', 'PR', 'Pekauman No 29', '9', '2', 'Islam', 'Belum', 'Tidak Ada', 'Indonesia', 'Ada'),
(76, '1122334423324', 'Kurniawan Kusuma', 'Pekauman', '2023-06-28', 'LK', 'Pekauman No 102', '9', '9', 'Islam', 'Belum', 'Tidak Ada', 'Indonesia', 'Ada'),
(77, '1000012312312', 'Hermansyah', 'Pekauman', '2023-06-28', 'LK', 'Pekauman No 10', '1', '3', 'Islam', 'Belum', 'Tidak Ada', 'Indonesia', 'Ada'),
(78, '100001032032032', 'Roni', 'Banjarmasin', '2001-02-02', 'LK', 'Pekauman No 7', '7', '7', 'Islam', 'Belum', 'Swasta', 'Indonesia', 'Ada'),
(82, '11223344123123344', 'qsasd', 'Banjarmasin', '2023-07-01', 'LK', 'Jl. Martapura Lama Km 7.8 Sungai Lulut Banjarmasin', '9', '9', 'Islam', 'Belum', 'tidak bekerja', 'Indonesia', 'Pindah'),
(83, '1122043043032', 'kakakak', 'Banjarmasin', '2023-07-01', 'PR', 'Jl. Martapura Lama Km 7.8 Sungai Lulut Banjarmasin', '9', '9', 'Islam', 'Belum', 'Pelajar', 'Indonesia', 'Pindah');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama_pengguna` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level` enum('Administrator','Kaur Pemerintah') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id_pengguna`, `nama_pengguna`, `username`, `password`, `level`) VALUES
(1, 'Pidin Saripudin', 'admin', 'admin', 'Administrator'),
(3, 'Imas', 'admin2', 'admin2', 'Kaur Pemerintah'),
(4, 'Jodi Agustiawan', 'joditiawan', 'qwerty032', 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pindah`
--

CREATE TABLE `tb_pindah` (
  `id_pindah` int(11) NOT NULL,
  `id_pdd` int(11) NOT NULL,
  `tgl_pindah` date NOT NULL,
  `alasan` varchar(50) NOT NULL,
  `pindah_ke` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pindah`
--

INSERT INTO `tb_pindah` (`id_pindah`, `id_pdd`, `tgl_pindah`, `alasan`, `pindah_ke`) VALUES
(13, 82, '2023-07-06', 'Bekerjaa', 'Kayutangi'),
(14, 83, '2023-07-06', 'Bekerja', 'Palangkaraya');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`id_anggota`),
  ADD KEY `tb_anggota_ibfk_1` (`id_pend`),
  ADD KEY `id_kk` (`id_kk`);

--
-- Indexes for table `tb_datang`
--
ALTER TABLE `tb_datang`
  ADD PRIMARY KEY (`id_datang`),
  ADD KEY `pelapor` (`pelapor`);

--
-- Indexes for table `tb_kk`
--
ALTER TABLE `tb_kk`
  ADD PRIMARY KEY (`id_kk`);

--
-- Indexes for table `tb_lahir`
--
ALTER TABLE `tb_lahir`
  ADD PRIMARY KEY (`id_lahir`),
  ADD KEY `id_kk` (`id_kk`);

--
-- Indexes for table `tb_mendu`
--
ALTER TABLE `tb_mendu`
  ADD PRIMARY KEY (`id_mendu`),
  ADD KEY `id_pdd` (`id_pdd`);

--
-- Indexes for table `tb_pdd`
--
ALTER TABLE `tb_pdd`
  ADD PRIMARY KEY (`id_pend`);

--
-- Indexes for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `tb_pindah`
--
ALTER TABLE `tb_pindah`
  ADD PRIMARY KEY (`id_pindah`),
  ADD KEY `id_pdd` (`id_pdd`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `tb_datang`
--
ALTER TABLE `tb_datang`
  MODIFY `id_datang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tb_kk`
--
ALTER TABLE `tb_kk`
  MODIFY `id_kk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tb_lahir`
--
ALTER TABLE `tb_lahir`
  MODIFY `id_lahir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_mendu`
--
ALTER TABLE `tb_mendu`
  MODIFY `id_mendu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_pdd`
--
ALTER TABLE `tb_pdd`
  MODIFY `id_pend` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_pindah`
--
ALTER TABLE `tb_pindah`
  MODIFY `id_pindah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD CONSTRAINT `tb_anggota_ibfk_1` FOREIGN KEY (`id_pend`) REFERENCES `tb_pdd` (`id_pend`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_anggota_ibfk_2` FOREIGN KEY (`id_kk`) REFERENCES `tb_kk` (`id_kk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_datang`
--
ALTER TABLE `tb_datang`
  ADD CONSTRAINT `tb_datang_ibfk_1` FOREIGN KEY (`pelapor`) REFERENCES `tb_pdd` (`id_pend`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_lahir`
--
ALTER TABLE `tb_lahir`
  ADD CONSTRAINT `tb_lahir_ibfk_1` FOREIGN KEY (`id_kk`) REFERENCES `tb_kk` (`id_kk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_mendu`
--
ALTER TABLE `tb_mendu`
  ADD CONSTRAINT `tb_mendu_ibfk_1` FOREIGN KEY (`id_pdd`) REFERENCES `tb_pdd` (`id_pend`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_pindah`
--
ALTER TABLE `tb_pindah`
  ADD CONSTRAINT `tb_pindah_ibfk_1` FOREIGN KEY (`id_pdd`) REFERENCES `tb_pdd` (`id_pend`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
