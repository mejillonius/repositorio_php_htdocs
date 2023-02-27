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


$nombre = $_GET['nombre'];
$mail = $_GET['mail'];

session_start();

$_SESSION['nombre'] = $nombre;
$_SESSION['mail'] = $mail;

echo $_SESSION['nombre'];
echo '<br>';
echo $_SESSION['mail'];

header("refresh:5;url=verifica_sesion.php");

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>trabajando con sesiones</title>
</head>
<body>
    <h1>estamos ignorando sus mierdas, espere como un buen peon</h1>
</body>
</html>