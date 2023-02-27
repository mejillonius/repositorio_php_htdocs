<?php

echo LANGDEBUG?"cargado el langController.php<br/>":"";

class LangController {

    private $lang;
    private $langDoc;

    public function __construct() {
        // echos de LANGDEBUG de construccion
        echo LANGDEBUG?"cargado el langController<br/>":"";
        echo LANGDEBUG?"la sesion tiene el id ".$_COOKIE['PHPSESSID']." <br/>":"";
        if (LANGDEBUG == true){
            if (isset($_COOKIE['lang'])){
                echo "existe una cookie de idioma y tiene el valor ". $_COOKIE['lang'].' <br/>';
            } else {
                echo "no existe una cookie de idioma<br/>";
            }
            if (isset($_SESSION['lang'])){
                echo "existe una sesion de idioma y tiene el valor ". $_SESSION['lang'].' <br/>';
            } else {
                echo "no existe una sesion de idioma<br/>";
            }
        }
        //si el lenguaje viene por el parametro tiene prioridad
        if (!isset($_GET['lang'])){
            //si no existen ni cookies ni sesiones por defecto se pone el es, se pone la sesion y se crea la cookie
            if (!isset($_COOKIE['lang'])||!!isset($_SESSION['lang'])){
                $this->lang =  'es';
                setcookie('lang', 'es',time()+60*60*24*30);
                $_SESSION['lang'] = 'es';
                $this->langDoc = LANG.$this->lang.'.php';
            //si solo existe una cookie se pone el lang de la cookie, y se crea la sesion
            } elseif (isset($_COOKIE['lang'])&&!isset($_SESSION['lang'])) {
                $this->lang = $_COOKIE['lang'];
                $_SESSION['lang'] = $_COOKIE['lang'];
                $this->langDoc = LANG.$this->lang.'.php';
            //si solo hay sesion y no cookie 
            } elseif (!isset($_COOKIE['lang'])&&isset($_SESSION['lang'])) {
                $this->lang = $_SESSION['lang'];
                setcookie('lang', $_SESSION['lang'] ,time()+60*60*24*30);
                $this->langDoc = LANG.$this->lang.'.php';
        }} else {
            $this->lang = $_GET['lang'];
            $this->langDoc = LANG.$this->lang.'.php';
            setcookie('lang', $this->lang ,time()+60*60*24*30);
            $_SESSION['lang'] = $_COOKIE['lang'];
        }
    }

    //setters y getters
    public function setLang ($lang){
        echo LANGDEBUG? 'funcion setLang ejecutada<br/>':'';
        $this->lang = $lang;
        $this->langDoc = LANG.$this->lang.'.php';
    }
    public function getLang (){
        echo LANGDEBUG? 'funcion getLang ejecutada<br/>':'';
        return $this->lang;
    }
    public function getLangStrings($peticion){
        require($this->langDoc);
        
        return $strings[$peticion];
    }

}


?>