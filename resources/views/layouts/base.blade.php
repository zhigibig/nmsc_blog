<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Default Title')</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f8f8;
        }

        .header {
            background-color: #eaeaea;
            padding: 20px;
            text-align: center;
        }

        .header h1 {
            margin: 0;
            font-size: 36px;
        }

        .header p {
            margin: 0;
            font-size: 18px;
            color: #555;
        }

        .menu {
            text-align: right;
            margin: 20px;
        }

        .menu a {
            text-decoration: none;
            color: #007bff;
            margin-left: 20px;
            font-size: 16px;
        }

        .container {
            display: flex;
            justify-content: space-around;
            margin: 20px;
        }

        .card {
            background-color: white;
            width: 30%;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            overflow: hidden;
        }

        .card img {
            width: 100%;
            height: auto;
        }

        .card-body {
            padding: 15px;
        }

        .card-body h3 {
            margin: 0;
            font-size: 18px;
            color: #333;
        }

        .card-body p {
            margin: 10px 0;
            color: #777;
            font-size: 14px;
        }

        .card-footer {
            display: flex;
            justify-content: space-between;
            padding: 10px 15px;
            background-color: #f9f9f9;
            border-top: 1px solid #eee;
        }

        .card-footer span {
            color: #777;
            font-size: 14px;
        }
    </style>
    @yield('styles')
</head>
<body>

    <header>
        <h1>NMSC Blog</h1>
    </header>

    @include('layouts.navbar')

    <main class="py-4">
        @yield('content')
    </main>
    @yield('scripts')
</body>
</html>
