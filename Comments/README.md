## Описание проекта
Главная страница сайта ( <a href = "https://github.com/sergiisokolskiy/PHP-tasks/blob/main/Comments/Screenshots/1.JPG"> рис.1 </a>) отбражается на экране благодаря файлу <i> <a href = "https://github.com/sergiisokolskiy/PHP-tasks/blob/main/Comments/views/welcome.blade.php">"welcome.blade.php" </a> </i>. 

<br>
<p align="center"><a href="https://github.com/sergiisokolskiy/PHP-tasks/blob/main/Comments/Screenshots/1.JPG" target="_blank"><img src="https://github.com/sergiisokolskiy/PHP-tasks/blob/main/Comments/Screenshots/1.JPG" ></a></p>
<br>

Используя метод <i>"posts.index"</i> в контроллере <i> <a href = "https://github.com/sergiisokolskiy/PHP-tasks/blob/main/Comments/app/Http/Controllers/Blog/PostController.php"> PostController </a> </i> отображаются опубликованные рандомно-сгенерированные посты (выполняется файл фабрики <i> <a href = "https://github.com/sergiisokolskiy/PHP-tasks/blob/main/Comments/database/factories/BlogPostFactory.php"> BlogPostFactory.php </a> </i>). 

При выполнении файла миграции  <i> <a href = "https://github.com/sergiisokolskiy/PHP-tasks/blob/main/Comments/database/migrations/2022_04_10_134957_create_posts_table.php"> Create 2022_04_10_134957_create_posts_table.php </a> </i>) в Базу данных  записываются сгенерированные посты.   


По нажатию на <i> заголовок </i> поста выполняется метод <i>"posts.show"</i> в пост контроллере и выводится страница с выбранным постом по конкретному id (<a href = "https://github.com/sergiisokolskiy/PHP-tasks/blob/main/Comments/Screenshots/2.JPG"> рис.2 </a>). Для этого в папке "post" находится вьюха <i> <a href = "https://github.com/sergiisokolskiy/PHP-tasks/blob/main/Comments/views/blog/post/index.blade.php"> "index.blade.php" </a> </i>.

<br>
<p align="center"><a href="https://github.com/sergiisokolskiy/PHP-tasks/blob/main/Comments/Screenshots/2.JPG" target="_blank"><img src="https://github.com/sergiisokolskiy/PHP-tasks/blob/main/Comments/Screenshots/2.JPG" ></a></p>
<br>


Для навигации есть кнопка <i> "Main" </i>, которая позволяет вернуться на главную страницу.


При нажатии на слово <i> "комментарии" </i> выполняется метод "comments.show" в контроллере <i> <a href = "https://github.com/sergiisokolskiy/PHP-tasks/blob/main/Comments/app/Http/Controllers/Blog/CommentController.php"> "CommentController.php" </a> </i>, который позволяет вывести все комментарии к выбраному посту.
 




На <a href = "https://github.com/sergiisokolskiy/PHP-tasks/blob/main/Comments/Screenshots/3.JPG">рис.3 </a> используя вьюху <i> <a href = "https://github.com/sergiisokolskiy/PHP-tasks/blob/main/Comments/views/blog/comments/comments_block.blade.php"> "comments_block.blade.php" </a> </i>.  показано дерево комментариев, где цифрами пронумерованы "родительские" комментарии, а символами - "дочерние" (ответы на них), они немного сдвинуты вправо.

<br>
<p align="center"><a href="https://github.com/sergiisokolskiy/PHP-tasks/blob/main/Comments/Screenshots/3.JPG" target="_blank"><img src="https://github.com/sergiisokolskiy/PHP-tasks/blob/main/Comments/Screenshots/3.JPG" ></a></p>
<br>

Все комментарии можно <i>отредактировать </i> (метод "update" файла CommentController) , <i>удалить</i> (метод "destroy" файла CommentController) и <i>ответить</i>  (метод "create" файла CommentController), нажав на соответствующие надписи под ними.

Для создания нового комментария также используется метод "create" файла CommentController, необходимо нажать на кнопку <i>"Новый комментарий" </i> вверху страницы и перейдем во вкладку для создания и редактирования комментариев (<a href = "https://github.com/sergiisokolskiy/PHP-tasks/blob/main/Comments/Screenshots/4.JPG"> рис.4 </a>).

<br>
<p align="center"><a href="https://github.com/sergiisokolskiy/PHP-tasks/blob/main/Comments/Screenshots/4.JPG" target="_blank"><img src="https://github.com/sergiisokolskiy/PHP-tasks/blob/main/Comments/Screenshots/4.JPG" ></a></p>
<br>

Здесь в специальном поле <i>"Ваш комментарий"</i> пишется текст нового комментария или редактируется уже готовый (<a href = "https://github.com/sergiisokolskiy/PHP-tasks/blob/main/Comments/Screenshots/5.JPG"> рис.5 </a> ). Для отправки нажимаем на кнопку <i>"Сохранить"</i> и в контроллере CommentController запускается метод "store".

Текст комментария <i>("content_raw")</i>, его <i>"id"</i>, <i>"parent_id"</i> записываются в соответствующие ячейки в БД (<a href = "https://github.com/sergiisokolskiy/PHP-tasks/blob/main/Comments/Screenshots/6.JPG"> рис.6 </a>).

<br>
<p align="center"><a href="https://github.com/sergiisokolskiy/PHP-tasks/blob/main/Comments/Screenshots/6.JPG" target="_blank"><img src="https://github.com/sergiisokolskiy/PHP-tasks/blob/main/Comments/Screenshots/6.JPG" ></a></p>
<br>


Комментарии привязаны к определенному посту по индексу <i>"post_id"</i>, поэтому по разными постами будут отображаться соответствующие комментарии (<a href = "https://github.com/sergiisokolskiy/PHP-tasks/blob/main/Comments/Screenshots/7.JPG"> рис.7 </a>).

<br>
<p align="center"><a href="https://github.com/sergiisokolskiy/PHP-tasks/blob/main/Comments/Screenshots/7.JPG" target="_blank"><img src="https://github.com/sergiisokolskiy/PHP-tasks/blob/main/Comments/Screenshots/7.JPG" ></a></p>
<br>

