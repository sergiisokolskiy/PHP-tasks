@extends('layouts.app')

@section('content')


    @php /** @var  \App\Models\Comment $comment */  @endphp


    <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
                        <a class="btn btn-primary" href="{{ route('blog.posts.index') }}"><h2>Главная</h2></a>
                    </nav>
                </div>
            </div>

        @include('blog.post.includes.result_messages')
        @if($comment->exists)
            <form method="POST" action="{{ route('blog.comments.update', $comment ->id) }}">
                @method('PATCH')
        @else
            <form method="POST" action="{{ route('blog.comments.store')}}">
        @endif

            @csrf

            <div class="row justify-content-center">
                <div class="col-md-12">
                   @include('blog.post.includes.post_edit_main_col')
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary">Сохранить</button>
                    </div>
               {{--      @include('blog.post.includes.post_edit_add_col') --}}
                </div>
            </div>
            </form>
    </div>
@endsection

