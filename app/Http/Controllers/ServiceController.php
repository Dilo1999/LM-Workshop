<?php

namespace App\Http\Controllers;

use App\Services\SeoService;
use Illuminate\View\View;

class ServiceController extends Controller
{
    public function show(string $slug, SeoService $seo): View
    {
        $service = collect(config('lm-workshop.services'))
            ->first(fn (array $item) => ($item['slug'] ?? '') === $slug);

        if (! $service) {
            abort(404);
        }

        $heroImage = config('lm-workshop.images.'.$service['hero'], config('lm-workshop.images.servicesHero'));

        $seo->applyForPage('services.'.$slug, [
            'meta_title' => 'LM Workshop | '.$service['title'].' — Maldives',
            'meta_description' => $service['meta_description'] ?? $service['desc'],
            'keywords' => array_merge(
                ['LM Workshop', $service['title'].' Maldives'],
                $service['keywords'] ?? []
            ),
            'og_image' => $heroImage,
        ]);

        return view('pages.service-show', [
            'service' => $service,
            'enquiryUrl' => url('/contact').'?service='.rawurlencode($service['title']),
        ]);
    }
}
