<?php
require_once("conf/conf.php");
if (isset($_SESSION)==false) {
      session_start();
}

function incluirClasses($nomClase)
{

      if (file_exists(__DIR__ . "/models/$nomClase.php") === true) {
            require_once(__DIR__ . "/models/$nomClase.php");
      } else if (
            file_exists(__DIR__ . "/controllers/$nomClase.php") === true
      ) {
            require_once(__DIR__ . "/controllers/$nomClase.php");
      } else if (
            file_exists(__DIR__ . "/views/$nomClase.php") === true
      ) {
            require_once(__DIR__ . "/views/$nomClase.php");
      }
      require_once("conf/conf.php");
}


spl_autoload_register("incluirClasses");
$bd = new BaseMysql();
$consulta = new Consulta();
$validar = new ValidarPelicula();

$tpl = new MontaTpls();
$tpl->montaTpls();

var_dump($_SESSION);