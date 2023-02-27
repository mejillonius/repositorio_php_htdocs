<?php

    // Controlar Usuario
    if(empty($_SESSION['user']))
        throw new Exception('Solo usuarios identificados...');

    require MODELS_ROUTE.'LibrosModel.php';

    //comprobar si llega el código de socio por GET
    if(empty($item))
        throw new Exception("No se indicó el Libro a mostrar...");

    //recupera el codigo que llega por GET
    $codigo=intval($item);

    //recupera el socio con ese código
    $libro = LibrosModel::getLibro($item);

    //si el socio no existe...
    if(!$libro)
        throw new Exception("Libro $libro inexistente");

    // Actualizar el socio si viene el post del Socio
    if(!empty($_POST['editar']))
    {
        $libro->isbn=Database::get()->real_escape_string($_POST['isbn']);
        $libro->titulo=Database::get()->real_escape_string($_POST['titulo']);
        $libro->editorial=Database::get()->real_escape_string($_POST['editorial']);
        $libro->idioma=Database::get()->real_escape_string($_POST['idioma']);
        $libro->autor=Database::get()->real_escape_string($_POST['autor']);
        $libro->n_ediciones =Database::get()->real_escape_string($_POST['n_ediciones']);
        $libro->edad_recomendada =Database::get()->real_escape_string($_POST['edad_recomendada']);

        //intenta guardar los cambios
        if(!$libro->modificar())
            throw new Exception("No se pudieron realizar los cambios...");
        else
            $mensaje="Los datos del Libro $libro->titulo ($libro->isbn) se guardaron correctamente.";

    }

    // Mostrar la Vista
    include VIEWS_ROUTE.'/libros/editar.php';