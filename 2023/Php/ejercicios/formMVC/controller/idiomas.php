<?php

if(session_id() == ''){
    session_start();
 }
/*  require_once('./controller/config.php'); */

 $lang;
if (!isset($_GET['lang'])){
    echo DEBUG?"no tengo nigun idioma<br/>":"";
    $lang = 'es';
} else {
    echo DEBUG? "el idioma seleccionado es ".$_GET['lang'].'<br/>' : "";

    switch ($_GET['lang']){
        case 'es':
            $lang = 'es';
            break;
        case 'cat':
            $lang = 'cat';
            break;
        case 'eng':
            $lang = 'eng';
            break;
        default:
            $lang = 'es';
            break;
    }
}
require (VIEW.IDIOMAS.$lang.'.php');



function insertarTexto ($archivo) {
    $html = file_get_contents($archivo);
    foreach ($GLOBALS["viewStrings"] as $key => $value) {
          $html = str_replace("{{::$key::}}", $value, $html);
    }
    //var_dump($html);

    echo $html;
}