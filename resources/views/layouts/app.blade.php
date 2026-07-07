<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {!! \Artesaos\SEOTools\Facades\SEOTools::generate() !!}

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
