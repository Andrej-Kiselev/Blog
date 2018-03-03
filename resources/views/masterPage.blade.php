<!doctype html>
<html>
<head>
    <title>Сайт</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/trps.css') }}">
    <script type="text/javascript" src="{{ asset('/jscript/jq.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/jscript/scripts.js') }}"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<nav class='navbar navbar-light bg-faded navbar-fixed-top' style="background-color: #282B34; border-bottom: 1px solid black; margin: 0; padding: 0">
    <div class="container" id="navBarL" style="padding: 0">
        <ul class="nav navbar-nav">
            <li><a href="/">Главная</a></li>
            <li><a href="/blog">Блог</a></li>
        </ul>
    </div>
</nav>
<body id="mainDiv" >
    @yield('bodyPage')
</body>
</html>