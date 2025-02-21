<!-- filepath: /c:/laragon/www/Print2Connect/resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Print2Connect') }}</title>
    <!-- Standard Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('images/logo/favicon.ico') }}">

    <!-- Favicon - 16x16 -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/logo/favicon-16x16.png') }}">

    <!-- Favicon - 32x32 -->
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/logo/favicon-32x32.png') }}">

    <!-- Apple Touch Icon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/logo/apple-touch-icon.png') }}">

    <!-- Manifest file (if generated) -->
    <link rel="manifest" href="{{ asset('images/logo/site.webmanifest') }}">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
        integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w=="
        crossorigin="anonymous" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Load jQuery first -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <!-- Load compatible Popper (1.x) for Bootstrap 4 -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Load Bootstrap 4.5.2 JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Your app.js last -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 d-flex flex-column">

        <!-- Page Heading -->
        <header class="sticky-top bg-white shadow">
            @include('layouts.navigation')
        </header>

        <!-- Page Content -->
        <div class="flex-grow-1">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-2">
                <div class="lg:flex lg:justify-between">

                    <div class="lg:w-32">
                        
                    </div>

                    <div class="flex-1 lg:mx-10" style="max-width: 700px">
                        <main>
                            {{ $slot }}
                        </main>
                    </div>

                    <div class="lg:w-1/6 p-2 rounded-lg mt-4">
                        @include('_friends-list')
                    </div>

                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="bg-white text-center text-lg-start mt-auto py-3 shadow">
            <div class="container text-center">
                <p class="mb-0">© {{ date('Y') }} Print2Connect. All rights reserved.</p>
            </div>
        </footer>

    </div>
</body>

</html>