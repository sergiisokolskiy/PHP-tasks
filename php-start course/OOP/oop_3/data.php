<?php


// Все данные (книги) поместим в один массив array ($books)


require_once 'classes.php';


// Соединение с БД
$connection = mysqli_connect('localhost', 'root', '', 'books');
mysqli_set_charset($connection, 'utf8');
// Вывод ошибки (если произошла)
if(mysqli_connect_errno())
    echo "Failed to connect to MySQL". mysqli_connect_error();


//загрузка содержимого из Базы Данных
$books = array();
$query = " SELECT * FROM `book`; ";

$result = mysqli_query($connection, $query);

//В этом цикле будем проводить ОБРАБОТКУ ДАННЫХ

while ($row1 = mysqli_fetch_array($result)) {


    // КОНСТРУКТОР
    $books[] = new $row1['type'] ($row1);
}

