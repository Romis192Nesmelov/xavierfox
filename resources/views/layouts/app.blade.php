<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Xavier Fox Communications - профессиональные IT-статьи и руководства по роутерам, Linux, Windows и софту. Практические гайды для системных администраторов.">
        <meta name="keywords" content="IT статьи, роутеры, Linux, Windows, софт, настройка сети, системное администрирование">
        <meta name="author" content="Xavier Fox">
        <meta name="robots" content="index, follow">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Twitter Card -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="Xavier Fox Communications">
        <meta name="twitter:description" content="IT статьи и руководства для специалистов">

        <title>{{ config('app.name', 'Xavierfox') }}</title>

        @include('partials.favicons')

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.2.1/dist/jquery.min.js" type="text/javascript"></script>
        {{ $vite_files }}
    </head>
    <body>
        <!-- Geometric Background -->
        <div class="geometric-bg">
            <div class="geometric-shape geometric-triangle" style="top: 10%; left: 5%;"></div>
            <div class="geometric-shape geometric-triangle" style="top: 60%; right: 8%; transform: rotate(180deg);"></div>
            <div class="geometric-shape" style="top: 25%; right: 20%;">
                <div class="geometric-hexagon" style="width: 60px; height: 34.64px;"></div>
            </div>
            <div class="grid-pattern"></div>
        </div>
        <!-- Navigation -->
        {{ $main_nav }}

        <!-- Page Content -->
        {{ $slot }}

        <!-- Footer -->
        {{ $footer }}
    </body>
</html>
