<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->isLocale('ar') ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="{{ $settings->description ?? 'Null' }}">
    <meta name="keywords" content="{{ $settings->keywords ?? 'null, keywords' }}">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    <title>{{ $title ?? ($settings->name ?? config('app.name', 'Jevelin')) }}</title>

    @include('includes.favicon')
    @vite(['resources/css/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    @stack('css')
    @livewireStyles
</head>

<body>
    {{ $slot }}
    <script src="{{ asset('assets/lib/jquery/jquery.js') }}"></script>
    @stack('scripts')
    @livewireScripts
</body>

</html>
