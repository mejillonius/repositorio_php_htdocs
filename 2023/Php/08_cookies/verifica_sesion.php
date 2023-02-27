<?php
session_start();
function vuelvo(){
    header("refresh:10;url=crea_sesiones_alumnes.php");
}


if(!isset($_COOKIE['nombre'])||!isset($_COOKIE['mail'])){
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
    <p>nombre: <?=$_COOKIE['nombre'];?></p>
    <p>Correo: <?=$_COOKIE['mail'];?></p>
    <a href="envio_v_sesion.php">volver</a>
</body>
</html>