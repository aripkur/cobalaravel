@extends('layout.master', ['title' => 'Laravel 7 - Post'])

@section('content')
    @include('layout.alert')
    <div class="d-flex justify-content-between">
        <div>
            @if(isset($category))
                <h3>Category : {{ $category->name }}</h3>
            @elseif(isset($tag))
                <h3>Tag : {{ $tag->name }}</h3>
            @else
                <h3>All Posts</h3>
            @endif
        </div>
        <div>
            <a href="/posts/create" class="btn btn-primary">Create</a>
        </div>
    </div>
    <hr>
    <div class="row">
            @forelse($posts as $post)
            <div class ="col-md-4">
                <div class="card mb-3">
                    <div class="card-header">
                        {{ $post->title }}
                    </div>
                    <div class="card-body">
                        <div>
                            {{ Str::limit($post->body, 100) }}
                        </div>
                        <a href="/posts/{{ $post->slug }}">Read more</a>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-lg-between">
                            <div>Publised on {{ $post->created_at->format("d F, Y")}}</div>
                            <a href="/posts/{{ $post->slug }}/edit" class="btn btn-warning btn-sm">edit</a>
                        </div>
                    </div>
                </div>
            </div>
            @empty
                <div class="alert alert-danger w-100">
                    there's no post
                </div>

            @endforelse

    </div>
    <div class="d-flex justify-content-center">
        {{ $posts->links() }}
    </div>

@endsection
