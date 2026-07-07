@extends('layouts.app')

@section('content')
@php
    $images = config('lm-workshop.images');
    $industries = config('lm-workshop.industries');
@endphp

<x-lm.section-hero
    label="Sectors We Serve"
    title="Industries We Support"
    body="Every industry operates differently, but they all depend on reliable engineering. LM Workshop provides tailored engineering support across a wide range of sectors throughout the Maldives."
    :img="$images['industriesHero']"
/>

<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-14">
            <x-lm.section-label>Our Sectors</x-lm.section-label>
            <h2 class="font-display font-bold mb-4 text-display text-navy">Engineering for Every Industry</h2>
        </div>
        <div class="grid md:grid-cols-2 gap-8">
            @foreach($industries as $industry)
                <div class="group industry-card relative overflow-hidden h-80 cursor-default">
                    <img src="{{ $images[$industry['img']] }}" alt="{{ $industry['title'] }}" class="absolute inset-0 w-full h-full object-cover transition-transform duration-500">
                    <div class="absolute inset-0" style="background: linear-gradient(to top, rgba(7,21,41,0.96) 0%, rgba(11,31,63,0.53) 55%, transparent 100%)"></div>
                    <div class="industry-overlay absolute inset-0 opacity-0 transition-opacity duration-300 bg-navy-deep/73"></div>
                    <div class="industry-bar absolute left-0 top-0 bottom-0 w-1.5 bg-gold"></div>
                    <div class="absolute inset-0 flex flex-col justify-end p-8">
                        <h3 class="font-display font-bold text-white text-2xl mb-2 tracking-[0.03em]">{{ $industry['title'] }}</h3>
                        <p class="industry-desc text-white/80 text-sm leading-relaxed max-w-sm opacity-0 transition-opacity duration-300 font-body">{{ $industry['desc'] }}</p>
                        <div class="mt-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <span class="inline-flex items-center gap-1.5 text-xs font-heading font-bold uppercase tracking-widest text-gold">
                                Learn More
                                <x-lm.icon name="arrow-right" :size="12" />
                            </span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="py-24 bg-cream">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid lg:grid-cols-3 gap-8">
            @foreach([
                ['One Engineering Partner', 'Rather than managing multiple contractors, LM Workshop provides multi-disciplinary engineering support through a single accountable partner.'],
                ['Operational Understanding', 'We work closely with each client to understand their specific operational environment, equipment, schedules and maintenance requirements.'],
                ['Maldives Expertise', 'Deep experience operating in the unique logistical and environmental conditions of the Maldives, including remote island and marine environments.'],
            ] as [$heading, $body])
                <div class="bg-white p-8 border-l-4 border-gold">
                    <h3 class="font-heading font-bold text-lg mb-3 text-navy">{{ $heading }}</h3>
                    <p class="text-gray-500 text-sm leading-relaxed font-body">{{ $body }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="relative py-24 bg-navy">
    <div class="absolute inset-0 bg-cover bg-center opacity-10" style="background-image: url('{{ $images['construction'] }}')"></div>
    <div class="relative z-10 max-w-7xl mx-auto px-6 text-center">
        <x-lm.section-label light>Let's Connect</x-lm.section-label>
        <h2 class="font-display font-bold text-white mb-4 text-display">Supporting Your Industry</h2>
        <p class="text-white/60 max-w-lg mx-auto mb-8 leading-relaxed font-body">Talk to our team about your specific engineering requirements and how LM Workshop can support your operations.</p>
        <x-lm.gold-btn :href="route('contact')">Get in Touch</x-lm.gold-btn>
    </div>
</section>
@endsection
