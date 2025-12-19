<?php
require_once __DIR__ . '/Good.php';

class Torch extends Good {
    public $brand;

    public function __construct($name, $price, $brand) {
        parent::__construct($name, $price);
        $this->brand = $brand;
    }

    public function getCategory() {
        return "Электроника -> Фонари";
    }

    public function calculateDiscount($percent) {
        $discountValue = $this->price * ($percent / 100);
        return $this->price - $discountValue;
    }
}