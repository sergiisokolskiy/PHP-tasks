<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Collection\CommentCollection;

class Comment extends Model
{

        protected $fillable = [
        'author_name',
        'content_raw',
        'is_published',
        'post_id',
        'published_at',
            'parent_id',
        //'author_id',
    ];



    public function posts()
    {
        return $this->belongsTo(Post::class,'post_id');
    }

    public function newCollection(array $models = [])
    {
        return new CommentCollection($models);
    }
}
