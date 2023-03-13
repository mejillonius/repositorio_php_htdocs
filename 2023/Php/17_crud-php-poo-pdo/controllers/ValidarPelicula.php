<?php
class ValidarPelicula
{
    public function ValidadorPelicula($pelicula)
    {
        $errores = [];
        $title = $pelicula->getTitle();
        if (empty($title)) {
            $errores['title'] = "Campo requerido";
        }
        //...
        if () {
         
        }
        return $errores;
    }
}
