-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2019 at 02:11 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tsm`
--

-- --------------------------------------------------------

--
-- Table structure for table `statistik`
--

CREATE TABLE `statistik` (
  `id` int(8) NOT NULL,
  `ip` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `hits` int(8) NOT NULL,
  `online` varchar(20) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `statistik`
--

INSERT INTO `statistik` (`id`, `ip`, `tanggal`, `hits`, `online`) VALUES
(1, '127.0.0.1', '2014-03-17', 63, '1395034465'),
(2, '127.0.0.1', '2014-03-18', 53, '1395129935'),
(3, '127.0.0.1', '2014-03-22', 122, '1395493770'),
(4, '127.0.0.1', '2014-04-17', 50, '1397733464'),
(5, '127.0.0.1', '2014-04-18', 55, '1397839756'),
(6, '127.0.0.1', '2014-04-19', 26, '1397883619'),
(7, '127.0.0.1', '2014-05-28', 9, '1401282009'),
(8, '127.0.0.1', '2014-05-31', 39, '1401531874'),
(9, '127.0.0.1', '2014-06-03', 30, '1401783305'),
(10, '127.0.0.1', '2014-06-09', 12, '1402299670'),
(11, '127.0.0.1', '2014-06-18', 8, '1403092882'),
(12, '127.0.0.1', '2014-06-20', 1954, '1403269933'),
(13, '127.0.0.1', '2014-10-15', 86, '1413374159'),
(14, '127.0.0.1', '2014-10-22', 107, '1413951013'),
(15, '127.0.0.1', '2014-10-24', 3, '1414149898'),
(16, '127.0.0.1', '2014-11-04', 20, '1415070918'),
(17, '127.0.0.1', '2014-11-05', 46, '1415154829'),
(18, '127.0.0.1', '2014-11-11', 24, '1415666142'),
(19, '127.0.0.1', '2014-11-23', 35, '1416719646'),
(20, '127.0.0.1', '2015-01-02', 196, '1420215747'),
(21, '127.0.0.1', '2015-01-03', 24, '1420264639'),
(22, '127.0.0.1', '2015-01-06', 45, '1420511116'),
(23, '127.0.0.1', '2015-02-01', 271, '1422770430'),
(24, '::1', '2019-04-27', 64, '1556369551'),
(25, '::1', '2019-04-29', 3, '1556543309'),
(26, '::1', '2019-05-09', 187, '1557405886'),
(27, '::1', '2019-06-26', 1, '1561531694');

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `kode_admin` varchar(8) COLLATE latin1_general_ci NOT NULL,
  `username` varchar(25) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(25) COLLATE latin1_general_ci NOT NULL,
  `telepon` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `gambar` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `status` enum('Aktif','Tidak Aktif') COLLATE latin1_general_ci NOT NULL DEFAULT 'Aktif'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`kode_admin`, `username`, `password`, `telepon`, `email`, `gambar`, `status`) VALUES
('ADM02', 'a', 'a', '0234567845678', 'admin@yahoo.com', 'wifi.png', 'Aktif'),
('ADM03', 'array', 'array', '02345678923456', 'array@a.com', 'keys.jpg', 'Aktif'),
('ADM05', 'q', 'q', 'qq', 'q', '7.-SAMSUNG_COFFEE_CAFE_LOGO_GRAPHIC-960x960.jpg', 'Aktif'),
('ADM04', 'alfathan', 'alfathan16', '08364789020', 'alfthn16@gmail.com', 'Picture 003.jpg', 'Aktif'),
('ADM06', 'q', 'q', 'q', 'q', 'download9.jpg.jpg', 'Tidak Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tb_customer`
--

CREATE TABLE `tb_customer` (
  `kode_customer` varchar(15) NOT NULL,
  `nama_customer` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `telepon` int(15) NOT NULL,
  `telepon_perusahaan` int(15) NOT NULL,
  `alamat` text NOT NULL,
  `status` varchar(15) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_customer`
--

INSERT INTO `tb_customer` (`kode_customer`, `nama_customer`, `email`, `telepon`, `telepon_perusahaan`, `alamat`, `status`, `keterangan`) VALUES
('CST01', 'q', 'q', 0, 0, 'q', 'Aktif', 'q'),
('CST02', 'q', 'q', 0, 0, 'q', 'Tidak Aktif', 'q');

-- --------------------------------------------------------

--
-- Table structure for table `tb_order`
--

CREATE TABLE `tb_order` (
  `kode_order` varchar(20) NOT NULL,
  `kode_customer` varchar(20) NOT NULL,
  `tanggal_order` varchar(20) NOT NULL,
  `waktu_order` varchar(20) NOT NULL,
  `surat_legal` varchar(20) NOT NULL,
  `alamat_pengiriman` varchar(20) NOT NULL,
  `uraian` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `keterangan` varchar(20) NOT NULL,
  `harga` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_order`
--

INSERT INTO `tb_order` (`kode_order`, `kode_customer`, `tanggal_order`, `waktu_order`, `surat_legal`, `alamat_pengiriman`, `uraian`, `status`, `keterangan`, `harga`) VALUES
('ODR1905001', 'CST01', '2019-05-9', '19:43:23', '7.-SAMSUNG_COFFEE_CA', 'q', 'q', 'Aktif', 'q', 'q'),
('ODR1905002', '-- Pilih --', '2019-05-31', '11:26:36', 'avatar.jpg', '', '', 'Aktif', '', ''),
('ODR1906001', '-- Pilih --', '2019-06-21', '19:27:28', 'Mobile-legends-WallP', 'jl msajjaljk', 'barang', 'Aktif', 'fddff chavron', '439990'),
('ODR1907001', '-- Pilih --', '2019-07-2', '13:52:33', 'coffee_cup_wooden_su', 'muncang', 'barang tambang', 'Aktif', 'kirim ke kalimantan', '89'),
('ODR1907002', '-- Pilih --', '2019-07-2', '16:52:05', 'Cargo-Ship-020.jpg', 'qjsjj', 'ququ', 'Aktif', 'jwj', '111'),
('ODR1907003', '-- Pilih --', '2019-07-3', '21:17:27', 'avatar.jpg', 'hhfhf', 'hghgg', 'Aktif', 'rytrfg', 'gggdgd');

-- --------------------------------------------------------

--
-- Table structure for table `tb_order_detail`
--

CREATE TABLE `tb_order_detail` (
  `id` varchar(15) NOT NULL,
  `kode_order` varchar(15) NOT NULL,
  `nama_barang` varchar(15) NOT NULL,
  `spesifikasi` varchar(15) NOT NULL,
  `catatan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_order_detail`
--

INSERT INTO `tb_order_detail` (`id`, `kode_order`, `nama_barang`, `spesifikasi`, `catatan`) VALUES
('', 'ODR1905001', 'q', 'q', 'q');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembayaran`
--

CREATE TABLE `tb_pembayaran` (
  `kode_pembayaran` varchar(15) NOT NULL,
  `kode_order` varchar(15) NOT NULL,
  `tanggal_pembayaran` varchar(15) NOT NULL,
  `waktu_pembayaran` varchar(15) NOT NULL,
  `nominal` varchar(20) NOT NULL,
  `nama_bank` varchar(15) NOT NULL,
  `status` varchar(15) NOT NULL,
  `keterangan` varchar(15) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pembayaran`
--

INSERT INTO `tb_pembayaran` (`kode_pembayaran`, `kode_order`, `tanggal_pembayaran`, `waktu_pembayaran`, `nominal`, `nama_bank`, `status`, `keterangan`, `gambar`) VALUES
('PBN1905001', 'ODR1905001', '2019-05-9', '19:44:36', 'q', 'q', 'Aktif', 'q', '7.-SAMSUNG_COFFEE_CAFE_LOGO_GRAPHIC-960x960.jpg'),
('PBN1905002', 'ODR1905001', '2019-05-15', '11:14:54', '1', 'q', 'Tidak Aktif', 'q', 'download9.jpg.jpg'),
('PBN1906001', '-- Pilih --', '2019-06-29', '20:52:42', 'rp/33', 'ss', 'Aktif', 'dfldffdfsfsf', 'Cargo-Ship-020.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tracking`
--

CREATE TABLE `tb_tracking` (
  `id` varchar(15) NOT NULL,
  `kode_order` varchar(15) NOT NULL,
  `nama_barang` varchar(15) NOT NULL,
  `spesifikasi` varchar(20) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_tracking`
--

INSERT INTO `tb_tracking` (`id`, `kode_order`, `nama_barang`, `spesifikasi`, `status`) VALUES
('', 'ODR1905001', 'q', 'q', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `kode_user` varchar(20) NOT NULL,
  `nama_user` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `telepon` int(15) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL,
  `status` varchar(20) NOT NULL,
  `keterangan` varchar(20) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`kode_user`, `nama_user`, `email`, `telepon`, `username`, `password`, `status`, `keterangan`, `gambar`) VALUES
('USR01', 'Dedim', 'd@gmail.com', 2147483647, 'd', 'd', 'Aktif', '-', '02-GAWATT-emotions.jpg'),
('USR02', 'Arman', 'alfathan.rizki.r@gma', 0, 'asuharman', '123', 'Aktif', '', 'avatar.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `statistik`
--
ALTER TABLE `statistik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`kode_admin`);

--
-- Indexes for table `tb_customer`
--
ALTER TABLE `tb_customer`
  ADD PRIMARY KEY (`kode_customer`);

--
-- Indexes for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`kode_order`);

--
-- Indexes for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD PRIMARY KEY (`kode_pembayaran`);

--
-- Indexes for table `tb_tracking`
--
ALTER TABLE `tb_tracking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`kode_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `statistik`
--
ALTER TABLE `statistik`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
