<?php

/**
 * Summary of MdlUser
 */
class MdlUser
{


      static public  function loguear($db, $tabla, $logueo)
      {

            $sql = "SELECT * FROM  $tabla WHERE username = :username AND email = :email";
            // Aquí ejecuto el prepare de los datos
            $query = $db->prepare($sql);
            $query->bindValue(":username", $logueo->getUsername());

            $query->bindValue(":email", $logueo->getEmail());

            $query->execute();

            $loguser = $query->fetch(PDO::FETCH_ASSOC);
            if ($loguser) {
                  $password = $logueo->getPassword();
                  /* var_dump($loguser); */
                  //sacamos la contraseña del usuario
                  $pwbd = $loguser['password'];
                  //procedemos a comparar la contraseña
                  $pwMatch = PwHash::decryptPw($password, $pwbd);

                  // si la contraseña coincide, miramos qué tipo de usuario está entrando
                  if ($pwMatch) {
                        //recuperamos su rol del  usuario
                        $rol = $loguser['rol_id'];
                        //iniciamos sesión
                        session_start();
                        $_SESSION['rol'] = $rol;
/*                         var_dump($rol);
                        var_dump($_SESSION); */
                        header("location: ../pelisSinUsers/index.php ");
                        
                  }
            }
      }


      //medodo que llamamos cuando queremos registrar a un user nuevo
      public static function registro($db, $tabla, $registro)
      {
            $sql = "SELECT * FROM  $tabla WHERE username = :username AND email = :email";
            $query = $db->prepare($sql);
            $query->bindValue(":username", $registro->getUsername());
            $query->bindValue(":email", $registro->getEmail());
            $query->execute();

            $user = $query->fetch(PDO::FETCH_ASSOC);
            //si row viene lleno significa que el usuario ya existe
            if ($user) {
                  echo "El usuario ya existe";
                  //si no existe encriptamos la contraseña y guardamos el nuevo registro 
            } else {
                  //encriptamos la contraseña que se nos ha dado por formulario
                  $password = PwHash::encryptPw($registro->getPassword());
                  //guardamos en la base de datos los valores entrados en formulario

                  $sql = "INSERT INTO usuarios (username, password, rol_id, email) VALUES (:username, :password, :rol_id, :email)";

                  $query = $db->prepare($sql);
                  $query->bindValue(':username', $registro->getUsername(), PDO::PARAM_STR);
                  $query->bindValue(':password', $password, PDO::PARAM_STR);
                  $query->bindValue(':rol_id', $registro->getRol(), PDO::PARAM_INT);
                  $query->bindValue(':email', $registro->getEmail(), PDO::PARAM_STR);
                  $query->execute();
                  if ($query) {
                        /*
                        * si el usuario esta bien autenticado, se le asigna el rol adecuado y saltamos a la otra pagina
                        */
                        header('Refresh:5;url=' . url_inici . "login/");
                  }
            }
      }
}
