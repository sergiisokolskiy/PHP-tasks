<?php
require_once 'cheaking_form.php';

// Соединение с БД
$connection = mysqli_connect('localhost', 'root', '', 'form_data');
mysqli_set_charset($connection, 'utf8');
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());// Вывод ошибки (если произошла)
}

echo "<br>Connected successfully<br>";


//Создаем ссылку на файл для БД
$year=date('Y');
$month = date('M');
$url_to_files = "http://localhost/project/files/$year/$month/$file_name";


//загрузка содержимого в Базу Данных
//Выражение INSERT INTO используется для добавления новых записей в таблицу базы данных
$sql = "INSERT INTO user (first_name,last_name,email,number, position,file)
VALUES ('$first_name','$last_name','$email', '$number', '$position','$url_to_files')";


//Добавяем новые данные в таблицу
if (mysqli_query($connection, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($connection);
}


//Для списка записей в базе сделаем просмотр в виде хтмл страницы с оформлением в виде таблицы.



mysqli_close($connection);
