<?php

require_once MODELS_ROUTE.'Telefono.php';


    // Rellenar las variables para pasarle a la vista
    $telefonos = Telefono::getTelefonos();

    // Cargar la vista
    include VIEWS_ROUTE.'telefonos/listar.php';

