<?php
class Pelicula
{
    private $title;
    private $rating;
    private $awards;
    private $release_date;
    private $length;
    private $genre_id;

    public function __construct($title,$rating,$awards,$release_date,$length,$genre_id)
    {
        $this->title=$title;
        $this->rating=$rating;
        $this->awards=$awards;
        $this->release_date=$release_date;
        $this->length=$length;
        $this->genre_id=$genre_id;
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
    public function getRelease_date()
    {
        return $this->release_date;
    }
    public function getLength()
    {
        return $this->length;
    }
    public function getGenre_id()
    {
        return $this->genre_id;
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
    public function setRelease_date($release_date)
    {
        $this->release_date = $release_date;
    }
    public function setLength($length)
    {
        $this->length = $length;
    }
    public function setGenre_id($genre_id)
    {
        $this->genre_id = $genre_id;
    }
}
