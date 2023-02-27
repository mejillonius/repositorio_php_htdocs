<?php

// creem variables on guardem el nom del servidor a connectar-nos, el nom de l'usuari administrador de la BBDD, la seva contrasenya i a quina BBDD ens connectarem

$host = 'localhost';
$user = 'root';
$pass = '';
$bd = 'users2023';

// creem una connexió al SQL fent servir les dades que hem guardat a les variables
// la connexió la guardem a la variable $con
// aquest variable $con al ser un objecte mysqli se li podran executar mètodes propis com per exemple close() per tancar la connexió  

$con = new mysqli($host, $user, $pass, $bd);

// comprovem que si existeix un error de conexió mirant si hi ha un numero de error (tipus d'error que ens indica per que ha fallat la connexió)

if ($con->connect_errno) {

      // el die ens mostra connect_errno que és el numero de error entre parèntesi i el connect_error que és la descripció de l'error, i el treu del servidor

      die('Error de Conexión (' . $con->connect_errno . ')' . $con->connect_error);

      // ens treu d'aquest fitxer per si no ho hagués fet el die el treu del servidor


}

// amb host_info ens mostra quin 

// echo "Perfect...". $con -> host_info. "\n";