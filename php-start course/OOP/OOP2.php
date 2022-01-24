<?php
class Figure {
     const SIDES_COUNT  = 4;
    public $S;
    public $color;

    public function infoAbout()
    {
        echo "Это геометрическая фигура!";
    }
}


class Rectangle extends Figure {

    private $a;
    private $b;

 public function __construct($a,$b)
 {
     $this->a= $a;
     $this->b= $b;
     echo "Created object of class ". __CLASS__."<br>Method:".__METHOD__;
 }
    public function getArea()
    {
        $S = $this->a * $this->b;
        return $S;
    }
    final public function infoAbout(){
        echo "<br>Это класс Прямоугольник. У него ". self::SIDES_COUNT. " стороны.";
    }

}

class Triangle extends Figure
{
    const SIDES_COUNT = 3;
    private $a;
    private $b;
    private $c;

    public function __construct($a, $b, $c)
    {
        $this->a = $a;
        $this->b = $b;
        $this->c = $c;
        echo "Created object of class ". __CLASS__."<br>Method:".__METHOD__;
    }

    public function getArea()
    {
        $p = ($this->a+$this->b+$this->c)/2;
        //echo "<br>p=".$p;
        $S = sqrt($p*($p-$this->a) *($p- $this->b)*($p-$this->c));
        //echo "<br> S=".$S;
        return $S;

    }
    final public function infoAbout(){
        echo "<br>Это класс Треугольник. У него ". self::SIDES_COUNT. " стороны.";
    }
}
class Square extends Figure {

    private $a;
    public function __construct ($a)
    {
        $this->a =$a;
        echo "Created object of class ". __CLASS__."<br>Method:".__METHOD__;
    }
    public function getArea() {
       // $S = pow($this->a,2);
        $S = $this->a * $this->a;
        return $S;
    }
    final public function infoAbout(){
        echo "<br>Это класс Квадрат. У него ". self::SIDES_COUNT. " стороны.";
    }
}


$Rec1 = new Rectangle(12,15);
$Tr1 = new Triangle(3,4,5);
$Sq1 = new Square (10);


echo "<br><br> ". $Tr1->infoAbout();