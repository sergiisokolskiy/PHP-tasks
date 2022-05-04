<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', 'Blog\PostController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



// Админка Блога
$groupData = [
    'namespace' => 'Blog',
    'prefix' => 'blog',
];

// For POSTS
Route::group($groupData, function () {
    $methods = ['index','edit','update','create', 'store', 'show',];

    //BlogPost
    Route::resource('posts','PostController')
        //->except(['show']) //все методы, кромe show
        ->names('blog.posts');
});


// For COMMENTS
Route::group($groupData, function () {
    $methods = ['index', 'edit', 'update', 'create', 'store', 'show',];

    Route::resource('comments', 'CommentController')
          ->names('blog.comments');
});


