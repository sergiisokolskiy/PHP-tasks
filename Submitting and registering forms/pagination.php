<?php
// Соединение с БД
$db = mysqli_connect('localhost', 'root', '', 'form_data');
mysqli_set_charset($db, 'utf8');
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());// Вывод ошибки (если произошла)
}


/* Все варианты сортировки */
$sort_list = array(
    'id_asc'   => '`id`',
    'id_desc'  => '`id` DESC',
    'first_name_asc'  => '`first_name`',
    'first_name_desc'  => '`first_name` DESC',
    'last_name_asc'  => '`last_name`',
    'last_name_desc' => '`last_name` DESC',
    'email_asc'   => '`email`',
    'email_desc'  => '`email` DESC',
    'number_asc'   => '`number`',
    'number_desc'  => '`number` DESC',
    'position_asc'   => '`position`',
    'position_desc'  => '`position` DESC',
    'file_asc'   => '`file`',
    'file_desc'  => '`file` DESC',
    'date_asc'   => '`date`',
    'date_desc'  => '`date` DESC',
);

/* Проверка GET-переменной */
$sort = @$_GET['sort'];
if (array_key_exists($sort, $sort_list)) {
    $sort_sql = $sort_list[$sort];
} else {
    $sort_sql = reset($sort_list);
}

// Поверка, есть ли GET запрос
if (isset($_GET['pageno'])) {
    // Если да то переменной $pageno присваиваем его
    $pageno = $_GET['pageno'];
} else { // Иначе
    // Присваиваем $pageno один
    $pageno = 1;
}

// Назначаем количество данных на одной странице
$size_page = 7;
// Вычисляем с какого объекта начать выводить
$offset = ($pageno-1) * $size_page;

// SQL запрос для получения количества элементов
$count_sql = "SELECT COUNT(*) FROM `user`";
// Отправляем запрос для получения количества элементов
$result = mysqli_query($db, $count_sql);
// Получаем результат
$total_rows = mysqli_fetch_array($result)[0];
// Вычисляем количество страниц
$total_pages = ceil($total_rows / $size_page);

//вывод всех элементов таблицы с возможностью сортировки
$query = "SELECT * FROM `user` ORDER BY {$sort_sql} LIMIT $offset, $size_page";
$result = mysqli_query($db, $query);
//$list = mysqli_fetch_assoc(mysqli_result $sth);
$list = $result->fetch_all(MYSQLI_ASSOC);
// mysqli_result::fetch_all - выбирает все строки из результирующего набора и помещает их в ассоциативный массив


/* Функция вывода ссылок */
function sort_link_th($title, $a, $b) {
    $sort = @$_GET['sort'];

    if ($sort == $a) {
        return '<a class="active" href="?sort=' . $b . '">' . $title . ' <i>▲</i></a>';
    } elseif ($sort == $b) {
        return '<a class="active" href="?sort=' . $a . '">' . $title . ' <i>▼</i></a>';
    } else {
        return '<a href="?sort=' . $a . '">' . $title . '</a>';
    }
}


// Закрываем соединение с БД
mysqli_close($db);

?>



<table>
    <thead>
    <tr>
        <th><?php echo sort_link_th('№', 'id_asc', 'id_desc'); ?></th>
        <th><?php echo sort_link_th('Имя', 'first_name_asc', 'first_name_desc'); ?></th>
        <th><?php echo sort_link_th('Фамилия', 'last_name_asc', 'last_name_desc'); ?></th>
        <th><?php echo sort_link_th('Email', 'email_asc', 'email_desc'); ?></th>
        <th><?php echo sort_link_th('Номер телефона', 'number_asc', 'number_desc'); ?></th>
        <th><?php echo sort_link_th('Профессия', 'position_asc', 'position_desc'); ?></th>
        <th><?php echo sort_link_th('Дата регистрации', 'date_asc', 'date_desc'); ?></th>
        <th><?php echo sort_link_th('Файл', 'file_asc', 'file_desc'); ?></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($list as $row): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['first_name']; ?></td>
            <td><?php echo $row['last_name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['number']; ?></td>
            <td><?php echo $row['position']; ?> </td>
            <td><?php echo $row['date']; ?></td>
            <td> <a href="<?php echo $row['file']; ?>"><?php echo "File:".$row['first_name']."_".$row['last_name'] ?></a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<style type="text/css">
    table {
        table-layout: fixed;
        padding: 0;
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        margin: 0 0 20px 0;
    }

    table th {
        vertical-align: middle;
        color: #777777;
        font-size: 10px;
        text-transform: uppercase;
        padding: 10px 5px;
        background: #dedede;
        text-align: center;
        border: 1px solid #c1c1c1;
    }

    table td {
        padding: 8px 5px;
        font-size: 12px;
        color: #000;
        border: 1px solid #e9e9e9;
        text-align: center;
        line-height: 16px;
        vertical-align: middle;
        font-size: 12px;
    }
    table tbody tr:nth-child(odd) td {
        background: #f4f4f4;
    }

</style>

<ul class="pagination">
    <li><a href="?pageno=1">First</a></li>
    <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
        <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
    </li>
    <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
        <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
    </li>
    <li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
</ul>
