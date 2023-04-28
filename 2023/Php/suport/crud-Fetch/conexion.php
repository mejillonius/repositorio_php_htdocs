<?php

// definimos una clase para crear la conexion con mysql
// será una clase que extenderá de la clase PDO que ya está establecida en PHP para gestionar conexiones

class Conexion extends PDO
{
	private $typedb = "mysql";
	private $host = "localhost";
	private $namedb = "crudfetch;charset=utf8mb4";
	private $user = "root";
	private $pw = "";

	// así declaramos que la clase se puede construir de modo construct
	// ha de ser publica para que funcione

	public function __construct()
	{

		// intentara ejecutar el codigo que está dentro del try, si no lo puede ejecutar el catch cogerá el error que se produzca y lo guardará en la variable $e

		try {

			// usamos un metodo constructor que pertenece a la clase padre PDO 

			parent::__construct($this->typedb . ":host=" . $this->host . ";dbname=" . $this->namedb, $this->user, $this->pw);
			// echo "OLEEEE";

		} catch (PDOException $e) {
			echo "Error de conexion: " . $e->getMessage();
			exit;
		}
	}
}

$pdo = new Conexion();
