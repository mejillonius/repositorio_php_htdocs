<?php
class Pelicula
{
    private $title;
    private $rating;
    private $awards;
    private $release_date;
    private $length;
    private $genre_id;
    private $id;
    private $img;

    /**
     * __construct.
     *
     * @author	Alberto Galarzo
     * @since	v0.0.1
     * @version	v1.0.0	Thursday, April 20th, 2023.
     * @access	public
     * @param	mixed	$title    titulo de la pelicula   	
     * @param	mixed	$rating   nota de la pelicula   	
     * @param	mixed	$awards      	premios de la pelicula
     * @param	mixed	$release_date	fecha de estreno de la pelicula
     * @param	mixed	$length      	duracion de la pelicula
     * @param	mixed	$genre_id    	genero de la pelicula, ha de estar dentro de los generos definidos dentro de la tabla de generos
     * @param	mixed	$img         	Default: null poster de la pelicula
     * @return	void
     */
    public function __construct($title, $rating, $awards, $release_date, $length, $genre_id, $img = null)
    {
        $this->title = $title;
        $this->rating = $rating;
        $this->awards = $awards;
        $this->release_date = $release_date;
        $this->length = $length;
        $this->genre_id = $genre_id;
        $this->img = $img;
    }
    //Getters
    public function getTitle()
    {
        return $this->title;
    }
    public function getRating()
    {
        return $this->rating;
    }
    public function getAwards()
    {
        return $this->awards;
    }
    public function getReleaseDate()
    {
        return $this->release_date;
    }
    public function getLength()
    {
        return $this->length;
    }
    public function getGenre()
    {
        return $this->genre_id;
    }
    public function getId()
    {
        return $this->id;
    }
    public function getImg()
    {
        return $this->img;
    }

    //Setters
    public function setTitle($title)
    {
        $this->title = $title;
    }
    public function setRating($rating)
    {
        $this->rating = $rating;
    }
    public function setAwards($awards)
    {
        $this->awards = $awards;
    }
    public function setReleaseDate($release_date)
    {
        $this->release_date = $release_date;
    }
    public function setLength($length)
    {
        $this->length = $length;
    }
    public function setGenre($genre_id)
    {
        $this->genre_id = $genre_id;
    }
    public function setImg($img)
    {
        $this->img = $img;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
}
