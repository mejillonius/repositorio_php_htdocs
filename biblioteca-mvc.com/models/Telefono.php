<?php
/**
 * Created by PhpStorm.
 * User: Alumne Matí
 * Date: 19/7/2018
 * Time: 12:48
 */


class Telefono
{

    /*****************
     * Propiedades
     *****************/
    public $id;
    public $marca;
    public $modelo;
    public $so;
    public $precio;
    public $image_file;


    /*****************
     * Métodos
     *****************/

    // Recuperar todos los telefonos
    public static function getTelefonos():array
    {
        $consulta = "SELECT * FROM telefonos.telefonos";

        $resultset = Database::get()->query($consulta);

        $telefonos = array();

        while($telefono = $resultset->fetch_object('Telefono'))
            $telefonos[]=$telefono;

        $resultset->free();

        return $telefonos;
    }

    // toString
    public function __toString()
    {

        return "";
    }
}