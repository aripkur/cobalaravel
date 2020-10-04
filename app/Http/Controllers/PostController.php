<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;

class PostController extends Controller
{
    //
    public function index()
    {
        // $posts = Post::simplePaginate(2);

        return view('posts.index', [
            'posts' => Post::latest()->simplePaginate(6),
        ]);
    }

    public function show(Post $post)
    {
        // $post = Post::where('slug', $slug)->firstOrfail();
        return view('posts.show', compact('post'));
    }

    public function create()
    {
        return view('posts.create', [
            'post' => new Post(),
            'categories' => Category::get(),
            'tags' => Tag::get(),
        ]);
    }

    public function store()
    {
        // VALIDATE DATA
        // cara 1
        // $this->validate($request, [
        //     'title' => 'required|min:3',
        //     'body' => 'required',
        // ]);

        // cara 2
        $data = $this->validateRequest();

        // INSERT DATA
        // cara 1
        // $post = new Post;
        // $post->title = request('title');
        // $post->slug = \Str::slug(request('title'));
        // $post->body = request('body');
        // $post->save();

        // cara 2
        // Post::create([
        //     'title' => request('title'),
        //     'slug' => \Str::slug(request('title')),
        //     'body' => request('body'),
        // ]);

        // cara 3 (semua data langsung dari form, tanpa perubahan)
        // Post::create($request->all());

        // cara 4
        // $post = $request->all();
        // $post['slug'] = \Str::slug($request->title);
        // Post::create($post);

        // cara 5
        $data['slug'] = \Str::slug(request('title'));
        $data['category_id'] = request('category');
        $post = Post::create($data);
        $post->tags()->attach(request('tags'));

        session()->flash('success', 'The post was created');

        // return back();
        return redirect()->to('posts');

    }

    public function edit(Post $post)
    {
        return view('posts.edit', [
            'post' => $post,
            'categories' => Category::get(),
            'tags' => Tag::get(),
        ]);
    }

    public function update(Post $post)
    {

        $data = $this->validateRequest();
        $data['category_id'] = request('category');
        $post->update($data);
        $post->tags()->sync(request('tags'));

        session()->flash('success', 'The post was updated');

        // return back();
        return redirect()->to('posts');
    }

    public function validateRequest()
    {
        return request()->validate([
            'title' => 'required|min:3',
            'body' => 'required',
            'category' => 'required',
            'tags' => 'array|required',
        ]);
    }

    public function destroy(Post $post)
    {
        $post->tags()->detach();
        $post->delete();
        session()->flash('success', 'The post was deleted');
        return redirect()->to('posts');
    }
}
