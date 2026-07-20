<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="google-site-verification" content="_Jakyf766XD8eq1MHY5NMO5Pd5GGtFwuKxrMF2wmUxA">
    <meta name="theme-color" content="#1a2b4a">
    <meta name="author" content="{{ config('lm-workshop.brand.name') }}">
    <meta name="geo.region" content="MV">
    <meta name="geo.placename" content="Malé">
    <meta name="format-detection" content="telephone=yes">

    {!! \Artesaos\SEOTools\Facades\SEOTools::generate() !!}

    <link rel="icon" href="{{ asset(config('lm-workshop.images.favicon')) }}" type="image/svg+xml" sizes="any">
    <link rel="apple-touch-icon" href="{{ asset(config('lm-workshop.images.favicon')) }}">
    <link rel="sitemap" type="application/xml" title="Sitemap" href="{{ url('/sitemap.xml') }}">

    @php
        $brand = config('lm-workshop.brand');
        $logoUrl = asset(config('lm-workshop.images.logo'));
        $phone = $brand['phone'] ?? '';
        $hasRealPhone = $phone && ! str_contains($phone, 'XXX');
        $sameAs = array_values(array_filter($brand['same_as'] ?? []));
        $alternateNames = array_values(array_filter($brand['alternate_names'] ?? []));

        $organization = [
            '@context' => 'https://schema.org',
            '@graph' => [
                [
                    '@type' => ['Organization', 'ProfessionalService'],
                    '@id' => url('/').'#organization',
                    'name' => $brand['name'],
                    'legalName' => $brand['legal_name'] ?? $brand['name'],
                    'alternateName' => $alternateNames,
                    'slogan' => $brand['tagline'],
                    'url' => url('/'),
                    'logo' => [
                        '@type' => 'ImageObject',
                        'url' => $logoUrl,
                        'caption' => $brand['name'],
                    ],
                    'image' => $logoUrl,
                    'email' => $brand['email'],
                    'description' => $brand['description'],
                    'foundingLocation' => [
                        '@type' => 'Place',
                        'name' => 'Malé, Maldives',
                    ],
                    'address' => [
                        '@type' => 'PostalAddress',
                        'addressLocality' => 'Malé',
                        'addressCountry' => 'MV',
                    ],
                    'areaServed' => [
                        '@type' => 'Country',
                        'name' => 'Maldives',
                    ],
                    'knowsAbout' => [
                        'Marine engineering',
                        'Power systems',
                        'Industrial maintenance',
                        'Fabrication',
                        'Preventive maintenance',
                    ],
                    'parentOrganization' => [
                        '@type' => 'Organization',
                        'name' => 'LITUS Maldives',
                    ],
                ],
                [
                    '@type' => 'WebSite',
                    '@id' => url('/').'#website',
                    'url' => url('/'),
                    'name' => $brand['name'],
                    'alternateName' => $alternateNames,
                    'description' => $brand['description'],
                    'publisher' => ['@id' => url('/').'#organization'],
                    'inLanguage' => 'en',
                ],
                [
                    '@type' => 'LocalBusiness',
                    '@id' => url('/').'#localbusiness',
                    'name' => $brand['name'],
                    'alternateName' => $alternateNames,
                    'image' => $logoUrl,
                    'url' => url('/'),
                    'email' => $brand['email'],
                    'description' => $brand['description'],
                    'address' => [
                        '@type' => 'PostalAddress',
                        'addressLocality' => 'Malé',
                        'addressCountry' => 'MV',
                    ],
                    'geo' => [
                        '@type' => 'GeoCoordinates',
                        'latitude' => 4.1755,
                        'longitude' => 73.5093,
                    ],
                    'areaServed' => 'Maldives',
                    'priceRange' => '$$',
                ],
            ],
        ];

        if ($hasRealPhone) {
            $organization['@graph'][0]['telephone'] = $phone;
            $organization['@graph'][2]['telephone'] = $phone;
        }

        if ($sameAs !== []) {
            $organization['@graph'][0]['sameAs'] = $sameAs;
        }
    @endphp
    <script type="application/ld+json">{!! json_encode($organization, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT) !!}</script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('head')
</head>
<body class="min-h-screen flex flex-col bg-white text-navy antialiased">
    <x-lm.navbar />

    <main class="flex-1" id="main-content">
        @yield('content')
    </main>

    <x-lm.footer />

    @stack('scripts')
</body>
</html>
