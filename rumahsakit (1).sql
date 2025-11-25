-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 29, 2025 at 03:07 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rumahsakit`
--

-- --------------------------------------------------------
-- ----------------------rumahsakitusers----------------------------------
-- 1️⃣ Buat tabel jenis_keahlian terlebih dahulu (karena dipakai oleh data_dokter)
-- --------------------------------------------------------

DROP TABLE IF EXISTS `jenis_keahlian`;
CREATE TABLE `jenis_keahlian` (
  `Kode_keahlian` VARCHAR(10) NOT NULL,
  `Nama_Keahlian` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`Kode_keahlian`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data awal jenis keahlian
INSERT INTO `jenis_keahlian` (`Kode_keahlian`, `Nama_Keahlian`) VALUES
('K01', 'Dokter Umum'),
('K02', 'Dokter Gigi'),
('K03', 'Dokter Spesialis Anak'),
('K04', 'Dokter Bedah'),
('K05', 'Dokter Kandungan'),
('K06', 'Dokter Kulit dan Kelamin'),
('K07', 'Dokter THT'),
('K08', 'Dokter Penyakit Dalam');

CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);


-- --------------------------------------------------------
-- 2️⃣ Buat tabel data_dokter dan relasinya
-- --------------------------------------------------------

DROP TABLE IF EXISTS `data_dokter`;
CREATE TABLE `data_dokter` (
  `id_dokter` varchar(10) NOT NULL,
  `nm_dokter` varchar(100) DEFAULT NULL,
  `JK` enum('L','P') DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `pendidikan` varchar(100) DEFAULT NULL,
  `alamat` text,
  `Kode_Keahlian` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_dokter`),
  KEY `Kode_Keahlian` (`Kode_Keahlian`),
  CONSTRAINT `data_dokter_ibfk_1` FOREIGN KEY (`Kode_Keahlian`) REFERENCES `jenis_keahlian` (`Kode_keahlian`) ON UPDATE CASCADE ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------
-- 3️⃣ (Opsional) Tambahkan data dummy untuk tes dropdown
-- --------------------------------------------------------

INSERT INTO `data_dokter` (`id_dokter`, `nm_dokter`, `JK`, `status`, `tgl_lahir`, `tempat_lahir`, `pendidikan`, `alamat`, `Kode_Keahlian`)
VALUES
('D001', 'dr. Andi Setiawan', 'L', 'Aktif', '1980-05-10', 'Malang', 'S1 Kedokteran', 'Jl. Merdeka No. 1', 'K01');

COMMIT;
--
-- Table structure for table `data_pasien`
--

CREATE TABLE `data_pasien` (
  `Id_Pasien` varchar(10) NOT NULL,
  `Jenis_Pasien` varchar(50) DEFAULT NULL,
  `Nm_Pasien` varchar(100) DEFAULT NULL,
  `Tgl_Masuk` date DEFAULT NULL,
  `Tmpt_Lahir` varchar(50) DEFAULT NULL,
  `Tgl_lahir` date DEFAULT NULL,
  `Umur` int DEFAULT NULL,
  `JK` enum('L','P') DEFAULT NULL,
  `Alamat` text,
  `Tlpn` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `data_ruang`
--

CREATE TABLE `data_ruang` (
  `Kelas` varchar(10) NOT NULL,
  `nm_Rinap` varchar(100) DEFAULT NULL,
  `Tarif` decimal(10,2) DEFAULT NULL,
  `Jum_RInap` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `detail_inap`
--

CREATE TABLE `detail_inap` (
  `Id_Pasien` varchar(10) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `tgl_inap` date NOT NULL,
  `Tgl_keluarinap` date DEFAULT NULL,
  `total_Inap` decimal(10,2) DEFAULT NULL,
  `lama_inap` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `detail_obat`
--

CREATE TABLE `detail_obat` (
  `Kode_Resep` varchar(10) NOT NULL,
  `kode_obat` varchar(10) NOT NULL,
  `Juml_obat` int DEFAULT NULL,
  `aturan_Pakai` text,
  `id_Pasien` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `detail_tindak_medis`
--

CREATE TABLE `detail_tindak_medis` (
  `Id_Pasien` varchar(10) NOT NULL,
  `Kode_tindakMedis` varchar(10) NOT NULL,
  `Jum_alatmedik` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_keahlian`
--

CREATE TABLE `jenis_keahlian` (
  `Kode_keahlian` varchar(10) NOT NULL,
  `Nmbidang_keahlian` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kartu_status`
--

CREATE TABLE `kartu_status` (
  `id_Pasien` varchar(10) DEFAULT NULL,
  `tgl_periksa` date DEFAULT NULL,
  `keluhan` text,
  `diagnosa` text,
  `TB` float DEFAULT NULL,
  `BB` float DEFAULT NULL,
  `Tensi_darah` varchar(10) DEFAULT NULL,
  `id_dokter` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `Kode_obat` varchar(10) NOT NULL,
  `nm_obat` varchar(100) DEFAULT NULL,
  `harga_obat` decimal(10,2) DEFAULT NULL,
  `tgl_kadaluarsa` date DEFAULT NULL,
  `satuan` varchar(20) DEFAULT NULL,
  `letak_obat` varchar(50) DEFAULT NULL,
  `stok` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `resep_obat`
--

CREATE TABLE `resep_obat` (
  `Kode_Resep` varchar(10) NOT NULL,
  `Id_Pasien` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `struk_obat`
--

CREATE TABLE `struk_obat` (
  `No_Struk` varchar(10) NOT NULL,
  `tgl_pembayaran` date DEFAULT NULL,
  `total_bayar` decimal(10,2) DEFAULT NULL,
  `Kode_Resep` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tindak_medis`
--

CREATE TABLE `tindak_medis` (
  `kode_tindakMedis` varchar(10) NOT NULL,
  `nm_alatmedik` varchar(100) DEFAULT NULL,
  `Jenis_medik` varchar(50) DEFAULT NULL,
  `jum_alatmedik` int DEFAULT NULL,
  `harga_alatMedik` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visite_dokter`
--

CREATE TABLE `visite_dokter` (
  `Id_dokter` varchar(10) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `Tarif_visite` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_dokter`
--
ALTER TABLE `data_dokter`
  ADD PRIMARY KEY (`id_dokter`),
  ADD KEY `Kode_Keahlian` (`Kode_Keahlian`);

--
-- Indexes for table `data_pasien`
--
ALTER TABLE `data_pasien`
  ADD PRIMARY KEY (`Id_Pasien`);

--
-- Indexes for table `data_ruang`
--
ALTER TABLE `data_ruang`
  ADD PRIMARY KEY (`Kelas`);

--
-- Indexes for table `detail_inap`
--
ALTER TABLE `detail_inap`
  ADD PRIMARY KEY (`Id_Pasien`,`kelas`,`tgl_inap`),
  ADD KEY `kelas` (`kelas`);

--
-- Indexes for table `detail_obat`
--
ALTER TABLE `detail_obat`
  ADD PRIMARY KEY (`Kode_Resep`,`kode_obat`),
  ADD KEY `kode_obat` (`kode_obat`),
  ADD KEY `id_Pasien` (`id_Pasien`);

--
-- Indexes for table `detail_tindak_medis`
--
ALTER TABLE `detail_tindak_medis`
  ADD PRIMARY KEY (`Id_Pasien`,`Kode_tindakMedis`),
  ADD KEY `Kode_tindakMedis` (`Kode_tindakMedis`);

--
-- Indexes for table `jenis_keahlian`
--
ALTER TABLE `jenis_keahlian`
  ADD PRIMARY KEY (`Kode_keahlian`);

--
-- Indexes for table `kartu_status`
--
ALTER TABLE `kartu_status`
  ADD KEY `id_Pasien` (`id_Pasien`),
  ADD KEY `id_dokter` (`id_dokter`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`Kode_obat`);

--
-- Indexes for table `resep_obat`
--
ALTER TABLE `resep_obat`
  ADD PRIMARY KEY (`Kode_Resep`),
  ADD KEY `Id_Pasien` (`Id_Pasien`);

--
-- Indexes for table `struk_obat`
--
ALTER TABLE `struk_obat`
  ADD PRIMARY KEY (`No_Struk`),
  ADD KEY `Kode_Resep` (`Kode_Resep`);

--
-- Indexes for table `tindak_medis`
--
ALTER TABLE `tindak_medis`
  ADD PRIMARY KEY (`kode_tindakMedis`);

--
-- Indexes for table `visite_dokter`
--
ALTER TABLE `visite_dokter`
  ADD PRIMARY KEY (`Id_dokter`,`kelas`),
  ADD KEY `kelas` (`kelas`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_dokter`
--
ALTER TABLE `data_dokter`
  ADD CONSTRAINT `data_dokter_ibfk_1` FOREIGN KEY (`Kode_Keahlian`) REFERENCES `jenis_keahlian` (`Kode_keahlian`);

--
-- Constraints for table `detail_inap`
--
ALTER TABLE `detail_inap`
  ADD CONSTRAINT `detail_inap_ibfk_1` FOREIGN KEY (`Id_Pasien`) REFERENCES `data_pasien` (`Id_Pasien`),
  ADD CONSTRAINT `detail_inap_ibfk_2` FOREIGN KEY (`kelas`) REFERENCES `data_ruang` (`Kelas`);

--
-- Constraints for table `detail_obat`
--
ALTER TABLE `detail_obat`
  ADD CONSTRAINT `detail_obat_ibfk_1` FOREIGN KEY (`Kode_Resep`) REFERENCES `resep_obat` (`Kode_Resep`),
  ADD CONSTRAINT `detail_obat_ibfk_2` FOREIGN KEY (`kode_obat`) REFERENCES `obat` (`Kode_obat`),
  ADD CONSTRAINT `detail_obat_ibfk_3` FOREIGN KEY (`id_Pasien`) REFERENCES `data_pasien` (`Id_Pasien`);

--
-- Constraints for table `detail_tindak_medis`
--
ALTER TABLE `detail_tindak_medis`
  ADD CONSTRAINT `detail_tindak_medis_ibfk_1` FOREIGN KEY (`Id_Pasien`) REFERENCES `data_pasien` (`Id_Pasien`),
  ADD CONSTRAINT `detail_tindak_medis_ibfk_2` FOREIGN KEY (`Kode_tindakMedis`) REFERENCES `tindak_medis` (`kode_tindakMedis`);

--
-- Constraints for table `kartu_status`
--
ALTER TABLE `kartu_status`
  ADD CONSTRAINT `kartu_status_ibfk_1` FOREIGN KEY (`id_Pasien`) REFERENCES `data_pasien` (`Id_Pasien`),
  ADD CONSTRAINT `kartu_status_ibfk_2` FOREIGN KEY (`id_dokter`) REFERENCES `data_dokter` (`id_dokter`);

--
-- Constraints for table `resep_obat`
--
ALTER TABLE `resep_obat`
  ADD CONSTRAINT `resep_obat_ibfk_1` FOREIGN KEY (`Id_Pasien`) REFERENCES `data_pasien` (`Id_Pasien`);

--
-- Constraints for table `struk_obat`
--
ALTER TABLE `struk_obat`
  ADD CONSTRAINT `struk_obat_ibfk_1` FOREIGN KEY (`Kode_Resep`) REFERENCES `resep_obat` (`Kode_Resep`);

--
-- Constraints for table `visite_dokter`
--
ALTER TABLE `visite_dokter`
  ADD CONSTRAINT `visite_dokter_ibfk_1` FOREIGN KEY (`Id_dokter`) REFERENCES `data_dokter` (`id_dokter`),
  ADD CONSTRAINT `visite_dokter_ibfk_2` FOREIGN KEY (`kelas`) REFERENCES `data_ruang` (`Kelas`);
COMMIT;



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
