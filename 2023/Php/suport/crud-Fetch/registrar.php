<?php

if ('POST' === $_SERVER['REQUEST_METHOD']) {

// recollim les dades que ens arriben per POST si s'ha definit per POST
/* if (isset($_POST)) { */
    $codigo = $_POST['codigo'];
    $producto = $_POST['producto'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];

    // creem la connexió a la BBDD
    require "conexion.php";

    // si el id (aquí idp) està buit vol dir que és un registre nou
    if (empty($_POST['idp'])) {

        // al ser un registre nou insertarà un nou registre mitjançant un INSERT de SQL
        $query = $pdo->prepare("INSERT INTO productos (codigo, producto, precio, cantidad) VALUES (:cod, :pro, :pre, :cant)");

        // fa la substitució dels valors per les variables de substitució abans d'executar
        $query->bindParam(":cod", $codigo);
        $query->bindParam(":pro", $producto);
        $query->bindParam(":pre", $precio);
        $query->bindParam(":cant", $cantidad);

        // executem la consulta
        $query->execute();

        // tanquem la connexió
        $pdo = null;

        // retornem el valor ok al fetch
        echo "ok";
    } else {

        // si tenemos ya un id existente tendremos que actualizar un registro en la BBDD
        $id = $_POST['idp'];

        // creamos una query de SQL donde actualizamos por SQL un registro existente que identificamos por el id
        $query = $pdo->prepare("UPDATE productos SET codigo = :cod, producto = :pro, precio =:pre, cantidad = :cant WHERE id = :id");

        // fa la substitució dels valors per les variables de substitució abans d'executar
        $query->bindParam(":cod", $codigo);
        $query->bindParam(":pro", $producto);
        $query->bindParam(":pre", $precio);
        $query->bindParam(":cant", $cantidad);
        $query->bindParam("id", $id);

        // executem la consulta
        $query->execute();

        // tanquem la connexió
        $pdo = null;

        // retornem el valor ok al fetch
        echo "modificado";
    }

}
