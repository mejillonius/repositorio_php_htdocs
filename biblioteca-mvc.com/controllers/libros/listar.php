<?php

    require_once MODELS_ROUTE.'LibrosModel.php';

    // Recuperar los socios
    $libros = LibrosModel::getLibros();

    printRDebug($libros);

    if(!$libros)
        throw new Exception('No existen Libros para listar...');

    // Cargar la Vista (Listado de Socios)
    include VIEWS_ROUTE.'libros/listar.php';