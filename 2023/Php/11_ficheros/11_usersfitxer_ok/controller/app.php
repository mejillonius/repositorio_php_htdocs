<?php
require "../model/model.php";
require "../view/view.php";

function sanitize($data)
{
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
}

function actionNuevoUsuario()
{
      if (("POST" === $_SERVER["REQUEST_METHOD"]) && isset($_REQUEST['registrar'])) {

            $usuario = isset($_REQUEST['usuario']) ? $_REQUEST['usuario'] : "";
            $email = isset($_REQUEST['email']) ? $_REQUEST['email'] : "";

            $usuario = sanitize($usuario);
            $email = sanitize($email);

            //validar datos
            $ok = modeloRegistrarNuevoUsuario($usuario, $email);
            if ($ok) {
                  //Nos devuelve el modelo un true
                  vistaRegistroCompletado($usuario, $email);
                  exit;
            } else {
                  vistaRegistroIncorrecto($usuario, $email);
                  exit;
            }
      }
}
//si no existe un action declarado

if (!isset($_REQUEST['registrar'])) {
      vistaMostrarFormularioRegistro();
} else {
      actionNuevoUsuario();
}

/* if (!isset($_REQUEST['action'])) {
vistaMostrarFormularioRegistro();
}

$action = "action" . $_REQUEST["action"];

$ejecuta = call_user_func($action);

if (!$ejecuta) {
vistaMostrarFormularioRegistro();
} */