<?php
// Соединение с БД
$connection = mysqli_connect('localhost', 'root', '', 'testsite');
mysqli_set_charset($connection, 'utf8');
// Вывод ошибки (если произошла)
if(mysqli_connect_errno())
    echo mysqli_connect_error();


$query = " SELECT * FROM `news` WHERE `status` = 1; ";

$result = mysqli_query($connection, $query);

//Подсчет количества строчек, над которыми произвели операцию3
$count = mysqli_num_rows($result);
//echo $count;


    while ($row1 = mysqli_fetch_array($result)) {
        echo "<br>";

       // print_r($row1['h1']);
        $h1 = $row1['h1'];
        $desc = $row1['short_content'];
        $id = $row1['id'];

       echo "<h1> $h1 </h1> <br>";
       echo "<p> $desc </p> <br>";
       echo '<a href="/news/view/'.$id.'"> Читать далее </a> <br>';

      /*  $news .= "<h1>".$row1['h1']. "</h1> <br>"
            ."<p>".$row1['short_content']."</p> <br>"
            . '<a href="/news/view/'.$row1['id'].'">Читать далее</a>';*/
    }
   // echo $news;

    ?>
