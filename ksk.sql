-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.8 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table kartu_sehat_kendaraan.kendaraan
CREATE TABLE IF NOT EXISTS `kendaraan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) NOT NULL,
  `nopol` varchar(50) NOT NULL,
  `tipe` varchar(10) NOT NULL,
  `nomes` varchar(50) NOT NULL,
  `nocha` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL,
  `user_create` varchar(50) NOT NULL,
  `date_create` datetime NOT NULL,
  `user_update` varchar(50) NOT NULL,
  `date_update` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table kartu_sehat_kendaraan.kendaraan: ~3 rows (approximately)
/*!40000 ALTER TABLE `kendaraan` DISABLE KEYS */;
INSERT INTO `kendaraan` (`id`, `kode`, `nopol`, `tipe`, `nomes`, `nocha`, `status`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
	(1, 'K003', 'F 1234 WR', 'P', '2322212332', '1223321', 'OFF', 'damz', '2015-10-31 14:34:32', 'damz', '2015-11-27 23:28:46'),
	(2, 'K002', 'F 3434 WF', 'D', '3444434434', '3233233', 'ON', 'damz', '2015-10-31 14:36:30', 'damz', '2015-11-27 23:26:35'),
	(3, 'K001', 'F 1111 WB', 'A', '2343423434', '3343423', 'ON', 'damz', '2015-11-22 09:37:24', 'damz', '2015-11-27 23:26:28');
/*!40000 ALTER TABLE `kendaraan` ENABLE KEYS */;


-- Dumping structure for table kartu_sehat_kendaraan.kendaraan_status
CREATE TABLE IF NOT EXISTS `kendaraan_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `user_create` varchar(50) NOT NULL,
  `date_create` datetime NOT NULL,
  `user_update` varchar(50) NOT NULL,
  `date_update` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table kartu_sehat_kendaraan.kendaraan_status: ~2 rows (approximately)
/*!40000 ALTER TABLE `kendaraan_status` DISABLE KEYS */;
INSERT INTO `kendaraan_status` (`id`, `kode`, `nama`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
	(1, 'ON', 'Digunakan/Aktif', '', '2015-10-31 14:00:03', '', '0000-00-00 00:00:00'),
	(2, 'OFF', 'Rusak/Tidak Aktif', '', '2015-10-31 14:00:03', '', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `kendaraan_status` ENABLE KEYS */;


-- Dumping structure for table kartu_sehat_kendaraan.kendaraan_tipe
CREATE TABLE IF NOT EXISTS `kendaraan_tipe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `user_create` varchar(50) NOT NULL,
  `date_create` datetime NOT NULL,
  `user_update` varchar(50) NOT NULL,
  `date_update` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table kartu_sehat_kendaraan.kendaraan_tipe: ~4 rows (approximately)
/*!40000 ALTER TABLE `kendaraan_tipe` DISABLE KEYS */;
INSERT INTO `kendaraan_tipe` (`id`, `kode`, `nama`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
	(1, 'A', 'ARM ROLL', '', '2015-10-31 13:59:19', 'damz', '2015-11-27 23:11:03'),
	(2, 'D', 'DUMP TRUCK', '', '2015-10-31 13:59:19', 'damz', '2015-11-27 23:10:57'),
	(3, 'P', 'PICK UP', '', '2015-10-31 13:59:19', 'damz', '2015-11-27 23:10:51'),
	(4, 'S', 'SUV / STASION WAGON', '', '2015-10-31 13:59:19', 'damz', '2015-11-27 23:10:44');
/*!40000 ALTER TABLE `kendaraan_tipe` ENABLE KEYS */;


-- Dumping structure for table kartu_sehat_kendaraan.komponen
CREATE TABLE IF NOT EXISTS `komponen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `group` varchar(10) NOT NULL,
  `harga` int(11) NOT NULL,
  `satuan` varchar(10) NOT NULL,
  `user_create` varchar(50) NOT NULL,
  `date_create` datetime NOT NULL,
  `user_update` varchar(50) NOT NULL,
  `date_update` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

-- Dumping data for table kartu_sehat_kendaraan.komponen: ~28 rows (approximately)
/*!40000 ALTER TABLE `komponen` DISABLE KEYS */;
INSERT INTO `komponen` (`id`, `kode`, `nama`, `group`, `harga`, `satuan`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
	(1, 'KOM-1', 'Celah Katup', 'G1', 0, 'U', 'damz', '2015-10-31 15:17:14', 'damz', '2015-11-22 13:38:46'),
	(2, 'KOM-2', 'Tali Kipas', 'G1', 0, 'U', 'damz', '2015-10-31 15:18:08', 'damz', '2015-11-22 13:38:38'),
	(3, 'KOM-3', 'Olie Mesin', 'G1', 0, 'L', 'damz', '2015-10-31 15:18:14', 'damz', '2015-10-31 16:25:32'),
	(4, 'KOM-4', 'Olie Gardan', 'G1', 0, 'L', 'damz', '2015-10-31 15:18:21', 'damz', '2015-10-31 16:25:36'),
	(5, 'KOM-5', 'Olie Transimisi', 'G1', 0, 'L', 'damz', '2015-10-31 15:18:29', 'damz', '2015-10-31 16:25:40'),
	(6, 'KOM-6', 'Olie Hidrouliq', 'G1', 0, 'L', 'damz', '2015-10-31 15:18:48', 'damz', '2015-10-31 16:25:44'),
	(7, 'KOM-7', 'Filter Olie', 'G1', 0, 'U', 'damz', '2015-10-31 15:19:18', 'damz', '2015-10-31 16:25:57'),
	(8, 'KOM-8', 'Baterai / Accu', 'G1', 0, 'L', 'damz', '2015-10-31 15:19:28', 'damz', '2015-10-31 16:26:16'),
	(9, 'KOM-9', 'Filter Bahan Bakar', 'G2', 0, 'U', 'damz', '2015-10-31 15:19:40', 'damz', '2015-10-31 16:27:11'),
	(10, 'KOM-10', 'Pompa Bahan Bakar', 'G2', 0, 'U', 'damz', '2015-10-31 15:19:47', 'damz', '2015-10-31 16:27:17'),
	(11, 'KOM-11', 'Saringan Udara', 'G2', 0, 'U', 'damz', '2015-10-31 15:20:24', 'damz', '2015-10-31 16:27:33'),
	(12, 'KOM-12', 'Kanvas Rem Ka/Ki *', 'G3', 0, 'U', 'damz', '2015-10-31 15:21:14', 'damz', '2015-10-31 15:28:15'),
	(13, 'KOM-13', 'Minyak Rem', 'G3', 0, 'L', 'damz', '2015-10-31 15:28:44', '', '0000-00-00 00:00:00'),
	(14, 'KOM-14', 'Selang dan Pipa Saluran Minyak Rem', 'G3', 0, 'U', 'damz', '2015-10-31 15:29:02', '', '0000-00-00 00:00:00'),
	(15, 'KOM-15', 'Karet Master Silinder dan wheel silinder sistem rem', 'G3', 0, 'U', 'damz', '2015-10-31 15:29:26', '', '0000-00-00 00:00:00'),
	(16, 'KOM-16', 'Kopling', 'G3', 0, 'U', 'damz', '2015-10-31 15:29:32', '', '0000-00-00 00:00:00'),
	(17, 'KOM-17', 'Minyak Kopling', 'G3', 0, 'L', 'damz', '2015-10-31 15:29:43', '', '0000-00-00 00:00:00'),
	(18, 'KOM-18', 'Ball Joint', 'G3', 0, 'U', 'damz', '2015-10-31 15:29:56', '', '0000-00-00 00:00:00'),
	(19, 'KOM-19', 'Lampu Depan Ka / Ki *', 'G3', 0, 'U', 'damz', '2015-10-31 15:30:05', '', '0000-00-00 00:00:00'),
	(20, 'KOM-20', 'Lampu Sein Depan Ka / Ki *', 'G3', 0, 'U', 'damz', '2015-10-31 15:30:18', '', '0000-00-00 00:00:00'),
	(21, 'KOM-21', 'Lampu mundur', 'G3', 0, 'U', 'damz', '2015-10-31 15:30:27', '', '0000-00-00 00:00:00'),
	(22, 'KOM-22', 'Lampu Sein Belakang Ka / Ki *', 'G3', 0, 'U', 'damz', '2015-10-31 15:30:39', '', '0000-00-00 00:00:00'),
	(23, 'KOM-23', 'Lampu Rem Ka / Ki *', 'G3', 0, 'U', 'damz', '2015-10-31 15:30:47', '', '0000-00-00 00:00:00'),
	(24, 'KOM-24', 'Lampu Malam Belakang Ka / Ki *', 'G3', 0, 'U', 'damz', '2015-10-31 15:30:57', '', '0000-00-00 00:00:00'),
	(25, 'KOM-25', 'Ban Luar', 'G3', 0, 'U', 'damz', '2015-10-31 15:31:05', '', '0000-00-00 00:00:00'),
	(26, 'KOM-26', 'Ban Dalam', 'G3', 0, 'U', 'damz', '2015-10-31 15:31:12', '', '0000-00-00 00:00:00'),
	(27, 'KOM-27', 'Lainnya', 'GL', 0, 'U', 'damz', '2015-11-01 12:37:37', '', '0000-00-00 00:00:00'),
	(28, 'KOM-28', 'Servis Tuneup', 'GL', 0, 'U', 'damz', '2015-11-28 00:09:27', 'damz', '2015-12-02 05:47:33');
/*!40000 ALTER TABLE `komponen` ENABLE KEYS */;


-- Dumping structure for table kartu_sehat_kendaraan.komponen_group
CREATE TABLE IF NOT EXISTS `komponen_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `user_create` varchar(50) NOT NULL,
  `date_create` datetime NOT NULL,
  `user_update` varchar(50) NOT NULL,
  `date_update` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table kartu_sehat_kendaraan.komponen_group: ~4 rows (approximately)
/*!40000 ALTER TABLE `komponen_group` DISABLE KEYS */;
INSERT INTO `komponen_group` (`id`, `kode`, `nama`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
	(1, 'G1', 'Komponen Dasar Mesin', '', '0000-00-00 00:00:00', 'damz', '2015-11-27 23:59:28'),
	(2, 'G2', 'Sistem Bahan Bakar', '', '0000-00-00 00:00:00', 'damz', '2015-11-27 23:59:35'),
	(3, 'G3', 'Sistem Keamanan', '', '0000-00-00 00:00:00', 'damz', '2015-11-28 00:12:27'),
	(4, 'GL', 'Lainnya', '', '0000-00-00 00:00:00', 'damz', '2015-11-27 23:59:47');
/*!40000 ALTER TABLE `komponen_group` ENABLE KEYS */;


-- Dumping structure for table kartu_sehat_kendaraan.komponen_satuan
CREATE TABLE IF NOT EXISTS `komponen_satuan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `user_create` varchar(50) NOT NULL,
  `date_create` datetime NOT NULL,
  `user_update` varchar(50) NOT NULL,
  `date_update` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table kartu_sehat_kendaraan.komponen_satuan: ~2 rows (approximately)
/*!40000 ALTER TABLE `komponen_satuan` DISABLE KEYS */;
INSERT INTO `komponen_satuan` (`id`, `kode`, `nama`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
	(1, 'U', 'Unit', '', '0000-00-00 00:00:00', 'damz', '2015-11-28 00:00:05'),
	(2, 'L', 'Liter', '', '0000-00-00 00:00:00', 'damz', '2015-11-27 23:59:56');
/*!40000 ALTER TABLE `komponen_satuan` ENABLE KEYS */;


-- Dumping structure for table kartu_sehat_kendaraan.servis
CREATE TABLE IF NOT EXISTS `servis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomor` varchar(50) NOT NULL,
  `kendaraan` varchar(10) NOT NULL,
  `tanggal` date NOT NULL,
  `tipe` varchar(10) NOT NULL,
  `kilometer` varchar(50) NOT NULL,
  `user_create` varchar(50) NOT NULL,
  `date_create` datetime NOT NULL,
  `user_update` varchar(50) NOT NULL,
  `date_update` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table kartu_sehat_kendaraan.servis: ~7 rows (approximately)
/*!40000 ALTER TABLE `servis` DISABLE KEYS */;
INSERT INTO `servis` (`id`, `nomor`, `kendaraan`, `tanggal`, `tipe`, `kilometer`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
	(1, '001', 'K003', '2015-11-28', 'ST-1', '1', 'damz', '2015-11-28 00:45:48', 'damz', '2015-11-28 01:13:57'),
	(2, '002', 'K002', '2015-11-29', 'ST-1', '1', 'damz', '2015-11-28 08:38:29', '', '0000-00-00 00:00:00'),
	(3, '003', 'K002', '2015-09-16', 'ST-1', '1', 'damz', '2015-11-28 08:45:49', '', '0000-00-00 00:00:00'),
	(4, '004', 'K003', '2015-06-16', 'ST-1', '1', 'damz', '2015-11-28 08:47:33', '', '0000-00-00 00:00:00'),
	(5, '005', 'K003', '2015-11-29', 'ST-1', '1', 'damz', '2015-11-29 10:18:03', '', '0000-00-00 00:00:00'),
	(6, '006', 'K003', '2015-11-30', 'ST-1', '1', 'damz', '2015-11-29 10:19:28', '', '0000-00-00 00:00:00'),
	(7, '007', 'K001', '2015-11-28', 'ST-1', '1', 'damz', '2015-11-29 10:38:09', '', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `servis` ENABLE KEYS */;


-- Dumping structure for table kartu_sehat_kendaraan.servis_aksi
CREATE TABLE IF NOT EXISTS `servis_aksi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `user_create` varchar(50) NOT NULL,
  `date_create` datetime NOT NULL,
  `user_update` varchar(50) NOT NULL,
  `date_update` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table kartu_sehat_kendaraan.servis_aksi: ~6 rows (approximately)
/*!40000 ALTER TABLE `servis_aksi` DISABLE KEYS */;
INSERT INTO `servis_aksi` (`id`, `kode`, `nama`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
	(1, 'SA-1', 'Ganti', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
	(2, 'SA-2', 'Cek', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
	(3, 'SA-3', 'Stel', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
	(4, 'SA-4', 'Tambah', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
	(5, 'SA-5', 'Bersihkan', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
	(6, 'SA-6', 'Cek Angin', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `servis_aksi` ENABLE KEYS */;


-- Dumping structure for table kartu_sehat_kendaraan.servis_detail
CREATE TABLE IF NOT EXISTS `servis_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `servis` varchar(50) NOT NULL,
  `komponen` varchar(10) NOT NULL,
  `komponen_lain` varchar(60) NOT NULL,
  `aksi` varchar(10) NOT NULL,
  `satuan` varchar(10) NOT NULL,
  `harga` int(11) NOT NULL,
  `user_create` varchar(50) NOT NULL,
  `date_create` datetime NOT NULL,
  `user_update` varchar(50) NOT NULL,
  `date_update` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

-- Dumping data for table kartu_sehat_kendaraan.servis_detail: ~22 rows (approximately)
/*!40000 ALTER TABLE `servis_detail` DISABLE KEYS */;
INSERT INTO `servis_detail` (`id`, `servis`, `komponen`, `komponen_lain`, `aksi`, `satuan`, `harga`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
	(4, '001', 'KOM-3', '', 'SA-1', '1', 10000, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
	(5, '001', 'KOM-2', '', 'SA-1', '1', 15000, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
	(6, '002', 'KOM-28', '', 'SA-2', '1', 0, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
	(7, '003', 'KOM-3', '', 'SA-1', '1', 10000, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
	(8, '004', 'KOM-28', '', 'SA-2', '1', 0, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
	(9, '005', 'KOM-3', '', 'SA-1', '1', 0, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
	(10, '005', 'KOM-2', '', 'SA-1', '1', 0, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
	(11, '005', 'KOM-1', '', 'SA-1', '1', 0, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
	(12, '005', 'KOM-4', '', 'SA-1', '1', 0, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
	(13, '005', 'KOM-5', '', 'SA-1', '1', 0, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
	(14, '005', 'KOM-6', '', 'SA-1', '1', 0, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
	(15, '005', 'KOM-7', '', 'SA-2', '1', 0, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
	(16, '005', 'KOM-8', '', 'SA-2', '1', 0, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
	(17, '006', 'KOM-9', '', 'SA-2', '1', 0, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
	(18, '006', 'KOM-10', '', 'SA-2', '1', 0, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
	(19, '006', 'KOM-11', '', 'SA-5', '1', 0, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
	(20, '006', 'KOM-12', '', 'SA-2', '1', 0, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
	(21, '006', 'KOM-13', '', 'SA-1', '1', 0, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
	(22, '006', 'KOM-14', '', 'SA-2', '1', 0, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
	(23, '006', 'KOM-15', '', 'SA-5', '1', 0, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
	(24, '006', 'KOM-16', '', 'SA-2', '1', 0, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
	(25, '007', 'KOM-3', '', 'SA-1', '1', 0, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `servis_detail` ENABLE KEYS */;


-- Dumping structure for table kartu_sehat_kendaraan.servis_tipe
CREATE TABLE IF NOT EXISTS `servis_tipe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `user_create` varchar(50) NOT NULL,
  `date_create` datetime NOT NULL,
  `user_update` varchar(50) NOT NULL,
  `date_update` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table kartu_sehat_kendaraan.servis_tipe: ~2 rows (approximately)
/*!40000 ALTER TABLE `servis_tipe` DISABLE KEYS */;
INSERT INTO `servis_tipe` (`id`, `kode`, `nama`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
	(1, 'ST-1', 'PEMELIHARAAN BERKALA', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
	(2, 'ST-2', 'SERVICE BERKALA', '', '0000-00-00 00:00:00', 'damz', '2015-11-28 02:20:39');
/*!40000 ALTER TABLE `servis_tipe` ENABLE KEYS */;


-- Dumping structure for table kartu_sehat_kendaraan.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  `ip_login` varchar(50) NOT NULL,
  `user_agent` varchar(50) NOT NULL,
  `date_login` datetime NOT NULL,
  `user_create` varchar(50) NOT NULL,
  `date_create` datetime NOT NULL,
  `user_update` varchar(50) NOT NULL,
  `date_update` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table kartu_sehat_kendaraan.user: ~3 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `fullname`, `username`, `password`, `level`, `status`, `ip_login`, `user_agent`, `date_login`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
	(1, 'Adam Prasetia', 'damz', '123', 'ABK', 'ON', '127.0.0.1', 'Windows 7(Google Chrome 46.0.2490.86)', '2015-12-02 05:45:50', '', '0000-00-00 00:00:00', 'damz', '2015-11-28 02:35:55'),
	(35, 'Wahyuni Priska Agustin', 'uni', '123', 'ABK', 'ON', '::1', 'Windows 8.1(Google Chrome 46.0.2490.80)', '2015-11-01 15:01:31', 'damz', '2015-11-01 15:01:27', 'damz', '2015-11-28 02:35:37'),
	(36, 'adben', 'adben', '123', 'ABB', 'OFF', '127.0.0.1', 'Windows 7(Google Chrome 46.0.2490.86)', '2015-11-22 14:11:22', 'damz', '2015-11-22 14:11:18', 'damz', '2015-11-28 02:35:45');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;


-- Dumping structure for table kartu_sehat_kendaraan.user_level
CREATE TABLE IF NOT EXISTS `user_level` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `user_create` varchar(50) NOT NULL,
  `date_create` datetime NOT NULL,
  `user_update` varchar(50) NOT NULL,
  `date_update` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table kartu_sehat_kendaraan.user_level: ~2 rows (approximately)
/*!40000 ALTER TABLE `user_level` DISABLE KEYS */;
INSERT INTO `user_level` (`id`, `kode`, `nama`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
	(1, 'ABK', 'Admin Bidang KJL', '2015-10-31 13:59:44', '0000-00-00 00:00:00', 'damz', '2015-11-28 02:32:03'),
	(2, 'ABB', 'Admin Bendahara Barang', '2015-10-31 13:59:44', '0000-00-00 00:00:00', 'damz', '2015-11-28 02:31:57');
/*!40000 ALTER TABLE `user_level` ENABLE KEYS */;


-- Dumping structure for table kartu_sehat_kendaraan.user_status
CREATE TABLE IF NOT EXISTS `user_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `user_create` varchar(50) NOT NULL,
  `date_create` datetime NOT NULL,
  `user_update` varchar(50) NOT NULL,
  `date_update` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table kartu_sehat_kendaraan.user_status: ~2 rows (approximately)
/*!40000 ALTER TABLE `user_status` DISABLE KEYS */;
INSERT INTO `user_status` (`id`, `kode`, `nama`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
	(1, 'ON', 'Aktif', '', '2015-10-31 14:00:03', 'damz', '2015-11-28 02:32:32'),
	(2, 'OFF', 'Tidak Aktif', '', '2015-10-31 14:00:03', 'damz', '2015-11-28 02:32:22');
/*!40000 ALTER TABLE `user_status` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
