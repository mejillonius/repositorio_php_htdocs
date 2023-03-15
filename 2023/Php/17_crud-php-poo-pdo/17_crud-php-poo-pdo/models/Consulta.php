<?php
class Consulta
{
    //Este método muestra el listatdo de todas las películas
    public function listarPeliculas($bd, $movies)
    {
        $sql = "SELECT* FROM $movies";
        $query = $bd->prepare($sql);
        $query->execute();
        $peliculas = $query->fetchAll(PDO::FETCH_ASSOC);
        return $peliculas;
    }
    //Método para listar los generos, estos son usudados luego tanto en agregar como en editar películas
    public function listarGeneros($bd, $genres)
    {
        $sql = "SELECT * FROM $genres";
        $query = $bd->prepare($sql);
        $query->execute();
        $generos = $query->fetchAll(PDO::FETCH_ASSOC);
        return $generos;
    }
    //Método para agregar una nueva película
    public function guardarPelicula($bd, $movies, $pelicula)
    {
        $sql = "INSERT INTO $movies (title,rating,awards,release_date,length,genre_id) VALUES (:title,:rating,:awards,:release_date,:length,:genre_id)";
        $query = $bd->prepare($sql);
        $query->bindValue(':title', $pelicula->getTitle(), PDO::PARAM_STR);
        $query->bindValue(':rating', $pelicula->getRating(), PDO::PARAM_INT);
        $query->bindValue(':awards', $pelicula->getAwards(), PDO::PARAM_INT);
        $query->bindValue(':release_date', $pelicula->getReleaseDate());
        $query->bindValue(':length', $pelicula->getLength(), PDO::PARAM_INT);
        $query->bindValue(':genre_id', $pelicula->getGenre(), PDO::PARAM_STR);
        $query->execute();
        header('location:index.php');
    }
    //Este método muestra el detalle de una película selecciona de la lista por parte del usuario
    public function detallePelicula($bd, $movies, $genres, $id)
    {
        $sql = "SELECT $movies.* , $genres.name FROM $movies,$genres WHERE $movies.genre_id =$genres.id AND $movies.id = $id";
        $query = $bd->prepare($sql);
        $query->execute();
        $pelicula = $query->fetch(PDO::FETCH_ASSOC);

        return $pelicula;
    }
    //Este es el método que controla la busqueda de las películas
    public function buscarPelicula($bd, $tabla, $busqueda)
    {
        $sql = "SELECT * FROM $tabla WHERE title LIKE :busqueda";
        $query = $bd->prepare($sql);
        $query->bindValue(':busqueda', "%" . $busqueda . "%");
        $query->execute();
        $peliculas = $query->fetchAll(PDO::FETCH_ASSOC);
        return $peliculas;
    }
    //Este método controla el borrado de la película que el usuario selecione
    public function borrarpelicula($bd, $movies, $id)
    {
        $sql = "DELETE FROM $movies WHERE id = :id";
        $query = $bd->prepare($sql);
        $query->bindvalue(':id', $id);
        $query->execute();
    }
    //Método para realizar la edición o modificación de los datos de alguna película
    public function actualizarPelicula($bd, $movies, $pelicula, $id)
    {
        $sql = "UPDATE $movies SET title=:title,rating=:rating,awards=:awards,release_date=:release_date, length=:length,genre_id=:genre_id WHERE $movies.id=$id";
        $query = $bd->prepare($sql);
        $query->bindValue(':title', $pelicula->getTitle());
        $query->bindValue(':rating', $pelicula->getRating());
        $query->bindValue(':awards', $pelicula->getAwards());
        $query->bindValue(':release_date', $pelicula->getReleaseDate());
        $query->bindValue(':length', $pelicula->getLength());
        $query->bindValue(':genre_id', $pelicula->getGenre());
        $query->execute();
        header('location:index.php');
    }
}
