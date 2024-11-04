<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', 'app()->getLocale())')}}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style.css">
    <meta name="csrf-token" content="{{csrf_token()}}">
 
    <title>{{ config('app.name', 'CarLog')}}</title>
</head>
<body>
    <div id="app">
        <div class="container">
            <a href="{{route("makers")}}">Makers</a>
            <a href="{{route("fuels")}}">Fuels</a>
        </div>
    </div>
    <main class="py-4">
        <div>
            keresés<br>
            <a href=""></a>
        </div>  
        @yield('content')
    </main>
    <footer class="text-center">
        
    </footer>
</body>
</html>