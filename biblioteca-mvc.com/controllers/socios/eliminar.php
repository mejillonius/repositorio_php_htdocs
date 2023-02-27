<?php

    // Controlar Usuario
    if(empty($_SESSION['user']))
        throw new Exception('Solo usuarios identificados...');

    require MODELS_ROUTE.'SociosModel.php';

    //comprobar si llega el código de socio por GET
    if(empty($item))
        throw new Exception("No se indicó el socio a mostrar...");

    //recupera el codigo que llega por GET
    $codigo=intval($item);

    //recupera el socio con ese código
    $socio = SociosModel::getSocio($item);

    //si el socio no existe...
    if(!$socio)
        throw new Exception("Socio $codigo inexistente");

    // Si llega la confirmación de la baja
    if(!empty($_POST['codigo_socio_baja']))
    {
        $codigo=intval($_POST['codigo_socio_baja']);

        // Eliminar el Socio
        if(!SociosModel::borrar($codigo))
            throw new Exception("No se pudo borrar el socio...");

        //mostrar la vista de éxito
        $mensaje="Borrado del socio $codigo realizado correctamente";
    }


    // Mostrar la Vista
    include VIEWS_ROUTE.'/socios/eliminar.php';