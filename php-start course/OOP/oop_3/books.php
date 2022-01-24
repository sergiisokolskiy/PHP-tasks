<?php


include_once 'data.php';


foreach ($books as $book) {
    echo "<pre>";
    print_r ($book->BookInfo());
    echo "</pre>";
}


?>



