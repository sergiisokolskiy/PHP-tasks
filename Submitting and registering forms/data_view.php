<?php

// Соединение с БД
try {
    $dbh = new PDO('mysql:dbname=form_data;host=localhost', 'root', '');
} catch (PDOException $e) {
        die($e->getMessage());
}

/*Заведем массив $sort_list с ключами и вариантами сортировки, чтобы упростить вывод ссылок заведем
функцию sort_link_th(), которая будет их формировать исходя из значения переменной $_GET['sort']. */

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


//вывод всех элементов таблицы с возможностью сортировки
$sth = $dbh->prepare("SELECT * FROM `user` ORDER BY {$sort_sql} LIMIT 0, 20");
$sth->execute();
$list = $sth->fetchAll(PDO::FETCH_ASSOC);

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
            <td> <a href="<?php echo $row['file']; ?>"> <?php echo "File: ".$row['first_name']."_".$row['last_name']
                 ?></a></td>
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