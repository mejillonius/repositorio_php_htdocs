<?php

    require_once MODELS_ROUTE.'/menu/Menu.php';
    require_once MODELS_ROUTE.'/menu/ItemMenu.php';

    // Definir las variables comunes para todos los templates

    // Header
    $title_content = 'Biblioteca';
    $subtitle_content = 'Ejercicio MVC';

    // Menú
    $items_menu = array();

    // Home
    $menu_item_home = new ItemMenu('Home','index.php','portada','inicio','public','false');
    $items_menu[]=$menu_item_home;

    // Sección socios
    $items_socio = array();
    // Listar Socios
    $menu_item_socio_listado = new ItemMenu('Listado','?section=socios&action=listar','socios','listar','admin');
    $items_socio[]=$menu_item_socio_listado;
    // Crear Socios
    $menu_item_socio_crear = new ItemMenu('Crear Socio','?section=socios&action=crear','socios','crear','admin');
    $items_socio[]=$menu_item_socio_crear;
    // Item Socio
    $menu_item_socio = new ItemMenu('Socios','#','socios','','admin',true,'Socios',$items_socio);
    $items_menu[]=$menu_item_socio;

    // Sección libros
    $items_libros = array();
    // Listar Libros
    $menu_item_libros_listado = new ItemMenu('Listado','?section=libros&action=listar','libros','listar','public');
    $items_libros[]=$menu_item_libros_listado;
    // Crear Libros
    $menu_item_libros_crear = new ItemMenu('Crear Libro','?section=libros&action=crear','libros','crear','admin');
    $items_libros[]=$menu_item_libros_crear;
    // Item Socio
    $menu_item_libro = new ItemMenu('Libros','#','libros','','public',true,'Libros',$items_libros);
    $items_menu[]=$menu_item_libro;

    // Objeto Menu
    $menu = new Menu('Biblioteca',$items_menu);

    printRDebug($menu);


    // Footer
    $title_footer = 'Biblioteca - Ejercicio MVC';





    // Función para mostrar DEBUGs
    function echoDebug($variable){
        if(DEBUG === true)
        {
            echo "<pre>";
            echo $variable;
            echo "</pre>";
        }
    }

    function printRDebug($variable)
    {
        if(DEBUG === true)
        {
            echo "<pre>";
            print_r($variable);
            echo "</pre>";
        }
    }

    function dumpDebug($variable)
    {
        if(DEBUG === true)
        {
            echo "<pre>";
            var_dump($variable);
            echo "</pre>";
        }
    }

