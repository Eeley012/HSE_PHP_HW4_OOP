<?php
require_once __DIR__ . '/Good.php';

class Knife extends Good {
    public $steel;

    public function __construct($name, $price, $steel) {
        parent::__construct($name, $price);
        $this->steel = $steel;
    }

    public function getCategory() {
        return "Бытовые товары -> Нож";
    }

    final public function calculateDiscount($percent) {
        return $this->price - 50; 
    }
    
    public function getSteelSort() {
        return $this->steel;
    }
}