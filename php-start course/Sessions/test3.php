<?php

$ans2 = $_POST['ans2'];
session_start();

$_SESSION['ans2'] = $ans2;


?>


<p> Вопрос 3</p>
<p> Кто победил в ЛЧ 2018? </p>

<form action="result.php" method="post">
    <input type="radio" name="ans3" value="Real Madrid"> Real Madrid<br>
    <input type="radio" name="ans3" value="Chelsea"> Chelsea <br>
    <input type="radio" name="ans3" value="Bayern Munich"> Bayern Munich <br>
    <input type="submit" name="Далее">
</form>