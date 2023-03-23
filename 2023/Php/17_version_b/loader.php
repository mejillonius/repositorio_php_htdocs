<?php


function incluirClasses($nomClase)
{

      if (file_exists(__DIR__ . "/models/" . $nomClase . ".php") === true) {
            require_once(__DIR__ . "/models/" . $nomClase . ".php");
            
      } else if (file_exists(__DIR__ . "/controllers/" . $nomClase . ".php") === true) {
            require_once(__DIR__ . "/controllers/" . $nomClase . ".php");
      } else {
            require_once(__DIR__."/views/".$nomClase.".php");
      }
      require_once(__DIR__."/conf/conf.php");
}

spl_autoload_register("incluirClasses");

//define('url_base','//'.$_SERVER['SERVER_NAME'].'/2023/php/17_crud-php-poo-pdo/17_crud-php-poo-pdo/');

$bd = new BaseMysql();
$consulta = new Consulta();
$validar = new ValidarPelicula();
$tpl = new MontaTpls();
$tpl->montaTpls();
