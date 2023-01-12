-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2023 at 05:28 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demencare`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id_akun` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `role` varchar(255) NOT NULL,
  `photo_profile` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id_akun`, `first_name`, `last_name`, `username`, `email`, `password`, `role`, `photo_profile`) VALUES
(1, 'Marc', 'Gany', 'pasien', 'pasien@gmail.com', '$2y$10$/TXoQnpvteLjylmjLmlWE.yriAQekCaW/T4bc785LBArpT975a.16', 'pasien', 'BLACK-icon1.jpg'),
(2, 'Mahendra', 'Dwi', 'mahendra', 'mahendra@gmail.com', '$2y$10$Fq2REA0zPWsuIn5Ds6xcD.hHW0P78DATiDI02rAswRMyKfi6qKlOm', 'dokter', 'BLACK-icon2.jpg'),
(3, 'Razzaq', 'Adi', 'dokter', 'dokter@gmail.com', '$2y$10$XK4DkLr5D79.dPFKGCrVhegut91rvb6L5EiXVJFwCJTbhIMVxLr6C', 'dokter', 'BLACK-icon3.jpg'),
(4, 'Kali', 'Hari', 'pasien1', 'pasien2@gmail.com', '$2y$10$HpajqOIbRxuVWYicMjOh6ON3Y3vKa42PB52LsYJrDOQQqVNkGjVc.', 'pasien', 'BLACK-icon4.jpg'),
(5, 'Rosa', 'Lin', 'dokter1', 'dokter1@gmail.com', '$2y$10$5mtdkj2mij2qUCv8qFbXGee7uGwxYY40yck3pnjZQKVvnK0UQ4i52', 'dokter', 'waist-up-portrait-handsome-serious-unshaven-male-keeps-hands-together-dressed-dark-blue-shirt-has-talk-with-interlocutor-stands-against-white-wall-self-confident-man-freelancer.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `app`
--

CREATE TABLE `app` (
  `id_app` int(11) NOT NULL,
  `id_akun` int(11) NOT NULL,
  `nama_pasien` varchar(255) NOT NULL,
  `dokter` varchar(255) NOT NULL,
  `tanggal` text NOT NULL,
  `jam` text NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `alasan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `app`
--

INSERT INTO `app` (`id_app`, `id_akun`, `nama_pasien`, `dokter`, `tanggal`, `jam`, `status`, `alasan`) VALUES
(5610, 1, 'Marc Gany', 'Rosa Lin', '2023-01-13', '08:30', 'Approved', NULL),
(5612, 4, 'Kali Hari', 'Rosa Lin', '2023-01-05', '08:30', 'Approved', NULL),
(5613, 1, 'Marc Gany', 'Rosa Lin', '2023-01-13', '10:30', 'Decline', 'Jam Libur'),
(5614, 4, 'Kali Hari', 'Rosa Lin', '2023-01-05', '08:30', 'Done', NULL),
(5615, 4, 'Kali Hari', 'Rosa Lin', '2023-01-13', '08:30', 'Decline', 'Jam Libur');

-- --------------------------------------------------------

--
-- Table structure for table `diagnosis`
--

CREATE TABLE `diagnosis` (
  `id_diagnosis` int(11) NOT NULL,
  `nama_pasien` varchar(255) NOT NULL,
  `dokter` varchar(255) NOT NULL,
  `tanggal` text NOT NULL,
  `data_diagnosis` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `diagnosis`
--

INSERT INTO `diagnosis` (`id_diagnosis`, `nama_pasien`, `dokter`, `tanggal`, `data_diagnosis`) VALUES
(7200, 'Amalia', 'Rosa Lin', '2023-01-19', 'Pasien mengalami demensia tingkat 1');

-- --------------------------------------------------------

--
-- Table structure for table `medpre`
--

CREATE TABLE `medpre` (
  `id_medpre` int(11) NOT NULL,
  `nama_pasien` varchar(255) NOT NULL,
  `nama_obat` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `dosis` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medpre`
--

INSERT INTO `medpre` (`id_medpre`, `nama_pasien`, `nama_obat`, `tanggal`, `dosis`) VALUES
(2, 'Kali Hari', 'Galantamin', '2023-01-15', 'Minum Terus');

-- --------------------------------------------------------

--
-- Table structure for table `medrec`
--

CREATE TABLE `medrec` (
  `id_medrec` int(11) NOT NULL,
  `nama_pasien` varchar(255) NOT NULL,
  `dokter` varchar(255) NOT NULL,
  `tanggal` text NOT NULL,
  `data_medrec` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medrec`
--

INSERT INTO `medrec` (`id_medrec`, `nama_pasien`, `dokter`, `tanggal`, `data_medrec`) VALUES
(1503, 'Kali Hari', 'Rosa Lin', '2023-01-13', 'Demensia Tahap 2');

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id_obat` int(12) NOT NULL,
  `nama_obat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id_obat`, `nama_obat`) VALUES
(1, 'Rivastigmin'),
(2, 'Donepezil Hidroklorida'),
(3, 'Galantamin'),
(4, 'Memantin Hidroklorida');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id_test` int(11) NOT NULL COMMENT 'AUTO_INCREMENT',
  `id_akun` int(11) NOT NULL,
  `nama_pasien` varchar(255) NOT NULL,
  `hasil` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id_test`, `id_akun`, `nama_pasien`, `hasil`) VALUES
(256, 1, 'Marc Gany', 'Testt');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indexes for table `app`
--
ALTER TABLE `app`
  ADD PRIMARY KEY (`id_app`);

--
-- Indexes for table `diagnosis`
--
ALTER TABLE `diagnosis`
  ADD PRIMARY KEY (`id_diagnosis`);

--
-- Indexes for table `medpre`
--
ALTER TABLE `medpre`
  ADD PRIMARY KEY (`id_medpre`);

--
-- Indexes for table `medrec`
--
ALTER TABLE `medrec`
  ADD PRIMARY KEY (`id_medrec`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id_test`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `app`
--
ALTER TABLE `app`
  MODIFY `id_app` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5627;

--
-- AUTO_INCREMENT for table `diagnosis`
--
ALTER TABLE `diagnosis`
  MODIFY `id_diagnosis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7203;

--
-- AUTO_INCREMENT for table `medpre`
--
ALTER TABLE `medpre`
  MODIFY `id_medpre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `medrec`
--
ALTER TABLE `medrec`
  MODIFY `id_medrec` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1504;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id_obat` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id_test` int(11) NOT NULL AUTO_INCREMENT COMMENT 'AUTO_INCREMENT', AUTO_INCREMENT=258;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
