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
        $urls = '';

        foreach ($pages as $page) {
            $loc = e(route($page['route']));
            $urls .= "    <url>\n"
                . "        <loc>{$loc}</loc>\n"
                . "        <lastmod>{$lastmod}</lastmod>\n"
                . "        <changefreq>{$page['changefreq']}</changefreq>\n"
                . "        <priority>{$page['priority']}</priority>\n"
                . "    </url>\n";
        }

        $xml = '<?xml version="1.0" encoding="UTF-8"?>'."\n"
            . '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">'."\n"
            . $urls
            . '</urlset>';

        return response($xml, 200)
            ->header('Content-Type', 'application/xml; charset=UTF-8');
    }
}
