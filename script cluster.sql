/* CREATE DATABASE cluster;
USE cluster; */

--  CREATE TABLE alumnos (id INT AUTO_INCREMENT PRIMARY KEY, matricula VARCHAR(100) NOT NULL UNIQUE, 
--  correo VARCHAR(100) NOT NULL UNIQUE, nombre VARCHAR(70),
--  apellidos VARCHAR(70), carrera VARCHAR(200), num_telefono VARCHAR(20),
--  imagen VARCHAR(300), num_imss VARCHAR(50), f_nacimiento VARCHAR(40), curp VARCHAR(300), 
--  disponibilidad VARCHAR(300), calificacion VARCHAR(300), universidad VARCHAR(300), plan_estudios VARCHAR(300),
--  periodo_estadia VARCHAR(60), 
--  area_interes VARCHAR(100), cv VARCHAR(300), estatus INT, FOREIGN KEY (estatus) REFERENCES estatus(id)); 
 

SELECT * FROM alumnos;
SELECT * FROM universidades;
SELECT *FROM estatus;
SELECT * FROM area_interes;
SELECT *FROM periodos_estadia;

-- CREATE TABLE carreras (id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, nombre_carrera VARCHAR(300) NOT NULL);
-- CREATE TABLE periodos_estadia (id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, periodo VARCHAR(300) NOT NULL);


SELECT * FROM carreras;
SELECT *FROM empresas;

SELECT nombre_uni FROM universidades WHERE id = 1;



/* DROP TABLE alumnos;
DROP TABLE infoalumnos; */
 
 
 

 
 
 
  