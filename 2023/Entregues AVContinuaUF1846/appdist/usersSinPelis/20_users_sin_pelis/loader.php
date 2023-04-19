<?php



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
}


spl_autoload_register("incluirClasses");
$bd = new BaseMysql();
$validauser = new ValidarUser();
