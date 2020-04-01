<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive_fonts.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive_images.css') }}">
    @yield('stylesheets')

</head>
<body>

@component('components.navbar')
    @slot('categories', $categories)
@endcomponent

<main>
    @yield('content')
</main>

@yield('scripts')
</body>
</html>
