@extends('layouts.app')

@section('content')
@php
    $images = config('lm-workshop.images');
    $services = config('lm-workshop.services');
@endphp

<x-lm.section-hero
    title="Engineering Solutions"
    body="LM Workshop delivers comprehensive engineering services across multiple technical disciplines, enabling clients to work with one trusted engineering partner."
    :img="$images['servicesHero']"
/>

<section class="bg-white py-24">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-5">
            @foreach($services as $service)
                <x-lm.service-card :icon="$service['icon']" :title="$service['title']" :desc="$service['desc']" />
            @endforeach
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
