<?php
    // Cargar los ficheros que requiere la aplicación
    require_once '../config/config.php';
    require_once LIB_ROUTE.'Database.php';
    require_once CONTROLLER_ROUTE . 'CommonController.php';

    try{

    
        // Si llega la Section en la URL
        $section = empty($_GET['section'])? DEFAULT_SECTION : htmlspecialchars($_GET['section']);

        // Si llega la Action en la URL
        $action = empty($_GET['action'])? DEFAULT_ACTION : htmlspecialchars($_GET['action']);

        // Si llegan parámetros en la URL (ITEM)
        $item = empty($_GET['item'])? '' : htmlspecialchars($_GET['item']);

        $pagina = CONTROLLER_ROUTE.$section.'/'.$action.'.php';

        echoDebug($pagina);

        // Comprobar si la página existe
        if(is_readable($pagina))
        {
            require_once $pagina;
        }
        else
        {
            throw new Exception('Operación no permitida: '.$section.'/'.$action.'.php');
        }

    }
    catch (Exception $e)
    {
        $mensaje = $e->getMessage();
        include VIEWS_ROUTE.'error.php';
    }

