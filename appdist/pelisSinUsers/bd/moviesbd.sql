-- Active: 1675263800707@@127.0.0.1@3306@moviesbd


DROP DATABASE IF EXISTS `moviesbd`;
CREATE DATABASE moviesbd DEFAULT CHARACTER SET = 'utf8mb4';

USE moviesbd;



--

-- Table structure for table `actor_movie`

--


CREATE TABLE
    `genres` (
        `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
        `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
        `ranking` int(10) unsigned NOT NULL,
        `active` tinyint(1) NOT NULL DEFAULT '1',
        PRIMARY KEY (`id`),
        UNIQUE KEY `genres_ranking_unique` (`ranking`)
    ) ENGINE = InnoDB AUTO_INCREMENT = 13 DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci;


INSERT INTO `genres`
VALUES (
        1,
        'Comedia',
        1,
        1
    ), (
        2,

        'Terror',
        2,
        1
    ), (
        3,

        'Drama',
        3,
        1
    ), (
        4,

        'Accion',
        4,
        1
    ), (
        5,

        'Ciencia Ficcion',
        5,
        1
    ), (
        6,

        'Suspenso',
        6,
        1
    ), (
        7,

        'Animacion',
        7,
        1
    ), (
        8,
   
        'Aventuras',
        8,
        1
    ), (
        9,
   
        'Documental',
        9,
        1
    ), (
        10,
 
        'Infantiles',
        10,
        1
    ), (
        11,

        'Fantasia',
        11,
        1
    ), (
        12,
        'Musical',
        12,
        1
    );




CREATE TABLE
    `movies` (
        `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
        `title` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
        `rating` decimal(3, 1) unsigned NOT NULL,
        `awards` int(10) unsigned NOT NULL DEFAULT '0',
        `release_date` datetime NOT NULL,
        `length` int(10) unsigned DEFAULT NULL,
        `genre_id` int(10) unsigned DEFAULT NULL,
        `img` VARCHAR (40),
        PRIMARY KEY (`id`),
        KEY `movies_genre_id_foreign` (`genre_id`),
        CONSTRAINT `movies_genre_id_foreign` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`)
    ) ENGINE = InnoDB AUTO_INCREMENT = 22 DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci;




INSERT INTO `movies`
VALUES (
        1,
        'Avatar',
        7.9,
        3,
        '2010-10-04 00:00:00',
        120,
        5,null
    ), (
        2,
        'Titanic',
        7.7,
        11,
        '1997-09-04 00:00:00',
        320,
        3,null
    ), (
        3,
        'La Guerra de las galaxias: Episodio VI',
        9.1,
        7,
        '2004-07-04 00:00:00',
        NULL,
        5,null
    ), (
        4,
        'La Guerra de las galaxias: Episodio VII',
        9.0,
        6,
        '2003-11-04 00:00:00',
        180,
        5,null
    ), (
        5,
        'Parque Jurasico',
        8.3,
        5,
        '1999-01-04 00:00:00',
        270,
        5,null
    ), (
        6,
  
        'Harry Potter y las Reliquias de la Muerte - Parte 2',
        9.0,
        2,
        '2008-07-04 00:00:00',
        190,
        6,null
    ), (
        7,
   
        'Transformers: el lado oscuro de la luna',
        0.9,
        1,
        '2005-07-04 00:00:00',
        NULL,
        5,null
    ), (
        8,
   
        'Harry Potter y la piedra filosofal',
        10.0,
        1,
        '2008-04-04 00:00:00',
        120,
        8,null
    ), (
        9,
      
        'Harry Potter y la cámara de los secretos',
        3.5,
        2,
        '2009-08-04 00:00:00',
        200,
        8,null
    ), (
        10,
   
        'El rey león',
        9.1,
        3,
        '2000-02-04 00:00:00',
        NULL,
        10,null
    ), (
        11,
    
        'Alicia en el país de las maravillas',
        5.7,
        2,
        '2008-07-04 00:00:00',
        120,
        3,NULL
    ), (
        12,

        'Buscando a Nemo',
        8.3,
        2,
        '2000-07-04 00:00:00',
        110,
        7,null
    ), (
        13,
    
        'Toy Story',
        6.1,
        0,
        '2008-03-04 00:00:00',
        150,
        7,null
    ), (
        14,
    
        'Toy Story 2',
        3.2,
        2,
        '2003-04-04 00:00:00',
        120,
        7,null
    ), (
        15,
   
        'La vida es bella',
        8.3,
        5,
        '1994-10-04 00:00:00',
        NULL,
        3,null
    ), (
        16,
      
        'Mi pobre angelito',
        3.2,
        1,
        '1989-01-04 00:00:00',
        120,
        1,null
    ), (
        17,
     
        'Intensamente',
        9.0,
        2,
        '2008-07-04 00:00:00',
        120,
        7,null
    ), (
        18,

        'Carrozas de fuego',
        9.9,
        7,
        '1980-07-04 00:00:00',
        180,
        3,NULL
    ), (
        19,
    
        'Big',
        7.3,
        2,
        '1988-02-04 00:00:00',
        130,
        8,null
    ), (
        20,

        'I am Sam',
        9.0,
        4,
        '1999-03-04 00:00:00',
        130,
        3,null
    ), (
        21,

        'Hotel Transylvania',
        7.1,
        1,
        '2012-05-04 00:00:00',
        90,
        10,null
    );
