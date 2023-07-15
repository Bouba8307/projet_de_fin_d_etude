<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GestionStocks</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <style>
        body {
            font-family: 'figtree', sans-serif;
            background-color: #f0f2f5;
        }

        .flex {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card {
            position: relative;
            width: 400px;
            padding: 200px;
            background-color:aqua;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .card::before {
            content: "Gestion Stocks";
            position: absolute;
            top: -20px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 30px;
            font-weight: bold;
            background-color: #fff;
            padding: 0 10px;
            border-radius: 4px;
        }

        .logo {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo img {
            width: 150px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 6px;
            font-weight: 600;
        }

        .form-group input[type="text"],
        .form-group input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            outline: none;
        }

        .form-group .btn {
            width: 200%;
            padding: 20px;
            background-color: #1877f2;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-weight: 600;
            cursor: pointer;
            text-align: center;
            text-decoration:underline;
        }

        .form-group .btn-login {
            margin-bottom: 10px;
            background-color: #1877f2;
        }

        .form-group .btn-register {
            background-color: #42b72a;
        }

        .form-group .btn:hover {
            background-color: #0e62cd;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="card">
        <form class="flex">
            @if (Route::has('login'))
                <div class="form-group">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="btn btn-login">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-login">Login</a>
                       @endif
                    @endauth
                </div>
    
        </form>
    </div>
</div>
</body>
</html>
