<?php
require_once __DIR__.DIRECTORY_SEPARATOR.'Product.php';

class Journal extends Prod
{
    use pricable;

    private $release; // выпуск

    public function __construct($name, $weight, $price, $release)
    {
        parent::__construct($name, $weight);

        $this->price=$price;
        $this->release=$release;
        $this->discount=10;

        echo 'Создан Журнал '.$this->getName(). ' с ценой = '.$this->getPrice().' и доставкой = '.$this->getDelivery();

    }
}

$jr = new Journal("National Geographic", 1, 50,  "12345");

?>