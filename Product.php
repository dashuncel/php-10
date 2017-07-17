<?php
abstract class Prod
{
    private $name; // наименование
    private $unit; // единица измерения
    private $dimension; // габариты
    private $brand;  // брэнд
    private $weight; // вес

    public function __construct($name, $weight)
    {
        $this->name = $name;
        $this->weight = $weight;
    }

    // геттеры:
    public function getName()
    {
        return $this->name;
    }

    public function getUnit()
    {
        return $this->unit;
    }

    public function getDimension()
    {
        return $this->dimension;
    }

    public function getBrand()
    {
        return $this->brand;
    }

    public function getWeight()
    {
        return $this->weight;
    }

    // сеттеры:
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function setUnit($unit)
    {
        $this->unit = $unit;
        return $this;
    }

    public function setDimension($dimension)
    {
        $this->dimension = $dimension;
    }

    public function setBrand($brand)
    {
        $this->brand = $brand;
    }

    public function setWeight($weight)
    {
        $this->weight = $weight;
    }

}

trait pricable
{
    private $delivery; // стоимость доставки
    private $discount; // размер скидки
    private $price; // базовая цена

    public function setDelivery($delivery)
    {
        $this->delivery = $delivery;
        return $this;
    }

    public function setDiscount($discount)
    {
        $this->discount = $discount;
        return $this;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getDiscount()
    {
        return $this->discount;
    }

    public function getPrice()
    {
        $price = $this->price * $this->getDiscount() /  100;
        return $price;
    }

    public function getDelivery()
    {
        if ($this->getPrice() < $this->price) {
            $delivery = 300;
        }
        else
        {
            $delivery = 250;
        }
        return $delivery;
    }

}

