<?php

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
