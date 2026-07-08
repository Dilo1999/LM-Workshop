<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {!! \Artesaos\SEOTools\Facades\SEOTools::generate() !!}

    <link rel="icon" href="{{ asset(config('lm-workshop.images.favicon')) }}" type="image/svg+xml" sizes="any">
    <link rel="apple-touch-icon" href="{{ asset(config('lm-workshop.images.favicon')) }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('head')
</head>
<body class="min-h-screen flex flex-col bg-white text-navy antialiased">
    <x-lm.navbar />

    <main class="flex-1">
        @yield('content')
    </main>

    <x-lm.footer />

    @stack('scripts')
</body>
</html>
