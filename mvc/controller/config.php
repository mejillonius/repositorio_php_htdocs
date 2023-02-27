<?php

//selector debugs
define("DEBUG",false);
define('MAINDEBUG',false);
define('VIEWDEBUG',false);
define('LANGDEBUG',false);
define('CONNECTDEBUG',false);


echo DEBUG?"cargado el config<br/>":"";

class config {
    public function __construct(){
        echo DEBUG?"cargado el configurador<br/>":"";

        // definiendo las constantes de las rutas

        define("CONTROLLERS","./controller/");
        define("VIEWS","./views/");
        define("MODEL","./model/");
        define('LANG',VIEWS.'lang/');
    }
}

?>