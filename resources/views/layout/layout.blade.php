<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Cool Task</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body class="">
    <div>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">Cool Task</a>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
						@auth
							<li class="nav-item">
								<a class="nav-link" href="#">Profile</a>
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
            </div>
        </nav>
		<hr>
        @yield('content')
		<hr>
		<footer>
			<p>Cool Task &copy; 2024</p>
		</footer>
    </div>
</body>

</html>
