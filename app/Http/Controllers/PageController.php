<?php

namespace App\Http\Controllers;

use App\Services\SeoService;
use Illuminate\View\View;

class PageController extends Controller
{
    public function home(SeoService $seo): View
    {
        $seo->applyForPage('home', [
            'meta_title' => 'LM Workshop — Engineering You Can Count On',
            'meta_description' => 'Reliable engineering support for marine, industrial and commercial operations across the Maldives. Engineering division of LITUS Maldives.',
        ]);

        return view('pages.home');
    }

    public function about(SeoService $seo): View
    {
        $seo->applyForPage('about', [
            'meta_title' => 'About Us — LM Workshop',
            'meta_description' => 'LM Workshop is the engineering division of LITUS Maldives, providing multidisciplinary engineering solutions throughout the Maldives.',
        ]);

        return view('pages.about');
    }

    public function services(SeoService $seo): View
    {
        $seo->applyForPage('services', [
            'meta_title' => 'Services — LM Workshop',
            'meta_description' => 'Comprehensive engineering services including marine engineering, power systems, fabrication, and preventive maintenance.',
        ]);

        return view('pages.services');
    }

    public function industries(SeoService $seo): View
    {
        $seo->applyForPage('industries', [
            'meta_title' => 'Industries — LM Workshop',
            'meta_description' => 'Tailored engineering support for resorts, marine operators, construction, industrial facilities and more across the Maldives.',
        ]);

        return view('pages.industries');
    }

    public function why(SeoService $seo): View
    {
        $seo->applyForPage('why', [
            'meta_title' => 'Why Choose Us — LM Workshop',
            'meta_description' => 'Discover why businesses across the Maldives choose LM Workshop for reliable engineering support and quality workmanship.',
        ]);

        return view('pages.why');
    }

    public function capability(SeoService $seo): View
    {
        $seo->applyForPage('capability', [
            'meta_title' => 'Capability — LM Workshop',
            'meta_description' => 'Proven capability across marine engineering, power generation, fabrication and industrial maintenance throughout the Maldives.',
        ]);

        return view('pages.capability');
    }

    public function howWeWork(SeoService $seo): View
    {
        $seo->applyForPage('how-we-work', [
            'meta_title' => 'How We Work — LM Workshop',
            'meta_description' => 'Our structured engineering process from consultation through to ongoing support and long-term partnership.',
        ]);

        return view('pages.how-we-work');
    }

    public function team(SeoService $seo): View
    {
        $seo->applyForPage('team', [
            'meta_title' => 'Our Team — LM Workshop',
            'meta_description' => 'Meet the engineering professionals behind LM Workshop — expertise you can count on across multiple disciplines.',
        ]);

        return view('pages.team');
    }
}
