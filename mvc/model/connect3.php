<?php

$typedb = 'mysql';
$host = 'localhost';
$dbname = 'users2023';
$user = 'root';
$pw = '';


try {
    $con = new PDO ($typedb.":host=".$host.";dbname=".$dbname.";charset=UTF8",$user,$pw);
    echo "OLE!!!!";
}  catch (PDOException $exception) {
    echo $exception->getMessage();
}