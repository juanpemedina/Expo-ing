

CREATE TABLE R_Juez_Proyecto_Calif(




	Id_Juez VARCHAR(50),


	Id_Proyecto INT(11),


	TipoUsuario VARCHAR(50),


	Calificacion FLOAT(5) DEFAULT NULL,


	Nomina VARCHAR(50),


FOREIGN KEY (Id_Juez) REFERENCES R_Juez(Id_Juez) ON UPDATE CASCADE ON DELETE SET NULL,


FOREIGN KEY (Id_Proyecto) REFERENCES R_Proyecto(Id_Proyecto) ON UPDATE CASCADE ON DELETE SET NULL,


FOREIGN KEY (Nomina) REFERENCES R_Profesor(Nomina) ON UPDATE CASCADE ON DELETE SET NULL);






JUEZZ:

CREATE TABLE IF NOT EXISTS `R_Juez` (




 `Id_Juez` varchar(50) PRIMARY KEY,


 `Contrasenia` varchar(50),


 `NombreJu` varchar(50),


 `ApellidoJu` varchar(50) DEFAULT NULL,






ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;



CREATE TABLE R_Juez (Id_Juez varchar(50) PRIMARY KEY, Contrasenia varchar(50), NombreJu varchar(50), ApellidoJu varchar(50));



CREATE TABLE IF NOT EXISTS `R_Proyecto` (




 `Id_Proyecto` int(11) NOT NULL AUTO_INCREMENT,


 `Nomina` varchar(50),


 `Id_Edicion` int(11),


 `Id_Area` int(11),


 `Id_Uf` int(11),


 `Id_Nivel` int(11),


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

ALUMNO PROYECTO;

CREATE TABLE IF NOT EXISTS `R_Alumno_Proyecto` (




 `Matricula` varchar(50),


 `Id_Proyecto` int(11),


 FOREIGN KEY (`Matricula`) REFERENCES `R_Alumno`(`Matricula`) ON UPDATE CASCADE ON DELETE SET NULL,


 FOREIGN KEY (`Id_Proyecto`) REFERENCES `R_Proyecto`(`Id_Proyecto`) ON UPDATE CASCADE ON DELETE SET NULL


) ENGINE=InnoDB  DEFAULT CHARSET=latin1;


PROFESOR:


CREATE TABLE IF NOT EXISTS `R_Profesor` (




 `Nomina` varchar(50) PRIMARY KEY,


 `Contrasenia` varchar(50) DEFAULT NULL,


 `NombrePr` varchar(50) DEFAULT NULL,


 `ApellidoPr` varchar(50) DEFAULT NULL,


 `Es_Juez` tinyint(1) DEFAULT NULL


);

CREATE TABLE IF NOT EXISTS `R_Profesor_Uf` (




 `Nomina` varchar(50) ,


 `Id_Uf` int(11),


 FOREIGN KEY (`Nomina`) REFERENCES `R_Profesor`(`Nomina`) ON UPDATE CASCADE ON DELETE SET NULL,


 FOREIGN KEY (`Id_Uf`) REFERENCES `R_Unidad_Formacion` (`Id_Uf`) ON UPDATE CASCADE ON DELETE SET NULL


) ;



