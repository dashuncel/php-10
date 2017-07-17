<?php
require_once 'Product.php';

class Toy extends Prod
{
    use pricable;

    private $type; // вид игрушки
    private $sex; // пол ребенка

    public function __construct($name, $weight, $price, $type, $sex)
    {
        parent::__construct($name, $weight);

        $this->price=$price;
        $this->type=$type;
        $this->sex=$sex;
        $this->discount=15;

        echo 'Создана Игрушка '.$this->getName(). ' с ценой = '.$this->getPrice().' и доставкой = '.$this->getDelivery();
    }

    public function getPrice()
    {
        if ($this->getWeight() > 10 ) {
            return $this->price * $this->getDiscount() /  100;
        }
        else {
            return $this->price;
        }
    }
}

$toy= new Toy("замок Анакондрай", 9, 123, "Lego", "boys");

?>