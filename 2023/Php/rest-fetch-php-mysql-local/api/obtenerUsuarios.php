<?php
/* $dominioPermitido = "https://dominio.com";
header('Access-Control-Allow-Origin: $dominioPermitido'); */
header('Access-Control-Allow-Origin: *');

header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
header('content-type: application/json; charset=utf-8');  //tipo específico de aplication
$method = $_SERVER['REQUEST_METHOD'];
if ($method == "OPTIONS") {
    die();
}
require "conexion.php";

// PRUEBAS


$sql = "SELECT * FROM usuarios";
$query = $mysqli->query($sql);

$datos = array();

while ($resultado = $query->fetch_assoc()) {
    $datos[] = $resultado;
}

echo json_encode($datos);
