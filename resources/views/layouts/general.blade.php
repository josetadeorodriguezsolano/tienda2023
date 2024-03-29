<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('titulo')</title>
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
    @yield('head')
</head>
<body>
    @section('header')
        @include('layouts.componentes.header')
    @show
    @section('nav')
        @include('layouts.componentes.nav')
    @show
    @section('main')
    @show
    @section('aside')
        @include('layouts.componentes.aside')
    @show
    @section('footer')
        @include('layouts.componentes.footer')
    @show
    @yield('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>
