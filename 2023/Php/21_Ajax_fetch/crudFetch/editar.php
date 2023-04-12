<?php

require "conexion.php";

$id = file_get_contents(("php://input"));
$pdo = new conexion();
$stmt = $pdo->prepare("SELECT * FROM productos WHERE id = :id");
$stmt -> bindParam(":id", $id);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
echo json_encode($result);