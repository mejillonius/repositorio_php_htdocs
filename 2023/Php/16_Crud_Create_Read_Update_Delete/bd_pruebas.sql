-- Active: 1675263799721@@127.0.0.1@3308@pruebas
DROP DATABESE IF EXISTS pruebas;
CREATE DATABASE  pruebas DEFAULT CHARACTER SET utf8mb4;
USE pruebas;
CREATE TABLE datos_usuarios (
      id INT PRIMARY KEY AUTO_INCREMENT,
      Nombres VARCHAR(50),
      Apellidos VARCHAR(50)
      );
INSERT INTO datos_usuarios (Nombres,Apellidos) VALUES ('Oscar','Eroles');
INSERT INTO datos_usuarios (Nombres,Apellidos) VALUES ('Santiago','Perolillos');
