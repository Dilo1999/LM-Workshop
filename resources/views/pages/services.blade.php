@extends('layouts.app')

@section('content')
@php
    $images = config('lm-workshop.images');
    $services = config('lm-workshop.services');
@endphp

<x-lm.section-hero
    label="What We Offer"
    title="Engineering Solutions"
    body="LM Workshop delivers comprehensive engineering services across multiple technical disciplines, enabling clients to work with one trusted engineering partner."
    :img="$images['welding']"
/>

<section class="bg-white py-24">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-14">
            <x-lm.section-label>Our Services</x-lm.section-label>
            <h2 class="font-display font-bold mb-4 text-display text-navy">Full Services Overview</h2>
        </div>
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-5">
            @foreach($services as $service)
                <x-lm.service-card :icon="$service['icon']" :title="$service['title']" :desc="$service['desc']" />
            @endforeach
        </div>
    </div>
</section>

<section class="py-20 bg-cream">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div>
                <x-lm.section-label>Our Approach</x-lm.section-label>
                <h2 class="font-display font-bold mb-6 leading-tight text-display-md text-navy">Engineering You Can Rely On</h2>
                @foreach([
                    ['Preventive Maintenance Programmes', 'Tailored to your equipment, schedules and operational requirements.'],
                    ['Emergency Breakdown Response', 'Rapid deployment of experienced engineers when you need support most.'],
                    ['Complex Engineering Projects', 'Full project management from initial assessment through to completion and handover.'],
                    ['Technical Consultation', 'Expert advice on engineering challenges, system design and operational improvements.'],
                ] as [$title, $desc])
                    <div class="flex gap-4 mb-5">
                        <div class="w-2 h-2 rounded-full mt-2 shrink-0 bg-gold"></div>
                        <div>
                            <p class="font-heading font-bold mb-1 text-navy">{{ $title }}</p>
                            <p class="text-gray-500 text-sm leading-relaxed font-body">{{ $desc }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <img src="{{ $images['powerPlant'] }}" alt="Industrial engineering facility" class="w-full h-[420px] object-cover">
        </div>
    </div>
</section>

<section class="relative py-24 overflow-hidden bg-navy">
    <div class="absolute inset-0 bg-cover bg-center opacity-10" style="background-image: url('{{ $images['industrial'] }}')"></div>
    <div class="relative z-10 max-w-7xl mx-auto px-6 text-center">
        <x-lm.section-label light>Ready to Start?</x-lm.section-label>
        <h2 class="font-display font-bold text-white mb-4 text-display">Need Reliable Engineering Support?</h2>
        <p class="text-white/60 max-w-xl mx-auto mb-8 leading-relaxed font-body">Whether supporting preventive maintenance, emergency breakdowns or complex engineering projects, LM Workshop helps your business operate with confidence.</p>
        <x-lm.gold-btn :href="route('contact')">Contact Us</x-lm.gold-btn>
    </div>
</section>
@endsection
