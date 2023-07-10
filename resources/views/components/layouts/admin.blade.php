<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title ?? 'Tienda' }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <meta name="description" content="{{ $metaDescription ?? 'Tienda' }}">
    @vite(['resources/css/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css" />

</head>

<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <x-layouts.navigationadmin />
            <div class="col py-3">

                @if (Session::has('status_success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('status_success') }}
                    </div>
                @endif
                @if (Session::has('status_error'))
                    <div class="alert alert-danger" role="alert">
                        {{ Session::get('status_error') }}
                    </div>
                @endif
                {{ $slot }}
            </div>
        </div>
    </div>



    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.js"></script>

</body>

</html>
