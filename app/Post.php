<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    public function comments()

    {

        return $this->hasmany(Comment::class);

    }

    public function user()

    {

        return $this->belongsTo(user::class);

    }

    public function addComment($body)

    {

        $this->comments()->create(compact('body'));

    }


    protected $fillable = ['title', 'body', 'user_id'];
}
