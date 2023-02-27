<?php

require_once "functions.php";
require_once "vista.php";


if (!isset($_POST['action'])) vista_form();

$action = "action_" . $_POST['action'];

if(!is_numeric(str_replace(",", ".",$_POST['value1'])) || !is_numeric(str_replace(",", ".",$_POST['value2']))) vista_form();

$value1 = str_replace(",", ".",$_POST['value1']);
$value2 = str_replace(",", ".",$_POST['value2']);


if(!preg_match("/^[0-9]{1,}(\.[0-9]{1,})?$/", $value1) || !preg_match("/^\d{1,}(\.\d{1,})?$/", $value2)) vista_form(); 

call_user_func($action, $value1, $value2);

 
function action_suma($a, $b) {
    $res = modelo_suma($a, $b);
    vista_results("$a + $b = $res");
}
function action_resta($a, $b) {
    $res = modelo_resta($a, $b);
    vista_results("$a - $b = $res");
}
function action_multi($a, $b) {
    $res = modelo_multi($a, $b);
    vista_results("$a · $b = $res");
}
function action_division($a, $b) {
    $res = modelo_division($a, $b);
    vista_results("$a / $b = $res");
}
function action_modulo($a, $b) {
    $res = modelo_modulo($a, $b);
    vista_results("$a % $b = $res");
}


?>