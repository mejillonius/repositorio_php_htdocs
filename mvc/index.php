<?php

if(!isset($_COOKIE["PHPSESSID"]))
{
  session_start();
}

require_once('./controller/mainController.php');

$app = new MainController();
$app->start();

?>