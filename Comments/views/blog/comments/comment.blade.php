@foreach ($value as $item)


                       <li id="li-comment-{{$item->id}}" class="comment">
                            <div id="comment-{{$item->id}}" class="comment-container">
                                <div class="comment-meta commentmetadata">
                                    <div class="intro">
                                        <div class="commentDate">
                                            {{ is_object($item->created_at) ? $item->created_at->format('d.m.Y в H:i') : ''}}
                                        </div>
                                    </div>
                                    <div class="comment-body">
                                        <p>ID: {{$item->id}}</p>
                                        <p>{{ $item->content_raw }}</p>
                                        <p> Parent_id:{{$item->parent_id}}</p>
                                    </div>

                                    {{-- Создание ответа на комментарий --}}
                                    <form method="GET" action="{{ route('blog.comments.create') }}">
                                        @csrf

                                        <input name="parent_id"
                                               type="hidden"
                                               value="{{ $item->id }}"
                                               class="form-control">
                                        <input name="post_id"
                                               type="hidden"
                                               value="{{ $post_id }}"
                                               class="form-control">

                                        <div class="row justify-content-center">
                                            <div class="col-md-12">
                                                <div class="card-body">
                                                    <button type="submit" class="btn btn-link">Ответить</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    {{-- Редактирование комментария --}}
                                    <div class="reply group">
                                        <a class="comment-reply-link" href="{{ route('blog.comments.edit', $item->id) }}"><i> Редактировать </i></a>
                                    </div>

                                    {{--  Удаление комментария --}}
                                    <form method="POST" action="{{route('blog.comments.destroy', $item->id) }}">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-link">Удалить</button>
                                    </form>


                                </div>
                            </div>

                         @if(isset($com[$item->id]))
                               <ul>
                                   @include('blog.comments.comment',['value' => $com[$item->id]])
                               </ul>
                           @endif
                        </li>


@endforeach
