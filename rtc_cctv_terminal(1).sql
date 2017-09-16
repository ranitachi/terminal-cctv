-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2017 at 02:40 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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

--
-- Dumping data for table `tbl_aboutus`
--

INSERT INTO `tbl_aboutus` (`id`, `konten`) VALUES
(1, '<p style=\"text-align: justify;\">\r\n	Terminal-Ku adalah sebuah platform yang di rancang oleh Direktorat Prasarana Perhubungan Darat dari Kementerian Perhubungan Republik Indonesia untuk memberikan kemudahan akses informasi bagi para penumpang bus antar kota.<br />\r\n	&nbsp;<br />\r\n	Saat ini Terminal-Ku dapat mengakses informasi dari 9 terminal di beberapa kota, yaitu, Sidoarjo, Jogja, Solo, Klaten, Malang, Cilacap, Wonogiri, Semarang dan Sukabumi.<br />\r\n	&nbsp;<br />\r\n	Fitur - fitur yang mudah di jangkau di dalam Terminal-Ku adalah CCTV live streaming, Jadwal keberangkatan dan kedatangan bus, profil, serta detail kontak masing - masing terminal.<br />\r\n	&nbsp;<br />\r\n	Platform yang <em>user-friendly </em>di dalam Terminal-Ku ini diharapkan dapat membantu para calon dan juga penumpang bus antar kota dalam mengakses informasi-informasi tersebut.</p>\r\n');

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
  `status_tampil` char(1) NOT NULL DEFAULT '1',
  `terminal_id` char(10) DEFAULT NULL
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
(1, 'PENGENDAPAN BUS', 7, '', 'http://203.130.228.60:83/', '1', 'bw1'),
(2, 'RUANG TUNGGU BARAT', 7, '', 'http://203.130.228.60:84/', '1', 'bw2'),
(3, 'KEDATANGAN BUS', 7, '-', 'http://203.130.228.60:85/', '1', 'bw3'),
(4, 'RUANG TUNGGU TIMUR', 7, '-', 'http://203.130.228.60:8008/', '1', 'bw4'),
(5, 'RUANG TUNGGU TIMUR		', 8, '-', 'http://203.130.228.60:91/', '1', 'wn1'),
(6, 'RUANG TUNGGU BARAT		', 8, '', 'http://203.130.228.60:92/', '1', 'wn2'),
(7, 'PENGENDAPAN BUS', 9, '', 'http://203.130.228.60:96/', '1', 'ml1'),
(8, 'RUANG TUNGGU TIMUR', 9, '', 'http://203.130.228.60:97/', '1', 'ml2'),
(9, 'KEDATANGAN BUS', 9, '', 'http://203.130.228.60:98/', '1', 'ml3'),
(10, 'RUANG TUNGGU BARAT', 9, '', 'http://203.130.228.60:99/', '1', 'ml4'),
(11, 'PENGENDAPAN BUS', 8, '', 'http://203.130.228.60:93/', '1', 'wn3'),
(12, 'KEDATANGAN BUS', 8, '', 'http://203.130.228.60:94/', '1', 'wn4'),
(13, 'RUANG TUNGGU BARAT', 10, '', 'http://203.130.228.60:8002/', '1', 'cl2'),
(14, 'RUANG TUNGGU TIMUR', 10, '', 'http://203.130.228.60:8003/', '1', 'cl3'),
(15, 'KEDATANGAN BUS', 10, '', 'http://203.130.228.60:8004/', '1', 'cl4'),
(16, 'PENGENDAPAN BUS', 10, '', 'http://203.130.228.60:8001/', '1', 'cl1'),
(17, 'RUANG TUNGGU TIMUR', 11, '', 'http://203.130.228.60:8005/', '1', 'sk1'),
(18, 'RUANG TUNGGU BARAT', 11, '', 'http://203.130.228.60:8006/', '1', 'sk2'),
(19, 'KEDATANGAN BUS', 11, '', 'http://203.130.228.60:8007/', '1', 'sk3'),
(20, 'PENGENDAPAN BUS', 11, '', 'http://203.130.228.60:8009/', '1', 'sk4'),
(21, 'Keberangkatan Bus AKAP Dalam', 3, '', 'http://203.130.228.59:8887/', '1', 'jg1'),
(22, 'Keberangkatan Bus AKAP Luar', 3, '', 'http://203.130.228.59:8887/', '1', 'jg2'),
(23, 'Ruang Tunggu Penumpang Depan', 3, '', 'http://203.130.228.59:8887/', '1', 'jg3'),
(24, 'Ruang Tunggu Penumpang Belakang', 3, '', 'http://203.130.228.59:8887/', '1', 'jg4'),
(25, 'Kedatangan Bus', 3, '', 'http://203.130.228.59:8887/', '1', 'jg5'),
(26, 'Ruang Tunggu Zona 1', 3, '', 'http://203.130.228.59:8887/', '1', 'jg6'),
(27, 'Pintu Masuk Pembelian Tiket', 5, '', 'http://203.130.228.59:8887/', '1', 'sl1'),
(28, 'Kedatangan Bus', 5, '', 'http://203.130.228.59:8887/', '1', 'sl2'),
(29, 'Pintu Bus Keluar Barat', 5, '', 'http://203.130.228.59:8887/', '1', 'sl3'),
(30, 'Ruang Tunggu Barat', 5, '', 'http://203.130.228.59:8887/', '1', 'sl4'),
(31, 'Pintu Keluar Bus Timur', 5, '', 'http://203.130.228.59:8887/', '1', 'sl5'),
(32, 'Ruang Tunggu Timur', 5, '', 'http://203.130.228.59:8887/', '1', 'sl6'),
(33, 'Kedatangan Bus', 6, '', 'http://203.130.228.59:8887/', '1', 'kl1'),
(34, 'Gedung Keberangkatan', 6, '', 'http://203.130.228.59:8887/', '1', 'kl2'),
(35, 'Jalur Kedatangan Bus', 6, '', 'http://203.130.228.59:8887/', '1', 'kl3'),
(36, 'Ruang Tunggu Zona 1', 6, '', 'http://203.130.228.59:8887/', '1', 'kl4'),
(37, 'Jalur Keberangkatan', 6, '', 'http://203.130.228.59:8887/', '1', 'kl5'),
(38, 'Ruang Tunggu Zona 2', 6, '', 'http://203.130.228.59:8887/', '1', 'kl6'),
(39, 'Jalur Keberangkatan', 4, '', 'http://203.130.228.59:8887/', '1', 'sd1'),
(40, 'Gedung Keberangkatan', 4, '', 'http://203.130.228.59:8887/', '1', 'sd2'),
(41, 'Ruang Tunggu Zona 1', 4, '', 'http://203.130.228.59:8887/', '1', 'sd3'),
(42, 'Pengendapan Bus', 4, '', 'http://203.130.228.59:8887/', '1', 'sd4'),
(43, 'Ruang Tunggu Zona 2', 4, '', 'http://203.130.228.59:8887/', '1', 'sd5'),
(44, 'Jalur Keberangkatan Gedung Baru', 4, '', 'http://203.130.228.59:8887/', '1', 'sd6');

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
  `kategori_tulisan` varchar(50) DEFAULT 'news',
  `terminal_id` char(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_news`
--

INSERT INTO `tbl_news` (`id`, `judul`, `waktu_input`, `waktu_publish`, `konten`, `status`, `author`, `gambar`, `kategori_tulisan`, `terminal_id`) VALUES
(1, 'Terminal Giwangan Yogyakarta Akan Dipadati 20 Ribu Penumpang', '2017-08-15 12:58:12', NULL, '<strong style=\"color: rgb(85, 85, 85); font-family: Helveticaff, Helvetica, arial, sans-serif; font-size: 14px; background-color: rgb(241, 241, 241);\"><span itemprop=\"contentLocation\">Jakarta</span>,&nbsp;<span itemprop=\"creator\">CNN Indonesia</span>&nbsp;</strong><span style=\"color: rgb(85, 85, 85); font-family: Helveticaff, Helvetica, arial, sans-serif; font-size: 14px;\">--&nbsp;</span><span id=\"detikdetailtext\" style=\"color: rgb(85, 85, 85); font-family: Helveticaff, Helvetica, arial, sans-serif; font-size: 14px;\">Sekitar 20.000 penumpang diperkirakan memadati Terminal Giwangan, Yogyakarta, Jumat (23/6), sekaligus menjadi puncak kedatangan penumpang pada arus mudik lebaran.<br />\r\n<br />\r\n&quot;Dari kecenderungan jumlah penumpang yang tiba di Giwangan dalam beberapa hari terakhir, diperkirakan hari ini akan ada sekitar 20.000 penumpang yang datang,&quot; ujar Koordinator Satuan Pelayanan Terminal Giwangan Yogyakarta Bekti Zunanta, Jumat (23/6).<br />\r\n<br />\r\nIa menyebutkan bahwa kenaikan jumlah penumpang yang datang di Terminal Giwangan, Yogyakarta, sudah terjadi sejak Minggu (18/6). Jumlah penumpang yang datang naik hampir dua kali lipat dibanding jumlah penumpang pada hari biasa, yaitu mencapai 11.000 penumpang.</span><br />\r\n<br />\r\n<span id=\"detikdetailtext\" style=\"color: rgb(85, 85, 85); font-family: Helveticaff, Helvetica, arial, sans-serif; font-size: 14px;\">&quot;Sejak saat itu, jumlah penumpang yang datang di Terminal Giwangan terus meningkat, meskipun masih fluktuatif, dan diperkirakan akan mencapai puncaknya pada Jumat, hari ini,&quot; katanya.<br />\r\n<br />\r\nKemarin, total jumlah penumpang yang datang di Terminal Giwangan Yogyakarta, baik menggunakan bus antar kota antar provinsi (AKAP) maupun antar kota dalam provinsi (AKDP), tercatat sebanyak 17.371 dan jumlah penumpang yang diberangkatkan 16.906 orang.<br />\r\n<br />\r\n&quot;Sudah ada bus cadangan yang masuk ke Terminal Giwangan didominasi bus dari Jakarta sebanyak 116 armada, termasuk armada yang membawa peserta mudik gratis,&quot; imbuh Bekti.<br />\r\n<br />\r\nSedangkan, untuk sepeda motor pemudik yang mengikuti mudik gratis, lanjut Bekti, seluruhnya sudah sampai di Terminal Giwangan. Sepeda motor dibawa sembilan truk dengan jumlah total 328 sepeda motor dari kuota 393 sepeda motor.<br />\r\n<br />\r\nSementara itu, jumlah penumpang yang diberangkatkan dari sejumlah stasiun di wilayah kerja PT KAI Daerah Operasi VI Yogyakarta pada Kamis (22/6), tercatat sebanyak 15.010 penumpang baik penumpang kereta ekonomi, bisnis dan eksekutif jarak jauh.<br />\r\n<br />\r\nJumlah penumpang tersebut mengalami kenaikan hingga 38 persen dibandingkan volume penumpang yang naik kereta pada periode yang sama tahun lalu, yakni sebanyak 10.850 penumpang.</span><br />\r\n<br />\r\n<span id=\"detikdetailtext\" style=\"color: rgb(85, 85, 85); font-family: Helveticaff, Helvetica, arial, sans-serif; font-size: 14px;\">Ada pun, jumlah total penumpang yang menggunakan kereta api jarak jauh, terhitung sejak Kamis (15/6) hingga saat ini mencapai 96.230 orang atau naik 24 persen jika dibandingkan dengan periode yang sama tahun lalu, yaitu 77.833 orang.<br />\r\n<br />\r\nSelain penumpang, PT KAI juga memberikan layanan angkutan motor gratis. Hingga saat ini, total jumlah sepeda motor yang diturunkan di Daerah Operasi VI Yogyakarta tercatat sebanyak 1.037 sepeda motor.<br />\r\n<br />\r\n&quot;Sedangkan, pelayanan angkutan motor gratis untuk arus balik Lebaran akan dilakukan mulai 29 Juni hingga 5 Juli,&quot; kata Manajer Humas PT KAI Daerah Operasi VI Yogyakarta Eko Budiyanto.<br />\r\n<br />\r\nSumber : <a href=\"https://www.cnnindonesia.com/nasional/20170623133737-20-223779/terminal-giwangan-yogyakarta-akan-dipadati-20-ribu-penumpang/\">cnnindonesia.com</a></span>', '1', '', 'http://203.130.228.62:81/terminal-cctv/assets/files/0f020b82-85d2-4694-8da6-facb2c978687_169.jpg', 'news', '-1'),
(2, ' Kepastian aset Terminal Giwangan masih tanda tanya', '2017-08-15 13:39:54', NULL, 'Yogyakarta, (Antara Jogja) - Kepastian mengenai pengelola aset Terminal Giwangan Yogyakarta masih menjadi tanda tanya karena hingga kini belum ada kejelasan dari Kementerian Perhubungan meskipun operasional terminal sudah menjadi kewenangan pemerintah pusat.<br />\r\n<br />\r\n&quot;Mulai 1 Januari sudah ada pelimpahan pengelolaan terminal ke pusat. Namun, untuk asetnya masih belum ada tindak lanjut apapun,&quot; kata Kepala Bagian Tata Pemerintahan Zenni Lingga di Yogyakarta, Senin.<br />\r\n<br />\r\nMenurut dia, Pemerintah Kota Yogyakarta tidak lagi menganggarkan dana untuk pemeliharaan aset Terminal Giwangan karena operasional sudah diambil alih oleh Kementerian Perhubungan.&nbsp;<br />\r\n<br />\r\nZenni mengatakan, aset yang dimaksud adalah tanah dan bangunan yang berhubungan langsung dengan operasional terminal, tidak termasuk gedung kantor Dinas Perhubungan Kota Yogyakarta dan Taman Lalu Lintas yang berada di kompleks Terminal Giwangan Yogyakarta.<br />\r\n<br />\r\n&quot;Sudah ada surat yang ditandatangani oleh Sekda Kota Yogyakarta Titik Sulastri untuk menindaklanjuti masalah aset ini. Kami akan segera berkoordinasi dengan Kementerian Perhubungan mengenai kejelasan aset,&quot; katanya.<br />\r\n<br />\r\nSebelumnya, Komisi C DPRD Kota Yogyakarta meminta pemerintah daerah untuk segera menyelesaikan proses pengambilalihan Terminal Giwangan hingga tuntas dan tidak lagi menyisakan permasalahan apapun.<br />\r\n<br />\r\n&quot;Kami berharap, pengambilalihan ini tidak menurunkan kualitas layanan kepada penumpang di Terminal Giwangan,&quot; kata Anggota Komisi C DPRD Kota Yogyakarta Suwarto.<br />\r\n<br />\r\nTerminal Giwangan Yogyakarta mengandalkan pemasukan dari retribusi untuk kepentingan operasional. Setiap tahun, terminal tersebut membutuhkan dana operasional sekitar Rp2,5 miliar - Rp3 miliar dengan dana pemasukan retribusi sekitar Rp3 miliar.&nbsp;<br />\r\n<br />\r\nPengambilalihan terminal oleh pemerintah pusat dilakukan berdasarkan UU Nomor 23 Tahun 2014 tentang Pemerintahan Daerah. ***1***<br />\r\n<br />\r\n(E013)<br />\r\n<br />\r\n<p>\r\n	Editor:&nbsp;Victorianus Sat Pranyoto<br />\r\n	<br />\r\n	Sumber : <a href=\"http://jogja.antaranews.com/berita/344890/kepastian-aset-terminal-giwangan-masih-tanda-tanya?utm_source=fly&amp;utm_medium=related&amp;utm_campaign=news\">jogja.antaranews.com</a></p>\r\n', '1', '', 'http://203.130.228.62:81/terminal-cctv/assets/files/20150903terminal.jpg', 'news', '3'),
(3, 'Terminal Giwangan Yogyakarta, Berangkatkan Sekitar 35.000 Penumpang', '2017-08-15 13:41:16', NULL, 'Sekitar 35.000 penumpang akan diberangkatkan dari Terminal Giwangan Yogyakarta pada puncak arus balik Lebaran yang diperkirakan terjadi pada hari Sabtu (1/7/2017).<br />\r\n<br />\r\n&quot;Meskipun perkiraan kami jumlah penumpang yang memanfaatkan bus berkurang dibanding tahun lalu, namun penumpang yang akan diberangkatkan pada puncak arus balik diperkirakan akan tetap banyak. Bisa mencapai 33.000 hingga 35.000 penumpang,&quot; tutur Koordinator Satuan Pelayanan Terminal Giwangan Yogyakarta Bekti Zunanta di Yogyakarta, Sabtu.<br />\r\n<br />\r\nDirinya mengatakan angka tersebut masih lebih rendah dibanding jumlah penumpang yang diberangkatkan saat puncak arus balik tahun lalu, yaitu mencapai sekitar 37.000 penumpang. Selain penumpang bus reguler, Terminal Giwangan juga akan memberangkatkan peserta balik gratis dari Kementerian Perhubungan dengan kuota 33 bus.<br />\r\n<br />\r\nBekti menambahkan, sempat terjadi lonjakan jumlah penumpang yang diberangkatkan dari Terminal Giwangan pada H+2 Lebaran yaitu mencapai sekitar 33.000 penumpang.<br />\r\n<br />\r\n&quot;Pada hari itu, masih ada penumpang yang melakukan mudik ke berbagai tujuan. Mungkin mereka berharap kondisi terminal dan arus lalu lintas sudah tidak terlalu ramai sehingga perjalanan akan lebih lancar,&quot; katanya.<br />\r\n<br />\r\nSelama beberapa hari terakhir, lanjut Bekti, terjadi keterlambatan bus masuk ke Terminal Giwangan hingga empat jam karena bus terjebak kemacetan di sepanjang jalur yang dilalui.<br />\r\n<br />\r\n&quot;Dari informasi yang kami peroleh, waktu tempuh jurusan Solo-Yogyakarta yang biasanya dua jam menjadi empat jam. Begitu pula jurusan Purwokerto-Yogyakarta harus ditempuh hingga delapan jam dari sebelumnya empat jam,&quot; ujarnya.<br />\r\n<br />\r\nAkibatnya, lanjut Bekti, sempat terjadi penumpukan penumpang di Terminal Giwangan namun dapat diatasi dengan mengoperasionalkan bus cadangan yang berasal dari bus pariwisata meskipun tarif yang dikenakan lebih mahal.<br />\r\n<br />\r\n&quot;Tarif yang dikenakan kepada penumpang bus cadangan disesuaikan dengan fasilitas yang diperoleh. Misalnya saja toilet di dalam bus, sehingga harga tiket menjadi sedikit lebih mahal. Misalnya tarif Yogyakarta-Surabaya untuk bus patas Rp125.000 menjadi Rp135.000,&quot; jelasnya.<br />\r\n<br />\r\nSelama masa Angkutan Lebaran 2017, Bekti mengatakan pihaknya tidak menemukan agen bus yang melanggar ketentuan tarif. Pemberlakuan tarif batas atas dan bawah diperuntukkan bagi bus ekonomi sedangkan tarif bus eksekutif disesuaikan dengan pasar.<br />\r\n<br />\r\n&quot;Untuk kejadian kriminalitas juga nihil. Selama empat tahun terakhir ini, tidak ada laporan tindak kriminalitas di Terminal Giwangan. Jika ada laporan, maka lokasi kejadiannya ada di daerah lain tetapi penumpang melapor ke Giwangan,&quot; ungkapnya yang memberikan apresiasi kepada petugas keamanan yang rutin melakukan patroli di terminal.<br />\r\n<br />\r\nSelain patroli petugas, pengawasan kondisi terminal dilakukan melalui kamera CCTV. Di Terminal Giwangan terdapat 17 kamera CCTV namun enam di antaranya rusak. (HYS/Ant)<br />\r\n<br />\r\nSumber : <a href=\"http://wartaekonomi.co.id/read146119/terminal-giwangan-yogyakarta-berangkatkan-sekitar-35000-penumpang.html\">wartaekonomi.co.id</a>', '1', '', 'http://203.130.228.62:81/terminal-cctv/assets/files/transportasi_2017_07_01_235215_big.jpg', 'news', '3'),
(4, 'admin tes', '2017-08-16 11:20:26', NULL, '<p>\r\n	Direktur Angkutan dan Multimoda, Direktorat Jenderal Perhubungan Darat Kemenhub, Cucu Mulyana, &lrm;mengatakan Kementerian Perhubungan akan memisahkan area berdasarkan kegiatannya dalam menata <a href=\"http://bisnis.liputan6.com/read/2845604/resmikan-terminal-seloaji-budi-karya-ingatkan-jangan-ada-pungli\" title=\"terminal bus\">terminal bus</a>, yaitu penjualan tiket, batas pengantar, dan ruang tunggu penumpang.</p>\r\n<p>\r\n	&quot;Ada zonasi ada pengantar, membeli tiket, ada yang tinggal berangkat,&quot; kata Cucu, di Jakarta, Selasa (2/5/2017).</p>\r\n<p>\r\n	Cucu menuturkan, pihaknya sedang merancang tata ruang terminal untuk mewujudkan penataan terminal tersebut. Penataan terminal bus akan diprioritaskan pada terminal tipe A.</p>\r\n', '0', '', 'http://203.130.228.62:81/terminal-cctv/assets/files/prifil.png', 'news', '9'),
(5, 'admin test', '2017-08-16 11:24:26', NULL, '<p>\r\n	Direktur Angkutan dan Multimoda, Direktorat Jenderal Perhubungan Darat Kemenhub, Cucu Mulyana, &lrm;mengatakan Kementerian Perhubungan akan memisahkan area berdasarkan kegiatannya dalam menata <a href=\"http://bisnis.liputan6.com/read/2845604/resmikan-terminal-seloaji-budi-karya-ingatkan-jangan-ada-pungli\" title=\"terminal bus\">terminal bus</a>, yaitu penjualan tiket, batas pengantar, dan ruang tunggu penumpang.</p>\r\n<p>\r\n	&quot;Ada zonasi ada pengantar, membeli tiket, ada yang tinggal berangkat,&quot; kata Cucu, di Jakarta, Selasa (2/5/2017).</p>\r\n<p>\r\n	Cucu menuturkan, pihaknya sedang merancang tata ruang terminal untuk mewujudkan penataan terminal tersebut. Penataan terminal bus akan diprioritaskan pada terminal tipe A.</p>\r\n', '0', '', 'http://203.130.228.62:81/terminal-cctv/assets/files/prifil.png', 'news', '9'),
(6, 'admin tes', '2017-08-16 11:24:59', NULL, '<p>\r\n	Direktur Angkutan dan Multimoda, Direktorat Jenderal Perhubungan Darat Kemenhub, Cucu Mulyana, &lrm;mengatakan Kementerian Perhubungan akan memisahkan area berdasarkan kegiatannya dalam menata <a href=\"http://bisnis.liputan6.com/read/2845604/resmikan-terminal-seloaji-budi-karya-ingatkan-jangan-ada-pungli\" title=\"terminal bus\">terminal bus</a>, yaitu penjualan tiket, batas pengantar, dan ruang tunggu penumpang.</p>\r\n<p>\r\n	&quot;Ada zonasi ada pengantar, membeli tiket, ada yang tinggal berangkat,&quot; kata Cucu, di Jakarta, Selasa (2/5/2017).</p>\r\n<p>\r\n	Cucu menuturkan, pihaknya sedang merancang tata ruang terminal untuk mewujudkan penataan terminal tersebut. Penataan terminal bus akan diprioritaskan pada terminal tipe A.</p>\r\n', '0', '', 'http://203.130.228.62:81/terminal-cctv/assets/files/prifil.png', 'news', '9'),
(7, 'admin tes', '2017-08-16 11:25:28', NULL, '<p>\r\n	Direktur Angkutan dan Multimoda, Direktorat Jenderal Perhubungan Darat Kemenhub, Cucu Mulyana, &lrm;mengatakan Kementerian Perhubungan akan memisahkan area berdasarkan kegiatannya dalam menata <a href=\"http://bisnis.liputan6.com/read/2845604/resmikan-terminal-seloaji-budi-karya-ingatkan-jangan-ada-pungli\" title=\"terminal bus\">terminal bus</a>, yaitu penjualan tiket, batas pengantar, dan ruang tunggu penumpang.</p>\r\n<p>\r\n	&quot;Ada zonasi ada pengantar, membeli tiket, ada yang tinggal berangkat,&quot; kata Cucu, di Jakarta, Selasa (2/5/2017).</p>\r\n<p>\r\n	Cucu menuturkan, pihaknya sedang merancang tata ruang terminal untuk mewujudkan penataan terminal tersebut. Penataan terminal bus akan diprioritaskan pada terminal tipe A.</p>\r\n', '0', '', 'http://203.130.228.62:81/terminal-cctv/assets/files/prifil.png', 'news', '9'),
(8, 'tes', '2017-08-16 11:25:50', NULL, '<p>\r\n	Direktur Angkutan dan Multimoda, Direktorat Jenderal Perhubungan Darat Kemenhub, Cucu Mulyana, &lrm;mengatakan Kementerian Perhubungan akan memisahkan area berdasarkan kegiatannya dalam menata <a href=\"http://bisnis.liputan6.com/read/2845604/resmikan-terminal-seloaji-budi-karya-ingatkan-jangan-ada-pungli\" title=\"terminal bus\">terminal bus</a>, yaitu penjualan tiket, batas pengantar, dan ruang tunggu penumpang.</p>\r\n<p>\r\n	&quot;Ada zonasi ada pengantar, membeli tiket, ada yang tinggal berangkat,&quot; kata Cucu, di Jakarta, Selasa (2/5/2017).</p>\r\n<p>\r\n	Cucu menuturkan, pihaknya sedang merancang tata ruang terminal untuk mewujudkan penataan terminal tersebut. Penataan terminal bus akan diprioritaskan pada terminal tipe A.</p>\r\n', '0', '', 'http://203.130.228.62:81/terminal-cctv/assets/files/prifil.png', 'news', '9'),
(9, 'tes', '2017-08-16 11:26:12', NULL, '<p>\r\n	Direktur Angkutan dan Multimoda, Direktorat Jenderal Perhubungan Darat Kemenhub, Cucu Mulyana, &lrm;mengatakan Kementerian Perhubungan akan memisahkan area berdasarkan kegiatannya dalam menata <a href=\"http://bisnis.liputan6.com/read/2845604/resmikan-terminal-seloaji-budi-karya-ingatkan-jangan-ada-pungli\" title=\"terminal bus\">terminal bus</a>, yaitu penjualan tiket, batas pengantar, dan ruang tunggu penumpang.</p>\r\n<p>\r\n	&quot;Ada zonasi ada pengantar, membeli tiket, ada yang tinggal berangkat,&quot; kata Cucu, di Jakarta, Selasa (2/5/2017).</p>\r\n<p>\r\n	Cucu menuturkan, pihaknya sedang merancang tata ruang terminal untuk mewujudkan penataan terminal tersebut. Penataan terminal bus akan diprioritaskan pada terminal tipe A.</p>\r\n', '0', '', 'http://203.130.228.62:81/terminal-cctv/assets/files/prifil.png', 'news', '9'),
(10, 'Terminal Bis Tipe A Sepi, Dishub Kota Sukabumi Akan Gabung Empat Trayek Angkot', '2017-09-11 07:59:15', NULL, '<p>\r\n	<strong>SUKABUMIUPDATE.com -</strong> Dinas Perhubungan (Dishub) Kota Sukabumi akan menggabung empat trayek angkutan kota untuk mempermudah akses penumpang dari wilayah Utara dengan Selatan menuju Terminal Bis Tipe A KH. Ahmad Sanusi di Jalan Lingkar Selatan.</p>\r\n<p>\r\n	Empat trayek tersebut yakni, angkot 14 trayek Bhayangkara yang disatukan dengan angkot 20 trayek Balandongan. Lalu angkot 15 trayek Bhayangkara dengan angkot 03 B trayek Lembursitu.&nbsp;</p>\r\n<p>\r\n	&quot;Ini masih dalam usulan dan sudah kita sampaikan ke pengurus angkot dan pihak Organda, nanti biar mereka yang mensosialisasikan ke para pengemudi,&quot; ujar Kepala Dishub Kota Sukabumi, Abdulrachman kepada&nbsp;<strong><em>sukabumiupdate.com,</em></strong> Selasa (14/3).<br />\r\n	&nbsp;</p>\r\n<p>\r\n	Rencana penggabungan empat trayek tersebut, karena masyarakat yang tinggal di wilayah Utara mengeluh harus naik angkot dua kali jika menuju Terminal Tipe A. &quot;Sampai saat ini operasional terminal masih belum optimal dan ada kendala, salah satunya akses angkot yang menuju langsung terminal,&quot; tutur Abdulrachman.</p>\r\n<p>\r\n	Dikatakannya, meski sudah ada enam trayek angkot yang menuju terminal tipe A namun perlu dilakukan evaluasi rute kembali, sehingga dapat mendukung keberadaan terminal. &quot;Hasil evaluasi selama tiga bulan ini menunjukkan masih ada kendala, karena trayek ke terminal masih sedikit dan ini yang akan kami carikan solusinya,&quot; katanya.</p>\r\n<p>\r\n	Dampak dari sedikitnya akses angkot ke terminal, hingga saat ini belum ada kenaikan yang signifikan terhadap jumlah penumpang.&nbsp;&quot;Seiring dengan pembangunan ke arah Selatan, <em>insha</em> Allah terminal juga akan semakin ramai. Apalagi kemudahan akses transportasi sudah sangat mendesak,&quot; katanya.<br />\r\n	<br />\r\n	sumber: http://sukabumiupdate.com/berita-terminal-bis-tipe-a-sepi-dishub-kota-sukabumi-akan-gabung-empat-trayek-angkot.html</p>\r\n<p>\r\n	&nbsp;</p>\r\n', '1', '', 'http://203.130.228.62:81/terminal-ku/assets/files/1.jpg', 'news', '-1'),
(11, 'Cilacap Kini Miliki Terminal Bus Megah Tipe A', '2017-09-11 07:59:28', NULL, 'Bertambah lagi jumlah terminal bus tipe A di Indonesia setelah Kementerian Perhubungan resmi meresmikan pengoperasian terminal penumpang tipe tersebut di Kota Cilacap, Jawa Tengah, Rabu (5/7/2017) oleh Direktur Jenderal Perhubungan Darat Pudji Hartanto Iskandar.\r\n<div id=\"m_5096092675416527138yui_3_16_0_ym19_1_1499249957055_82954\">\r\n	Terminal tipe A ini dibangun megah dengan anggaran sekitar Rp 40 miliar dari APBN. Terminal ini memisahkan area kedatangan penumpang dan keberangkatan penumpang dan dilengkapi fasilitas ruang tunggu yang nyaman dan papan informasi rute jurusan bus ke berbagai kota.</div>\r\n<div id=\"m_5096092675416527138yui_3_16_0_ym19_1_1499249957055_82955\">\r\n	Terminal yang direhabilitasi dari terminal lama Cilacap ini dibangun selama tiga tahun mulai 2014 dan selesai di 2016.</div>\r\n<div id=\"m_5096092675416527138yui_3_16_0_ym19_1_1499249957055_82956\">\r\n	Yang membanggakan dari terminal bus ini adalah bangunanya mengadopsi konsep&nbsp;eco green building yang mengacu pada Peraturan Menteri Perhubungan Nomor 132 Tahun 2015 tentang Penyelenggaraan Terminal Penumpang Angkutan Jalan. Pembangunan terminal ini menitik beratkan pada konsep pelayanan penumpang yang terbagi atas zona-zona berbeda. Yakni, zona penumpang bertiket, zona penumpang belum bertiket, zona perpindahan penumpang, dan zona pengendapan kendaraan.</div>\r\n<div id=\"m_5096092675416527138yui_3_16_0_ym19_1_1499249957055_82957\">\r\n	Pembangunan infrastruktur perrhubungan darat merupakan salah satu upaya pemerintah yang bertujuan untuk meningkatkan pemerataan dan penyebaran pembangunan nasional,&rdquo; kata Pudji Hartant. Tujuannya, agar terjadi keselarasan dan keserasian laju pertumbuhan antar daerah serta memperkuat kesatuan nasional melalui interkonektivitas perekonomian antar wilayah.</div>\r\n<div id=\"m_5096092675416527138yui_3_16_0_ym19_1_1499249957055_82958\">\r\n	Salah satu yang perlu dikembangkan, lanjut Pudji, adalah menyangkut faktor kenyamanan terminal agar dapat menarik minat masyarakat menggunakan moda bus dalam perjalanannya.</div>\r\n<div id=\"m_5096092675416527138yui_3_16_0_ym19_1_1499249957055_82959\">\r\n	<em><strong>&ldquo;Saya harap pengelola Terminal&nbsp;Cilacap&nbsp;agar memperhatikan kondisi fasilitas utama dan penunjang terminal terutama kebersihan, ketertiban, kenyamanan, dan keamanan serta melakukan pemeliharaan terhadap fasilitas terminal secara baik,&rdquo;</strong></em> bebernya.</div>\r\n<div id=\"m_5096092675416527138yui_3_16_0_ym19_1_1499249957055_82960\">\r\n	Terminal ini memiliki total luas 9.855 m2 dengan lima lajur keberangkatan bus antarkota antarprovinsi (AKAP) dan sembilan lajur keberangkatan bus antarkota dalam provinsi (AKDP) plus tiga lajur kedatangan (1 lajur untuk masing-masing jenis pelayanan AKAP, AKDP dan Angkot).</div>\r\n<div>\r\n	Penulis : M. Arif<br />\r\n	<br />\r\n	Sumber : http://mobilkomersial.com/2017/07/cilacap-kini-miliki-terminal-bus-megah-tipe/</div>\r\n', '1', '', 'http://203.130.228.62:81/terminal-ku/assets/files/2.jpg', 'news', '-1'),
(12, 'Dikelola Kemhub Terminal Bawen Kab Semarang Makin Baik', '2017-09-11 08:06:41', NULL, '<p>\r\n	JAKARTA (Beritatrans.com) &ndash; Terminal Bawen, Kab Semarang, Jawa Tengah kini kondisinya makin baik dan nyaman. Sekarang tinggal menunggu pelayanan angkutan umum termasuk Anglomerasi Semarang-Bawen yang lebih baik lagi tentunya.</p>\r\n<p>\r\n	Terminal Tipe A itu dikelola Kementerian Perhubungan (Kemhub) melalui Ditjen Perhubungan Darat bersamaaam dengan terminal serupa di Tanah Air. Sesuai UU, pengelolaan Terminal Tipe A&nbsp; di Tanah Air dikembalikan ke pemerintah pusat.</p>\r\n<p>\r\n	&ldquo;Ke depan, kondisi dan pelayanan Terminal tipe A lain harus lebih baik. Kondisinya ditata rapi, fasilitas lengkap baik kantor PO, ruang tunggu penumpang, dan fasilitas umum&nbsp; seperti toilet, musholla, kantin dan lainnya,&rdquo; kata Kepala Lab Transportaso Unika Soegijopranoto Semarang Djoko Setijowarno, ST, MT kepada&nbsp; Beritatrans.com di Jakarta, Rabu (29/3/2017).</p>\r\n<p>\r\n	Menurut dia, ide awal pengelolaan kembali Terminal Tipe A oleh Kemhub adalah untuk mengembalikan peran dan fungsi terminak sesuai UU. Yaitu pelayanan publik yang baik khususnya tempat&nbsp; naik turun penumpang,&rdquo; jelas Djoko.</p>\r\n<p>\r\n	Pemerintah khususnya Kemhub harus mengembalikan peran dan fungsi itu&nbsp; secara optimal. Jangan&nbsp; sebaliknya terminal justru dijadikan sumber PAD tapi pelayanan malah terabaikan.</p>\r\n<p>\r\n	Perbaikan pelayanan di terminal seperti di Bawen, Jateng merupakan bagian perbaikan pelayanan umum serta upaya membangum angkutan umum yang baik.</p>\r\n<p>\r\n	&ldquo;Percuma angkutan umum baik tapi kalao kondisi dan pelayanan&nbsp; di terminal buruk sama saja. PO dan orang enggan ke terminal&nbsp; dan implikasinya angkutan umum makin terpuruk,&rdquo; kilah Djoko.</p>\r\nKe depan, menurut Djoko, Pemerintah dan dunia usaha di Indonesia harus sama-sama membangun angkutan umum yang baik. &ldquo;Terminal&nbsp; tertata rapi dan pelayanan angkutan umum makin baik demi kepuasan pelanggan pula,&rdquo; tandas Djoko.(helmi)<br />\r\n<br />\r\n<br />\r\nSumber : http://beritatrans.com/2017/03/29/dikelola-kemhub-terminal-bawen-kab-semarang-makin-baik/\r\n<p>\r\n	&nbsp;</p>\r\n', '1', '', 'http://203.130.228.62:81/terminal-ku/assets/files/3.jpg', 'news', '-1'),
(13, 'Bus AKAP harus Diperiksa Kelaikannya di Terminal Tipe A Sebelum Diberangkatkan', '2017-09-11 08:23:46', NULL, '<div class=\"single-body\">\r\n	<p>\r\n		JAKARTA (Beritatrans.com) &ndash; Semua kendaraan bus antar kota antar provijsi (AKAP) wajib diperiksa kondisi kelaikan kendaraanya sebelum diberangkatkan (ramp check). Proses pemeriksaan ini harus dilakukan petugas di Terminal tipe A.</p>\r\n	<p>\r\n		&ldquo;Hasilnya&nbsp; sekarang cukup bagus, kasus kecelakaan bus AKAP ada penurunan. Jumlah&nbsp; korban jiwa&nbsp; pun bisa beriurang lagi,&rdquo; kata Kepala Lab Transportasi Unika Soegijopranoto Semarang, Djoko Setijowarnon, ST, MT kepada Beritatrans.com di Jakarta, Sabtu (29/4/2017).</p>\r\n	<p>\r\n		Sayang, lanjut dia, masih ada sejumlah Kepala Daerah di Indonesia yang belum menyerahkan Terminal tipe A ke Pemerintah Pusat (Kementerian Perhuhungan)&nbsp; dengan berbagai alasan. Mereka itu antara lain Kota Medan, Bandung, Surabaya, Tegal, Bekasi, dan Tangerang.</p>\r\n	<p>\r\n		Sebaliknya, menurut Djoko, justru kota-kota kecil di Tanah Air meski kehilangan pendapatan asli daerah (PAD), mau melimpahkan aset terminal tersebut ke pusat.</p>\r\n	<p>\r\n		Sejatinya, tambah Djoko, terminal bukan semata sumber PAD, tapi&nbsp; mereka harus memprioritaskan kepentingan layanan publik dalam bertransportasi.</p>\r\n	<p>\r\n		&ldquo;Bisa saja terminal diperluas peran dan funsinya terutama yang memiliki aset luas menjadi kawasan kepengusahaan. Tapi, mereka tidak meninggalkan fungsi pelayanan publik,&rdquo; tegas Djoko.(helmi)<br />\r\n		<br />\r\n		Sumber : http://beritatrans.com/2017/04/29/bus-akap-harus-diperiksa-kelaikannya-di-terminal-tipe-sebelum-diberangkatkan/</p>\r\n</div>\r\n', '1', '', 'http://203.130.228.62:81/terminal-ku/assets/files/4.jpg', 'news', '-1'),
(14, 'Miris, Setahun Proyek Terminal Pondok Cabe Mangkrak', '2017-09-11 08:31:44', NULL, '<p>\r\n	<strong>INDOPOS.CO.ID - </strong>DPRD Kota Tangerang Selatan (Tangsel) kembali mempertanyakan kinerja Pemkot terkait pembangunan Terminal Pondok Cabe di Kelurahan Pondok Cabe Udik, Kecamatan Pamulang. Pasalnya, mega proyek senilai Rp39 miliar itu mangkrak.</p>\r\n<p>\r\n	Ketua DPRD Kota Tangsel, HM Romlie mengatakan, sudah setahun rencana pembangunan Terminal Pondok Cabe mangkrak. Padahal, ada anggaran pembangunan lanjutan melalui dana hibah dari Pemprov DKI Jakarta sebesar Rp 64 milliar. &rdquo;Dana ada tapi proyek tak juga kelar,&rdquo; ujarnya kepada INDOPOS, keamrin (25/7).</p>\r\n<p>\r\n	Dia juga mengatakan, proyek terminal itu sejak pertengahan 2016 sampai 2017 tidak ada tindak lanjutnya. &rdquo;Lihat sekarang kondisi terminal itu semakin hancur. Kami ingin tahu apa alasan pemkot menelantarkan pembangunan terminal ini,&rdquo; katanya juga.</p>\r\n<p>\r\n	Menurutnya lagi, semenjak mangkrak pembangunan Terminal Pondok Cabe oleh Pemkot Tangsel legislatif terus mendapatkan surat keluhan dari pengelola moda transportasi. Dimana, buruknya akses jalan di terminal itu dan tidak ada tempat berteduh bagi penumpang membuat pengelola moda transportasi umum ini kehilangan konsumen.</p>\r\n<p>\r\n	Tak sampai disana, lanjut Romlie, dugaan DPRD tidak dilanjutkannya pembangunan Terminal Pondok Cabe karena pemkot tidak melihat bangunan itu sebagai fasilitas publik utama. Padahal, kata dia, kebutuhan terminal tipe B untuk menaikkan dan menurunkan penumpang sangat dibutuhkan.</p>\r\n<p>\r\n	Sebab, selama ini beberapa ruas jalan di wilayah itu kerap dijadikan sopir angkutan umum sebagai terminal bayangan yang menimbulkan kemacetan kendaraan.</p>\r\n<p>\r\n	Pantauan INDOPOS, kondisi infrastruktur Terminal Pondok Cabe seluas 1.800 meter persegi di Kecamatan Pamulang sangat memprihatinkan. Median jalan menuju terminal angkutan umum dan antar provinsi ini dipenuhi lumpur dan kubangan yang sulit dilalui kendaraan. Betonisasi jalan menuju lokasi belum menyeluruh sehingga genangan air hujan dan tanah merah terlihat.</p>\r\n<p>\r\n	Kabid Dinas Bangunan Non Perkantoran, &lrm;DBPR Tangsel, Buwana Mahardika menuturkan, belum dilanjutkannya pembangunan Terminal Pondok Cabe tersebut disebabkan dua hal. Yakni, adanya perubahan detail engenering desain (DED) bangunan, dan juga belum adanya pengesahan anggaran lanjutan terminal tersebut.</p>\r\n<p>\r\n	Selain itu juga, anggaran hibah dari Pemprov DKI Jakarta pun tidak dapat dialokasikan untuk pembangunan itu karena peruntukannya untuk pembangunan sarana publik lain. &rdquo;Tahun ini akan dilanjutkan lagi, karena sudah ada pengesahan APBD perubahan. Memang sempat mangkrak karena adanya penambahan bangunan di lokasi terminal. Kami tidak sama sekali ingin membiarkan pembangunan terminal ini seperti itu,&rdquo; tuturnya. <strong>(cok)</strong><br />\r\n	<br />\r\n	Sumber : http://megapolitan.indopos.co.id/read/2017/07/26/105113/Miris-Setahun-Proyek-Terminal-Pondok-Cabe-Mangkrak</p>\r\n', '1', '', 'http://203.130.228.62:81/terminal-ku/assets/files/5.jpg', 'news', '-1'),
(15, 'Pemprov DKI Jakarta Dengan APBD Besar harus Bisa Merawat Terminal Pulogebang', '2017-09-11 08:48:58', NULL, '<p>\r\n	JAKARTA (Beritatrans.com) &ndash; Pemprov DKI&nbsp; Jakarta dengan APBD yang tinggi, sekitar Rp70 triliun,&nbsp; pasti sanggup membenahi Terminal Pulogebang, Jakarta Timur menjadi lebih menarik. Sebentar lagi&nbsp; bangsa Indonesia khususnya Pemprov DKI Jakarta akan menghadapi peak season angkutan Lebaran tahun 2017.</p>\r\n<p>\r\n	&ldquo;Konon, Terminal Pulogebang sudah 5 tahun tidak dianggarkan untuk perawatan. Aiibatnya, beberapa bagian terminal itu sudah mulai rusak dan tidak segera diperbaiki,&rdquo; kata Kepala Lab Transportasi Unika Soegijopranoto Semarang Djoko Setijowarno kepada Beritatrans.com di Jakarta, Rabu (1/3/2017).</p>\r\n<p>\r\n	Namun kini, lanjutnya, karena dioperasikan sehingga terminal penumpang tipe A dengan layanan prima, persoalan kebersihan menjadi hal utama.</p>\r\n<p>\r\n	&ldquo;Terlebih sudah diterbitkan standar pelayanan minimal terminal penumpang,&rdquo; jelas Djoko yant juga Ketua MTI Jawa Tengah itu<br />\r\n	&nbsp;</p>\r\n<p>\r\n	Beberapa bagian Terminal Pulogebang yang rusak kini sudah mulai diperbaiki. Itu sangat bagus dan prlu diteruskan di masa mendatang. &ldquo;Pihak pengeoola terninal itu cukup responsif. Kebersihan toilet juga haruss dijaga 24 jam,&rdquo; kilah Djoko.</p>\r\n<p>\r\n	Perlahan harus dilakukan, apalagi kurang dari 3 bulan sudah musim mudik Lebaran 2017. Saat itu volume penumpang dari Jakarta ke sejumlah kota di Indonesia akab melonjak&nbsp; dan harus bisa dilayani dengan baik.<br />\r\n	<br />\r\n	&ldquo;Mulai sekarang harus berbenah menuju terminal penumpang dengan pelayanan prima. Terminal Pulogebang harus menjadi rujukan an contoh terminal<br />\r\n	dengan pelayanan prima dan berorientasi pelayanan,&rdquo; tegas Djoko.(helmi)</p>\r\n<p>\r\n	&nbsp;</p>\r\n', '1', '', 'http://203.130.228.62:81/terminal-ku/assets/files/6.jpg', 'news', '-1'),
(16, 'Pemprov DKI Tambah Akses ke Terminal Pulogebang ', '2017-09-12 11:15:39', NULL, '<strong>Metrotvnews.com, Jakarta:</strong> Minimnya akses menuju Terminal Pulogebang, Jakarta Timur, masih menjadi masalah yang sering dikeluhkan warga. Akibatnya, para pengusaha otobus (PO) banyak kehilangan penumpang.<br />\r\n<br />\r\nMenanggapi masalah tersebut, Gubernur DKI Jakarta Djarot Saiful Hidayat berencana menyediakan bus pengumpan atau <em>feeder</em>. Nantinya bus-bus tersebut akan mengantar warga menuju terminal Pulogebang.<br />\r\n<br />\r\n<br />\r\n<br />\r\n<br />\r\nSumber : http://news.metrotvnews.com/metro/ybDRy8PK-pemprov-dki-tambah-akses-ke-terminal-pulogebang', '1', '', 'http://203.130.228.62:81/terminal-ku/assets/files/1_1.jpg', 'news', '-1'),
(17, 'Revitalisasi Terminal Baranangsiang Belum Ada Kejelasan', '2017-09-12 11:19:51', NULL, '<strong>BOGOR</strong> - Tidak adanya kepastian dan jaminan dari Pemkot Bogor terkait rencana optimalisasi Terminal Baranangsiang yang merupakan etalase kota hujan membuat geram PT Pancakarya Grahatama Indonesia (PGI) selaku pengembang yang mengklaim telah menghabiskan miliaran rupiah.<br />\r\n<br />\r\nPasalnya, megaproyek dengan nilai investasi sebesar Rp400 miliar tersebut sejak 2012 hingga saat ini belum juga ada titik terang. Hal itu disebabkan Pemkot Bogor selaku pemilik lahan Terminal Baranangsiang tak kunjung memberikan jaminan dalam merealisasikan pengosongan terminal dapat berlangsung aman dan lancar.<br />\r\n<br />\r\n&quot;Kami telah banyak memberikan kontribusi ke Pemkot Bogor baik pajak Rp7,2 miliar maupun kewajiban-kewajiban lainnya yang mengeluarkan biaya nilainya miliaran rupiah. Tapi sampai saat ini belum juga memberikan waktu kapan kami bisa mulai melakukan optimalisasi (pembangunan) Termial Baranangsiang itu,&quot; kata Corporate Secretary PT. PGI Firman Dwinanto kepada KORAN SINDO, Senin, 6 Juni 2017 kemarin.<br />\r\n<br />\r\nFirman menuturkan selain sudah membayar pajak Rp7,2 miliar ke Dinas Pendapatan Kota Bogor, pihaknya juga baru saja kembali membayar kontribusi tahunan kepada Pemkot Bogor untuk melaksanakan seluruh isi ketentuan Perjanjian Kerja Sama (PKS).<br />\r\n<br />\r\n&quot;Ini pembayaran kami yang ke-4 sejak tanggal ditandatanganinya PKS. Jatuh tempo setiap tahunnya itu di bulan Januari, jadi kami juga telah memberikan jaminan dalam bentuk performance bond senilai Rp21,9 miliar kepada Pemkot Bogor,&quot; jelasnya.<br />\r\n<br />\r\nSelain membayar kewajiban-kewajiban dan kontribusi, PT PGI juga bahkan telah memperpanjang sewa tanah untuk Terminal Wangun sebagai terminal sementara selama proyek optimalisasi Terminal Baranangsiang berlangsung.<br />\r\n<br />\r\n&quot;Itupun jumlahnya miliaran, kami mengingatkan Pemkot Bogor, bahwa kami terus memenuhi kewajiban kami sesuai isi perjanjian dan PT. PGI juga terus berhitung kerugian yang ditimbulkan. Kita sangat kecewa karena hingga saat ini Walikota Bogor belum juga mau menentukan waktu pasti pengosongan terminal,&quot; tegasnya.<br />\r\n<br />\r\nMenurut Firman, seluruh keinginan yang diminta Pemkot sudah dipenuhi dan diakomodir, seperti permintaan revisi desain dan permasalahan sosial yang selama ini menjadi kendala sudah diselesaikan. Namun meski semua sudah dipenuhi, tetap saja sampai saat ini PT. PGI belum mendapatkan jaminan apapun dari Pemkot terkait kapan pembangunan dimulai.<br />\r\n<br />\r\nSekadar diketahui, jadwal pengosongan Terminal Baranangsiang Kota Bogor seharusnya sudah bisa dilaksanakan sejak empat tahun silam, dikarenakan banyak penolakan dari warga sekitar dan pengusaha angkutan umum akhirnya terus tertunda.<br />\r\n<br />\r\nSementara itu, Kepala Badan Pengelolaan Keuangan dan Aset Daerah Kota Bogor, A Hanafi mengatakan, saat ini Pemkot Bogor masih tetap terikat dalam perjanjian dengan PT PGI untuk melakukan optimalisasi aset terminal, &quot;Belum ada pembatalan dan belum ada adendum MoU, kita Pemkot Bogor masih terikat kerjasama untuk pembangunan terminal dan hotel baranangsiang,&quot; singkatnya.<br />\r\n<br />\r\nWali Kota Bogor Bima Arya Sugiarto saat dikonfirmasi terkait program mangkraknya optimalisasi/revitalisasi terminal Baranangsiang mengaku belum mengeluarkan keputusan apapun terkait program penataan Terminal Baranangsiang. &quot;Masih akan dibicarakan internal terlebih dahulu kemudian dikonsultasikan ke DPRD,&quot; kata Wali Kota Bogor Bima Arya Sugiarto.<br />\r\n<br />\r\nMeski demikian, pihaknya tak membantah saat ditanya kecenderungan untuk membatalkan kerja sama dengan PGI yang sudah terjalin sejak 29 Juni 2012 di era Wali Kota Bogor Diani Budiarto itu. &quot;Keputusan belum saya ambil ya,&quot; katanya.<br />\r\n<br />\r\nBima mengakui, masalah penataan terminal di ujung Jalan Tol Jakarta-Bogor-Ciawi (Jagorawi) itu sudah dibicarakan dengan Menteri Agraria dan Tata Ruang, Menteri Lingkungan Hidup dan Kehutanan, Menteri Pekerjaan Umum dan Perumahan Rakyat. &quot;Saya juga mengonsultasikan ini dengan Presiden,&quot; katanya.<br />\r\n<br />\r\nSumber : https://metro.sindonews.com/read/1211301/171/revitalisasi-terminal-baranangsiang-belum-ada-kejelasan-1496755178', '1', '', 'http://203.130.228.62:81/terminal-ku/assets/files/1_2.jpg', 'news', '-1'),
(18, 'Runway dan Terminal Internasional Bandara Silangit Rampung', '2017-09-13 04:43:34', NULL, '<p>\r\n	<strong>VIVA.co.id</strong>&nbsp;&ndash; Kabar gembira bagi wisatawan dan destinasi wisata Danau Toba dan sekitarnya. Pasalnya, pembangunan perpanjangan landasan pacu (runway) dan terminal baru untuk internasional Bandara Silangit bakal rampung 15 September 2017 mendatang.</p>\r\n<p>\r\n	Direktur Utama Angkasa Pura II Muhammad Awaluddin, saat melakukan kunjungan kerja ke Bandara Silangit Sabtu, 5 Agustus 2017, mengatakan, ditingkatkannya status Bandara Silangit di Kabupaten Tapanuli, Sumatera Utara sebagai Bandara Internasional demi melayani antusias wisatawan ke Danau Toba. Dengan begitu wisatawan tidak harus transit terlebih dulu untuk bisa mencapai objek wisata Danau Toba.</p>\r\n<p>\r\n	&ldquo;Saya sudah melihat perkembangannya Bandara Silangit. Dipastikan perpanjangan landasan pacu dan terminal internasional akan selesai 15 September 2017. Runway yang tadinya 2.200 meter sekarang menjadi 2.650 m dan lebar yang tadinya 30 meter menjadi 45 meter. Ini menjadikan Bandara Silangit jadi memungkinkan didarati pesawat-pesawat besar seperti pesawat tipe 737-800 atau sekelas Airbus 320. Dan, nantinya penerbangan dari Singapura akan mudah mendarat di sana,&quot; kata Awaluddin, Jumat 4 Agustus 2017.</p>\r\n<p>\r\n	Dengan selesainya Bandara Silangit jadi internasional, lanjut Awaluddin, pencapaian penumpang ditargetkan hingga 500.000 orang hingga tahun 2019. Saat ini, pertumbuhan penumpang Bandara Silangit terus mengalami peningkatan pesat. Permintaan yang tinggi tersebut salah satunya didorong peningkatan jumlah wisatawan yang menuju ke Danau Toba.</p>\r\n<p>\r\n	&quot;Penumpang yang menggunakan Bandara Silangit mencapai 124.000 orang selama semester I-2017, atau tumbuh lebih dari 300% dibandingkan periode yang sama tahun lalu. Tahun lalu 31.000 penumpang, sekarang ada 124.000. Jadi dalam satu bulan tak kurang dari 20.000 penumpang. Prediksi kami sampai akhir tahun 250.000-300.000 penumpang,&quot; ujar Awaluddin.</p>\r\n<p>\r\n	Silangit adalah salah satu bandara dari 13 bandara yang berada di bawah manajemen PT Angkasa Pura II (Persero). Airport Operator yang masuk dalam nominasi penghargaan International Airport Review Award 2017.</p>\r\n<p>\r\n	Di 2017 ini, ada 9 kategori penghargaan International Airport Review Award 2017. Indonesia lewat AP II masuk nominasi di tiga&nbsp; kategori. Yang pertama, Passenger Experience. Nominasi berikutnya Airside Operation. Satunya lagi Air Traffic Center (ATC) / Air Traffic Movement (ATM). &quot;Yuk, para sahabat, bantuin e-voting buat AP2 ya,&quot; ajak Awal.</p>\r\n<p>\r\n	Panduan e-votenya sangat gampang, Syaratnya? Satu email, satu suara, satu IP Address, satu device, atau satu computer atau HP satu suara. Cukup klik link https://www. internationalairportreview.com . Setelah itu buka kategori Passenger Experience, Airside Operation, dan Air Traffic Center (ATC) / Air Traffic Movement (ATM). Di tiga pilihan tadi ada pilihan Angkasa Pura II. Klik lalu kirimkan sebelum 31 Agustus 2017.</p>\r\n<p>\r\n	Awaluddin menambahkan, peningkatan penumpang pasca menjadi bandara internasional akan diupayakan dengan menarik penumpang dari 3 hub bandara, yakni Bandara Changi Singapura, Bandara Internasional Kuala Lumpur, dan Bandara Suvarnabhumi Bangkok.</p>\r\n<p>\r\n	&quot;Desain awal kan untuk domestik. Tapi kemudian Kementerian Pariwisata minta dikembangkan untuk mendukung pariwisata di Danau Toba. Yang membedakan dengan bandara domestik prinsipnya hanya penambahan fasilitas Bea Cukai, Karantina, dan Imigrasi,&quot; ujar Awaluddin.</p>\r\n<p>\r\n	Saat ini sudah dua maskapai yang sudah melayani penerbangan ke Silangit yakni Garuda dan Sriwijaya, dan dalam waktu dekat akan menyusul Lion Air.</p>\r\n<p>\r\n	&ldquo;Menarik kalau dilihat dari traffic Silangit, ini membuktikan kalau destinasi Danau Toba penuh pesona. Artinya setelah diperbaiki bandaranya, permintaannya sangat tinggi,&rdquo; ungkapnya.</p>\r\n<p>\r\n	Prediksi Menteri Pariwisata Arief Yahya soal Bandara Silangit, persis! Begitu Akses Udara dibuka, destinasi Danau Toba bergairah. Menpar Arief menyebut supply creates its own demand! Itu awal perdebatan untuk mengaktifkan Bandara Silangit untuk Pariwisata.</p>\r\n<p>\r\n	Dikatakan Menpar Arief Yahya, pihaknya sudah mengirim surat kepada Kementerian Hukum dan HAM, agar dapat mempersiapkan tenaga imigrasi untuk Bandara Silangit.</p>\r\n<p>\r\n	&ldquo;Kemenkum HAM sudah mempersiapkan tenaga keimigrasian. Jika Bandara Silangit tidak segera dibangun jadi Bandara Internasional, maka wisatawan akan enggan datang ke Danau Toba, sebab orang kalau sudah waktu tempuhnya lebih dari dua jam perjalanan darat itu tidak akan mau,&rdquo; ujarnya.</p>\r\n<p>\r\n	Untuk membangun kawasan Danau Toba, dijabarkan Menpar Arief Yahya, pemerintah secara umum telah menggelontorkan anggaran sebesar Rp20 triliun, yang nantinya dana Rp10 triliun untuk pembangunan infrastruktur dasar, dan Rp10 triliun untuk pembangunan resort.</p>\r\n<p>\r\n	&ldquo;Saat ini, infrastruktur sudah mulai dikerjakan, seperti jalan tol, perbaikan jalan menuju Bandara Silangit yang menghabiskan anggaran sekitar Rp350 miliar, perbaikan jalan menuju Bandara Sibisa dan pembangunan jalan inner ringroad Danau Toba di Samosir, serta jalan outer ringroad di luar Danau Toba,&rdquo; ujar pria asal Banyuwangi ini.(webtorial)</p>\r\n', '1', '', 'http://203.130.228.62:81/terminal-ku/assets/files/13_1.jpg', 'news', '-1'),
(19, 'Evaluasi Pengalihan Terminal Peti Kemas, ALFI Apresiasi Upaya Kontigensi dari Kemenhub', '2017-09-13 04:45:31', NULL, '<p>\r\n	Menurut dia, semua pihak yang terlibat tersebut telah menunjukkan upaya ekstra guna mendukung kelancaran arus petikemas di Pelabuhan Tanjung Priok.</p>\r\n<p>\r\n	&ldquo;Berdasarkan evaluasi kami, sekitar 20shipping lines (ocean going) beralih dari JICT ke Terminal Petikemas (TPK) Koja, NPCT 1, dan Pelabuhan Jakarta. Dan sekarang jika ada shipping lines yang tidak kembali ke JICT, itu pilihan mereka terkait pelayanan dan kepastian tidak adanya konflik,&rdquo; katanya.</p>\r\n<p>\r\n	Dia juga menyinggung konflik antara serikat pekerja JICT dan manajemen JICT yang masih berlangsung.</p>\r\n<p>\r\n	&ldquo;Kami juga mendengar adanya saling lapor antara kedua pihak tersebut. Itu masalah internal mereka,&rdquo; tuturnya.</p>\r\n<p>\r\n	Yukki hanya menggarisbawahi, kekhawatiran berbagai pihak tentang dampak dari mogok kerja pekerja JICT akan mengganggu proses bongkar muat petikemas dan mempengaruhi arus ekspor-impor tidak terjadi.<br />\r\n	<br />\r\n	<br />\r\n	Sumber : http://www.tribunnews.com/bisnis/2017/09/11/evaluasi-pengalihan-terminal-peti-kemas-alfi-apresiasi-upaya-kontigensi-dari-kemenhub</p>\r\n', '1', '', 'http://203.130.228.62:81/terminal-ku/assets/files/13_2.jpg', 'news', '-1'),
(20, 'Terminal Depok Akan Dipindah, Realisasinya Tergantung Cepatnya Penyelesaian Proyek', '2017-09-13 05:27:07', NULL, '<strong>RIBUNNEWS.COM, DEPOK -</strong> Kepala Dinas Perhubungan (Dishub) Kota Depok Gandara Budiana menyatakan bahwa pengalihan sementara <a class=\"blue\" href=\"http://www.tribunnews.com/tag/terminal-depok\" title=\"Terminal Depok\">Terminal Depok</a> ke lahan <a class=\"blue\" href=\"http://www.tribunnews.com/tag/stasiun-ka-depok-baru\" title=\"Stasiun KA Depok Baru\">Stasiun KA Depok Baru</a> (Stadebar) di belakangnya, dipastikan akan dilakukan dalam beberapa waktu ke depan.\r\n<p style=\"\">\r\n	Persiapan pengalihan sementara terminal, katanya mulai dilakukan pihaknya, menyusul telah dimulainya secara resmi pengerjaan pembangunan mega proyek <a class=\"blue\" href=\"http://www.tribunnews.com/tag/terminal-terpadu-kota-depok\" title=\"Terminal Terpadu Kota Depok\">Terminal Terpadu Kota Depok</a>, di lahan terminal, pada Rabu (22/4/2017) lalu.</p>\r\n<p style=\"\">\r\n	Dimulainya pengerjaan ditandai dengan pemancangan sheet piles di lahan di sisi Kali Baru di belakang lahan terminal, berikut pemerataan sebagian lahan terminal.</p>\r\n<p style=\"\">\r\n	&quot;Untuk pengalihan sementara terminal, saat ini sedang kita rumuskan ulang untuk menyesuaikan dengan tahapan pengerjaan pembangunan proyek Terminal Terpadu,&quot; kata Gandara, kepada Warta Kota, Jumat (14/4/2017).</p>\r\n<p style=\"\">\r\n	Sebab kata dia jalan penghubung ke lahan Stadebar untuk kendaraan angkutan yang nantinya dialihkan ke sana, belum sepenuhnya rampung.</p>\r\n<p style=\"\">\r\n	Sehingga kata dia, pihaknya menunggu pengerjaan jalan penghubung itu dirampungkan pengembang sekaligus investor mega proyek tersebut, yakni PT Andyka Investa.</p>\r\n<p style=\"\">\r\n	Gandara mengatakan saat ini pengerjaan mega proyek baru dilakukan pengembang di sebagian lahan terminal, yakni di bagian belakang yang berbatasan dengan kali dan lahan Stadebar.</p>\r\n<p style=\"\">\r\n	Sementara di bagian depan, masih digunakan untuk operasional terminal yakni untuk kendaraan angkutan yang keluar dan masuk terminal.</p>\r\n<p style=\"\">\r\n	Nantinya jika pengerjaan sudah masuk di lahan bagian depan ini, maka pengalihan sementara terminal ke lahan Stadebar, harus segera siap dilakukan.</p>\r\n<p style=\"\">\r\n	Sebab saat pengerjaan di sana dilakukan, maka lahan terminal harus steril dari kendaraan angkutan.</p>\r\n', '1', '', 'http://203.130.228.62:81/terminal-ku/assets/files/13_3.jpg', 'news', '-1'),
(21, '14 September, \"Skytrain\" di Soekarno-Hatta Jalani Tahap Akhir untuk Izin Operasi', '2017-09-14 09:16:47', NULL, '<strong>TANGERANG, KOMPAS.com -</strong> Setelah menjalani uji coba selama sebulan lebih, layanan kereta tanpa awak atau <em> <a class=\"inner-link\" href=\"http://indeks.kompas.com/tag/skytrain\" style=\"color:#428bca;\" target=\"_blank\">skytrain</a></em> di Bandara Soekarno-Hatta akan menjalani proses verifikasi untuk diuji kelayakannya pada Kamis (14/9/2017).\r\n<p>\r\n	Proses verifikasi ditempuh untuk mendapatkan izin operasi sebelum layanan <em>skytrain</em> dioperasikan, menurut rencana, pada Minggu (17/9/2017).</p>\r\n<p>\r\n	&quot;Verifikasi akan dilakukan oleh Direktorat Jenderal Perkeretaapian Kementerian Perhubungan, PT Angkasa Pura II, PT Wijaya Karya, dan PT Len Industry. Hasil verifikasi besok akan ditindaklanjuti dengan keluarnya izin operasi dari Ditjen Perkeretaapian,&quot; kata Public Relation Manager PT Angkasa Pura II, Yado Yarismano, melalui keterangannya kepada pewarta, Rabu (13/9/2017).</p>\r\n<p>\r\n	Menurut Yado, sebelum menjalani tahap verifikasi, proses uji coba berjalan lancar.</p>\r\n<p>\r\n	(baca: <a class=\"inner-link\" href=\"http://megapolitan.kompas.com/read/2017/08/16/11275751/modernisasi-layanan-bandara-dengan-skytrain-\" target=\"_blank\">Modernisasi Layanan Bandara dengan &quot;Skytrain&quot;</a>)</p>\r\n<p>\r\n	Sehingga, jika tahapan verifikasi berhasil dilalui, layanan <em>skytrain</em> sudah bisa dirasakan bulan ini. Adapun tahapan awal operasional <em>skytrain</em> nantinya baru dari Terminal 3 ke Terminal 2 dan sebaliknya.</p>\r\n<p>\r\n	Konstruksi jalur<em> skytrain</em> dari Terminal 3 ke Terminal 2 telah tersambung, dengan jarak sekitar 1,7 kilometer.</p>\r\n<p>\r\n	Setelah <em>skytrain</em> beroperasi dari Terminal 3 ke Terminal 2, akan dilanjutkan sampai ke Terminal 1, <em>Integrated Building</em>, lalu tersambung lagi ke Terminal 3.</p>\r\n<div class=\"flying_desktop\">\r\n	&nbsp;</div>\r\n<p>\r\n	<em>Integrated Building</em> merupakan bangunan tempat pengguna jasa berpindah moda transportasi, baik ke bus, taksi, maupun kereta bandara.</p>\r\n<p>\r\n	(baca: <a href=\"http://megapolitan.kompas.com/read/2017/08/15/14105131/mengintip-interior-gerbong-skytrain-bandara-soekarno-hatta\" target=\"_blank\">Mengintip Interior Gerbong &quot;Skytrain&quot; Bandara Soekarno-Hatta</a>)</p>\r\n<p>\r\n	Layanan <em>skytrain</em> memudahkan pengguna jasa bandara untuk berpindah terminal, dari yang biasanya menggunakan kendaraan pribadi atau<em> shuttle</em> bus gratis.</p>\r\n<p>\r\n	Ada total tiga rangkaian kereta, dengan satu rangkaian terdiri dari dua gerbong, yang akan dioperasikan di Bandara Soekarno-Hatta.</p>\r\n<p>\r\n	Jarak antar-kedatangan ditargetkan maksimal lima menit, dengan waktu tempuh mengelilingi seluruh terminal dan <em>Integrated Building</em> di bandara sekitar tujuh menit. Satu rangkaian kereta bisa menampung hingga 176 penumpang di dalamnya.</p>\r\n', '1', '', 'http://203.130.228.62:81/terminal-ku/assets/files/14_1.jpg', 'news', '-1');

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

--
-- Dumping data for table `tbl_schedule`
--

INSERT INTO `tbl_schedule` (`id`, `judul`, `tanggal`, `file`, `status_tampil`, `terminal_id`, `tujuan_datang`, `waktu_datang`, `operator_datang`, `tujuan_berangkat`, `waktu_berangkat`, `operator_berangkat`) VALUES
(1, NULL, NULL, NULL, '0', 3, 'Cicaheum - Bandung', '06:30', 'Budiman', 'Cicaheum - Bandung', '07.30', 'Budiman'),
(2, NULL, NULL, NULL, '0', 3, 'Bandung', '16:10', 'Kramat Djati', 'Bandung', '17:45', 'Kramat Djati'),
(3, NULL, NULL, NULL, '0', 9, 'bandung', 'senin 15:00:00', 'admin', 'jakarta', 'senin 09:00:00', 'admin'),
(4, NULL, NULL, NULL, '0', 9, '', '', '', '', '', 'admin'),
(5, NULL, NULL, NULL, '0', 9, '', '', '', '', '', 'admin'),
(6, NULL, NULL, NULL, '0', 9, '', '', '', '', '', 'admin'),
(7, NULL, NULL, NULL, '0', 9, '', '', '', '', '', ''),
(8, NULL, NULL, NULL, '0', 9, '', '', '', '', '', ''),
(9, NULL, NULL, NULL, '0', 9, '', '', '', '', '', ''),
(10, NULL, NULL, NULL, '0', 9, '', '', '', '', '', ''),
(11, NULL, NULL, NULL, '0', 9, '', '', '', '', '', ''),
(12, NULL, NULL, NULL, '0', 9, '', '', '', '', '', ''),
(13, NULL, NULL, NULL, '0', 9, '', '', '', '', '', ''),
(14, NULL, NULL, NULL, '0', 9, '', '', '', '', '', ''),
(15, NULL, NULL, NULL, '0', 9, '', '', '', '', '', ''),
(16, NULL, NULL, NULL, '0', 9, '', '', '', '', '', ''),
(17, NULL, NULL, NULL, '0', 9, '', '', '', '', '', ''),
(18, NULL, NULL, NULL, '0', 9, '', '', '', '', '', ''),
(19, NULL, NULL, NULL, '0', 9, '', '', '', '', '', ''),
(20, NULL, NULL, NULL, '0', 9, 'bandung', 'rabu,27 agustus 2016', 'damri', 'solo', 'rabu 09:00:00', 'damri'),
(21, NULL, NULL, NULL, '0', 9, 'jakarta', 'selasa 10:10:10', 'debora', 'solo', 'selasa 08:00:00', 'debora'),
(22, NULL, NULL, NULL, '0', 9, 'jakarta', 'senin 09:00:00', 'hiba utama', 'solo', 'senin 07:00:00', 'hiba utama'),
(23, NULL, NULL, NULL, '0', 9, 'Jakarta', '08.00', 'Septian', 'Terminal Arjosari', '15.00', 'Septian'),
(24, NULL, NULL, NULL, '1', 5, 'Surabaya', '15.33', 'Sugeng Rahayu', 'Solo', '15.38', 'Sugeng Rahayu'),
(25, NULL, NULL, NULL, '1', 5, 'Yogyakarta', '01.00', 'Sumber Selamat', 'Solo', '01.07', 'Sumber Selamat'),
(26, NULL, NULL, NULL, '1', 5, 'Malang', '21.20', 'Rosalia Indah', 'Solo', '21.30', 'Rosalia Indah'),
(27, NULL, NULL, NULL, '1', 5, 'Jakarta', '16.45', 'Damri', 'Solo', '17.00', 'Damri'),
(28, NULL, NULL, NULL, '1', 5, 'Denpasar', '16.00', 'Safari Dharma Raya', 'Solo', '16.15', 'Safari Dharma Raya'),
(29, NULL, NULL, NULL, '1', 4, 'Yogyakarta', '06.20', 'EKA', 'Sidoarjo', '06.30', 'EKA'),
(30, NULL, NULL, NULL, '1', 4, 'Semarang', '15.15', 'EKA', 'Sidoarjo', '15.30', 'EKA'),
(31, NULL, NULL, NULL, '1', 4, 'Magelang', '18.00', 'EKA', 'Sidoarjo', '18.10', 'EKA'),
(32, NULL, NULL, NULL, '1', 4, 'Jakarta', '16.00', 'Lorena', 'Sidoarjo', '16.10', 'Lorena'),
(33, NULL, NULL, NULL, '1', 4, 'Cilacap', '09.00', 'Sugeng Rahayu', 'Sidoarjo', '09.15', 'Sugeng Rahayu'),
(34, NULL, NULL, NULL, '1', 3, 'Mataram', '09.00', 'Safari Dharma Raya', 'Yogyakarta', '09.10', 'Safari Dharma Raya'),
(35, NULL, NULL, NULL, '1', 3, 'Jakarta', '13.15', 'Sinar Jaya', 'Yogyakarta', '13.30', 'Sinar Jaya'),
(36, NULL, NULL, NULL, '1', 3, 'Palembang', '17.30', 'Ramayana', 'Yogyakarta', '17.40', 'Ramayana'),
(37, NULL, NULL, NULL, '1', 3, 'Bandung', '20.15', 'Maju Lancar', 'Yogyakarta', '20.20', 'Maju Lancar'),
(38, NULL, NULL, NULL, '1', 3, 'Malang', '12.00', 'Handoyo', 'Yogyakarta', '12.05', 'Handoyo'),
(39, NULL, NULL, NULL, '1', 6, 'Bogor', '13.30', 'Hasta Putra', 'Klaten', '13.35', 'Hasta Putra'),
(40, NULL, NULL, NULL, '1', 6, 'Denpasar', '14.00', 'Gunung Harta', 'Klaten', '14.05', 'Gunung Harta'),
(41, NULL, NULL, NULL, '1', 6, 'Merak', '14.00', 'Sumber Alam', 'Klaten', '14.10', 'Sumber Alam'),
(42, NULL, NULL, NULL, '1', 6, 'Ciputat', '13.55', 'Kramat Jati', 'Klaten', '14.00', 'Kramat Jati'),
(43, NULL, NULL, NULL, '1', 6, 'Jakarta', '14.15', 'Mulyo Indah', 'Klaten', '14.20', 'Mulyo Indah'),
(44, NULL, NULL, NULL, '1', 9, 'Yogyakarta', '09.05', 'Handoyo', 'Malang', '09.15', 'Handoyo'),
(45, NULL, NULL, NULL, '1', 9, 'Solo', '21.20', 'Rosalia Indah', 'Malang', '21.30', 'Rosalia Indah'),
(46, NULL, NULL, NULL, '1', 7, 'Sidoarjo', '13.45', 'EKA', 'Semarang', '14.00', 'EKA'),
(47, NULL, NULL, NULL, '1', 7, 'Jakarta', '09.45', 'Safari', 'Semarang', '10.00', 'Safari'),
(48, NULL, NULL, NULL, '1', 11, 'Wonogiri', '12.00', 'Tunggal Daya', 'Sukabumi', '12.30', 'Tunggal Daya'),
(49, NULL, NULL, NULL, '1', 11, 'Solo', '14.50', 'Rajawali', 'Sukabumi', '15.00', 'Rajawali'),
(50, NULL, NULL, NULL, '1', 8, 'Sukabumi', '12.20', 'Tunggal Daya', 'Wonogiri', '12.30', 'Tunggal Daya'),
(51, NULL, NULL, NULL, '1', 8, 'Jakarta', '15.50', 'GMS', 'Wonogiri', '16.00', 'GMS'),
(52, NULL, NULL, NULL, '1', 10, 'Jakarta', '18.00', 'Sinar Jaya', 'Cilacap', '18.15', 'Sinar Jaya'),
(53, NULL, NULL, NULL, '1', 10, 'Surabaya', '08.10', 'EKA', 'Cilacap', '08.20', 'EKA');

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
  `contact` text NOT NULL,
  `status_tampil` char(1) NOT NULL DEFAULT '1',
  `ip` varchar(255) NOT NULL,
  `lat_koord` char(10) DEFAULT NULL,
  `long_koord` char(10) DEFAULT NULL,
  `alamat` text,
  `foto_kepala` varchar(255) DEFAULT NULL,
  `nama_kepala` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_terminal`
--

INSERT INTO `tbl_terminal` (`id`, `nama_terminal`, `foto`, `about_us`, `video_profile`, `schedule`, `contact`, `status_tampil`, `ip`, `lat_koord`, `long_koord`, `alamat`, `foto_kepala`, `nama_kepala`) VALUES
(2, 'Pusat', '', 'About Us Pusat', '', '', '', '0', 'http://203.130.228.229:8887/terminalku/index.php/terminal', '0', '0', NULL, NULL, NULL),
(3, 'Giwangan', '', '<p>\r\n	Terminal Giwangan adalah sebuah terminal angkutan umum yang terletak di kota&nbsp;<a href=\"https://id.wikipedia.org/wiki/Kota_Yogyakarta\" title=\"Kota Yogyakarta\">Yogyakarta</a>. Terminal ini terletak di Kelurahan&nbsp;<a href=\"https://id.wikipedia.org/wiki/Giwangan,_Umbulharjo,_Yogyakarta\" title=\"Giwangan, Umbulharjo, Yogyakarta\">Giwangan, Umbulharjo, Yogyakarta</a>, tepatnya di Jalan Imogiri Timur Km 6, di dekat perbatasan antara Kota Yogyakarta dengan Kabupaten Bantul.</p>\r\n<p>\r\n	Terminal Giwangan dibangun untuk menggantikan Terminal Umbulharjo. Terminal Giwangan merupakan terminal tipe A terbesar di Indonesia yang merupakan tempat singgah bus dari seluruh kota besar di Sumatra, Jawa, Bali dan Nusa Tenggara.</p>\r\n<p>\r\n	Terminal ini diresmikan pada tanggal&nbsp;<a href=\"https://id.wikipedia.org/wiki/10_Oktober\" title=\"10 Oktober\">10 Oktober</a>&nbsp;<a href=\"https://id.wikipedia.org/wiki/2004\" title=\"2004\">2004</a>, rata-rata jumlah penumpang yang dilayani sarana itu berkisar 20.000 per hari sedangkan jumlah bus yang melaluinya, berdatangan maupun bertujuan ke provinsi lain, mencapai 850 buah.<br />\r\n	&nbsp;</p>\r\n<h2>\r\n	<span class=\"mw-headline\" id=\"Bus_Antarkota_.3D\">Bus Antarkota</span></h2>\r\n<br />\r\n<h3>\r\n	<span class=\"mw-headline\" id=\"AKAP\">AKAP</span></h3>\r\n<ul>\r\n	<li>\r\n		<b>Yogyakarta</b> - Palembang - Jambi&nbsp;: Putra Remaja, Ramayana</li>\r\n	<li>\r\n		Yogyakarta - Lampung: Putra Remaja, Sinar Jaya</li>\r\n	<li>\r\n		Yogyakarta - Jabodetabek&nbsp;: Sinar Jaya, Pahala Kencana, Safari Dharma Raya, Handoyo, Ramayana, Santoso, Maju Lancar, Kramat Djati, Sumber Alam, Rosalia Indah, Prayogo, Murni Jaya, Laju Prima, Puji Kurnia</li>\r\n	<li>\r\n		Yogyakarta - Bandung: Bandung Express, Kramat Djati, Pahala Kencana, Budiman, Mandala</li>\r\n	<li>\r\n		Yogyakarta - Tasik: Budiman</li>\r\n	<li>\r\n		Yogyakarta - Cirebon: Citra Adi Lancar</li>\r\n	<li>\r\n		Yogyakarta - Cilacap: Efisiensi, Riyan, Aman</li>\r\n	<li>\r\n		Yogyakarta - Purwokerto: Efisiensi, Mulyo</li>\r\n	<li>\r\n		Yogyakarta - Magelang - Semarang: Ramayana, Tri Sakti, Mustika, Sumber Waras</li>\r\n	<li>\r\n		Yogyakarta - Wonosari - Praci - Batu Retno: Purwo Widodo</li>\r\n	<li>\r\n		<b>Yogyakarta</b> - Solo - Madiun - Surabaya&nbsp;: Sumber Selamat, Sugeng Rahayu, Mira</li>\r\n	<li>\r\n		Yogyakarta - Solo - Surabaya (via Karang Jati): EKA, Sugeng Rahayu</li>\r\n	<li>\r\n		Yogyakarta - Solo - Surabaya (via Semarang-Tuban): Jogja Indah</li>\r\n	<li>\r\n		Purwokerto - Yogyakarta - Surabaya: Handoyo, Rosalia Indah, Sugeng Rahayu, EKA</li>\r\n	<li>\r\n		Purwokerto - Yogyakarta - Malang: Rosalia Indah (via Blitar/Pandaan), Handoyo (via Pandaan), Zena</li>\r\n	<li>\r\n		Cilacap/Banjarnegara - Yogyakarta - Malang: Handoyo</li>\r\n	<li>\r\n		Yogyakarta - Solo - Jember - Banyuwangi: Mila Sejahtera, Akas Asri</li>\r\n	<li>\r\n		Purwokerto - Yogyakarta - Denpasar: Wisata Komodo, HD Transport</li>\r\n	<li>\r\n		Yogyakarta - Solo - Denpasar: Wisata Komodo, Restu Mulya, Gunung Harta, Safari Dharma Raya, Gunung Harta, Tami Jaya, Sedya Mulya</li>\r\n	<li>\r\n		Yogyakarta - Solo - Mataram: Safari Dharma Raya</li>\r\n	<li>\r\n		Lampung - Yogyakarta - Jember: Surya Mulya, Rosalia Indah, Sumber Alam, Sinar Jaya</li>\r\n	<li>\r\n		Yogyakarta - Solo - Grobogan/Gundih: Budi Jaya, Trans Zentrum, Subur Jaya, Rela, Purwo Gumilar</li>\r\n	<li>\r\n		Solo - <b>Yogyakarta</b> - Magelang: Rosalia Indah, Tri Sakti, Gege Transport</li>\r\n</ul>\r\n<h3>\r\n	<span class=\"mw-headline\" id=\"AKDP\">AKDP</span></h3>\r\n<ul>\r\n	<li>\r\n		Yogyakarta - Wonosari: Rawit Mulyo, Maju Lancar, Djangkar Bumi, Bakmi Jawa</li>\r\n	<li>\r\n		Yogyakarta - Trenggalek (Via Ponorogo/Kertosono): Cendana, Madjoe Utama, Sari Indah, Dahlia Indah, Jaya I (Kuning), Jaya II (Putih), Harapan Jaya, Harapan Baru, Pelita Indah, Tentrem, Zena, Restu, Akas IV (Yuangga/Estu Jaya), Akas III (Kurnia Jaya/Anggun Krida), Akas N1, Akas NR, Harapan Kita, Haz, Jaya Utama, Indonesia, Widji Lestari, Ladju</li>\r\n</ul>\r\n<p>\r\n	&nbsp;</p>\r\n', 'http://203.130.228.62:81/terminal-ku/assets/files/test-0h595BpHb41k_beta.mp4', '', '<span class=\"_Xbe\" style=\"font-family: arial, sans-serif; font-size: 13px;\"><b>Alamat: Jalan Imogiri Timur no.1 kelurahan giwangan kecamatan umbulharjo, Kota Yogyakarta. 55163</b></span>', '1', 'http://203.130.228.59:8887/terminal', '-7.834508', '110.392319', 'Giwangan, Umbulharjo, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55163', 'http://203.130.228.62:81/terminal-ku/assets/files/photo.jpg', ''),
(4, 'Purabaya', '', '<b>Terminal Purabaya</b>, atau lebih populer dengan nama <b>Terminal Bungurasih</b> merupakan terminal bus tersibuk di <a href=\"https://id.wikipedia.org/wiki/Indonesia\" title=\"Indonesia\">Indonesia</a> (dengan jumlah penumpang hingga 120.000 per hari), dan terminal bus terbesar di <a href=\"https://id.wikipedia.org/wiki/Asia_Tenggara\" title=\"Asia Tenggara\">Asia Tenggara</a>. Terminal ini berada di luar perbatasan <a href=\"https://id.wikipedia.org/wiki/Kota_Surabaya\" title=\"Kota Surabaya\">Kota Surabaya</a>, tepatnya berada di <a href=\"https://id.wikipedia.org/wiki/Bungurasih,_Waru,_Sidoarjo\" title=\"Bungurasih, Waru, Sidoarjo\">Desa Bungurasih</a>, <a href=\"https://id.wikipedia.org/wiki/Waru,_Sidoarjo\" title=\"Waru, Sidoarjo\">Kecamatan Waru</a>, <a class=\"mw-redirect\" href=\"https://id.wikipedia.org/wiki/Sidoarjo\" title=\"Sidoarjo\">Sidoarjo</a>. Terminal ini melayani rute jarak dekat, menengah, dan jauh (AKAP).<br />\r\n<br />\r\n<h2>\r\n	<span class=\"mw-headline\" id=\"Fasilitas\">Fasilitas</span></h2>\r\n<br />\r\n<p>\r\n	Saat ini, UPTD Terminal Purabaya sedikitnya telah menyiapkan 5 titik Posko Area Merokok yang tersebar hampir di setiap sudut wilayah terminal. Diantaranya, Posko yang terletak di sudut kanan dan kiri ruang tunggu penumpang, area parkir <a href=\"https://id.wikipedia.org/wiki/Mobil\" title=\"Mobil\">Mobil</a>, <a class=\"new\" href=\"https://id.wikipedia.org/w/index.php?title=Angkutan_serba_guna&amp;action=edit&amp;redlink=1\" title=\"Angkutan serba guna (halaman belum tersedia)\">Angguna</a>, <a href=\"https://id.wikipedia.org/wiki/Taksi\" title=\"Taksi\">Taksi</a>, <a class=\"mw-redirect\" href=\"https://id.wikipedia.org/wiki/Tempat_parkir\" title=\"Tempat parkir\">area parkir</a> <a class=\"new\" href=\"https://id.wikipedia.org/w/index.php?title=Bus_malam&amp;action=edit&amp;redlink=1\" title=\"Bus malam (halaman belum tersedia)\">bus malam</a>, dan area parkir bus AKAP atau AKDP.</p>\r\n<p>\r\n	Selain fasilitas tersebut, di Terminal Purabaya ini tersedianya Shelter Bus <a class=\"mw-redirect\" href=\"https://id.wikipedia.org/wiki/Bandara_Juanda\" title=\"Bandara Juanda\">Bandara Juanda</a>, dimana bus memeiliki full AC ini akan mengantarkan para penumpang yang hendak menuju Bandara Juanda.</p>\r\n<p>\r\n	Pembangunan gedung baru di Terminal Purabaya yang mengacu pada Konsep Bandara <a class=\"new\" href=\"https://id.wikipedia.org/w/index.php?title=Convenience_and_Care_Terminal&amp;action=edit&amp;redlink=1\" title=\"Convenience and Care Terminal (halaman belum tersedia)\">Convenience and Care Terminal</a> (C2 Terminal). Dimana&nbsp;:</p>\r\n<ul>\r\n	<li>\r\n		<i>Convience</i> yang meliputi kenyamanan, aman, bersih, asri, rekreatif, hiburan, dan teknologi</li>\r\n</ul>\r\n<dl>\r\n	<dd>\r\n		<ul>\r\n			<li>\r\n				Ruang tunggu keberangkatan di lantai 2 , hall, Lobby yang luas, selasar penghubung, bridge connection Ventilasi alam dan Mekanis</li>\r\n			<li>\r\n				Satuan Pengamanan Terminal, fasiltas keselamatan penumpang</li>\r\n			<li>\r\n				<a href=\"https://id.wikipedia.org/wiki/Taman\" title=\"Taman\">Taman</a>, <a href=\"https://id.wikipedia.org/wiki/Kolam\" title=\"Kolam\">Kolam</a>, <a href=\"https://id.wikipedia.org/wiki/Air_mancur\" title=\"Air mancur\">air mancur</a>, art sclupture</li>\r\n			<li>\r\n				<a class=\"new\" href=\"https://id.wikipedia.org/w/index.php?title=Art_building&amp;action=edit&amp;redlink=1\" title=\"Art building (halaman belum tersedia)\">Art building</a> and landscape, stand commersial, <a href=\"https://id.wikipedia.org/wiki/Cendera_mata\" title=\"Cendera mata\">souvenir</a></li>\r\n			<li>\r\n				<a class=\"new\" href=\"https://id.wikipedia.org/w/index.php?title=Panggung_hiburan&amp;action=edit&amp;redlink=1\" title=\"Panggung hiburan (halaman belum tersedia)\">Panggung hiburan</a> (stage)</li>\r\n			<li>\r\n				Eskalator/travelator, Terminal Information Display &amp; Board</li>\r\n		</ul>\r\n	</dd>\r\n</dl>\r\n<ul>\r\n	<li>\r\n		<i>Care</i> meliputi&nbsp;:</li>\r\n</ul>\r\n<dl>\r\n	<dd>\r\n		<ul>\r\n			<li>\r\n				Penumpang, Pengantar/penjemput, Penyandang Cacat/lansia, Ibu dan Bayi, Perokok, Businessman, Karyawan, Awak Bus, Lingkungan</li>\r\n			<li>\r\n				Selasar kanopi, <a class=\"new\" href=\"https://id.wikipedia.org/w/index.php?title=Jalur_pejalan_kaki&amp;action=edit&amp;redlink=1\" title=\"Jalur pejalan kaki (halaman belum tersedia)\">jalur pejalan kaki</a>, rest room, <a class=\"mw-redirect\" href=\"https://id.wikipedia.org/wiki/Mushola\" title=\"Mushola\">mushola</a>, locker , medical care, guide signage, trolly</li>\r\n			<li>\r\n				Car drop off, parkir gedung untuk mobil + roda dua</li>\r\n			<li>\r\n				Ramp, unable/handycapesd <a href=\"https://id.wikipedia.org/wiki/Toilet\" title=\"Toilet\">toilet</a></li>\r\n			<li>\r\n				<a href=\"https://id.wikipedia.org/wiki/Taman_bermain\" title=\"Taman bermain\">Playground</a> &amp; Laktasi</li>\r\n			<li>\r\n				<a class=\"new\" href=\"https://id.wikipedia.org/w/index.php?title=Area_merokok&amp;action=edit&amp;redlink=1\" title=\"Area merokok (halaman belum tersedia)\">Smoking Area</a></li>\r\n			<li>\r\n				<a class=\"new\" href=\"https://id.wikipedia.org/w/index.php?title=Pusat_bisnis&amp;action=edit&amp;redlink=1\" title=\"Pusat bisnis (halaman belum tersedia)\">Bussiness Centre</a>&nbsp;: <a href=\"https://id.wikipedia.org/wiki/ATM\" title=\"ATM\">ATM</a>, <a class=\"new\" href=\"https://id.wikipedia.org/w/index.php?title=Warung_pos_dan_telekominikasi&amp;action=edit&amp;redlink=1\" title=\"Warung pos dan telekominikasi (halaman belum tersedia)\">Warpostel</a>, Mini office, <a href=\"https://id.wikipedia.org/wiki/Toko_buku\" title=\"Toko buku\">Book store</a>, <a class=\"mw-disambig\" href=\"https://id.wikipedia.org/wiki/Hotspot\" title=\"Hotspot\">Wifi area</a></li>\r\n			<li>\r\n				AC ruang kantor, Parkir karyawan, ruang monitor, relaksasi</li>\r\n			<li>\r\n				Asrama awak bus/angkutan umum, <a href=\"https://id.wikipedia.org/wiki/Kantin\" title=\"Kantin\">kantin</a>, tempat cuci bis, <a class=\"mw-redirect\" href=\"https://id.wikipedia.org/wiki/Bengkel\" title=\"Bengkel\">bengkel</a></li>\r\n			<li>\r\n				Closed /transparant wall Main Building, IPAL</li>\r\n		</ul>\r\n	</dd>\r\n</dl>\r\n', 'http://203.130.228.62:81/terminal-ku/assets/files/PURABAYA%2002_1.mp4', '', 'alamat:&nbsp;<span class=\"_xdb\" style=\"font-weight: bolder; font-family: arial, sans-serif; font-size: 13px;\">&nbsp;</span><span class=\"_Xbe\" style=\"font-family: arial, sans-serif; font-size: 13px;\">Singodutan, Selogiri, Kabupaten Wonogiri, Jawa Tengah</span>', '1', 'http://203.130.228.59:8887/terminal', '-7.3504982', '112.724910', 'Jl. Raya Arjuno No.35, Sawahan, Kec. Sawahan, Kota Surabaya, Jawa Timur 60251', 'http://203.130.228.62:81/terminal-ku/assets/files/photo.jpg', ''),
(5, 'Tirtonadi', '', '<p>\r\n	<b>Terminal Tirtonadi</b>&nbsp; adalah <a href=\"https://id.wikipedia.org/wiki/Terminal_bus\" title=\"Terminal bus\">terminal bus</a> terbesar di <a href=\"https://id.wikipedia.org/wiki/Kota_Surakarta\" title=\"Kota Surakarta\">Kota Surakarta</a>. Terminal ini terletak di kecamatan <a class=\"mw-disambig\" href=\"https://id.wikipedia.org/wiki/Banjarsari\" title=\"Banjarsari\">Banjarsari</a>. Terminal ini beroperasi 24 jam karena merupakan jalur antara yang menghubungkan angkutan bus dari <a href=\"https://id.wikipedia.org/wiki/Jawa_Timur\" title=\"Jawa Timur\">Jawa Timur</a> (terutama <a class=\"mw-redirect\" href=\"https://id.wikipedia.org/wiki/Surabaya\" title=\"Surabaya\">Surabaya</a> dan <a class=\"mw-redirect\" href=\"https://id.wikipedia.org/wiki/Banyuwangi\" title=\"Banyuwangi\">Banyuwangi</a>) dan <a href=\"https://id.wikipedia.org/wiki/Jawa_Barat\" title=\"Jawa Barat\">Jawa Barat</a> (<a class=\"mw-redirect\" href=\"https://id.wikipedia.org/wiki/Bandung\" title=\"Bandung\">Bandung</a>).</p>\r\n<p>\r\n	TRAYEK BUS</p>\r\n<p>\r\n	Solo - Malang</p>\r\n<p>\r\n	Solo - Surabaya</p>\r\n<p>\r\n	Solo - Magetan - Madiun</p>\r\n<p>\r\n	Solo - Magetan - Madiun - Jombang - Mojokerto - Surabaya - Banyuwangi</p>\r\n<p>\r\n	Solo - Semarang</p>\r\n<p>\r\n	Solo - Jakarta</p>\r\n<p>\r\n	Solo - Bandung</p>\r\n<p>\r\n	Solo - Jakarta - Bogor</p>\r\n<p>\r\n	Solo - Yogyakarta</p>\r\n<p>\r\n	Surabaya - Solo - Yogyakarta</p>\r\n<p>\r\n	Solo - Cilacap</p>\r\n<p>\r\n	Solo - Kediri - Tulungagung - Blitar</p>\r\n<p>\r\n	Solo - Kediri - Tulungagung - Trenggalek</p>\r\n', 'http://203.130.228.62:81/terminal-ku/assets/files/MASTER%202%20Tanpa%20Pa%20Irjen.mp4', '', 'Alamat: Jalan Ahmad Yani no 262 Surakarta 57134<br />\r\nTelepon: (0271)717759<br />\r\nEmail: tirtonadisatu@gmail.com', '1', 'http://203.130.228.59:8887/terminal', '-7.5514284', '110.818390', 'Jalan Jend. A. Yani 100 Kota Surakarta 57134', 'http://203.130.228.62:81/terminal-ku/assets/files/photo.jpg', ''),
(6, 'Soekarno', '', 'Terminal IR.sokarno merupakan termasuk jenis terminal tipe A yang berada diKelurahan Buntalan, Kecamatan Klaten Tengah, Kabupaten Klaten, Porovinsi Jawa Tengah, Indonesia', 'http://203.130.228.62:81/terminal-ku/assets/files/test-0h595BpHb41k_beta.mp4', '', 'Alamat: Jalan ir soekarno , buntalan klaten<br />\r\nEmail &nbsp;: terminal.ir.soekarnoklaten@gmail.com', '1', 'http://203.130.228.59:8887/terminal', '-7.713993', '110.603864', 'Jalan Kartini By Pass (Buntalan) Kabupaten Klaten - Jawa Tengah', 'http://203.130.228.62:81/terminal-ku/assets/files/photo.jpg', ''),
(7, 'Bawen', '-', 'Terminal Bawen merupakan termasuk jenis terminal tipe A yang berada di Semarang porovinsi Jawa Tengah, Indonesia<br />\r\n', 'http://203.130.228.62:81/terminal-ku/assets/files/test-0h595BpHb41k_beta.mp4', '', 'Alamat: jl palagan no.1 kab semarang kode pos 50661<br />\r\ntelepon: (0298) 5200681', '1', 'http://203.130.228.60', '-7.245800', '110.433527', 'Jl. Slamet Riyadi, Bawen-Salatiga No.22, Bawen, Semarang, Jawa Tengah 50661', 'http://203.130.228.62:81/terminal-ku/assets/files/logo%20kemenhub.png', 'kementerian perhubungan'),
(8, 'Wonogiri', '-', '<p>\r\n	<b>Terminal Giri Adipura</b> adalah terminal bus terbesar di <a href=\"https://id.wikipedia.org/wiki/Kabupaten_Wonogiri\" title=\"Kabupaten Wonogiri\">Kabupaten Wonogiri</a>. Terminal ini terletak di Lingkungan Brumbung, Kelurahan <a href=\"https://id.wikipedia.org/wiki/Kaliancar,_Selogiri,_Wonogiri\" title=\"Kaliancar, Selogiri, Wonogiri\">Kaliancar</a>, Kecamatan <a href=\"https://id.wikipedia.org/wiki/Selogiri,_Wonogiri\" title=\"Selogiri, Wonogiri\">Selogiri</a>, Kabupaten Wonogiri. Terminal ini beroperasi 12 jam dan sangat padat di sore hari karena merupakan tempat pemberangkatan utama perusahaan bis asal Wonogiri jurusan Jakarta dan Bandung. Semenjak Oktober 2014, bangunan baru terminal ini diresmikan oleh Dirjen Perhubungan Darat (Hubdar) Kementerian Perhubungan, Drs. H. Suroyo Alimoeso, yang menempati bekas lahan persawahan di Dusun Krisak Wetan, Desa <a href=\"https://id.wikipedia.org/wiki/Singodutan,_Selogiri,_Wonogiri\" title=\"Singodutan, Selogiri, Wonogiri\">Singodutan</a>, Kecamatan Selogiri, yang terletak sekitar 1,5 km di arah barat bangunan terminal lama.<sup class=\"reference\" id=\"cite_ref-:0_1-0\"><a href=\"https://id.wikipedia.org/wiki/Terminal_Giri_Adipura#cite_note-:0-1\">[1]</a></sup> Pembangunan bangunan baru ini menghabiskan dana sebesar 37,5 miliar rupiah yang bersumber dari APBN dan bertujuan untuk meningkatkan tipe terminal ini menjadi terminal tipe A dengan nama Terminal Induk Giri Adipura.<sup class=\"reference\" id=\"cite_ref-:0_1-1\"><a href=\"https://id.wikipedia.org/wiki/Terminal_Giri_Adipura#cite_note-:0-1\">[1]</a></sup> Pengoperasian bangunan lama terminal ini kemudian dihentikan pada Sabtu 31 Januari 2015 pukul 00.00 WIB.<sup class=\"reference\" id=\"cite_ref-2\"><a href=\"https://id.wikipedia.org/wiki/Terminal_Giri_Adipura#cite_note-2\">[2]</a></sup> Bangunan lama terminal ini pun sempat dipergunakan sebagai taman lampion pada awal tahun 2016.<sup class=\"reference\" id=\"cite_ref-3\"><a href=\"https://id.wikipedia.org/wiki/Terminal_Giri_Adipura#cite_note-3\">[3]</a></sup></p>\r\n', 'http://203.130.228.62:81/terminal-ku/assets/files/test-0h595BpHb41k_beta.mp4', '-', 'Alamat:&nbsp;<span class=\"_xdb\" style=\"font-weight: bolder; font-family: arial, sans-serif; font-size: 13px;\">&nbsp;</span><span class=\"_Xbe\" style=\"font-family: arial, sans-serif; font-size: 13px;\">Singodutan, Selogiri, Kabupaten Wonogiri, Jawa Tengah</span>', '1', 'http://203.130.228.60', '-7.792533', '110.897409', 'Singodutan, Selogiri, Kabupaten Wonogiri, Jawa Tengah', 'http://203.130.228.62:81/terminal-ku/assets/files/photo.jpg', ''),
(9, 'Arjosari', '', '<b>Terminal Arjosari</b> merupakan terminal terpadu yang terletak di Kecamatan <a href=\"https://id.wikipedia.org/wiki/Blimbing,_Malang\" title=\"Blimbing, Malang\">Blimbing</a> yang merupakan pintu gerbang <a href=\"https://id.wikipedia.org/wiki/Kota_Malang\" title=\"Kota Malang\">Kota Malang</a> dari arah utara. Terminal ini merupakan terminal terpadu yang melayani angkutan dalam kota, dalam provinsi maupun antar provinsi. Terminal ini merupakan penghubung dari terminal-terminal kecil yang ada di wilayah Malang Raya, <a class=\"mw-redirect\" href=\"https://id.wikipedia.org/wiki/Blitar\" title=\"Blitar\">Blitar</a> dan <a class=\"mw-redirect\" href=\"https://id.wikipedia.org/wiki/Kediri\" title=\"Kediri\">Kediri</a>.<br />\r\n<br />\r\n<h2>\r\n	<span class=\"mw-headline\" id=\"Trayek_Bus\">Trayek Bus</span></h2>\r\n<ol>\r\n	<li>\r\n		<b>AKDP (Antar Kota Dalam Provinsi)</b>\r\n		<ol>\r\n			<li>\r\n				Malang-<a class=\"mw-redirect\" href=\"https://id.wikipedia.org/wiki/Pasuruan\" title=\"Pasuruan\">Pasuruan</a>-<a class=\"mw-redirect\" href=\"https://id.wikipedia.org/wiki/Probolinggo\" title=\"Probolinggo\">Probolinggo</a>-<a class=\"mw-redirect\" href=\"https://id.wikipedia.org/wiki/Jember\" title=\"Jember\">Jember</a>-<a class=\"mw-redirect\" href=\"https://id.wikipedia.org/wiki/Banyuwangi\" title=\"Banyuwangi\">Banyuwangi</a></li>\r\n			<li>\r\n				Malang-<a class=\"mw-redirect\" href=\"https://id.wikipedia.org/wiki/Surabaya\" title=\"Surabaya\">Surabaya</a></li>\r\n			<li>\r\n				Malang-Surabaya-<a class=\"mw-redirect\" href=\"https://id.wikipedia.org/wiki/Madiun\" title=\"Madiun\">Madiun</a></li>\r\n			<li>\r\n				Surabaya - MTR - Malang</li>\r\n			<li>\r\n				Surabaya - Malang - Blitar</li>\r\n			<li>\r\n				Malang - Surabaya - Ponorogo</li>\r\n			<li>\r\n				Malang - Blitar - Tulungagung</li>\r\n			<li>\r\n				Malang - Blitar</li>\r\n			<li>\r\n				Malang - Surabaya - Pacitan</li>\r\n			<li>\r\n				Malang - Tulungagung - Trenggalek</li>\r\n			<li>\r\n				Trenggalek - Tulungagung - Blitar - Malang - Banyuwangi</li>\r\n			<li>\r\n				Dampit - Malang - Surabaya</li>\r\n			<li>\r\n				Kepanjen - Malang - Surabaya</li>\r\n			<li>\r\n				Malang - Surabaya - Madiun - Magetan</li>\r\n			<li>\r\n				Malang - Probolinggo - Jember</li>\r\n			<li>\r\n				Malang - Surabaya (TOW) - Bojonegoro</li>\r\n			<li>\r\n				Malang - Surabaya (TOW)</li>\r\n			<li>\r\n				Malang - Tulungagung - Kediri - Jombang - Tuban</li>\r\n			<li>\r\n				Malang - Batu - Mojokerto (Tidak Lewat Surabaya)</li>\r\n			<li>\r\n				Malang - Surabaya (TOW) - Bojonegoro - Ngawi</li>\r\n			<li>\r\n				Malang - Banyuwangi</li>\r\n			<li>\r\n				Malang - Probolinggo</li>\r\n			<li>\r\n				Malang - Jember</li>\r\n			<li>\r\n				Malang - Lumajang</li>\r\n			<li>\r\n				Malang - Lumajang - Jember</li>\r\n			<li>\r\n				Malang - Pasuruan - Surabaya</li>\r\n			<li>\r\n				Malang - Pasuruan - Probolinggo - Situbondo - Banyuwangi</li>\r\n			<li>\r\n				Malang - Tulungagung - Mojokerto - Surabaya</li>\r\n			<li>\r\n				Malang - Tulungagung - Trenggalek - Ponorogo - Pacitan</li>\r\n			<li>\r\n				Malang - Trenggalek</li>\r\n			<li>\r\n				Malang - Batu - Pare - Kediri - Jombang</li>\r\n			<li>\r\n				Malang - Tulungagung - Kediri - Kertosono - Nganjuk</li>\r\n			<li>\r\n				Malang - Kepanjen - Blitar - Tulungagung - Trenggalek</li>\r\n			<li>\r\n				Malang - Surabaya - Madiun - Ponorogo</li>\r\n			<li>\r\n				Surabaya (TOW) - Pandaan - Malang - Kepanjen - Wlingi - Blitar - Tulungagung - Kediri - Kertosono - Jombang - Mojokerto - Surabaya (BUNGUR)</li>\r\n			<li>\r\n				Malang - Pasuruan - Surabaya (BUNGUR) - Surabaya (TOW) - Bojonegoro</li>\r\n			<li>\r\n				Malang - Lamongan - Babat</li>\r\n			<li>\r\n				Malang - Surabaya (TOW) - Gresik - Lamongan - Bojonegoro</li>\r\n			<li>\r\n				Malang - Pandaan - Surabaya - Gresik - Lamongan</li>\r\n		</ol>\r\n	</li>\r\n	<li>\r\n		<b>AKAP (Antar Kota Antar Provinsi)</b>\r\n		<ol>\r\n			<li>\r\n				Malang-<a class=\"mw-redirect\" href=\"https://id.wikipedia.org/wiki/Denpasar\" title=\"Denpasar\">Denpasar</a></li>\r\n			<li>\r\n				Malang-<a class=\"mw-disambig\" href=\"https://id.wikipedia.org/wiki/Mataram\" title=\"Mataram\">Mataram</a></li>\r\n			<li>\r\n				Malang-<a class=\"mw-disambig\" href=\"https://id.wikipedia.org/wiki/Bima\" title=\"Bima\">Bima</a></li>\r\n			<li>\r\n				Malang-<a class=\"mw-redirect\" href=\"https://id.wikipedia.org/wiki/Jakarta\" title=\"Jakarta\">Jakarta</a></li>\r\n			<li>\r\n				Malang-<a class=\"mw-redirect\" href=\"https://id.wikipedia.org/wiki/Yogyakarta\" title=\"Yogyakarta\">Yogyakarta</a></li>\r\n			<li>\r\n				Malang-<a class=\"mw-redirect\" href=\"https://id.wikipedia.org/wiki/Semarang\" title=\"Semarang\">Semarang</a></li>\r\n			<li>\r\n				Malang-<a class=\"mw-redirect\" href=\"https://id.wikipedia.org/wiki/Bandung\" title=\"Bandung\">Bandung</a></li>\r\n			<li>\r\n				Malang-<a class=\"mw-redirect mw-disambig\" href=\"https://id.wikipedia.org/wiki/Cirebon\" title=\"Cirebon\">Cirebon</a></li>\r\n			<li>\r\n				Malang-<a class=\"mw-redirect\" href=\"https://id.wikipedia.org/wiki/Bogor\" title=\"Bogor\">Bogor</a></li>\r\n			<li>\r\n				Malang-<a class=\"mw-redirect\" href=\"https://id.wikipedia.org/wiki/Tulang_Bawang\" title=\"Tulang Bawang\">Tulang Bawang</a>-<a class=\"mw-redirect\" href=\"https://id.wikipedia.org/wiki/Palembang\" title=\"Palembang\">Palembang</a></li>\r\n			<li>\r\n				Malang-Jakarta-<a class=\"mw-redirect\" href=\"https://id.wikipedia.org/wiki/Bandar_Lampung\" title=\"Bandar Lampung\">Bandar Lampung</a>-<a class=\"mw-redirect\" href=\"https://id.wikipedia.org/wiki/Medan\" title=\"Medan\">Medan</a></li>\r\n			<li>\r\n				Malang - Bojonegoro - Cepu</li>\r\n			<li>\r\n				Malang - Blitar - Kediri - Solo - Yogyakarta</li>\r\n			<li>\r\n				Malang - Kudus - Semarang</li>\r\n			<li>\r\n				Malang - Kudus - Jakarta</li>\r\n			<li>\r\n				Malang - Jakarta - Bogor</li>\r\n			<li>\r\n				Malang - Solo</li>\r\n			<li>\r\n				Malang - Magelang</li>\r\n			<li>\r\n				Malang - Yogyakarta - Cilacap</li>\r\n			<li>\r\n				Malang - Solo - Semarang</li>\r\n			<li>\r\n				Tulungagung - Blitar - Kepanjen - Malang - Denpasar</li>\r\n			<li>\r\n				Malang - Surabaya - Kudus - Jakarta</li>\r\n			<li>\r\n				Malang - Situbondo - Denpasar</li>\r\n			<li>\r\n				Malang - Mataram - Bima</li>\r\n		</ol>\r\n	</li>\r\n</ol>\r\n<h2>\r\n	<span class=\"mw-headline\" id=\"Trayek_MPU\">Trayek MPU</span></h2>\r\n<ol>\r\n	<li>\r\n		Malang - Pasuruan</li>\r\n</ol>\r\n<h2>\r\n	<span class=\"mw-headline\" id=\"Trayek_Angkot\">Trayek Angkot</span></h2>\r\n<p>\r\n	Secara garis besar trayek angkot di Malang merupakan inisial dari nama terminal yang ada wilayah ini, yaitu: Gadang, Landungsari, dan Arjosari.</p>\r\n<ol>\r\n	<li>\r\n		ABB - Arjosari - Borobudur - Bunulrejo</li>\r\n	<li>\r\n		ABH - Arjosari - Borobubur - Hamid Rusdi</li>\r\n	<li>\r\n		ADL - Arjosari - Dinoyo - Landungsari</li>\r\n	<li>\r\n		AH - Arjosari - Hamid Rusdi</li>\r\n	<li>\r\n		AJH - Arjosari - Janti - Hamid Rusdi</li>\r\n	<li>\r\n		AL - Arjosari - Landungsari</li>\r\n	<li>\r\n		AMG - Arjosari - Mergosono - Hamid Rusdi</li>\r\n	<li>\r\n		ASD - Arjosari - Soekarno Hatta - Dieng</li>\r\n	<li>\r\n		AT - Arjosari - Tidar</li>\r\n	<li>\r\n		HA - Hamid Rusdi - Arjosari</li>\r\n</ol>\r\n<h2>\r\n	<span class=\"mw-headline\" id=\"Trayek_Angdes\">Trayek Angdes</span></h2>\r\n<ol>\r\n	<li>\r\n		LA - Lawang - Arjosari</li>\r\n	<li>\r\n		KA - Karangploso - Arjosari</li>\r\n	<li>\r\n		ABD - Arjosari - Abdurrachman Shaleh</li>\r\n	<li>\r\n		TA - Tumpang - Arjosari</li>\r\n</ol>\r\n', 'http://203.130.228.62:81/terminal-ku/assets/files/test-0h595BpHb41k_beta.mp4', '', 'Alamat: jalan terusan raden intan no1 kota malang. kode pos65126&nbsp;<br />\r\ntelepon: (0341) 493826<br />\r\nEmail: terminalarjosari01@gmail.com', '1', '', '-7.934936', '112.658868', 'Terminal Arjosari, Jalan Terusan Raden Intan No.1, Arjosari, Blimbing, Kota Malang, Jawa Timur 65126', 'http://203.130.228.62:81/terminal-ku/assets/files/logo%20kemenhub.png', 'kementerian perhubungan'),
(10, 'Cilacap', '', 'Terminal Desa Cilacap merupakan termasuk jenis terminal tipe A yang berada&nbsp; di Cilacap porovinsi Jawa Tengah, Indonesia<br />\r\n', 'http://203.130.228.62:81/terminal-ku/assets/files/test-0h595BpHb41k_beta.mp4', '', '<div class=\"mod\" data-hveid=\"19\" data-md=\"1002\" data-ved=\"0ahUKEwjo77vlj8DUAhUDMI8KHbvnAF8QkCkIEygCMAM\" style=\"padding-left: 15px; padding-right: 15px; line-height: 1.24; font-family: arial, sans-serif; font-size: 13px; clear: none;\">\r\n	<div class=\"_eFb\">\r\n		Alamat: Jalan Gatot Subroto 268 gunung simping cilacap tengah 53224<br />\r\n		<br />\r\n		Email: gunungsimping.clp@gmail.com</div>\r\n</div>\r\n<br />\r\n', '1', '', '-7.7023984', '109.024885', NULL, 'http://203.130.228.62:81/terminal-ku/assets/files/logo%20kemenhub.png', 'kementerian perhubungan'),
(11, 'Sukabumi', '', '<span style=\"font-weight: bold; color: rgb(106, 106, 106); font-family: arial, sans-serif; font-size: small;\">Terminal</span><span style=\"color: rgb(84, 84, 84); font-family: arial, sans-serif; font-size: small;\">&nbsp;Tipe A yang berada di Jalan Lingkar Selatan, Kota</span><span style=\"font-weight: bold; color: rgb(106, 106, 106); font-family: arial, sans-serif; font-size: small;\">Sukabumi</span><span style=\"color: rgb(84, 84, 84); font-family: arial, sans-serif; font-size: small;\">, Jawa Barat,</span>', 'http://203.130.228.62:81/terminal-ku/assets/files/test-0h595BpHb41k_beta.mp4', '', '<span style=\"font-family: arial, sans-serif; font-size: 13px;\">Alamat : Jalan lingkar selatan no. 7 kota Sukabumi</span><br />\r\nTelepon : (0266) 6243855<br />\r\nEmail &nbsp; &nbsp;: kotasmiterminal@gmail.com<br />\r\n<br />\r\n', '1', '', '-6.9204786', '106.917902', NULL, 'http://203.130.228.62:81/terminal-ku/assets/files/photo.jpg', '');

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
  `foto` varchar(255) DEFAULT NULL,
  `terminal_id` char(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `user`, `pass`, `nama`, `email`, `telp`, `alamat`, `status`, `level`, `foto`, `terminal_id`) VALUES
(1, 'administrator', '55c3b5386c486feb662a0785f340938f518d547f', 'Administrator Web', NULL, NULL, NULL, '1', 1, NULL, '-1'),
(2, 'arjosari', 'e1eb39623dfa23bcf8c7b6fee2a17b85bc53da3e', 'Admin Terminal Arjosari', '', '', '', '1', 3, NULL, '9'),
(3, 'bawen', 'e1eb39623dfa23bcf8c7b6fee2a17b85bc53da3e', 'Admin Terminal Bawen', '', '', '', '1', 3, NULL, '7'),
(4, 'cilacap', 'e1eb39623dfa23bcf8c7b6fee2a17b85bc53da3e', 'Admin Terminal Cilacap', '', '', '', '1', 3, NULL, '10'),
(5, 'giwangan', 'e1eb39623dfa23bcf8c7b6fee2a17b85bc53da3e', 'Admin Terminal Giwangan', '', '', '', '1', 3, NULL, '3'),
(6, 'purabaya', 'e1eb39623dfa23bcf8c7b6fee2a17b85bc53da3e', 'Admin Terminal Purabaya', '', '', '', '1', 3, NULL, '4'),
(7, 'soekarno', 'e1eb39623dfa23bcf8c7b6fee2a17b85bc53da3e', 'Admin Terminal ir. Soekarno', '', '', '', '1', 3, NULL, '6'),
(8, 'sukabumi', 'e1eb39623dfa23bcf8c7b6fee2a17b85bc53da3e', 'Admin Terminal Sukabumi', '', '', '', '1', 3, NULL, '11'),
(9, 'tirtonadi', 'e1eb39623dfa23bcf8c7b6fee2a17b85bc53da3e', 'Admin Terminal Tirtonadi', '', '', '', '1', 3, NULL, '5'),
(10, 'wonogiri', 'e1eb39623dfa23bcf8c7b6fee2a17b85bc53da3e', 'Admin Terminal Wonogiri', '', '', '', '1', 3, NULL, '8'),
(11, 'test', 'adcd7048512e64b48da55b027577886ee5a36350', 'test', '', '', '', '1', 2, NULL, '9');

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
-- Dumping data for table `tbl_video_profile`
--

INSERT INTO `tbl_video_profile` (`id`, `judul`, `tanggal`, `video`, `status_tampil`) VALUES
(1, 'Admin_test', '2017-08-18 05:52:00', 'http://203.130.228.62:81/terminal-cctv/assets/files/AKU%20INGIN%20MENCINTAI%20MU%20DENGAN%20SEDERHANA%20(Sapardi%20Djoko%20Darmono).mp4', '0'),
(2, 'ADMIN TEST', '2017-08-29 09:00:52', 'vid', '0'),
(4, 'Terminal-ku.Com', '2017-08-29 09:02:52', 'http://203.130.228.62:81/terminal-ku/assets/files/test-0h595BpHb41k_beta.mp4', '1'),
(3, 'hubnas', '2017-08-21 07:26:45', 'http://203.130.228.62:81/terminal-ku/assets/files/HUBNAS%202015%20-%20VIS.avi', '0');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_berita`
--
ALTER TABLE `tbl_berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_cctv`
--
ALTER TABLE `tbl_cctv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `tbl_schedule`
--
ALTER TABLE `tbl_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `tbl_terminal`
--
ALTER TABLE `tbl_terminal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tbl_video_profile`
--
ALTER TABLE `tbl_video_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
