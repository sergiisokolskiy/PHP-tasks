<?php
// TASK 1


echo "<br> <br> ";

echo "Задача 1:  Использование форм #1 ";

echo "<br> <br> ";
echo "<pre>";

if(isset($_POST['submit'])) {
    print_r($_POST);

//Данные, отправленные формой приводятся к типу integer: используем функцию intval().
    $a = intval($_POST['a']);
    $b = intval($_POST['b']);
    $c = intval($_POST['c']);
    $d = intval($_POST['d']);
    $e = intval($_POST['e']);
    $f = intval($_POST['f']);
    $g = intval($_POST['g']);

    $arr = array($a, $b, $c, $d, $e, $f, $g);

    echo "<br>","Наибольшее значение = ";
    echo  max($arr);
    echo "<br>","Наименьшее значение = ";
    echo  min($arr);
    echo "<br>","Среднее арифметическое значение =  ";
    echo array_sum($arr)/count($arr);
}




echo "</pre>";
// Создать страницу с формой на 7 полей для текстового ввода (input, type text) и кнопкой отправки
//(input, type submit)
?>

<html>

<head>
    <title>Lesson 8 | Task 1</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

    <div>
        <form action="hw8.php" method="post">

            <input type="text" name="a"> <br>
            <input type="text" name="b"> <br>
            <input type="text" name="c"> <br>
            <input type="text" name="d"> <br>
            <input type="text" name="e"> <br>
            <input type="text" name="f"> <br>
            <input type="text" name="g"> <br>
            <input type="submit" name="submit"> <br>


        </form>

    </div>




</body>
</html>








