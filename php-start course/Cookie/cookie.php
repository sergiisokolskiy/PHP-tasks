<?php
// TASK 1


echo "<br> <br> ";

echo "Задача 1:   Время жизни cookie <br>";
echo "Задача 2: Дата и время последнего посещения <br> ";
echo "Задача 3: Счетчик посещений";

echo "<br> <br> ";
echo "<pre>";

$count =0;
setcookie('name',Name);


if(isset($_COOKIE['date']))
    {

    $hi =  "С возвращением, дружище,". $_COOKIE['name'];
    $str ='<br> Последний визит:'. $_COOKIE["date"];
    $count = $_COOKIE['visit']+1;
    $visit = "<br> Количество визитов: $count";
    }
else
    {
      $str = "Вы здесь в первый раз!";
        $count = 1;
      $visit = "<br> Количество визитов: $count";
    }
/* Записываем в куки текущую дату. Во время следующего визита именно ее увидит
 * пользователь */
setcookie('date',date('d-M-Y H:i:s'));
setcookie('visit', $count);
print_r($_COOKIE);
?>

<html>
<head>
    <title> HW9</title>
</head>
<body>
<p align="center"><?php echo $hi,"<br>",$str,"<br> $visit";?></p>

</body>
</html>
