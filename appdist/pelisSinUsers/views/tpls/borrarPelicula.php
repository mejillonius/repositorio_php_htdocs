<?php

/*
* failsafe para evitar que usuarios no autorizados borren peliculas
*/
if ($_SESSION['rol'] == 1) {
    header('Refresh:5;url=' .'//' . $_SERVER['SERVER_NAME'] . '/appdist/usersSinPelis/');
}

$bd = new BaseMysql();
$consulta = new Consulta();
$validar = new ValidarPelicula();

$consulta->borrarPelicula($bd, 'movies', $_GET['id']);
header('Location:' . getenv('HTTP_REFERER'));
