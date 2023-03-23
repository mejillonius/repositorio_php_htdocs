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
        $img = trim($pelicula->getImg());

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


    
    if (isset($_FILES['uploadedFile']) && $_FILES['uploadedFile']['error'] === UPLOAD_ERR_OK) {

        // recogemos detalles
        $fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
        $fileName = $_FILES['uploadedFile']['name'];
        $fileSize = $_FILES['uploadedFile']['size'];
        $fileType = $_FILES['uploadedFile']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        //encriptamos
        $newFileName = md5($fileName) . '.' . $fileExtension;
        var_dump($newFileName);
        // extensiones aceptadas
        $allowedfileExtensions = array('jpg', 'gif', 'png', 'zip', 'txt', 'xls', 'doc');

        if (in_array($fileExtension, $allowedfileExtensions)) {
            // directorio donde irá
            $uploadFileDir = 'uploaded_files/';
            $dest_path = $uploadFileDir . $newFileName;

        if (move_uploaded_file($fileTmpPath, $dest_path)) {
            $errores['file'] = 'Archivo subido correctamente.';
        } else {
            $errores['file'] = 'Error. Directorio con permisos?.';
        }
        } else {
            $errores['file'] = 'Subida erronea. Extensiones permitidas: ' . implode(',', $allowedfileExtensions);
        }
    } else {
        $errores['file'] = 'Error: .<br>';
        $errores['file'] .= 'Error:' . $_FILES['uploadedFile']['error'];
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
