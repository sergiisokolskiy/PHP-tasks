<?php

$ans = $_POST['ans'];
session_start();

$_SESSION['ans1'] = $ans;

?>


<p> Вопрос 2</p>
<p> Кто победил в ЛЧ 2020? </p>

<form action="test3.php" method="post">
    <input type="radio" name="ans2" value="Real Madrid"> Real Madrid<br>
    <input type="radio" name="ans2" value="Chelsea"> Chelsea <br>
    <input type="radio" name="ans2" value="Bayern Munich"> Bayern Munich <br>
    <input type="submit" name="Далее">
</form>