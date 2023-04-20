<?php


/**
 * En este archivo se destruye la sesion para hacer un logout
 * 
 */
session_destroy();
if (isset($_COOKIE['PHPSESSID'])) {
    unset($_COOKIE['PHPSESSID']); 
    setcookie('PHPSESSID', null, -1, '/'); 

}
echo("<h1>Hasta la proxima</h1>");
header('Refresh:5;url=' .'//' . $_SERVER['SERVER_NAME'] . '/appdist/usersSinPelis/');