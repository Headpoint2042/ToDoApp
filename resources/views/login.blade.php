<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="user-data" content="{{ $user }}">


        <title>Laravel</title>
        @vite('resources/css/app.css')
    </head>
    <body>
        <div id='app' class="bg-violet-700"></div>
        <div id='popup'></div>
        @vite('resources/js/app.js')
    </body>
</html>
