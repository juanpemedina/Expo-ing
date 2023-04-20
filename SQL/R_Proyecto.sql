-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 08, 2015 at 01:21 PM
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
-- Table structure for table `projectos2`
--

CREATE TABLE IF NOT EXISTS `R_Proyecto` (
  `Id_Proyecto` int(11) NOT NULL AUTO_INCREMENT,
  `Nomina` varchar(50) DEFAULT NULL,
  `Id_Edicion` int(11) DEFAULT NULL,
  `Id_Area` int(11) DEFAULT NULL,
  `Id_Uf` int(11) DEFAULT NULL,
  `Id_Nivel` int(11) DEFAULT NULL,
  `NombrePy` varchar(50) DEFAULT NULL,
  `Descripcion` varchar(100) DEFAULT NULL,
  `Multimedia` varchar(100) DEFAULT NULL,
  `Calif_Final` float(5) DEFAULT NULL,
  `Autorizacion` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`Id_Proyecto`),
  FOREIGN KEY (`Nomina`) REFERENCES `R_Profesor`(`Nomina`) ON UPDATE CASCADE ON DELETE SET NULL,
  FOREIGN KEY (`Id_Edicion`) REFERENCES `R_Edicion`(`Id_Edicion`) ON UPDATE CASCADE ON DELETE SET NULL,
  FOREIGN KEY (`Id_Area`) REFERENCES `R_Area_Estrategica`(`Id_Area`) ON UPDATE CASCADE ON DELETE SET NULL,
  FOREIGN KEY (`Id_Uf`) REFERENCES `R_Unidad_Formacion`(`Id_Uf`) ON UPDATE CASCADE ON DELETE SET NULL,
  FOREIGN KEY (`Id_Nivel`) REFERENCES `R_Nivel_Desarrollo`(`Id_Nivel`) ON UPDATE CASCADE ON DELETE SET NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

--
-- Dumping data for table `auto2`
--

INSERT INTO `R_Proyecto` (`Id_Proyecto`, `Nomina`, `Id_Edicion`, `Id_Area`, `Id_Uf`, `Id_Nivel`, `NombrePy`, `Descripcion`, `Multimedia`, `Calif_Final`, `Autorizacion`) VALUES
(2, 'L012345', 1, 1, 2, 1, 'hotel', 'Construir un hotel', 'http://linkfalso1', NULL, 1),
(3, 'L067890', 2, 1, 1, 2, 'trivago', 'Hacer pagina web para reservar cuartos', 'http://linkfalso2', NULL, 0),
(4, 'L013579', 3, 2, 2, 3, 'proyecto', 'Hacer un proyecto', 'http://linkfalso3', NULL, 0),
(5, 'L024680', 1, 2, 3, 1, 'otro', 'Hacer otra cosa', 'http://linkfalso4', NULL, 1),
(29, 'L012459', 2, 1, 3, 1, 'peaches', 'Cultivar duraznos', 'http://linkfalso5', NULL, 1),
(30, 'L067890', 3, 2, 1, 2, 'inge', 'Crear una nueva ingenieria', 'http://linkfalso6', NULL, 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auto2`
--
ALTER TABLE `projectos`
  ADD CONSTRAINT `projectos2_ibfk_1` FOREIGN KEY (`idarea`) REFERENCES `areas` (`idarea`);
  
CREATE TABLE R_Juez_Proyecto_Calif(
	Id_Juez VARCHAR(50) DEFAULT NULL, 
	Id_Proyecto INT(11) DEFAULT NULL, 
	TipoUsuario VARCHAR(50) DEFAULT NULL, 
	Calificacion FLOAT(5) DEFAULT NULL, 
	Nomina VARCHAR(50) DEFAULT NULL, 
FOREIGN KEY (Id_Juez) REFERENCES R_Juez(Id_Juez) ON UPDATE CASCADE ON DELETE SET NULL, 
FOREIGN KEY (Id_Proyecto) REFERENCES R_Proyecto(Id_Proyecto) ON UPDATE CASCADE ON DELETE SET NULL, 
FOREIGN KEY (Nomina) REFERENCES R_Profesor(Nomina) ON UPDATE CASCADE ON DELETE SET NULL);



  

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
