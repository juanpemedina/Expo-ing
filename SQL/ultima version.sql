CREACIÓN DE TABLAS:
ALUMNO:
CREATE TABLE R_Alumno(Matricula VARCHAR (50)  NOT NULL PRIMARY KEY, Contrasenia VARCHAR (50), Nombre VARCHAR (50), Apellido VARCHAR (50));

Admin:
CREATE TABLE R_Administrador(Id_Admin INT NOT NULL AUTO_INCREMENT PRIMARY KEY, Contrasenia VARCHAR (50), Nombre VARCHAR (50), Apellido VARCHAR (50));

Profesor:
CREATE TABLE R_Profesor(Nomina VARCHAR (50) NOT NULL PRIMARY KEY, Contrasenia VARCHAR (50), Nombre VARCHAR (50), Apellido VARCHAR (50), Es_Juez BOOL);

Edicion:
CREATE TABLE R_Edicion(Id_Edicion INT NOT NULL AUTO_INCREMENT PRIMARY KEY, Nombre VARCHAR (50));

Juez:
CREATE TABLE R_Juez(Id_Juez INT NOT NULL AUTO_INCREMENT PRIMARY KEY, Contrasenia VARCHAR (50), Nombre VARCHAR (50), Apellido VARCHAR (50));

UF:
​​CREATE TABLE R_Unidad_Formacion(Id_Uf INT NOT NULL AUTO_INCREMENT PRIMARY KEY, Nombre VARCHAR (101));

Area estrategica:
CREATE TABLE R_Area_Estrategica(Id_Area INT NOT NULL AUTO_INCREMENT PRIMARY KEY, Nombre VARCHAR (101));

Nivel:
CREATE TABLE R_Nivel_Desarrollo(Id_Nivel INT NOT NULL AUTO_INCREMENT PRIMARY KEY, Nivel VARCHAR (101));

Anuncio:
CREATE TABLE R_Anuncio(Id_Anuncio INT NOT NULL AUTO_INCREMENT PRIMARY KEY,Id_Admin INT, Titulo VARCHAR (100), Texto VARCHAR (500), Imagen longblob, FOREIGN KEY (Id_Admin) REFERENCES R_Administrador(Id_Admin) ON UPDATE CASCADE ON DELETE SET NULL);

Profesor_Uf:

CREATE TABLE R_Profesor_Uf(Nomina VARCHAR (50), Id_Uf INT, FOREIGN KEY (Nomina) REFERENCES R_Profesor(Nomina)ON UPDATE CASCADE ON DELETE SET NULL, FOREIGN KEY (Id_Uf) REFERENCES R_Unidad_Formacion(Id_Uf) ON UPDATE CASCADE ON DELETE SET NULL);



Proyecto:
CREATE TABLE R_Proyecto(Id_Proyecto INT NOT NULL AUTO_INCREMENT PRIMARY KEY, Nomina VARCHAR(50), Id_Edicion  INT, Id_Area INT, Id_Uf INT, Id_Nivel INT, NombrePy VARCHAR (100), Multimedia LONGBLOB, Calif_Final FLOAT(5), Autorizacion BOOL, FOREIGN KEY (Nomina) REFERENCES R_Profesor(Nomina) ON UPDATE CASCADE ON DELETE SET NULL, FOREIGN KEY (Id_Edicion) REFERENCES R_Edicion(Id_Edicion) ON UPDATE CASCADE ON DELETE SET NULL, FOREIGN KEY (Id_Area) REFERENCES R_Area_Estrategica(Id_Area) ON UPDATE CASCADE ON DELETE SET NULL, FOREIGN KEY (Id_Uf) REFERENCES R_Unidad_Formacion(Id_Uf) ON UPDATE CASCADE ON DELETE SET NULL, FOREIGN KEY (Id_Nivel) REFERENCES R_Nivel_Desarrollo(Id_Nivel)
 ON UPDATE CASCADE ON DELETE SET NULL);

AlumnoProyecto:
CREATE TABLE R_AlumnoProyectos(Matricula VARCHAR(50), Id_Proyecto INT, FOREIGN KEY (Matricula) REFERENCES R_Alumno(Matricula) ON UPDATE CASCADE ON DELETE
 SET NULL, FOREIGN KEY (Id_Proyecto) REFERENCES R_Proyecto(Id_Proyecto) ON UPDATE CASCADE ON DELETE SET NULL);

JuezProyecto_Calif:
CREATE TABLE R_JuezProyecto_Calif(Id_Juez varchar(50), Id_Proyecto INT, TipoUsuario VARCHAR (50), Calificacion INT, Nomina VARCHAR (50),  FOREIGN KEY (Id_Juez) REFERENCES R_Juez(Id_Juez) ON UPDATE CASCADE ON DELETE SET NULL, FOREIGN KEY (Id_Proyecto) REFERENCES R_Proyecto(Id_Proyecto) ON UPDATE CASCADE ON DELETE SET NULL, FOREIGN KEY (Nomina) REFERENCES R_Profesor(Nomina) ON UPDATE CASCADE ON DELETE SET NULL);



CREATE TABLE R_Juez_Proyecto_Calif(




	Id_Juez VARCHAR(50),


	Id_Proyecto INT(11),


	TipoUsuario VARCHAR(50),


	Calificacion FLOAT(5) DEFAULT NULL,


	Nomina VARCHAR(50),


FOREIGN KEY (Id_Juez) REFERENCES R_Juez(Id_Juez) ON UPDATE CASCADE ON DELETE SET NULL,


FOREIGN KEY (Id_Proyecto) REFERENCES R_Proyecto(Id_Proyecto) ON UPDATE CASCADE ON DELETE SET NULL,


FOREIGN KEY (Nomina) REFERENCES R_Profesor(Nomina) ON UPDATE CASCADE ON DELETE SET NULL);



NUEVO:
CREATE TABLE R_JuezProyecto_Calif (
  Id_Juez INT, 
  Id_Proyecto INT, 
  TipoUsuario VARCHAR(50), 
  Calificacion INT, 
  Nomina VARCHAR(50) NOT NULL PRIMARY KEY, 
  FOREIGN KEY (Id_Juez) REFERENCES R_Juez(Id_Juez) ON UPDATE CASCADE ON DELETE SET NULL, 
  FOREIGN KEY (Id_Proyecto) REFERENCES R_Proyecto(Id_Proyecto) ON UPDATE CASCADE ON DELETE SET NULL, 
  FOREIGN KEY (Nomina) REFERENCES R_Profesor(Nomina) ON UPDATE CASCADE ON DELETE CASCADE
);


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



INSERTS:

INSERT INTO R_Edicion (Nombre) VALUES ("FJ 23");

INSERT INTO R_Profesor(Nomina,Contrasenia,Nombre,Apellido) VALUES("L01737634","TROLOLO","Josefa","Ortiz");

INSERT INTO R_Profesor(Nomina,Contrasenia,Nombre,Apellido) VALUES("L01731243","passw0Rd","Enrique","Juarez");

INSERT INTO R_Profesor(Nomina,Contrasenia,Nombre,Apellido) VALUES("L01731222","Tec4eveR","Juan","Dominguez");

INSERT INTO R_Juez(Contrasenia,Nombre,Apellido) VALUES("1232LALA","Pedro","Morras");
INSERT INTO R_Juez(Contrasenia,Nombre,Apellido) VALUES("Leche_con_pan","Pablo","Pinosuarez");

UPDATE R_Profesor SET Es_Juez=1 WHERE Nomina="L01731222";

UPDATE R_Profesor SET Es_Juez=1 WHERE Nomina="L01731243";

INSERT INTO R_Area_Estrategica(Nombre) VALUES("Area_Prueba1");

INSERT INTO R_Unidad_Formacion(Nombre) VALUES("UF_Prueba1");

INSERT INTO R_Nivel_Desarrollo(Nivel) VALUES("Nivel_Prueba1");

INSERT INTO R_Proyecto(Nomina,Id_Edicion,Id_Area,Id_Uf,Id_Nivel,Nombre,Multimedia) VALUES("L01731222",1,1,1,1,"NOMBRE_PROYECTOPRUEBA1","MULTIMEDIA_PRUEBA");

INSERT INTO R_Proyecto(Nomina,Id_Edicion,Id_Area,Id_Uf,Id_Nivel,Nombre,Multimedia) VALUES("L01731243",1,1,1,1,"NOMBRE_PROYECTOPRUEBA2","MULTIMEDIA_PRUEBA2");

INSERT INTO R_Proyecto(Nomina,Id_Edicion,Id_Area,Id_Uf,Id_Nivel,Nombre,Multimedia) VALUES("L01731243",1,1,1,1,"NOMBRE_PROYECTOPRUEBA3","MULTIMEDIA_PRUEBA3");

INSERT INTO R_Proyecto(Nomina,Id_Edicion,Id_Area,Id_Uf,Id_Nivel,Nombre,Multimedia) VALUES("L01737634",1,1,1,1,"NOMBRE_PROYECTOPRUEBA4","MULTIMEDIA_PRUEBA
4");

UPDATE R_Proyecto SET Autorizacion=1 WHERE Id_Proyecto=1;
UPDATE R_Proyecto SET Autorizacion=1 WHERE Id_Proyecto=2;
UPDATE R_Proyecto SET Autorizacion=1 WHERE Id_Proyecto=4;

INSERT INTO R_JuezProyecto_Calif(Id_Juez,Id_Proyecto,TipoUsuario,Calificacion) VALUES (1,1,"Invitado",97.5);

INSERT INTO R_JuezProyecto_Calif(Id_Juez,Id_Proyecto,TipoUsuario,Calificacion) VALUES (1,2,"Invitado",92.5);

INSERT INTO R_JuezProyecto_Calif(Id_Juez,Id_Proyecto,TipoUsuario,Calificacion) VALUES (1,3,"Invitado",93.1);

INSERT INTO R_JuezProyecto_Calif(Id_Juez,Id_Proyecto,TipoUsuario,Calificacion) VALUES (1,4,"Invitado",91.1);

INSERT INTO R_JuezProyecto_Calif(Id_Juez,Id_Proyecto,TipoUsuario,Calificacion) VALUES (2,1,"Invitado",95.1);

INSERT INTO R_JuezProyecto_Calif(Id_Juez,Id_Proyecto,TipoUsuario,Calificacion) VALUES (2,2,"Invitado",99.1);

INSERT INTO R_JuezProyecto_Calif(Id_Juez,Id_Proyecto,TipoUsuario,Calificacion) VALUES (2,3,"Invitado",91.7);

INSERT INTO R_JuezProyecto_Calif(Id_Juez,Id_Proyecto,TipoUsuario,Calificacion) VALUES (2,4,"Invitado",98.5);


UPDATE R_Proyecto SET Calif_Final=(SELECT AVG(Calificacion) FROM R_JuezProyecto_Calif WHERE R_JuezProyecto_Calif.Id_Proyecto=R_Proyecto.Id_Proyecto);
