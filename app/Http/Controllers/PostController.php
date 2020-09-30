<?php

namespace App\Http\Controllers;

use App\Post;

class PostController extends Controller
{
    //
    public function index()
    {
        return view('posts.index');
    }

    public function show(Post $post)
    {
        // $post = Post::where('slug', $slug)->firstOrfail();
        return view('posts.show', compact('post'));
    }
}
