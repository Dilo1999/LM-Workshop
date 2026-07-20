<?php

namespace App\Http\Controllers;

use App\Services\SeoService;
use Illuminate\View\View;

class PageController extends Controller
{
    public function home(SeoService $seo): View
    {
        $seo->applyForPage('home', [
            'meta_title' => 'LM Workshop Maldives | Marine & Industrial Engineering',
            'meta_description' => 'Official website of LM Workshop Maldives. Marine engineering, power systems, fabrication and industrial maintenance in Malé. Engineering division of LITUS Maldives.',
            'keywords' => [
                'LM Workshop',
                'LM Workshop Maldives',
                'LM Workshop Malé',
                'LMWorkshop Maldives',
                'engineering company Maldives',
                'marine engineering Maldives',
                'LITUS Maldives engineering',
            ],
        ]);

        return view('pages.home');
    }

    public function about(SeoService $seo): View
    {
        $seo->applyForPage('about', [
            'meta_title' => 'LM Workshop | About Us — Engineering Division of LITUS Maldives',
            'meta_description' => 'About LM Workshop: the engineering division of LITUS Maldives. Multidisciplinary marine, industrial and commercial engineering solutions across the Maldives.',
            'keywords' => [
                'LM Workshop',
                'about LM Workshop',
                'LM Workshop Maldives',
                'LITUS Maldives engineering',
            ],
        ]);

        return view('pages.about');
    }

    public function services(SeoService $seo): View
    {
        $seo->applyForPage('services', [
            'meta_title' => 'LM Workshop | Engineering Services — Marine, Power & Fabrication',
            'meta_description' => 'LM Workshop engineering services in the Maldives: marine engineering, power systems, mechanical & electrical, fabrication, heavy equipment and preventive maintenance.',
            'keywords' => [
                'LM Workshop',
                'LM Workshop services',
                'marine engineering Maldives',
                'generator maintenance Maldives',
            ],
        ]);

        return view('pages.services');
    }

    public function industries(SeoService $seo): View
    {
        $seo->applyForPage('industries', [
            'meta_title' => 'LM Workshop | Industries — Resorts, Marine & Industrial',
            'meta_description' => 'LM Workshop serves resorts, marine operators, construction, industrial facilities and commercial businesses with tailored engineering support across the Maldives.',
            'keywords' => [
                'LM Workshop',
                'LM Workshop industries',
                'resort engineering Maldives',
                'vessel maintenance Maldives',
            ],
        ]);

        return view('pages.industries');
    }

    public function why(SeoService $seo): View
    {
        $seo->applyForPage('why', [
            'meta_title' => 'LM Workshop | Why Choose Us — Trusted Engineering Partner',
            'meta_description' => 'Why choose LM Workshop: reliable response, practical engineering, multi-disciplinary expertise and quality workmanship for businesses across the Maldives.',
            'keywords' => [
                'LM Workshop',
                'why LM Workshop',
                'trusted engineering Maldives',
            ],
        ]);

        return view('pages.why');
    }

    public function capability(SeoService $seo): View
    {
        $seo->applyForPage('capability', [
            'meta_title' => 'LM Workshop | Capability — Marine, Power & Fabrication',
            'meta_description' => 'LM Workshop capability across marine engines, generators, electrical systems, fabrication, pumps and heavy equipment maintenance throughout the Maldives.',
            'keywords' => [
                'LM Workshop',
                'LM Workshop capability',
                'marine engine repairs Maldives',
            ],
        ]);

        return view('pages.capability');
    }

    public function howWeWork(SeoService $seo): View
    {
        $seo->applyForPage('how-we-work', [
            'meta_title' => 'LM Workshop | How We Work — Consultation to Ongoing Support',
            'meta_description' => 'How LM Workshop works: consultation, site assessment, engineering proposal, execution, testing & handover, and ongoing technical support in the Maldives.',
            'keywords' => [
                'LM Workshop',
                'how LM Workshop works',
                'engineering process Maldives',
            ],
        ]);

        return view('pages.how-we-work');
    }

    public function team(SeoService $seo): View
    {
        $seo->applyForPage('team', [
            'meta_title' => 'LM Workshop | Our Team — Experienced Engineers in Maldives',
            'meta_description' => 'Meet the LM Workshop team — experienced engineers in marine, power systems, mechanical & electrical, fabrication and preventive maintenance in the Maldives.',
            'keywords' => [
                'LM Workshop',
                'LM Workshop team',
                'engineers Maldives',
            ],
        ]);

        return view('pages.team');
    }
}
