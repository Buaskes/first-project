<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class PostsController extends Controller
{

    public function __contruct()

    {

        $this->middleware('auth')->except(['index', 'show']);

    }



    public function index()

    {

        $posts = Post::latest()->get();

        $archives = Post::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')

            ->groupBy('year', 'month')
            ->orderbyRaw('min(created_at)')
            ->get()
            ->toArray();
 
        return $archives;

        return view('posts.index', compact('post', 'archives'));

    }

    public function create()

    {
        
        return view('posts.create');

    }

    public function store()

    {

        $this->validate(request(), [

            'title' => 'required',

            'body' => 'required'

        ]);
        
        Post::create([

            'title' => request('title'),
            'body'  => request('body'),
            'user_id' => auth()->id()

        ]);
     
        return redirect('/');

    }

}
