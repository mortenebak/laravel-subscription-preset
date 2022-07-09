<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Stripe Key -->
        <meta name="stripe-key" content="{{ config('cashier.key') }}">
        @hasSection('title')

            <title>@yield('title') - {{ config('app.name') }}</title>
        @else
            <title>{{ config('app.name') }}</title>
        @endif

        <!-- Favicon -->
		<link rel="shortcut icon" href="{{ url(asset('favicon.ico')) }}">

        <!-- Fonts -->
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

        <!-- Styles -->
        @livewireStyles

        <!-- Styles/Scripts -->
        @vite(['resources/js/app.js'])
        <script defer src="//js.stripe.com/v3/"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
                integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
                crossorigin="anonymous"
                referrerpolicy="no-referrer"></script>
        <script src="//kit.fontawesome.com/3e6c1e0e19.js" crossorigin="anonymous"></script>
    </head>

    <body>
        @yield('body')

        @livewireScripts
    </body>
</html>
