<?php
/**
 * Created by PhpStorm.
 * User: Alumne Matí
 * Date: 18/7/2018
 * Time: 12:40
 */


class Database
{


    /*****************
     * Propiedades
     *****************/
    // Propiedad que almacenará la conexión (objeto mysqli)
    private static $conexion = null;


    /*****************
     * Constructor
     *****************/


    /*****************
     * Métodos
     *****************/

    // Método que establece una nueva conexión o la recupera
    // PROTOTIPO: public static mysqli get()
    // EJEMPLO: $conexion = Database::get()
    public static function get(){

        // Notifica los Warning como errores
        mysqli_report(MYSQLI_REPORT_STRICT);

        // Si no se había conectado antes
        if(empty(self::$conexion))
        {
            // Conectar a la BDD
            self::$conexion = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);

            // Si se produce un ERROR de Conexión
            if(self::$conexion->connect_errno)
                throw new Exception('Error de Conexión: '.self::$conexion->connect_errno);

            // CHARSET de la Conexión
            self::$conexion->set_charset(DB_CHARSET);

        }

        // Retornar la conexión
        return self::$conexion;
    }
}