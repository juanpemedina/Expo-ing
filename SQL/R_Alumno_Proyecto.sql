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
-- Table structure for table `alumnos_p2`
--

CREATE TABLE IF NOT EXISTS `R_Alumno_Proyecto` (
  `Matricula` varchar(50) DEFAULT NULL,
  `Id_Proyecto` int(11) DEFAULT NULL,
  FOREIGN KEY (`Matricula`) REFERENCES `R_Alumno`(`Matricula`) ON UPDATE CASCADE ON DELETE SET NULL,
  FOREIGN KEY (`Id_Proyecto`) REFERENCES `R_Proyecto`(`Id_Proyecto`) ON UPDATE CASCADE ON DELETE SET NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alumno2`
--

INSERT INTO `R_Alumno_Proyecto` (`Matricula`, `Id_Proyecto`) VALUES
('A01736380', 2),
('A01735320', 4),
('A01734370', 5),
('A01736390', 29),
('A01735390', 30),
('A01734380', 3),
('A01736310', 4),
('A01737370', 29),
('A01733380', 5),
('A01736312', 30);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `profesor2`
--
ALTER TABLE `alumnos_p`
  ADD CONSTRAINT `alumnos_p2_ibfk_1` FOREIGN KEY (`idprojecto`) REFERENCES `projectos` (`idprojecto`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
