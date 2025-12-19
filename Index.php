<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

echo "<h1>Демонстрация</h1>";

require_once __DIR__ . '/GoodInterface.php';
require_once __DIR__ . '/PrintTrait.php';

require_once __DIR__ . '/Good.php';

require_once __DIR__ . '/Book.php';
require_once __DIR__ . '/Torch.php';
require_once __DIR__ . '/Knife.php'; 

echo "<h3>1. Создание объектов</h3>";
$book = new Book("Мастер и Маргарита", 500, "М. Булгаков");
$torch = new Torch("Led Lenser", 3000, "LedLenser Germany");
$knife = new Knife("Охотничий нож", 4500, "Дамасская сталь");

echo "<hr>";

echo "<h3>2. Вывод информации</h3>";
echo $book . "<br>";
echo $torch . "<br>";
echo $knife . "<br>";

echo "<hr>";

echo "<h3>3. Абстрактные методы</h3>";
echo "<b>Категории:</b><br>";
echo $book->getName() . ": " . $book->getCategory() . "<br>";
echo $torch->getName() . ": " . $torch->getCategory() . "<br>";

echo "<br><b>Скидки:</b><br>";
echo "Фонарь (скидка 10%): " . $torch->calculateDiscount(10) . " RUB<br>";

echo "Книга (скидка фиксированная -50): " . $book->calculateDiscount(10) . " RUB<br>";

echo "<hr>";

echo "<h3>4. Клонирование</h3>";
$clonedTorch = clone $torch;
echo "Оригинал: " . $torch->getName() . "<br>";
echo "Клон: " . $clonedTorch->getName() . " (изменено внутри __clone)<br>";

echo "<hr>";

echo "<h3>5. Сериализация</h3>";
$serialized = serialize($knife);
echo "Строка после сериализаци: " . $serialized . "<br><br>";

$unserializedKnife = unserialize($serialized);
echo "Восстановленный нож: " . $unserializedKnife . "<br>";
echo "Восстановленная валюта: " . $unserializedKnife->currency . "<br>";

echo "<hr>";

echo "<h3>6. Debug Info</h3>";
echo "<pre>";
var_dump($book);
echo "</pre>";

echo "<hr>";

echo "<h3>7. Анонимный класс</h3>";
$checker = new class {
    public function checkPrice($good) {
        if ($good->getPrice() > 1000) {
            echo "Анонимный класс: дорогой товар (" . $good->getName() . ")<br>";
        } else {
            echo "Анонимный класс: бюджетный товар (" . $good->getName() . ")<br>";
        }
    }
};

$checker->checkPrice($book);
$checker->checkPrice($torch);