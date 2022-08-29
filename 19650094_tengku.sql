-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for 19650117_josse_saw
CREATE DATABASE IF NOT EXISTS `19650117_josse_saw` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `19650117_josse_saw`;

-- Dumping structure for table 19650117_josse_saw.alternatif
CREATE TABLE IF NOT EXISTS `alternatif` (
  `idalternatif` int(11) NOT NULL AUTO_INCREMENT,
  `nmalternatif` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idalternatif`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table 19650117_josse_saw.alternatif: ~3 rows (approximately)
/*!40000 ALTER TABLE `alternatif` DISABLE KEYS */;
INSERT IGNORE INTO `alternatif` (`idalternatif`, `nmalternatif`) VALUES
	(1, 'Sangat Teratur'),
	(2, 'Teratur'),
	(3, 'Tidak Teratur');
/*!40000 ALTER TABLE `alternatif` ENABLE KEYS */;

-- Dumping structure for table 19650117_josse_saw.bobot
CREATE TABLE IF NOT EXISTS `bobot` (
  `idbobot` int(11) NOT NULL AUTO_INCREMENT,
  `idkriteria` int(11) DEFAULT NULL,
  `valuex` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idbobot`),
  KEY `idkriteria` (`idkriteria`),
  CONSTRAINT `FK_idkriteria` FOREIGN KEY (`idkriteria`) REFERENCES `kriteria` (`idkriteria`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table 19650117_josse_saw.bobot: ~4 rows (approximately)
/*!40000 ALTER TABLE `bobot` DISABLE KEYS */;
INSERT IGNORE INTO `bobot` (`idbobot`, `idkriteria`, `valuex`) VALUES
	(1, 1, '0.52'),
	(2, 2, '0.27'),
	(3, 3, '0.145'),
	(4, 4, '0.06');
/*!40000 ALTER TABLE `bobot` ENABLE KEYS */;

-- Dumping structure for table 19650117_josse_saw.kriteria
CREATE TABLE IF NOT EXISTS `kriteria` (
  `idkriteria` int(11) NOT NULL AUTO_INCREMENT,
  `nmkriteria` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idkriteria`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table 19650117_josse_saw.kriteria: ~4 rows (approximately)
/*!40000 ALTER TABLE `kriteria` DISABLE KEYS */;
INSERT IGNORE INTO `kriteria` (`idkriteria`, `nmkriteria`) VALUES
	(1, 'Organisasi dan Manajemen'),
	(2, 'Teknis dan Produksi'),
	(3, 'Finansial'),
	(4, 'Pasar dan Pemasaran');
/*!40000 ALTER TABLE `kriteria` ENABLE KEYS */;

-- Dumping structure for table 19650117_josse_saw.matrixkeputusan
CREATE TABLE IF NOT EXISTS `matrixkeputusan` (
  `idmatrix` int(11) NOT NULL AUTO_INCREMENT,
  `idalternatif` int(11) DEFAULT NULL,
  `idbobot` int(11) DEFAULT NULL,
  `idskala` int(11) DEFAULT NULL,
  PRIMARY KEY (`idmatrix`),
  KEY `idalternatif` (`idalternatif`),
  KEY `idbobot` (`idbobot`),
  KEY `idkriteria` (`idskala`),
  CONSTRAINT `FK_alternatif` FOREIGN KEY (`idalternatif`) REFERENCES `alternatif` (`idalternatif`),
  CONSTRAINT `FK_bobot` FOREIGN KEY (`idbobot`) REFERENCES `bobot` (`idbobot`),
  CONSTRAINT `FK_skala` FOREIGN KEY (`idskala`) REFERENCES `skala` (`idskala`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- Dumping data for table 19650117_josse_saw.matrixkeputusan: ~12 rows (approximately)
/*!40000 ALTER TABLE `matrixkeputusan` DISABLE KEYS */;
INSERT IGNORE INTO `matrixkeputusan` (`idmatrix`, `idalternatif`, `idbobot`, `idskala`) VALUES
	(1, 1, 1, 1),
	(2, 1, 2, 1),
	(3, 1, 3, 1),
	(4, 1, 4, 1),
	(5, 2, 1, 2),
	(6, 2, 2, 2),
	(7, 2, 3, 2),
	(8, 2, 4, 2),
	(9, 3, 1, 3),
	(10, 3, 2, 3),
	(11, 3, 3, 3),
	(12, 3, 4, 3);
/*!40000 ALTER TABLE `matrixkeputusan` ENABLE KEYS */;

-- Dumping structure for view 19650117_josse_saw.nilaimax
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `nilaimax` (
	`idkriteria` INT(11) NOT NULL,
	`nmkriteria` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`maksimum` INT(11) NULL
) ENGINE=MyISAM;

-- Dumping structure for view 19650117_josse_saw.prarangking
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `prarangking` (
	`idmatrix` INT(11) NOT NULL,
	`idalternatif` INT(11) NOT NULL,
	`nmalternatif` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`idkriteria` INT(11) NOT NULL,
	`nmkriteria` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`idbobot` INT(11) NOT NULL,
	`valuex` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`nilai` INT(11) NULL,
	`keterangan` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`normalisasi` DECIMAL(14,4) NULL,
	`prarangking` DOUBLE NULL
) ENGINE=MyISAM;

-- Dumping structure for table 19650117_josse_saw.skala
CREATE TABLE IF NOT EXISTS `skala` (
  `idskala` int(11) NOT NULL AUTO_INCREMENT,
  `valuex` int(11) DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idskala`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table 19650117_josse_saw.skala: ~3 rows (approximately)
/*!40000 ALTER TABLE `skala` DISABLE KEYS */;
INSERT IGNORE INTO `skala` (`idskala`, `valuex`, `keterangan`) VALUES
	(1, 1, 'Tidak Teratur'),
	(2, 2, 'Teratur'),
	(3, 3, 'Sangat Teratur');
/*!40000 ALTER TABLE `skala` ENABLE KEYS */;

-- Dumping structure for view 19650117_josse_saw.vmatrixkeputusan
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `vmatrixkeputusan` (
	`idmatrix` INT(11) NOT NULL,
	`idalternatif` INT(11) NOT NULL,
	`nmalternatif` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`idkriteria` INT(11) NOT NULL,
	`nmkriteria` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`idbobot` INT(11) NOT NULL,
	`valuex` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`nilai` INT(11) NULL,
	`keterangan` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;

-- Dumping structure for view 19650117_josse_saw.vnormalisasi
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `vnormalisasi` (
	`idmatrix` INT(11) NOT NULL,
	`idalternatif` INT(11) NOT NULL,
	`nmalternatif` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`idkriteria` INT(11) NOT NULL,
	`nmkriteria` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`idbobot` INT(11) NOT NULL,
	`valuex` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`nilai` INT(11) NULL,
	`keterangan` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`normalisasi` DECIMAL(14,4) NULL
) ENGINE=MyISAM;

-- Dumping structure for view 19650117_josse_saw.vrangking
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `vrangking` (
	`idalternatif` INT(11) NOT NULL,
	`nmalternatif` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`rangking` DOUBLE NULL
) ENGINE=MyISAM;

-- Dumping structure for view 19650117_josse_saw.wp_jumbobot
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `wp_jumbobot` (
	`jumlah` DOUBLE NULL
) ENGINE=MyISAM;

-- Dumping structure for view 19650117_josse_saw.wp_nilais
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `wp_nilais` (
	`idalternatif` INT(11) NOT NULL,
	`nmalternatif` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`nilaiS` DOUBLE NULL
) ENGINE=MyISAM;

-- Dumping structure for view 19650117_josse_saw.wp_nilaiv
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `wp_nilaiv` (
	`idalternatif` INT(11) NOT NULL,
	`nmalternatif` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`nilaiv` DOUBLE NULL
) ENGINE=MyISAM;

-- Dumping structure for view 19650117_josse_saw.wp_normalisasiterbobot
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `wp_normalisasiterbobot` (
	`idbobot` INT(11) NOT NULL,
	`idkriteria` INT(11) NULL,
	`valuex` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`jumlah` DOUBLE NULL,
	`normalisasi_w` DOUBLE NULL
) ENGINE=MyISAM;

-- Dumping structure for view 19650117_josse_saw.wp_pangkat
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `wp_pangkat` (
	`idmatrix` INT(11) NOT NULL,
	`idalternatif` INT(11) NOT NULL,
	`nmalternatif` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`idkriteria` INT(11) NOT NULL,
	`nmkriteria` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`idbobot` INT(11) NOT NULL,
	`valuex` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`nilai` INT(11) NULL,
	`keterangan` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`normalisasi_w` DOUBLE NULL,
	`pangkat` DOUBLE NULL
) ENGINE=MyISAM;

-- Dumping structure for view 19650117_josse_saw.wp_sums
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `wp_sums` (
	`jum` DOUBLE NULL
) ENGINE=MyISAM;

-- Dumping structure for view 19650117_josse_saw.nilaimax
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `nilaimax`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `nilaimax` AS SELECT idkriteria,nmkriteria,MAX(nilai) AS maksimum FROM vmatrixkeputusan GROUP BY idkriteria ;

-- Dumping structure for view 19650117_josse_saw.prarangking
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `prarangking`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `prarangking` AS SELECT vnormalisasi.*,(vnormalisasi.valuex*vnormalisasi.normalisasi) AS prarangking FROM vnormalisasi GROUP BY vnormalisasi.idmatrix ;

-- Dumping structure for view 19650117_josse_saw.vmatrixkeputusan
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `vmatrixkeputusan`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vmatrixkeputusan` AS SELECT matrixkeputusan.idmatrix,alternatif.*,kriteria.*,bobot.idbobot,bobot.valuex,skala.valuex AS nilai,skala.keterangan FROM matrixkeputusan,skala,bobot,kriteria,alternatif WHERE matrixkeputusan.idalternatif=alternatif.idalternatif AND matrixkeputusan.idbobot=bobot.idbobot AND matrixkeputusan.idskala=skala.idskala AND kriteria.idkriteria=bobot.idkriteria ;

-- Dumping structure for view 19650117_josse_saw.vnormalisasi
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `vnormalisasi`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vnormalisasi` AS SELECT vmatrixkeputusan.*,(vmatrixkeputusan.nilai/nilaimax.maksimum) AS normalisasi FROM vmatrixkeputusan,nilaimax WHERE nilaimax.idkriteria=vmatrixkeputusan.idkriteria GROUP BY vmatrixkeputusan.idmatrix ;

-- Dumping structure for view 19650117_josse_saw.vrangking
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `vrangking`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vrangking` AS SELECT idalternatif,nmalternatif,SUM(prarangking) AS rangking FROM prarangking GROUP BY idalternatif ;

-- Dumping structure for view 19650117_josse_saw.wp_jumbobot
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `wp_jumbobot`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `wp_jumbobot` AS SELECT SUM(valuex) AS jumlah FROM bobot ;

-- Dumping structure for view 19650117_josse_saw.wp_nilais
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `wp_nilais`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `wp_nilais` AS SELECT alternatif.idalternatif,alternatif.nmalternatif,EXP(SUM(LOG(wp_pangkat.pangkat))) AS nilaiS FROM alternatif,wp_pangkat GROUP BY idalternatif ;

-- Dumping structure for view 19650117_josse_saw.wp_nilaiv
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `wp_nilaiv`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `wp_nilaiv` AS SELECT wp_nilais.idalternatif,wp_nilais.nmalternatif,(nilaiS/jum) AS nilaiv FROM wp_nilais,wp_sums ;

-- Dumping structure for view 19650117_josse_saw.wp_normalisasiterbobot
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `wp_normalisasiterbobot`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `wp_normalisasiterbobot` AS SELECT bobot.*,wp_jumbobot.jumlah,(bobot.valuex/wp_jumbobot.jumlah) AS normalisasi_w FROM bobot,wp_jumbobot ;

-- Dumping structure for view 19650117_josse_saw.wp_pangkat
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `wp_pangkat`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `wp_pangkat` AS SELECT vmatrixkeputusan.*,wp_normalisasiterbobot.normalisasi_w,POW(vmatrixkeputusan.nilai,wp_normalisasiterbobot.normalisasi_w) AS pangkat FROM vmatrixkeputusan,wp_normalisasiterbobot WHERE wp_normalisasiterbobot.idkriteria=vmatrixkeputusan.idkriteria ;

-- Dumping structure for view 19650117_josse_saw.wp_sums
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `wp_sums`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `wp_sums` AS SELECT SUM(wp_nilais.nilaiS) AS jum FROM wp_nilais ;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
