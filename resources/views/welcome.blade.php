<!-- filepath: /c:/laragon/www/Print2Connect/resources/views/welcome.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>PRINT2CONNECT</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />

    <!-- Bootstrap 4 CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Styles -->
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background: #4CAF50;
        }
        .beauty-button {
            display: inline-block;
            padding: 10px 20px;
            margin: 5px;
            font-size: 14px;
            font-weight: bold;
            color: #16183f;
            background-color: #4CAF50;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }
        .beauty-button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body class="antialiased bg-light">
    <div class="d-flex flex-column justify-content-center align-items-center min-vh-100">
        <div class="text-center mb-4">
            <img src="{{ asset('storage/logo/PRINT2CONNECT.png') }}" alt="Logo PRINT2CONNECT" class="img-fluid" width="300" height="300">
        </div>
        @if (Route::has('login'))
            <div class="text-center">
                @auth
                    <a href="{{ route('home') }}" class="beauty-button">Home</a>
                @else
                    <a href="{{ route('login') }}" class="beauty-button">Login</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register.customer') }}" class="beauty-button">Register as Customer</a>
                        <a href="{{ route('register.printshop') }}" class="beauty-button">Register as Print Shop</a>
                    @endif
                @endauth
            </div>
        @endif
    </div>

    <!-- Bootstrap 4 JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>