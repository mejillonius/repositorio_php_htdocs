<?php
require_once "../model/connect.php";

function modeloRegistrarNuevoUsuario($usuario, $email, $con)
{
      //lectura.....intenta escribir
      if (empty($usuario) || empty($email)) {
            return false;
      }

      $myrows = [];

      $selectQuery = "SELECT * FROM usuarios WHERE usuario='$usuario' OR email='$email' ";

      $result = $con->query($selectQuery);
      if ($result->num_rows > 0) {
            return false;
      }

      $insertQuery = "INSERT INTO usuarios VALUES (NULL,'$usuario','$email')";
      $result = $con->query($insertQuery);

      if ($result) {
            $selectallQuery = "SELECT * FROM usuarios";
            $result = $con->query($selectallQuery);
            while ($row = $result->fetch_assoc()) {
                  $myrows[] = $row;
            }

            $con->close();
            return [$myrows, true];
      } else {
            return false;
      }
}
/*  $usuarios= fopen("usuarios.txt","a+"); *///función para abrir y crear si no existe un fichero. El modo (a+) nos sitúa al final del mismo y nos permite añadir datos
/*var_dump($usuarios);*/
/*  $usuarios= file("usuarios.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

foreach ($usuarios as $linea) {
list($user,$em)=explode(" : ",$linea); */
// si alguna variable de list, es = al $usuario o a $email devolvemos false a controller
/*   if($usuario===$user) return false;
if($email===$em) return false; */
// si no devolvemos false, el valor del fichero es el mismo + la nueva línea
/* $salida.=$linea.PHP_EOL; *///constante para finalizar linea  predeterminado
/*  $salida.=$linea."\n"; */

/*  }

$salida.="$usuario : $email";

file_put_contents("usuarios.txt", $salida);

echo nl2br($salida);

return true;
# code...

}
 */

/*
?> */