<?php

$bd = new BaseMysql();
$consulta = new Consulta();
$validar = new ValidarPelicula();

$consulta->borrarPelicula($bd, 'movies', $_GET['id']);


header("Location:" . url_base);
