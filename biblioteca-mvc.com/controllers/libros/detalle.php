<?php

    require MODELS_ROUTE.'LibrosModel.php';

    //comprobar si llega el código de socio por GET
    if(empty($item))
        throw new Exception("No se indicó el libro a mostrar...");

    //recupera el codigo que llega por GET
    $codigo=intval($item);

    //recupera el socio con ese código
    $libro = LibrosModel::getLibro($item);

    //si el socio no existe...
    if(!$libro)
        throw new Exception("Libro $codigo inexistente");

    include VIEWS_ROUTE.'/libros/detalle.php';