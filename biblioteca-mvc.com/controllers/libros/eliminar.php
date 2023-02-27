<?php

    // Controlar Usuario
    if(empty($_SESSION['user']))
        throw new Exception('Solo usuarios identificados...');

    require MODELS_ROUTE.'LibrosModel.php';

    //comprobar si llega el código de socio por GET
    if(empty($item))
        throw new Exception("No se indicó el libro a mostrar...");

    //recupera el codigo que llega por GET
    $codigo=intval($item);

    //recupera el socio con ese código
    $libro = LibrosModel::getLibro($item);

    //si el libro no existe...
    if(!$libro)
        throw new Exception("Libro $codigo inexistente...");

    // Si llega la confirmación de la baja
    if(!empty($_POST['codigo_libro_baja']))
    {
        $codigo=intval($_POST['codigo_libro_baja']);

        // Eliminar el Socio
        if(!LibrosModel::borrar($codigo))
            throw new Exception("No se pudo borrar el libro...");

        //mostrar la vista de éxito
        $mensaje="Borrado del Libro $codigo realizado correctamente";
    }


    // Mostrar la Vista
    include VIEWS_ROUTE.'/libros/eliminar.php';