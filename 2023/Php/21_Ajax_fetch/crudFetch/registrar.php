<?php

require('conexion.php');
if (isset($_POST)){
    $codigo = $_POST['codigo'];
    $producto = $_POST['producto'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];

    if(empty($_POST['idp'])){
        $pdo = new Conexion();
        $stmt = $pdo-> prepare("INSERT INTO productos (codigo, producto, precio, cantidad) VALUES (:cod, :pro, :pre, :cant)");
        $stmt->bindParam(":cod",$codigo);
        $stmt->bindParam(":pro",$producto);
        $stmt->bindParam(":pre",$precio);
        $stmt->bindParam(":cant",$cantidad);
        $stmt->execute();
        $pdo = null;
        echo "ok";
    } else {
        $id = $_POST['idp'];
        $pdo = new Conexion();
        $stmt = $pdo->prepare("UPDATE productos SET codigo = :cod, producto = :pro, precio= :pre, cantidad=:cant WHERE id=:id");
        $stmt->bindParam(":cod",$codigo);
        $stmt->bindParam(":pro",$producto);
        $stmt->bindParam(":pre",$precio);
        $stmt->bindParam(":cant",$cantidad);
        $stmt->bindParam(":id",$id);
        $stmt->execute();
        $pdo = null;
    }
}