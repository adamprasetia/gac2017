-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.18-log - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table gac2017.call_history
CREATE TABLE IF NOT EXISTS `call_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `candidate` int(11) NOT NULL DEFAULT '0',
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table gac2017.call_history: ~0 rows (approximately)
/*!40000 ALTER TABLE `call_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `call_history` ENABLE KEYS */;


-- Dumping structure for table gac2017.candidate
CREATE TABLE IF NOT EXISTS `candidate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mop_id` varchar(50) NOT NULL DEFAULT '',
  `username` varchar(100) NOT NULL DEFAULT '',
  `fullname` varchar(100) NOT NULL DEFAULT '',
  `nickname` varchar(100) NOT NULL DEFAULT '',
  `dob` date NOT NULL DEFAULT '0000-00-00',
  `city` varchar(100) NOT NULL DEFAULT '',
  `tlp` varchar(100) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT '',
  `tw` varchar(100) NOT NULL DEFAULT '',
  `brand` varchar(100) NOT NULL DEFAULT '',
  `dist_date` date NOT NULL DEFAULT '0000-00-00',
  `dist_date_first` date NOT NULL DEFAULT '0000-00-00',
  `interviewer` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `audit` tinyint(4) NOT NULL DEFAULT '0',
  `valid` tinyint(4) NOT NULL DEFAULT '0',
  `called` tinyint(4) NOT NULL DEFAULT '0',
  `minute` tinyint(4) NOT NULL DEFAULT '0',
  `smoker` tinyint(4) NOT NULL DEFAULT '0',
  `callagain` tinyint(4) NOT NULL DEFAULT '0',
  `plagiat` tinyint(4) NOT NULL DEFAULT '0',
  `plagiat_desc` varchar(100) NOT NULL DEFAULT '',
  `art_title` varchar(100) NOT NULL DEFAULT '',
  `art_type` varchar(5) NOT NULL DEFAULT '',
  `art_desc` text,
  `signature` tinyint(4) NOT NULL DEFAULT '0',
  `facetoface` tinyint(4) NOT NULL DEFAULT '0',
  `city_f2f` tinyint(4) NOT NULL DEFAULT '0',
  `overseas` tinyint(4) NOT NULL DEFAULT '0',
  `overseas_desc` varchar(100) NOT NULL DEFAULT '',
  `visa` tinyint(4) NOT NULL DEFAULT '0',
  `visa_desc` varchar(200) NOT NULL DEFAULT '',
  `grandprize` tinyint(4) NOT NULL DEFAULT '0',
  `trivia` text,
  `experience` text,
  `english1` text,
  `english2` text,
  `english3` tinyint(4) NOT NULL DEFAULT '0',
  `english3_desc` varchar(100) NOT NULL DEFAULT '',
  `english4` text,
  `passport` tinyint(4) NOT NULL DEFAULT '0',
  `passport_name` varchar(100) NOT NULL DEFAULT '',
  `passport_exp` date NOT NULL DEFAULT '0000-00-00',
  `country` varchar(200) NOT NULL DEFAULT '',
  `campaign` tinyint(4) NOT NULL DEFAULT '0',
  `campaign_desc` text,
  `user_create` int(11) NOT NULL DEFAULT '0',
  `date_create` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_update` int(11) NOT NULL DEFAULT '0',
  `date_update` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table gac2017.candidate: ~0 rows (approximately)
/*!40000 ALTER TABLE `candidate` DISABLE KEYS */;
/*!40000 ALTER TABLE `candidate` ENABLE KEYS */;


-- Dumping structure for table gac2017.candidate_status
CREATE TABLE IF NOT EXISTS `candidate_status` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `parent` int(11) NOT NULL,
  `user_create` int(11) NOT NULL,
  `date_create` datetime NOT NULL,
  `user_update` int(11) NOT NULL,
  `date_update` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table gac2017.candidate_status: ~15 rows (approximately)
/*!40000 ALTER TABLE `candidate_status` DISABLE KEYS */;
INSERT INTO `candidate_status` (`id`, `name`, `parent`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
	(1, 'Connect', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(2, 'Not Connect', 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(21, 'No Answer', 2, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(22, 'Busy', 2, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(23, 'Reject', 2, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(101, 'Success', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(102, 'Call Back', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(103, 'Wrong Number', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(104, 'Bukan Perokok', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(105, 'Dibawah 18 Tahun', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(106, 'Tidak Bersedia Dihubungi Kembali', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(107, 'Plagiat', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(108, 'Tidak Bersedia Menandatangani Pernyataan Bermaterai', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(109, 'Tidak Bisa Hadir di F2F', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(110, 'Tidak Bersedia Memenangkan Grand Prize', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `candidate_status` ENABLE KEYS */;


-- Dumping structure for table gac2017.city
CREATE TABLE IF NOT EXISTS `city` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `city` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `time` varchar(100) NOT NULL,
  `user_create` int(11) NOT NULL,
  `date_create` datetime NOT NULL,
  `user_update` int(11) NOT NULL,
  `date_update` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table gac2017.city: ~3 rows (approximately)
/*!40000 ALTER TABLE `city` DISABLE KEYS */;
INSERT INTO `city` (`id`, `city`, `address`, `time`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
	(1, 'Jakarta', 'ADirect Tower Jl Mampang Prapatan 8 No R25 C-D', 'Senin, 11 Agustus 2017', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(2, 'Bandung', 'Gedung Asia Afrika No 7', 'Selasa, 12 Agustus 2017', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(3, 'Cianjur', 'Gedung Monas Cianjurs', 'Rabu, 13 Agustus 2017', 1, '2016-07-13 08:52:46', 1, '2016-07-13 08:53:00');
/*!40000 ALTER TABLE `city` ENABLE KEYS */;


-- Dumping structure for table gac2017.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` tinyint(4) NOT NULL,
  `ip_login` varchar(50) NOT NULL,
  `date_login` datetime NOT NULL,
  `user_agent` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `user_create` int(11) NOT NULL,
  `date_create` datetime NOT NULL,
  `user_update` int(11) NOT NULL,
  `date_update` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table gac2017.user: ~5 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `name`, `username`, `password`, `level`, `ip_login`, `date_login`, `user_agent`, `status`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
	(1, 'Adam Prasetia', 'damz', '202cb962ac59075b964b07152d234b70', 1, '::1', '2017-07-20 06:38:23', 'Windows 7(Google Chrome 59.0.3071.115)', 1, 0, '0000-00-00 00:00:00', 12, '2016-02-01 23:44:22'),
	(2, 'Teguh Santoso', 'teguh', 'e2f9f842fd8e1ae90dc428d39cab7167', 1, '127.0.0.1', '2016-02-01 17:11:28', 'Windows 7(Google Chrome 48.0.2564.97)', 1, 1, '2016-02-01 17:07:02', 0, '0000-00-00 00:00:00'),
	(3, 'Jaka', 'jack', '202cb962ac59075b964b07152d234b70', 3, '::1', '2017-07-20 06:05:38', 'Windows 7(Google Chrome 59.0.3071.115)', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(4, 'Bhakti', 'bray', '202cb962ac59075b964b07152d234b70', 3, '', '0000-00-00 00:00:00', '', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(5, 'Joko', 'jojo', '202cb962ac59075b964b07152d234b70', 2, '', '0000-00-00 00:00:00', '', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;


-- Dumping structure for table gac2017.user_level
CREATE TABLE IF NOT EXISTS `user_level` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `user_create` int(11) NOT NULL,
  `date_create` datetime NOT NULL,
  `user_update` int(11) NOT NULL,
  `date_update` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table gac2017.user_level: ~3 rows (approximately)
/*!40000 ALTER TABLE `user_level` DISABLE KEYS */;
INSERT INTO `user_level` (`id`, `name`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
	(1, 'Admin', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(2, 'Auditor', 0, '0000-00-00 00:00:00', 12, '2016-02-02 22:08:19'),
	(3, 'Interviewer', 0, '2016-01-03 03:06:57', 12, '2016-04-13 18:13:39');
/*!40000 ALTER TABLE `user_level` ENABLE KEYS */;


-- Dumping structure for table gac2017.user_status
CREATE TABLE IF NOT EXISTS `user_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `user_create` int(11) NOT NULL,
  `date_create` datetime NOT NULL,
  `user_update` int(11) NOT NULL,
  `date_update` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table gac2017.user_status: ~2 rows (approximately)
/*!40000 ALTER TABLE `user_status` DISABLE KEYS */;
INSERT INTO `user_status` (`id`, `name`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
	(1, 'Active', 0, '2015-10-31 14:00:03', 0, '2015-11-28 02:32:32'),
	(2, 'Not Active', 0, '2015-10-31 14:00:03', 12, '2016-02-01 23:22:27');
/*!40000 ALTER TABLE `user_status` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
