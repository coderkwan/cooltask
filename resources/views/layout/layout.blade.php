<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    <title>Cool Task - getting thing done!</title>
    <meta name="description" content="A simple note taking app that will help you get things done.">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div>
        <nav class="navbar bg-body-tertiary">
            <div class="container border py-2 px-4 d-flex justify-content-between gap-4">
                <a class="navbar-brand" href="/"><img src="/logo.png" alt="logo" style="width: 145px"></a>
                <ul class="navbar-nav d-flex flex-row gap-4">
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="/">Tasks</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/profile">Profile</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="/login">Sign In</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/register">Sign Up</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </nav>
        <div class="container min-vh-100 py-5">
            @yield('content')
        </div>
        <hr>
        <footer class="text-center d-flex flex-column align-items-center gap-2 py-5">
            <img src="/logo.png" alt="logo" style="width: 145px">
            <p>Your ultimate app for getting things done.</p>
            <p>Cool Task &copy; 2024</p>
        </footer>
    </div>
</body>

</html>
