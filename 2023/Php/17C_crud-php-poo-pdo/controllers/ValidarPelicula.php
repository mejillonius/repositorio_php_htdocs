<?php


class ValidarPelicula
{
    public function validadorPelicula($pelicula)
    {
        $errores = [];
        $title = trim($pelicula->getTitle());
        if (empty($title)) {
            $errores['title'] = "Título: Campo requerido";
        }
        /*         $rating = trim($pelicula->getRating());
        if (empty($rating)) {
            $errores['rating'] = "Campo requerido";
        }
        $awards = trim($pelicula->getAwards());
        if (empty($awards)) {
            $errores['awards'] = "Campo requerido";
        } */
        $release_date = trim($pelicula->getReleaseDate());
        if (empty($release_date)) {
            $errores['release_date'] = "Fecha de realización:Campo requerido";
        }
        /*         $length = trim($pelicula->getLength());
        if (empty($length)) {
            $errores['length'] = "Campo requerido";
        } */
        $genre_id = trim($pelicula->getGenre());
        if (empty($genre_id)) {
            $errores['genre'] = "Género: Campo requerido";
        }
        /*         $id = trim($pelicula->getId());
        if (empty($id)) {
            $errores['id'] = "Campo requerido";
        } */

        /*     $img = $pelicula->getImg();
        if (empty($img)) {
            $errores['img'] = "Imagen: Campo requerido";
        } */
        return $errores;
    }
    public function controllerImg($pelicula)
    {

        if ('POST' == $_SERVER['REQUEST_METHOD']) {
            if (isset($_FILES['img']) && $_FILES['img']['error'] === UPLOAD_ERR_OK) {
                //guardamos las propiedadeds de la imagen
                $img_file = $_FILES['img']['name'];
                $tmp_dir = $_FILES['img']['tmp_name'];
                $img_size = $_FILES['img']['size'];
                //subimos la imagen seleccionada a nuestra carpeta de imagenes img
                if (!is_dir('images2/')) {
                    mkdir('images2/', 0777, true);
                }
                $upload_dir = 'images2/';
                //extraemos la extension de la imagen para ver si es una extension valida
                $img_extension = strtolower(pathinfo($img_file, PATHINFO_EXTENSION));
                $valid_extensions = ['jpeg', 'jpg', 'png', 'gif'];
                //elegimos un nombre de fichero al azar
                $img = rand(10000, 100000) . "B." . $img_extension;
                var_dump($img);
                // comprobación de la extensión del archivo
                if (in_array($img_extension, $valid_extensions)) {

                    //comprobación del tamaño del archivo
                    if ($img_size < 50000) {


                        $img_actual = $pelicula->getImg();

                        var_dump($img_actual);

                        unlink($upload_dir . $img_actual);
                    }
                    //  guarda una nuea imagen para el personaje
                    move_uploaded_file($tmp_dir, $upload_dir . $img);
                    $pelicula->setImg($img);
                }
            }
        }
    }
}
