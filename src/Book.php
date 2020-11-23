<?php
namespace ChapterOne;

class Book{

    private $author;
    private $releaseDate;
    public function __construct(Int $date){
        $this->releaseDate = $date;
        echo "Hello world";
    }

    public function setAuthor(String $author):bool{
        $this->author = $author;
        return true;
    }

    public function getAuthor():string{
        return $this->author;
    }

    public function getDate():int{
        return $this->releaseDate;
    }

}