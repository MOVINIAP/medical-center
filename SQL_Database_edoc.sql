-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 02, 2024 at 01:39 PM
-- Server version: 5.7.26
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
-- Database: `edoc`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `aemail` varchar(255) NOT NULL,
  `apassword` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`aemail`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aemail`, `apassword`) VALUES
('admin@medicalcenter.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

DROP TABLE IF EXISTS `appointment`;
CREATE TABLE IF NOT EXISTS `appointment` (
  `appoid` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(10) DEFAULT NULL,
  `apponum` int(3) DEFAULT NULL,
  `scheduleid` int(10) DEFAULT NULL,
  `appodate` date DEFAULT NULL,
  PRIMARY KEY (`appoid`),
  KEY `pid` (`pid`),
  KEY `scheduleid` (`scheduleid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appoid`, `pid`, `apponum`, `scheduleid`, `appodate`) VALUES
(1, 1, 1, 1, '2024-08-14');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

DROP TABLE IF EXISTS `doctor`;
CREATE TABLE IF NOT EXISTS `doctor` (
  `docid` int(11) NOT NULL AUTO_INCREMENT,
  `docemail` varchar(255) DEFAULT NULL,
  `docname` varchar(255) DEFAULT NULL,
  `docpassword` varchar(255) DEFAULT NULL,
  `docnic` varchar(15) DEFAULT NULL,
  `doctel` varchar(15) DEFAULT NULL,
  `specialties` int(2) DEFAULT NULL,
  PRIMARY KEY (`docid`),
  KEY `specialties` (`specialties`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`docid`, `docemail`, `docname`, `docpassword`, `docnic`, `doctel`, `specialties`) VALUES
(1, 'rinoariaslaaz@gmail.com', 'Dr Rino Arias', '123', '1207921121', '0960235487', 1);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

DROP TABLE IF EXISTS `patient`;
CREATE TABLE IF NOT EXISTS `patient` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `pemail` varchar(255) DEFAULT NULL,
  `pname` varchar(255) DEFAULT NULL,
  `ppassword` varchar(255) DEFAULT NULL,
  `paddress` varchar(255) DEFAULT NULL,
  `pnic` varchar(15) DEFAULT NULL,
  `pdob` date DEFAULT NULL,
  `ptel` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`pid`, `pemail`, `pname`, `ppassword`, `paddress`, `pnic`, `pdob`, `ptel`) VALUES
(1, 'michell.aviles2018@uteq.edu.ec', 'Susan Aviles', '123', 'Ecuador', '1200096037', '1999-12-06', '0998505534'),
(2, 'ericka.bravo2018@uteq.edu.ec', 'Ericka Bravo', '123', 'Ecuador', '1207522549', '2000-08-26', '0988600128');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

DROP TABLE IF EXISTS `schedule`;
CREATE TABLE IF NOT EXISTS `schedule` (
  `scheduleid` int(11) NOT NULL AUTO_INCREMENT,
  `docid` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `scheduledate` date DEFAULT NULL,
  `scheduletime` time DEFAULT NULL,
  `nop` int(4) DEFAULT NULL,
  PRIMARY KEY (`scheduleid`),
  KEY `docid` (`docid`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`scheduleid`, `docid`, `title`, `scheduledate`, `scheduletime`, `nop`) VALUES
(1, '1', 'Test Session', '2050-01-01', '18:00:00', 50),
(2, '1', '1', '2024-09-14', '20:36:00', 1),
(3, '1', '12', '2024-09-14', '20:33:00', 1),
(4, '1', '1', '2024-09-14', '12:32:00', 1),
(5, '1', '1', '2024-09-14', '20:35:00', 1),
(6, '1', '12', '2024-09-14', '20:35:00', 1),
(7, '1', '1', '2024-09-14', '20:36:00', 1),
(8, '1', '12', '2024-09-14', '13:33:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `specialties`
--

DROP TABLE IF EXISTS `specialties`;
CREATE TABLE IF NOT EXISTS `specialties` (
  `id` int(2) NOT NULL,
  `sname` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `specialties`
--

INSERT INTO `specialties` (`id`, `sname`) VALUES
(1, 'Medicina de urgencias y emergencias'),
(2, 'Alergologia'),
(3, 'Anestesia'),
(4, 'Hematologia biologica'),
(5, 'Cardiologia'),
(6, 'Psiquiatria infantil'),
(7, 'Biologia clinica'),
(8, 'Quimica clinica'),
(9, 'Neurofisiologia clinica'),
(10, 'Radiologia clinica'),
(11, 'Cirugia dental, oral y maxilofacial'),
(12, 'Dermato-venerologia'),
(13, 'Dermatologia'),
(14, 'Endocrinologia'),
(15, 'Cirugia gastroenterologica'),
(16, 'Gastroenterologia'),
(17, 'Hematologia general'),
(18, 'Practica general'),
(19, 'Cirugia general'),
(20, 'Geriatria'),
(21, 'Inmunologia'),
(22, 'Enfermedades infecciosas'),
(23, 'Medicina interna'),
(24, 'Medicina de laboratorio'),
(25, 'Cirugia maxilofacial'),
(26, 'Microbiologia'),
(27, 'Nefrologia'),
(28, 'Neuropsiquiatria'),
(29, 'Neurologia'),
(30, 'Neurocirugia'),
(31, 'Medicina nuclear'),
(32, 'Obstetricia y ginecologia'),
(33, 'Medicina ocupacional'),
(34, 'Oftalmologia'),
(35, 'Ortopedia'),
(36, 'Otorrinolaringologia'),
(37, 'Cirugia pediatrica'),
(38, 'Pediatria'),
(39, 'Patologia'),
(40, 'Farmacologia'),
(41, 'Medicina y rehabilitacion fisica'),
(42, 'Cirugia plastica'),
(43, 'Medicina podologica'),
(44, 'Cirugia podologica'),
(45, 'Psiquiatria'),
(46, 'Salud publica y medicina preventiva'),
(47, 'Radiologia'),
(48, 'Radioterapia'),
(49, 'Medicina respiratoria'),
(50, 'Reumatologia'),
(51, 'Estomatologia'),
(52, 'Cirugia toracica'),
(53, 'Medicina tropical'),
(54, 'Urologia'),
(55, 'Cirugia vascular'),
(56, 'Venereologia');


-- --------------------------------------------------------

--
-- Table structure for table `webuser`
--

DROP TABLE IF EXISTS `webuser`;
CREATE TABLE IF NOT EXISTS `webuser` (
  `email` varchar(255) NOT NULL,
  `usertype` char(1) DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `webuser`
--

INSERT INTO `webuser` (`email`, `usertype`) VALUES
('admin@medicalcenter.com', 'a'),
('rinoariaslaaz@gmail.com', 'd'),
('michell.aviles2018@uteq.edu.ec', 'p'),
('ericka.bravo2018@uteq.edu.ec', 'p');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
