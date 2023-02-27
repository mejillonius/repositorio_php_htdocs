<?php

$host = "sql209.byethost17.com";
$user = "b17_33023047";
$pass = "byetMejillon1";
$bd = "b17_33023047_users2023";

$con = new mysqli($host, $user, $pass, $bd);

if ($con->connect_errno) {
      die('Errorum de connexión  (' . $con->connect_errno . ') ' . $con->connect_error);
}
echo CONNECTDEBUG?"Enhorabuena... conexión realizada." . $con->host_info:'';
