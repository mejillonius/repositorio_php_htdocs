<?php


function incluirClasses($nomClase)
{

      if (file_exists(__DIR__ . "/models/" . $nomClase . ".php") === true) {
            require_once(__DIR__ . "/models/" . $nomClase . ".php");
      } else if (
            file_exists(__DIR__ . "/controllers/" . $nomClase . ".php") === true
      ) {
            require_once(__DIR__ . "/controllers/" . $nomClase . ".php");
      } else {
            require_once(__DIR__ . "/views/" . $nomClase . ".php");
      }
      require_once(__DIR__ . "/conf/conf.php");
}

spl_autoload_register("incluirClasses");

$bd = new BaseMysql();
$consulta = new Consulta();
$validar = new ValidarPelicula();
$validarUser = new ValidarUser();

$tpl = new MontaTpls();
$tpl->montaTpls();
