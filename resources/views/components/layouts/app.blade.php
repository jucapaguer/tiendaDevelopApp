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

</head>

<body class="body">
    <x-layouts.navigation />

    {{ $slot }}


    <x-layouts.footer />
</body>

</html>
