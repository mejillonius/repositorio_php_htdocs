<?php


class ValidarUser
{
    public function validadorRegistro($registro)
    {
        $errores = [];


        $username = trim($registro->getUsername());
        if (empty($username)) {
            $errores['username'] = "usuario: Campo requerido";
        }
        /*         $rating = trim($registro->getRating());
        if (empty($rating)) {
            $errores['rating'] = "Campo requerido";
        }
        $awards = trim($registro->getAwards());
        if (empty($awards)) {
            $errores['awards'] = "Campo requerido";
        } */
        $password = trim($registro->getPassword());
        if (empty($password)) {
            $errores['password'] = "password:Campo requerido";
        }
        /*         $length = trim($registro->getLength());
        if (empty($length)) {
            $errores['length'] = "Campo requerido";
        } */
        $rol = trim($registro->getRol());
        if (empty($rol)) {
            $errores['genre'] = "rol: Campo requerido";
        }
        /*         $id = trim($registro->getId());
        if (empty($id)) {
            $errores['id'] = "Campo requerido";
        } */

        /*     $img = $registro->getImg();
        if (empty($img)) {
            $errores['img'] = "Imagen: Campo requerido";
        } */

        $email = trim($registro->getemail());
        if (empty($email)) {
            $errores['genre'] = "email: Campo requerido";
        }
        return $errores;
    }

    public function validadorLogin ($logueo){
        
        $errores = [];

        $username = trim($logueo->getUserame());
        if (empty($username)) {
            $errores['username'] = "usuario: Campo requerido";
        } 
        $password = trim($logueo->getPassword());
        if (empty($password)) {
            $errores['password'] = "password:Campo requerido";
        }       
        $email = trim($logueo->getemail());
        if (empty($email)) {
            $errores['genre'] = "email: Campo requerido";
        }
        return $errores;
    }
}