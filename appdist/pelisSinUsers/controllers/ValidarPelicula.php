<?php


/**
 * ValidarPelicula.
 *
 * @author	Alberto Galarzo
 * @since	v0.0.1
 * @version	v1.0.0	Thursday, April 20th, 2023.
 * @global
 */
class ValidarPelicula
{
    /**
     * validadorPelicula.
     * 
     * se encarga de validar que los campos de la pelicula sean correctos
     *
     * @author	Alberto Galarzo
     * @since	v0.0.1
     * @version	v1.0.0	Thursday, April 20th, 2023.
     * @access	public
     * @param	mixed	$pelicula	objeto del tipo pelicula
     * @return	mixed devuelve un array de strings con los errores que han surgido al validar
     */
    public function validadorPelicula($pelicula)
    {
        $errores = [];
        $title = trim($pelicula->getTitle());
        if (empty($title)) {
            $errores['title'] = "Título: Campo requerido";
        }

        $release_date = trim($pelicula->getReleaseDate());
        if (empty($release_date)) {
            $errores['release_date'] = "Fecha de realización:Campo requerido";
        }

        $genre_id = trim($pelicula->getGenre());
        if (empty($genre_id)) {
            $errores['genre'] = "Género: Campo requerido";
        }

        return $errores;
    }
    /**
     * controllerImg.
     *
     * se encarga de subir y agregar la imagen de la pelicula al servidor y validarla
     * 
     * @author	Alberto Galarzo
     * @since	v0.0.1
     * @version	v1.0.0	Thursday, April 20th, 2023.
     * @access	public
     * @param	mixed	$pelicula	objeto pelicula
     * @return	void
     */
    public function controllerImg($pelicula)
    {

        if ('POST' == $_SERVER['REQUEST_METHOD']) {
            if (isset($_FILES['img']) && $_FILES['img']['error'] === UPLOAD_ERR_OK) {

                $img_file = $_FILES['img']['name'];
                $tmp_dir = $_FILES['img']['tmp_name'];
                $img_size = $_FILES['img']['size'];
                //subimos la imagen seleccionada a nuestra carpeta de imagenes 
                if (!is_dir('images/')) {
                    mkdir('images/', 0777, true);
                }
                $upload_dir = 'images/';
                //extraemos la extension de la imagen para ver si es una extension valida
                $img_extension = strtolower(pathinfo($img_file, PATHINFO_EXTENSION));
                $valid_extensions = ['jpeg', 'jpg', 'png', 'gif'];
                //elegimos un nombre de fichero al azar
                $img = rand(10000, 100000) . "B." . $img_extension;
                /*   var_dump($img); */
                // comprobación de la extensión del archivo
                if (in_array($img_extension, $valid_extensions)) {

                    //comprobación del tamaño del archivo
                    if ($img_size < 50000) {


                        $img_actual = $pelicula->getImg();

                        /*   var_dump($img_actual); */

                        unlink($upload_dir . $img_actual);

                        move_uploaded_file($tmp_dir, $upload_dir . $img);
                        $pelicula->setImg($img);
                    }
                }
            }
        }
    }
}
