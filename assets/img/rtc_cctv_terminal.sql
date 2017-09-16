-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2017 at 11:38 AM
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
(1, 'About Us Terminalku<br />\r\nAdmin test Admin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin testAdmin test');

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
(4, 'admin tes', '2017-08-16 11:20:26', NULL, '<p>\r\n	Direktur Angkutan dan Multimoda, Direktorat Jenderal Perhubungan Darat Kemenhub, Cucu Mulyana, &lrm;mengatakan Kementerian Perhubungan akan memisahkan area berdasarkan kegiatannya dalam menata <a href=\"http://bisnis.liputan6.com/read/2845604/resmikan-terminal-seloaji-budi-karya-ingatkan-jangan-ada-pungli\" title=\"terminal bus\">terminal bus</a>, yaitu penjualan tiket, batas pengantar, dan ruang tunggu penumpang.</p>\r\n<p>\r\n	&quot;Ada zonasi ada pengantar, membeli tiket, ada yang tinggal berangkat,&quot; kata Cucu, di Jakarta, Selasa (2/5/2017).</p>\r\n<p>\r\n	Cucu menuturkan, pihaknya sedang merancang tata ruang terminal untuk mewujudkan penataan terminal tersebut. Penataan terminal bus akan diprioritaskan pada terminal tipe A.</p>\r\n', '1', '', 'http://203.130.228.62:81/terminal-cctv/assets/files/prifil.png', 'news', '9'),
(5, 'admin test', '2017-08-16 11:24:26', NULL, '<p>\r\n	Direktur Angkutan dan Multimoda, Direktorat Jenderal Perhubungan Darat Kemenhub, Cucu Mulyana, &lrm;mengatakan Kementerian Perhubungan akan memisahkan area berdasarkan kegiatannya dalam menata <a href=\"http://bisnis.liputan6.com/read/2845604/resmikan-terminal-seloaji-budi-karya-ingatkan-jangan-ada-pungli\" title=\"terminal bus\">terminal bus</a>, yaitu penjualan tiket, batas pengantar, dan ruang tunggu penumpang.</p>\r\n<p>\r\n	&quot;Ada zonasi ada pengantar, membeli tiket, ada yang tinggal berangkat,&quot; kata Cucu, di Jakarta, Selasa (2/5/2017).</p>\r\n<p>\r\n	Cucu menuturkan, pihaknya sedang merancang tata ruang terminal untuk mewujudkan penataan terminal tersebut. Penataan terminal bus akan diprioritaskan pada terminal tipe A.</p>\r\n', '1', '', 'http://203.130.228.62:81/terminal-cctv/assets/files/prifil.png', 'news', '9'),
(6, 'admin tes', '2017-08-16 11:24:59', NULL, '<p>\r\n	Direktur Angkutan dan Multimoda, Direktorat Jenderal Perhubungan Darat Kemenhub, Cucu Mulyana, &lrm;mengatakan Kementerian Perhubungan akan memisahkan area berdasarkan kegiatannya dalam menata <a href=\"http://bisnis.liputan6.com/read/2845604/resmikan-terminal-seloaji-budi-karya-ingatkan-jangan-ada-pungli\" title=\"terminal bus\">terminal bus</a>, yaitu penjualan tiket, batas pengantar, dan ruang tunggu penumpang.</p>\r\n<p>\r\n	&quot;Ada zonasi ada pengantar, membeli tiket, ada yang tinggal berangkat,&quot; kata Cucu, di Jakarta, Selasa (2/5/2017).</p>\r\n<p>\r\n	Cucu menuturkan, pihaknya sedang merancang tata ruang terminal untuk mewujudkan penataan terminal tersebut. Penataan terminal bus akan diprioritaskan pada terminal tipe A.</p>\r\n', '1', '', 'http://203.130.228.62:81/terminal-cctv/assets/files/prifil.png', 'news', '9'),
(7, 'admin tes', '2017-08-16 11:25:28', NULL, '<p>\r\n	Direktur Angkutan dan Multimoda, Direktorat Jenderal Perhubungan Darat Kemenhub, Cucu Mulyana, &lrm;mengatakan Kementerian Perhubungan akan memisahkan area berdasarkan kegiatannya dalam menata <a href=\"http://bisnis.liputan6.com/read/2845604/resmikan-terminal-seloaji-budi-karya-ingatkan-jangan-ada-pungli\" title=\"terminal bus\">terminal bus</a>, yaitu penjualan tiket, batas pengantar, dan ruang tunggu penumpang.</p>\r\n<p>\r\n	&quot;Ada zonasi ada pengantar, membeli tiket, ada yang tinggal berangkat,&quot; kata Cucu, di Jakarta, Selasa (2/5/2017).</p>\r\n<p>\r\n	Cucu menuturkan, pihaknya sedang merancang tata ruang terminal untuk mewujudkan penataan terminal tersebut. Penataan terminal bus akan diprioritaskan pada terminal tipe A.</p>\r\n', '1', '', 'http://203.130.228.62:81/terminal-cctv/assets/files/prifil.png', 'news', '9'),
(8, 'tes', '2017-08-16 11:25:50', NULL, '<p>\r\n	Direktur Angkutan dan Multimoda, Direktorat Jenderal Perhubungan Darat Kemenhub, Cucu Mulyana, &lrm;mengatakan Kementerian Perhubungan akan memisahkan area berdasarkan kegiatannya dalam menata <a href=\"http://bisnis.liputan6.com/read/2845604/resmikan-terminal-seloaji-budi-karya-ingatkan-jangan-ada-pungli\" title=\"terminal bus\">terminal bus</a>, yaitu penjualan tiket, batas pengantar, dan ruang tunggu penumpang.</p>\r\n<p>\r\n	&quot;Ada zonasi ada pengantar, membeli tiket, ada yang tinggal berangkat,&quot; kata Cucu, di Jakarta, Selasa (2/5/2017).</p>\r\n<p>\r\n	Cucu menuturkan, pihaknya sedang merancang tata ruang terminal untuk mewujudkan penataan terminal tersebut. Penataan terminal bus akan diprioritaskan pada terminal tipe A.</p>\r\n', '1', '', 'http://203.130.228.62:81/terminal-cctv/assets/files/prifil.png', 'news', '9'),
(9, 'tes', '2017-08-16 11:26:12', NULL, '<p>\r\n	Direktur Angkutan dan Multimoda, Direktorat Jenderal Perhubungan Darat Kemenhub, Cucu Mulyana, &lrm;mengatakan Kementerian Perhubungan akan memisahkan area berdasarkan kegiatannya dalam menata <a href=\"http://bisnis.liputan6.com/read/2845604/resmikan-terminal-seloaji-budi-karya-ingatkan-jangan-ada-pungli\" title=\"terminal bus\">terminal bus</a>, yaitu penjualan tiket, batas pengantar, dan ruang tunggu penumpang.</p>\r\n<p>\r\n	&quot;Ada zonasi ada pengantar, membeli tiket, ada yang tinggal berangkat,&quot; kata Cucu, di Jakarta, Selasa (2/5/2017).</p>\r\n<p>\r\n	Cucu menuturkan, pihaknya sedang merancang tata ruang terminal untuk mewujudkan penataan terminal tersebut. Penataan terminal bus akan diprioritaskan pada terminal tipe A.</p>\r\n', '1', '', 'http://203.130.228.62:81/terminal-cctv/assets/files/prifil.png', 'news', '9');

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
(1, NULL, NULL, NULL, '1', 3, 'Cicaheum - Bandung', '06:30', 'Budiman', 'Cicaheum - Bandung', '07.30', 'Budiman'),
(2, NULL, NULL, NULL, '1', 3, 'Bandung', '16:10', 'Kramat Djati', 'Bandung', '17:45', 'Kramat Djati'),
(3, NULL, NULL, NULL, '1', 9, 'bandung', 'senin 15:00:00', 'admin', 'jakarta', 'senin 09:00:00', 'admin'),
(4, NULL, NULL, NULL, '1', 9, '', '', '', '', '', 'admin'),
(5, NULL, NULL, NULL, '1', 9, '', '', '', '', '', 'admin'),
(6, NULL, NULL, NULL, '1', 9, '', '', '', '', '', 'admin'),
(7, NULL, NULL, NULL, '1', 9, '', '', '', '', '', ''),
(8, NULL, NULL, NULL, '1', 9, '', '', '', '', '', ''),
(9, NULL, NULL, NULL, '1', 9, '', '', '', '', '', ''),
(10, NULL, NULL, NULL, '1', 9, '', '', '', '', '', ''),
(11, NULL, NULL, NULL, '1', 9, '', '', '', '', '', ''),
(12, NULL, NULL, NULL, '1', 9, '', '', '', '', '', ''),
(13, NULL, NULL, NULL, '1', 9, '', '', '', '', '', ''),
(14, NULL, NULL, NULL, '1', 9, '', '', '', '', '', ''),
(15, NULL, NULL, NULL, '1', 9, '', '', '', '', '', ''),
(16, NULL, NULL, NULL, '1', 9, '', '', '', '', '', ''),
(17, NULL, NULL, NULL, '1', 9, '', '', '', '', '', ''),
(18, NULL, NULL, NULL, '1', 9, '', '', '', '', '', ''),
(19, NULL, NULL, NULL, '1', 9, '', '', '', '', '', ''),
(20, NULL, NULL, NULL, '1', 9, 'bandung', 'rabu,27 agustus 2016', 'damri', 'solo', 'rabu 09:00:00', 'damri'),
(21, NULL, NULL, NULL, '1', 9, 'jakarta', 'selasa 10:10:10', 'debora', 'solo', 'selasa 08:00:00', 'debora'),
(22, NULL, NULL, NULL, '1', 9, 'jakarta', 'senin 09:00:00', 'hiba utama', 'solo', 'senin 07:00:00', 'hiba utama');

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
(3, 'Giwangan', '', '<p>\r\n	Terminal Giwangan&nbsp;(<a href=\"https://id.wikipedia.org/wiki/Hanacaraka\" title=\"Hanacaraka\">Hanacaraka</a>:&nbsp;???????????????,&nbsp;Terminal Ghiwangan),adalah sebuah terminal angkutan umum yang terletak di kota&nbsp;<a href=\"https://id.wikipedia.org/wiki/Kota_Yogyakarta\" title=\"Kota Yogyakarta\">Yogyakarta</a>. Terminal ini terletak di Kelurahan&nbsp;<a href=\"https://id.wikipedia.org/wiki/Giwangan,_Umbulharjo,_Yogyakarta\" title=\"Giwangan, Umbulharjo, Yogyakarta\">Giwangan, Umbulharjo, Yogyakarta</a>, tepatnya di Jalan Imogiri Timur Km 6, di dekat perbatasan antara Kota Yogyakarta dengan Kabupaten Bantul.</p>\r\n<p>\r\n	Terminal Giwangan dibangun untuk menggantikan Terminal Umbulharjo. Terminal Giwangan merupakan terminal tipe A terbesar di Indonesia yang merupakan tempat singgah bus dari seluruh kota besar di Sumatra, Jawa, Bali dan Nusa Tenggara.</p>\r\n<p>\r\n	Terminal ini diresmikan pada tanggal&nbsp;<a href=\"https://id.wikipedia.org/wiki/10_Oktober\" title=\"10 Oktober\">10 Oktober</a>&nbsp;<a href=\"https://id.wikipedia.org/wiki/2004\" title=\"2004\">2004</a>, rata-rata jumlah penumpang yang dilayani sarana itu berkisar 20.000 per hari sedangkan jumlah bus yang melaluinya, berdatangan maupun bertujuan ke provinsi lain, mencapai 850 buah.</p>\r\n', '', '', '<span class=\"_xdb\" style=\"font-weight: bolder; font-family: arial, sans-serif; font-size: 13px;\"><a class=\"fl\" data-ved=\"0ahUKEwjBvYLylNnVAhXKRY8KHb_HBT4Q6BMIlAEwFA\" href=\"https://www.google.co.id/search?q=terminal+giwangan+alamat&amp;stick=H4sIAAAAAAAAAOPgE-LWT9c3NDI2T7HITdOSzU620s_JT04syczPgzOsElNSilKLiwGjx38qLgAAAA&amp;sa=X&amp;ved=0ahUKEwjBvYLylNnVAhXKRY8KHb_HBT4Q6BMIlAEwFA\" style=\"text-decoration-line: none; color: rgb(26, 13, 171); cursor: pointer;\">Alamat</a>:&nbsp;</span><span class=\"_Xbe\" style=\"font-family: arial, sans-serif; font-size: 13px;\">Giwangan, Umbulharjo, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55163</span>', '1', 'http://203.130.228.59:8887/terminal', '-7.834508', '110.392319', 'Giwangan, Umbulharjo, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55163', NULL, NULL),
(4, 'Purabaya', '', 'About Us Purabaya', '', '', '', '1', 'http://203.130.228.59:8887/terminal', '-7.3504982', '112.724910', 'Jl. Raya Arjuno No.35, Sawahan, Kec. Sawahan, Kota Surabaya, Jawa Timur 60251', NULL, NULL),
(5, 'Tirtonadi', '', 'About Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us TirtonadiAbout Us Tirtonadi', '', '', '', '1', 'http://203.130.228.59:8887/terminal', '-7.5514284', '110.818390', 'Jalan Jend. A. Yani 100 Kota Surakarta 57134', 'http://203.130.228.62:81/terminal-cctv/assets/files/IMG_2503-001.jpg', NULL),
(6, 'Soekarno', '', 'About us Soekarno', '', '', '', '1', 'http://203.130.228.59:8887/terminal', '-7.713993', '110.603864', 'Jalan Kartini By Pass (Buntalan) Kabupaten Klaten - Jawa Tengah', NULL, NULL),
(7, 'Bawen', '-', 'About US Terminal Bawen', 'http://203.130.228.62:81/terminal-ku/assets/files/AKU%20INGIN%20MENCINTAI%20MU%20DENGAN%20SEDERHANA%20(Sapardi%20Djoko%20Darmono).mp4', '', '', '1', 'http://203.130.228.60', '-7.245800', '110.433527', 'Jl. Slamet Riyadi, Bawen-Salatiga No.22, Bawen, Semarang, Jawa Tengah 50661', 'http://203.130.228.62:81/terminal-ku/assets/files/prifil.png', ''),
(8, 'Wonogiri', '-', 'About Us Wonogiri', '-', '-', '-', '1', 'http://203.130.228.60', '-7.792533', '110.897409', 'Singodutan, Selogiri, Kabupaten Wonogiri, Jawa Tengah', NULL, NULL),
(9, 'Arjosari', '', 'Terminal Arjosari terletak di Kota Malang Jawa TimurTerminal Arjosari terletak di Kota Malang Jawa TimurTerminal Arjosari terletak di Kota Malang Jawa TimurTerminal Arjosari terletak di Kota Malang Jawa TimurTerminal Arjosari terletak di Kota Malang Jawa TimurTerminal Arjosari terletak di Kota Malang Jawa TimurTerminal Arjosari terletak di Kota Malang Jawa TimurTerminal Arjosari terletak di Kota Malang Jawa TimurTerminal Arjosari terletak di Kota Malang Jawa TimurTerminal Arjosari terletak di Kota Malang Jawa TimurTerminal Arjosari terletak di Kota Malang Jawa TimurTerminal Arjosari terletak di Kota Malang Jawa TimurTerminal Arjosari terletak di Kota Malang Jawa TimurTerminal Arjosari terletak di Kota Malang Jawa TimurTerminal Arjosari terletak di Kota Malang Jawa TimurTerminal Arjosari terletak di Kota Malang Jawa TimurTerminal Arjosari terletak di Kota Malang Jawa TimurTerminal Arjosari terletak di Kota Malang Jawa TimurTerminal Arjosari terletak di Kota Malang Jawa TimurTerminal Arjosari terletak di Kota Malang Jawa TimurTerminal Arjosari terletak di Kota Malang Jawa TimurTerminal Arjosari terletak di Kota Malang Jawa TimurTerminal Arjosari terletak di Kota Malang Jawa TimurTerminal Arjosari terletak di Kota Malang Jawa TimurTerminal Arjosari terletak di Kota Malang Jawa TimurTerminal Arjosari terletak di Kota Malang Jawa TimurTerminal Arjosari terletak di Kota Malang Jawa TimurTerminal Arjosari terletak di Kota Malang Jawa TimurTerminal Arjosari terletak di Kota Malang Jawa TimurTerminal Arjosari terletak di Kota Malang Jawa TimurTerminal Arjosari terletak di Kota Malang Jawa TimurTerminal Arjosari terletak di Kota Malang Jawa TimurTerminal Arjosari terletak di Kota Malang Jawa TimurTerminal Arjosari terletak di Kota Malang Jawa TimurTerminal Arjosari terletak di Kota Malang Jawa TimurTerminal Arjosari terletak di Kota Malang Jawa TimurTerminal Arjosari terletak di Kota Malang Jawa TimurTerminal Arjosari terletak di Kota Malang Jawa TimurTerminal Arjosari terletak di Kota Malang Jawa TimurTerminal Arjosari terletak di Kota Malang Jawa TimurTerminal Arjosari terletak di Kota Malang Jawa TimurTerminal Arjosari terletak di Kota Malang Jawa TimurTerminal Arjosari terletak di Kota Malang Jawa TimurTerminal Arjosari terletak di Kota Malang Jawa TimurTerminal Arjosari terletak di Kota Malang Jawa Timur', 'http://203.130.228.62:81/terminal-ku/assets/files/AKU%20INGIN%20MENCINTAI%20MU%20DENGAN%20SEDERHANA%20(Sapardi%20Djoko%20Darmono).mp4', '', 'Telp :<br />\r\nAlamat :zaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa<br />\r\naaaaaaaaaaaaaaaaaaaaaaaaaaaaa<br />\r\naaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '1', '', '-7.934936', '112.658868', 'Terminal Arjosari, Jalan Terusan Raden Intan No.1, Arjosari, Blimbing, Kota Malang, Jawa Timur 65126', 'http://203.130.228.62:81/terminal-cctv/assets/files/malangtoday-83.jpg', 'Admin Test'),
(10, 'Cilacap', '', 'About Terminal CIlacap', 'http://203.130.228.62:81/terminal-ku/assets/files/HUBNAS%202015%20-%20VIS.avi', '', '<div class=\"mod\" data-hveid=\"19\" data-md=\"1002\" data-ved=\"0ahUKEwjo77vlj8DUAhUDMI8KHbvnAF8QkCkIEygCMAM\" style=\"padding-left: 15px; padding-right: 15px; line-height: 1.24; font-family: arial, sans-serif; font-size: 13px; clear: none;\">\r\n	<div class=\"_eFb\">\r\n		&nbsp;</div>\r\n</div>\r\n', '1', '', '-7.7023984', '109.024885', NULL, '', ''),
(11, 'Sukabumi', '', '<span style=\"font-weight: bold; color: rgb(106, 106, 106); font-family: arial, sans-serif; font-size: small;\">Terminal</span><span style=\"color: rgb(84, 84, 84); font-family: arial, sans-serif; font-size: small;\">&nbsp;Tipe A yang berada di Jalan Lingkar Selatan, Kota</span><span style=\"font-weight: bold; color: rgb(106, 106, 106); font-family: arial, sans-serif; font-size: small;\">Sukabumi</span><span style=\"color: rgb(84, 84, 84); font-family: arial, sans-serif; font-size: small;\">, Jawa Barat,</span>', '', '', '<span style=\"font-family: arial, sans-serif; font-size: 13px;\">Alamat : Benteng, Warudoyong, Kota Sukabumi, Jawa Barat 43132</span><br />\r\n<br />\r\n', '1', '', '-6.9204786', '106.917902', NULL, NULL, NULL);

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
(2, 'arjosari', '1e54025e8f142dbca66a0e0fffdb3effac8b96d2', 'Admin Terminal Arjosari', '', '', '', '1', 3, NULL, '9'),
(3, 'bawen', '1e54025e8f142dbca66a0e0fffdb3effac8b96d2', 'Admin Terminal Bawen', '', '', '', '1', 3, NULL, '7'),
(4, 'cilacap', '1e54025e8f142dbca66a0e0fffdb3effac8b96d2', 'Admin Terminal Cilacap', '', '', '', '1', 3, NULL, '10'),
(5, 'giwangan', '1e54025e8f142dbca66a0e0fffdb3effac8b96d2', 'Admin Terminal Giwangan', '', '', '', '1', 3, NULL, '3'),
(6, 'purabaya', '1e54025e8f142dbca66a0e0fffdb3effac8b96d2', 'Admin Terminal Purabaya', '', '', '', '1', 3, NULL, '4'),
(7, 'soekarno', '1e54025e8f142dbca66a0e0fffdb3effac8b96d2', 'Admin Terminal ir. Soekarno', '', '', '', '1', 3, NULL, '6'),
(8, 'sukabumi', '1e54025e8f142dbca66a0e0fffdb3effac8b96d2', 'Admin Terminal Sukabumi', '', '', '', '1', 3, NULL, '11'),
(9, 'tirtonadi', '1e54025e8f142dbca66a0e0fffdb3effac8b96d2', 'Admin Terminal Tirtonadi', '', '', '', '1', 3, NULL, '5'),
(10, 'wonogiri', '1e54025e8f142dbca66a0e0fffdb3effac8b96d2', 'Admin Terminal Wonogiri', '', '', '', '1', 3, NULL, '8'),
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
(2, 'ADMIN TEST', '2017-08-18 08:47:02', 'http://203.130.228.62:81/terminal-cctv/assets/files/AKU%20INGIN%20MENCINTAI%20MU%20DENGAN%20SEDERHANA%20(Sapardi%20Djoko%20Darmono).mp4', '1'),
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_schedule`
--
ALTER TABLE `tbl_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
