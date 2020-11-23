<?php

interface Book
{
    public function __construct(string $title, string $author, string $contents);
    public function getTitle(): string;
    public function getAuthor(): string;
    public function getContents(): string;
}


class Ebook implements Book
{
    public $title;
    public $author;
    public $contents;

    public function __construct(string $title, string $author, string $contents)
    {
        $this->title = $title;
        $this->author = $author;
        $this->contents = $contents;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getContents(): string
    {
        return $this->contents;
    }
}


class PrintBook implements Book
{
    public $eBook;

    public function __construct(string $title, string $author, string $contents)
    {
        $this->eBook = new Ebook($title, $author, $contents);
    }

    public function getAuthor(): string
    {
        return $this->eBook->getAuthor();
    }

    public function getTitle(): string
    {
        return $this->eBook->getTitle();
    }

    public function getContents(): string
    {
        return $this->eBook->getContents();
    }

    public function getText(): string
    {
        $contents = $this->eBook->getTitle() . " written by " . $this->eBook->getAuthor() ." " . $this->eBook->getContents();
        return $contents;
    }
}

$book = new PrintBook("Book Title ","book author ","With a content");

$returnValue = $book->getText();
echo $returnValue;