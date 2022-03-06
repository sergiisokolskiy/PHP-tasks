<?php

//At this file, we check the submission of the form

// replace symbol 'space' on '_'
function replaceSymbols($subj)
{
    $specSymbols = ' ';
    return str_replace($specSymbols, "_", $subj);
}

// Function for transliteration from Cyrillic to Latin
function translitCyrToLatin($input)
{
    $ctl = array(
        "а"=>"a","б"=>"b","в"=>"v","г"=>"g","д"=>"d",
        "е"=>"e", "ё"=>"yo","ж"=>"j","з"=>"z","и"=>"i",
        "й"=>"i","к"=>"k","л"=>"l", "м"=>"m","н"=>"n",
        "о"=>"o","п"=>"p","р"=>"r","с"=>"s","т"=>"t",
        "у"=>"y","ф"=>"f","х"=>"h","ц"=>"c","ч"=>"ch",
        "ш"=>"sh","щ"=>"sh","ы"=>"i","э"=>"e","ю"=>"u",
        "я"=>"ya",
        "А"=>"A","Б"=>"B","В"=>"V","Г"=>"G","Д"=>"D",
        "Е"=>"E","Ё"=>"Yo","Ж"=>"J","З"=>"Z","И"=>"I",
        "Й"=>"I","К"=>"K","Л"=>"L","М"=>"M","Н"=>"N",
        "О"=>"O","П"=>"P","Р"=>"R","С"=>"S","Т"=>"T",
        "У"=>"Y","Ф"=>"F","Х"=>"H","Ц"=>"C","Ч"=>"Ch",
        "Ш"=>"Sh","Щ"=>"Sh","Ы"=>"I","Э"=>"E","Ю"=>"U",
        "Я"=>"Ya",
        "ь"=>"","Ь"=>"","ъ"=>"","Ъ"=>"",
        "ї"=>"j","і"=>"i","ґ"=>"g","є"=>"ye",
        "Ї"=>"J","І"=>"I","Ґ"=>"G","Є"=>"YE"
    );
    return strtr($input, $ctl);
}

//Function for checking the correctness of the e-mail address
function check_email($email)
{
    if (empty($email)) {
        $result ="Fill in an EMAIL";
        print_r($result);
        return $result;
    }
//Удалим ненужные символы (лишние пробелы, табуляции, переходы на новую строку)
    $email = trim($email);
//Из данных, вводимых пользователем, удалим обратную косую черту (\)
    $email = stripslashes($email);
//htmlspecialchars() преобразует специальные символы (в нашем случае угловые скобки < и >) в объекты HTML.
    $email = htmlspecialchars($email);

    if (!preg_match('|^[-0-9A-Za-z_\.]+@[-0-9A-Za-z^\.]+\.[a-z]{2,6}$|i', $email)) {
        $result = 'EMAIL is not correct';
        print_r($result);
        return $result;
    }

    return $email;
}

//Function for checking the correctness of the NAME
function check_name($name)
{
    if (empty($name)) {
        $result ="Fill in the NAME";
        print_r($result);
        return $result;
    }
    $name = trim($name);
    $name = stripslashes($name);
    $name = htmlspecialchars($name);
    $name = translitCyrToLatin($name);
    $name = replaceSymbols($name);

//Имя должно содержать только буквы и пробелы
    if (!preg_match('|^["A-Za-zА-Яа-яЁё_\.]|i', $name)) {
        $result = 'NAME is not correct';
        print_r($result);
        return $result;
    }
    return $name;
}

//Function for checking the correctness of the phone NUMBER
function check_number($number)
{
    if (empty($number)) {
        $result ="Fill in the Phone NUMBER";
        print_r($result);
        return $result;
    }

    $number = stripslashes($number);
    $number = htmlspecialchars($number);
    $number = trim($number);

    if (!preg_match('/^[\+]+(\d{10})/', $number)) {
        $result = 'NUMBER is not correct.<br>Number format: +XXXXXXXXXX';
        print_r($result);
        return $result;
    }
    return $number;
}

// если file была отправлен в форме
function check_file()
{
    if (isset($_FILES['file'])) {
    //если имя файла пустое
        if ($_FILES['file']['name'] == '') {
            $result ='File not selected!';
            print_r($result);
            return $result;
        } elseif ($_FILES['file']['size'] > 2097152) {  //если размер файла превышает 20 Мб
            $result ='File size more than 20 MB';
            print_r($result);
            return $result;
        } else {
            $_FILES['file']['name'] = stripslashes($_FILES['file']['name']);
            $_FILES['file']['name'] = htmlspecialchars($_FILES['file']['name']);
            $_FILES['file']['name']= trim($_FILES['file']['name']);
            $_FILES['file']['name'] = translitCyrToLatin($_FILES['file']['name']);
            $_FILES['file']['name'] = replaceSymbols($_FILES['file']['name']);

            $result ='File uploaded successfully <br>';
            print_r($result);
            return $result;
        }
    }
}
echo "<pre>";

$resultOfSubmission ="";

// Has the form been submitted?
if (isset($_POST['submit'])) {
// Checking that every field was filled in correctly
    $_POST['first_name'] = check_name($_POST['first_name']);
    $_POST['last_name'] = check_name($_POST['last_name']);
    $_POST['email'] = check_email($_POST['email']);
    $_POST['number'] = check_number($_POST['number']);
    $_POST['file'] = check_file();
} else {
    $resultOfSubmission="Form is empty";
}

foreach ($_POST as $key => $val) {
    if (preg_match("/not/", $val) or (preg_match("/Fill/", $val))) {
        $resultOfSubmission = "Form is not correct";
        break;
    } else {
        $resultOfSubmission = "<br> Form is correct <br>";
    }
}


//Check the type of file in form
if (preg_match('/\.docx/', $_FILES['file']['name'])) {
    $typeFile = mb_substr($_FILES['file']['name'], -5, 5);
} else {
    $typeFile = mb_substr($_FILES['file']['name'], -4, 4);// вывод символов в строке по индексу;
}

//print_r($_POST);

// Сложим имя_фамилию транслитом и добавим тип.
global $file_name;
$file_name = $_POST['first_name']."_".$_POST['last_name'].$typeFile;
echo "Название нового файла : $file_name <br>";

//В файле проекта создаем папку с название "...\Год\Месяц"
//Сначала заносим в переменную путь к директории с название "...\Год"
global $files_location;
$files_location = "D:/OpenServer/domains/localhost/project/files/".date('Y');
//Проверяем существует ли уже такая директория. Если нет, то создаем.
if (!is_dir($files_location)) {
    mkdir($files_location);
}
//Далее заносим в переменную путь к директории с название "...\Месяц"
$files_location = $files_location."/".date('M');
//Проверяем существует ли уже такая директория. Если нет, то создаем.
if (!is_dir($files_location)) {
    mkdir($files_location);
// копируем файл из временной директории в папку files в проекте
    copy($_FILES['file']['tmp_name'], "$files_location\\$file_name");
} else {
    copy($_FILES['file']['tmp_name'], "$files_location\\$file_name");
}
