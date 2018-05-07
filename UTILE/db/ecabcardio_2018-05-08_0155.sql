-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 07, 2018 at 10:54 PM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecabcardio`
--

-- --------------------------------------------------------

--
-- Table structure for table `analiza`
--

DROP TABLE IF EXISTS `analiza`;
CREATE TABLE IF NOT EXISTS `analiza` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `denumire` varchar(45) COLLATE utf8_romanian_ci DEFAULT NULL,
  `pret` double(9,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_romanian_ci COMMENT='Analize disponibile sau recomandate';

-- --------------------------------------------------------

--
-- Table structure for table `angajat`
--

DROP TABLE IF EXISTS `angajat`;
CREATE TABLE IF NOT EXISTS `angajat` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `prenume` varchar(45) COLLATE utf8_romanian_ci DEFAULT NULL,
  `nume` varchar(45) COLLATE utf8_romanian_ci DEFAULT NULL,
  `user` varchar(45) COLLATE utf8_romanian_ci DEFAULT NULL,
  `pass` varchar(45) COLLATE utf8_romanian_ci DEFAULT NULL,
  `functie` varchar(45) COLLATE utf8_romanian_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_romanian_ci COMMENT='Lista cu angajații cabinetului';

-- --------------------------------------------------------

--
-- Table structure for table `cabinet`
--

DROP TABLE IF EXISTS `cabinet`;
CREATE TABLE IF NOT EXISTS `cabinet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nume` varchar(45) COLLATE utf8_romanian_ci DEFAULT NULL,
  `logo` varchar(45) COLLATE utf8_romanian_ci DEFAULT NULL,
  `cif` varchar(45) COLLATE utf8_romanian_ci DEFAULT NULL,
  `regCom` varchar(45) COLLATE utf8_romanian_ci DEFAULT NULL,
  `adresa` varchar(145) COLLATE utf8_romanian_ci DEFAULT NULL,
  `banca` varchar(45) COLLATE utf8_romanian_ci DEFAULT NULL,
  `iban` varchar(45) COLLATE utf8_romanian_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_romanian_ci COMMENT='Date despre cabinet';

-- --------------------------------------------------------

--
-- Table structure for table `factura`
--

DROP TABLE IF EXISTS `factura`;
CREATE TABLE IF NOT EXISTS `factura` (
  `id` int(13) NOT NULL AUTO_INCREMENT,
  `data` datetime DEFAULT NULL,
  `cabinet_id` int(5) NOT NULL,
  `serieNr` varchar(45) COLLATE utf8_romanian_ci DEFAULT NULL,
  `pacient_id` int(12) NOT NULL,
  `fisa_id` int(13) NOT NULL,
  `analiza_id` int(5) NOT NULL,
  `angajat_id` int(5) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_factura_cabinet_id` (`cabinet_id`),
  KEY `fk_factura_pacient_id` (`pacient_id`),
  KEY `fk_factura_fisa_id` (`fisa_id`),
  KEY `fk_factura_analiza_id` (`analiza_id`),
  KEY `fk_factura_angajat_id` (`angajat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_romanian_ci COMMENT='Facturi emise';

-- --------------------------------------------------------

--
-- Table structure for table `fisa`
--

DROP TABLE IF EXISTS `fisa`;
CREATE TABLE IF NOT EXISTS `fisa` (
  `id` int(13) NOT NULL AUTO_INCREMENT,
  `pacient_id` int(12) NOT NULL,
  `antecedenteFiziologice` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `antecedentePatologice` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `antecedenteHeteroColaterale` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `conditiiMediu` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `stareaPrezenta` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `aparatCirculator` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `exameneLocaleComplementare` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `antecedentePersonale` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `motiveleConsultului` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `observatii` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `diagnostic` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `recomandări` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `tratament` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `angajat_id` int(5) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_fisa_pacient_id` (`pacient_id`),
  KEY `fk_fisa_angajat_id` (`angajat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_romanian_ci COMMENT='Fișa pacientului';

-- --------------------------------------------------------

--
-- Table structure for table `fisa_analize`
--

DROP TABLE IF EXISTS `fisa_analize`;
CREATE TABLE IF NOT EXISTS `fisa_analize` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fisa_id` int(13) DEFAULT NULL,
  `analize_id` int(5) DEFAULT NULL,
  `pret` double(9,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_fisa_analize_fisa_id` (`fisa_id`),
  KEY `fk_fisa_analize_analize_id` (`analize_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_romanian_ci COMMENT='Tabelă de legătură cu detalii despre analizele efectuate';

-- --------------------------------------------------------

--
-- Table structure for table `incasari`
--

DROP TABLE IF EXISTS `incasari`;
CREATE TABLE IF NOT EXISTS `incasari` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` datetime DEFAULT NULL,
  `suma` double(9,2) DEFAULT NULL,
  `factura_id` int(13) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_incasari_factura_id` (`factura_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_romanian_ci COMMENT='Lista încasărilor făcute de cabinet';

-- --------------------------------------------------------

--
-- Table structure for table `pacient`
--

DROP TABLE IF EXISTS `pacient`;
CREATE TABLE IF NOT EXISTS `pacient` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `numarPacient` varchar(45) COLLATE utf8_romanian_ci DEFAULT NULL,
  `nume` varchar(45) COLLATE utf8_romanian_ci DEFAULT NULL,
  `prenume` varchar(45) COLLATE utf8_romanian_ci DEFAULT NULL,
  `dataNasterii` date DEFAULT NULL,
  `judet` varchar(45) COLLATE utf8_romanian_ci DEFAULT NULL,
  `localitate` varchar(45) COLLATE utf8_romanian_ci DEFAULT NULL,
  `adresa` varchar(145) COLLATE utf8_romanian_ci DEFAULT NULL,
  `ocupatie` varchar(45) COLLATE utf8_romanian_ci DEFAULT NULL,
  `locMunca` varchar(45) COLLATE utf8_romanian_ci DEFAULT NULL,
  `telefon` varchar(45) COLLATE utf8_romanian_ci DEFAULT NULL,
  `email` varchar(45) COLLATE utf8_romanian_ci DEFAULT NULL,
  `cnp` int(16) DEFAULT NULL,
  `stareaCivila` varchar(20) COLLATE utf8_romanian_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_romanian_ci COMMENT='Baza de date pentru proiectul \neCabCardio';

--
-- Constraints for dumped tables
--

--
-- Constraints for table `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `factura_analiza_id` FOREIGN KEY (`analiza_id`) REFERENCES `analiza` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `factura_angajat_id` FOREIGN KEY (`angajat_id`) REFERENCES `angajat` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `factura_cabinet_id` FOREIGN KEY (`cabinet_id`) REFERENCES `cabinet` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `factura_fisa_id` FOREIGN KEY (`fisa_id`) REFERENCES `fisa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `factura_pacient_id` FOREIGN KEY (`pacient_id`) REFERENCES `pacient` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `fisa`
--
ALTER TABLE `fisa`
  ADD CONSTRAINT `fisa_angajat_id` FOREIGN KEY (`angajat_id`) REFERENCES `angajat` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fisa_pacient_id` FOREIGN KEY (`pacient_id`) REFERENCES `pacient` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `fisa_analize`
--
ALTER TABLE `fisa_analize`
  ADD CONSTRAINT `fisa_analize_analiza_id` FOREIGN KEY (`analize_id`) REFERENCES `analiza` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fisa_analize_fisa_id` FOREIGN KEY (`fisa_id`) REFERENCES `fisa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `incasari`
--
ALTER TABLE `incasari`
  ADD CONSTRAINT `incasari_factura_id` FOREIGN KEY (`factura_id`) REFERENCES `factura` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
