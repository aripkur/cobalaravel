<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel 7 @yield('title')</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Laravel 7</a>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item{{request()->is('/') ? ' active' : '' }}">
                <a class="nav-link" href="/">Home</a>
            </li>
            <li class="nav-item {{request()->is('posts') ? ' active' : ''}}">
                <a class="nav-link" href="/posts">Posts</a>
            </li>
            <li class="nav-item{{ request()->is('about') ? ' active' : ''}}">
                <a class="nav-link" href="/about">About</a>
            </li>
        </ul>
    </div>
    </nav>

    <div class="container pt-5">
        @yield('content')
    </div>

</body>
</html>
