<?php


class Model{
    private $con;
    public function __construct(){
        require_once(MODEL.'connect2.php');
        $this->con = $con;
    }
    public function usuarioexists ($usuario){
        $selectQuery = "SELECT * FROM usuarios WHERE usuario='$usuario'";
        $result = $this->con->query($selectQuery);
        if ($result->num_rows > 0){
            return true;
        } else {
            return false;
        }
    }

    public function mailexists ($mail){
        $selectQuery = "SELECT * FROM usuarios WHERE email='$mail'";
        $result = $this->con->query($selectQuery);
        if ($result->num_rows > 0){
            return true;
        } else {
            return false;
        }
    }

    public function getUsuarios (){
        $selectallQuery = "SELECT * FROM usuarios";
        $result = $this->con->query($selectallQuery);    
        while ($row = $result->fetch_assoc()) {
            $myrows[] = $row;
      }

     return $myrows;
    }

    public function insertar ($usuario, $mail){
        $insertQuery = "INSERT INTO usuarios VALUES (NULL,'$usuario','$mail')";
        $result = $this->con->query($insertQuery);
        return $result;
  
    }
}


?>