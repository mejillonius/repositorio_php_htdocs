-- BASE DE DATOS DE LA BIBLIOTECA
-- Robert Sallent - CIFO Vallès / CIFO La Violeta
-- EJemplo de clase para los cursos de BDD y desarrollo de aps web

-- elimina la base de datos "biblioteca" si existía
DROP DATABASE IF EXISTS biblioteca;

-- crea la nueva base de datos "biblioteca"
CREATE DATABASE biblioteca 
  DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;

-- usa la base de datos "biblioteca"
USE biblioteca;

-- creación de la tabla "temas"
CREATE TABLE temas (
  codigo int(11) NOT NULL AUTO_INCREMENT,
  tema varchar(256) NOT NULL,
  descripcion text NOT NULL,
  PRIMARY KEY (codigo)
) ENGINE=InnoDB  ;

-- inserción de registros en la tabla "temas"
INSERT INTO temas VALUES
(1, 'Bases de datos', 'Fundamentos, teoría y aplicaciones de las BDD'),
(2, 'SQL', 'Lenguajes de consultas para BDD'),
(3, 'Programación PHP', 'Programación en el lenguaje PHP'),
(4, 'Programación en C', 'Programación en el lenguaje C'),
(5, 'Páginas web', 'Creación y publicación de páginas web'),
(6, 'Estilos CSS', 'Confección de estilos para páginas web'),
(7, 'Ciencia', 'Libros científicos o con explicaciones científicas'),
(8, 'Economía', 'Libros que tratan sobre economía'),
(9, 'Autoayuda', 'Libros de autoayuda para todo tipo de gente'),
(10, 'Historia', 'Libros de historia para aprender del pasado'),
(11, 'Varios', 'Temas varios'),
(12, 'Medicina', 'Libros sobre medicina y farmacia'),
(13, 'Cine', 'Libros y revistas que tratan el séptimo arte');

-- creación de la tabla "libros"
CREATE TABLE libros (
  codigo int(11) NOT NULL AUTO_INCREMENT,
  isbn varchar(32) NOT NULL,
  titulo varchar(64) NOT NULL,
  editorial varchar(64) NOT NULL,
  idioma varchar(64) NOT NULL,
  autor varchar(256) NOT NULL,
  n_ediciones int(11) NOT NULL,
  edad_recomendada int,
  PRIMARY KEY (codigo),
  UNIQUE KEY (isbn)
) ENGINE=InnoDB  ;

-- inserción de registros en la tabla "libros"
INSERT INTO libros VALUES
(1, '001-1-56619-909-4', 'Introducción a los sistemas de Bases de Datos', 'Addison-Wesley', 'Castellano', 'Date', 5, 12),
(2, '002-1-86619-909-2', 'A guide to the SQL standard', 'Addison-Wesley', 'Inglés', 'Date', 3, 12),
(3, '003-1-54619-909-8', 'Organización de las Bases de datos', 'Prentice-Hall', 'Castellano', 'Martin', 1, 12),
(4, '004-1-56619-909-4', 'Programación en C', 'Anaya', 'Castellano', 'Miquel Ricart', 3, 12),
(5, '005-4-58619-909-7', 'HTML for Dummies', 'Books for Dummies', 'Inglés', 'Santas Little Helper', 3, 10),
(6, '006-1-56410-909-4', 'CSS is easy', 'McGraw Hill', 'Inglés', 'Carl Carlson', 4, 10),
(7, '007-1-56419-909-4', 'Knowing PHP', 'EasyWeb', 'Inglés', 'Mike Sheldon', 3, 13),
(8, '008-7-56619-909-3', 'Moments estelars de la ciència', 'Cruïlla', 'Catalán', 'Isaac Asimov', 10, 9),
(9, '009-1-56619-909-4', 'HTML and CSS 4 Web designers', 'McGraw Hill', 'Inglés', 'Milhouse V.H.', 5, 13),
(10, '010-1-56019-909-4', 'Money in 10 minutes', 'Cofiplis', 'Inglés', 'Ignacio Urdán', 2, 18),
(11, '011-1-56619-909-4', 'Mein wagen ist klein', 'Dörf', 'Alemán', 'Jurgen Klopp', 3, 13),
(12, '012-4-76619-409-8', 'C est la vie', 'Trêsor', 'Francés', 'Jean Michelle Jarre', 3, 18),
(13, '013-1-56619-909-4', 'SQL and PHP unleashed', 'McGraw Hill', 'Inglés', 'Martin Prince', 7, 13),
(14, '014-1-86519-909-4', 'Real horror stories', 'Horror Books', 'Inglés', 'Scary John', 3, 15),
(15, '015-7-51619-909-4', 'Adult games on Internet', 'WWW Fun', 'Inglés', 'Rod Flanders', 1, 18),
(16, '016-1-57619-909-4', 'Network Hacking', 'WWW Fun', 'Inglés', 'Frank Grames', 2, 13),
(17, '017-1-56819-909-4', 'Game cracking 4 fun', 'WWW Fun', 'Inglés', 'M. Burns', 2, 13);


-- creación de la tabla "temas_libros"
CREATE TABLE temas_libros (
  codigo_tema int(11) NOT NULL,
  codigo_libro int(11) NOT NULL,
  PRIMARY KEY (codigo_tema,codigo_libro),

  -- definición de las claves foráneas
  FOREIGN KEY (codigo_libro) REFERENCES libros(codigo) 
    ON UPDATE CASCADE ON DELETE RESTRICT,
  FOREIGN KEY (codigo_tema) REFERENCES temas (codigo) 
    ON UPDATE CASCADE ON DELETE RESTRICT
) ENGINE=InnoDB;

-- inserción de registros en la tabla temas_libros
INSERT INTO temas_libros VALUES
(1,1),(1,2),(1,3),(2,2),(3,7),(4,4),(5,5),(5,6),(5,7),(6,6),(8,10),
(7,8),(5,9),(6,9),(9,10),(11,11),(11,12),(1,13),(2,13),(3,13),(11,14),(11,15);


-- creación de la tabla "ejemplares"
CREATE TABLE ejemplares (
  n_ejemplar int(11) NOT NULL AUTO_INCREMENT,
  codigo_libro int(11) NOT NULL,
  any_edicion int(11) NOT NULL,
  n_edicion int(11) NOT NULL,
  precio float NOT NULL DEFAULT 0,
  PRIMARY KEY (n_ejemplar),
  INDEX(codigo_libro),
  FOREIGN KEY (codigo_libro) REFERENCES libros(codigo) 
    ON UPDATE CASCADE ON DELETE RESTRICT
) ENGINE=InnoDB;

-- inserción de los registros en la tabla ejemplares
INSERT INTO ejemplares VALUES
(1, 1, 1993, 5, 9.90),(2, 1, 1993, 5, 19.90),(3, 2, 1994, 2, 9.90),(4, 2, 1994, 2, 9.90),
(5, 2, 1997, 3, 9.90),(6, 3, 1977, 1, 4.90),(7, 4, 2015, 2, 9.90),(8, 4, 2014, 1, 7.90),
(9, 5, 2010, 1, 9.90),(10, 6, 2012, 3, 9.90),(11, 6, 2010, 1, 9.90),(12, 7, 2010, 1, 14.90),
(13, 7, 2009, 2, 29.90),(14, 4, 2014, 1, 4.90),(15, 5, 2000, 1, 9.90),(16, 5, 2012, 1, 9.90),
(17, 4, 2011, 1, 4.90),(18, 3, 2010, 1, 4.90),(19, 2, 2007, 1, 19.90),(20, 6, 2012, 1,10.99),
(21, 5, 2000, 1, 24.90),(22, 6, 2012, 3, 9.90),(23, 8, 2000, 2, 29.90),(24, 10, 2009, 1, 19.90),
(25, 8, 2006, 1, 19.90),(26, 9, 2003, 2, 9.90),(27, 1, 2000, 1, 7.90),(28, 7, 2008, 2, 4.90),
(29, 3, 2008, 1, 14.90),(30, 7, 2005, 1, 19.90),(31, 10, 2004, 1, 4.90),(32, 11, 2002, 1, 9.90),
(33, 11, 2002, 1, 9.90),(34, 12, 2005, 1, 9.90),(35, 12, 2005, 1, 19.90),(36, 13, 2004, 3, 24.90),
(37, 13, 2005, 1, 20.90),(38, 13, 2001, 1, 14.90),(39, 13, 2007, 6, 20.90),(40, 13, 2008, 7, 28.90),(41,14,2010,1,10.90),(42,14,2010,1,10.90),(43,14,2010,1,10.90),(44,15,2013,1,9.90)
,(45,15,2014,1,9.90);


-- creación de la tabla socios
CREATE TABLE socios (
  codigo int(11) NOT NULL AUTO_INCREMENT,
  dni char(9)  NOT NULL,
  nombre varchar(64) NOT NULL,
  apellidos varchar(128) NOT NULL,
  fecha_nacimiento date NOT NULL,
  email varchar(128)  NOT NULL,
  direccion varchar(128)  NOT NULL,
  ciudad varchar(128)  NOT NULL,
  cp char(5)  NOT NULL,
  provincia varchar(128)  NOT NULL,
  telefono varchar(16)  NOT NULL,
  fecha_alta date NOT NULL,
  PRIMARY KEY (codigo),
  UNIQUE KEY (dni),
  UNIQUE KEY (email)
) ENGINE=InnoDB;

-- inserción de los registros en la tabla socios
INSERT INTO socios (codigo, nombre, apellidos, fecha_nacimiento, email, dni, direccion, cp, ciudad, provincia, telefono, fecha_alta)
VALUES
(1, 'Marc', 'Soler','2000-01-10', 'marc@gmail.com', '11111111A', 'UAB', '28080', 'Sabadell', 'Barcelona', '111 11 11', '2006-01-01'),
(2, 'Pol', 'Corts','1997-05-20', 'polcorts@hotmail.com', '22222222B', 'UAB', '08205', 'Terrassa', 'Barcelona', '222 22 22', '2006-01-01'),
(3, 'David', 'Lloret','2002-09-11', 'lloret@mixmail.com', '33333333C', 'UAB', '08204', 'Barcelona', 'Barcelona', '333 33 33', '2008-11-01'),
(4, 'Juan', 'Gisbert','2003-11-20', 'jgl@hotmail.com', '44444444D', 'UPC', '08205', 'Terrassa', 'Barcelona', '444 44 44', '2008-06-01'),
(5, 'Pere', 'Martí','1985-12-03', 'pmarti@gmail.com', '55555555E', 'UPC', '08205', 'Terrassa', 'Barcelona', '555 55 55', '2009-07-01'),
(6, 'Joan', 'Masdevila','1999-03-30', 'joan@hotmail.com', '66666666F', 'UOC', '08000', 'Barcelona', 'Barcelona', '666 66 66', '2010-12-08'),
(7, 'Ricart', 'Martorell','2000-11-16', 'joanot@gmail.com', '77777777G', 'UOC', '08200', 'Barcelona', 'Barcelona', '777 77 77', '2014-05-13'),
(8, 'Francisco', 'Nicolás','1994-04-18', 'notalone@pop.es', '88888888H', 'PPM', '28080', 'Pozuelo de Alarcón', 'Madrid', '888 88 88', '2008-07-11'),
(9, 'Fernando', 'Martín','1954-05-09', 'femargo@aol.com', '99999999I', 'CIFO', '08203', 'Terrassa', 'Barcelona', '999 99 99', '2001-02-25'),
(10, 'Marta', 'Márquez','1997-02-19', 'mm@hotmail.com', '00000000J', 'CIFO', '08203', 'Terrassa', 'Barcelona', '000 00 00', '2011-12-25'),
(11,'Fran','Cuesta','1978-01-15','fcuesta@yahoo.com','65498732G','C/Pilar', '08203', 'Sabadell','Barcelona','666 66 67', '2011-12-25');


-- creación de la tabla préstamos
CREATE TABLE prestamos (
  codigo_socio int(11) NOT NULL,
  n_ejemplar int(11) NOT NULL,
  fecha_prestamo date NOT NULL,
  fecha_limite date NOT NULL,
  fecha_devolucion date DEFAULT NULL,
  PRIMARY KEY (codigo_socio, n_ejemplar, fecha_prestamo),
  INDEX(n_ejemplar),
  FOREIGN KEY (n_ejemplar) REFERENCES ejemplares (n_ejemplar) 
    ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (codigo_socio) REFERENCES socios (codigo) 
     ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB;

-- inserción de registros en la tabla préstamos
INSERT INTO prestamos VALUES
(1, 1, '2007-10-15', '2007-10-30', '2007-10-20'),
(1, 4, '2007-11-20', '2007-11-25', '2007-11-25'),
(2, 24, '2006-12-20', '2006-12-25', '2006-12-24'),
(2, 2, '2006-06-01', '2006-07-01', '2006-06-30'),
(2, 2, '2007-09-10', '2007-09-13', '2007-09-13'),
(5, 6, '2012-07-10', '2012-07-15', '2012-07-15'),
(2, 5, '2008-09-15', '2008-10-15', NULL),
(3, 3, '2008-09-30', '2008-10-30', NULL),
(3, 12, '2007-06-06', '2007-06-26', '2007-06-30'),
(4, 5, '2015-06-21', '2015-06-24', NULL),
(4, 8, '2015-01-04', '2015-01-10', '2015-01-10'),
(4, 9, '2015-06-16', '2015-06-19', '2015-06-17'),
(6, 7, '2015-06-21', '2015-06-24', NULL),
(5, 10, '2013-03-01', '2013-03-04', '2013-06-05'),
(6, 11, '2012-06-14', '2012-06-16', '2012-06-16'),
(9, 10, '2011-06-02', '2011-06-06', '2011-06-06'),
(2, 11, '2013-06-02', '2013-06-05', '2013-06-05'),
(6, 11, '2013-06-08', '2013-06-11', '2013-06-10'),
(8, 12, '2015-06-08', '2015-06-10', '2015-06-10'),
(5, 10, '2008-05-06', '2008-05-26', '2008-05-10'),
(6, 11, '2015-03-01', '2015-03-04', '2015-06-05'),
(6, 12, '2015-06-14', '2015-06-16', '2015-06-16'),
(10, 8, '2007-05-06', '2007-05-26', '2007-05-10'),
(9, 9, '2015-04-01', '2015-04-04', '2015-04-05'),
(8, 10, '2015-06-24', '2015-06-28', '2015-06-28'),
(4, 18, '2014-04-24', '2014-04-28', '2014-04-28'),
(7, 11, '2015-06-02', '2015-06-06', '2015-06-08'),
(7, 12, '2010-06-02', '2010-06-05', '2010-06-05'),
(8, 13, '2015-06-08', '2015-06-10', '2015-06-10'),
(5, 16, '2008-05-06', '2008-05-26', '2008-05-10'),
(2, 20, '2010-06-21', '2010-06-24', NULL),
(2, 8, '2015-03-04', '2015-03-10', '2015-03-10'),
(6, 18, '2013-06-16', '2013-06-23', '2013-06-17'),
(4, 17, '2012-06-21', '2012-06-24', '2012-06-24'),
(1, 17, '2010-03-01', '2010-03-04', '2010-06-05'),
(2, 14, '2011-03-02', '2011-03-05', '2011-03-05'),
(6, 14, '2010-06-14', '2010-06-16', '2010-06-16'),
(1, 15, '2015-01-02', '2015-01-06', '2015-01-08'),
(3, 19, '2010-09-02', '2010-09-05', '2010-09-05'),
(4, 12, '2011-04-11', '2011-04-15', '2011-04-17'),
(2, 10, '2010-06-12', '2010-06-16', '2010-06-16'),
(3, 11, '2010-06-22', '2010-06-26', '2010-06-24'),
(8, 5, '2014-11-02', '2014-11-06', '2014-11-08'),
(5, 4, '2010-09-12', '2010-09-15', '2010-09-15'),
(2, 20, '2015-03-02', '2015-03-06', '2015-03-08'),
(3, 21, '2010-08-02', '2010-08-05', '2010-08-05'),
(4, 19, '2010-07-02', '2010-07-05', '2010-07-05'),
(6, 22, '2010-04-11', '2010-04-15', '2010-04-14'),
(5, 30, '2010-03-12', '2010-03-16', '2010-03-16'),
(2, 31, '2010-09-22', '2010-09-26', '2010-09-26'),
(4, 35, '2014-11-02', '2014-11-06', '2014-11-06'),
(9, 38, '2013-11-12', '2013-11-16', '2013-11-16'),
(7, 36, '2011-05-08', '2011-05-11', '2011-05-11'),
(2, 34, '2010-07-12', '2010-07-15', '2010-07-15'),
(9, 31, '2012-06-08', '2012-06-11', '2012-06-11'),
(3, 31, '2014-06-08', '2014-06-10', NULL),
(10, 32, '2013-06-08', '2013-06-11', '2013-06-11'),
(10, 37, '2015-06-18', '2015-06-21', '2015-06-21'),
(8, 40, '2015-02-18', '2015-02-21', '2015-02-21'),
(2, 38, '2010-04-08', '2010-04-11', '2010-04-10'),
(9, 39, '2010-04-18', '2010-04-21', '2010-04-20'),
(4, 39, '2009-03-01', '2009-03-11', '2009-03-12'),
(6, 33, '2007-03-04', '2007-03-09', '2007-03-09'),
(7, 30, '2010-04-04', '2010-04-09', '2010-04-09'),
(7, 19, '2011-04-06', '2011-04-10', '2011-04-09'),
(5, 32, '2007-01-21', '2007-02-01', NULL),
(3, 20, '2015-03-02', '2015-03-06', '2015-03-08'),
(5, 25, '2015-03-12', '2015-03-16', '2015-03-15'),
(4, 21, '2010-03-02', '2010-03-06', '2010-03-08'),
(6, 3, '2010-06-02', '2010-06-06', '2010-06-06'),
(10, 25, '2015-01-02', '2015-01-06', '2015-01-05'),
(10, 20, '2015-02-03', '2015-02-07', '2015-02-07'),
(10, 22, '2014-01-03', '2014-01-07', '2014-01-06'),
(9, 1, '2013-10-02', '2013-10-05', '2013-10-05'),
(8, 5, '2012-06-02', '2012-06-05', '2012-06-05'),
(7, 7, '2011-06-12', '2011-06-15', '2011-06-17'),
(9, 12, '2012-01-14', '2012-01-16', '2012-01-16'),
(10, 21, '2011-06-14', '2011-06-16', '2011-06-16'),
(4, 31, '2012-06-24', '2012-06-26', '2012-06-28'),
(4, 30, '2013-04-24', '2013-04-26', '2013-04-26'),
(2, 35, '2014-05-24', '2014-05-26', '2014-05-26'),
(1, 5, '2008-10-15', '2008-10-30', '2008-10-20'),
(1, 10, '2007-12-15', '2007-12-30', '2007-12-20'),
(2, 8, '2008-12-26', '2008-12-30', '2008-12-26'),
(7, 8, '2012-10-15', '2012-10-19', '2012-10-20'),
(2, 15, '2007-10-10', '2007-10-13', '2007-10-15'),
(7, 15, '2008-12-10', '2008-12-14', '2008-12-14'),
(6, 17, '2011-06-16', '2011-06-23', '2011-06-23'),
(7, 18, '2013-10-16', '2013-10-20', '2013-10-23'),
(8, 28, '2013-06-06', '2013-06-13', '2013-06-13'),
(1, 40, '2012-06-06', '2012-06-13', '2012-06-13'),
(2, 41, '2011-05-06', '2011-05-13', '2011-05-13'),
(3, 42, '2010-06-07', '2010-06-11', '2010-06-10'),
(4, 43, '2015-06-16', '2015-06-20', '2015-06-20'),
(4, 44, '2014-08-06', '2014-08-13', '2014-08-13'),
(5, 45, '2010-10-06', '2010-10-13', '2010-10-13'),
(8, 42, '2013-12-06', '2013-12-10', '2013-12-10'),
(10, 45, '2013-06-26', '2013-06-30', '2013-06-29'),
(4, 4, '2008-09-12', '2008-09-15', '2008-10-01'),
(6, 6, '2009-09-10', '2009-10-10', '2009-10-01'),
(7, 7, '2013-09-22', '2013-10-01', '2013-10-01'),
(6, 24, '2009-06-14', '2009-06-16', '2009-06-16'),
(9, 34, '2010-02-14', '2010-02-16', '2010-02-16'),
(8, 39, '2010-06-11', '2010-06-14', '2010-06-14');

