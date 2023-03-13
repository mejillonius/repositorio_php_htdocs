<?php
//loader
require_once('loader.php');
//objConsulta y método para borrar
$consulta->borrarPelicula($bd, 'movies', $_GET['id']);
//Redirección
header('location:index.php');
