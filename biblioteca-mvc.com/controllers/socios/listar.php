<?php

    require_once MODELS_ROUTE.'SociosModel.php';

    // Recuperar los socios
    $socios = SociosModel::getSocios();

    printRDebug($socios);

    if(!$socios)
        throw new Exception('No existen Socios para listar...');

    // Cargar la Vista (Listado de Socios)
    include VIEWS_ROUTE.'socios/listar.php';