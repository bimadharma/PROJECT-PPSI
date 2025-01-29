-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2025 at 01:56 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_indiekost`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id_booking` int(11) NOT NULL,
  `id_kamar` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `tanggal_booking` date NOT NULL,
  `nilai_booking` int(11) NOT NULL,
  `bukti_booking` varchar(255) NOT NULL,
  `status_booking` enum('belum dikonfirmasi','sudah dikonfirmasi','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id_booking`, `id_kamar`, `id_pengguna`, `tanggal_booking`, `nilai_booking`, `bukti_booking`, `status_booking`) VALUES
(5, 7, 28, '2024-12-06', 700000, '67532b6aa272a.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `hak_akses`
--

CREATE TABLE `hak_akses` (
  `id_akses` int(1) NOT NULL,
  `nama_akses` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `hak_akses`
--

INSERT INTO `hak_akses` (`id_akses`, `nama_akses`) VALUES
(1, 'Admin'),
(2, 'Penghuni'),
(3, 'Calon Penghuni');

-- --------------------------------------------------------

--
-- Table structure for table `info_kost`
--

CREATE TABLE `info_kost` (
  `id_kost` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `jenis_kost` enum('Kost Putra','Kost Putri') NOT NULL,
  `nama_kost` varchar(255) NOT NULL,
  `alamat_kost` varchar(255) NOT NULL,
  `provinsi_kost` varchar(255) NOT NULL,
  `kota_kost` varchar(255) NOT NULL,
  `no_kost` varchar(255) NOT NULL,
  `email_kost` varchar(255) NOT NULL,
  `logo_kost` varchar(255) NOT NULL,
  `foto_kost` varchar(255) NOT NULL,
  `deskripsi_kost` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `info_kost`
--

INSERT INTO `info_kost` (`id_kost`, `id_pengguna`, `jenis_kost`, `nama_kost`, `alamat_kost`, `provinsi_kost`, `kota_kost`, `no_kost`, `email_kost`, `logo_kost`, `foto_kost`, `deskripsi_kost`) VALUES
(1, 7, 'Kost Putra', 'Kost Putra', 'jl. Margonda', 'Jawa Barat', 'Depok', '08123456789', 'admin@gmail.com', '', '5e1a933f6a2c9.png', 'putra yang nyaman, aman, bersih, dan modern. Memiliki 2 lantai, dan 30 kamar. Fasilitas oke harga bersahabat. Terletak di daerah yang strategis. Cocok untuk pelajar');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_pengeluaran`
--

CREATE TABLE `jenis_pengeluaran` (
  `id_jenis_pengeluaran` int(11) NOT NULL,
  `kode_pengeluaran` varchar(255) NOT NULL,
  `kategori_pengeluaran` enum('Biaya Operasional','Biaya Pemeliharaan','Biaya Makanan','Biaya Marketing','Biaya Lainnya','Pajak') NOT NULL,
  `nama_pengeluaran` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `jenis_pengeluaran`
--

INSERT INTO `jenis_pengeluaran` (`id_jenis_pengeluaran`, `kode_pengeluaran`, `kategori_pengeluaran`, `nama_pengeluaran`) VALUES
(1, 'P0001', 'Pajak', 'Pajak Bumi dan Bangunan'),
(2, 'P0002', 'Biaya Operasional', 'Listrik (PLN)'),
(3, 'P0003', 'Biaya Operasional', 'Air (PDAM)'),
(4, 'P0005', 'Biaya Pemeliharaan', 'Kebersihan');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_status_pembayaran`
--

CREATE TABLE `jenis_status_pembayaran` (
  `id_status` int(11) NOT NULL,
  `nama_status_pembayaran` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `jenis_status_pembayaran`
--

INSERT INTO `jenis_status_pembayaran` (`id_status`, `nama_status_pembayaran`) VALUES
(1, 'sudah dikonfirmasi'),
(2, 'belum dikonfirmasi');

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE `kamar` (
  `id_kamar` int(11) NOT NULL,
  `nomor_kamar` int(11) NOT NULL,
  `id_tipe` int(11) NOT NULL,
  `luas_kamar` varchar(255) NOT NULL,
  `lantai_kamar` enum('1','2','3','4','5','6','7','8') NOT NULL,
  `kapasitas_kamar` int(11) NOT NULL,
  `deskripsi_kamar` varchar(255) NOT NULL,
  `id_layanan` int(11) NOT NULL,
  `harga_harian` double NOT NULL,
  `harga_mingguan` double NOT NULL,
  `harga_bulanan` double NOT NULL,
  `harga_tahunan` double NOT NULL,
  `denda` double NOT NULL,
  `foto_kamar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`id_kamar`, `nomor_kamar`, `id_tipe`, `luas_kamar`, `lantai_kamar`, `kapasitas_kamar`, `deskripsi_kamar`, `id_layanan`, `harga_harian`, `harga_mingguan`, `harga_bulanan`, `harga_tahunan`, `denda`, `foto_kamar`) VALUES
(3, 111, 2, '4x4', '1', 1, 'Kamar nomor satu', 2, 10000, 80000, 600000, 360000, 5000, '5e166d07c1269.jpg'),
(4, 2, 1, '4x4', '1', 1, 'Kamar nomor satu', 2, 10000, 70000, 500000, 1200000, 5000, '5e166d1d291b0.jpg'),
(5, 3, 1, '4x4', '1', 1, 'Kamar nomor satu', 2, 10000, 65000, 500000, 330000, 5000, '5e166d28510e6.jpg'),
(6, 4, 1, '4x4', '1', 1, 'Kamar Mandi Dalam, Satu tempat tidur, satu lemari, satu meja, 2 kursi', 2, 10000, 65000, 600000, 330000, 5000, '5e166d36598d9.jpg'),
(7, 5, 1, '4x4', '1', 1, 'Kamar nomor satu', 2, 10000, 65000, 700000, 330000, 5000, '5e166d4179726.jpeg'),
(8, 6, 1, '4x4', '1', 1, 'asdasdasdasdsad', 1, 0, 0, 500000, 0, 5000, '5e192d0d9e4d6.jpg'),
(9, 7, 1, '4x4', '1', 1, 'asdadasdadasadds', 2, 0, 0, 600000, 0, 5000, '5e1a901df0b7d.jpeg'),
(10, 1, 1, '5x5', '1', 2, 'baru', 1, 0, 0, 900000, 0, 5000, '674ff0e26b968.png');

-- --------------------------------------------------------

--
-- Table structure for table `layanan`
--

CREATE TABLE `layanan` (
  `id_layanan` int(11) NOT NULL,
  `nama_layanan` varchar(255) NOT NULL,
  `harga_harian` double NOT NULL,
  `harga_mingguan` double NOT NULL,
  `harga_bulanan` double NOT NULL,
  `harga_tahunan` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `layanan`
--

INSERT INTO `layanan` (`id_layanan`, `nama_layanan`, `harga_harian`, `harga_mingguan`, `harga_bulanan`, `harga_tahunan`) VALUES
(1, 'Laundry', 10000, 65000, 30000, 330000),
(2, 'tidak ada layanan', 0, 0, 0, 0),
(3, 'setrika', 0, 0, 20000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `lupa_password`
--

CREATE TABLE `lupa_password` (
  `id` int(11) NOT NULL,
  `email_pengguna` varchar(255) NOT NULL,
  `code_lupas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `lupa_password`
--

INSERT INTO `lupa_password` (`id`, `email_pengguna`, `code_lupas`) VALUES
(1, 'nadasthing@gmail.com', '15e19541ee4617'),
(2, 'farhan.putra.jkt2003@gmail.com', '167532c480ae86');

-- --------------------------------------------------------

--
-- Table structure for table `menghuni`
--

CREATE TABLE `menghuni` (
  `id_menghuni` int(11) NOT NULL,
  `id_kamar` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `tanggal_keluar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `menghuni`
--

INSERT INTO `menghuni` (`id_menghuni`, `id_kamar`, `id_pengguna`, `tanggal_masuk`, `tanggal_keluar`) VALUES
(7, 3, 14, '2019-12-21', '0000-00-00'),
(8, 4, 15, '2019-12-21', '0000-00-00'),
(9, 5, 16, '2024-12-26', '0000-00-00'),
(12, 6, 20, '2024-12-04', '0000-00-00'),
(17, 10, 17, '2024-12-04', '0000-00-00'),
(19, 7, 28, '2024-12-06', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_menghuni` int(11) NOT NULL,
  `tanggal_pembayaran` date NOT NULL,
  `nilai_pembayaran` double NOT NULL,
  `bukti_pembayaran` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `id_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_menghuni`, `tanggal_pembayaran`, `nilai_pembayaran`, `bukti_pembayaran`, `keterangan`, `id_status`) VALUES
(12, 7, '2024-11-07', 200000, '5e186903a45dc.jpg', 'asdsadasdasd', 2),
(19, 8, '2024-11-06', 500000, '5e1853b0c7fc1.jpg', 'Bayar euy', 1),
(20, 8, '2024-12-04', 400000, '5e1853da38082.jpg', 'bayar Lagi skuy', 1),
(23, 12, '2024-12-11', 300000, '5e196c21806bc.jpg', 'Pembayaran Booking kamar no.4 tanggal: 2020-01-11', 1),
(25, 9, '2024-12-12', 300000, '5e19c630d449a.jpg', 'Pembayaran kamar 3. Oleh Jony Januari 2020', 1),
(32, 19, '2024-12-06', 700000, '67532b6aa272a.jpg', 'Pembayaran Booking kamar no.5 tanggal: 2024-12-06', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id_pengeluaran` int(11) NOT NULL,
  `id_jenis_pengeluaran` int(11) NOT NULL,
  `tanggal_pengeluaran` date NOT NULL,
  `nilai_pengeluaran` double NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `bukti_pengeluaran` varchar(255) NOT NULL,
  `id_pengguna` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pengeluaran`
--

INSERT INTO `pengeluaran` (`id_pengeluaran`, `id_jenis_pengeluaran`, `tanggal_pengeluaran`, `nilai_pengeluaran`, `keterangan`, `bukti_pengeluaran`, `id_pengguna`) VALUES
(1, 1, '2024-12-04', 200000, 'Pembayaran pajak PBB', '674fef0d9f311.jpg', 7),
(3, 3, '2024-12-04', 120000, 'Pembayaran AIR januari 2020', '674feef9b4e36.jpg', 7),
(4, 1, '2024-11-07', 200000, 'Bayar Pajak Gaes', '674feee606fb7.jpg', 7),
(5, 2, '2024-12-12', 300000, 'bayar pajak', '674feed1cde5e.jpg', 7);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama_pengguna` varchar(255) NOT NULL,
  `alamat_pengguna` varchar(255) DEFAULT NULL,
  `provinsi_pengguna` varchar(255) DEFAULT NULL,
  `kota_pengguna` varchar(255) DEFAULT NULL,
  `telepon_pengguna` varchar(255) NOT NULL,
  `email_pengguna` varchar(255) NOT NULL,
  `kelamin_pengguna` enum('Pria','Wanita') DEFAULT NULL,
  `tanggal_lahir_pengguna` date DEFAULT NULL,
  `no_ktp_pengguna` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `id_akses` int(1) NOT NULL,
  `foto_pengguna` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nama_pengguna`, `alamat_pengguna`, `provinsi_pengguna`, `kota_pengguna`, `telepon_pengguna`, `email_pengguna`, `kelamin_pengguna`, `tanggal_lahir_pengguna`, `no_ktp_pengguna`, `password`, `id_akses`, `foto_pengguna`) VALUES
(7, 'Luqman', 'Jl Margonda', 'Jawa Barat', 'depok', '123456789', 'admin@gmail.com', 'Pria', '1999-12-15', '123456789', '$2y$10$iBowcAjDAAAqcNhmTuSCxuA5MWagnPORyCoX805UYZo5bl7xNKs4a', 1, '676100b6c2afe.jpg'),
(14, 'Ammar', 'Jl Jalan skuy', 'Jawa TImur', 'Jember', '08123456789', 'ammar@gmail.com', 'Pria', '2019-12-21', '2991001876178721', '$2y$10$iBowcAjDAAAqcNhmTuSCxuA5MWagnPORyCoX805UYZo5bl7xNKs4a', 2, '5e15a93bb371b.jpg'),
(15, 'bintang', 'Jl Banjarsengon', 'Jawa Timur', 'Jember', '08322144718', 'bintang@gmail.com', 'Pria', '1999-04-08', '299100188123', '$2y$10$iBowcAjDAAAqcNhmTuSCxuA5MWagnPORyCoX805UYZo5bl7xNKs4a', 2, '5e15b0ac5724d.jpg'),
(16, 'dante', 'Jl maroko', 'Jawa Barat', 'Bandung', '08123456789', 'dante@gmail.com', 'Pria', '2000-12-06', '1233443211233212', '$2y$10$iBowcAjDAAAqcNhmTuSCxuA5MWagnPORyCoX805UYZo5bl7xNKs4a', 2, ''),
(17, 'aisyah', 'Jl. Diponegoro VII 73', 'Jawa Timur', 'Jember', '085735678159', 'aisyah@gmail.com', 'Wanita', '2020-01-15', '3509191412990213213', '$2y$10$iBowcAjDAAAqcNhmTuSCxuA5MWagnPORyCoX805UYZo5bl7xNKs4a', 2, '5e16c17bb55fa.jpg'),
(20, 'daffa', 'Jl. Patimura No. 89', 'Jawa Timur', 'Banyuwangi', '089677827716', 'daffa@gmail.com', 'Pria', '1999-05-14', '3509191412992321', '$2y$10$iBowcAjDAAAqcNhmTuSCxuA5MWagnPORyCoX805UYZo5bl7xNKs4a', 2, '5e1936fa16a27.jpg'),
(25, 'test', 'parung', 'jabar', 'bogor', '123456789', 'test@gmail.com', 'Pria', '2024-12-04', '2222222222222222222', '$2y$10$LZn5FWeE5qJIONq78rMm8u2g2MKTbtkpBxMK/VQgzSwtTC598x4lO', 3, '674ff3d4e175b.jpeg'),
(26, 'Bima', NULL, NULL, NULL, '123456789', 'bimdarma@gmail.com', NULL, NULL, NULL, '$2y$10$wW9XZOjob9QLFU1OMCURPuAG86EoOv0CUaqnwW8q/le6UHAy34huC', 3, NULL),
(27, 'dharma', NULL, NULL, NULL, '1234567', 'test@gmail.com', NULL, NULL, NULL, '$2y$10$bw15gRLyiERPtrjOYCWVcu051UZv6Ynnzg.z54wc6sM9OhhR3Fkn6', 3, NULL),
(28, 'farhan', 'cibubur', 'Jawa Barat', 'loss  enjes', '1234567', 'farhan@gmail.com', 'Pria', '2024-12-06', '2222222222222222222', '$2y$10$RtNI.203WnWWc6n4d6u9vecNOE0ya0vyxlLI.jZ919gQXVmyxZQTG', 2, '67532b000648c.png');

-- --------------------------------------------------------

--
-- Table structure for table `tipe_kamar`
--

CREATE TABLE `tipe_kamar` (
  `id_tipe` int(11) NOT NULL,
  `nama_tipe` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tipe_kamar`
--

INSERT INTO `tipe_kamar` (`id_tipe`, `nama_tipe`) VALUES
(1, 'reguler'),
(2, 'vip'),
(3, 'biasa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id_booking`),
  ADD KEY `id_kamar` (`id_kamar`),
  ADD KEY `id_pengguna` (`id_pengguna`),
  ADD KEY `id_kamar_2` (`id_kamar`,`id_pengguna`);

--
-- Indexes for table `hak_akses`
--
ALTER TABLE `hak_akses`
  ADD PRIMARY KEY (`id_akses`);

--
-- Indexes for table `info_kost`
--
ALTER TABLE `info_kost`
  ADD PRIMARY KEY (`id_kost`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indexes for table `jenis_pengeluaran`
--
ALTER TABLE `jenis_pengeluaran`
  ADD PRIMARY KEY (`id_jenis_pengeluaran`);

--
-- Indexes for table `jenis_status_pembayaran`
--
ALTER TABLE `jenis_status_pembayaran`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`id_kamar`),
  ADD KEY `id_tipe` (`id_tipe`,`id_layanan`),
  ADD KEY `id_layanan` (`id_layanan`);

--
-- Indexes for table `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`id_layanan`);

--
-- Indexes for table `lupa_password`
--
ALTER TABLE `lupa_password`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menghuni`
--
ALTER TABLE `menghuni`
  ADD PRIMARY KEY (`id_menghuni`),
  ADD KEY `id_kamar` (`id_kamar`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_menghuni` (`id_menghuni`),
  ADD KEY `id_status` (`id_status`);

--
-- Indexes for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id_pengeluaran`),
  ADD KEY `id_jenis_pengeluaran` (`id_jenis_pengeluaran`,`id_pengguna`),
  ADD KEY `pengeluaran_ibfk_2` (`id_pengguna`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD KEY `id_akses` (`id_akses`);

--
-- Indexes for table `tipe_kamar`
--
ALTER TABLE `tipe_kamar`
  ADD PRIMARY KEY (`id_tipe`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id_booking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `hak_akses`
--
ALTER TABLE `hak_akses`
  MODIFY `id_akses` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `info_kost`
--
ALTER TABLE `info_kost`
  MODIFY `id_kost` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jenis_pengeluaran`
--
ALTER TABLE `jenis_pengeluaran`
  MODIFY `id_jenis_pengeluaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jenis_status_pembayaran`
--
ALTER TABLE `jenis_status_pembayaran`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kamar`
--
ALTER TABLE `kamar`
  MODIFY `id_kamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `layanan`
--
ALTER TABLE `layanan`
  MODIFY `id_layanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lupa_password`
--
ALTER TABLE `lupa_password`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `menghuni`
--
ALTER TABLE `menghuni`
  MODIFY `id_menghuni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id_pengeluaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tipe_kamar`
--
ALTER TABLE `tipe_kamar`
  MODIFY `id_tipe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`id_kamar`) REFERENCES `kamar` (`id_kamar`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `info_kost`
--
ALTER TABLE `info_kost`
  ADD CONSTRAINT `info_kost_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE;

--
-- Constraints for table `kamar`
--
ALTER TABLE `kamar`
  ADD CONSTRAINT `kamar_ibfk_2` FOREIGN KEY (`id_tipe`) REFERENCES `tipe_kamar` (`id_tipe`),
  ADD CONSTRAINT `kamar_ibfk_4` FOREIGN KEY (`id_layanan`) REFERENCES `layanan` (`id_layanan`);

--
-- Constraints for table `menghuni`
--
ALTER TABLE `menghuni`
  ADD CONSTRAINT `menghuni_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `menghuni_ibfk_2` FOREIGN KEY (`id_kamar`) REFERENCES `kamar` (`id_kamar`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_menghuni`) REFERENCES `menghuni` (`id_menghuni`) ON DELETE CASCADE,
  ADD CONSTRAINT `pembayaran_ibfk_2` FOREIGN KEY (`id_status`) REFERENCES `jenis_status_pembayaran` (`id_status`) ON DELETE CASCADE;

--
-- Constraints for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD CONSTRAINT `pengeluaran_ibfk_1` FOREIGN KEY (`id_jenis_pengeluaran`) REFERENCES `jenis_pengeluaran` (`id_jenis_pengeluaran`),
  ADD CONSTRAINT `pengeluaran_ibfk_2` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE;

--
-- Constraints for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD CONSTRAINT `pengguna_ibfk_1` FOREIGN KEY (`id_akses`) REFERENCES `hak_akses` (`id_akses`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
