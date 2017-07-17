<?php
require_once 'Product.php';

class Clothes extends Prod
{
    use pricable;

    private $type; // вид одежды
    private $size; // размер одежды
    private $tpeople;  // целевая аудитория

    public function __construct($name, $weight, $price, $type, $size, $tPeople)
    {
        parent::__construct($name, $weight);

        $this->price=$price;
        $this->type=$type;
        $this->size=$size;
        $this->tpeople=$tPeople;
        $this->discount=10;

        echo 'Создана Одежда '.$this->getName(). ' с ценой = '.$this->getPrice().' и доставкой = '.$this->getDelivery();

    }
}

$clth = new Clothes("Плащ Calipso", 3, 1000, "Плащ", '44', "женщины");
?>