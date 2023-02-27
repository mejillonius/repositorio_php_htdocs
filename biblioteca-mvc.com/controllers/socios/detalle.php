<?php

    require MODELS_ROUTE.'SociosModel.php';

    //comprobar si llega el código de socio por GET
    if(empty($item))
        throw new Exception("No se indicó el socio a mostrar...");

    //recupera el codigo que llega por GET
    $codigo=intval($item);


    //recupera el socio con ese código
    $socio = SociosModel::getSocio($item);

    //si el socio no existe...
    if(!$socio or $socio == null)
        throw new Exception("Socio $codigo inexistente");

    include VIEWS_ROUTE.'/socios/detalle.php';