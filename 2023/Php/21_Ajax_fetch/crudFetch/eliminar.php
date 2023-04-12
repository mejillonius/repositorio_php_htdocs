<?php

require "conexion.php";

$id = file_get_contents(("php://input"));
$pdo = new conexion();
$stmt = $pdo->prepare("DELETE FROM productos WHERE id = :id");
$stmt -> bindParam(":id", $id);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
echo "ok";