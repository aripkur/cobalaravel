@extends('layout.master', ['title' => 'Edit posts'])

@section('content')
    @include('layout.alert')
        <div class="card">
            <div class="card-header">
                Edit Post
            </div>
            <div class="card-body">
                <form action="/posts/{{ $post->slug }}/update" method="post">
                @method('patch')
                @csrf
                    @include('layout.formpost')
                </form>
            </div>
        </div>
@endsection
