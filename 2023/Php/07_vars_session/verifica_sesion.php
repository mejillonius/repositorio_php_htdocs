<?php
session_start();
function vuelvo(){
    header("refresh:2;url=crea_sesiones_alumnes.php");
}


if(!isset($_SESSION['nombre'])||!isset($_SESSION['mail'])){
    vuelvo();
}


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>datos recibidos</p>
    <p>nombre: <?=$_SESSION['nombre'];?></p>
    <p>Correo: <?=$_SESSION['mail'];?></p>
</body>
</html>