<?php
/**
 * Created by PhpStorm.
 * User: Alumne Matí
 * Date: 16/7/2018
 * Time: 12:49
 */

class ErrorHandler
{

    /*****************
     * Propiedades
     *****************/
    public $haveError;
    public $errors;


    /*****************
     * Constructor
     *****************/
    public function __construct()
    {
        $this->haveError = false;
        $this->errors = array();
    }

    /*****************
     * Métodos
     *****************/

    // setError
    public function setError(string $exception,string $field = null):ErrorHandler
    {
        //throw new Exception($exception);
        $this->haveError = true;
        $newError = array(
            "msg" => $exception,
            "field" => $field
        );
        $this->errors[] = $newError;

        return $this;
    }

    public function isError():bool {
        return $this->haveError;
    }

    // Devuelve el Objeto en JSON
    public function toJSON(){
        return json_encode($this);
    }

    // Devuelve el Objeto en JSON para el Javascript
    public function responseAjax(){
        $json = self::toJSON();
        echo $json;
    }


    // toString
    public function __toString()
    {
        return "<pre>".print_r($this)."</pre>";
    }
}