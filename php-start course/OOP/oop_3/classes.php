<?php


class Books {

    public $title;
    public $author_name ;
    public $type;
    public $url;

  public function __construct($row) {
       // echo "<br> Class:". __CLASS__. "<br> Method". __METHOD__;

      $this->title = $row['title'];
      $this->author_name = $row['author_name'] ;
      $this->type = $row['type'];
      $this->url = $row['file_path'];

    }

    public function BookInfo() {

    include 'site.php';

    }
}


class pdf extends Books {

}


class doc extends Books {


}

class txt extends Books {

}

class bf2 extends Books {

}

