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
-- Table structure for table `uf2`
--

CREATE TABLE IF NOT EXISTS `R_Unidad_Formacion` (
  `Id_Uf` int(11) NOT NULL AUTO_INCREMENT,
  `NombreUf` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id_Uf`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `areas2`
--

INSERT INTO `R_Unidad_Formacion` (`Id_Uf`, `NombreUf`) VALUES
(1, 'TC1'),
(2, 'TC2'),
(3, 'TC3');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
