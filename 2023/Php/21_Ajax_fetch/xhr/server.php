
<?php

$nombre = $_REQUEST['nombre'];
$apellido = $_REQUEST['apellido'];
$largonombre = strlen($nombre);
$largoapellido = strlen($apellido);

$resp =[
    'nombre' => $nombre,
    'apellido' => $apellido,
    'largonombre' => $largonombre,
    'largoapellido' => $largoapellido
];

$result = json_encode($resp);
echo $result;
