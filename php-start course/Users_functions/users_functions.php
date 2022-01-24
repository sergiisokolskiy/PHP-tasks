<?php

// TASK 1


echo "<br> <br> ";

echo "Задача 1: Информация о товарах в корзине ";

echo "<br> <br> ";



$products = array(
    array('name' => 'Телевизор', 'price' => '400', 'quantity' => 1),
    array('name' => 'Телефон', 'price' => '300', 'quantity' => 3),
    array('name' => 'Кроссовки', 'price' => '150', 'quantity' => 2),
    array('name' => 'Кроссовки2', 'price' => '199', 'quantity' => 1),
);

echo "<pre>";
$result = myfun1($products); 
print_r($result);
echo "/<pre>";


function myfun1($array)
{
	$sum = 0;
	$quant = 0;
	if (is_array($array))
	{
		foreach ($array as $value)
		{
			$totalQuant += $value['quantity'];
			$totalSum += $value['price'] * $value['quantity'];

		}
	} 
	else 
	{ 
		echo "Ne Massive"; 
	}
	return array('totalQuantity' => $totalQuant, 'totalSum' => $totalSum); 
}


// TASK 2


echo "<br> <br> ";

echo "Задача 2: Квадратное уравнение  ";

echo "<br> <br> ";




function equitions ($a, $b, $c)
{

echo $a."x^2 + ".$b." x + ".$c;



$D = pow($b, 2) - 4*$a*$c;

echo "<br>".$D;

echo "<br> <br>";

if ($D>0)
{
	$x1 = (-$b + sqrt($D))/(2*$a);
	//echo "<br> X1 = ".$x1;
	$x2 = (-$b - sqrt($D))/(2*$a);
	//echo "<br> X2 = ".$x2;
	return array('X1' => $x1, 'X2' => $x2 );

}
elseif ($D = 0) {
		$x1 = (-$b)/(2*$a);
	//echo "<br> X1 = X2 = ".$x1;
	return array('X1' => $x1, 'X2' => $x1 );	

	}

	else
	return array('Нет действительных корней');
	
}

$a = rand( -10, 10);

$b = rand( -10, 10);

$c = rand( -10, 10);

$y = equitions($a,$b,$c);
print_r ($y);




// TASK 3


echo "<br> <br> ";

echo "Задача 3:  Удаление отрицательных элементов из массива (вариант 1) ";

echo "<br> <br> ";


//Создание массива рандомных значений

for ($i=0; $i<=20; $i++)
{
//$digits = array();
$digits[] = rand(-100,100);
}
print_r($digits);


function deleteNegtives($arr)
{
	foreach ($arr as $key => $value) {
		if ($value < 0)
		{
			unset($arr[$key]);

		}

	}

return ($arr);
}

$digits = deleteNegtives($digits);
var_dump($digits);




// TASK 4


echo "<br> <br> ";

echo "Задача 4:  Удаление отрицательных элементов из массива (вариант 2) ";

echo "<br> <br> ";
//Решить задачу №3 используя передачу аргумента по ссылке.


//Создание массива рандомных значений

for ($i=0; $i<=10; $i++)
{
//$digits = array();
$digits1[] = rand(-100,100);
}
print_r($digits1);
echo "<br> <br> ";


function deleteNegtives2 (&$arr1)
{

	foreach ($arr1 as $key => $value) {
		if ($value < 0)
		{
			unset($arr1[$key]);

		}

	}

//return ($arr);
}

deleteNegtives2($digits1);
print_r ($digits1);

echo "<br> FINAL";

?>