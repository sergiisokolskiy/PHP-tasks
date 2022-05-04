<!doctype html>


@extends('layouts.app')

<html lang="{{ app()->getLocale() }}">

<head>


    <!-- Styles -->
    <style>
        article:not(:last-child) {
            padding-bottom: 10px;
            border-bottom: 2px dotted orange;
        }

    </style>
</head>
<body>

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
                    <a class="btn btn-primary" href="{{ route('blog.posts.index') }}"><h2>Главная</h2></a>
                </nav>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="maindata" role="tabpanel">
                            <form method="GET" action="{{ route('blog.comments.create') }}">

                                {{--  <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
                                      <a class="btn btn-primary" href="{{ route('blog.comments.create'), $post_id }}"><h2>Новый комментарий</h2></a>
                                  </nav> --}}
                                @csrf

                                <input name="post_id"
                                       type="hidden"
                                       value="{{ $post_id }}"
                                       class="form-control">
                                <input name="parent_id"
                                       type="hidden"
                                       value="{{ $parent_id = NULL }}"
                                       class="form-control">
                                <div class="row justify-content-center">
                                    <div class="col-md-12">
                                        <div class="card-body">
                                            <button type="submit" class="btn btn-primary">Новый комментарий</button>
                                        </div>
                                    </div>
                                </div>
                            </form>



    @php /** @var  \App\Models\Comment $comment */  @endphp

    <posts>
    <div id="comments">
        <ol class="commentlist group">

               @forelse($com as $val)
                      @include('blog.comments.comment', ['value' => $val])
                @break

            @empty
                <p>Здесь пока ничего нет.</p>
            @endforelse

            @csrf
        </ol>
    </div>
    </posts>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
</body>
</html>
