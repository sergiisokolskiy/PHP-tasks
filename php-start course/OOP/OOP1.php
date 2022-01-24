<?php

class Car {

    const PEDALI = 2;
    const SEATS = 5;
    const MONTH =12 ;


    public $doors =4;
    public $color;
    public $price;
    public $name;

    public function __construct($color,$name,$price, $fuel)
    {
        $this->name = $name;
        $this->color = $color;
        $this->price = $price;
        $this->fuel = $fuel;
        echo "Created object of class ". __CLASS__."<br>Method:".__METHOD__;
    }

    public function fuelConsumption($distance) {
        $fuelConsumption = $this->fuel / 100 * $distance;
        echo $fuelConsumption;

    }
    static function getMaxConstant() {
       echo "<br> MAX value:". max(self::PEDALI, self::SEATS, self::MONTH);
    }
}

$car1 = new Car('White','BMW',12000, 11);

$car1->name = 'Audi';
$car1->color = 'White';
$car1->price = 20000;


$car2 = new Car('White','',15000,15);
$car2->name = 'BMW';
$car1->color = 'Red';
$car1->price = 30000;


$car3 = new Car('Yellow',"Lada",5000,8);



$car4 = new Car("Green","Porshe",500000, 12);


echo "<pre>";
print_r($car1);
print_r($car2);
print_r($car3);
print_r($car4);

$car1->fuelConsumption(200);
$car4->fuelConsumption(500);

echo "<br>". Car::MONTH."<br>". Car::SEATS."<br>". Car::PEDALI;

Car::getMaxConstant();