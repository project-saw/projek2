-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2023 at 05:42 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sembako`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jk` enum('Laki-laki','Perempuan') NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_hp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`, `nama`, `jk`, `email`, `no_hp`) VALUES
('admin', 'admin', 'si mimin', 'Perempuan', 'adminmimin@gmail.com', '081212121212'),
('ninizar', '121212', 'Nizar Abdul Kholiq', 'Laki-laki', 'kholizar@gmail.com', '081234567899'),
('Nissin', 'nissin', 'Nissin Company', 'Laki-laki', 'nissincomkw@gmail.com', '083819888781');

-- --------------------------------------------------------

--
-- Table structure for table `bahan_pokok`
--

CREATE TABLE `bahan_pokok` (
  `id_sembako` varchar(11) CHARACTER SET latin1 NOT NULL,
  `nama_sembako` varchar(50) CHARACTER SET latin1 NOT NULL,
  `harga` int(10) NOT NULL,
  `deskripsi` text CHARACTER SET latin1 NOT NULL,
  `gambar` varchar(25) CHARACTER SET latin1 NOT NULL,
  `merk` varchar(155) NOT NULL,
  `stock` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bahan_pokok`
--

INSERT INTO `bahan_pokok` (`id_sembako`, `nama_sembako`, `harga`, `deskripsi`, `gambar`, `merk`, `stock`) VALUES
('100231', 'Beras  5kg ', 21000, 'Beras berkualitas tinggi yang mantap', 'beras1.jpg', 'fortune', 10),
('121002', 'Gula Pasir', 12000, 'Harga Gula Pasir : \r\n\r\n- Rp. 13.000,00 / Kg', 'gula1.jpg', 'Sari ayu', -2),
('121003', 'Garam', 5000, 'Harga Garam : \r\n\r\n- Rp. 5.000,00 / bungkus', 'garam1.jpg', 'Cap batu', 0),
('121004', 'Minyak Goreng', 20000, 'Harga Minyak Goreng : \r\n\r\n- Rp. 20.000,00 / Liter', 'minyak1.jpg', 'Bimoli', 18),
('121005', 'Mentega ', 6000, 'Harga Mentega : \r\n\r\n- Rp. 6.000,00 / pcs', 'mentega1.jpg', 'Blueband', 19),
('121006', 'Daging Sapi', 120000, 'Harga Daging Sapi : \r\n\r\n- Rp. 120.000,00 / Kg', 'sapi1.jpg', 'Sembako Jaya', 20),
('121007', 'Daging Ayam', 25000, 'Harga Daging Ayam : \r\n\r\n- Rp. 25.000,00 / Kg', 'ayam1.jpg', 'Sembako Jaya', 17),
('121008', 'Telur Ayam', 30000, 'Harga Telur Ayam : \r\n\r\n- Rp. 30.000,00 / Kg', 'telur.jpg', 'Sembako Jaya', 20),
('121010', 'Bawang Merah ', 20000, 'Harga Bawang Merah : \r\n\r\n- Rp. 20.000,00 / Kg', 'bawangmerah1.jpg', 'Sembako Jaya', 20),
('121011', 'Bawang Putih', 25000, 'Harga Bawang Putih : \r\n\r\n- Rp. 25.000,00 / Kg', 'bawangputih1.jpg', 'Sembako Jaya', 20),
('121012', 'Gas LPG - 3 Kg', 20000, 'Harga Isi Ulang Gas LPG - 3 Kg : \r\n\r\n- Rp. 20.000,00 / gas', 'gas.jpg', 'MITA\r\n', 20),
('121013', 'beras 10kg', 42000, 'beras kualitas tinggi', 'beras1.jpg', '20', 20),
('303301', 'sagu bakar', 10000, 'saguperas dengan kualitas, 50gr', 'sagu.jfif', '', 0),
('303399', 'BEBAS', 4000, 'produk member', 'beras1.jpg', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jk` enum('Laki-laki','Perempuan') NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`username`, `password`, `nama`, `jk`, `email`, `alamat`, `no_hp`) VALUES
('12345', '123456', 'Sahiza', 'Perempuan', 'example@gmail.com', 'nangerang city st - 04/06', '083817792647'),
('Budi utomo', 'budiutomo', 'Budi utomo', 'Laki-laki', 'budi@gmail.com', 'nangerang city st - 04/06', '081293308272'),
('conto', 'conto', 'PENGUNJUNG', 'Laki-laki', 'conto@gmail.com', 'nangerang city st - 04/06', '083817792647'),
('farhan', '12345', 'Farhan Rizki M', 'Laki-laki', 'akuganteng@gmail.com', 'Bogor', '081222112221'),
('NI-NIZAR', '121212', 'Nizar Abdul Kholiq', 'Laki-laki', '', '', '081234567898'),
('shahiza', 'shahia', 'sahiza nur rohman', 'Perempuan', 'shazi@gmail.com', 'kp.bandung st.indah permana, perumahan permata sari blok no.21', '081234345656'),
('siti fatonah', 'fatonah', 'fatonah', 'Perempuan', '', '', ''),
('zayu', '00000', 'zayu', 'Laki-laki', 'nenet@gmail.com', 'Bandung', '081752637286'),
('zazay', '12345', 'zazay', 'Laki-laki', 'zazay@gmail.com', 'purwakarta pride', '083817672627');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_sembako` varchar(11) NOT NULL,
  `nama_sembako` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `id` int(11) NOT NULL,
  `id_beli` varchar(11) CHARACTER SET latin1 NOT NULL,
  `tgl_beli` varchar(11) CHARACTER SET latin1 NOT NULL,
  `nama` varchar(60) CHARACTER SET latin1 NOT NULL,
  `no_hp` varchar(13) CHARACTER SET latin1 NOT NULL,
  `alamat` text CHARACTER SET latin1 NOT NULL,
  `jasa_kirim` varchar(11) CHARACTER SET latin1 NOT NULL,
  `total_pesanan` int(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`id`, `id_beli`, `tgl_beli`, `nama`, `no_hp`, `alamat`, `jasa_kirim`, `total_pesanan`, `status`, `gambar`) VALUES
(44, 'I5V6DYF34DL', '06-02-23', 'fatonah', '083817792647', 'kampung durian runtuh no.21 st.28', 'PENGANTAR :', 11000, '', 'tf.jpeg'),
(45, '1BIDAU1Y4AV', '06-02-23', 'Sahiza', '083817792647', 'nangerang city st - 04/06', 'PENGANTAR :', 43000, '', 'tf.jpeg'),
(46, 'L0TTMZCM7WT', '06-02-23', 'Sahiza', '083817792647', 'nangerang city st - 04/06', 'PENGANTAR :', 83000, '', 'tf.jpeg'),
(48, 'TC4BM6HW6IT', '10-02-23', 'zayu', '081752637286', 'Bandung st.12 peterpan sari jati', 'PENGANTAR :', 126000, '', 'tf.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `laporan_m`
--

CREATE TABLE `laporan_m` (
  `id` int(11) NOT NULL,
  `id_beli` varchar(11) NOT NULL,
  `tgl_beli` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `alamat` text NOT NULL,
  `jasa_kirim` varchar(50) NOT NULL,
  `total_pesanan` int(255) NOT NULL,
  `status` enum('Transaksi Selesai','Transaksi Gagal') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laporan_m`
--

INSERT INTO `laporan_m` (`id`, `id_beli`, `tgl_beli`, `nama`, `no_hp`, `alamat`, `jasa_kirim`, `total_pesanan`, `status`) VALUES
(1, '9H7WW3SXN38', '30-08-22', 'zazay', '', 'purwakarta pride', '', 69000, 'Transaksi Selesai'),
(21, 'R74OA69PFNH', '17-01-23', 'fatonah', '083817792647', 'kampung durian runtuh no.21 st.28', 'PENGANTAR 2', 48000, 'Transaksi Selesai'),
(22, 'YLFB0T9WU8V', '17-01-23', 'fatonah', '083817792647', 'kampung durian runtuh no.21 st.28', 'PENGANTAR 2', 52000, 'Transaksi Selesai'),
(23, '1KOTMQ6OTM5', '17-01-23', 'fatonah', '083817792647', 'kampung durian runtuh no.21 st.28', 'PENGANTAR 1', 18000, 'Transaksi Selesai'),
(24, 'N4MT17S4UIJ', '18-01-23', 'Budi utomo', '081293308272', 'nangerang city st - 04/06', 'PENGANTAR 2', 174000, 'Transaksi Selesai'),
(30, 'U2MEGBW3F25', '01-02-23', 'zayu', '081752637286', 'Bandung begitulah bumi indah', 'PENGANTAR 2', 46000, 'Transaksi Selesai'),
(43, '01LOJ9Q7Y8M', '05-02-23', 'fatonah', '083817792647', 'kampung durian runtuh no.21 st.28', 'PENGANTAR :', 83000, 'Transaksi Selesai'),
(47, 'Q1H2F09G5VA', '07-02-23', 'Sahiza', '083817792647', 'nangerang city st - 04/06', 'PENGANTAR :', 77000, 'Transaksi Selesai');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `username` varchar(50) NOT NULL,
  `password` varchar(6) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jk` enum('Laki-Laki','Perempuan') NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_hp` int(13) NOT NULL,
  `barang` varchar(50) NOT NULL,
  `harga` int(50) NOT NULL,
  `stock` int(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`username`, `password`, `nama`, `jk`, `email`, `no_hp`, `barang`, `harga`, `stock`, `keterangan`, `alamat`) VALUES
('123456', '123456', 'Nizar Abdul Kholiq', 'Laki-Laki', 'kholiqnnabdul@gmail.com', 2147483647, 'sagu ', 2000, 20, 'sagu yang mantap sekali\r\n', '');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(11) NOT NULL,
  `id_beli` varchar(11) CHARACTER SET latin1 NOT NULL,
  `id_sembako` varchar(11) CHARACTER SET latin1 NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id`, `id_beli`, `id_sembako`, `harga`, `jumlah`, `subtotal`) VALUES
(5, 'A2LGXM154D1', '121001', 10000, 1, 10000),
(6, 'A2LGXM154D1', '121002', 13000, 1, 13000),
(7, 'A2LGXM154D1', '121003', 5000, 1, 5000),
(8, 'QUUOXABWD70', '121001', 10000, 1, 10000),
(9, 'QUUOXABWD70', '121002', 13000, 1, 13000),
(10, 'QUUOXABWD70', '121003', 5000, 1, 5000),
(11, 'BZN4YWH2QWV', '121002', 13000, 1, 13000),
(12, 'BZN4YWH2QWV', '121003', 5000, 1, 5000),
(13, 'BZN4YWH2QWV', '121004', 20000, 1, 20000),
(14, 'R3J50QE73GB', '121002', 13000, 1, 13000),
(15, 'R3J50QE73GB', '121003', 5000, 1, 5000),
(16, 'R3J50QE73GB', '121006', 120000, 1, 120000),
(17, 'A3TQQ259YVX', '121002', 13000, 1, 13000),
(18, 'A3TQQ259YVX', '121003', 5000, 1, 5000),
(19, 'A3TQQ259YVX', '121010', 20000, 1, 20000),
(20, '2HJ20X78XSB', '121002', 13000, 1, 13000),
(21, '2HJ20X78XSB', '121003', 5000, 1, 5000),
(22, '2HJ20X78XSB', '121006', 120000, 1, 120000),
(23, '9H7WW3SXN38', '121002', 13000, 1, 13000),
(24, '9H7WW3SXN38', '121003', 5000, 1, 5000),
(25, '9H7WW3SXN38', '121004', 20000, 1, 20000),
(26, '9H7WW3SXN38', '121007', 25000, 1, 25000),
(27, 'D5J1Q6WTOG7', '121003', 5000, 1, 5000),
(28, 'D5J1Q6WTOG7', '121004', 20000, 1, 20000),
(29, 'UL67HJ0X2ZK', '121002', 12000, 1, 12000),
(30, 'UL67HJ0X2ZK', '121004', 20000, 1, 20000),
(31, '3OKDFUI2ROT', '121003', 5000, 1, 5000),
(32, '3OKDFUI2ROT', '121005', 6000, 1, 6000),
(33, '3OKDFUI2ROT', '121006', 120000, 1, 120000),
(34, '3OKDFUI2ROT', '121007', 25000, 1, 25000),
(35, 'M28E7LFEF60', '121005', 6000, 1, 6000),
(36, 'M28E7LFEF60', '121007', 25000, 1, 25000),
(37, 'M28E7LFEF60', '121010', 20000, 1, 20000),
(38, 'SUTTMTJJ15L', '121008', 30000, 1, 30000),
(39, '5W7R3FAKJ5E', '121005', 6000, 1, 6000),
(40, '5W7R3FAKJ5E', '121006', 120000, 1, 120000),
(41, '5W7R3FAKJ5E', '12131415', 300000000, 1, 300000000),
(42, 'QAS3XLEDZD3', '1', 12000, 1, 12000),
(43, 'QAS3XLEDZD3', '121002', 12000, 1, 12000),
(44, 'QAS3XLEDZD3', '121003', 5000, 1, 5000),
(45, 'QAS3XLEDZD3', '121004', 20000, 1, 20000),
(46, 'BYFHVIM834H', '121002', 12000, 1, 12000),
(47, 'BYFHVIM834H', '121007', 25000, 1, 25000),
(48, 'BYFHVIM834H', '121010', 20000, 1, 20000),
(49, 'BYFHVIM834H', '121011', 25000, 1, 25000),
(50, 'R74OA69PFNH', '121002', 12000, 1, 12000),
(51, 'R74OA69PFNH', '121003', 5000, 1, 5000),
(52, 'R74OA69PFNH', '121007', 25000, 1, 25000),
(53, 'YLFB0T9WU8V', '1', 12000, 1, 12000),
(54, 'YLFB0T9WU8V', '121002', 12000, 2, 24000),
(55, 'YLFB0T9WU8V', '121003', 5000, 2, 10000),
(56, '1KOTMQ6OTM5', '1', 12000, 1, 12000),
(57, 'N4MT17S4UIJ', '1', 12000, 12, 144000),
(58, 'N4MT17S4UIJ', '121002', 12000, 2, 24000),
(59, 'OXN9Q192G7Y', '1', 12000, 1, 12000),
(60, 'OXN9Q192G7Y', '121002', 12000, 1, 12000),
(61, 'OXN9Q192G7Y', '121008', 30000, 1, 30000),
(62, '7TRL4EK6B8Z', '', 12000, 1, 12000),
(63, '6ZGNSRGMCL4', '121002', 12000, 1, 12000),
(64, '6ZGNSRGMCL4', '121004', 20000, 1, 20000),
(65, '6ZGNSRGMCL4', '121007', 25000, 1, 25000),
(66, '3MZ5CDT8X6U', '121002', 12000, 1, 12000),
(67, '3MZ5CDT8X6U', '121005', 6000, 1, 6000),
(68, 'U2MEGBW3F25', '121004', 20000, 1, 20000),
(69, 'U2MEGBW3F25', '121012', 20000, 1, 20000),
(72, '3SO0SJ5JQYL', '121001', 60000, 1, 60000),
(73, '3SO0SJ5JQYL', '121003', 5000, 1, 5000),
(74, '3SO0SJ5JQYL', '121005', 6000, 1, 6000),
(75, '9A5TW8SB780', '121001', 60000, 1, 60000),
(76, '9A5TW8SB780', '121002', 12000, 1, 12000),
(77, '6IPKH16MUH8', '121003', 5000, 1, 5000),
(78, 'H3YH0467MP2', '121001', 60000, 1, 60000),
(79, 'SCKXAK6PY2B', '', 12000, 1, 12000),
(80, 'SCKXAK6PY2B', '121001', 60000, 1, 60000),
(81, '7S4BZDUYZYQ', '', 12000, 2, 24000),
(82, '7S4BZDUYZYQ', '121001', 60000, 4, 240000),
(83, '7S4BZDUYZYQ', '121004', 20000, 1, 20000),
(84, '7S4BZDUYZYQ', '121006', 120000, 1, 120000),
(85, 'NGLP363NJW6', '121001', 60000, 4, 240000),
(86, 'NGLP363NJW6', '121002', 12000, 2, 24000),
(87, 'NGLP363NJW6', '121005', 6000, 2, 12000),
(88, 'NGLP363NJW6', '121007', 25000, 2, 50000),
(89, 'IO9ACE0YKMM', '121001', 60000, 1, 60000),
(90, 'IO9ACE0YKMM', '121002', 12000, 1, 12000),
(91, 'FUWGZZBGX1B', '121001', 60000, 1, 60000),
(92, 'FUWGZZBGX1B', '121002', 12000, 1, 12000),
(93, 'OIRS8J53Z0H', '121001', 60000, 1, 60000),
(94, 'OIRS8J53Z0H', '121002', 12000, 1, 12000),
(95, '01LOJ9Q7Y8M', '121001', 60000, 1, 60000),
(96, '01LOJ9Q7Y8M', '121002', 12000, 1, 12000),
(97, '01LOJ9Q7Y8M', '121003', 5000, 1, 5000),
(98, 'I5V6DYF34DL', '121003', 5000, 1, 5000),
(99, '1BIDAU1Y4AV', '121002', 12000, 1, 12000),
(100, '1BIDAU1Y4AV', '121003', 5000, 1, 5000),
(101, '1BIDAU1Y4AV', '121004', 20000, 1, 20000),
(102, 'L0TTMZCM7WT', '121001', 60000, 1, 60000),
(103, 'L0TTMZCM7WT', '121002', 12000, 1, 12000),
(104, 'L0TTMZCM7WT', '121003', 5000, 1, 5000),
(105, 'Q1H2F09G5VA', '121001', 60000, 1, 60000),
(106, 'Q1H2F09G5VA', '121003', 5000, 1, 5000),
(107, 'Q1H2F09G5VA', '121005', 6000, 1, 6000),
(108, 'TC4BM6HW6IT', '121002', 12000, 10, 120000);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(20) NOT NULL,
  `nama_produk` varchar(155) NOT NULL,
  `harga` int(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `stock` int(255) NOT NULL,
  `merk` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id` int(6) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `detail` varchar(255) NOT NULL,
  `harga` int(255) NOT NULL,
  `stock` int(255) NOT NULL,
  `keterangan` enum('ready','not ready') NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id`, `nama`, `detail`, `harga`, `stock`, `keterangan`, `gambar`) VALUES
(202301, 'Sagu Bakar', 'Sagu bakar merupakan camilan favorit bagi orang Ambon untuk sarapan atau menikmati sore bersama secangkir kopi dan teh manis hangat. Makanan ini banyak sekali ditemui sekedar di seluruh Pulau Ambon, terutama pusat kota Ambon.', 20000, 50, 'ready', 'sagu.jfif'),
(300323, 'sagu goreng', 'detail produk', 10000, 50, 'ready', 'sagu.jfif'),
(3003201, 'mentega ', 'detail produk', 6000, 20, 'ready', 'mentega1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `survey`
--

CREATE TABLE `survey` (
  `id` varchar(100) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `survey`
--

INSERT INTO `survey` (`id`, `nama`, `comment`, `gambar`) VALUES
('I5V6DYF34DL', 'siti fatonah', 'mantap pengiriman cepat', 'diterima.jpg'),
('Q1H2F09G5VA', 'sahiza nur rohman', 'bARANG SUDAH SAMPAI', 'diterima.jpg'),
('TC4BM6HW6IT', 'Nizar Abdul Kholiq', 'manatap pengriman', '82006979_2761649200524752_6183981959610368000_n.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `bahan_pokok`
--
ALTER TABLE `bahan_pokok`
  ADD PRIMARY KEY (`id_sembako`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_sembako`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laporan_m`
--
ALTER TABLE `laporan_m`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `survey`
--
ALTER TABLE `survey`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3003202;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
