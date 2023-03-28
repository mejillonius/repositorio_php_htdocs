<?php

class MdlUser {

    public function registro ($db, $tabla, $registro)
    {
        $sql = "SELECT * FROM $tabla WHERE username = :username AND email = :email";
        $query = $db->prepare($sql);
        $query->bindValue(":username", $registro->getUsername());
        $query->bindValue(":email", $registro->getEmail());
        $query->execute();

        $user = $query->fetch(PDO::FETCH_ASSOC);

        //si row viene lleno significa que el usuario ya existe
        if ($user) {
            echo "el usuario ya existe";
            //si no existe encriptamos la contraseña y guardamos el nuevo registro
        } else {
            //encriptamos la contraseña que nos ha dado por el formulario
            $password = PwHash::encryptPw($registro->getPassword());
            //guardamos en la base de datos los valores entrados en formulario

            $sql = "INSERT INTO usuarios(username, password, rol_id, email) VALUES (:username, :password, :rol_id, :email)";
            $query = $db->prepare($sql);
            $query->bindValue(":username", $registro->getUsername(), PDO::PARAM_STR);
            $query->bindValue(":password", $password, PDO::PARAM_STR);
            $query->bindValue(":rol_id", $registro->getRol(), PDO::PARAM_INT);
            $query->bindValue(":email", $registro->getEmail(), PDO::PARAM_STR);
            $query->execute();

            if($query){
                echo "registrado";
                header("refresh:10;url=".url_base."login/");
            }
            
        }

    }

    public function loguear ($db, $tabla, $logueo){
        $sql = "SELECT * FROM $tabla WHERE username = :username AND email = :email";
        $query = $db->prepare($sql);
        $query->bindValue(":username", $logueo->getUsername());
        $query->bindValue(":email", $logueo->getEmail());  
        $query->execute();     
    }


}