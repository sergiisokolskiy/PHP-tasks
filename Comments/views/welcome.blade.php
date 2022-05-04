<!doctype html>
@extends('layouts.app')
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Styles -->
    <style>
        * {
            margin: 0;
            padding: 0;
        }
        h1, h2, h3, h4, li, article {
            margin: 10px 0;
        }
        html, body {
            font-size: 16px;
            margin: 0;
            font-family: sans-serif;
        }
        .container {
            max-width: 1000px;
            margin: auto;
            display: flex;
            align-items: flex-start;
        }
        .container > aside {
            margin-right: 50px;
            background-color: #f4f4f4;
            padding: 30px 10px;
            border-top: none;
            min-width: 200px;
            text-align: center;
        }
        .container > aside > ul {
            list-style-type: none;
        }
        .container > aside > ul >li > a {
            color: darkorange;
        }
        article:not(:last-child) {
            padding-bottom: 10px;
            border-bottom: 2px dotted orange;
        }
    </style>
</head>
<body>

<div class="container">
    <aside>
        <h3>Архив</h3>
        <ul>
            <li><a href="#">Январь</a></li>
            <li><a href="#">Февраль</a></li>
            <li><a href="#">Март</a></li>
        </ul>
    </aside>

    <posts>
        @forelse ($posts as $item)
            <article>

                <a href="{{ route('blog.posts.show', $item->id)  }}">
                    <h1>{{$item->title}}</h1>
                </a>

                <p>{{$item->content_raw}}</p>
                <i>Дата создания: {{$item->created_at}}</i>

            </article>
        @empty
            <p>Здесь пока ничего нет.</p>
        @endforelse
            @csrf
    </posts>
</div>
</body>
</html>

