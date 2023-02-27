<?php

    // Controlar Usuario
    if(empty($_SESSION['user']))
        throw new Exception('Solo usuarios identificados...');

    require MODELS_ROUTE.'SociosModel.php';

    // Actualizar el socio si viene el post del Socio
    if(!empty($_POST['crear']))
    {
        $socio = new SociosModel();
        $socio->dni=Database::get()->real_escape_string($_POST['dni']);
        $socio->nombre=Database::get()->real_escape_string($_POST['nombre']);
        $socio->apellidos=Database::get()->real_escape_string($_POST['apellidos']);
        $socio->fecha_nacimiento=Database::get()->real_escape_string(date("Y-m-d", strtotime($_POST['fecha_nacimiento'])));
        $socio->email=Database::get()->real_escape_string($_POST['email']);
        $socio->direccion =Database::get()->real_escape_string($_POST['direccion']);
        $socio->ciudad =Database::get()->real_escape_string($_POST['ciudad']);
        $socio->cp =Database::get()->real_escape_string($_POST['cp']);
        $socio->provincia =Database::get()->real_escape_string($_POST['provincia']);
        $socio->telefono =Database::get()->real_escape_string($_POST['telefono']);
        $socio->fecha_alta =Database::get()->real_escape_string(date("Y-m-d", strtotime($_POST['fecha_alta'])));


        //intenta guardar los cambios
        if(!$socio->guardar())
            throw new Exception("No se pudo crear el nuevo Socio...");
        else
            $mensaje="El socio $socio->nombre $socio->apellidos se creó correctamente.";

    }

    // Mostrar la Vista
    include VIEWS_ROUTE.'/socios/crear.php';