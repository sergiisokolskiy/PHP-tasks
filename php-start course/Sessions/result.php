<?php

echo "<pre>";
$a = 0;
$result = array("Chelsea","Bayern Munich","Real Madrid");


session_start();

$_SESSION['ans3']=$_POST['ans3'];

if ($_SESSION['ans1'] == $result[0])
        $a ++ ;
if ($_SESSION['ans2'] == $result[1])
        $a ++ ;
if ($_SESSION['ans3'] == $result[2])
        $a ++ ;

// Мы уже получили нужную информацию из сессии. Очищаем ее от результатов
session_destroy();
?>

<p align="center"> Твой результат <?php echo $a ?> из 3 </p>
