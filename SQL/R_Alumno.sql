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
-- Table structure for table `alumnos2`
--

CREATE TABLE IF NOT EXISTS `R_Alumno` (
  `Matricula` varchar(50) NOT NULL,
  `Contrasenia` varchar(50) DEFAULT NULL,
  `NombreAl` varchar(50) DEFAULT NULL,
  `ApellidoAl` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Matricula`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alumno2`
--

INSERT INTO `R_Alumno` (`Matricula`, `Contrasenia`, `NombreAl`, `ApellidoAl`) VALUES
('A01736380', '12345', 'Cesar', 'War'),
('A01735320', '67890', 'Nombre', 'Apellido'),
('A01734370', 'abcd', 'Armando', 'Cercas'),
('A01736390', 'ABCD', 'Daniel', 'Lopez'),
('A01735390', 'efgh', 'Sans', 'Undertale'),
('A01734380', 'EFGH', 'Jack', 'Black'),
('A01736310', 'ijkl', 'Hector', 'King'),
('A01737370', 'IJKL', 'San', 'Santos'),
('A01733380', 'mnop', 'Lopez', 'Lopez'),
('A01736312', 'MNOP', 'Yfue', 'Asi');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
