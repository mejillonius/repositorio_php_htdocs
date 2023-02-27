<?php
/**
 * Created by PhpStorm.
 * User: Alumne Matí
 * Date: 12/7/2018
 * Time: 12:29
 */

// Si llega la petición de hacer LOGIN
if(!empty($_POST['login']))
{
    // Recupera la información que llega por POST
    $user = $_POST['user'];
    $password = $_POST['password'];
    $error = false;

    // Si el usuario es admin y el password 1234
    if($user=='admin' and $password=='1234')
    {
        $_SESSION['logged'] = true;
        $_SESSION['user']=$user;
        $_SESSION['user_profile']='admin';
    }
    else
    {
        throw new Exception('Nombre de Usuario o Password incorrectos...');
    }
}

// Si llega petición de hacer LOGOUT
if(!empty($_POST['logout']))
{
    // Vacía el array de Sesión
    session_unset();
    // Destruye la Sesión
    session_destroy();
    // Eliminar la Cookie de Sesión
    $p = session_get_cookie_params();
    setcookie(session_name(),'',time()-1000,$p['path'],$p['domain'],$p['secure'],$p['httponly']);
}

include VIEWS_ROUTE.'portada.php';