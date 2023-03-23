<?php
class ValidarPelicula
{
    public function validadorPelicula($pelicula)
    {
        $errores = [];
        $title = trim($pelicula->getTitle());
        $rating = trim($pelicula->getTitle());
        $awards = trim($pelicula->getTitle());
        $release_date = trim($pelicula->getTitle());
        $length = trim($pelicula->getTitle());
        $genre_id = trim($pelicula->getTitle());

        if (empty($title)) {
            $errores['title'] = "Titulo requerido";
        }
        if (empty($rating)) {
            $errores['rating'] = "Rating requerido";
        }
        if (empty($awards)) {
            $errores['awards'] = "Premios requerido";
        }
        if (empty($release_date)) {
            $errores['release_date'] = "Fecha de estreno requerido";
        }
        if (empty($length)) {
            $errores['length'] = "Duracion requerido";
        }
        if (empty($genre_id)) {
            $errores['genre_id'] = "Genero requerido";
        }

        if(strlen($title)>500) {
            $errores['title'] = "titulo demasiado largo";
        }
        
        

        return $errores;
    }
}

/* private $title;
private $rating;
private $awards;
private $release_date;
private $length;
private $genre_id; */
