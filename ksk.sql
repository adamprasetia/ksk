-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.26 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for kartu_sehat_kendaraan
CREATE DATABASE IF NOT EXISTS `kartu_sehat_kendaraan` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `kartu_sehat_kendaraan`;


-- Dumping structure for table kartu_sehat_kendaraan.kendaraan
CREATE TABLE IF NOT EXISTS `kendaraan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nopol` varchar(50) NOT NULL,
  `tipe` tinyint(4) NOT NULL,
  `nomes` varchar(50) NOT NULL,
  `nocha` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `user_create` varchar(50) NOT NULL,
  `date_create` datetime NOT NULL,
  `user_update` varchar(50) NOT NULL,
  `date_update` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table kartu_sehat_kendaraan.kendaraan: ~2 rows (approximately)
/*!40000 ALTER TABLE `kendaraan` DISABLE KEYS */;
INSERT INTO `kendaraan` (`id`, `nopol`, `tipe`, `nomes`, `nocha`, `status`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
	(1, 'F 1234 WR', 3, '2322212332', '1223321', 1, 'damz', '2015-10-31 14:34:32', 'damz', '2015-10-31 16:07:46'),
	(2, 'F 3434 WF', 1, '3444434434', '3233233', 1, 'damz', '2015-10-31 14:36:30', 'damz', '2015-10-31 14:38:16');
/*!40000 ALTER TABLE `kendaraan` ENABLE KEYS */;


-- Dumping structure for table kartu_sehat_kendaraan.kendaraan_status
CREATE TABLE IF NOT EXISTS `kendaraan_status` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `date_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table kartu_sehat_kendaraan.kendaraan_status: ~2 rows (approximately)
/*!40000 ALTER TABLE `kendaraan_status` DISABLE KEYS */;
INSERT INTO `kendaraan_status` (`id`, `nama`, `date_create`) VALUES
	(1, 'On', '2015-10-31 14:00:03'),
	(2, 'Off', '2015-10-31 14:00:03');
/*!40000 ALTER TABLE `kendaraan_status` ENABLE KEYS */;


-- Dumping structure for table kartu_sehat_kendaraan.kendaraan_tipe
CREATE TABLE IF NOT EXISTS `kendaraan_tipe` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `date_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table kartu_sehat_kendaraan.kendaraan_tipe: ~4 rows (approximately)
/*!40000 ALTER TABLE `kendaraan_tipe` DISABLE KEYS */;
INSERT INTO `kendaraan_tipe` (`id`, `nama`, `date_create`) VALUES
	(1, 'ARM ROLL', '2015-10-31 13:59:19'),
	(2, 'DUMP TRUCK', '2015-10-31 13:59:19'),
	(3, 'PICK UP', '2015-10-31 13:59:19'),
	(4, 'SUV / STASION WAGON', '2015-10-31 13:59:19');
/*!40000 ALTER TABLE `kendaraan_tipe` ENABLE KEYS */;


-- Dumping structure for table kartu_sehat_kendaraan.komponen
CREATE TABLE IF NOT EXISTS `komponen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(60) NOT NULL,
  `group` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `satuan` tinyint(4) NOT NULL,
  `user_create` varchar(50) NOT NULL,
  `date_create` datetime NOT NULL,
  `user_update` varchar(50) NOT NULL,
  `date_update` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

-- Dumping data for table kartu_sehat_kendaraan.komponen: ~27 rows (approximately)
/*!40000 ALTER TABLE `komponen` DISABLE KEYS */;
INSERT INTO `komponen` (`id`, `nama`, `group`, `harga`, `satuan`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
	(1, 'Celah Katup', 1, 50000, 1, 'damz', '2015-10-31 15:17:14', 'damz', '2015-10-31 16:25:02'),
	(2, 'Tali Kipas', 1, 23000, 1, 'damz', '2015-10-31 15:18:08', 'damz', '2015-10-31 16:25:10'),
	(3, 'Olie Mesin', 1, 0, 2, 'damz', '2015-10-31 15:18:14', 'damz', '2015-10-31 16:25:32'),
	(4, 'Olie Gardan', 1, 0, 2, 'damz', '2015-10-31 15:18:21', 'damz', '2015-10-31 16:25:36'),
	(5, 'Olie Transimisi', 1, 0, 2, 'damz', '2015-10-31 15:18:29', 'damz', '2015-10-31 16:25:40'),
	(6, 'Olie Hidrouliq', 1, 0, 2, 'damz', '2015-10-31 15:18:48', 'damz', '2015-10-31 16:25:44'),
	(7, 'Filter Olie', 1, 0, 1, 'damz', '2015-10-31 15:19:18', 'damz', '2015-10-31 16:25:57'),
	(8, 'Baterai / Accu', 1, 0, 2, 'damz', '2015-10-31 15:19:28', 'damz', '2015-10-31 16:26:16'),
	(9, 'Filter Bahan Bakar', 2, 0, 1, 'damz', '2015-10-31 15:19:40', 'damz', '2015-10-31 16:27:11'),
	(10, 'Pompa Bahan Bakar', 2, 0, 1, 'damz', '2015-10-31 15:19:47', 'damz', '2015-10-31 16:27:17'),
	(11, 'Saringan Udara', 2, 0, 1, 'damz', '2015-10-31 15:20:24', 'damz', '2015-10-31 16:27:33'),
	(12, 'Kanvas Rem Ka/Ki *', 3, 0, 1, 'damz', '2015-10-31 15:21:14', 'damz', '2015-10-31 15:28:15'),
	(13, 'Minyak Rem', 3, 0, 2, 'damz', '2015-10-31 15:28:44', '', '0000-00-00 00:00:00'),
	(14, 'Selang dan Pipa Saluran Minyak Rem', 3, 0, 1, 'damz', '2015-10-31 15:29:02', '', '0000-00-00 00:00:00'),
	(15, 'Karet Master Silinder dan wheel silinder sistem rem', 3, 0, 1, 'damz', '2015-10-31 15:29:26', '', '0000-00-00 00:00:00'),
	(16, 'Kopling', 3, 0, 1, 'damz', '2015-10-31 15:29:32', '', '0000-00-00 00:00:00'),
	(17, 'Minyak Kopling', 3, 0, 2, 'damz', '2015-10-31 15:29:43', '', '0000-00-00 00:00:00'),
	(18, 'Ball Joint', 3, 0, 1, 'damz', '2015-10-31 15:29:56', '', '0000-00-00 00:00:00'),
	(19, 'Lampu Depan Ka / Ki *', 3, 0, 1, 'damz', '2015-10-31 15:30:05', '', '0000-00-00 00:00:00'),
	(20, 'Lampu Sein Depan Ka / Ki *', 3, 0, 1, 'damz', '2015-10-31 15:30:18', '', '0000-00-00 00:00:00'),
	(21, 'Lampu mundur', 3, 0, 1, 'damz', '2015-10-31 15:30:27', '', '0000-00-00 00:00:00'),
	(22, 'Lampu Sein Belakang Ka / Ki *', 3, 0, 1, 'damz', '2015-10-31 15:30:39', '', '0000-00-00 00:00:00'),
	(23, 'Lampu Rem Ka / Ki *', 3, 0, 1, 'damz', '2015-10-31 15:30:47', '', '0000-00-00 00:00:00'),
	(24, 'Lampu Malam Belakang Ka / Ki *', 3, 0, 1, 'damz', '2015-10-31 15:30:57', '', '0000-00-00 00:00:00'),
	(25, 'Ban Luar', 3, 0, 1, 'damz', '2015-10-31 15:31:05', '', '0000-00-00 00:00:00'),
	(26, 'Ban Dalam', 3, 0, 1, 'damz', '2015-10-31 15:31:12', '', '0000-00-00 00:00:00'),
	(27, 'Lainnya', 4, 0, 1, 'damz', '2015-11-01 12:37:37', '', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `komponen` ENABLE KEYS */;


-- Dumping structure for table kartu_sehat_kendaraan.komponen_aksi
CREATE TABLE IF NOT EXISTS `komponen_aksi` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table kartu_sehat_kendaraan.komponen_aksi: ~6 rows (approximately)
/*!40000 ALTER TABLE `komponen_aksi` DISABLE KEYS */;
INSERT INTO `komponen_aksi` (`id`, `nama`) VALUES
	(1, 'Ganti'),
	(2, 'Cek'),
	(3, 'Stel'),
	(4, 'Tambah'),
	(5, 'Bersihkan'),
	(6, 'Cek Angin');
/*!40000 ALTER TABLE `komponen_aksi` ENABLE KEYS */;


-- Dumping structure for table kartu_sehat_kendaraan.komponen_group
CREATE TABLE IF NOT EXISTS `komponen_group` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table kartu_sehat_kendaraan.komponen_group: ~4 rows (approximately)
/*!40000 ALTER TABLE `komponen_group` DISABLE KEYS */;
INSERT INTO `komponen_group` (`id`, `nama`) VALUES
	(1, 'Komponen Dasar Mesin'),
	(2, 'Sistem Bahan Bakar'),
	(3, 'Sistem Keamanan'),
	(4, 'Lainnya');
/*!40000 ALTER TABLE `komponen_group` ENABLE KEYS */;


-- Dumping structure for table kartu_sehat_kendaraan.komponen_satuan
CREATE TABLE IF NOT EXISTS `komponen_satuan` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table kartu_sehat_kendaraan.komponen_satuan: ~2 rows (approximately)
/*!40000 ALTER TABLE `komponen_satuan` DISABLE KEYS */;
INSERT INTO `komponen_satuan` (`id`, `nama`) VALUES
	(1, 'Unit'),
	(2, 'Liter');
/*!40000 ALTER TABLE `komponen_satuan` ENABLE KEYS */;


-- Dumping structure for table kartu_sehat_kendaraan.servis
CREATE TABLE IF NOT EXISTS `servis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomor` varchar(50) NOT NULL,
  `kendaraan` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `tipe` tinyint(4) NOT NULL,
  `kilometer` varchar(50) NOT NULL,
  `user_create` varchar(50) NOT NULL,
  `date_create` datetime NOT NULL,
  `user_update` varchar(50) NOT NULL,
  `date_update` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Dumping data for table kartu_sehat_kendaraan.servis: ~8 rows (approximately)
/*!40000 ALTER TABLE `servis` DISABLE KEYS */;
INSERT INTO `servis` (`id`, `nomor`, `kendaraan`, `tanggal`, `tipe`, `kilometer`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
	(1, '001', 1, '2015-11-01', 1, '1', 'damz', '2015-11-01 13:19:56', 'damz', '2015-11-01 14:35:16'),
	(2, '002', 2, '2015-11-01', 2, '2', 'damz', '2015-11-01 13:24:02', 'damz', '2015-11-04 23:04:10'),
	(3, '003', 1, '2015-11-01', 1, '2', 'damz', '2015-11-01 13:27:57', '', '0000-00-00 00:00:00'),
	(4, '004', 1, '2015-11-01', 1, '4', 'damz', '2015-11-01 13:36:38', '', '0000-00-00 00:00:00'),
	(6, '006', 1, '2015-11-01', 2, '6', 'damz', '2015-11-01 13:51:57', 'damz', '2015-11-01 14:47:11'),
	(7, '007', 1, '2015-11-01', 2, '7', 'damz', '2015-11-01 14:16:49', '', '0000-00-00 00:00:00'),
	(8, '008', 2, '2015-11-01', 2, '8', 'damz', '2015-11-01 14:19:21', 'damz', '2015-11-01 14:58:39'),
	(9, '009', 2, '2015-11-04', 1, '99999', 'damz', '2015-11-04 23:05:31', '', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `servis` ENABLE KEYS */;


-- Dumping structure for table kartu_sehat_kendaraan.servis_detail
CREATE TABLE IF NOT EXISTS `servis_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `servis` int(11) NOT NULL,
  `komponen` int(11) NOT NULL,
  `komponen_lain` varchar(60) NOT NULL,
  `aksi` int(11) NOT NULL,
  `satuan` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

-- Dumping data for table kartu_sehat_kendaraan.servis_detail: ~16 rows (approximately)
/*!40000 ALTER TABLE `servis_detail` DISABLE KEYS */;
INSERT INTO `servis_detail` (`id`, `servis`, `komponen`, `komponen_lain`, `aksi`, `satuan`, `harga`) VALUES
	(4, 3, 1, '', 1, 2, 50000),
	(5, 3, 27, 'Knalpot Racing', 1, 2, 150000),
	(6, 4, 27, 'Cet', 1, 1, 20000),
	(7, 4, 27, 'Tabung', 1, 5, 25000),
	(10, 7, 16, '', 2, 1, 5000),
	(23, 1, 1, '', 1, 5, 50000),
	(25, 6, 1, '', 1, 1, 50000),
	(26, 6, 27, 'Knalpot Mobil', 1, 2, 250000),
	(27, 8, 12, '', 3, 1, 24000),
	(28, 2, 1, '', 1, 2, 50000),
	(29, 2, 2, '', 1, 4, 23000),
	(30, 2, 27, 'Kenalpot', 1, 1, 100000),
	(31, 2, 6, '', 2, 3, 45000),
	(32, 9, 1, '', 1, 5, 50000),
	(33, 9, 2, '', 2, 4, 23000),
	(34, 9, 5, '', 1, 4, 5000);
/*!40000 ALTER TABLE `servis_detail` ENABLE KEYS */;


-- Dumping structure for table kartu_sehat_kendaraan.servis_tipe
CREATE TABLE IF NOT EXISTS `servis_tipe` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table kartu_sehat_kendaraan.servis_tipe: ~2 rows (approximately)
/*!40000 ALTER TABLE `servis_tipe` DISABLE KEYS */;
INSERT INTO `servis_tipe` (`id`, `nama`) VALUES
	(1, 'PEMELIHARAAN BERKALA'),
	(2, 'SERVICE BERKALA');
/*!40000 ALTER TABLE `servis_tipe` ENABLE KEYS */;


-- Dumping structure for table kartu_sehat_kendaraan.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `ip_login` varchar(50) NOT NULL,
  `user_agent` varchar(50) NOT NULL,
  `date_login` datetime NOT NULL,
  `user_create` varchar(50) NOT NULL,
  `date_create` datetime NOT NULL,
  `user_update` varchar(50) NOT NULL,
  `date_update` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table kartu_sehat_kendaraan.user: ~2 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `fullname`, `username`, `password`, `level`, `status`, `ip_login`, `user_agent`, `date_login`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
	(1, 'Adam Prasetia', 'damz', '123', 1, 1, '::1', 'Windows 8.1(Google Chrome 46.0.2490.80)', '2015-11-08 09:01:08', '', '0000-00-00 00:00:00', 'uni', '2015-11-01 15:01:51'),
	(35, 'Wahyuni Priska Agustin', 'uni', '123', 1, 1, '::1', 'Windows 8.1(Google Chrome 46.0.2490.80)', '2015-11-01 15:01:31', 'damz', '2015-11-01 15:01:27', '', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;


-- Dumping structure for table kartu_sehat_kendaraan.user_level
CREATE TABLE IF NOT EXISTS `user_level` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `date_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table kartu_sehat_kendaraan.user_level: ~3 rows (approximately)
/*!40000 ALTER TABLE `user_level` DISABLE KEYS */;
INSERT INTO `user_level` (`id`, `name`, `date_create`) VALUES
	(1, 'Admin', '2015-10-31 13:59:44'),
	(2, 'Supervisor', '2015-10-31 13:59:44'),
	(3, 'Operator', '2015-10-31 13:59:44');
/*!40000 ALTER TABLE `user_level` ENABLE KEYS */;


-- Dumping structure for table kartu_sehat_kendaraan.user_status
CREATE TABLE IF NOT EXISTS `user_status` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `date_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table kartu_sehat_kendaraan.user_status: ~2 rows (approximately)
/*!40000 ALTER TABLE `user_status` DISABLE KEYS */;
INSERT INTO `user_status` (`id`, `name`, `date_create`) VALUES
	(1, 'On', '2015-10-31 14:00:03'),
	(2, 'Off', '2015-10-31 14:00:03');
/*!40000 ALTER TABLE `user_status` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
