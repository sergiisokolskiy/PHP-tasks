<?php

//include_once "books.php";
?>


<p>
    <img src="icons/<?php echo $this->type;?>.png">
    <a href="<?php echo $this->url; ?>">
        <?php echo $this->author_name. ". ". $this->title; ?>
    </a>
</p>