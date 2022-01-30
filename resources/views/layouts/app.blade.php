<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Site Metas -->
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="{{ asset('vendor/app/images/icon.png') }}" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{ asset('vendor/app/images/apple-touch-icon.png') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/app/css/bootstrap.min.css') }}">
    <!-- Site CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/app/css/style.css') }}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/app/css/responsive.css') }}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/app/css/custom.css') }}">
    <style>
        footer { position: sticky }
    </style>

</head>

<body>
    @include('layouts.header')
    
    @yield('content')

    @include('layouts.footer')
</html>