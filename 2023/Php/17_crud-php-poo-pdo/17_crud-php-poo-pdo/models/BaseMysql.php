<?php
/* class BaseMysql
{
    static public function conexion()
    {
        try {
            $dsn = "mysql:host=localhost;dbname=moviesbd;port=3306;charset=utf8mb4";
            $usuario = "root";
            $password = "";
            /*  $opt = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]; */
//Les recuerdo que para el reconocimiento de los errores de mysql, es que incorpormosr esta línea: $opt = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
/*   $bd = new PDO($dsn, $usuario, $password);

            return $bd;
        } catch (PDOException $error) {
            die("<h2>No me pude conectar con la Base de Datos...<br></h2>" . $error->getMessage());
        }
    }
} */


class BaseMysql extends PDO
{
    private $typedb = "mysql";
    private $host = "localhost";
    private $namedb = "moviesbd;charset=utf8mb4";
    private $user = "root";
    private $pw = "";

    public function __construct()
    {

        try {
            parent::__construct($this->typedb . ":host=" . $this->host . ";dbname=" . $this->namedb, $this->user, $this->pw);
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }
}
