<?php

// TASK 1

echo "TASK 1 -  Вхождение числа в диапазон ";


echo "<br> <br>"; 

define(MIN, 10);
define(MAX,50);


$x = rand( 1, 100);

echo $x, "<br>";

if (($x > MIN) and ($x<MAX))
	{ 
		echo "+";
}
elseif (($x == MIN) or ($x == MAX))
	{
		echo "+-";
	}
	else
	{

	echo "-";	
	}


// TASK 2

echo "<br> <br>";

echo "TASK 2 -  Квадратное уравнение ";


echo "<br> <br>";


$a = rand( -10, 10);

$b = rand( -10, 10);

$c = rand( -10, 10);

echo $a."x^2 + ".$b." x + ".$c;



$D = pow($b, 2) - 4*$a*$c;

echo "<br>".$D;

echo "<br> <br>";




if ($D>0)
{
	$x1 = (-$b + sqrt($D))/(2*$a);
	echo "<br> X1 = ".$x1;
	$x2 = (-$b - sqrt($D))/(2*$a);
	echo "<br> X2 = ".$x2;

}
elseif ($D = 0) {
		$x1 = (-$b)/(2*$a);
	echo "<br> X1 = X2 = ".$x1;
	

	}

	else
		echo "Нет действительных корней";



// TASK 3

echo "<br> <br>";

echo "TASK 3 -  Pавенство чисел ";


echo "<br> <br>";

echo $a." <= a <br>";
echo $b." <= b <br>";
echo $c." <= c <br>";


if (( $a<$b ) and ($b < $c) ) 
	{ 
		echo "Cреднее число: b = ". $b;
	}

 elseif  (($a>$b) and ($b < $c) )  

	{
		if ( $a<$c)
			{ echo "Cреднее число: a = ".$a;}
		else 
			{ echo "Cреднее число: c = ".$c;}

	}

 elseif  (($a>$b) and ($b > $c) )  

	{ echo "Cреднее число: b = ". $b;

	}
else {
	if (($a<$b) and ($b >$c))
		{ 
		if ( $a<$c)
			{ echo "Cреднее число: c = ".$c;}
		else 
			{ echo "Cреднее число: a = ".$a;}
 		}
	}

?>