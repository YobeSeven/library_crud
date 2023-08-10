<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{env("APP_NAME")}}</title>
    @vite(['resources/js/app.js'])
</head>
<body>
    <nav class="nav">
        <div>
            <a class="nav-link" href={{route('home.index')}}>Home</a>
        </div>
        <div>
            <a class="nav-link" href={{route("books.index")}}>Books</a>
        </div>
        <div>
            <a class="nav-link" href={{route("paniers.index")}}>Paniers</a>
        </div>
    </nav>
        @yield('content')
</body>
</html>
