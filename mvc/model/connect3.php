<?php


/* $typedb = 'mysql';
$host = 'localhost';
$dbname = 'users2023';
$user = 'root';
$pw = '';


try {
    $con = new PDO ($typedb.":host=".$host.";dbname=".$dbname.";charset=UTF8",$user,$pw);
    echo "OLE!!!!";
}  catch (PDOException $exception) {
    echo $exception->getMessage();
} */


// require_once("./config.php"); //ya estan cargadas las constantes en mi config

try {
    $con = new PDO (PDO_DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME.";charset=UTF8",DB_USER,DB_PASS);
    echo "OLE!!!! conexion 3";
}  catch (PDOException $exception) {
    echo $exception->getMessage();
}