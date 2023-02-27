<?php

function volver(){
    header('Location: crea_sesiones_alumnes.php');
}

if(!isset($_GET['enviar'])){
    volver();
}
if(empty($_GET['nombre'])||empty($_GET['mail'])){
    volver();
}
function pDump($variable)
{
      echo "<pre>";
      var_dump($variable);
      echo "</pre>";
}

$nombre = $_GET['nombre'];
$mail = $_GET['mail'];



setcookie('nombre', $nombre, time() + 10000);
setcookie('mail', $mail, time() + 1000000);
echo "vardump cookies";



pDump($_COOKIE);

//esto no saldra la primera vez, pero si la segunda
echo $_COOKIE['nombre'];
echo '<br>';
echo $_COOKIE['mail'];

header("refresh:5;url=verifica_sesion.php");

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>trabajando con cookies</title>
</head>
<body>
    <h1>estamos ignorando sus mierdas, espere como un buen peon</h1>
</body>
</html>