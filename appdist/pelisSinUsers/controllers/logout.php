<?php

if (isset($_COOKIE['PHPSESSID'])) {
    unset($_COOKIE['PHPSESSID']); 
    setcookie('PHPSESSID', null, -1, '/'); 

}
echo("<h1>Hasta la proxima</h1>");
header('Refresh:5;url=' .'//' . $_SERVER['SERVER_NAME'] . '/appdist/usersSinPelis/');