<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title ?? 'Tienda' }} - Tienda DevelopApp</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <meta name="description" content="{{ $metaDescription ?? 'Tienda' }}">
    @vite(['resources/css/app.scss', 'resources/js/app.js'])
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>

<body class="body">
    <x-layouts.navigation />


    @if (Session::has('status_success'))
        <div id="alertas" class="alert alert-success paginauelemento" role="alert">
            {{ Session::get('status_success') }}
        </div>
    @endif
    @if (Session::has('status_error'))
        <div id="alertas" class="alert alert-danger paginauelemento" role="alert">
            {{ Session::get('status_error') }}
        </div>
    @endif

    {{ $slot }}


    <script>
        var elemento = document.getElementById('alertas');
        setTimeout(function() {
            elemento.style.opacity = '1';
            elemento.style.transition = 'opacity 1.5s ease';
            elemento.style.opacity = '0';
        }, 2500);
    </script>

    <x-layouts.footer />
</body>

</html>
