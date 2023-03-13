<?php
class Consulta
{
    //método listado de películas
    public function listarPeliculas()
    {
        $sql = "SELECT* FROM $movies";
        $query = $bd->prepare($sql);
        $query->execute();
        $peliculas = $query->fetchAll(PDO::FETCH_ASSOC);
        return $peliculas;
    }
    //Método para listar los generos, estos son usados en agregar como en editar películas
    public function listarGeneros()
    {
    }
    //Método para  nueva película
    public function guardarPelicula()
    {
        $sql = "";


        header('location:index.php');
    }
    //detalle película seleccionada
    public function detallePelicula()
    {
        $sql = "";


        return $pelicula;
    }
    //Este es el método que controla la busqueda de las películas
    public function buscarPelicula($bd, $tabla, $busqueda)
    {
        $sql = "";

        return $peliculas;
    }
    //borrado de la película que el usuario selecione
    public function borrarpelicula($bd, $movies, $id)
    {
        $sql = "";
    }
    //Método de  modificación de los datos de una película
    public function actualizarPelicula($bd, $movies, $pelicula, $id)
    {
        $sql = "";


        header('location:index.php');
    }
}
