<?php
// TASK 2


echo "<br> <br> ";

echo "Задача 2:  Использование форм #2 ";

echo "<br> <br> ";
echo "<pre>";

if (isset($_POST['submit'])&& !empty($_POST['name'])) {
$name = $_POST['name'];

    if ($_POST['gender'] == "male")
        echo "Добро пожаловать, мистер $name ";

    else
        echo "Добро пожаловать, миссис $name";

}

?>


<html>
<head>
    <title> HW8 | TASK 3</title>
</head>
<body>
    <form action="hw8.2.php" method="post">
        <input type="text" name="name"> <br>

        <input type="radio" name="gender" value="male"> Мужчина <br>
        <input type="radio" name="gender" value="female"> Женщина <br>
        <input type="submit" name="submit"><br>


    </form>




</body>




</html>
