<?php

require('conexion.php');
$pdo = new Conexion();

$data = file_get_contents("php://input");

$stmt = $pdo->prepare("SELECT * FROM productos ORDER BY id DESC");
$stmt->execute();
if ($data != ""){
    $stmt = $pdo->prepare("SELECT * FROM productos WHERE codigo LIKE '%".$data."%' OR producto LIKE '%".$data."%'");
    $stmt->execute();
}
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($result);
