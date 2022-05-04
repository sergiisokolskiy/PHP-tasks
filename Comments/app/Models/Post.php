<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Comment;

class Post extends Model
{
    use SoftDeletes;

    const UNKNOWN_USER = 1;

    protected $fillable = [
        'title',
        'slug',
       // 'category_id',
        //'excerpt',
        'content_raw',
        'is_published',
        'published_at',
         //'author_id',
    ];



    /**
     *Автор статьи
     *
     *@return  Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        //Статья принадлежит пользователю
        return $this->belongsTo(User::class);
    }

    //Статье принадлежат несколько комментариев
    public function comments()
    {
        return $this->hasMany(Comment::class );
    }

    public function getThreadedComments()
    {
        return $this->comments()->with('owner')->get()->threaded();
    }
}

