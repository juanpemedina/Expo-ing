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
-- Table structure for table `profesores_uf2`
--

CREATE TABLE IF NOT EXISTS `R_Profesor_Uf` (
  `Nomina` varchar(50) DEFAULT NULL,
  `Id_Uf` int(11) DEFAULT NULL,
  FOREIGN KEY (`Nomina`) REFERENCES `R_Profesor`(`Nomina`) ON UPDATE CASCADE ON DELETE SET NULL,
  FOREIGN KEY (`Id_Uf`) REFERENCES `R_Unidad_Formacion` (`Id_Uf`) ON UPDATE CASCADE ON DELETE SET NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alumno2`
--

INSERT INTO `R_Profesor_Uf` (`Nomina`, `Id_Uf`) VALUES
('L012345', 2),
('L067890', 1),
('L013579', 2),
('L024680', 3),
('L012459', 3);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `profesor2`
--
ALTER TABLE `profesores_uf`
  ADD CONSTRAINT `profesores_uf2_ibfk_1` FOREIGN KEY (`iduf`) REFERENCES `uf` (`iduf`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
