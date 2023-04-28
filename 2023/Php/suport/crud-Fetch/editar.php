<?php
	// almacenamos en $data todos los datos que nos llegan del formulario, los datos de los inputs
    $data = file_get_contents("php://input");

    // creem una connexió amb la BBDD
    require "conexion.php";

    // preparem una consulta on buscarà el registre on coincideixi el id
    $query = $pdo->prepare("SELECT * FROM productos WHERE id = :id");

    // fa la substitució dels valors abans d'executar
    $query->bindParam(":id", $data);

    // executa la consulta a la BBDD
    $query->execute();

    // lo que llegue de la BBDD lo guarda como array asociativo donde el indice que trae lo usa como nombre de la columna
    $resultado = $query->fetch(PDO::FETCH_ASSOC);

    // tanquem la connexió
    $pdo=null;
    
    // el echo ens indica quin valor contindrà el response
    // això és el valor que ens retornarà el php
    echo json_encode($resultado);
?>