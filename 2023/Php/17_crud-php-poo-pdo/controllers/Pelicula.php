<?php
class Pelicula
{
    private $title;
    private $rating;
    private $awards;
    private $release_date;
    private $length;
    private $genre_id;

    public function __construct()
    {
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



    //Setters
    public function setTitle($title)
    {
        $this->title = $title;
    }
    public function setRating($rating)
    {
        $this->rating = $rating;
    }
}
