<!DOCTYPE html>
<html lang="ru">
<head>
	
	<meta charset="utf-8">
    <link rel="stylesheet"  href="styles/site.css">
    <script src="scripts/jquery.js"></script>
    <script src="scripts/site.js"></script>
	<title> Онлайн магазин </title>
	

</head>

<body>
	<header>
		<div id="headerInside">
			<div id="logo"></div>
			<div id="companyName"> Brand </div>
			<div id="navWrap">
			<a href="/">
             Главная 
            </a>
			<a href="index.php?page=shop"> 
            Магазин 
            </a>

			</div>

		</div>
	</header>

    <div id="content">

	   <?php
        


        /*ИНДЕКСИРОВАННЫЙ массив*/ 
 /*      $product = [1, 'Iphone', 'Описание для телефона Iphone', '/images/goods/iphone.jpg', '2000 $']; /*объявление массива */
             
       
       /*ЧТобы добавить элемент в ИНДЕКСИРОВАННЫЙ массив нужно $имя_массива['Номер новой чейки'] = значение. Если будет  $имя_массива[], то значение занесется в ячейку со следующим номером после максимального(последнего известного)*/
       /*$product[]= 'Сегодня скидка 20%';
       $product[9] = 28;
       $product[] = 123; /* 123 будет в ячейке массива №10 !!! */

       
       /* АССОЦИАТИВНЫЙ массив */

/*         $product = [
        'id'=> 1, 
        'name' => 'Iphone',
        'desc' => 'Описание для телефона Iphone',
        'img' => '/images/goods/iphone.jpg',
        'price' => '2000 $'
        ] ; 
       


       echo $product['name'] . '<br>';
       echo $product['desc'] . '<br>';
*/
/*ЧТобы добавить элемент в АССОЦИАТИВНЫЙ массив нужно написать $имя_массива['Название новой чейки'] = значение*/
/*       $product['count'] = 162;
       var_dump($product);
*/


    $goods = [
        [

            'id' => 1,
            'name' => 'Iphone',
            'disc' => 'Описание для телефона Iphone',
            'img'=> '/images/goods/iphone.jpg',
            'price' => '2000 $'
        ],

        [
            'id' => 2,
            'name' => "HTC",
            'disc' => 'Описание для телефона HTC',
            'img'=> '/images/goods/htc.jpg',
            'price' => '1200 $'

        ],

        [
            'id' => 3,
            'name' => "Samsung",
            'disc' => 'Описание для телефона Samsung',
            'img'=> '/images/goods/samsung.jpg',
            'price' => '1500 $'

        ]

    ];

/*добавим новый товар*/
/*    $goods[] =
        [
            'id' => 4,
            'name' =>'Explay',
            'disc' => 'Описание для телефона Explay',
            'img'=> '/images/goods/explay.jpg',
            'price' => '800 $',
            'discount' => 20,
            'count' => 34


        ];
*/



/* Добавим новый элемент в существующий вложенный массив - $название_основного_массива[номер вложенного массива, в который будем добвлять данные] ['имя нового элемента'] = значение*/
    
 //   $goods[2]['discount']=20;

  
  $page=$_GET['page'];

    if (!isset($page)) {
        require ('templates/main.php');

    } elseif ($page =='shop') {
        require ('templates/shop.php');

    } elseif ($page=='product') {
        $id = $_GET['id'];
        $good=[];
        foreach ($goods as $product) {
            if ($product['id'] == $id) {

                $good = $product;
                break;
            }
        }
        require('templates/openedProduct.php');
    }
/*
    echo "<pre>"; // !!!! выводим массив в СТОЛБИК !!!
        var_dump($goods);
*/


    




        ?> 
    
	
</div>

<footer>
    <div id="footerInside">

        <div id="contacts">
            <div class="contactWrap">
                <img src="images/envelope.svg" class="contactIcon">
                info@brandshop.com
            </div>
            <div class="contactWrap">
                <img src="images/phone-call.svg" class="contactIcon">
                +38 (093) 555 00 00
            </div>
            <div class="contactWrap">
                <img src="images/placeholder.svg" class="contactIcon">
                Киев, пр-т. Шевченка, д. 10 офис 1
            </div>
        </div>

        <div id="footerNav">
            <a href="/">Главная</a>
            <a href="index.php?page=shop">Магазин</a>
        </div>

        <div id="social">
            <img class="socialItem" src="images/vk-social-logotype.svg">
            <img class="socialItem" src="images/google-plus-social-logotype.svg">
            <img class="socialItem" src="images/facebook-logo.svg">
        </div>

        <div id="copyrights">&copy; Brand</div>
    </div>
</footer>
	
</body>

</html>