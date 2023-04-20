-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 08, 2015 at 01:22 PM
-- Server version: 5.5.41-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `proyectos`
--

-- --------------------------------------------------------

--
-- Table structure for table `profesores2`
--

CREATE TABLE IF NOT EXISTS `R_Profesor` (
  `Nomina` varchar(50) NOT NULL,
  `Contrasenia` varchar(50) DEFAULT NULL,
  `NombrePr` varchar(50) DEFAULT NULL,
  `ApellidoPr` varchar(50) DEFAULT NULL,
  `Es_Juez` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`Nomina`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Dumping data for table `areas2`
--

INSERT INTO `R_Profesor` (`Nomina`, `Contrasenia`, `NombrePr`, `ApellidoPr`) VALUES
('L012345', '12345', 'Dan', 'Perez'),
('L067890', '67890', 'Nombre', 'Apellido'),
('L013579', 'abcd', 'Armando', 'Casas'),
('L024680', 'efgh', 'Rosa', 'Lopez'),
('L012459', 'ijkl', 'Naruto', 'Uzumaki');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
