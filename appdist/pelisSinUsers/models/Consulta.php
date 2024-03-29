<?php
class Consulta
{
    /**
     * Este método muestra el listatdo de todas las películas
     *
     * @author	Alberto Galarzo
     * @since	v0.0.1
     * @version	v1.0.0	Thursday, April 20th, 2023.
     * @access	public
     * @param	mixed	$bd    	base de datos donde mirar
     * @param	mixed	$movies	tabla donde mirar
     * @return	mixed devuelve un array de resultados
     */
    public function listarPeliculas($bd, $movies)
    {
        $sql = "SELECT* FROM $movies";
        $query = $bd->prepare($sql);
        $query->execute();
        $peliculas = $query->fetchAll(PDO::FETCH_ASSOC);
        return $peliculas;
    }
    /**
     * Método para listar los generos, estos son usudados luego tanto en agregar como en editar películas
     *
     * @author	Alberto Galarzo
     * @since	v0.0.1
     * @version	v1.0.0	Thursday, April 20th, 2023.
     * @access	public
     * @param	mixed	$bd    	base de datos donde mirar
     * @param	mixed	$genres	 tabla donde mirar
     * @return	mixed devuelve un array de resultados
     */
    public function listarGeneros($bd, $genres)
    {
        $sql = "SELECT * FROM $genres";
        $query = $bd->prepare($sql);
        $query->execute();
        $generos = $query->fetchAll(PDO::FETCH_ASSOC);
        return $generos;
    }
    /**
     * Método para agregar una nueva película
     *
     * @author	Alberto Galarzo
     * @since	v0.0.1
     * @version	v1.0.0	Thursday, April 20th, 2023.
     * @access	public
     * @param	mixed	$bd      	base de datos donde guardar
     * @param	mixed	$movies  	tabla donde guardar
     * @param	mixed	$pelicula	objeto pelicula
     * @return	void
     */
    public function guardarPelicula($bd, $movies, $pelicula)
    {

        $sql = "INSERT INTO $movies (title,rating,awards,release_date,length,genre_id,img) VALUES (:title,:rating,:awards,:release_date,:length,:genre_id,:img)";

        $query = $bd->prepare($sql);
        $query->bindValue(':title', $pelicula->getTitle(), PDO::PARAM_STR);
        $query->bindValue(':rating', $pelicula->getRating(), PDO::PARAM_INT);
        $query->bindValue(':awards', $pelicula->getAwards(), PDO::PARAM_INT);
        $query->bindValue(':release_date', $pelicula->getReleaseDate());
        $query->bindValue(':length', $pelicula->getLength(), PDO::PARAM_INT);
        $query->bindValue(':genre_id', $pelicula->getGenre(), PDO::PARAM_STR);
        $query->bindValue(':img', $pelicula->getImg(), PDO::PARAM_STR);
        $query->execute();
        header('location:' . url_inici);
    }
    /**
     * Este método muestra el detalle de una película selecciona de la lista por parte del usuario
     *
     * @author	Alberto Galarzo
     * @since	v0.0.1
     * @version	v1.0.0	Thursday, April 20th, 2023.
     * @access	public
     * @param	mixed	$bd    	base de datos deonde mirar
     * @param	mixed	$movies	tabla deonde mirar
     * @param	mixed	$genres	tabla de generos
     * @param	mixed	$id    	id de la pelicula
     * @return	mixed   devuelve un array de resultados
     */
    public function detallePelicula($bd, $movies, $genres, $id)
    {
        $sql = "SELECT $movies.* , $genres.name FROM $movies,$genres WHERE $movies.genre_id =$genres.id AND $movies.id = $id";
        $query = $bd->prepare($sql);
        $query->execute();
        $pelicula = $query->fetch(PDO::FETCH_ASSOC);

        return $pelicula;
    }
    /**
     * Este es el método que controla la busqueda de las películas
     *
     * @author	Alberto Galarzo
     * @since	v0.0.1
     * @version	v1.0.0	Thursday, April 20th, 2023.
     * @access	public
     * @param	mixed	$bd      	base de datos donde mirar
     * @param	mixed	$tabla   	tabla donde mirar
     * @param	mixed	$busqueda	termino de busqueda
     * @return	mixed   devuelve un array de resultados
     */
    public function buscarPelicula($bd, $tabla, $busqueda)
    {
        $sql = "SELECT * FROM $tabla WHERE title LIKE :busqueda";
        $query = $bd->prepare($sql);
        $query->bindValue(':busqueda', "%" . $busqueda . "%");
        $query->execute();
        $peliculas = $query->fetchAll(PDO::FETCH_ASSOC);

        return $peliculas . header('location:' . url_inici);
    }
    /**
     * Este método controla el borrado de la película que el usuario selecione
     *
     * @author	Alberto Galarzo
     * @since	v0.0.1
     * @version	v1.0.0	Thursday, April 20th, 2023.
     * @access	public
     * @param	mixed	$bd    	base de datos donde borrar
     * @param	mixed	$movies	tabla donde borrar
     * @param	mixed	$id    	id de la pelicula
     * @return	void
     */
    public function borrarpelicula($bd, $movies, $id)
    {
        /*  Eliminación de la img asociada al id del personaje: */
        $del_img = $bd->prepare("SELECT img FROM $movies WHERE id=:id");
        $del_img->bindValue(':id', $id);
        $del_img->execute();
        $prequery = $del_img->fetch();
        $img_actual = $prequery['img'];
        if ($img_actual != null) {
            $upload_dir = 'images/';
            unlink($upload_dir . $img_actual);
        }

        $sql = "DELETE FROM $movies WHERE id = :id";
        $query = $bd->prepare($sql);
        $query->bindvalue(':id', $id);
        $query->execute();
    }
    /**
     * Método para realizar la edición o modificación de los datos de alguna película
     *
     * @author	Alberto Galarzo
     * @since	v0.0.1
     * @version	v1.0.0	Thursday, April 20th, 2023.
     * @access	public
     * @param	mixed	$bd      	base de datos donde mirar
     * @param	mixed	$movies  	tabla donde mirar
     * @param	mixed	$pelicula	objeto pelicula
     * @param	mixed	$id      	id de la pelicula a actualizar
     * @return	void
     */
    public function actualizarPelicula($bd, $movies, $pelicula, $id)
    {
        if ($pelicula->getImg() == null) {
            $query = $bd->prepare("SELECT img FROM $movies WHERE id=:id");
            $query->bindValue(':id', $id);


            $query->execute();

            $prequery = $query->fetch();
            var_dump($prequery);
            $pelicula->setImg($prequery['img']);
        }
        $sql = "UPDATE $movies SET title=:title,rating=:rating,awards=:awards,release_date=:release_date, length=:length,genre_id=:genre_id,img=:img WHERE $movies.id=$id";
        $query = $bd->prepare($sql);
        $query->bindValue(':title', $pelicula->getTitle());
        $query->bindValue(':rating', $pelicula->getRating());
        $query->bindValue(':awards', $pelicula->getAwards());
        $query->bindValue(':release_date', $pelicula->getReleaseDate());
        $query->bindValue(':length', $pelicula->getLength());
        $query->bindValue(':genre_id', $pelicula->getGenre());
        $query->bindValue(':img', $pelicula->getImg());
        $query->execute();
        header('location:' . url_inici);
    }
}
