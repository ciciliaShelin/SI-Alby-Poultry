-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2020 at 07:07 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alby_poultry1`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `deskripsi` varchar(200) NOT NULL,
  `harga` int(25) NOT NULL,
  `stok` int(11) NOT NULL,
  `gambar_brg` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `deskripsi`, `harga`, `stok`, `gambar_brg`) VALUES
(1, 'Talang Pakan', 'Tempat Makanan Ayam', 9000, 2497, 'talangpakan.jpg'),
(14, 'Gasolek', 'Pemanas Ruangan Kandang', 1250000, 1000, 'gasolek.jpg'),
(15, 'Super Feeder', 'Tempat pakan ayam inovasi baru', 20000, 1000, 'superfeeder.jpg'),
(16, 'Baby Chick Feeder', 'Tempat pakan anak ayam', 14000, 1000, 'babychick.jpg'),
(17, 'TMAO', 'Tempat Minum Ayam Otomatis', 125000, 1000, 'otomatis.jpg'),
(18, 'TMAM', 'Tempat Minum Ayam Manual', 16000, 1000, 'tempatminummanual.jpg'),
(19, 'Baterai 4', 'Kandang Ayam Pintu 4', 135000, 1000, 'kandang galvanis 4 pintu.jpg'),
(20, 'Baterai 6', 'Kandang Ayam Pintu 6', 160000, 1000, 'kandang galvanis 6 pintu.jpeg'),
(21, 'Fortevit (250 gr)', 'Vitamin Pertumbuhan dan Pencegah Stress', 179800, 1000, 'fortevit1.jpg'),
(22, 'Egg Stimulan (100 gr)', 'Vitamin Ayam Bertelur', 17500, 1000, 'vitamin egg stimulant.jpg'),
(23, 'Rak Telur', 'Rak Telur Ayam Plastik', 12000, 1000, 'raktelurpl.jpg'),
(24, 'Niple Drinker', 'Alat Minum Ayam', 4000, 1000, 'nipeldrinker.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id_invoice` int(11) NOT NULL,
  `nama` varchar(56) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `tgl_pesan` datetime NOT NULL,
  `batas_bayar` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id_invoice`, `nama`, `alamat`, `tgl_pesan`, `batas_bayar`) VALUES
(1, 'Eva', 'Ngepeh', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Risa', 'Jember', '2020-12-03 20:29:56', '2020-12-04 20:29:56'),
(3, 'Sindi', 'Ngepeh', '2020-12-07 13:56:57', '2020-12-08 13:56:57'),
(4, 'Eva', 'Ngepeh', '2020-12-08 15:49:54', '2020-12-09 15:49:54');

-- --------------------------------------------------------

--
-- Table structure for table `kab`
--

CREATE TABLE `kab` (
  `kd_kab` int(5) NOT NULL,
  `code` varchar(5) NOT NULL,
  `provinsi` varchar(25) NOT NULL,
  `kab_kota` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kab`
--

INSERT INTO `kab` (`kd_kab`, `code`, `provinsi`, `kab_kota`) VALUES
(1, 'JBG', 'JAWA TIMUR', 'JOMBANG'),
(2, 'JBR', 'JAWA TIMUR', 'JEMBER'),
(3, 'BWI', 'JAWA TIMUR', 'BANYUWANGI'),
(4, 'BWS', 'JAWA TIMUR', 'BONDOWOSO');

-- --------------------------------------------------------

--
-- Table structure for table `kec`
--

CREATE TABLE `kec` (
  `sys_code` int(11) NOT NULL,
  `kecamatan` varchar(20) NOT NULL,
  `kd_kab` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kec`
--

INSERT INTO `kec` (`sys_code`, `kecamatan`, `kd_kab`) VALUES
(1, 'Bandar Kedungmulyo', 1),
(2, 'Bareng', 1),
(3, 'Ngoro', 1),
(4, 'Gudo', 1),
(5, 'Jogoroto', 1),
(6, 'Diwek', 1),
(7, 'Jombang', 1),
(8, 'Kesamben', 1),
(9, 'Kabuh', 1),
(10, 'Kudu', 1),
(11, 'Megaluh', 1),
(12, 'Mojowarno', 1),
(13, 'Wonosalam', 1),
(14, 'Ploso', 1),
(15, 'Sumobito', 1),
(16, 'Tembelang', 1),
(17, 'Plandaan', 1),
(18, 'Peterongan', 1),
(19, 'Perak', 1),
(20, 'Ngusikan', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kel`
--

CREATE TABLE `kel` (
  `kd_kel` int(11) NOT NULL,
  `kd_kab` int(11) NOT NULL,
  `sys_code` int(11) NOT NULL,
  `kelurahan` int(25) NOT NULL,
  `kode_pos` int(11) NOT NULL,
  `price` int(15) NOT NULL,
  `cepat` int(7) NOT NULL,
  `lama` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pembeli`
--

CREATE TABLE `pembeli` (
  `id_pembeli` int(11) NOT NULL,
  `nama_pembeli` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(11) NOT NULL,
  `no_tlp` varchar(14) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(35) NOT NULL,
  `password` varchar(15) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `pas_foto` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembeli`
--

INSERT INTO `pembeli` (`id_pembeli`, `nama_pembeli`, `jenis_kelamin`, `no_tlp`, `username`, `email`, `password`, `alamat`, `pas_foto`) VALUES
(1, 'Eva Agustin', 'Perempuan', '085784594914', 'evarahayu', 'evaagustin766@gmail.com', '1234', 'Ngepeh', '');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(11) NOT NULL,
  `id_invoice` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `jumlah` int(5) NOT NULL,
  `harga` int(12) NOT NULL,
  `pilihan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id`, `id_invoice`, `id_barang`, `nama_barang`, `jumlah`, `harga`, `pilihan`) VALUES
(1, 1, 1, 'Talang Pakan', 1, 9000, ''),
(2, 2, 1, 'Talang Pakan', 1, 9000, ''),
(3, 3, 1, 'Talang Pakan', 2, 9000, ''),
(4, 4, 1, 'Talang Pakan', 1, 9000, '');

--
-- Triggers `pesanan`
--
DELIMITER $$
CREATE TRIGGER `pesanan_penjualan` AFTER INSERT ON `pesanan` FOR EACH ROW BEGIN
	UPDATE barang SET stok = stok-NEW.jumlah
    WHERE id_barang = NEW.id_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `testi`
--

CREATE TABLE `testi` (
  `id_testi` int(11) NOT NULL,
  `gambar` text NOT NULL,
  `keterangan` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(5) NOT NULL,
  `id_pembeli` int(11) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `grand_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_tlp` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role_id` tinyint(1) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `no_tlp`, `email`, `username`, `password`, `role_id`, `gambar`) VALUES
(2, 'Eva', '', 'evarahayu766@gmail.com', 'macarina', '123456', 1, ''),
(5, 'Triana', '085784594914', 'ketrinmarga@gmail.com', 'ana123', 'vava', 2, ''),
(6, 'Ketrina', '081234567821', 'ketrina@gmail.com', 'admin', '1234', 1, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id_invoice`);

--
-- Indexes for table `kab`
--
ALTER TABLE `kab`
  ADD PRIMARY KEY (`kd_kab`);

--
-- Indexes for table `kec`
--
ALTER TABLE `kec`
  ADD PRIMARY KEY (`sys_code`);

--
-- Indexes for table `kel`
--
ALTER TABLE `kel`
  ADD PRIMARY KEY (`kd_kel`);

--
-- Indexes for table `pembeli`
--
ALTER TABLE `pembeli`
  ADD PRIMARY KEY (`id_pembeli`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testi`
--
ALTER TABLE `testi`
  ADD PRIMARY KEY (`id_testi`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_pembeli` (`id_pembeli`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id_invoice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kab`
--
ALTER TABLE `kab`
  MODIFY `kd_kab` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kec`
--
ALTER TABLE `kec`
  MODIFY `sys_code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `kel`
--
ALTER TABLE `kel`
  MODIFY `kd_kel` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pembeli`
--
ALTER TABLE `pembeli`
  MODIFY `id_pembeli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `testi`
--
ALTER TABLE `testi`
  MODIFY `id_testi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_pembeli`) REFERENCES `pembeli` (`id_pembeli`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
