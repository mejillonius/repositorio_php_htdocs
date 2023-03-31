<?php
$result = [
    [
        "id" => 1,
        "nombre" => "Pepe",
        "email" => "pepe@pepe.es",
        "estado" => false
    ],
    [
        "id" => 2,
        "nombre" => "yo",
        "email" => "yo@yo.es",
        "estado" => true
    ],
    [
        "id" => 3,
        "nombre" => "Òscar",
        "email" => "oscar@oscar.es",
        "estado" => false
    ],
    [
        "id" => 4,
        "nombre" => "Pepon",
        "email" => "pepon@pepon.es",
        "estado" => false
    ],
    [
        "id" => 5,
        "nombre" => "Pepito",
        "email" => "pepito@pepito.es",
        "estado" => true
    ],
];
echo json_encode($result);
