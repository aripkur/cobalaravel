@extends('layout.master', ['title' => 'new posts'])

@section('content')
    @include('layout.alert')
        <div class="card">
            <div class="card-header">
                Create Post
            </div>
            <div class="card-body">
                <form action="/posts/store" method="post">
                @csrf
                    @include('layout.formpost', ['submit' => 'Create'])
                </form>
            </div>
        </div>
@endsection
