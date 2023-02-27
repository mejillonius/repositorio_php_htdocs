<?php
   if(session_id() == ''){
    session_start();
 }
require_once('./controller/config.php');
require(CONTROL.'control.php');

?>