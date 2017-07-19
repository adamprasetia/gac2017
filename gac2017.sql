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

-- Dumping structure for table gac2016.call_history
CREATE TABLE IF NOT EXISTS `call_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `candidate` int(11) NOT NULL DEFAULT '0',
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table gac2016.call_history: ~0 rows (approximately)
/*!40000 ALTER TABLE `call_history` DISABLE KEYS */;
INSERT INTO `call_history` (`id`, `candidate`, `date`, `status`) VALUES
	(37, 4, '2016-04-13 19:28:35', 'Answer');
/*!40000 ALTER TABLE `call_history` ENABLE KEYS */;


-- Dumping structure for table gac2016.candidate
CREATE TABLE IF NOT EXISTS `candidate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mop_id` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `nickname` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `city` varchar(100) NOT NULL,
  `tlp` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tw` varchar(100) NOT NULL,
  `brand` varchar(100) NOT NULL,
  `dist_date` date NOT NULL,
  `interviewer` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `audit` tinyint(4) NOT NULL,
  `valid` tinyint(4) NOT NULL,
  `called` tinyint(4) NOT NULL,
  `minute` tinyint(4) NOT NULL,
  `smoker` tinyint(4) NOT NULL,
  `callagain` tinyint(4) NOT NULL,
  `plagiat` tinyint(4) NOT NULL,
  `plagiat_desc` varchar(100) NOT NULL,
  `art_title` varchar(100) NOT NULL,
  `art_type` varchar(5) NOT NULL,
  `art_desc` text NOT NULL,
  `signature` tinyint(4) NOT NULL,
  `facetoface` tinyint(4) NOT NULL,
  `city_f2f` tinyint(4) NOT NULL,
  `overseas` tinyint(4) NOT NULL,
  `overseas_desc` varchar(100) NOT NULL,
  `visa` tinyint(4) NOT NULL,
  `visa_desc` varchar(200) NOT NULL,
  `grandprize` tinyint(4) NOT NULL,
  `trivia` text NOT NULL,
  `experience` text NOT NULL,
  `english1` text NOT NULL,
  `english2` text NOT NULL,
  `english3` tinyint(4) NOT NULL,
  `english3_desc` varchar(100) NOT NULL,
  `english4` text NOT NULL,
  `passport` tinyint(4) NOT NULL,
  `passport_name` varchar(100) NOT NULL,
  `passport_exp` date NOT NULL,
  `country` varchar(200) NOT NULL,
  `campaign` tinyint(4) NOT NULL,
  `campaign_desc` text NOT NULL,
  `user_create` int(11) NOT NULL,
  `date_create` datetime NOT NULL,
  `user_update` int(11) NOT NULL,
  `date_update` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table gac2016.candidate: ~14 rows (approximately)
/*!40000 ALTER TABLE `candidate` DISABLE KEYS */;
INSERT INTO `candidate` (`id`, `mop_id`, `username`, `fullname`, `nickname`, `dob`, `city`, `tlp`, `email`, `tw`, `brand`, `dist_date`, `interviewer`, `status`, `audit`, `valid`, `called`, `minute`, `smoker`, `callagain`, `plagiat`, `plagiat_desc`, `art_title`, `art_type`, `art_desc`, `signature`, `facetoface`, `city_f2f`, `overseas`, `overseas_desc`, `visa`, `visa_desc`, `grandprize`, `trivia`, `experience`, `english1`, `english2`, `english3`, `english3_desc`, `english4`, `passport`, `passport_name`, `passport_exp`, `country`, `campaign`, `campaign_desc`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
	(1, '', '', 'Adam Prasetia', 'damz', '1989-02-16', '', '083817321885', 'adam.prasetia@gmail.com', '', '', '2016-07-12', 14, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', 0, 0, 0, 0, '', 0, '', 0, '', '', '', '', 0, '', '', 0, '', '0000-00-00', '', 0, '', 12, '2016-04-13 18:40:28', 0, '0000-00-00 00:00:00'),
	(2, '', '', 'Teguh Santoso', 'teguh', '1987-10-04', '', '081234567876', 'teguh@adirect.web.id', '', '', '2016-07-12', 14, 22, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', 0, 0, 0, 0, '', 0, '', 0, '', '', '', '', 0, '', '', 0, '', '0000-00-00', '', 0, '', 12, '2016-04-13 18:40:28', 0, '0000-00-00 00:00:00'),
	(3, '', '', 'Adam Prasetia', 'damz', '1989-02-16', '', '083817321885', 'adam.prasetia@gmail.com', '', '', '2016-07-12', 14, 21, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', 0, 0, 0, 0, '', 0, '', 0, '', '', '', '', 0, '', '', 0, '', '0000-00-00', '', 0, '', 12, '2016-04-13 19:09:15', 0, '0000-00-00 00:00:00'),
	(4, '', '', 'Teguh Santoso', 'teguh', '1987-10-04', 'Jakarta', '081234567876', 'teguh@adirect.web.id', 'teguh_tw', 'A Mild', '2016-04-13', 15, 0, 0, 0, 1, 1, 1, 1, 0, '', '', '', '', 0, 0, 0, 0, '', 0, '', 0, '', '', '', '', 0, '', '', 1, 'Teguh Santoso', '2018-02-01', '', 1, 'never say maybe', 12, '2016-04-13 19:09:15', 0, '0000-00-00 00:00:00'),
	(5, '11111', 'adam_pras', 'Adam Prasetia', 'damz', '1989-02-16', '', '083817321885', 'adam.prasetia@gmail.com', '', '', '2016-07-12', 14, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', 0, 0, 0, 0, '', 0, '', 0, '', '', '', '', 0, '', '', 0, '', '0000-00-00', '', 0, '', 12, '2016-04-14 11:59:37', 0, '0000-00-00 00:00:00'),
	(6, '22222', 'teguh_san', 'Teguh Santoso', 'teguh', '1987-10-04', '', '081234567876', 'teguh@adirect.web.id', '', '', '2016-07-12', 14, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', 0, 0, 0, 0, '', 0, '', 0, '', '', '', '', 0, '', '', 0, '', '0000-00-00', '', 0, '', 12, '2016-04-14 11:59:37', 0, '0000-00-00 00:00:00'),
	(7, '11111', 'adam_pras', 'Adam Prasetia', 'damz', '1989-02-16', '', '083817321885', 'adam.prasetia@gmail.com', 'adam_tw', '', '2016-07-12', 14, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', 0, 0, 0, 0, '', 0, '', 0, '', '', '', '', 0, '', '', 0, '', '0000-00-00', '', 0, '', 12, '2016-04-14 12:03:08', 0, '0000-00-00 00:00:00'),
	(8, '22222', 'teguh_san', 'Teguh Santoso', 'teguh', '1987-10-04', '', '081234567876', 'teguh@adirect.web.id', 'teguh_tw', '', '2016-07-12', 14, 0, 0, 0, 1, 0, 0, 0, 0, '', '', '', '', 0, 0, 0, 0, '', 0, '', 0, '', '', '', '', 0, '', '', 0, '', '0000-00-00', '', 0, '', 12, '2016-04-14 12:03:08', 0, '0000-00-00 00:00:00'),
	(9, '11111', 'adam_pras', 'Adam Prasetia', 'damz', '1989-02-16', '', '083817321885', 'adam.prasetia@gmail.com', 'adam_tw', '', '2016-07-12', 14, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', 0, 0, 0, 0, '', 0, '', 0, '', '', '', '', 0, '', '', 0, '', '0000-00-00', '', 0, '', 12, '2016-04-14 22:24:33', 0, '0000-00-00 00:00:00'),
	(10, '22222', 'teguh_san', 'Teguh Santoso', 'teguh', '1987-10-04', '', '081234567876', 'teguh@adirect.web.id', 'teguh_tw', '', '2016-07-12', 14, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', 0, 0, 0, 0, '', 0, '', 0, '', '', '', '', 0, '', '', 0, '', '0000-00-00', '', 0, '', 12, '2016-04-14 22:24:33', 0, '0000-00-00 00:00:00'),
	(11, '11111', 'adam_pras', 'Adam Prasetia', 'damz', '1989-02-16', 'Cianjur', '083817321885', 'adam.prasetia@gmail.com', 'adam_tw', '', '2016-07-12', 14, 0, 0, 0, 1, 1, 1, 1, 0, '', '', 'P', '', 0, 0, 0, 0, '', 0, '', 0, '', '', '', '', 0, '', '', 0, '', '0000-00-00', '', 0, '', 12, '2016-04-18 19:29:57', 0, '0000-00-00 00:00:00'),
	(12, '22222', 'teguh_san', 'Teguh Santoso', 'teguh', '1987-10-04', 'Jakarta', '081234567876', 'teguh@adirect.web.id', 'teguh_tw', 'A Mild', '2016-07-12', 14, 0, 0, 0, 1, 1, 1, 1, 1, 'SPG', 'Ini Judul', 'S', 'asdasdasd', 1, 1, 0, 4, 'Bangkok Thailand', 1, 'INDIA, VISA WISATA UMUM', 1, 'Semangat, lucu lucuan', '', 'rokok', 'a mild wanted', 3, 'Kompas', 'go a head people', 1, 'Adam Prasetia', '2018-02-12', 'korea utara', 1, 'A mild soundrenalin 2009', 12, '2016-04-18 19:29:57', 0, '0000-00-00 00:00:00'),
	(13, '11111', 'adam_pras', 'Adam Prasetia', 'damz', '1989-02-16', 'Cianjur', '083817321885', 'adam.prasetia@gmail.com', 'adam_tw', 'A Mild', '2016-07-12', 14, 101, 0, 1, 1, 1, 1, 1, 1, 'SPG Cantik', 'Alamat Palsu', 'V', 'Terinspirasi dari ayu tingting 100x100, canvas, 2016', 1, 1, 2, 4, 'Arab Saudi', 1, 'JERMAN, VISA WISATA UMUM', 1, 'Semangat dong', 'experiece', 'Apa yang Anda ketahui mengenai Sampoerna A Mild', 'Apa Program dari Sampoerna A Mild yang paling Anda tahu ?', 3, 'Kompas', 'Acara-acara A Mild apa yang pernah Anda datangi ? Alasannya ?', 1, 'Adam Prasetia', '2018-02-16', 'Korea Utara, Afganistan', 1, 'Soundrenalin', 12, '2016-07-12 13:26:54', 0, '0000-00-00 00:00:00'),
	(14, '22222', 'teguh_san', 'Teguh Santoso', 'teguh', '1987-10-04', 'Jakarta', '081234567876', 'teguh@adirect.web.id', 'teguh_tw', '', '2016-07-12', 14, 102, 0, 0, 0, 0, 0, 0, 0, '', 'Bang Jali', 'P', '', 0, 0, 0, 0, '', 0, '', 0, '', '', '', '', 0, '', '', 0, '', '0000-00-00', '', 0, '', 12, '2016-07-12 13:26:54', 0, '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `candidate` ENABLE KEYS */;


-- Dumping structure for table gac2016.candidate_status
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

-- Dumping data for table gac2016.candidate_status: ~15 rows (approximately)
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


-- Dumping structure for table gac2016.city
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

-- Dumping data for table gac2016.city: ~3 rows (approximately)
/*!40000 ALTER TABLE `city` DISABLE KEYS */;
INSERT INTO `city` (`id`, `city`, `address`, `time`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
	(1, 'Jakarta', 'ADirect Tower Jl Mampang Prapatan 8 No R25 C-D', 'Senin, 11 Juli 2016', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(2, 'Bandung', 'Gedung Asia Afrika No 7', 'Selasa, 12 Juli 2016', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(3, 'Cianjur', 'Gedung Monas Cianjurs', 'Rabu, 13 Juli 2016', 12, '2016-07-13 08:52:46', 12, '2016-07-13 08:53:00');
/*!40000 ALTER TABLE `city` ENABLE KEYS */;


-- Dumping structure for table gac2016.user
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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table gac2016.user: ~7 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `name`, `username`, `password`, `level`, `ip_login`, `date_login`, `user_agent`, `status`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
	(12, 'Adam Prasetia', 'damz', '202cb962ac59075b964b07152d234b70', 1, '::1', '2017-07-17 03:15:48', 'Windows 7(Google Chrome 59.0.3071.115)', 1, 0, '0000-00-00 00:00:00', 12, '2016-02-01 23:44:22'),
	(13, 'Teguh Santoso', 'teguh', 'e2f9f842fd8e1ae90dc428d39cab7167', 1, '127.0.0.1', '2016-02-01 17:11:28', 'Windows 7(Google Chrome 48.0.2564.97)', 1, 1, '2016-02-01 17:07:02', 0, '0000-00-00 00:00:00'),
	(14, 'Jaka', 'jack', '202cb962ac59075b964b07152d234b70', 3, '', '0000-00-00 00:00:00', '', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(15, 'Bhakti', 'bray', '202cb962ac59075b964b07152d234b70', 3, '', '0000-00-00 00:00:00', '', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(16, 'Joko', 'jojo', '202cb962ac59075b964b07152d234b70', 2, '', '0000-00-00 00:00:00', '', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(17, 'Irfan Hamidal', 'irfan', '202cb962ac59075b964b07152d234b70', 3, '', '0000-00-00 00:00:00', '', 1, 0, '2016-02-04 09:33:35', 0, '0000-00-00 00:00:00'),
	(18, 'M Suprapto', 'atoe', 'caf1a3dfb505ffed0d024130f58c5cfa', 3, '', '0000-00-00 00:00:00', '', 1, 0, '2016-02-04 09:35:32', 0, '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;


-- Dumping structure for table gac2016.user_level
CREATE TABLE IF NOT EXISTS `user_level` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `user_create` int(11) NOT NULL,
  `date_create` datetime NOT NULL,
  `user_update` int(11) NOT NULL,
  `date_update` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table gac2016.user_level: ~3 rows (approximately)
/*!40000 ALTER TABLE `user_level` DISABLE KEYS */;
INSERT INTO `user_level` (`id`, `name`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
	(1, 'Admin', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(2, 'Auditor', 0, '0000-00-00 00:00:00', 12, '2016-02-02 22:08:19'),
	(3, 'Interviewer', 0, '2016-01-03 03:06:57', 12, '2016-04-13 18:13:39');
/*!40000 ALTER TABLE `user_level` ENABLE KEYS */;


-- Dumping structure for table gac2016.user_status
CREATE TABLE IF NOT EXISTS `user_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `user_create` int(11) NOT NULL,
  `date_create` datetime NOT NULL,
  `user_update` int(11) NOT NULL,
  `date_update` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table gac2016.user_status: ~2 rows (approximately)
/*!40000 ALTER TABLE `user_status` DISABLE KEYS */;
INSERT INTO `user_status` (`id`, `name`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
	(1, 'Active', 0, '2015-10-31 14:00:03', 0, '2015-11-28 02:32:32'),
	(2, 'Not Active', 0, '2015-10-31 14:00:03', 12, '2016-02-01 23:22:27');
/*!40000 ALTER TABLE `user_status` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
