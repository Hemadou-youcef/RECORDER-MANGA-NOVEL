<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/style/style.css">
    <link rel="icon" href="/image/recorder.png">
    <title>@yield('title')</title>
</head>
<body>
    <header>
        <div>
            <ul>
                <li><a class="active" href="/manga">Manga</a></li>
                <li><a href="/novels">Light Novel</a></li>
            </ul>
        </div>

    </header>
    <div id="content">
        @yield('content')
    </div>
</body>
</html>
