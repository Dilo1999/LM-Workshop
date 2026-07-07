@extends('layouts.app')

@section('content')
@php
    $images = config('lm-workshop.images');
    $industries = config('lm-workshop.industries');
@endphp

<x-lm.section-hero
    title="Industries We Support"
    body="Every industry operates differently, but they all depend on reliable engineering. LM Workshop provides tailored engineering support across a wide range of sectors throughout the Maldives."
    :img="$images['industriesHero']"
/>

<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-6">
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
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
