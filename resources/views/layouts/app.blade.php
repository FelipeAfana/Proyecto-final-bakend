<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Salitre magico</title>
    <link rel="icon" href="{{ asset('imagenes/logo_salitre.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">


</head>
<body>
    @include('layouts.header')

    @yield('content')

    @include('layouts.footer')
</body>
</html>