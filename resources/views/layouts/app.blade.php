<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
          content="Xavier Fox Communications - IT-база знаний от студента для студента. Статьи о сетевой инфраструктуре, Linux, Windows и софте.">
    <meta name="keywords" content="IT, база знаний, студент, сетевая инфраструктура, Linux, Windows, софт, роутеры, ПК">
    <meta name="author" content="Ксавьер Фокс">
    <meta name="robots" content="index, follow">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta property="og:title" content="Xavier Fox Communications - IT-база знаний">
    <meta property="og:description" content="IT-база знаний от студента для студента. Простота и юмор в каждой статье.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ env('APP_URL') }}">
    <meta property="og:image" content="{{ asset('storage/images/logo.svg') }}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Xavier Fox Communications">
    <meta name="twitter:description" content="IT-база знаний от студента для студента">

    <title>{{ config('app.name', 'Xavierfox') }}</title>

    @include('layouts.partials.favicons')

    {{--        <script src="https://cdn.jsdelivr.net/npm/jquery@3.2.1/dist/jquery.min.js" type="text/javascript"></script>--}}
    {{ $vite_files }}
</head>
<body>
<!-- Navigation -->
{{ $main_nav }}

<!-- Page Content -->
{{ $slot }}

<!-- Footer -->
{{ $footer }}
</body>
</html>
