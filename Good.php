<?php
require_once __DIR__ . '/GoodInterface.php';
require_once __DIR__ . '/PrintTrait.php';


abstract class Good implements GoodInterface {
    use PrintTrait;

    public $name;
    public $price;
    public $currency;

    public function __construct($name, $price, $currency = 'RUB') {
        $this->name = $name;
        
        if ($price < 0) {
            $this->price = 0;
        } else {
            $this->price = $price;
        }

        $this->currency = $currency;
        
        $this->log("Создан новый товар: {$this->name}");
    }

    public function getName() {
        return $this->name;
    }

    public function getPrice() {
        return $this->price;
    }

    abstract public function getCategory();
    
    abstract public function calculateDiscount($percent);

    public function __toString() {
        return "Товар: {$this->name}, Цена: {$this->price} {$this->currency}";
    }

    public function __debugInfo() {
        return [
            'info' => 'Это объект товара',
            'name' => $this->name,
            'price_value' => $this->price
        ];
    }

    public function __clone() {
        $this->name = "Копия " . $this->name;
        $this->log("Объект был клонирован.");
    }

    public function __sleep() {
        return ['name', 'price'];
    }

    public function __wakeup() {
        $this->log("Объект восстановлен из строки.");
        $this->currency = 'USD';
    }
    public function __destruct() {
    }
}