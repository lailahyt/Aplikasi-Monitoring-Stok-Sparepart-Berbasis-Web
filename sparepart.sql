-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql103.infinityfree.com
-- Waktu pembuatan: 26 Nov 2025 pada 20.57
-- Versi server: 11.4.7-MariaDB
-- Versi PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `if0_40217094_tester`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kirim_part`
--

CREATE TABLE `kirim_part` (
  `no_pengiriman` varchar(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `part_number` varchar(50) NOT NULL,
  `nama_sparepart` varchar(100) NOT NULL,
  `barcode` varchar(50) NOT NULL,
  `qty` int(11) NOT NULL,
  `id_atm` varchar(50) NOT NULL,
  `nama_lokasi` varchar(100) NOT NULL,
  `detail_kerusakan` text NOT NULL,
  `tgl_pengiriman` date NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `kirim_part`
--

INSERT INTO `kirim_part` (`no_pengiriman`, `username`, `part_number`, `nama_sparepart`, `barcode`, `qty`, `id_atm`, `nama_lokasi`, `detail_kerusakan`, `tgl_pengiriman`, `status`) VALUES
('BMS001', 'J95608', '7430000301                                        ', 'THROAT_FR /EXIT SHUTTER                                            ', '103221229352                                      ', 1, 'S1FPKB113O', 'MITRA BORNEO', 'shutter tidak bisa membuka', '2025-11-01', 'DONE'),
('BMS002', 'J95608', '1750105679                                        ', 'CONTROLLER CMD                                            ', '103221299955                                      ', 1, 'S1FPKBA025', 'HOTEL AVILLA', 'REMAIN ACAK dan Sering hilang', '2025-11-01', 'DONE'),
('BMS003', 'J95608', '1750109615                                        ', 'DOUBLE EXTRACTOR UNIT CMD-V4                                            ', '103221192495                                      ', 1, 'S1JPKBA011', 'PT. BJAP 3', 'PULLY DRAW HABIS dan Belt Kendor', '2025-11-01', 'DONE'),
('BMS004', 'J95608', '1750189334                                        ', 'PRINTER TP13 280                                            ', '103211202212                                      ', 1, 'S1GPKBA016', 'HOTEL MERCURE', 'repeat recipt error', '2025-11-01', 'DONE'),
('BMS005', 'J95605', '1750262934                                        ', 'LC 15\" OPENFRAME PROCASH 280N                                            ', 'SL1150F1508202909                                 ', 1, 'S1GMTHA027', 'RSUD PURUK CAHU', 'Nyala bentar terus mati lagi', '2025-11-05', 'Kirim travel ading'),
('BMS006', 'J95609', '1750189334                                        ', 'PRINTER TP13 280                                                                                    ', '103211215721                                      ', 1, 'S1JBBIA013', 'GAL KLN TANJUNG 5', 'Repeat problem reciept tidak memotong/sangkut ', '2025-11-05', 'Bad'),
('BMS007', 'J95609', '1750109659                                        ', 'STACKER CMD                                                                                        ', '103221123124                                      ', 1, 'S1EBBI08LB ', 'GAL KLN TANJUNG 2', 'Kode eror 2:5', '2025-11-19', 'Bad'),
('BMS008', 'J95609', '1750109659                                        ', 'STACKER CMD                                                                                        ', '103221214355                                      ', 1, 'S1JBBIA019', 'RUMAH DINAS BM', 'Kode eror 2:5', '2025-11-19', 'Bad');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_atm`
--

CREATE TABLE `master_atm` (
  `id_atm` varchar(50) NOT NULL,
  `nama_lokasi` varchar(255) NOT NULL,
  `bank` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `master_atm`
--

INSERT INTO `master_atm` (`id_atm`, `nama_lokasi`, `bank`) VALUES
('S1EBBI90QE', 'KCU BARABAI 2\r\n', 'BNI'),
('S1JBBIA030', 'MESJID BSR ARRIDHA KELUA2\r\n', 'BNI'),
('S1JBBIA020', 'MESS PT. BUMA ', 'BNI'),
('S1FBBIA027', 'HOTEL AROFAH\r\n', 'BNI'),
('S1JBBIA018', 'MUARA TAPUS\r\n', 'BNI'),
('S1JBBIA007', 'PESANTREN RAKHA\r\n', 'BNI'),
('S1JBBIA006', 'HOTEL LAMBUNG MANGKURAT 1', 'BNI'),
('S1EBBI90QD', 'GAL KLN AMUNTAI 2', 'BNI'),
('S1EBBI90QF', 'RSUD BRIGJ. H.HASAN BASRI', 'BNI'),
('S1GBBIA025', 'KLN KANDANGAN 3', 'BNI'),
('S1FBBI11OV', 'KLN KANDANGAN 2', 'BNI'),
('S1EBBI06DI', 'KLN KANDANGAN 1', 'BNI'),
('S1EBBI90PN', 'ATM GALERY KCP BINUANG 2 ', 'BNI'),
('S1FBBI11OW', 'SPBU BUNGUR', 'BNI'),
('S1JBBIA021', 'SPBU KM 94', 'BNI'),
('S1JBBIA003', 'ROKET CHICKEN KM 77 ', 'BNI'),
('S1IBBRA047', 'SPBU PT.PERSADA ENERGI', 'BNI'),
('S1JBBIA022', 'JL.BAYPAS', 'BNI'),
('S1FBBIA028', 'GAL KLN RANTAU 4', 'BNI'),
('S1FBBI11ON', 'KK BINUANG', 'BNI'),
('S1EBBI10KA', 'GAL ATM KCPÂ RANTAU', 'BNI'),
('S1GBBR11CF', 'KK ASAM-ASAM', 'BNI'),
('S1EBBR90QO', 'RS BERSALIN AINUN', 'BNI'),
('S1IBBRA048', 'RSIA BORNEO CITRA MEDIKA', 'BNI'),
('S1EBBR10JQ', 'SPBU GAMBUT', 'BNI'),
('S1GBBRA037', 'KANTOR IMIGRASI', 'BNI'),
('S1EBBR90QS', 'SPBU LANDASAN ULIN 1', 'BNI'),
('S1EBBR90QR', 'SPBU LANDASAN ULIN 2', 'BNI'),
('S1IBBRA049', 'GALÂ KCUÂ BBRÂ 7', 'BNI'),
('S1JBBRA001', 'LAPANGAN GOLF SWARGALOKA', 'BNI'),
('S1JBBRA013', 'INDOMARET BALITAN', 'BNI'),
('S1IBBRA050', 'INDOMARET TRIKORA 2', 'BNI'),
('S1EBBR08LA', 'RS. MAWAR P. BATUR', 'BNI'),
('S1JBBRA005', 'MM GREEN MART', 'BNI'),
('S1IBBRA030', 'RSD IDAMAN BANJARBARU', 'BNI'),
('S1EBBR90QQ', 'AUTO SPEED', 'BNI'),
('S1EBBR06DJ', 'GALERI KCP MARTAPURA 2', 'BNI'),
('S1JBBRA012', 'Q MALL', 'BNI'),
('S1IBBRA051', 'SUNGAI ULIN', 'BNI'),
('S1GBBRA033', 'KEVIN RESORT', 'BNI'),
('S1FBBR11OK', 'MM SEKUMPUL', 'BNI'),
('S1EBBR10JO', 'BATAS KOTA', 'BNI'),
('S1EBBR08KW', 'GALÂ KCPÂ A.YANIÂ MTP 1', 'BNI'),
('S1JBBRA017', 'AUTO BRIDAL SUNGAI PARING', 'BNI'),
('S1BBBR03SK', 'KK CEMPAKA 2', 'BNI'),
('S1GM09A003', 'BLG BANJARBARU', 'BNI'),
('S1JBBRA009', 'TOKO DHINI', 'BNI'),
('S1EBBR08KV', 'KK CEMPAKA 4', 'BNI'),
('S1EBBR10JN', 'PLN AP2B', 'BNI'),
('S1CBBRA053', 'BPK RI KALSEL', 'BNI'),
('S1JBBRA008', 'HOTEL SYARIAH MONTANA', 'BNI'),
('S1EBBR90QP', 'GAL KCU BBR 8', 'BNI'),
('S1BBBR02WC', 'GAL KCU BBR 2', 'BNI'),
('S1EPRY90PT', 'PT. GAL MANGKATIP', 'BNI'),
('S1GPRYA029', 'PT.GAL PLASMA', 'BNI'),
('S1FPRYA006', 'PT.GAL', 'BNI'),
('S1FKKPA004', 'PT. BERKAH ALAM FAJARMAS', 'BNI'),
('S1GKKPA003', 'PT. KARYA LUHUR SEJATI', 'BNI'),
('S1FPRYA005', 'PT. KAHAYAN BERSERI', 'BNI'),
('S1EPRY10KN', 'RSUD KUALA KAPUAS 2', 'BNI'),
('S1BPRY12JJ', 'RSUD KUALA KAPUAS', 'BNI'),
('S1DPRY12AA', 'PT. SCP 2', 'BNI'),
('S1GPRYA038', 'PT. SCP', 'BNI'),
('S1JBMSA051', 'KLN MARABAHAN 2', 'BNI'),
('S1BBMS12UU', 'GLOW SWALAYAN 1', 'BNI'),
('T0902917', 'GAL KLN UNLAM 2', 'BNI'),
('S1EBMS10JW', 'HOTEL ROYAL JELITA', 'BNI'),
('S1GBMS11CH', 'PT. GAHA INTI JAYA 2', 'BNI'),
('S1FBMS11OP', 'PT. GAHA INTI JAYA 1 ', 'BNI'),
('S1EBMS12MM', 'GAL KCU BMS 2', 'BNI'),
('S1JBMSA015', 'DEPO GEMILANG', 'BNI'),
('S1HBMS12KK', 'MM RATIH', 'BNI'),
('S1GBMSA059', 'HOTEL REGEN', 'BNI'),
('S1EBMS10JV', 'JUMBO FRIED CHICKEN ', 'BNI'),
('S1EBMS10JX', 'HOTEL JELITA', 'BNI'),
('S1EBMS90QG', 'WIJAYA TRIUTAMA PLYWOOD', 'BNI'),
('S1BPAB02LY', 'SPBU BELITUNG', 'BNI'),
('T0903984', 'KEJAKSAAN TINGGI BMS', 'BNI'),
('S1EBMS04KO', 'RS SUAKA INSAN 1', 'BNI'),
('S1EBMS08KX', 'PEKAS GABRAH', 'BNI'),
('T0902509', 'GALLERY KCP A YANI KM 1', 'BNI'),
('S1BBMS02WI', 'GAL KLN A YANI KM.3,5 1', 'BNI'),
('S1JBBIA019', 'RUMAH DINAS BM\r\n', 'BNI'),
('S1EBBI08LB', 'GAL KLN TANJUNG 2\r\n', 'BNI'),
('S1JBBIA013', 'GAL KLN TANJUNG 5\r\n', 'BNI'),
('S1JBBIA012', 'GAL ATM KCP TANJUNG ', 'BNI'),
('S1JBBIA008', 'ALFAMART BALANGAN \r\n', 'BNI'),
('S1EBBI10JZ', 'GAL KCP AMUNTAI ', 'BNI'),
('S1GMTHA021', 'PT. ASMIN BARA BERONANG', 'BNI'),
('S1GMTHA020', 'PT. MPG ', 'BNI'),
('S1JMTHA018', 'SPBU PRAMUKA ', 'BNI'),
('S1GMTHA024', 'MM H AMAN 2\r\n', 'BNI'),
('S1JMTHA017', 'PAMA ASMI 3 ', 'BNI'),
('S1GMTHA028', 'SITE PAMA ASMI 4', 'BNI'),
('S1GMTHA023', 'SITE PAMA ASMI', 'BNI'),
('S1EMTH90PW', 'KLN BUNTOK 2\r\n', 'BNI'),
('S1JMTHA016', 'HOTEL WAHYU PERDANA 1\r\n', 'BNI'),
('S1EMTH10KJ', 'DEALER YAMAHA', 'BNI'),
('S1EMTH10KK', 'SPBU AMPAH', 'BNI'),
('S1EMTH10KL', 'GAL KLN PURUK CAHU 2\r\n', 'BNI'),
('S1GMTHA027', 'RSUD PURUK CAHU\r\n', 'BNI'),
('S1JMTHA015', 'PAMA TOP 2\r\n', 'BNI'),
('S1JMTHA014', 'MITRA BARITO\r\n', 'BNI'),
('S1GMTHA025', 'APOTIK MUJARAB', 'BNI'),
('S1GMTHA022', 'SIMPANG KONUT\r\n', 'BNI'),
('S1JKTUA018', 'KODECO BATULICIN\r\n', 'BNI'),
('S1FKTU11O4', 'GAL KLN BATULICIN 1\r\n', 'BNI'),
('S1EKTU10KH', 'PT PLN KTU 1\r\n', 'BNI'),
('S1FKTU11PO', 'AL KAUTSAR SUNGAI DANAU\r\n', 'BNI'),
('S1EKTU08LG', 'ATM PT. KEL\r\n', 'BNI'),
('S1FKTUA004', 'GAL SUNGAI DANAU 2\r\n', 'BNI'),
('S1FKTUA014', 'PT STLI\r\n', 'BNI'),
('S1JKTUA016', 'SPBU MAGALAU SERONGGA', 'BNI'),
('S1FKTUA007', 'PT. ADISURYA CIPTA LESTARI', 'BNI'),
('S1FKTUA010', 'ATM SPBU ANGSANA\r\n', 'BNI'),
('S1JKTUA017', 'SPBU SUNGAI LOBAN\r\n', 'BNI'),
('S1FKTUA005', 'ATM ULFAH MART\r\n', 'BNI'),
('S1EKTU10KG', 'HOTEL KARTIKA 1\r\n', 'BNI'),
('S1EKTU90PX', 'HOTEL GRAND SURYA\r\n', 'BNI'),
('S1JKTUA015', 'PT BKB\r\n', 'BNI'),
('S1BKTU02DF', 'PT.BUMA\r\n', 'BNI'),
('S1FPRY11K0', 'GAL KK RAJAWALI 1', 'BNI'),
('S1GPRYA037', 'KK TJILIK RIWUT 3\r\n', 'BNI'),
('S1JPRYA028', 'FATHYA SARI', 'BNI'),
('S1EPRY10KR', 'PT KAPUAS MAJU JAYA\r\n', 'BNI'),
('S1EPRY10KP', 'GAL KCU PRY 5\r\n', 'BNI'),
('S1FPRYA015', 'GAL KK RAJAWALI 2\r\n', 'BNI'),
('S1FPRYA007', 'ATM BUKIT KEMINTING\r\n', 'BNI'),
('S1EPRY90PP', 'SENDY\'S SWALAYAN\r\n', 'BNI'),
('S1EPRY90PQ', 'KANTOR SAMSAT\r\n', 'BNI'),
('S1JPRYA027', 'DEPO GEMILANG II\r\n', 'BNI'),
('S1BPRY03WK', 'GAL KLN A YANI 2', 'BNI'),
('S1EPRY08LJ', 'KK SETH ADJI 2\r\n', 'BNI'),
('S1EPRY90PS', 'KCP KASONGAN\r\n', 'BNI'),
('S1JPRYA041', 'KK RTA MILONO', 'BNI'),
('S1BPRY02GW', 'PT. DWIMA JAYA\r\n', 'BNI'),
('S1FPRYA010', 'UNMUH PALANGKARAYA\r\n', 'BNI'),
('S1EPRY90PR', 'STMIK PALANGKARAYA\r\n', 'BNI'),
('S1FPRYA011', 'SPBU YOS SUDARSO\r\n', 'BNI'),
('S1FPRYA012', 'AURILA HOTEL\r\n', 'BNI'),
('S1JPRYA026', 'UNIVERSITAS PALANGKA RAYA\r\n', 'BNI'),
('S1IPRYA039', 'KCP GUNUNG MAS\r\n', 'BNI'),
('S1JPRYA021', 'DELAVAN CAFÉ\r\n', 'BNI'),
('S1JPRYA025', 'LUSYIFA SARI\r\n', 'BNI'),
('S1JPRYA024', 'DEPO GEMILANG\r\n', 'BNI'),
('S1JPRYA018', 'RM YUDI\r\n', 'BNI'),
('S1EPRY10KQ', 'HOTEL RATAMA', 'BNI'),
('S1JPRYA023', 'TILUNG\r\n', 'BNI'),
('S1JPRYA017', 'TOKO SUMBER RAHMAT\r\n', 'BNI'),
('S1JPRYA019', 'RAIHAN FASHION\r\n', 'BNI'),
('S1JPRYA022', 'BANDARA TJILIK RIWUT', 'BNI'),
('S1FPRY112O', 'TERMINAL WA GARA ', 'BNI'),
('S1FSPT10LC', 'ALFAMART S.PARMAN', 'BNI'),
('S1ISPTA024', 'PT. BUMI HUTANI LESTARI', 'BNI'),
('S1FSPTA013', 'PT. GAWI BAHANDEP 1', 'BNI'),
('S1ESPT90OU', 'PT TASK MENATAY HULU', 'BNI'),
('S1JSPTA010', 'TOKO KARYA JAYA', 'BNI'),
('S1ISPTA022', 'PT. TASK 2\r\n', 'BNI'),
('S1ISPTA027', 'PT UNGGUL LESTARI 1\r\n', 'BNI'),
('S1ISPTA028', 'PT. UNGGUL LESTARI 2\r\n', 'BNI'),
('S1DSPTA033', 'UNGGUL LESTARI 3\r\n', 'BNI'),
('S1FSPTA015', 'SPBU MT HARYONO', 'BNI'),
('S1GSPTA019', 'ATM PT GAWI BAHANDEP 2\r\n', 'BNI'),
('S1FSPTA032', 'PT HAMPARAN 2\r\n', 'BNI'),
('S1FSPTA014', 'PT. TEGUH SEMPURNA\r\n', 'BNI'),
('S1GSPTA020', 'PT TUNAS AGRO SUBUR\r\n', 'BNI'),
('S1ISPTA023', 'PT. TASK 3', 'BNI'),
('S1JSPTA030', 'ATM PT SCC\r\n', 'BNI'),
('S1FSPTA011', 'PT KARUNIA KENCANA PERMAI\r\n', 'BNI'),
('S1ISPTA026', 'PT. HAMPARAN MASAWIT\r\n', 'BNI'),
('S1ISPTA029', 'PT.KRIDATAMA LANCAR\r\n', 'BNI'),
('S1JSPTA004', 'PT ADHYAKSA SATYA\r\n', 'BNI'),
('S1FPKBA025', 'HOTEL AVILLA\r\n', 'BNI'),
('S1EPKB10KS', 'GAL KLN KUMAI 1\r\n', 'BNI'),
('S1JPKBA011', 'PT. BJAP 3', 'BNI'),
('S1GPKBA015', 'KK KARANG MULIA 2\r\n', 'BNI'),
('S1HPKBA023', 'KCP KAB SUKAMARA\r\n', 'BNI'),
('S1FPKB113O', 'MITRA BORNEO\r\n', 'BNI'),
('S1FPKBA026', 'PT.WANA SAWIT SUBUR LESTARI 1', 'BNI'),
('S1GPKBA021', 'PT PILAR WANAPERSADA\r\n', 'BNI'),
('S1GPKBA022', 'KK LAMANDAU', 'BNI'),
('S1JPKBA010', 'PT. BJAP\r\n', 'BNI'),
('S1JPKBA012', 'PT. KORINTIGA HUTANI\r\n', 'BNI'),
('S1JPKBA013', 'PT. BUMI LANGGENG\r\n', 'BNI'),
('S1GPKBA018', 'INDOTRUBA SE', 'BNI'),
('S1JPKBA008', 'PT SUNGAI RANGIT ', 'BNI'),
('S1FPKBA001', 'KK LAMANDAU 2', 'BNI'),
('S1FPKBA027', 'PT BJAP 2\r\n', 'BNI'),
('S1FPKBA028', 'PT WANASAWIT SUBUR LESTAR\r\n', 'BNI'),
('S1GPKBA016', 'HOTEL MERCURE', 'BNI'),
('S1GPKBA020', 'SUPERMARKET ABALOVE\r\n', 'BNI'),
('WIN0001012', 'TRIO MOTOR\r\n', 'BTN'),
('520447', 'UNIT BRI KERENG PANGI PALANGKARAYA\r\n', 'BRI'),
('620914', 'UNIT BRI KASONGAN PALANGKARAYA\r\n', 'BRI'),
('620912', 'KCP KATINGAN\r\n', 'BRI'),
('74073', 'UNIT BRI LAMPIHONG\r\n', 'BRI'),
('450517', 'KEMENAG KAB HST \r\n', 'BRI'),
('283', 'BNJRMSIN - SPBU SULTAN ADAM \r\n', 'BRI'),
('450852', 'RSUD ULIN\r\n', 'BRI'),
('95788', 'RS. SUAKA INSAN\r\n', 'BRI'),
('94037', 'SUNGAI ANDAI\r\n', 'BRI'),
('70279', 'KAMPUS IAIN\r\n', 'BRI'),
('94505', 'INDOMARET SULTAN ADAM\r\n', 'BRI'),
('90055', 'HOTEL PESONA', 'BRI'),
('1109', 'HOTEL JELITA', 'BRI'),
('57056', 'HOTEL G\'SIGN', 'BRI'),
('1237', 'HOTEL BJM INT', 'BRI'),
('94040', 'HONDA TRIO MOTOR', 'BRI'),
('80052', 'KC SAMUDERA', 'BRI'),
('450853', 'ALFIN WATER BOOM', 'BRI'),
('WIN0001034', 'SPBU 64.701.015', 'BTN'),
('WIN0002602', 'M BAHALAP HOTEL', 'BTN'),
('WIN0001020', 'UPIK FUTSAL', 'BTN'),
('WIN0024202', 'HOTEL WELLA', 'BTN'),
('8593', 'KCP KOTABARU', 'MEGA'),
('80911', 'CAFIAR', 'BRI'),
('WIN0001018', 'YYS HASANUDIN\r\n', 'BTN'),
('WIN0001021', 'SUNGAI LULUT\r\n', 'BTN'),
('WIN0001013', 'GYM SUNGAI ANDAI\r\n', 'BTN'),
('WIN0038602', 'M MARKET NADIA\r\n', 'BTN'),
('WIN0010801', 'SEI SIPAI', 'BTN'),
('WIN0010805', 'MUSTIKA JAYA\r\n', 'BTN'),
('WIN0010804', 'SEKUMPUL MARTAPURA\r\n', 'BTN'),
('WIN0010806', 'PDAM INTAN BNJAR\r\n', 'BTN'),
('WIN0002609', 'AHMAD YANI TOKO\r\n', 'BTN'),
('WIN0002608', 'SUPERMARKET SENDY\r\n', 'BTN'),
('WIN0002607', 'MEGA TOWN SQUARE\r\n', 'BTN'),
('WIN0001014', 'PSR BUMI WAHYU', 'BTN'),
('WIN0001010', 'SPBU BANUA ANYAR', 'BTN'),
('WIN0001005', 'POLTEKKES BANJARMASIN', 'BTN'),
('WIN0001007', 'DUTA MALL BJMSN', 'BTN'),
('8568', 'KCP BATULICIN\r\n', 'MEGA'),
('8573', 'KCP TANJUNG TABALONG\r\n', 'MEGA'),
('8575', 'KCP MUARA TEWEH\r\n', 'MEGA'),
('8576', 'KCP KUALA KAPUAS\r\n', 'MEGA'),
('8641', 'KCP AMUNTAI\r\n', 'MEGA'),
('10032', 'Galery ATM Telkom Ahmad Yani', 'KALTENG'),
('10033', 'Galery ATM Telkom Cempaka', 'KALTENG'),
('12550107', 'ATM AKMAL Mart Puruk Cahu', 'KALTENG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemakaian_part`
--

CREATE TABLE `pemakaian_part` (
  `no_tiket` varchar(50) NOT NULL,
  `id_atm` varchar(50) NOT NULL,
  `nama_lokasi` varchar(255) NOT NULL,
  `mesin` varchar(50) NOT NULL,
  `nama_teknisi` varchar(255) NOT NULL,
  `nama_sparepart` varchar(100) NOT NULL,
  `jenis_sparepart` varchar(50) NOT NULL,
  `part_number` varchar(50) NOT NULL,
  `sn_good` varchar(50) NOT NULL,
  `sn_bad` varchar(50) NOT NULL,
  `detail_kerusakan` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `pemakaian_part`
--

INSERT INTO `pemakaian_part` (`no_tiket`, `id_atm`, `nama_lokasi`, `mesin`, `nama_teknisi`, `nama_sparepart`, `jenis_sparepart`, `part_number`, `sn_good`, `sn_bad`, `detail_kerusakan`) VALUES
('WKS008', '90055', 'HOTEL PESONA', 'WINCOR                                            ', 'Muhammad Nahyyij Husaibi', 'CARD READER CHD V2CU ACT VERSION                                            ', 'Bisa Diperbaiki                                   ', '1750199931                                        ', '103211327594                                      ', '0011007587', 'Card reader error.\r\n'),
('WKS005', 'S1EBMS10JV', 'JUMBO FRIED CHICKEN ', 'WINCOR                                            ', 'Rizky', 'DOUBLE EXTRACTOR UNIT CMD-V4                                            ', 'Bisa Diperbaiki                                   ', '1750109615                                        ', '103221078685                                      ', 'A205147884', 'belt kendor dan pulley draw aus\r\n'),
('WKS003', 'S1FKTUA005', 'ATM ULFAH MART', 'WINCOR                                            ', 'Muhammad Ikhsan', 'SHUTTER-LITE DC-MOTOR ASSY PC28X                                            ', 'Bisa Diperbaiki                                   ', '1750220136                                        ', '103221309904                                      ', '103231192674', 'open close shuter error '),
('WKS003', 'S1FKTUA005', 'ATM ULFAH MART', 'WINCOR                                            ', 'Muhammad Ikhsan', 'SHUTTER-LITE DC-MOTOR ASSY PC28X                                            ', 'Bisa Diperbaiki                                   ', '1750220136                                        ', '103221309904                                      ', '103231192674', 'open close shuter error '),
('WKS001', 'S1JKTUA017', 'SPBU SUNGAI LOBAN', 'WINCOR                                            ', 'Muhammad Zaqi Habibie', 'PRINTER TP13 280                                            ', 'Bisa Diperbaiki                                   ', '1750189334                                        ', '103211315453                                      ', '103211255704', 'Kertas sering terlipat dan sangkut di moncong Receipt.. '),
('WKS002', 'S1FPRYA012', 'AURILA HOTEL', 'WINCOR                                            ', 'M.Hafiz Anshari', 'CPU BETTLE MINI 280                                            ', 'Bisa Diperbaiki                                   ', '1750235765                                        ', '103211301928                                      ', '103211210683', 'IC BIOS ERORR'),
('WKS006', 'WIN0001034', 'SPBU 64.701.015', 'WINCOR                                            ', 'Rizky', 'LCD 280                                            ', 'Bisa Diperbaiki                                   ', '1750078980                                        ', '103211325274                                      ', '5005L-C3AB2C204-006314', 'monitornya kawa nyala setumat ja bis tu mati,cabut pasang kabel powernya mau hidup,tapi kada seapa mati lagi\r\n'),
('WKS007', 'S1GPRYA038', 'PT. SCP', 'WINCOR                                            ', 'Rizky', 'CARD READER CHD V2CU ACT VERSION                                            ', 'Bisa Diperbaiki                                   ', '1750199931                                        ', '103211328050                                      ', '103211271417', 'card reader tidak bisa dimasukan kartu'),
('WKS009', 'S1IBBRA030', 'RSD IDAMAN BANJARBARU', 'WINCOR                                            ', 'Adriann', 'STACKER CMD                                            ', 'Bisa Diperbaiki                                   ', '1750109659                                        ', '1032211057980                                     ', '103221275492', 'Clamping stack saat test.'),
('WKS010', '90055', 'HOTEL PESONA', 'NCR                                            ', 'Rizky', 'EPP V6 INTERNATIONAL                                            ', 'Tidak Bisa Diperbaiki                             ', '1750159341                                        ', '103211315350                                      ', '103211282296', 'EPP TIDAK BISA DIPENCET'),
('WKS011', 'S1JBBIA013', 'GAL KLN TANJUNG 5', 'WINCOR                                            ', 'Aidi Ramadhani', 'PRINTER TP13 280                                            ', 'Bisa Diperbaiki                                   ', '1750189334                                        ', '103211209026                                      ', '103211215721', 'Repeat problem receipt tidak memotong/sangkut'),
('WKS012', 'S1JBBIA019', 'RUMAH DINAS BM', 'WINCOR                                            ', 'Aidi Ramadhani', 'DOUBLE EXTRACTOR UNIT MDMS CMD-V4                                            ', 'Bisa Diperbaiki                                   ', '1750109641                                        ', '103221314122                                      ', 'A206082735', 'Riject full'),
('WKS013', 'S1JPRYA027', 'DEPO GEMILANG II', 'WINCOR                                            ', 'M.Hafiz Anshari', 'PRINTER TP13 280                                            ', 'Bisa Diperbaiki                                   ', '1750189334                                        ', '103211202212                                      ', '5460064942', 'BUREM'),
('WKS014', 'S1JKTUA015', 'PT BKB', 'WINCOR                                            ', 'Muhammad Ikhsan', 'STACKER CMD                                            ', 'Bisa Diperbaiki                                   ', '1750109659                                        ', '103221242938                                      ', '5527866007', 'belt stacker belakng kendor\r\n'),
('WKS015', 'S1JBBIA019', 'RUMAH DINAS BM', 'WINCOR                                            ', 'Aidi Ramadhani', 'STACKER CMD                                            ', 'Bisa Diperbaiki                                   ', '1750109659                                        ', '103221201050                                      ', '103221214355', 'Kode eror 2:5'),
('WKS016', 'S1EBBI08LB', 'GAL KLN TANJUNG 2', 'WINCOR                                            ', 'Aidi Ramadhani', 'STACKER CMD                                            ', 'Bisa Diperbaiki                                   ', '1750109659                                        ', '103221328537                                      ', '103221123124', 'Kode eror 2:5'),
('WKS017', 'S1GBMS11CH', 'PT. GAHA INTI JAYA 2', 'WINCOR                                            ', 'Rizky', 'RECEIPT PRINTER TP28                                            ', 'Bisa Diperbaiki                                   ', '1750256248                                        ', '103211292313                                      ', '103211217004', 'printer tidka menarik kertas'),
('WKS018', 'S1EPRY10KN', 'RSUD KUALA KAPUAS 2', 'WINCOR                                            ', 'Rizky', 'STACKER CMD                                            ', 'Bisa Diperbaiki                                   ', '1750109659                                        ', '103221207606                                      ', '103221270710', 'repeated CHF uang terserak diatas stacker'),
('WKS019', 'WIN0002602', 'M BAHALAP HOTEL', 'WINCOR                                            ', 'M.Hafiz Anshari', 'LCD 280                                            ', 'Bisa Diperbaiki                                   ', '1750078980                                        ', '103211321490                                      ', '103211210493', 'MATOT'),
('WKS020', 'S1JPRYA027', 'DEPO GEMILANG II', 'WINCOR                                            ', 'M.Hafiz Anshari', 'SHUTTER-LITE DC-MOTOR ASSY PC28X                                            ', 'Bisa Diperbaiki                                   ', '1750220136                                        ', '103231192674                                      ', '8200112722', 'GEAR AUS'),
('WKS021', 'T0201169', 'KAMPUS IAIN', 'HYO                                            ', 'Muhammad Ikhsan', 'ASSY CARRIAGE (TANGAN ROBOT)                                            ', 'Bisa Diperbaiki                                   ', '7310000733                                        ', '133221132834                                      ', '133221145342', 'keluar uang berserakan'),
('WKS022', 'S1GPRYA037', 'KK TJILIK RIWUT 3', 'WINCOR                                            ', 'M.Hafiz Anshari', 'PRINTER TP13 280                                            ', 'Bisa Diperbaiki                                   ', '1750189334                                        ', '103211317527                                      ', '103211236083', 'Sering sangkut di moncong'),
('WKS023', 'S1FPRYA015', 'GAL KK RAJAWALI 2', 'WINCOR                                            ', 'M.Hafiz Anshari', 'LCD 280                                            ', 'Bisa Diperbaiki                                   ', '1750078980                                        ', '103211325273                                      ', '103211103871', 'Redup'),
('WKS024', 'WIN0001020', 'RS TPT', 'WINCOR                                            ', 'Muhammad Ikhsan', 'DOUBLE EXTRACTOR UNIT MDMS CMD-V4                                            ', 'Bisa Diperbaiki                                   ', '1750109641                                        ', '103221328630                                      ', 'A206020059', 'Belt kendor'),
('WKS025', 'S1JBBRA005', 'MM GREEN MART', 'WINCOR', 'Adriann', 'DOUBLE EXTRACTOR UNIT CMD-V4', 'Bisa Diperbaiki', '1750109615', '103221206265', '103221200024', 'Pulley draw hopper 3-4 Kropos'),
('WKS026', '450853', 'ALFIN WATER BOOM', 'HYO                                            ', 'Muhammad Nahyyij Husaibi', 'THROAT_FR /EXIT SHUTTER                                            ', 'Bisa Diperbaiki                                   ', '7430000301                                        ', '133221149452                                      ', '133221142668', 'Exit shutter error karena box penutup shutter.'),
('WKS027', '94037', 'SUNGAI ANDAI', 'WINCOR                                            ', 'Rizky', 'DOUBLE EXTRACTOR UNIT MDMS CMD-V4                                            ', 'Bisa Diperbaiki                                   ', '1750109641                                        ', '103221322544                                      ', '103221324454', 'reject full'),
('WKS028', 'S1JBBIA012', 'GAL ATM KCP TANJUNG ', 'WINCOR                                            ', 'Aidi Ramadhani', 'CARD READER CHD V2CU STANDARD (NO CONTRACT)                                            ', 'Bisa Diperbaiki                                   ', '1750173205                                        ', '103211309387                                      ', '0047012969', 'Repeat problem nolak kartu'),
('WKS029', 'S1EBBR90QO', 'RS BERSALIN AINUN', 'WINCOR                                            ', 'Said Humaidi', 'DOUBLE EXTRACTOR UNIT MDMS CMD-V4                                            ', 'Bisa Diperbaiki                                   ', '1750109641                                        ', '103221327108                                      ', 'A206160693', 'CHF'),
('WKS030', '8593', 'KCP KOTABARU', 'NCR                                            ', 'Muhammad Ikhsan', 'CARD READER NCR ss22E                                            ', 'Bisa Diperbaiki                                   ', '4450704484                                        ', '113211193736                                      ', 'R-70223380', 'banyak menelan kartu'),
('WKS031', '8576', 'KCP KUALA KAPUAS', 'NCR                                            ', 'Ikhwan Maulana', 'PICK MODULE ARIA                                            ', 'Bisa Diperbaiki                                   ', '4450671759                                        ', '113221172839                                      ', 'CB01516702', 'DWHEEL HOPPER 1 DAN 2 AUS\r\n'),
('WKS032', '12550107', 'ATM AKMAL Mart Puruk Cahu', 'WINCOR', 'Prahara Bayu Kusuma', 'RECEIPT PRINTER TP28', 'Bisa Diperbaiki', '1750256248', '103211292289', '97GG645794', 'Cutting kertas sering tidak respon'),
('WKS032', '12550107', 'ATM AKMAL Mart Puruk Cahu', 'WINCOR', 'Prahara Bayu Kusuma', 'RECEIPT PRINTER TP28', 'Bisa Diperbaiki', '1750256248', '103211292289', '97GG645794', 'Cutting kertas sering tidak respon'),
('WKS033', 'S1EBMS12MM', 'GAL KCU BMS 2', 'WINCOR                                            ', 'Rizky', 'CARD READER CHD V2CU ACT VERSION                                            ', 'Bisa Diperbaiki                                   ', '1750199931                                        ', '103211199212                                      ', '0041007788', 'card reader tidak bisa membaca magnetic strip'),
('WKS034', 'S1EPRY10KN', 'RSUD KUALA KAPUAS 2', 'WINCOR                                            ', 'Muhammad Ikhsan', 'STACKER CMD                                            ', 'Bisa Diperbaiki                                   ', '1750109659                                        ', '103221207784                                      ', '103221207606', 'stacker error 1:9 '),
('WKS035', 'S1FKTU11po', 'AL KAUTSAR SUNGAI DANAU', 'WINCOR                                            ', 'Muhammad Ikhsan', 'CONTROLLER CMD                                            ', 'Bisa Diperbaiki                                   ', '1750105679                                        ', '103221259462                                      ', '5404227195', 'remen hilng'),
('WKS036', '57056', 'HOTEL G\'SIGN', 'NCR                                            ', 'Rizky', 'PRESENTER NCR 22E                                            ', 'Bisa Diperbaiki                                   ', '4450724941                                        ', '113221327048                                      ', '113221210753', 'Belt presenter putus');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sparepart`
--

CREATE TABLE `sparepart` (
  `part_number` varchar(50) NOT NULL DEFAULT '',
  `nama_sparepart` varchar(100) DEFAULT NULL,
  `jenis_part` varchar(50) DEFAULT NULL,
  `atm` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `sparepart`
--

INSERT INTO `sparepart` (`part_number`, `nama_sparepart`, `jenis_part`, `atm`) VALUES
('CDLGST', 'CDRW LARGE SATA', 'Tidak Bisa Diperbaiki', 'ALL'),
('FDD144', 'FLOPPY DRIVE BLS1VE-FLX 1,44MB', 'Tidak Bisa Diperbaiki', 'ALL'),
('HDLG500ST', 'HARDISK LARGE 500 GB', 'Tidak Bisa Diperbaiki', 'ALL'),
('HDLG80IDE', 'HARDISK LARGE 80 GB', 'Tidak Bisa Diperbaiki', 'ALL'),
('HDSM320ST', 'HARDISK SMALL 320 GB', 'Tidak Bisa Diperbaiki', 'ALL'),
('HDSM500ST', 'HARDISK SMALL 500 GB', 'Tidak Bisa Diperbaiki', 'ALL'),
('SCR-1K', 'UPS EDCON SCR-01 1KVA', 'Bisa Diperbaiki', 'ALL'),
('7310000733', 'ASSY CARRIAGE (TANGAN ROBOT)', 'Bisa Diperbaiki', 'HYO'),
('7760000064', 'PCBA CDU 10 MAINBOARD ATAS', 'Bisa Diperbaiki', 'HYO'),
('7760000065', 'BOARD PCBA FM (BOARD BAWAH)', 'Bisa Diperbaiki', 'HYO'),
('7460000002', 'BOARD PNC', 'Bisa Diperbaiki', 'HYO'),
('5645000001', 'CARD READER SANKYO', 'Bisa Diperbaiki', 'HYO'),
('7010000308', 'CDU 10 (STACKER) ', 'Bisa Diperbaiki', 'HYO'),
('5611000203B', 'CE30 (MAINBOARD :G41M:AMI PC Ci3)', 'Bisa Diperbaiki', 'HYO'),
('5611000203A', 'CE30 (MAINBOARD :G41M:MSI PC C2D)', 'Bisa Diperbaiki', 'HYO'),
('5611000203BMB', 'MAINBOARD CE30 (MAINBOARD :G41M:AMI PC Ci3)', 'Tidak Bisa Diperbaiki', 'HYO'),
('5661000110', 'LCD 15\" DS-5600', 'Bisa Diperbaiki', 'HYO'),
('5621000036', 'POWER SUPPLY HPS280', 'Bisa Diperbaiki', 'HYO'),
('7020000046', 'RECEIPT PRINTER SPR 24 (TUNAI)', 'Bisa Diperbaiki', 'HYO'),
('7310000725', 'ROTOR CARRIAGE', 'Bisa Diperbaiki', 'HYO'),
('7430000255', 'SEPARATOR LOWER 3-4', 'Bisa Diperbaiki', 'HYO'),
('7310000386', 'SEPARATOR UPPER 1-2', 'Bisa Diperbaiki', 'HYO'),
('7430000301', 'THROAT_FR /EXIT SHUTTER', 'Bisa Diperbaiki', 'HYO'),
('7130110100', 'EPP 8000K', 'Tidak Bisa Diperbaiki', 'HYO'),
('7310000649', 'RACK CASSETTE HYOSUNG', 'Tidak Bisa Diperbaiki', 'HYO'),
('4450704484', 'CARD READER NCR ss22E', 'Bisa Diperbaiki', 'NCR'),
('4450718416', 'S1 DISPENSER CONTROL BOARD SS22E', 'Bisa Diperbaiki', 'NCR'),
('90026887', 'LCD NCR SS22E', 'Bisa Diperbaiki', 'NCR'),
('4450689219', 'PICK I/F DOUBLE (DOUBLE PICK I/F CONTROL BOARD - ASSY)', 'Bisa Diperbaiki', 'NCR'),
('4450671759', 'PICK MODULE ARIA', 'Bisa Diperbaiki', 'NCR'),
('4450724941', 'PRESENTER NCR 22E', 'Bisa Diperbaiki', 'NCR'),
('90025345', 'RECEIPT PRINTER SS22E', 'Bisa Diperbaiki', 'NCR'),
('4450721021', 'SHUTTER ASSY LOWER MOTOR RHS SS22E', 'Bisa Diperbaiki', 'NCR'),
('4450735609', 'EPP SS22E', 'Tidak Bisa Diperbaiki', 'NCR'),
('ATMUSBK', 'ATMDESK USB KEY', 'Tidak Bisa Diperbaiki', 'NCR'),
('90025595', 'POWER SUPPLY SS22E', 'Bisa Diperbaiki', 'NCR'),
('4450728233A', 'KINGSWAY MB INTEL GL40 WITH SATA X3 SS22E PC C2D', 'Tidak Bisa Diperbaiki', 'NCR'),
('4450728233B', 'KINGSWAY MB INTEL GL40 WITH SATA X3 SS22E PC Ci3', 'Bisa Diperbaiki', 'NCR'),
('4450767382', 'ESTORIL MAINBOARD NCR', 'Tidak Bisa Diperbaiki', 'NCR'),
('4450704535', 'ASSY - 15in FDK PCB LH SS22E', 'Tidak Bisa Diperbaiki', 'NCR'),
('4450704530', 'ASSY - 15in FDK PCB RH SS22E', 'Tidak Bisa Diperbaiki', 'NCR'),
('HRNSNCRSSE', 'CABLE HARNESS NCR SS22E', 'Tidak Bisa Diperbaiki', 'NCR'),
('90024352', 'CAMERA ATAS NCR SS22E', 'Tidak Bisa Diperbaiki', 'NCR'),
('4450725392', 'MINI-MISC - PCB ASSY SS22E (BNI)', 'Bisa Diperbaiki', 'NCR'),
('1750199931', 'CARD READER CHD V2CU ACT VERSION', 'Bisa Diperbaiki', 'WINCOR'),
('1750173205', 'CARD READER CHD V2CU STANDARD (NO CONTRACT)', 'Bisa Diperbaiki', 'WINCOR'),
('1750136159', 'CENTRAL POWER PACK USB', 'Bisa Diperbaiki', 'WINCOR'),
('1750263469', 'CENTRAL POWER PACK USB FOR 280N', 'Bisa Diperbaiki', 'WINCOR'),
('1750105679', 'CONTROLLER CMD', 'Bisa Diperbaiki', 'WINCOR'),
('1750235765', 'CPU BETTLE MINI 280', 'Bisa Diperbaiki', 'WINCOR'),
('1750044878', 'Distributor Board 4X With Cover', 'Bisa Diperbaiki', 'WINCOR'),
('1750109615', 'DOUBLE EXTRACTOR UNIT CMD-V4', 'Bisa Diperbaiki', 'WINCOR'),
('1750109641', 'DOUBLE EXTRACTOR UNIT MDMS CMD-V4', 'Bisa Diperbaiki', 'WINCOR'),
('1750106679', 'EMBEDDED PC 1500', 'Bisa Diperbaiki', 'WINCOR'),
('1750078980', 'LCD 280', 'Bisa Diperbaiki', 'WINCOR'),
('1750262934', 'LC 15\" OPENFRAME PROCASH 280N', 'Bisa Diperbaiki', 'WINCOR'),
('1750169942', 'LCD BOX 2 PC1500', 'Bisa Diperbaiki', 'WINCOR'),
('1750189334', 'PRINTER TP13 280', 'Bisa Diperbaiki', 'WINCOR'),
('1750256248', 'RECEIPT PRINTER TP28', 'Bisa Diperbaiki', 'WINCOR'),
('1750063915', 'RECEIPT PRINTER TP07', 'Bisa Diperbaiki', 'WINCOR'),
('1750082602', 'SHUTTER 1500XE', 'Bisa Diperbaiki', 'WINCOR'),
('1750220136', 'SHUTTER-LITE DC-MOTOR ASSY PC28X', 'Bisa Diperbaiki', 'WINCOR'),
('1750109659', 'STACKER CMD', 'Bisa Diperbaiki', 'WINCOR'),
('1750263073', 'SWAP PC 5G I3 P280N', 'Bisa Diperbaiki', 'WINCOR'),
('1750068776', 'TRANSPORT CMD V-4 HORIZONTAL FL 125 MM', 'Bisa Diperbaiki', 'WINCOR'),
('1750057875', 'TRANSPORT CMD V-4 HORIZONTAL FL 101 MM', 'Bisa Diperbaiki', 'WINCOR'),
('1750073167', 'POWER DISTRIBUTOR 1500 (USB)', 'Bisa Diperbaiki', 'WINCOR'),
('1750159341', 'EPP V6 INTERNATIONAL', 'Tidak Bisa Diperbaiki', 'WINCOR'),
('1750233014', 'KEYBOARD J6.1 EPP IDN (EPP J6.1)', 'Tidak Bisa Diperbaiki', 'NCR'),
('1750073862', 'Tombol SOP', 'Tidak Bisa Diperbaiki', 'WINCOR'),
('1750211175', 'TPK-OPTERA 15 in 3mm Cap Sentuh w/ control', 'Tidak Bisa Diperbaiki', 'NCR'),
('1750211130', 'PROTECTIVE GLASS TOUCH SCREEN 280N', 'Tidak Bisa Diperbaiki', 'NCR'),
('1803530375', '15\" Protective Glass PC280 (15\" PROTECT GLASS', 'Tidak Bisa Diperbaiki', 'NCR'),
('1750192235', 'Base Unit ASKIM  - II D (BASE UNIT ASKIM II DD)', 'Bisa Diperbaiki', 'WINCOR'),
('HRNSWIN280', 'CABLE HARNESS PC280', 'Tidak Bisa Diperbaiki', 'WINCOR'),
('6221306535', 'CAPACITOR ALUMINUM;150MF;35VDC; 105MM/ELKO', 'Tidak Bisa Diperbaiki', 'WINCOR'),
('1750192200', 'GAS SPRING 450N WINCOR (strut gas spring)', 'Tidak Bisa Diperbaiki', 'WINCOR'),
('1803530466', 'PINTU FASCIA ATAS PC280 (TARIK KEATAS)', 'Tidak Bisa Diperbaiki', 'WINCOR'),
('1803530359', 'PINTU FASCIA BAWAH PC280', 'Tidak Bisa Diperbaiki', 'WINCOR'),
('1750190038', 'SOFTKEY FRAME 15 INCH DDC-NDC BR PC28X', 'Bisa Diperbaiki', 'WINCOR'),
('1750187952', 'SPECIAL ELEKTRONIK 280', 'Bisa Diperbaiki', 'WINCOR'),
('1750210306', 'USB 2.0 Hub 7-Port', 'Bisa Diperbaiki', 'WINCOR'),
('1750130600', 'V-MODULE (CMD-CHASSIS NT ASSD. QUAD.)', 'Tidak Bisa Diperbaiki', 'WINCOR'),
('HDSM1TST', 'HARDISK SMALL 320 GB (update jadi 1 TB)', 'Tidak Bisa Diperbaiki', 'ALL                                            ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sp_bjb`
--

CREATE TABLE `sp_bjb` (
  `part_number` varchar(50) NOT NULL,
  `nama_sparepart` varchar(255) NOT NULL,
  `jenis_sparepart` varchar(100) NOT NULL,
  `atm` varchar(50) NOT NULL,
  `barcode` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `sp_bjb`
--

INSERT INTO `sp_bjb` (`part_number`, `nama_sparepart`, `jenis_sparepart`, `atm`, `barcode`, `status`) VALUES
('1750233014', 'KEYBOARD J6.1 EPP IDN (EPP J6.1)', 'Tidak Bisa Diperbaiki', 'WINCOR', '103211252851', 'good'),
('1750233014', 'KEYBOARD J6.1 EPP IDN (EPP J6.1)', 'Tidak Bisa Diperbaiki', 'WINCOR', '103211292470 ', 'good'),
('1750173205', 'CARD READER CHD V2CU STANDARD (NO CONTRACT)', 'Bisa Diperbaiki', 'WINCOR', '103211187285', 'good'),
('1750109615', 'DOUBLE EXTRACTOR UNIT CMD-V4', 'Bisa Diperbaiki', 'WINCOR', '103221200024', 'bad'),
('1750189334', 'PRINTER TP13 280', 'Bisa Diperbaiki', 'WINCOR', '103211321489', 'good'),
('1750190038', 'SOFTKEY FRAME 15 INCH DDC-NDC BR PC28X', 'Bisa Diperbaiki', 'WINCOR', '103211320837', 'good'),
('1750109659', 'STACKER CMD', 'Bisa Diperbaiki', 'WINCOR', '103221324654', 'good'),
('1750109615', 'DOUBLE EXTRACTOR UNIT CMD-V4', 'Bisa Diperbaiki', 'WINCOR', '103221206265', 'good'),
('1750199931', 'CARD READER CHD V2CU ACT VERSION', 'Bisa Diperbaiki', 'WINCOR', '103211190040', 'good');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sp_bjm`
--

CREATE TABLE `sp_bjm` (
  `part_number` varchar(50) NOT NULL,
  `nama_sparepart` varchar(100) NOT NULL,
  `jenis_sparepart` varchar(50) NOT NULL,
  `atm` varchar(50) NOT NULL,
  `barcode` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `sp_bjm`
--

INSERT INTO `sp_bjm` (`part_number`, `nama_sparepart`, `jenis_sparepart`, `atm`, `barcode`, `status`) VALUES
('HDLG500ST', 'HARDISK LARGE 500 GB', 'Tidak Bisa Diperbaiki', 'ALL', '163222312007', 'good'),
('4450704484', 'CARD READER NCR ss22E', 'Bisa Diperbaiki', 'NCR', '113211330170', 'good'),
('HDLG500ST', 'HARDISK LARGE 500 GB', 'Tidak Bisa Diperbaiki', 'ALL', '163222294200', 'good'),
('HDLG500ST', 'HARDISK LARGE 500 GB', 'Tidak Bisa Diperbaiki', 'ALL', '163212134534', 'good'),
('HDLG500ST', 'HARDISK LARGE 500 GB', 'Tidak Bisa Diperbaiki', 'ALL', '163212246570', 'good'),
('CDLGST', 'CDRW LARGE SATA', 'Tidak Bisa Diperbaiki', 'ALL', '163212202060', 'good'),
('CDLGST', 'CDRW LARGE SATA', 'Tidak Bisa Diperbaiki', 'ALL', '163212218370', 'good'),
('CDLGST', 'CDRW LARGE SATA', 'Tidak Bisa Diperbaiki', 'ALL', '163212202055', 'good'),
('CDLGST', 'CDRW LARGE SATA', 'Tidak Bisa Diperbaiki', 'ALL', '163212202086', 'good'),
('SCR-1K', 'UPS EDCON SCR-01 1KVA', 'Bisa Diperbaiki', 'ALL', '163234191831', 'good'),
('HDSM320ST', 'HARDISK SMALL 320 GB', 'Tidak Bisa Diperbaiki', 'ALL', '163212257515', 'good'),
('90025595', 'POWER SUPPLY SS22E', 'Bisa Diperbaiki', 'NCR', '113211166832', 'good'),
('90025595', 'POWER SUPPLY SS22E', 'Bisa Diperbaiki', 'NCR', '113211083357', 'good'),
('4450767382', 'ESTORIL MAINBOARD NCR', 'Tidak Bisa Diperbaiki', 'NCR', '113211163826', 'good'),
('4450704484', 'CARD READER NCR ss22E', 'Bisa Diperbaiki', 'NCR', '113211203091', 'good'),
('4450704484', 'CARD READER NCR ss22E', 'Bisa Diperbaiki', 'NCR', '103211072756                        ', 'good'),
('4450728233B', 'KINGSWAY MB INTEL GL40 WITH SATA X3 SS22E PC Ci3', 'Bisa Diperbaiki', 'NCR', '113211172346', 'good'),
('4450721021', 'SHUTTER ASSY LOWER MOTOR RHS SS22E', 'Bisa Diperbaiki', 'NCR', '113221214390', 'good'),
('4450721021', 'SHUTTER ASSY LOWER MOTOR RHS SS22E', 'Bisa Diperbaiki', 'NCR', '113221322797', 'good'),
('4450704535', 'ASSY - 15in FDK PCB LH SS22E', 'Tidak Bisa Diperbaiki', 'NCR', '113212083376', 'good'),
('1750057875', 'TRANSPORT CMD V-4 HORIZONTAL FL 101 MM', 'Bisa Diperbaiki', 'WINCOR', '103221190044', 'good'),
('1750057875', 'TRANSPORT CMD V-4 HORIZONTAL FL 101 MM', 'Bisa Diperbaiki', 'WINCOR', '103221309251', 'good'),
('4450725392', 'MINI-MISC - PCB ASSY SS22E (BNI)', 'Bisa Diperbaiki', 'NCR', '113211083354', 'good'),
('4450671759', 'PICK MODULE ARIA', 'Bisa Diperbaiki', 'NCR', '113221170146', 'good'),
('4450671759', 'PICK MODULE ARIA', 'Bisa Diperbaiki', 'NCR', '113221312432', 'good'),
('4450671759', 'PICK MODULE ARIA', 'Bisa Diperbaiki', 'NCR', '113221208045', 'good'),
('4450671759', 'PICK MODULE ARIA', 'Bisa Diperbaiki', 'NCR', '113221159528', 'good'),
('90026887', 'LCD NCR SS22E', 'Bisa Diperbaiki', 'NCR', '113211148379', 'good'),
('90026887', 'LCD NCR SS22E', 'Bisa Diperbaiki', 'NCR', '113211160345', 'good'),
('90026887', 'LCD NCR SS22E', 'Bisa Diperbaiki', 'NCR', '113211146112', 'good'),
('4450718416', 'S1 DISPENSER CONTROL BOARD SS22E', 'Bisa Diperbaiki', 'NCR', '113221196910', 'good'),
('4450718416', 'S1 DISPENSER CONTROL BOARD SS22E', 'Bisa Diperbaiki', 'NCR', '113221210807', 'good'),
('4450718416', 'S1 DISPENSER CONTROL BOARD SS22E', 'Bisa Diperbaiki', 'NCR', '113221198595', 'good'),
('4450718416', 'S1 DISPENSER CONTROL BOARD SS22E', 'Bisa Diperbaiki', 'NCR', '113221197046', 'good'),
('4450728233A', 'KINGSWAY MB INTEL GL40 WITH SATA X3 SS22E PC C2D', 'Tidak Bisa Diperbaiki', 'NCR', '113211042432', 'good'),
('4450728233A', 'KINGSWAY MB INTEL GL40 WITH SATA X3 SS22E PC C2D', 'Tidak Bisa Diperbaiki', 'NCR', '113211204814', 'good'),
('4450689219', 'PICK I/F DOUBLE (DOUBLE PICK I/F CONTROL BOARD - ASSY)', 'Bisa Diperbaiki', 'NCR', '113221099243', 'good'),
('4450689219', 'PICK I/F DOUBLE (DOUBLE PICK I/F CONTROL BOARD - ASSY)', 'Bisa Diperbaiki', 'NCR', '113221158019', 'good'),
('4450689219', 'PICK I/F DOUBLE (DOUBLE PICK I/F CONTROL BOARD - ASSY)', 'Bisa Diperbaiki', 'NCR', '113221146008', 'good'),
('4450689219', 'PICK I/F DOUBLE (DOUBLE PICK I/F CONTROL BOARD - ASSY)', 'Bisa Diperbaiki', 'NCR', '113221191692', 'good'),
('4450689219', 'PICK I/F DOUBLE (DOUBLE PICK I/F CONTROL BOARD - ASSY)', 'Bisa Diperbaiki', 'NCR', '11322199764', 'good'),
('90025345', 'RECEIPT PRINTER SS22E', 'Bisa Diperbaiki', 'NCR', '11321120794', 'good'),
('90025345', 'RECEIPT PRINTER SS22E', 'Bisa Diperbaiki', 'NCR', '113211225178', 'good'),
('90025345', 'RECEIPT PRINTER SS22E', 'Bisa Diperbaiki', 'NCR', '113211227657', 'good'),
('4450735609', 'EPP SS22E', 'Tidak Bisa Diperbaiki', 'NCR', '113212307056', 'good'),
('4450735609', 'EPP SS22E', 'Tidak Bisa Diperbaiki', 'NCR', '113212189190', 'good'),
('4450735609', 'EPP SS22E', 'Tidak Bisa Diperbaiki', 'NCR', '11322199340', 'good'),
('4450724941', 'PRESENTER NCR 22E', 'Bisa Diperbaiki', 'NCR', '113221211178', 'good'),
('1750211130', 'PROTECTIVE GLASS TOUCH SCREEN 280N', 'Tidak Bisa Diperbaiki', 'NCR', '113212202530', 'good'),
('1750211130', 'PROTECTIVE GLASS TOUCH SCREEN 280N', 'Tidak Bisa Diperbaiki', 'NCR', '113212270001', 'good'),
('1803530375', '15\" Protective Glass PC280 (15\" PROTECT GLASS', 'Tidak Bisa Diperbaiki', 'NCR', '103212267255', 'good'),
('1803530375', '15\" Protective Glass PC280 (15\" PROTECT GLASS', 'Tidak Bisa Diperbaiki', 'NCR', '103212267256', 'good'),
('1803530375', '15\" Protective Glass PC280 (15\" PROTECT GLASS', 'Tidak Bisa Diperbaiki', 'NCR', '103212313346', 'good'),
('1750044878', 'Distributor Board 4X With Cover', 'Bisa Diperbaiki', 'WINCOR', '103221258865', 'good'),
('1750044878', 'Distributor Board 4X With Cover', 'Bisa Diperbaiki', 'WINCOR', '103221309249', 'good'),
('1750044878', 'Distributor Board 4X With Cover', 'Bisa Diperbaiki', 'WINCOR', '103221197954', 'good'),
('1750044878', 'Distributor Board 4X With Cover', 'Bisa Diperbaiki', 'WINCOR', '103221249628', 'good'),
('1750105679', 'CONTROLLER CMD', 'Bisa Diperbaiki', 'WINCOR', '103221199089', 'good'),
('1750262934', 'LC 15\" OPENFRAME PROCASH 280N', 'Bisa Diperbaiki', 'WINCOR', '103211174582', 'good'),
('1750262934', 'LC 15\" OPENFRAME PROCASH 280N', 'Bisa Diperbaiki', 'WINCOR', '103211192735', 'good'),
('1750263469', 'CENTRAL POWER PACK USB FOR 280N', 'Bisa Diperbaiki', 'WINCOR', '103211188613', 'good'),
('1750211175', 'TPK-OPTERA 15 in 3mm Cap Sentuh w/ control', 'Tidak Bisa Diperbaiki', 'NCR', '103212176383', 'good'),
('1750211175', 'TPK-OPTERA 15 in 3mm Cap Sentuh w/ control', 'Tidak Bisa Diperbaiki', 'NCR', '103212174563', 'good'),
('1750187952', 'SPECIAL ELEKTRONIK 280', 'Bisa Diperbaiki', 'WINCOR', '103211293397', 'good'),
('1750187952', 'SPECIAL ELEKTRONIK 280', 'Bisa Diperbaiki', 'WINCOR', '103211191955', 'good'),
('1750187952', 'SPECIAL ELEKTRONIK 280', 'Bisa Diperbaiki', 'WINCOR', '103211309250', 'good'),
('1750235765', 'CPU BETTLE MINI 280', 'Bisa Diperbaiki', 'WINCOR', '103211287082', 'good'),
('1750235765', 'CPU BETTLE MINI 280', 'Bisa Diperbaiki', 'WINCOR', '103211309463', 'good'),
('1750235765', 'CPU BETTLE MINI 280', 'Bisa Diperbaiki', 'WINCOR', '103211205012', 'good'),
('1750235765', 'CPU BETTLE MINI 280', 'Bisa Diperbaiki', 'WINCOR', '103211301928', 'good'),
('1750235765', 'CPU BETTLE MINI 280', 'Bisa Diperbaiki', 'WINCOR', '103211219531', 'good'),
('1750073167', 'POWER DISTRIBUTOR 1500 (USB)', 'Bisa Diperbaiki', 'WINCOR', '103211284916', 'good'),
('1750073167', 'POWER DISTRIBUTOR 1500 (USB)', 'Bisa Diperbaiki', 'WINCOR', '103211244728', 'good'),
('1750073167', 'POWER DISTRIBUTOR 1500 (USB)', 'Bisa Diperbaiki', 'WINCOR', '103211235140', 'good'),
('1750073167', 'POWER DISTRIBUTOR 1500 (USB)', 'Bisa Diperbaiki', 'WINCOR', '103211198507', 'good'),
('1750073167', 'POWER DISTRIBUTOR 1500 (USB)', 'Bisa Diperbaiki', 'WINCOR', '103211284272', 'good'),
('1750130600', 'V-MODULE (CMD-CHASSIS NT ASSD. QUAD.)', 'Tidak Bisa Diperbaiki', 'WINCOR', '103221189913', 'good'),
('1750130600', 'V-MODULE (CMD-CHASSIS NT ASSD. QUAD.)', 'Tidak Bisa Diperbaiki', 'WINCOR', '103221312134', 'good'),
('HDSM500ST', 'HARDISK SMALL 500 GB', 'Tidak Bisa Diperbaiki', 'ALL', '163212318630', 'good'),
('1750130600', 'V-MODULE (CMD-CHASSIS NT ASSD. QUAD.)', 'Tidak Bisa Diperbaiki', 'WINCOR', '103221180281', 'good'),
('1750192235', 'Base Unit ASKIM  - II D (BASE UNIT ASKIM II DD)', 'Bisa Diperbaiki', 'WINCOR', '103211278768', 'good'),
('1750192235', 'Base Unit ASKIM  - II D (BASE UNIT ASKIM II DD)', 'Bisa Diperbaiki', 'WINCOR', '103211153642', 'good'),
('1750192235', 'Base Unit ASKIM  - II D (BASE UNIT ASKIM II DD)', 'Bisa Diperbaiki', 'WINCOR', '103211278769', 'good'),
('1750263073', 'SWAP PC 5G I3 P280N', 'Bisa Diperbaiki', 'WINCOR', '103211304735', 'good'),
('1750210306', 'USB 2.0 Hub 7-Port', 'Bisa Diperbaiki', 'WINCOR', '103211193164', 'good'),
('1750210306', 'USB 2.0 Hub 7-Port', 'Bisa Diperbaiki', 'WINCOR', '103211188537', 'good'),
('1750210306', 'USB 2.0 Hub 7-Port', 'Bisa Diperbaiki', 'WINCOR', '103211166918', 'good'),
('1750136159', 'CENTRAL POWER PACK USB', 'Bisa Diperbaiki', 'WINCOR', '103211146690', 'good'),
('1750136159', 'CENTRAL POWER PACK USB', 'Bisa Diperbaiki', 'WINCOR', '103211310841', 'good'),
('1750136159', 'CENTRAL POWER PACK USB', 'Bisa Diperbaiki', 'WINCOR', '103211310849', 'good'),
('1750136159', 'CENTRAL POWER PACK USB', 'Bisa Diperbaiki', 'WINCOR', '103211181951', 'good'),
('1750136159', 'CENTRAL POWER PACK USB', 'Bisa Diperbaiki', 'WINCOR', '103211307096', 'good'),
('1750136159', 'CENTRAL POWER PACK USB', 'Bisa Diperbaiki', 'WINCOR', '103211306934', 'good'),
('1750136159', 'CENTRAL POWER PACK USB', 'Bisa Diperbaiki', 'WINCOR', '103211237611', 'good'),
('1750136159', 'CENTRAL POWER PACK USB', 'Bisa Diperbaiki', 'WINCOR', '103211287838', 'good'),
('1750136159', 'CENTRAL POWER PACK USB', 'Bisa Diperbaiki', 'WINCOR', '103211219531', 'good'),
('7010000308', 'CDU 10 (STACKER) ', 'Bisa Diperbaiki', 'HYO', '133221042806', 'good'),
('1750078980', 'LCD 280', 'Bisa Diperbaiki', 'WINCOR', '103211287910', 'good'),
('1750078980', 'LCD 280', 'Bisa Diperbaiki', 'WINCOR', '103211241779', 'good'),
('1750078980                        ', 'LCD 280', 'Bisa Diperbaiki', 'WINCOR', '103211328497', 'good'),
('1750078980', 'LCD 280', 'Bisa Diperbaiki', 'WINCOR', '103211083027', 'good'),
('1750256248', 'RECEIPT PRINTER TP28', 'Bisa Diperbaiki', 'WINCOR', '103211289532', 'good'),
('7460000002', 'BOARD PNC', 'Bisa Diperbaiki', 'HYO', '1033011003216', 'good'),
('7460000002', 'BOARD PNC', 'Bisa Diperbaiki', 'HYO', '1033211139491', 'good'),
('7760000064', 'PCBA CDU 10 MAINBOARD ATAS', 'Bisa Diperbaiki', 'HYO', '1033211163178', 'good'),
('7760000064', 'PCBA CDU 10 MAINBOARD ATAS', 'Bisa Diperbaiki', 'HYO', '133211168988', 'good'),
('7760000064', 'PCBA CDU 10 MAINBOARD ATAS', 'Bisa Diperbaiki', 'HYO', '133221287576', 'good'),
('7760000065                ', 'BOARD PCBA FM (BOARD BAWAH)', 'Bisa Diperbaiki', 'HYO', '133221166919', 'good'),
('7760000065                ', 'BOARD PCBA FM (BOARD BAWAH)', 'Bisa Diperbaiki', 'HYO', '133221168957', 'good'),
('7760000065                ', 'BOARD PCBA FM (BOARD BAWAH)', 'Bisa Diperbaiki', 'HYO', '133221161905', 'good'),
('7020000046', 'RECEIPT PRINTER SPR 24 (TUNAI)', 'Bisa Diperbaiki', 'HYO', '133211281576', 'good'),
('7020000046', 'RECEIPT PRINTER SPR 24 (TUNAI)', 'Bisa Diperbaiki', 'HYO', '133211155947', 'good'),
('5661000110', 'LCD 15\" DS-5600', 'Bisa Diperbaiki', 'HYO', '133211180385', 'good'),
('5661000110', 'LCD 15\" DS-5600', 'Bisa Diperbaiki', 'HYO', '133211121317', 'good'),
('7010000308', 'CDU 10 (STACKER) ', 'Bisa Diperbaiki', 'HYO', '133221108893', 'good'),
('7010000308', 'CDU 10 (STACKER) ', 'Bisa Diperbaiki', 'HYO', '133021017439', 'good'),
('7010000308', 'CDU 10 (STACKER) ', 'Bisa Diperbaiki', 'HYO', '133221107275', 'good'),
('5611000203A', 'CE30 (MAINBOARD :G41M:MSI PC C2D)', 'Bisa Diperbaiki', 'HYO', '133111012774', 'good'),
('5621000036', 'POWER SUPPLY HPS280', 'Bisa Diperbaiki', 'HYO', '133211153936', 'good'),
('5621000036', 'POWER SUPPLY HPS280', 'Bisa Diperbaiki', 'HYO', '133211304581', 'good'),
('7130110100', 'EPP 8000K', 'Tidak Bisa Diperbaiki', 'HYO', '133212314071', 'good'),
('7430000301', 'THROAT_FR /EXIT SHUTTER', 'Bisa Diperbaiki', 'HYO', '133221142668', 'good'),
('7310000733', 'ASSY CARRIAGE (TANGAN ROBOT)', 'Bisa Diperbaiki', 'HYO', '133221073740', 'good'),
('7310000733', 'ASSY CARRIAGE (TANGAN ROBOT)', 'Bisa Diperbaiki', 'HYO', '133221141949', 'good'),
('1750109659                                        ', 'STACKER CMD', 'Bisa Diperbaiki', 'WINCOR', '103221302724', 'good'),
('7430000255', 'SEPARATOR LOWER 3-4', 'Bisa Diperbaiki', 'HYO', '133221048717', 'good'),
('7430000255', 'SEPARATOR LOWER 3-4', 'Bisa Diperbaiki', 'HYO', '133221072373', 'good'),
('7430000255', 'SEPARATOR LOWER 3-4', 'Bisa Diperbaiki', 'HYO', '133221250223', 'good'),
('7310000386', 'SEPARATOR UPPER 1-2', 'Bisa Diperbaiki', 'HYO', '133221157022', 'good'),
('7310000386', 'SEPARATOR UPPER 1-2', 'Bisa Diperbaiki', 'HYO', '133221281837', 'good'),
('7310000386', 'SEPARATOR UPPER 1-2', 'Bisa Diperbaiki', 'HYO', '133221156536', 'good'),
('7310000649', 'RACK CASSETTE HYOSUNG', 'Tidak Bisa Diperbaiki', 'HYO', '133221207332', 'good'),
('7310000725', 'ROTOR CARRIAGE', 'Bisa Diperbaiki', 'HYO', '133221199461', 'good'),
('1750109659', 'STACKER CMD', 'Bisa Diperbaiki', 'WINCOR', '103221326328', 'good'),
('1750105679', 'CONTROLLER CMD', 'Bisa Diperbaiki', 'WINCOR', '103221118781', 'good'),
('1750105679', 'CONTROLLER CMD', 'Bisa Diperbaiki', 'WINCOR', '103221309247', 'good'),
('1750105679', 'CONTROLLER CMD', 'Bisa Diperbaiki', 'WINCOR', '103221246755', 'good'),
('1750105679', 'CONTROLLER CMD', 'Bisa Diperbaiki', 'WINCOR', '103221316518', 'good'),
('1750105679', 'CONTROLLER CMD', 'Bisa Diperbaiki', 'WINCOR', '103221313797', 'good'),
('7430000301', 'THROAT_FR /EXIT SHUTTER', 'Bisa Diperbaiki', 'HYO', '133221050167', 'good'),
('ATMUSBK', 'ATMDESK USB KEY', 'Tidak Bisa Diperbaiki', 'NCR', '113213256269', 'good'),
('7430000301', 'THROAT_FR /EXIT SHUTTER', 'Bisa Diperbaiki', 'HYO', '133221065715', 'good'),
('7430000301', 'THROAT_FR /EXIT SHUTTER', 'Bisa Diperbaiki', 'HYO', '133221130503', 'good'),
('7430000301', 'THROAT_FR /EXIT SHUTTER', 'Bisa Diperbaiki', 'HYO', '133221163647', 'good'),
('7430000301', 'THROAT_FR /EXIT SHUTTER', 'Bisa Diperbaiki', 'HYO', '133221129899', 'good'),
('7430000301', 'THROAT_FR /EXIT SHUTTER', 'Bisa Diperbaiki', 'HYO', '133221188960', 'good'),
('5645000001', 'CARD READER SANKYO', 'Bisa Diperbaiki', 'HYO', '133221145271', 'good'),
('5645000001', 'CARD READER SANKYO', 'Bisa Diperbaiki', 'HYO', '133221139930', 'good'),
('5645000001', 'CARD READER SANKYO', 'Bisa Diperbaiki', 'HYO', '133211077111', 'good'),
('1750109615', 'DOUBLE EXTRACTOR UNIT CMD-V4', 'Bisa Diperbaiki', 'WINCOR', '103221327933', 'good'),
('1750220136', 'SHUTTER-LITE DC-MOTOR ASSY PC28X', 'Bisa Diperbaiki', 'WINCOR', '103221294269', 'good'),
('1750220136', 'SHUTTER-LITE DC-MOTOR ASSY PC28X', 'Bisa Diperbaiki', 'WINCOR', '103221321700', 'good'),
('1750220136', 'SHUTTER-LITE DC-MOTOR ASSY PC28X', 'Bisa Diperbaiki', 'WINCOR', '103221292312', 'good'),
('1750057875', 'TRANSPORT CMD V-4 HORIZONTAL FL 101 MM', 'Bisa Diperbaiki', 'WINCOR', '103221291193', 'good'),
('HDSM1TST', 'HARDISK SMALL 320 GB (update jadi 1 TB)', 'Tidak Bisa Diperbaiki', 'ALL                                            ', '163212312769', 'good'),
('5611000203BMB', 'MAINBOARD CE30 (MAINBOARD :G41M:AMI PC Ci3)', 'Tidak Bisa Diperbaiki', 'HYO', '133212329487', 'good'),
('1750233014', 'KEYBOARD J6.1 EPP IDN (EPP J6.1)', 'Tidak Bisa Diperbaiki', 'NCR', '103211303177', 'good'),
('1750233014', 'KEYBOARD J6.1 EPP IDN (EPP J6.1)', 'Tidak Bisa Diperbaiki', 'NCR', '103211311107', 'good'),
('1750233014', 'KEYBOARD J6.1 EPP IDN (EPP J6.1)', 'Tidak Bisa Diperbaiki', 'NCR', '103211292461', 'good'),
('1750199931', 'CARD READER CHD V2CU ACT VERSION', 'Bisa Diperbaiki', 'WINCOR', '103211279313', 'good'),
('1750109659', 'STACKER CMD', 'Bisa Diperbaiki', 'WINCOR', '103221270710', 'Good'),
('1750256248', 'RECEIPT PRINTER TP28', 'Bisa Diperbaiki', 'WINCOR', '103211323202', 'good'),
('1750109615', 'DOUBLE EXTRACTOR UNIT CMD-V4', 'Bisa Diperbaiki', 'WINCOR', '103221271414Â ', 'good'),
('1750256248', 'RECEIPT PRINTER TP28', 'Bisa Diperbaiki', 'WINCOR', '103211305777', 'good'),
('1750256248', 'RECEIPT PRINTER TP28', 'Bisa Diperbaiki', 'WINCOR', '103211176423', 'good'),
('1750256248', 'RECEIPT PRINTER TP28', 'Bisa Diperbaiki', 'WINCOR', '103211187614', 'good'),
('1750256248', 'RECEIPT PRINTER TP28', 'Bisa Diperbaiki', 'WINCOR', '103211248613', 'good'),
('1750189334', 'PRINTER TP13 280', 'Bisa Diperbaiki', 'WINCOR', '103211190039', 'good'),
('1750189334', 'PRINTER TP13 280', 'Bisa Diperbaiki', 'WINCOR', '103211215271', 'good'),
('1750189334', 'PRINTER TP13 280', 'Bisa Diperbaiki', 'WINCOR', '103211224311', 'good'),
('1750159341', 'EPP V6 INTERNATIONAL', 'Tidak Bisa Diperbaiki', 'WINCOR', '103211282276', 'good'),
('1750159341', 'EPP V6 INTERNATIONAL', 'Tidak Bisa Diperbaiki', 'WINCOR', '103211292911', 'good'),
('1750256248', 'RECEIPT PRINTER TP28', 'Bisa Diperbaiki', 'WINCOR', '103211289532', 'good'),
('1750159341', 'EPP V6 INTERNATIONAL', 'Tidak Bisa Diperbaiki', 'WINCOR', '103211233643', 'good'),
('7010000308', 'CDU 10 (STACKER) ', 'Bisa Diperbaiki', 'HYO', '133221165123', 'good'),
('1750220136', 'SHUTTER-LITE DC-MOTOR ASSY PC28X', 'Bisa Diperbaiki', 'WINCOR', '103221229352 ', 'good'),
('1750173205', 'CARD READER CHD V2CU STANDARD (NO CONTRACT)', 'Bisa Diperbaiki', 'WINCOR', '103211309387', 'good'),
('4450724941', 'PRESENTER NCR 22E', 'Bisa Diperbaiki', 'NCR', '113221159776', 'good'),
('1750220136', 'SHUTTER-LITE DC-MOTOR ASSY PC28X', 'Bisa Diperbaiki', 'WINCOR', '103221312112', 'good'),
('1750109615', 'DOUBLE EXTRACTOR UNIT CMD-V4', 'Bisa Diperbaiki', 'WINCOR', '103221322715', 'good'),
('5645000001', 'CARD READER SANKYO', 'Bisa Diperbaiki', 'HYO', '133211196261', 'good'),
('1750109659', 'STACKER CMD', 'Bisa Diperbaiki', 'WINCOR', '103221310129', 'good'),
('1750109659', 'STACKER CMD', 'Bisa Diperbaiki', 'WINCOR', '103221234818', 'good'),
('1750109659', 'STACKER CMD', 'Bisa Diperbaiki', 'WINCOR', '103221235574', 'good'),
('1750173205', 'CARD READER CHD V2CU STANDARD (NO CONTRACT)', 'Bisa Diperbaiki', 'WINCOR', '103211198028 ', 'good'),
('1750109659', 'STACKER CMD', 'Bisa Diperbaiki', 'WINCOR', '103221195429', 'good'),
('1750109659', 'STACKER CMD', 'Bisa Diperbaiki', 'WINCOR', '103221289052', 'good'),
('1750109641', 'DOUBLE EXTRACTOR UNIT MDMS CMD-V4', 'Bisa Diperbaiki', 'WINCOR', '103221309248', 'good'),
('1750109641', 'DOUBLE EXTRACTOR UNIT MDMS CMD-V4', 'Bisa Diperbaiki', 'WINCOR', '103221316961', 'good'),
('4450724941                                        ', 'PRESENTER NCR 22E                                            ', 'Bisa Diperbaiki                                   ', 'NCR                                            ', '113221210753', 'bad'),
('1750078980', 'LCD 280', 'Bisa Diperbaiki', 'WINCOR', '103211103871', 'good'),
('1750109641', 'DOUBLE EXTRACTOR UNIT MDMS CMD-V4', 'Bisa Diperbaiki', 'WINCOR', '103221265332', 'good'),
('1750109641', 'DOUBLE EXTRACTOR UNIT MDMS CMD-V4', 'Bisa Diperbaiki', 'WINCOR', '103221324826', 'good'),
('1750109615', 'DOUBLE EXTRACTOR UNIT CMD-V4', 'Bisa Diperbaiki', 'WINCOR', '103221206265', 'good'),
('1750109641', 'DOUBLE EXTRACTOR UNIT MDMS CMD-V4', 'Bisa Diperbaiki', 'WINCOR', '103221324454', 'good'),
('1750109641', 'DOUBLE EXTRACTOR UNIT MDMS CMD-V4', 'Bisa Diperbaiki', 'WINCOR', '103221233312', 'good'),
('1750189334', 'PRINTER TP13 280', 'Bisa Diperbaiki', 'WINCOR', '103211272370', 'good'),
('1750109615', 'DOUBLE EXTRACTOR UNIT CMD-V4', 'Bisa Diperbaiki', 'WINCOR', '103221200024', 'good'),
('1750220136', 'SHUTTER-LITE DC-MOTOR ASSY PC28X', 'Bisa Diperbaiki', 'WINCOR', '103221275284', 'good'),
('1750159341', 'EPP V6 INTERNATIONAL', 'Tidak Bisa Diperbaiki', 'WINCOR', '103211302925', 'good'),
('1750189334', 'PRINTER TP13 280', 'Bisa Diperbaiki', 'WINCOR', '103211246566', 'good'),
('1750189334', 'PRINTER TP13 280', 'Bisa Diperbaiki', 'WINCOR', '103211328088', 'good'),
('1750159341', 'EPP V6 INTERNATIONAL', 'Tidak Bisa Diperbaiki', 'WINCOR', '103211323975', 'good'),
('1750109615', 'DOUBLE EXTRACTOR UNIT CMD-V4', 'Bisa Diperbaiki', 'WINCOR', '103221320823', 'good'),
('1750109615', 'DOUBLE EXTRACTOR UNIT CMD-V4', 'Bisa Diperbaiki', 'WINCOR', '103221266450', 'good'),
('1750199931                                        ', 'CARD READER CHD V2CU ACT VERSION                                            ', 'Bisa Diperbaiki                                   ', 'WINCOR                                            ', '103211330375', 'good'),
('1750078980', 'LCD 280', 'Bisa Diperbaiki', 'WINCOR', '103211328213', 'good'),
('4450671759', 'PICK MODULE ARIA', 'Bisa Diperbaiki', 'NCR', '113221330173', 'good'),
('1750109659', 'STACKER CMD', 'Bisa Diperbaiki', 'WINCOR', '103221123124', 'good'),
('SCR-1K', 'UPS EDCON SCR-01 1KVA', 'Bisa Diperbaiki', 'ALL', '163231192923', 'good'),
('1750263073', 'SWAP PC 5G I3 P280N', 'Bisa Diperbaiki', 'WINCOR', '103211325286', 'good');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sp_btl`
--

CREATE TABLE `sp_btl` (
  `part_number` varchar(50) NOT NULL,
  `nama_sparepart` varchar(255) NOT NULL,
  `jenis_sparepart` varchar(100) NOT NULL,
  `atm` varchar(50) NOT NULL,
  `barcode` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `sp_btl`
--

INSERT INTO `sp_btl` (`part_number`, `nama_sparepart`, `jenis_sparepart`, `atm`, `barcode`, `status`) VALUES
('1750105679                                        ', 'CONTROLLER CMD                                            ', 'Bisa Diperbaiki                                            ', 'WINCOR                                            ', '103221209979', 'good'),
('1750199931', 'CARD READER CHD V2CU ACT VERSION', 'Bisa Diperbaiki', 'WINCOR', '103211299714', 'good'),
('1750189334                                        ', 'PRINTER TP13 280                                            ', 'Bisa Diperbaiki                                            ', 'WINCOR                                            ', '103211255704', 'bad');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sp_mth`
--

CREATE TABLE `sp_mth` (
  `part_number` varchar(50) NOT NULL,
  `nama_sparepart` varchar(100) NOT NULL,
  `jenis_sparepart` varchar(50) NOT NULL,
  `atm` varchar(50) NOT NULL,
  `barcode` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `sp_mth`
--

INSERT INTO `sp_mth` (`part_number`, `nama_sparepart`, `jenis_sparepart`, `atm`, `barcode`, `status`) VALUES
('1750057875', 'TRANSPORT CMD V-4 HORIZONTAL FL 101 MM', 'Bisa Diperbaiki', 'WINCOR', '103221291193', 'good'),
('1750109641                        ', 'DOUBLE EXTRACTOR UNIT MDMS CMD-V4', 'Bisa Diperbaiki', 'WINCOR', '103221285800', 'bad'),
('4450728233B', 'KINGSWAY MB INTEL GL40 WITH SATA X3 SS22E PC Ci3', 'Bisa Diperbaiki', 'NCR', '113211180564', 'good'),
('4450671759', 'PICK MODULE ARIA', 'Bisa Diperbaiki', 'NCR', '113221312431', 'good'),
('90025345', 'RECEIPT PRINTER SS22E', 'Bisa Diperbaiki', 'NCR', '113211198319', 'good'),
('4450718416', 'S1 DISPENSER CONTROL BOARD SS22E', 'Bisa Diperbaiki', 'NCR', '113221169482', 'good'),
('4450724941', 'PRESENTER NCR 22E', 'Bisa Diperbaiki', 'NCR', '113221207789', 'good'),
('4450735609', 'EPP SS22E', 'Tidak Bisa Diperbaiki', 'NCR', '113212206951', 'good'),
('4450704484', 'CARD READER NCR ss22E', 'Bisa Diperbaiki', 'NCR', '113211157890', 'good'),
('1750136159', 'CENTRAL POWER PACK USB', 'Bisa Diperbaiki', 'WINCOR', '103211191590', 'good'),
('1750105679', 'CONTROLLER CMD', 'Bisa Diperbaiki', 'WINCOR', '103221109277', 'good'),
('1750109659', 'STACKER CMD', 'Bisa Diperbaiki', 'WINCOR', '103221217517', 'good'),
('1750109615', 'DOUBLE EXTRACTOR UNIT CMD-V4', 'Bisa Diperbaiki', 'WINCOR', '103221192495', 'good'),
('1750256248', 'RECEIPT PRINTER TP28', 'Bisa Diperbaiki', 'WINCOR', '103211292289', 'good'),
('1750220136', 'SHUTTER-LITE DC-MOTOR ASSY PC28X', 'Bisa Diperbaiki', 'WINCOR', '103221309065', 'good'),
('1750256248', 'RECEIPT PRINTER TP28', 'Bisa Diperbaiki', 'WINCOR', '97GG645794', 'bad'),
('1750256248', 'RECEIPT PRINTER TP28', 'Bisa Diperbaiki', 'WINCOR', '97GG645794', 'bad');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sp_pkb`
--

CREATE TABLE `sp_pkb` (
  `part_number` varchar(50) NOT NULL,
  `nama_sparepart` varchar(100) NOT NULL,
  `jenis_sparepart` varchar(50) NOT NULL,
  `atm` varchar(50) NOT NULL,
  `barcode` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `sp_pkb`
--

INSERT INTO `sp_pkb` (`part_number`, `nama_sparepart`, `jenis_sparepart`, `atm`, `barcode`, `status`) VALUES
('1750044878', 'Distributor Board 4X With Cover', 'Bisa Diperbaiki', 'WINCOR', '103221258865', 'good'),
('1750109615', 'DOUBLE EXTRACTOR UNIT CMD-V4', 'Bisa Diperbaiki', 'WINCOR', '103221310861', 'good'),
('1750190038 ', 'SOFTKEY FRAME 15 INCH DDC-NDC BR PC28X', 'Bisa Diperbaiki', 'WINCOR', '103211287911', 'good'),
('1750187952', 'SPECIAL ELEKTRONIK 280', 'Bisa Diperbaiki', 'WINCOR', '103211238723 ', 'good'),
('1750189334', 'PRINTER TP13 280', 'Bisa Diperbaiki', 'WINCOR', '103211077773', 'good'),
('1750220136', 'SHUTTER-LITE DC-MOTOR ASSY PC28X', 'Bisa Diperbaiki', 'WINCOR', '103221312428', 'good'),
('1750256248', 'RECEIPT PRINTER TP28', 'Bisa Diperbaiki', 'WINCOR', '103211275658 ', 'good'),
('1750105679', 'CONTROLLER CMD', 'Bisa Diperbaiki', 'WINCOR', '103221251773', 'good'),
('1750136159', 'CENTRAL POWER PACK USB', 'Bisa Diperbaiki', 'WINCOR', '103211207578', 'good'),
('1750109641', 'DOUBLE EXTRACTOR UNIT MDMS CMD-V4', 'Bisa Diperbaiki', 'WINCOR', '103221329336', 'good'),
('1750109659', 'STACKER CMD', 'Bisa Diperbaiki', 'WINCOR', '103221275492', 'good');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sp_plk`
--

CREATE TABLE `sp_plk` (
  `part_number` varchar(50) NOT NULL,
  `nama_sparepart` varchar(100) NOT NULL,
  `jenis_sparepart` varchar(50) NOT NULL,
  `atm` varchar(50) NOT NULL,
  `barcode` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `sp_plk`
--

INSERT INTO `sp_plk` (`part_number`, `nama_sparepart`, `jenis_sparepart`, `atm`, `barcode`, `status`) VALUES
('1750199931', 'CARD READER CHD V2CU ACT VERSION', 'Bisa Diperbaiki', 'WINCOR', '00570265634 ', 'bad'),
('1750173205', 'CARD READER CHD V2CU STANDARD (NO CONTRACT)', 'Bisa Diperbaiki', 'WINCOR', '004Y017748 ', 'bad'),
('1750262934', 'LC 15\" OPENFRAME PROCASH 280N', 'Bisa Diperbaiki', 'WINCOR', '103211264887', 'good'),
('1750136159 ', 'CENTRAL POWER PACK USB', 'Bisa Diperbaiki', 'WINCOR', '103211174541', 'good'),
('1750235765                                        ', 'CPU BETTLE MINI 280                                            ', 'Bisa Diperbaiki                                   ', 'WINCOR                                            ', '103211210683', 'bad'),
('1750078980                                        ', 'LCD 280                                            ', 'Bisa Diperbaiki                                   ', 'WINCOR                                            ', '103211103871', 'bad'),
('1750189334                                        ', 'PRINTER TP13 280                                            ', 'Bisa Diperbaiki                                   ', 'WINCOR                                            ', '103211236083', 'bad'),
('1750189334                                        ', 'PRINTER TP13 280                                            ', 'Bisa Diperbaiki                                   ', 'WINCOR                                            ', '5460064942', 'bad'),
('1750220136                                        ', 'SHUTTER-LITE DC-MOTOR ASSY PC28X                                            ', 'Bisa Diperbaiki                                   ', 'WINCOR                                            ', '8200112722', 'bad'),
('1750078980                                        ', 'LCD 280                                            ', 'Bisa Diperbaiki                                   ', 'WINCOR                                            ', '103211210493', 'bad'),
('1750220136', 'SHUTTER-LITE DC-MOTOR ASSY PC28X', 'Bisa Diperbaiki', 'WINCOR', '103221248224', 'good'),
('1750130600', 'V-MODULE (CMD-CHASSIS NT ASSD. QUAD.)', 'Tidak Bisa Diperbaiki', 'WINCOR', '103221329452', 'good'),
('1750210306', 'USB 2.0 Hub 7-Port', 'Bisa Diperbaiki', 'WINCOR', '103211246079', 'good'),
('1750057875', 'TRANSPORT CMD V-4 HORIZONTAL FL 101 MM', 'Bisa Diperbaiki', 'WINCOR', '103221197614', 'good'),
('1750187952', 'SPECIAL ELEKTRONIK 280', 'Bisa Diperbaiki', 'WINCOR', '103211310434', 'good'),
('1750190038', 'SOFTKEY FRAME 15 INCH DDC-NDC BR PC28X', 'Bisa Diperbaiki', 'WINCOR', '103211206004', 'good'),
('1750256248', 'RECEIPT PRINTER TP28', 'Bisa Diperbaiki', 'WINCOR', '103211217004', 'good'),
('1750256248', 'RECEIPT PRINTER TP28', 'Bisa Diperbaiki', 'WINCOR', '103211217004', 'good'),
('1750073167', 'POWER DISTRIBUTOR 1500 (USB)', 'Bisa Diperbaiki', 'WINCOR', '103211125224', 'good'),
('1750233014', 'KEYBOARD J6.1 EPP IDN (EPP J6.1)', 'Tidak Bisa Diperbaiki', 'NCR', '103211303174', 'good'),
('1750109641', 'DOUBLE EXTRACTOR UNIT MDMS CMD-V4', 'Bisa Diperbaiki', 'WINCOR', '103221220089', 'good'),
('1750109641', 'DOUBLE EXTRACTOR UNIT MDMS CMD-V4', 'Bisa Diperbaiki', 'WINCOR', '103221326177', 'good'),
('1750109641', 'DOUBLE EXTRACTOR UNIT MDMS CMD-V4', 'Bisa Diperbaiki', 'WINCOR', '103021012028', 'good'),
('1750109615', 'DOUBLE EXTRACTOR UNIT CMD-V4', 'Bisa Diperbaiki', 'WINCOR', '103221326927', 'good'),
('1750109615', 'DOUBLE EXTRACTOR UNIT CMD-V4', 'Bisa Diperbaiki', 'WINCOR', '103221323942', 'good'),
('1750044878', 'Distributor Board 4X With Cover', 'Bisa Diperbaiki', 'WINCOR', '103221327539', 'good'),
('1750109659', 'STACKER CMD', 'Bisa Diperbaiki', 'WINCOR', '103221328230', 'good'),
('1750105679', 'CONTROLLER CMD', 'Bisa Diperbaiki', 'WINCOR', '103221302031', 'good'),
('1750263469', 'CENTRAL POWER PACK USB FOR 280N', 'Bisa Diperbaiki', 'WINCOR', '103211220294', 'good'),
('1750199931', 'CARD READER CHD V2CU ACT VERSION', 'Bisa Diperbaiki', 'WINCOR', '103211275477', 'good'),
('1750173205', 'CARD READER CHD V2CU STANDARD (NO CONTRACT)', 'Bisa Diperbaiki', 'WINCOR', '103211328052', 'good'),
('1750199931', 'CARD READER CHD V2CU ACT VERSION', 'Bisa Diperbaiki', 'WINCOR', '103211258785', 'good'),
('1750192235', 'Base Unit ASKIM  - II D (BASE UNIT ASKIM II DD)', 'Bisa Diperbaiki', 'WINCOR', '103211325335', 'good'),
('7310000386', 'SEPARATOR UPPER 1-2', 'Bisa Diperbaiki', 'HYO', '133221229831', 'good'),
('7430000255', 'SEPARATOR LOWER 3-4', 'Bisa Diperbaiki', 'HYO', '133221166933', 'good'),
('7310000725', 'ROTOR CARRIAGE', 'Bisa Diperbaiki', 'HYO', '133221275402', 'good'),
('7010000308', 'CDU 10 (STACKER) ', 'Bisa Diperbaiki', 'HYO', '133221293802', 'good'),
('CDLGST', 'CDRW LARGE SATA', 'Tidak Bisa Diperbaiki', 'ALL', '163212202189', 'good'),
('HDLG500ST', 'HARDISK LARGE 500 GB', 'Tidak Bisa Diperbaiki', 'ALL', '163222246078', 'good');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sp_spt`
--

CREATE TABLE `sp_spt` (
  `part_number` varchar(50) NOT NULL,
  `nama_sparepart` varchar(100) NOT NULL,
  `jenis_sparepart` varchar(50) NOT NULL,
  `atm` varchar(50) NOT NULL,
  `barcode` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `sp_spt`
--

INSERT INTO `sp_spt` (`part_number`, `nama_sparepart`, `jenis_sparepart`, `atm`, `barcode`, `status`) VALUES
('1750109615', 'DOUBLE EXTRACTOR UNIT CMD-V4', 'Bisa Diperbaiki', 'WINCOR', '103221272371', 'good'),
('1750044878 ', 'Distributor Board 4X With Cover', 'Bisa Diperbaiki', 'WINCOR', '103211102959 ', 'good'),
('1750073167 ', 'POWER DISTRIBUTOR 1500 (USB)', 'Bisa Diperbaiki', 'WINCOR', '103211248485 ', 'good'),
('1750235765', 'CPU BETTLE MINI 280', 'Bisa Diperbaiki', 'WINCOR', '103211244726', 'good'),
('1750256248', 'RECEIPT PRINTER TP28', 'Bisa Diperbaiki', 'WINCOR', '103211269659', 'good'),
('1750105679 ', 'CONTROLLER CMD', 'Bisa Diperbaiki', 'WINCOR', '103221251833', 'good'),
('1750109641', 'DOUBLE EXTRACTOR UNIT MDMS CMD-V4', 'Bisa Diperbaiki', 'WINCOR', '103221109295', 'good'),
('1750159341 ', 'EPP V6 INTERNATIONAL', 'Tidak Bisa Diperbaiki', 'WINCOR', '103211302925 ', 'good'),
('1750190038 ', 'SOFTKEY FRAME 15 INCH DDC-NDC BR PC28X', 'Bisa Diperbaiki', 'WINCOR', '103211186485 ', 'good'),
('1750173205	', 'CARD READER CHD V2CU STANDARD (NO CONTRACT)', 'Bisa Diperbaiki', 'WINCOR', '103211198028 ', 'good'),
('1750199931', 'CARD READER CHD V2CU ACT VERSION', 'Bisa Diperbaiki', 'WINCOR', '103211323965', 'good'),
('1750136159', 'CENTRAL POWER PACK USB', 'Bisa Diperbaiki', 'WINCOR', '103211199680', 'good'),
('1750220136', 'SHUTTER-LITE DC-MOTOR ASSY PC28X', 'Bisa Diperbaiki', 'WINCOR', '103221325580', 'good'),
('1750220136', 'SHUTTER-LITE DC-MOTOR ASSY PC28X', 'Bisa Diperbaiki', 'WINCOR', '103221248224', 'good'),
('1750109615', 'DOUBLE EXTRACTOR UNIT CMD-V4', 'Bisa Diperbaiki', 'WINCOR', '103221322796', 'good'),
('1750109641', 'DOUBLE EXTRACTOR UNIT MDMS CMD-V4', 'Bisa Diperbaiki', 'WINCOR', '103221293681', 'good'),
('1750109659', 'STACKER CMD', 'Bisa Diperbaiki', 'WINCOR', '103221302724', 'good');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sp_tjg`
--

CREATE TABLE `sp_tjg` (
  `part_number` varchar(50) NOT NULL,
  `nama_sparepart` varchar(100) NOT NULL,
  `jenis_sparepart` varchar(50) NOT NULL,
  `atm` varchar(50) NOT NULL,
  `barcode` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `sp_tjg`
--

INSERT INTO `sp_tjg` (`part_number`, `nama_sparepart`, `jenis_sparepart`, `atm`, `barcode`, `status`) VALUES
('1750044878', 'Distributor Board 4X With Cover', 'Bisa Diperbaiki', 'WINCOR', '103221197954', 'good'),
('4450735609', 'EPP SS22E', 'Tidak Bisa Diperbaiki', 'NCR', '113212199047', 'good'),
('4450689219', 'PICK I/F DOUBLE (DOUBLE PICK I/F CONTROL BOARD - ASSY)', 'Bisa Diperbaiki', 'NCR', '113221180846', 'good'),
('4450718416', 'S1 DISPENSER CONTROL BOARD SS22E', 'Bisa Diperbaiki', 'NCR', '113221203896', 'good'),
('1750256248', 'RECEIPT PRINTER TP28', 'Bisa Diperbaiki', 'WINCOR', '103211238069', 'good'),
('1750263073', 'SWAP PC 5G I3 P280N', 'Bisa Diperbaiki', 'WINCOR', '103211239632', 'good'),
('1750109641                                        ', 'DOUBLE EXTRACTOR UNIT MDMS CMD-V4                                            ', 'Bisa Diperbaiki                                   ', 'WINCOR                                            ', 'A206082735', 'bad'),
('1750109641', 'DOUBLE EXTRACTOR UNIT MDMS CMD-V4', 'Bisa Diperbaiki', 'WINCOR', '103221220090', 'good'),
('1750173205                                        ', 'CARD READER CHD V2CU STANDARD (NO CONTRACT)                                            ', 'Bisa Diperbaiki                                   ', 'WINCOR                                            ', '0047012969', 'bad'),
('4450671759', 'PICK MODULE ARIA', 'Bisa Diperbaiki', 'NCR', '1132211327049', 'good'),
('4450724941', 'PRESENTER NCR 22E', 'Bisa Diperbaiki', 'NCR', '113221174967', 'good'),
('1750159341', 'EPP V6 INTERNATIONAL', 'Tidak Bisa Diperbaiki', 'WINCOR', '103211310486', 'good');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` varchar(10) NOT NULL,
  `nama_lengkap` varchar(225) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama_lengkap`, `username`, `password`) VALUES
('USR001', 'Eka', 'admin', '0192023a7bbd73250516f069df18b500'),
('USR002', 'Muhammad Nahyyij Husaibi', 'J95604', '699385595cb27034e6dc622cf45eda5e'),
('USR003', 'Prahara Bayu Kusuma', 'J95605', '2eb125d12ff5637158e6ff5408e3716a'),
('USR004', 'Sulis Setiawan', 'J95606', 'c29ae4a2c96ffc23f885e469f57401ea'),
('USR005', 'M.Hafiz Anshari', 'J95607', 'ce0ec144a24d9bddb761c9d8b436e1c5'),
('USR006', 'Yusril Mahendra ', 'J95608', '9bbb46cfe2bb2e4557d8a143ddcb080e'),
('USR007', 'Adriann', 'J95602', 'd2ba4adf3352e0bf1c385e8f7cf1f7ef'),
('USR008', 'Muhammad Zaqi Habibie', 'J95603', '22e951525c0a8d55c4167408b6eacb81'),
('USR009', 'Aidi Ramadhani', 'J95609', 'f0e5b262d57a213565fb0ff137ecd639'),
('USR010', 'Rizky', 'J95610', '6cc9c8b3d2b9e451c41c5b6d505b6ca4'),
('USR011', 'Muhammad Ikhsan', 'J95611', '4b55d18b42928b1dd85043377474e3da'),
('USR012', 'Workshop', 'J95612', '2cf8ca1d83d481496d1815ef2dc882ad'),
('USR013', 'Said Humaidi', 'J95613', 'e428d009f4094d815e046a863c9aa497'),
('USR014', 'Ikhwan Maulana', 'J95614', '956c44aad8c885f782a433ed144e948a');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `master_atm`
--
ALTER TABLE `master_atm`
  ADD PRIMARY KEY (`id_atm`);

--
-- Indeks untuk tabel `sparepart`
--
ALTER TABLE `sparepart`
  ADD PRIMARY KEY (`part_number`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
