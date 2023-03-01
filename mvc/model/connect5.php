<?php


Class Conexion extends PDO{
    private $typedb = PDO_DB_TYPE;
    private $host = DB_HOST;
    private $namedb = "users2023";
    private $user = DB_USER;
    private $pw = "";

    public function __construct(){
        try{
            parent::__construct($this->typedb.":host=".$this->host.";dbname=".$this->namedb.";charset=UTF8mb4", $this->user, $this->pw);
            echo "ooooleeee conexion 5";
        } catch (PDOException $e){
            echo "Error de conexion: ".$e->getMessage();
        }
    }
}

$con = new Conexion();