<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', 'app()->getLocale())')}}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{csrf_token()}}">

    <title>{{ config('app.name', 'CarLog')}}</title>
</head>
<body>
    <div class="container">

    </div>
    <main class="py-4">
        @yield('content')
    </main>
</body>
</html>
