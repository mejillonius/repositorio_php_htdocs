<?php

require "test-data.php";

class Conexion extends PDO
{
      private $typedb = "mysql";
      private $host = "localhost";
      private $namedb = "newusers";
      private $user = "root";
      private $pw = "";

      private $newuser = "admin";
      private $newpw = "admin12345";

      /*     public function getGenre()
    {
        return $this->genre_id;
    }

    //Setters
    public function setTitle($title)
    {
        $this->title = $title;
    } */

      public function __construct()
      {
            try {
                  parent::__construct($this->typedb . ":host=" . $this->host . ";dbname=" . $this->namedb, $this->user, $this->pw);


                  $test = new TestData(20);
            } catch (PDOException $e) {

                  echo "Nooo";

                  $error_code =  $e->getCode();

                  if ($error_code == 1049) { // SI LA BASE DE DATOS NO EXISTE              

                        try {

                              parent::__construct($this->typedb . ":host=" . $this->host, $this->user, $this->pw); // instanciamos sin especificar base de datos                   

                              // preparamos la solicitud para crear la base de datos

                              $sql = "CREATE DATABASE " . $this->namedb . "; CREATE USER '" . $this->newuser . "'@'" . $this->host . "' IDENTIFIED BY '" . $this->newpw . "';";
                              $sql .= "GRANT ALL  PRIVILEGES ON " . $this->namedb . ".* TO '" . $this->newuser . "'@'" . $this->host . "'; ";

                              $query = $this->prepare($sql);
                              $query->execute();
                              echo "creato";

                              // PREPARAMOS LA TABLA

                              $sql = "USE " . $this->namedb . "; CREATE TABLE productos (

                        id INT AUTO_INCREMENT,
                        codigo  VARCHAR(8),
                        producto VARCHAR(30),
                        precio DECIMAL(6,2),
                        cantidad INT(3),
                        PRIMARY KEY (id)
                    ); ";

                              $query = $this->prepare($sql);
                              $query->execute();

                              // INTRODUCIMOS DATOS ALEATORIOS

                              $test = new TestData(50);
                              $data = $test->generate_data();

                              $sql = "INSERT INTO productos (codigo, producto, precio, cantidad) VALUES ";

                              foreach ($data as $key => $row) {

                                    $codigo = $row['codigo'];
                                    $producto = $row['producto'];
                                    $precio = $row['precio'];
                                    $cantidad = $row['cantidad'];

                                    $sql .= "('$codigo', '$producto', $precio, $cantidad )" . (count($data) > $key + 1 ? ', ' : '');
                              }

                              $query = $this->prepare($sql);
                              $query->execute();

                              // echo "OLEEEE";
                              /*  return true;       */
                        } catch (PDOException $e) {

                              echo 'ERROR: ' . $e->getMessage();
                        }
                  }
            }
      }
}

$pdo = new Conexion();
