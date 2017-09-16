-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2017 at 01:55 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rtc_cctv_terminal`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_aboutus`
--

CREATE TABLE `tbl_aboutus` (
  `id` int(11) NOT NULL,
  `konten` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_berita`
--

CREATE TABLE `tbl_berita` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `berita` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `waktu` datetime NOT NULL,
  `status_tampil` char(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cctv`
--

CREATE TABLE `tbl_cctv` (
  `id` int(11) NOT NULL,
  `nama_cctv` varchar(255) NOT NULL,
  `terminal_id` int(11) NOT NULL,
  `folder` varchar(255) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `status_tampil` char(1) NOT NULL DEFAULT '1',
  `kode` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cctv`
--

INSERT INTO `tbl_cctv` (`id`, `nama_cctv`, `terminal_id`, `folder`, `ip`, `status_tampil`, `kode`) VALUES
(1, 'Kamera Terminal Bawen 1', 7, '', 'http://203.130.228.60:83/', '1', 'bw1'),
(2, 'Kamera Terminal Bawen 2', 7, '', 'http://203.130.228.60:84/', '1', 'bw2'),
(3, 'Kamera Terminal Bawen 3', 7, '-', 'http://203.130.228.60:85/', '1', 'bw3'),
(4, 'Kamera Terminal Bawen 4', 7, '-', 'http://203.130.228.60:8008/', '1', 'bw4'),
(5, 'Kamera Terminal Wonogiri 1', 8, '-', 'http://203.130.228.60:91/', '1', 'wn1'),
(6, 'Kamera Terminal Wonogiri 2', 8, '', 'http://203.130.228.60:92/', '1', 'wn2'),
(7, 'Kamera Terminal Arjosari 1', 9, '', 'http://203.130.228.60:96/', '1', 'ml1'),
(8, 'Kamera Terminal Arjosari 2', 9, '', 'http://203.130.228.60:97/', '1', 'ml2'),
(9, 'Kamera Terminal Arjosari 3', 9, '', 'http://203.130.228.60:98/', '1', 'ml3'),
(10, 'Kamera Termina Arjosari 4', 9, '', 'http://203.130.228.60:99/', '1', 'ml4'),
(11, 'Kamera Termina Wonogiri 3', 8, '', 'http://203.130.228.60:93/', '1', 'wn3'),
(12, 'Kamera Termina Wonogiri 4', 8, '', 'http://203.130.228.60:94/', '1', 'wn4'),
(13, 'Kamera Terminal Cilacap 2', 10, '', 'http://203.130.228.60:8002/', '1', 'cl2'),
(14, 'Kamera Terminal Cilacap 3', 10, '', 'http://203.130.228.60:8003/', '1', 'cl3'),
(15, 'Kamera Terminal Cilacap 4', 10, '', 'http://203.130.228.60:8004/', '1', 'cl4'),
(16, 'Kamera Terminal Cilacap 1', 10, '', 'http://203.130.228.60:8001/', '1', 'cl1'),
(17, 'Kamera Terminal Sukabumi 1', 11, '', 'http://203.130.228.60:8005/', '1', 'sk1'),
(18, 'Kamera Terminal Sukabumi 2', 11, '', 'http://203.130.228.60:8006/', '1', 'sk2'),
(19, 'Kamera Terminal Sukabumi 3', 11, '', 'http://203.130.228.60:8007/', '1', 'sk3'),
(20, 'Kamera Terminal Sukabumi 4', 11, '', 'http://203.130.228.60:8009/', '1', 'sk4');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_folder`
--

CREATE TABLE `tbl_folder` (
  `id` int(11) NOT NULL,
  `folder` varchar(255) DEFAULT NULL,
  `nama_kamera` varchar(255) DEFAULT NULL,
  `lokasi_kamera` varchar(255) DEFAULT NULL,
  `status_tampil` char(1) DEFAULT NULL,
  `kode` varchar(50) NOT NULL,
  `nama_terminal` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_level`
--

CREATE TABLE `tbl_level` (
  `id` int(11) NOT NULL,
  `level` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `status_tampil` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_level`
--

INSERT INTO `tbl_level` (`id`, `level`, `deskripsi`, `status_tampil`) VALUES
(1, 'Administrator', 'Admin Kapus', 1),
(2, 'Kontributor Isi', 'Kontributor Isi Kapus', 1),
(3, 'Admin Terminal', 'Admin Terminal', 1),
(4, 'User Terminal', 'User Terminal', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news`
--

CREATE TABLE `tbl_news` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `waktu_input` datetime DEFAULT NULL,
  `waktu_publish` datetime DEFAULT NULL,
  `konten` text,
  `status` char(1) DEFAULT '1',
  `author` varchar(255) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `kategori_tulisan` varchar(50) DEFAULT 'news'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_schedule`
--

CREATE TABLE `tbl_schedule` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `status_tampil` char(1) DEFAULT '1',
  `terminal_id` int(11) DEFAULT NULL,
  `tujuan_datang` varchar(255) DEFAULT NULL,
  `waktu_datang` varchar(20) DEFAULT NULL,
  `operator_datang` varchar(255) DEFAULT NULL,
  `tujuan_berangkat` varchar(255) DEFAULT NULL,
  `waktu_berangkat` varchar(20) DEFAULT NULL,
  `operator_berangkat` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_terminal`
--

CREATE TABLE `tbl_terminal` (
  `id` int(11) NOT NULL,
  `nama_terminal` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `about_us` text NOT NULL,
  `video_profile` varchar(255) NOT NULL,
  `schedule` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `status_tampil` char(1) NOT NULL DEFAULT '1',
  `ip` varchar(255) NOT NULL,
  `lat_koord` char(10) DEFAULT NULL,
  `long_koord` char(10) DEFAULT NULL,
  `alamat` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_terminal`
--

INSERT INTO `tbl_terminal` (`id`, `nama_terminal`, `foto`, `about_us`, `video_profile`, `schedule`, `contact`, `status_tampil`, `ip`, `lat_koord`, `long_koord`, `alamat`) VALUES
(2, 'Pusat', '', 'About Us Pusat', '', '', '', '1', 'http://203.130.228.229:8887/terminalku/index.php/terminal', '0', '0', NULL),
(3, 'Giwangan', '', 'About Us Giwangan', '', '', '', '1', 'http://203.130.228.59:8887/terminal', '-7.834508', '110.392319', 'Giwangan, Umbulharjo, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55163'),
(4, 'Purabaya', '', 'About Us Purabaya', '', '', '', '1', 'http://203.130.228.59:8887/terminal', '-7.3504982', '112.724910', 'Jl. Raya Arjuno No.35, Sawahan, Kec. Sawahan, Kota Surabaya, Jawa Timur 60251'),
(5, 'Tirtonadi', '', 'About Us Tirtonadi', '', '', '', '1', 'http://203.130.228.59:8887/terminal', '-7.5514284', '110.818390', 'Jalan Jend. A. Yani 100 Kota Surakarta 57134'),
(6, 'Soekarno', '', 'About us Soekarno', '', '', '', '1', 'http://203.130.228.59:8887/terminal', '-7.713993', '110.603864', 'Jalan Kartini By Pass (Buntalan) Kabupaten Klaten - Jawa Tengah'),
(7, 'Bawen', '-', 'About US Terminal Bawen', '', '', '', '1', 'http://203.130.228.60', '-7.245800', '110.433527', 'Jl. Slamet Riyadi, Bawen-Salatiga No.22, Bawen, Semarang, Jawa Tengah 50661'),
(8, 'Wonogiri', '-', 'About Us Wonogiri', '-', '-', '-', '1', 'http://203.130.228.60', '-7.792533', '110.897409', 'Singodutan, Selogiri, Kabupaten Wonogiri, Jawa Tengah'),
(9, 'Arjosari', '', 'Terminal Arjosari terletak di Kota Malang Jawa Timur', '', '', 'Telp :<br />\r\nAlamat :', '1', '', '-7.934936', '112.658868', 'Terminal Arjosari, Jalan Terusan Raden Intan No.1, Arjosari, Blimbing, Kota Malang, Jawa Timur 65126'),
(10, 'Cilacap', '', 'About Terminal CIlacap', '', '', '<div class=\"mod\" data-hveid=\"19\" data-md=\"1002\" data-ved=\"0ahUKEwjo77vlj8DUAhUDMI8KHbvnAF8QkCkIEygCMAM\" style=\"padding-left: 15px; padding-right: 15px; line-height: 1.24; font-family: arial, sans-serif; font-size: 13px; clear: none;\">\r\n	<div class=\"_eFb\">', '1', '', '-7.7023984', '109.024885', NULL),
(11, 'Sukabumi', '', '<span style=\"font-weight: bold; color: rgb(106, 106, 106); font-family: arial, sans-serif; font-size: small;\">Terminal</span><span style=\"color: rgb(84, 84, 84); font-family: arial, sans-serif; font-size: small;\">&nbsp;Tipe A yang berada di Jalan Lingkar Selatan, Kota</span><span style=\"font-weight: bold; color: rgb(106, 106, 106); font-family: arial, sans-serif; font-size: small;\">Sukabumi</span><span style=\"color: rgb(84, 84, 84); font-family: arial, sans-serif; font-size: small;\">, Jawa Barat,</span>', '', '', '<span style=\"font-family: arial, sans-serif; font-size: 13px;\">Alamat : Benteng, Warudoyong, Kota Sukabumi, Jawa Barat 43132</span><br />\r\n<br />\r\n', '1', '', '-6.9204786', '106.917902', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `user` varchar(255) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telp` varchar(255) DEFAULT NULL,
  `alamat` text,
  `status` char(1) DEFAULT '1',
  `level` int(11) NOT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_username`
--

CREATE TABLE `tbl_username` (
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_video_profile`
--

CREATE TABLE `tbl_video_profile` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `status_tampil` char(1) DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_aboutus`
--
ALTER TABLE `tbl_aboutus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_berita`
--
ALTER TABLE `tbl_berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_cctv`
--
ALTER TABLE `tbl_cctv`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_folder`
--
ALTER TABLE `tbl_folder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_level`
--
ALTER TABLE `tbl_level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_news`
--
ALTER TABLE `tbl_news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_schedule`
--
ALTER TABLE `tbl_schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_terminal`
--
ALTER TABLE `tbl_terminal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_video_profile`
--
ALTER TABLE `tbl_video_profile`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_aboutus`
--
ALTER TABLE `tbl_aboutus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_berita`
--
ALTER TABLE `tbl_berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_cctv`
--
ALTER TABLE `tbl_cctv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `tbl_folder`
--
ALTER TABLE `tbl_folder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_level`
--
ALTER TABLE `tbl_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_news`
--
ALTER TABLE `tbl_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_schedule`
--
ALTER TABLE `tbl_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_terminal`
--
ALTER TABLE `tbl_terminal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tbl_video_profile`
--
ALTER TABLE `tbl_video_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
