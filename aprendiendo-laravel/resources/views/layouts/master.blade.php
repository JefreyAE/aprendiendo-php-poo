<!DOCTYPE HTML>
<html>
    <head lang='es'>
        <meta charset="utf-8">
        <title>Titulo - @yield('titulo')</title>
    </head>
    <body>
        @section('header')
        <h1>Cabecera de la WEB (master)</h1>
        @show
        <hr>
        <div class='container'>
            @yield('content')
        </div>
        
        @section('footer')
            Pie de la WEB (master)
        @show
    </body>
</html>
