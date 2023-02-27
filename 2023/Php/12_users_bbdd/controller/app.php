<?php
require_once "../model/model.php";
require_once "../view/view.php";

function sanitize($data)
{
      $data =  trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
}

function actionNuevoUsuario($con)
{
      if (("POST" === $_SERVER["REQUEST_METHOD"]) && isset($_REQUEST['registrar'])) {

            $usuario = isset($_REQUEST['usuario']) ? $_REQUEST['usuario'] : "";
            $email = isset($_REQUEST['email']) ? $_REQUEST['email'] : "";

            $usuario = sanitize($usuario);
            $email = sanitize($email);

            //validar datos
            list($rows, $ok) = modeloRegistrarNuevoUsuario($usuario, $email, $con);
            if ($ok) {
                  //Nos devuelve el modelo un true
                  vistaRegistroCompletado($usuario, $email, $rows);
            } else {
                  vistaRegistroIncorrecto($usuario, $email);
            }
      }
}

if (!isset($_REQUEST['registrar'])) {
      vistaMostrarFormularioRegistro();
} else {
      actionNuevoUsuario($con);
}
//si no existe un action eclarado
/*if (!isset($_REQUEST['action'])) {
      vistaMostrarFormularioRegistro();
}

$action = "action" . $_REQUEST["action"];

$ejecuta = call_user_func($action, $con);

if (!$ejecuta) {
      vistaMostrarFormularioRegistro();
} */