<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GestionStocks</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;600&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: url('https://img.freepik.com/psd-premium/livre-ampoule-dessus-fond-blanc_904424-123.jpg?w=360');
            background-repeat: repeat;
            background-color: #f0f2f5;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0 auto;
        }

        .card {
            position: relative;
            width: 400px;
            padding: 40px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            text-align: center;
        }

        .logo {
            margin-bottom: 20px;
        }

        .logo h1 {
            font-size: 36px;
            color: #000;
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
            width: 100%;
            padding: 12px;
            background-color: #1877f2;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            transition: background-color 0.3s;
        }

        .form-group .btn-login {
            background-color: #1877f2;
        }

        .form-group .btn-login:hover {
            background-color: #0e62cd;
        }

        .form-group .btn-register {
            background-color: #42b72a;
        }

        .form-group .btn-register:hover {
            background-color: #30a019;
        }

        .footer {
            margin-top: 20px;
            font-size: 12px;
            color: #888;
            text-align: center;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="card">
        <div class="logo">
            <h1>Savoir</h1>
        </div>
        <form class="flex">
            @if (Route::has('login'))
                <div class="form-group">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="btn btn-login">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-login">Login</a>
                    @endauth
                </div>
            @endif
        </form>
    </div>
</div>
<div class="footer">
    &copy; 2023 GestionStocks. All rights reserved.
</div>
</body>
</html>
