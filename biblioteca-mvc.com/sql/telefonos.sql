-- BASE DE DATOS telefonos

-- Elimina la BDD si existe
drop database if exists telefonos;

-- Crea la BDD telefonos
create DATABASE telefonos default character set utf8 collate utf8_spanish_ci;

-- Usar la BDD
use telefonos;

-- Creación de la tabla telefonos
create table telefonos(
    id int(11) not null auto_increment PRIMARY KEY,
    marca VARCHAR(256) not null,
    modelo VARCHAR(256) not null,
    so VARCHAR(256) not null,
    precio FLOAT not null,
    image_file varchar(256)
);
