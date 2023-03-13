<?php
class Consulta
{
    //método listado de películas
    public function listarPeliculas($bd,$movies)
    {
        $sql = "SELECT* FROM $movies";
        $query = $bd->prepare($sql);
        $query->execute();
        $peliculas = $query->fetchAll(PDO::FETCH_ASSOC);
        return $peliculas;
    }
    //Método para listar los generos, estos son usados en agregar como en editar películas
    public function listarGeneros($bd, $genres)
    {
        $sql = "SELECT* FROM $genres";
        $query = $bd->prepare($sql);
        $query->execute();
        $generos = $query->fetchAll(PDO::FETCH_ASSOC);
        return $generos;
    }
    //Método para  nueva película
    public function guardarPelicula($bd, $movies, $pelicula)
    {
        $sql = "INSERT INTO $movies(title, rating, awards, release_date, length, genre_id) VALUES (:title, :rating, :awards, :release_date, :length, :genre_id)";

        $query = $bd->prepare($sql);
        $query->bindValue(':title',$pelicula->getTitle());
        $query->bindValue(':rating',$pelicula->getRating());
        $query->bindValue(':awards',$pelicula->getAwards());
        $query->bindValue(':release_date',$pelicula->getRelease_date());
        $query->bindValue(':length',$pelicula->getLength());
        $query->bindValue(':genre_id',$pelicula->getGenre_id());
        $query->execute();
        header('location:index.php');
    }
    //detalle película seleccionada
    public function detallePelicula($bd, $movies, $genres, $id)
    {
        $sql = "SELECT $movies.*, $genres.name FROM $movies, $genres WHERE $movies.genre_id = $genres.id AND $movies.id = $id";
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
        $query->bindValue(':busqueda', "%".$busqueda."%");
        $query->execute();
        $peliculas = $query->fetchAll(PDO::FETCH_ASSOC);

        return $peliculas;
    }
    //borrado de la película que el usuario selecione
    public function borrarpelicula($bd, $movies, $id)
    {
        $sql = "DELETE FROM $movies WHERE id = :id";
        $query = $bd->prepare($sql);
        $query->bindValue(':id',$id);
        $query->execute();    
    }
    //Método de  modificación de los datos de una película
    public function actualizarPelicula($bd, $movies, $pelicula, $id)
    {
        $sql = "UPDATE $movies SET title=:title, rating=:rating,awards=:awards,release_date=:release_date,length=:length,genre_id=:genre_id WHERE $movies.id=$id";
        $query = $bd->prepare($sql);
        $query->bindValue(':title',$pelicula->getTitle());
        $query->bindValue(':rating',$pelicula->getRating());
        $query->bindValue(':awards',$pelicula->getAwards());
        $query->bindValue(':release_date',$pelicula->getRelease_date());
        $query->bindValue(':length',$pelicula->getLength());
        $query->bindValue(':genre_id',$pelicula->getGenre_id());
        $query->execute();   

        header('location:index.php');
    }
}
