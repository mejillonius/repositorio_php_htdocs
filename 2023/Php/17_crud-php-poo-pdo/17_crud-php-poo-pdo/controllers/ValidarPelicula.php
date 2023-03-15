<?php
class ValidarPelicula
{
    public function validadorPelicula($pelicula)
    {
        $errores = [];
        $title = trim($pelicula->getTitle());
        if (empty($title)) {
            $errores['title'] = "Campo requerido";
        }
        /*       if (empty($title)) {
            $errores['title'] = "Campo requerido";
        } */
        return $errores;
    }
}
