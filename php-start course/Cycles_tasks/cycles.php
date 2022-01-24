<?php

// TASK 1

echo "TASK 1 -   Сумма чисел ";


echo "<br> <br>"; 

for ($i=0; $i<=25; $i++)
	{
		$a = $a + $i;
	}

echo $a;


$b = 0;
$j = 0;

while ($j<=25)
 {
 	$b = $b+$j;
 	$j++;

}

echo '<br>', $b ;


// TASK 2

echo "<br> <br>";

echo "TASK 2 -   Квадраты чисел ";


echo "<br> <br>";

//echo "<h1>Программа находит числа, квадраты которых не больше ".n. "</h1>";
$n = 10;

for ($i=0; $i<=$n; $i++)
{

	echo pow($i, 2), "<br>";
}







// TASK 3

echo "<br> <br>";

echo "TASK 3 -  Меню на сайте ";

// Цель задачи - сформировать html-код списка для отображению меню на сайте. 

echo "<br> <br>";

$i = 10;

do {

$button []  = "Кнопка $i";
 $i--;

} while ($i != 0);


echo "<pre> <br>";

print_r ($button);

echo "<br> <br>";

natsort($button); // сортировка массива 
print_r ($button);

echo "<br> <br>";


echo "</pre>";


echo " <ul>.";

 
//for ($i = 1; $i <11; $i++)
foreach ($button as $elem => $value)
{

	echo '<li> <a href="#">'. $value. "</a></li>";
}

echo " </ul>.";




?>