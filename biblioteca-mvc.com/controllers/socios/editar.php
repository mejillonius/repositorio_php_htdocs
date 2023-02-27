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

    // Actualizar el socio si viene el post del Socio
    if(!empty($_POST['editar']))
    {
        $socio->dni=Database::get()->real_escape_string($_POST['dni']);
        $socio->nombre=Database::get()->real_escape_string($_POST['nombre']);
        $socio->apellidos=Database::get()->real_escape_string($_POST['apellidos']);
        $socio->fecha_nacimiento=Database::get()->real_escape_string($_POST['fecha_nacimiento']);
        $socio->email=Database::get()->real_escape_string($_POST['email']);
        $socio->direccion =Database::get()->real_escape_string($_POST['direccion']);
        $socio->ciudad =Database::get()->real_escape_string($_POST['ciudad']);
        $socio->cp =Database::get()->real_escape_string($_POST['cp']);
        $socio->provincia =Database::get()->real_escape_string($_POST['provincia']);
        $socio->telefono =Database::get()->real_escape_string($_POST['telefono']);
        $socio->fecha_alta =Database::get()->real_escape_string($_POST['fecha_alta']);


        //intenta guardar los cambios
        if(!$socio->modificar())
            throw new Exception("No se pudieron realizar los cambios...");
        else
            $mensaje="Los datos del socio $socio->nombre $socio->apellidos se guardaron correctamente.";

    }

    // Mostrar la Vista
    include VIEWS_ROUTE.'/socios/editar.php';