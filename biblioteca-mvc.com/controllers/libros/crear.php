<?php

    // Controlar Usuario
    if(empty($_SESSION['user']))
        throw new Exception('Solo usuarios identificados...');

    require MODELS_ROUTE.'LibrosModel.php';

    // Actualizar el socio si viene el post del Socio
    if(!empty($_POST['crear']))
    {
        $libro = new LibrosModel();
        $libro->isbn=Database::get()->real_escape_string($_POST['isbn']);
        $libro->titulo=Database::get()->real_escape_string($_POST['titulo']);
        $libro->editorial=Database::get()->real_escape_string($_POST['editorial']);
        $libro->idioma=Database::get()->real_escape_string($_POST['idioma']);
        $libro->autor=Database::get()->real_escape_string($_POST['autor']);
        $libro->n_ediciones =Database::get()->real_escape_string($_POST['n_ediciones']);
        $libro->edad_recomendada =Database::get()->real_escape_string($_POST['edad_recomendada']);



        //intenta guardar los cambios
        if(!$libro->guardar())
            throw new Exception("No se pudo crear el nuevo Libro...");
        else
            $mensaje="El libro $libro->titulo ($libro->isbn) se creó correctamente.";

    }

    // Mostrar la Vista
    include VIEWS_ROUTE.'/libros/crear.php';