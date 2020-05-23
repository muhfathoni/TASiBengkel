-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2020 at 11:20 AM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sibengke_sibengkel`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_bengkel`
--

CREATE TABLE `tb_bengkel` (
  `namaBengkel` varchar(1000) NOT NULL,
  `emailBengkel` varchar(1000) DEFAULT NULL,
  `namaPemilik` varchar(1000) NOT NULL,
  `noTelPemilik` varchar(1000) NOT NULL,
  `alamatBengkel` varchar(1000) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_bengkel`
--

INSERT INTO `tb_bengkel` (`namaBengkel`, `emailBengkel`, `namaPemilik`, `noTelPemilik`, `alamatBengkel`, `id`) VALUES
('vsd', NULL, '', '', '', 1),
('vespuci', NULL, '', '', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_booking`
--

CREATE TABLE `tb_booking` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `id_bengkel` bigint(20) UNSIGNED NOT NULL,
  `jenis_service` int(11) NOT NULL,
  `jadwal` date NOT NULL,
  `jam` varchar(255) NOT NULL,
  `revenue` int(200) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_booking`
--

INSERT INTO `tb_booking` (`id`, `userid`, `id_bengkel`, `jenis_service`, `jadwal`, `jam`, `revenue`, `updated_at`, `created_at`) VALUES
(1, 4, 9, 1, '2020-05-07', '09.00 - 12.00', 100000, '2020-05-13 07:48:50', '2020-05-06 00:32:46'),
(2, 1, 9, 1, '2020-05-10', '09.00 - 12.00', 200000, '2020-05-13 08:58:37', '2020-05-08 04:53:06'),
(3, 1, 10, 4, '2020-07-01', '09.00 - 12.00', 50000, '2020-05-13 08:59:23', '2020-05-09 21:54:49'),
(4, 1, 10, 5, '2020-08-11', '09.00 - 12.00', 250000, '2020-05-14 07:11:48', '2020-05-14 07:10:14'),
(5, 1, 9, 2, '2019-11-10', '09.00 - 12.00', 2000000, '2020-05-14 07:37:14', '2020-05-14 07:35:58');

-- --------------------------------------------------------

--
-- Table structure for table `tb_cart`
--

CREATE TABLE `tb_cart` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `produk_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_cart`
--

INSERT INTO `tb_cart` (`user_id`, `produk_id`, `created_at`, `updated_at`) VALUES
(1, 2, '2020-05-08 04:48:51', '2020-05-08 04:48:51'),
(4, 2, '2020-04-27 06:43:27', '2020-04-27 06:43:27'),
(4, 7, '2020-05-05 00:05:33', '2020-05-05 00:05:33'),
(4, 9, '2020-04-27 06:43:50', '2020-04-27 06:43:50');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenis`
--

CREATE TABLE `tb_jenis` (
  `id` int(11) NOT NULL,
  `namajenis` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jenis`
--

INSERT INTO `tb_jenis` (`id`, `namajenis`) VALUES
(1, 'Helmet'),
(2, 'Jacket'),
(3, 'Gloves'),
(4, 'Tires'),
(5, 'Horn'),
(6, 'Belt'),
(7, 'Windshield'),
(8, 'Exhaust'),
(9, 'Lamp'),
(10, 'Full Motorcycle Service'),
(11, 'Oil Change Service'),
(12, 'Other Service'),
(13, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mitra`
--

CREATE TABLE `tb_mitra` (
  `id` int(11) NOT NULL,
  `namaBengkel` varchar(50) NOT NULL,
  `emailPemilik` varchar(50) NOT NULL,
  `namaPemilik` varchar(200) NOT NULL,
  `telpPemilik` varchar(200) NOT NULL,
  `alamatBengkel` varchar(200) NOT NULL,
  `kecamatanBengkel` varchar(200) NOT NULL,
  `kelurahanBengkel` varchar(200) NOT NULL,
  `provinsiBengkel` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_mitra`
--

INSERT INTO `tb_mitra` (`id`, `namaBengkel`, `emailPemilik`, `namaPemilik`, `telpPemilik`, `alamatBengkel`, `kecamatanBengkel`, `kelurahanBengkel`, `provinsiBengkel`) VALUES
(1, '', 'imaduddinhariss@gmail.com', '', '', '', '', '', ''),
(2, '', 'muh.fathoni@gmail.com', '', '', '', '', '', ''),
(3, '', 'ganeshafadel@gmail.com', '', '', '', '', '', ''),
(4, '', 'sully32120@aol.com', '', '', '', '', '', ''),
(5, '', 'screfractories@aol.com', '', '', '', '', '', ''),
(6, '', 'animalloverkayh@gmail.com', '', '', '', '', '', ''),
(7, '', 'pswingparadis@yahoo.com', '', '', '', '', '', ''),
(8, '', 'chantillysweet@gmail.com', '', '', '', '', '', ''),
(9, '', 'plastikstrider@gmail.com', '', '', '', '', '', ''),
(10, '', 'mervyn.burnett@gmail.com', '', '', '', '', '', ''),
(11, '', 'lylemallen@gmail.com', '', '', '', '', '', ''),
(12, '', 'cristyrose333@yahoo.com', '', '', '', '', '', ''),
(13, '', 'meteo2356@yahoo.com', '', '', '', '', '', ''),
(14, '', 'thomaslasalle1995@gmail.com', '', '', '', '', '', ''),
(15, '', 'euro800euro@gmail.com', '', '', '', '', '', ''),
(16, '', 'ronhunt5620@gmail.com', '', '', '', '', '', ''),
(17, '', 'newvisaua@gmail.com', '', '', '', '', '', ''),
(18, '', 'spuds323@gmail.com', '', '', '', '', '', ''),
(19, '', 'bentham997@aol.com', '', '', '', '', '', ''),
(20, '', 'jacqueline.nasser@gmail.com', '', '', '', '', '', ''),
(21, '', 'bentham997@aol.com', '', '', '', '', '', ''),
(22, '', 'bentham997@aol.com', '', '', '', '', '', ''),
(23, '', 'bentham997@aol.com', '', '', '', '', '', ''),
(24, '', 'dennis.tina4@gmail.com', '', '', '', '', '', ''),
(25, '', 'dennis.tina4@gmail.com', '', '', '', '', '', ''),
(26, '', 'marcokuhlberg@gmail.com', '', '', '', '', '', ''),
(27, '', 'rsina89@yahoo.com', '', '', '', '', '', ''),
(28, '', 'newvisaua@gmail.com', '', '', '', '', '', ''),
(29, '', 'toituresgillesmongeon@bellnet.ca', '', '', '', '', '', ''),
(30, '', 'jodenekrumholt@gmail.com', '', '', '', '', '', ''),
(31, '', 'kdegarmo@gmail.com', '', '', '', '', '', ''),
(32, '', 'tatit88@gmail.com', '', '', '', '', '', ''),
(33, '', 'roderickjohn0@gmail.com', '', '', '', '', '', ''),
(34, '', 'tatit88@gmail.com', '', '', '', '', '', ''),
(35, '', 'whc51457@gmail.com', '', '', '', '', '', ''),
(36, '', 'roderickjohn0@gmail.com', '', '', '', '', '', ''),
(37, '', 'hoffmans8ormore@gmail.com', '', '', '', '', '', ''),
(38, '', 'lissettevillatoro@yahoo.com', '', '', '', '', '', ''),
(39, '', 'stephan.beule@gmail.com', '', '', '', '', '', ''),
(40, '', 'roderickjohn0@gmail.com', '', '', '', '', '', ''),
(41, '', 'frankdsforza@gmail.com', '', '', '', '', '', ''),
(42, '', 'helene.danj@gmail.com', '', '', '', '', '', ''),
(43, '', 'effie26@aol.com', '', '', '', '', '', ''),
(44, '', 'jackman.larry@gmail.com', '', '', '', '', '', ''),
(45, '', 'graysonja@gmail.com', '', '', '', '', '', ''),
(46, '', 'kirakosyan_lilit@yahoo.com', '', '', '', '', '', ''),
(47, '', 'roderickjohn0@gmail.com', '', '', '', '', '', ''),
(48, '', 'alyseren@gmail.com', '', '', '', '', '', ''),
(49, '', 'boblinda202@gmail.com', '', '', '', '', '', ''),
(50, '', 'cl2kgymnast@gmail.com', '', '', '', '', '', ''),
(51, '', 'cl2kgymnast@gmail.com', '', '', '', '', '', ''),
(52, '', 'leer108@gmail.com', '', '', '', '', '', ''),
(53, '', 'john@dimensionrobotics.com', '', '', '', '', '', ''),
(54, '', 'infocentr.ro@gmail.com', '', '', '', '', '', ''),
(55, '', 'now2471@gmail.com', '', '', '', '', '', ''),
(56, '', 'bludya72@gmail.com', '', '', '', '', '', ''),
(57, '', 'bludya72@gmail.com', '', '', '', '', '', ''),
(58, '', 'jordan.n.messner@gmail.com', '', '', '', '', '', ''),
(59, '', 'bostic.ld13@yahoo.com', '', '', '', '', '', ''),
(60, '', 'kjhale59@yahoo.com', '', '', '', '', '', ''),
(61, '', 'jcraig4357@gmail.com', '', '', '', '', '', ''),
(62, '', 'nyboriqua911@gmail.com', '', '', '', '', '', ''),
(63, '', 'ttaranichols@gmail.com', '', '', '', '', '', ''),
(64, '', 'plmiro6@gmail.com', '', '', '', '', '', ''),
(65, '', 'jtroxel49@gmail.com', '', '', '', '', '', ''),
(66, '', 'ginaproia@yahoo.com', '', '', '', '', '', ''),
(67, '', 'smwheeler.email@gmail.com', '', '', '', '', '', ''),
(68, '', 'lallireese@gmail.com', '', '', '', '', '', ''),
(69, '', 'jodoll78@gmail.com', '', '', '', '', '', ''),
(70, '', 'guerra42@aol.com', '', '', '', '', '', ''),
(71, '', 'meagan.strat@gmail.com', '', '', '', '', '', ''),
(72, '', 'catizonepietro@gmail.com', '', '', '', '', '', ''),
(73, '', 'lylemallen@gmail.com', '', '', '', '', '', ''),
(74, '', 'cl2kgymnast@gmail.com', '', '', '', '', '', ''),
(75, '', 'cl2kgymnast@gmail.com', '', '', '', '', '', ''),
(76, '', 'jadedrenth@yahoo.com', '', '', '', '', '', ''),
(77, '', 'andrew.l.karki@gmail.com', '', '', '', '', '', ''),
(78, '', 'lynchro008@gmail.com', '', '', '', '', '', ''),
(79, '', 'vwelty@aol.com', '', '', '', '', '', ''),
(80, '', 'richardlucie@bell.net', '', '', '', '', '', ''),
(81, '', 'catizonepietro@gmail.com', '', '', '', '', '', ''),
(82, '', 'dbrito1987@gmail.com', '', '', '', '', '', ''),
(83, '', 'e.sanjulian@gmail.com', '', '', '', '', '', ''),
(84, '', 'jfreedman3435@gmail.com', '', '', '', '', '', ''),
(85, '', 'slynn1124@gmail.com', '', '', '', '', '', ''),
(86, '', 'jfreedman3435@gmail.com', '', '', '', '', '', ''),
(87, '', 'mikeh@hoyttrans.com', '', '', '', '', '', ''),
(88, '', 'justinfrevert@gmail.com', '', '', '', '', '', ''),
(89, '', 'rawsonbari@gmail.com', '', '', '', '', '', ''),
(90, '', 'tinkerbellkel@sbcglobal.net', '', '', '', '', '', ''),
(91, '', 'silvestri10@gmail.com', '', '', '', '', '', ''),
(92, '', 'sultanasur@yahoo.com', '', '', '', '', '', ''),
(93, '', 'm.p.brancoveanu@gmail.com', '', '', '', '', '', ''),
(94, '', 'ovedgroup@gmail.com', '', '', '', '', '', ''),
(95, '', 'larioselectric@yahoo.com', '', '', '', '', '', ''),
(96, '', 'gemmanuel53@comcast.net', '', '', '', '', '', ''),
(97, '', 'nasrdental@aol.com', '', '', '', '', '', ''),
(98, '', 'louise.hodapp@gmail.com', '', '', '', '', '', ''),
(99, '', 'jfunme@aol.com', '', '', '', '', '', ''),
(100, '', 'ddemaria@gmail.com', '', '', '', '', '', ''),
(101, '', 'anisedmo@gmail.com', '', '', '', '', '', ''),
(102, '', 'ramon.garcia1348@yahoo.com', '', '', '', '', '', ''),
(103, '', 'jessicaradams@gmail.com', '', '', '', '', '', ''),
(104, '', 'hillarywieczorek@yahoo.com', '', '', '', '', '', ''),
(105, '', 'jungyun1.3.1973@gmail.com', '', '', '', '', '', ''),
(106, '', 'bfarragher88@gmail.com', '', '', '', '', '', ''),
(107, '', 'bfarragher88@gmail.com', '', '', '', '', '', ''),
(108, '', 'larrancel@gmail.com', '', '', '', '', '', ''),
(109, '', 'dupu6@aol.com', '', '', '', '', '', ''),
(110, '', 'finschoolatl@aol.com', '', '', '', '', '', ''),
(111, '', 'jjpoolspa@yahoo.com', '', '', '', '', '', ''),
(112, '', 'rbruce@tallmangroup.ca', '', '', '', '', '', ''),
(113, '', 'lopezcinthya058@gmail.com', '', '', '', '', '', ''),
(114, '', 'cmlago56@gmail.com', '', '', '', '', '', ''),
(115, '', 'xblbyesmakv@gmail.com', '', '', '', '', '', ''),
(116, '', 'krishnanstephanie@gmail.com', '', '', '', '', '', ''),
(117, '', 'abraham.bauman18@gmail.com', '', '', '', '', '', ''),
(118, '', 'thebaysdrywallandstucco@gmail.com', '', '', '', '', '', ''),
(119, '', 'mlblackwell82@gmail.com', '', '', '', '', '', ''),
(120, '', 'jorgeysalgado@yahoo.com', '', '', '', '', '', ''),
(121, '', 'josert95@gmail.com', '', '', '', '', '', ''),
(122, '', 'ljohnso2559@yahoo.com', '', '', '', '', '', ''),
(123, '', 'clairechance49@gmail.com', '', '', '', '', '', ''),
(124, '', 'kmac12762@aol.com', '', '', '', '', '', ''),
(125, '', 'lycalderontci@aol.com', '', '', '', '', '', ''),
(126, '', 'dahoodedfiend@gmail.com', '', '', '', '', '', ''),
(127, '', 'atbayot30601@yahoo.com', '', '', '', '', '', ''),
(128, '', 'ljohnso2559@yahoo.com', '', '', '', '', '', ''),
(129, '', 'jjpoolspa@yahoo.com', '', '', '', '', '', ''),
(130, '', 'kkrueger@homesc.com', '', '', '', '', '', ''),
(131, '', 'blasekeenan@gmail.com', '', '', '', '', '', ''),
(132, '', 'lapcpa1@gmail.com', '', '', '', '', '', ''),
(133, '', 'tattue3956@gmail.com', '', '', '', '', '', ''),
(134, '', 'markbfoster83@gmail.com', '', '', '', '', '', ''),
(135, '', 'justcause21432@gmail.com', '', '', '', '', '', ''),
(136, '', 'jnikolaieff@gmail.com', '', '', '', '', '', ''),
(137, '', 'edwag2001@gmail.com', '', '', '', '', '', ''),
(138, '', 'tuantainguyen24@yahoo.com', '', '', '', '', '', ''),
(139, '', 'henrydeey@gmail.com', '', '', '', '', '', ''),
(140, '', 'jrubcich@yahoo.com', '', '', '', '', '', ''),
(141, '', 'wdavidsmc@gmail.com', '', '', '', '', '', ''),
(142, '', 'fritasya@gmail.com', '', '', '', '', '', ''),
(143, '', 'fritasya@gmail.com', '', '', '', '', '', ''),
(144, '', 'fritasya@gmail.com', '', '', '', '', '', ''),
(145, 'bengkel.perut', 'bengrut@laper.com', 'trisno', '0123456789', 'bandung', 'bojongsoang', 'ciganitri', 'jawabarat'),
(146, 'jeng.kel', 'jeng.jel@crot.com', 'si jeng sama si kel', '02122333444', 'jauh', 'dah', 'pokoknya', 'mah');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembelianbarang`
--

CREATE TABLE `tb_pembelianbarang` (
  `customer_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `produk_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `namabarang` varchar(1000) NOT NULL,
  `hargabarang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id` int(11) NOT NULL,
  `jenis_id` int(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `deskrip` varchar(200) NOT NULL,
  `stock` varchar(100) NOT NULL,
  `harga` int(100) NOT NULL,
  `gambar_b` varchar(100) NOT NULL,
  `01_gambar_a` varchar(1000) DEFAULT NULL,
  `01_gambar_c` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_produk`
--

INSERT INTO `tb_produk` (`id`, `jenis_id`, `nama`, `deskrip`, `stock`, `harga`, `gambar_b`, `01_gambar_a`, `01_gambar_c`) VALUES
(2, 5, 'Rangkaian Klakson', 'Kondisi: BARU. Rangkaian klakson TANPA SOLDER, TANPA LILIT, sangat aman untuk motor anda. Pnp untuk vespa primavera/sprint 2019. *Hanya rangkaian tanpa klakson!*.', '1', 200000, '/storage/img_produk/RangkaianKlakson.jpg', '/websibengkel/file/gambar_produk/1573665526RangkaianKlakson.jpg', '/websibengkel/file/gambar_produk/1573665526RangkaianKlakson.jpg'),
(3, 13, 'Busi NGK CR8E', 'BUSI NGK CR8E untuk seluruh modern vespa, aman buat mesin standard bawaan pabrik, wajib buat yang suka berpetualang bawa cadangan busi. ', '3', 40000, '/storage/img_produk/Busi NGK CR8E.jpg', '/websibengkel/file/gambar_produk/1573665717Busi NGK CR8E.jpg', '/websibengkel/file/gambar_produk/1573665717Busi NGK CR8E.jpg'),
(4, 13, 'Spion Bar End', 'Spion bar end mirror, kondisi baru mulus, plus dapat kunci kunci nya. ', '1', 150000, '/storage/img_produk/Spion Bar End.jpg', '/websibengkel/file/gambar_produk/1573665767Spion Bar End.jpg', '/websibengkel/file/gambar_produk/1573665767Spion Bar End.jpg'),
(5, 9, 'Osram Night Breaker', 'Osram Night Breaker H4/HS1 55 Watt, warna lebih putih dari bohlam asli, lampu sangat terang cocok sekali untuk touring jarak jauh membelah gelapnya malam ,tebalnya kabut, derasnya hujan. Sangat rekome', '2', 75000, '/storage/img_produk/Osram Night Breaker.jpg', '/websibengkel/file/gambar_produk/1573665825Osram Night Breaker.jpg', '/websibengkel/file/gambar_produk/1573665825Osram Night Breaker.jpg'),
(6, 13, 'Karpet Vespa', 'Karpet untuk Vespa Primavera / Sprint. Kondisi 85%, barang original piaggio. ', '1', 350000, '/storage/img_produk/Karpet.jpg', '/websibengkel/file/gambar_produk/1573665918Karpet.jpg', '/websibengkel/file/gambar_produk/1573665918Karpet.jpg'),
(7, 9, 'LED HS1 ', 'Led HS1 3 sisi with flexible heatsink. Lampu sangat terang dan pnp with all vespa dengan bulb, kondisi masih sangat bagus.', '1', 125000, '/storage/img_produk/LED HS1 3 Sisi.jpg', '/websibengkel/file/gambar_produk/1573666006LED HS1 3 Sisi.jpg', '/websibengkel/file/gambar_produk/1573666006LED HS1 3 Sisi.jpg'),
(8, 13, 'Karet penutup bohlam headlamp', 'Karet penutup bohlam headlamp vespa sprint/primavera, barang original bawaan headlamp vespa sprint 3v.', '1', 100000, '/storage/img_produk/Karet penutup bohlam.jpg', '/websibengkel/file/gambar_produk/1573666085Karet penutup bohlam.jpg', '/websibengkel/file/gambar_produk/1573666085Karet penutup bohlam.jpg'),
(9, 13, 'Rumah Kopling', 'Rumah kopling Vespa Sprint 3v. Kondisi 95%, barang original piaggio. ', '3', 300000, '/storage/img_produk/Rumah Kopling.jpg', '/websibengkel/file/gambar_produk/1573666209Rumah Kopling.jpg', '/websibengkel/file/gambar_produk/1573666209Rumah Kopling.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_servis`
--

CREATE TABLE `tb_servis` (
  `id` int(11) NOT NULL,
  `id_bengkel` bigint(20) UNSIGNED NOT NULL,
  `nama_servis` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_servis`
--

INSERT INTO `tb_servis` (`id`, `id_bengkel`, `nama_servis`) VALUES
(1, 9, 'Repaint'),
(2, 9, 'Poles'),
(3, 9, 'Cuci Motor'),
(4, 10, 'Servis Ringan'),
(5, 10, 'Servis Besar'),
(6, 10, 'Penggantian Part');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id` int(11) NOT NULL,
  `id_user` bigint(20) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `nama`, `email`, `password`, `remember_token`) VALUES
(2, 'bambang', 'bambang@gmail.com', 'bambang123', NULL),
(32, 'aa', 'bb@mail.com', 'aaa', NULL),
(4, 'trisnahahaha', 'firmansyahtrisna@gmail.com', 'Jancok!12', NULL),
(31, 'bambang', 'bambang@gmail.com', 'jancok123', NULL),
(6, 'Pangeran Yudhistira', 'angger9000@gmail.com', 'NGngok12', NULL),
(7, 'Muhammad Fathoni', 'muh.fathoni@gmail.com', 'cikarang', NULL),
(8, 'asiap', 'bla@gmail.com', 'asiap123', NULL),
(9, 'Fikri Miftah Maulana', 'fikrimiftahm@gmail.com', 'theblues17', NULL),
(10, 'mustonie', 'mustonie@gmail.com', 'asdfgh123', NULL),
(11, 'Nadira', 'nadiraalifia98@gmail.com', '123', NULL),
(12, 'Ghifari', 'ghifari@test.com', '12345678', NULL),
(13, 'Farhan Prasetia', 'prasetiafarhan25@gmail.com', '1qaz2wsx', NULL),
(14, 'Rizky Rahmat Hakiki ', 'rizkyrhakiki21@gmail.com', 'helloworld', NULL),
(15, 'Artcart', 'admin@artcart.com', 'artcart123', NULL),
(16, 'asiap', 'bla@gmail.com', 'asiap123', NULL),
(17, 'Thio fauzi', 'Iyofauzi@gmail.com', '1234', NULL),
(18, 'retna', 'retnadiba@gmail.com', 'retnadiba', NULL),
(19, 'Dendy Armandiaz Aziz', 'dendy.aziz@gmail.com', 'dendydendy', NULL),
(20, 'Achmad Gabriel Glowdy', 'g4732z@gmail.com', '123456', NULL),
(21, 'Rimadhina ', 'rimadhina01@gmail.com', 'rima', NULL),
(22, 'Alif Jafar', 'alifjafar@minjemin.com', 'banyumas22', NULL),
(23, 'Giring Ganesha', 'gansha@gmail.com', 'pikiren123', NULL),
(24, 'Rifqi Rosidin', 'rifqi.godog@gmail.com', '12345678', NULL),
(25, 'Fikri Miftah Maulana', 'fikrimiftahm@gmail.com', '123456', NULL),
(26, 'af', 'bla@gmail.com', '123456', NULL),
(27, 'Chandra Adhitya', 'chandradhitya98@gmail.com', 'chandradhitya', NULL),
(28, 'Sultan arif', 'sultanarifma@gmail.com', 'Selamat12', NULL),
(29, 'Fritasya Dwiputri', 'fritasya@hotmail.com', 'matahari', NULL),
(30, 'Chandra Adhitya', 'chandradhitya@gmail.com', '123456', NULL),
(33, 'asdf', 'asdf@asdf.com', '$2y$10$Chw7aDrAM.wt8EvRcLOiiO6acvDNFFD32fB.AyjTI6xC2CwDlrrFa', NULL),
(34, 'udin', 'udin@udin.com', '$2y$10$y9cMAvsn3UvIaE7dNsoUQO77WXhlRv92URqqQu6eMZ6YY0z8JzFMq', 'xpsdz19Njrn0CN42pPBspfnxzSjK70Wa4osPHvCURToQP0KGsfLOzJkXxe24'),
(35, '$username', '$email', '$passcrypt', NULL),
(36, 'udin', 'udin@gmailcom', '$2y$10$vXSTjBt./SSQPWbYRnsOWe/XlWjFS5TrlXQXr3iNAA7GudonNHqNO', NULL),
(37, 'budi', 'budi@man.com', '$2y$10$no.v6sJ0YLhWEwt5Zy6s7..HWicqmhWWNXDLZb2VPXy7HqZ6R8IGy', NULL),
(38, 'jon', 'jon@mail.com', '$2y$10$pknTNo/GOh2O2O.qci5YFuXf1VTJWsZpu29Ho0Q4cVIvLTfV6mYEC', NULL),
(39, 'fritasya', 'fritasya@gmail.com', '$2y$10$8Sc36Ll0t0KO3eBKWwXRQ.gHZF8QKI3wOWI3lSTqvz6IdKiIzmBra', NULL),
(40, 'ganesha', 'ganeshafadel@gmail.com', '$2y$10$cKp.bSUaBtyX/DHQ2qOlD.IIzCog61.fvGFQTKl1YILeXsr7Qje96', NULL),
(41, 'Irwan', 'irwanaditama1@gmail.com', '$2y$10$VH.Q5FWIP8CijRqjMdeEVORdc/j5HB/jvcZa7hpwaKcEsBoZhGTG6', NULL),
(42, 'irwan', 'irwanaditama1@gmail.com', '$2y$10$B76yOLlsdRJqCnoJdDzWGOvR1ujRJcClSruRvsZ1Lj/OBLTIgVfIC', NULL),
(43, 'Jancuk', 'Jancuk@jancuk.com', '$2y$10$1YC162h1KiOBnqPdsE0fCuX496wvhtLahoyitr12uwAZXgx1asnry', NULL),
(44, 'ganesha', 'ganesha@student.telkomuniverstiy.ac.id', '$2y$10$F720A8.ngK.qpTlBU9JvZ.EfYQOAxAiCMYvNj3Cy2zbUR.AeRcSjG', NULL),
(45, 'qweqwe', 'qwe@qwe.cqwe', '$2y$10$K2dzEqeO8iRoJf2O1eflhe7WBIscJVfV.CAgbscVcD1cfdJbWqsja', NULL),
(46, 'qwe', 'ganesha@student.telkomuniverstiy.ac.id', '$2y$10$y7nci5haZG4tE6X18aDQHueY2GWxRJjuGkAwsimQ.aCIhQ2vOqmmq', NULL),
(47, 'qweqwe', 'qweqwe@qwe.com', '$2y$10$1CcOc56Ge6VdIUoeys4VKefk3i7RkNtNockI4YACvKH6D4tz4Y1R2', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usertype` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `usertype`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'toni', '082298099134', NULL, 'fathonifast75@gmail.com', NULL, '$2y$10$1itbzgKN7qUe0oV4jHUjpeKzb.QgkYEKOaF9lYZvRPRjqoHEZ1fl.', NULL, '2020-04-08 22:22:07', '2020-04-08 22:22:07'),
(2, 'admin', '082298099134', 'superadmin', 'admin@gmail.com', NULL, '$2y$10$JL3hj.aw0skb9rnxZHyXG.J5Nk.YcARrRyEdTav0Mnr8mnLacGJsG', NULL, '2020-04-08 23:50:28', '2020-04-08 23:50:28'),
(3, 'superadmin', '082298099134', 'superadmin', 'superadmin@gmail.com', NULL, '$2y$10$ilFBQhJ1jF.PGN2wSeoYIOEG67xWjfwEVXEU6Oz5oJ0deKqJL6nJi', NULL, '2020-04-15 21:00:16', '2020-04-15 21:00:16'),
(4, 'Fadel Ganesha', '081214511102', NULL, 'ganeshafadel@gmail.com', NULL, '$2y$10$MmAlI6Ovcv7tDfPbzVPfGeQYdMw4BaeHBWsHdV42pQN1ZvfgFSObK', NULL, '2020-04-18 23:07:17', '2020-04-18 23:07:17'),
(9, 'vsd', '', 'admin', 'email@vsd.com', NULL, '$2y$10$JL3hj.aw0skb9rnxZHyXG.J5Nk.YcARrRyEdTav0Mnr8mnLacGJsG', NULL, NULL, NULL),
(10, 'vespuci', '', 'admin', 'email@vespuci.com', NULL, '$2y$10$JL3hj.aw0skb9rnxZHyXG.J5Nk.YcARrRyEdTav0Mnr8mnLacGJsG', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `tb_bengkel`
--
ALTER TABLE `tb_bengkel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_booking`
--
ALTER TABLE `tb_booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_idbengkel` (`id_bengkel`),
  ADD KEY `fk_namaservis` (`jenis_service`);

--
-- Indexes for table `tb_cart`
--
ALTER TABLE `tb_cart`
  ADD PRIMARY KEY (`user_id`,`produk_id`),
  ADD KEY `fk_idproduk` (`produk_id`);

--
-- Indexes for table `tb_jenis`
--
ALTER TABLE `tb_jenis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_mitra`
--
ALTER TABLE `tb_mitra`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pembelianbarang`
--
ALTER TABLE `tb_pembelianbarang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uid` (`customer_id`,`produk_id`),
  ADD KEY `idproduk` (`produk_id`);

--
-- Indexes for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_idjeniscategories` (`jenis_id`);

--
-- Indexes for table `tb_servis`
--
ALTER TABLE `tb_servis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_namabengkel` (`id_bengkel`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_produktransaksi` (`id_barang`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_bengkel`
--
ALTER TABLE `tb_bengkel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_booking`
--
ALTER TABLE `tb_booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_mitra`
--
ALTER TABLE `tb_mitra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT for table `tb_pembelianbarang`
--
ALTER TABLE `tb_pembelianbarang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_servis`
--
ALTER TABLE `tb_servis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_booking`
--
ALTER TABLE `tb_booking`
  ADD CONSTRAINT `fk_idbengkel` FOREIGN KEY (`id_bengkel`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_namaservis` FOREIGN KEY (`jenis_service`) REFERENCES `tb_servis` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_cart`
--
ALTER TABLE `tb_cart`
  ADD CONSTRAINT `fk_idproduk` FOREIGN KEY (`produk_id`) REFERENCES `tb_produk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_iduser` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_servis`
--
ALTER TABLE `tb_servis`
  ADD CONSTRAINT `fk_namabengkel` FOREIGN KEY (`id_bengkel`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD CONSTRAINT `fk_produktransaksi` FOREIGN KEY (`id_barang`) REFERENCES `tb_produk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
