<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        .active-menu {
            font-weight: bold;
        }
    </style>
</head>
<body>
<div id="app">
    <app></app>
</div>

<script src="{{mix('js/app.js')}}"></script>
</body>
</html>
