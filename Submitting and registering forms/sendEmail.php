<?php

require_once 'cheaking_form.php';


// Send the message to an EMAIL

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'D:\OpenServer\vendor\autoload.php'; //Ссылка , где находится файл

require_once 'D:\OpenServer\vendor\phpmailer\phpmailer\src\Exception.php';
require_once 'D:\OpenServer\vendor\phpmailer\phpmailer\src\PHPMailer.php';
require_once 'D:\OpenServer\vendor\phpmailer\phpmailer\src\SMTP.php';

$email = $_POST['email'];
$number = $_POST['number'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$position = $_POST['position'];
//$file_name = $_FILES['file']['name'];



$mail = new PHPMailer(true);
$mail->CharSet = 'UTF-8';

// Настройки SMTP
$mail->isSMTP(); // enable SMTP
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
//      $mail->SMTPDebug = 1; //debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Включение логов работы

$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false, //Проверка используемого SSL-сертификата
        'verify_peer_name' => false, //Проверка имени узла
        'allow_self_signed' => true //Разрешение на самоподписанные сертификаты
    )
);

// Отправка использует SMTP
$mail->Host = 'smtp.gmail.com';                    // Задается smtp от gmail

// Включается SMTP аутентификация
$mail->Username = 'sergiisokolskiy@gmail.com';        // Ящик почты из gmail ('YOUREMAIL@gmail.com')
$mail->Password = 'wjmmlcgebpcjtbck';                      // Пароль от почты gmail ('YOUREMAILPASSWORD')
$mail->Port = 465;                                    // Порт smtp for gmail

// От кого
$mail->setFrom($mail->Username, $_POST['first_name']);  //setFrom('YOUREMAIL@gmail.com', 'Mailer')

// Кому
$mail->addAddress('sokolskyi@ros.kpi.ua');  // адрес TO ADDRESS


// Тело письма
$mail->isHTML(true);                           // Отправить письмо в формате html (поддерживаются html теги)
$mail->Subject = 'Form`s information';   //Тема письма
$mail->Body = "ФИО: $first_name $last_name <br>Телефон:<a href='tel:$number'>$number</a> <br>
Email отправителя:<a href='mailto:$email'>$email</a> <br>Позиция: $position ";


// Отправка почты

if (preg_match("/not correct/", $resultOfSubmission)) {
    print_r("<br>");
    print_r("Correct the mistakes");
} else {
    $resultOfSubmission = "<br>Form is correct <br>";
    print_r($resultOfSubmission);

//Перед отправкой данные формы нужно сохранить в базе данных. Подключим соответствующий файл
    require_once('dataBase.php');

    if (!$mail->send()) {
               echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
               echo "Message has been sent";
    }
}
?>

<h2><a href="data_view.php"> Вывод данных в таблице </a></h2>
