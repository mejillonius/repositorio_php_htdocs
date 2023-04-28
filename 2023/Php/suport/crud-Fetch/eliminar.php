<?php
	// almacenamos en $data todos los datos que nos llegan del formulario, los datos de los inputs
    $data = file_get_contents("php://input");

       // creem una connexió amb la BBDD
    require "conexion.php";

    // preparem una query que esborrarà els registres en que coincideixi el id
    $query = $pdo->prepare("DELETE FROM productos WHERE id = :id");

    // fem la substitució dels valors que hem rebut per POST a data
    $query->bindParam(":id", $data);

    // executem la consulta a la BBDD
    $query->execute();

    // tanquem la connexió
    $pdo=null;
    
    // això es el que ens respondrà el php
    echo "ok";
?>