<?php

class  ValidarUser
{


      public function validadorLogin($logueo)
      {
            $errores = [];
            $username = trim($logueo->getUsername());
            if (empty($username)) {
                  $errores['username'] = "Nombre de usuario: Campo requerido";
            }
            $password = trim($logueo->getPassword());
            if (empty($password)) {
                  $errores['password'] = "Password: Campo requerido";
            }
            $email = trim($logueo->getEmail());
            if (empty($email)) {
                  $errores['email'] = "email:Campo requerido";
            } else if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
                  $errores['email'] = "Correo electrónico no válido.<br/>";
            }

            return $errores;
      }


      public function validadorRegistro($registro)
      {
            $errores = [];
            $username = trim($registro->getUsername());
            if (empty($username)) {
                  $errores['username'] = "Nombre de usuario: Campo requerido";
            }
            $password = trim($registro->getPassword());
            if (empty($password)) {
                  $errores['password'] = "Password: Campo requerido";
            }
            $rol = trim($registro->getRol());
            if (empty($rol)) {
                  $errores['rol_id'] = "Rol: Campo requerido";
            }
            $email = trim($registro->getEmail());
            if (empty($email)) {
                  $errores['email'] = "email:Campo requerido";
            } else if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
                  $errores['email'] = "Correo electrónico no válido.<br/>";
            }
            return $errores;
      }
}
