<?php
require_once __DIR__ . '/Good.php';

class Book extends Good {
    public $author;

    public function __construct($name, $price, $author) {
        parent::__construct($name, $price);
        $this->author = $author;
    }

    public function getCategory() {
        return "Книги";
    }

    final public function calculateDiscount($percent) {
        return $this->price - 50; 
    }
    
    public function getAuthor() {
        return $this->author;
    }
}