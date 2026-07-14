<?php

namespace App\Http\Controllers;

use App\Services\SeoService;
use Illuminate\View\View;

class PageController extends Controller
{
    public function home(SeoService $seo): View
    {
        $seo->applyForPage('home', [
            'meta_title' => 'LM Workshop — Engineering You Can Count On | Maldives',
            'meta_description' => 'LM Workshop provides reliable marine, industrial and commercial engineering support across the Maldives. Marine engines, power systems, fabrication and preventive maintenance.',
            'keywords' => [
                'LM Workshop',
                'engineering Maldives',
                'marine engineering',
                'industrial maintenance Malé',
                'power systems Maldives',
                'engineering company Maldives',
            ],
        ]);

        return view('pages.home');
    }

    public function about(SeoService $seo): View
    {
        $seo->applyForPage('about', [
            'meta_title' => 'About LM Workshop — Engineering Division of LITUS Maldives',
            'meta_description' => 'Learn about LM Workshop, the engineering division of LITUS Maldives. Multidisciplinary engineering solutions for marine, industrial and commercial operations.',
            'keywords' => [
                'about LM Workshop',
                'LITUS Maldives engineering',
                'engineering company Malé',
            ],
        ]);

        return view('pages.about');
    }

    public function services(SeoService $seo): View
    {
        $seo->applyForPage('services', [
            'meta_title' => 'Engineering Services — Marine, Power, Fabrication | LM Workshop',
            'meta_description' => 'Explore LM Workshop services: marine engineering, power systems, mechanical & electrical, fabrication, heavy equipment, fuel & water systems and preventive maintenance.',
            'keywords' => [
                'marine engineering services Maldives',
                'generator maintenance Maldives',
                'steel fabrication Maldives',
                'preventive maintenance Maldives',
            ],
        ]);

        return view('pages.services');
    }

    public function industries(SeoService $seo): View
    {
        $seo->applyForPage('industries', [
            'meta_title' => 'Industries We Serve — Resorts, Marine & Industrial | LM Workshop',
            'meta_description' => 'Tailored engineering support for resorts, marine operators, construction companies, industrial facilities, commercial businesses and government infrastructure in the Maldives.',
            'keywords' => [
                'resort engineering Maldives',
                'vessel maintenance Maldives',
                'construction engineering support',
                'industrial maintenance Maldives',
            ],
        ]);

        return view('pages.industries');
    }

    public function why(SeoService $seo): View
    {
        $seo->applyForPage('why', [
            'meta_title' => 'Why Choose LM Workshop — Reliable Engineering Partner',
            'meta_description' => 'Why businesses across the Maldives choose LM Workshop: reliable response, practical engineering, multi-disciplinary expertise, quality workmanship and transparent communication.',
            'keywords' => [
                'trusted engineering Maldives',
                'reliable engineering partner',
                'why LM Workshop',
            ],
        ]);

        return view('pages.why');
    }

    public function capability(SeoService $seo): View
    {
        $seo->applyForPage('capability', [
            'meta_title' => 'Engineering Capability — Proven Skills Across Disciplines | LM Workshop',
            'meta_description' => 'Proven capability across marine engines, generators, electrical systems, fabrication, pumps and heavy equipment maintenance throughout the Maldives.',
            'keywords' => [
                'engineering capability Maldives',
                'marine engine repairs',
                'generator servicing Maldives',
            ],
        ]);

        return view('pages.capability');
    }

    public function howWeWork(SeoService $seo): View
    {
        $seo->applyForPage('how-we-work', [
            'meta_title' => 'How We Work — From Consultation to Ongoing Support | LM Workshop',
            'meta_description' => 'Our structured engineering process: consultation, site assessment, proposal, execution, testing & handover, and ongoing support for long-term partnership.',
            'keywords' => [
                'engineering process Maldives',
                'project delivery LM Workshop',
                'engineering consultation Maldives',
            ],
        ]);

        return view('pages.how-we-work');
    }

    public function team(SeoService $seo): View
    {
        $seo->applyForPage('team', [
            'meta_title' => 'Our Engineering Team — Experienced Professionals | LM Workshop',
            'meta_description' => 'Meet the LM Workshop engineering team — specialists in marine, power systems, mechanical & electrical, fabrication and preventive maintenance.',
            'keywords' => [
                'engineering team Maldives',
                'marine engineers Malé',
                'LM Workshop team',
            ],
        ]);

        return view('pages.team');
    }
}
