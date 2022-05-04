@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
                    <a class="btn btn-primary" href="{{ route('blog.posts.index') }}"><h1>Main</h1></a>
                </nav>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-2">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-hover">
                            <tbody>
                            @foreach($posts as $item)
                                @php /**@var \App\Models\Post $item */ @endphp
                            @csrf
                              <tr>
                                <tr>
                                    <h2> {{ $item->title }}</h2>
                                </tr>
                                <tr>
                                         {{$item->content_raw}}
                                    </a>
                                </tr>

                            <tr>
                                <br><br>
                                    <h5><i> Посмотреть <a href="{{route('blog.comments.show', $item->id)}}">комментарии</a></i></h5>
                            </tr>
                            @endforeach
                            <br><br>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
