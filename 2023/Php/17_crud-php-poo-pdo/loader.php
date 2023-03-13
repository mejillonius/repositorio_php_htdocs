<?php


function incluirClasses($nomClase)
{

      if (file_exists(__DIR__ . "/models/" . $nomClase . ".php") === true) {
            require_once(__DIR__ . "/models/" . $nomClase . ".php");
      } else {
            require_once(__DIR__ . "/controllers/" . $nomClase . ".php");
      }
}

spl_autoload_register("incluirClasses");

$bd = new BaseMysql();
$consulta = new Consulta();
$validar = new ValidarPelicula();
