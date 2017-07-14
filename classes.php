<?php
//------------ИНТЕРФЕЙСЫ------------------------
interface move
{
    public function move($x, $y, $z, $time, $speed); // четырехмерная координата начала движения объекта
    public function stop($x, $y, $z, $time); // остановка объекта в точке пространства и времени
}

interface nameble
{
    public function getName();
    public function setName($name);
}

interface typeble
{
    public function getType();
    public function setType($type);
}

//-------------АБСТРАКТНЫЕ КЛАССЫ---------------------
abstract class SuperClass implements nameble, typeble
{
    private $name; // наименование
    private $type; // типизация

    function __construct ($name, $type)
    {
        $this->name = $name;
        $this->type = $type;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
}

// класс товар
abstract class Tovar extends SuperClass
{
    private $price;       // цена
    private $unit;        // единица измерения
    private $dimensions;  // габариты
    private $color;       //цвет
    private $brand;       // бренд

    public function __construct($name, $type, $price, $unit, $brand)
    {
        parent::__construct($name, $type);
        $this->price = $price;
        $this->unit= $unit;
        $this->brand= $brand;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getUnit()
    {
        return $this->unit;
    }

    public function setUnit($unit)
    {
        $this->unit = $unit;
    }

    public function getDimensions()
    {
        return $this->dimensions;
    }

    public function setDimensions($dimensions)
    {
        $this->dimensions = $dimensions;
    }

    public function getColor()
    {
        return $this->color;
    }

    public function setColor($color)
    {
        $this->color = $color;
    }

    public function putToBasket()
{
    echo "Товар $this->name положили в корзину!";
}

    public function delFromBasket()
    {
        echo "Товар $this->name удалили из корзины!";
    }

    public function putToStock()
    {
        echo "Товар $this->name поступил на склад!";
    }

    public function moveFromStock()
    {
        echo "Товар $this->name отгрузили со склада!";
    }
}

// абстрактный класс "устройство" (для телевизора и для автомобиля)
abstract class Device extends Tovar
{
    private $model; // модель

    public function __construct($name, $type, $price, $unit, $brand, $model)
    {
        parent::__construct($name, $type, $price, $unit, $brand);
        $this->model= $model;
    }

    public function getModel()
    {
        return $this->model;
    }

    public function setModel($model)
    {
        $this->model = $model;
    }
}

// класс TV
class Tv extends  Device
{
    private $brightness;      // яркость
    private $resolution;      // разрешение экрана
    private $diagonal;

    public function __construct($name, $type, $price, $unit, $brand, $model)
    {
        parent::__construct($name, $type, $price, $unit, $brand, $model);
        echo "Создан телевизор ".$this->getName().' '.$this->getModel();
    }

    public function getBrightness()
    {
        return $this->brightness;
    }

    public function setBrightness($brightness)
    {
        $this->brightness = $brightness;
        return $this;
    }

    public function getResolution()
    {
        return $this->resolution;
    }

    public function setResolution($resolution)
    {
        $this->resolution = $resolution;
        return $this;
    }

    public function getDiagonal()
    {
        return $this->diagonal;
    }

    public function setDiagonal($diagonal)
    {
        $this->diagonal = $diagonal;
        return $this;
    }

    public function switchChanel($chanel)
    {
        echo $this->getName()." переключил канал на $chanel";
    }

    public function turnOn() {
        echo 'Телевизор '.$this->getName().' '.$this->getModel().' включен<br/>';
    }

    public function turnOff() {
        echo 'Телевизор  '.$this->getName().$this->getModel().' выключен<br/>';
    }

    public function upgradePo() {
        echo 'Обновление програмного обеспечения на телевизоре '.$this->getModel().$this->getModel().'<br/> ';
    }
}

// класс авто
class Auto extends Device implements move
{
    private $consumption; // расход топлива
    private $body;        // кузов
    private $power;       // мощность

    public function __construct($name, $type, $price, $unit, $brand, $model, $body)
    {
        parent::__construct($name, $type, $price, $unit, $brand, $model);
        $this->body = $body;
        echo 'Создан автомобиль '.$this->getName().' '.$this->getModel().'<br/>';
    }

    public function turnTo($side) {
        echo 'Автомобиль '.$this->getName()." повернул $side<br/>";
    }

    public function stop($x, $y, $z, $time)
    {
        echo 'Автомобиль '.$this->getName()." остановился в точке ($x $y $z) в $time<br/>";
    }

    public function move($x, $y, $z, $time, $speed)
    {
        echo 'Автомобиль '.$this->getName()." поехал из точки ($x $y $z) в $time<br/>";
    }
}

// класс ручка
class Pen extends Tovar implements move
{
    private $color; // цвет стержня

    public function __construct($name, $type, $price, $unit, $brand, $color)
    {
        parent::__construct($name, $type, $price, $unit, $brand);
        $this->color= $color;
        echo 'Создана ручка, цвет '.$this->getColor().'<br/>';
    }

    public function stop($x, $y, $z, $time)
    {
// переопределение функции интерфейса
    }

    public function move($x, $y, $z, $time, $speed)
    {
// переопределение функции интерфейса
    }

    public function printStr($str) {
        echo "Ручка пишет строку $str<br/>";
    }

    public function setColor($color) { // замена стержня
        $this->color = $color;
        echo "Ручка теперь пишет $color цветом<br/>";
        return $this;
    }

    public function getColor() {
        return $this->color;
    }
}

// класс утка
class Duck extends SuperClass implements move
{
    private $sound;  // произносимый звук
    private $poroda; // вид
    private $area;   // территория обитания

    public function __construct($name, $type, $poroda)
    {
        parent::__construct($name, $type);
        $this->poroda = $poroda;
        echo 'Родилась утка '.$this->getName().' породы '.$this->getPoroda();
    }

    public function getSound()
    {
        return $this->sound;
    }

    public function setSound($sound)
    {
        $this->sound = $sound;
    }

    public function getPoroda()
    {
        return $this->poroda;
    }

    public function setPoroda($poroda)
    {
        $this->poroda = $poroda;
    }

    public function getArea()
    {
        return $this->area;
    }

    public function setArea($area)
    {
        $this->area = $area;
    }

    public function move($x, $y, $z, $time, $speed)
    {
        echo "Объект стартовал в точке ($x, $y, $z) в $time со скоростью движения $speed";
    }

    public function stop($x, $y, $z, $time)
    {
        echo "Объект $this->getName() остановился в точке ($x, $y, $z) в $time";
    }

    public function fly() {
        echo "Утка $this->getName() полетела";
    }

    public function eat($eda) {
        switch ($eda) {
            case 'meat':
                echo "Так не пойдет, вы отравите нашу утку! <br/>";
                break;
            case 'fish':
                echo "О, это любимая еда утки! <br/>";
                break;
            default:
                echo "Спасибо, вкусно! <br/>";
                break;
        }
    }
}


//машины
$lexus=new Auto('моя машина', 'легковая',1000, 'шт', 'Lexus', 'GS', 'black');
$audi=new Auto('моя машина', 'легковая', 2000, 'шт', 'Audi', 'Q7', 'red');
echo '<hr>';

$red=new Pen('Красная ручка', 'Канцелярия', 100, 'шт', 'Contle', 'красный');
echo '<hr>';

$duck=new Duck('cелезень', 'Утка', 'Краснодарский селезень');
echo '<hr>';

?>