<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .container {
            display: flex;
            flex-direction: column;
        }
        .active {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            @include('layouts.header')
        </div>
        <div class="content">
            @yield('body')
        </div>
        <div class="footer">
            @include('layouts.footer')
        </div>
    </div>
</body>
</html>