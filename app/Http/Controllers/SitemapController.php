<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function __invoke(): Response
    {
        $pages = [
            ['route' => 'home', 'priority' => '1.0', 'changefreq' => 'weekly'],
            ['route' => 'about', 'priority' => '0.8', 'changefreq' => 'monthly'],
            ['route' => 'services', 'priority' => '0.9', 'changefreq' => 'monthly'],
            ['route' => 'industries', 'priority' => '0.8', 'changefreq' => 'monthly'],
            ['route' => 'why', 'priority' => '0.7', 'changefreq' => 'monthly'],
            ['route' => 'capability', 'priority' => '0.8', 'changefreq' => 'monthly'],
            ['route' => 'how-we-work', 'priority' => '0.7', 'changefreq' => 'monthly'],
            ['route' => 'team', 'priority' => '0.6', 'changefreq' => 'monthly'],
            ['route' => 'contact', 'priority' => '0.9', 'changefreq' => 'monthly'],
        ];

        $lastmod = now()->toAtomString();

        $urls = collect($pages)->map(fn (array $page) => [
            'loc' => route($page['route']),
            'lastmod' => $lastmod,
            'changefreq' => $page['changefreq'],
            'priority' => $page['priority'],
        ]);

        $xml = view('sitemap', ['urls' => $urls])->render();

        return response($xml, 200)
            ->header('Content-Type', 'application/xml; charset=UTF-8');
    }
}
