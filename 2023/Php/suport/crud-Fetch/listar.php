<?php


$data = file_get_contents("php://input");


require "conexion.php";


$consulta = $pdo->prepare("SELECT * FROM productos ORDER BY id DESC");

$consulta->execute();


if ("" != $data) {

 
    $consulta = $pdo->prepare("SELECT * FROM productos WHERE id LIKE '%" . $data . "%' OR producto LIKE '%" . $data . "%' OR precio LIKE '%" . $data . "%'  ");

    $consulta->execute();
}


$resul = $consulta->fetchAll();

$pdo = null;

// en un bucle crea una taula en HTML per mostrar-la després a la vista
// en el bucle carrega a cada fila en una columna diferent els valors de cada registre
// afegeix a cada fila dos botons de classe button que ens permetran editar/esborrar el registre seleccionat
// a cada botó indicarà la funció de JS que s'executarà el pulsar-lo
// a cada funció s'inclou el id com a paràmetre per quan es pulsi el botó indicar sobre quin registre s'ha aplicar la funció
foreach ($resul as $data) {
    echo "<tr>
            <td>" . $data['id'] . "</td>
            <td>" . $data['producto'] . "</td>
            <td>" . $data['precio'] . "</td>
            <td>" . $data['cantidad'] . "</td>
            <td>
                <button type='button' class='btn btn-success' onclick=editar('" . $data['id'] . "')>Editar</button>
                <button type='button' class='btn btn-danger' onclick=eliminar('" . $data['id'] . "')>Eliminar</button>
            </td>
        </tr>";
}
