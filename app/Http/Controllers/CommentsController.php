<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;
use Auth;

class CommentsController extends Controller
{
    public function store(Post $post)

    {

        Comment::create([

            'body' => request('body'),

            'user_id' => Auth::user()->id,

            'post_id' => $post->id

        ]);

        return back();

    }

}
