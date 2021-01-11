<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        

        <title>MyInfo</title>

        <!-- Fonts -->
        {{-- <link rel="stylesheet" href="{{URL::to('css/bootstrap.min.css')}}"> --}}
        <link rel="stylesheet" href="{{URL::to('css/bootstrap.min.css')}}">
        <!-- fontowsome -->
        <link rel="stylesheet" href="{{URL::to('css/all.css')}}">
        <link rel="stylesheet" href="{{URL::to('css/fontawesome.css')}}">
        <link rel="stylesheet" href="{{URL::to('css/style.css')}}">

    </head>
    <body>

        @include('layouts.body')

        
        <!-- javascript -->
        <script src="{{URL::to('js/jquery-3.5.1.min.js')}}"></script>
        <script src="{{URL::to('js/bootstrap.min.js')}}"></script>
        <script src="{{URL::to('js/all.js')}}"></script>
        <script src="{{URL::to('js/app.js')}}"></script>
        <script src="{{URL::to('js/main.js')}}"></script>
    </body>
</html>
