<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Описание проекта
На главной странице сайта отображаются опубликованные рандомно-сгенерированные посты ( <a href = "https://github.com/sergiisokolskiy/PHP-tasks/blob/main/Comments/Screenshots/1.JPG"> рис.1 </a>).

<br>
<p align="center"><a href="https://github.com/sergiisokolskiy/PHP-tasks/blob/main/Comments/Screenshots/1.JPG" target="_blank"><img src="https://github.com/sergiisokolskiy/PHP-tasks/blob/main/Comments/Screenshots/1.JPG" ></a></p>
<br>

По нажатию на <i> заголовок </i>, выводится страница с выбранным постом (<a href = "https://github.com/sergiisokolskiy/PHP-tasks/blob/main/Comments/Screenshots/2.JPG">рис.2 </a>). 

<br>
<p align="center"><a href="https://github.com/sergiisokolskiy/PHP-tasks/blob/main/Comments/Screenshots/2.JPG" target="_blank"><img src="https://github.com/sergiisokolskiy/PHP-tasks/blob/main/Comments/Screenshots/2.JPG" ></a></p>
<br>

Чтобы посмотреть или написать комментарии к выбраному посту, нужно нажать на слово <i> "комментарии" </i>.
Для навигации есть кнопка <i> "Main" </i>, которая позволяет вернуться на главную страницу.


На <a href = "https://github.com/sergiisokolskiy/PHP-tasks/blob/main/Comments/Screenshots/3.JPG">рис.3 </a> изображенно дерево комментариев, где цифрами пронумерованы "родительские" комментарии, а символами - "дочерние" (ответы на них), они немного сдвинуты вправо.

<br>
![screenshot 3](https://github.com/sergiisokolskiy/PHP-tasks/blob/main/Comments/Screenshots/3.JPG)
<br>

Все комментарии можно <i>отредактировать </i>, <i>удалить</i> и <i>ответить</i>, нажав на соответствующие надписи под ними.

Чтобы создать новый комментарий, нужно нажать на кнопку <i>"Новый комментарий" </i> вверху страницы и перейдем во вкладку для создания и редактирования комментариев (<a href = "https://github.com/sergiisokolskiy/PHP-tasks/blob/main/Comments/Screenshots/4.JPG"> рис.4 </a>).

<br>
![screenshot 4](https://github.com/sergiisokolskiy/PHP-tasks/blob/main/Comments/Screenshots/4.JPG)
<br>

Здесь в специальном поле <i>"Ваш комментарий"</i> пишется текст нового комментария или редактируется уже готовый (<a href = "https://github.com/sergiisokolskiy/PHP-tasks/blob/main/Comments/Screenshots/5.JPG"> рис.5 </a> ). Для отправки нажимаем на кнопку <i>"Сохранить"</i>.

Текст комментария <i>("content_raw")</i>, его <i>"id"</i>, <i>"parent_id"</i> записываются в соответствующие ячейки в БД (<a href = "https://github.com/sergiisokolskiy/PHP-tasks/blob/main/Comments/Screenshots/6.JPG"> рис.6 </a>).

<br>
![screenshot 6](https://github.com/sergiisokolskiy/PHP-tasks/blob/main/Comments/Screenshots/6.JPG)
<br>


Комментарии привязаны к определенному посту по индексу <i>"post_id"</i>, поэтому по разными постами будут отображаться соответствующие комментарии (<a href = "https://github.com/sergiisokolskiy/PHP-tasks/blob/main/Comments/Screenshots/7.JPG"> рис.7 </a>).

<br>
![screenshot 7](https://github.com/sergiisokolskiy/PHP-tasks/blob/main/Comments/Screenshots/7.JPG)
<br>

