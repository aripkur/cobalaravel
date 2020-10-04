<?php

namespace App\Http\Controllers;

use App\Category;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
        $posts = $category->posts()->latest()->paginate(6);
        return view('posts.index', ['posts' => $posts, 'category' => $category]);
    }
}
