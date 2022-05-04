@php
    /** @var \App\Models\Comment $comment  */

@endphp
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                @if($comment ->is_published)
                    Опубликовано
                @else
                    Черновик
                @endif
            </div>
            <div class="card-body">
                <div class="card-title">         </div>
                <div class="card-subtitle mb-2 text-muted"> </div>
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#maindata" role="tab">Основные данные</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#adddata" role="tab"> Доп.данные </a>
                    </li>
                </ul>
                <br>
                <div class="tab-content">
                    <div class="tab-pane active" id="maindata" role="tabpanel">
                        <div class="form-group">
                                <label for="content_raw">Ваш комментарий:</label>
                                <textarea name="content_raw"
                                    id="content_raw"
                                    class="form-control"
                                    rows="5"> {{ old('content_raw',$comment ->content_raw) }}
                                </textarea>
                        </div>
                        {{--  id поста--}}

                        <div class="form-group">
                            <input name="post_id"
                                   type="hidden"
                                   value="{{ $comment->post_id}}"
                                   id="post_id"
                                   class="form-control">
                        </div>

                        <div class="form-group">
                            <input name="parent_id"
                                   type="hidden"
                                   value="{{ $comment->parent_id }}"
                                   id="parent_id"
                                   class="form-control">
                        </div>
                    </div>
                    <div class="tab-pane" id="adddata" role="tabpanel">

                        <div class="form-check">
                                <input name="is_published"
                                       type="hidden"
                                       value="0">

                                <input name="is_published"
                                       type="checkbox"
                                       class="form-check-input"
                                       value="1"

                                    @if($comment ->is_published)
                                       checked="checked"
                                    @endif
                                >
                                <label class="form-check-label" for="is_published"> Опубликовано </label>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

