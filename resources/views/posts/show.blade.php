@extends('layout.master')

@section('content')

   <h1>  {{ $post->title }} </h1>
   <div class="text-secondary">
      <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }} </a>&middot; {{ $post->created_at->format('d F, Y')}} &middot;

      @foreach($post->tags as $tag)
         <a href="/tags/{{ $tag->slug }}">{{ $tag->name }}</a>
      @endforeach
   </div>
   <hr>
   <p> {{ $post->body }}</p>

   <div>
      <form action="/posts/{{ $post->slug }}/delete" method="post">
         @csrf
         @method('delete')
         <button type="submit" class="btn btn-link text-danger btn-sm p-0">Delete</button>
      </form>
   </div>
@endsection
