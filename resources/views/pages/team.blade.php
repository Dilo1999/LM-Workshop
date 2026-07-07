@extends('layouts.app')

@section('content')
@php
    $images = config('lm-workshop.images');
    $team = config('lm-workshop.team');
@endphp

<x-lm.section-hero
    title="Meet Our Engineering Team"
    body="Behind every successful engineering project is a team committed to reliability, safety and practical problem solving."
    :img="$images['teamHero']"
/>

<section class="bg-white py-20">
    <div class="max-w-3xl mx-auto px-6">
        <p class="text-gray-500 mb-4 leading-relaxed font-body">LM Workshop's engineering team brings together decades of experience across marine engineering, mechanical systems, electrical infrastructure, fabrication, diesel engines and industrial maintenance.</p>
        <p class="text-gray-500 leading-relaxed font-body">Their combined expertise enables us to deliver dependable engineering support across a broad range of industries while maintaining the high standards our clients expect.</p>
    </div>
</section>

<section class="py-20 bg-cream">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($team as $member)
                <div class="team-card bg-white group overflow-hidden">
                    <div class="relative h-56 overflow-hidden bg-cream flex items-center justify-center">
                        <img src="{{ $images[$member['img']] }}" alt="Professional portraits" class="w-full h-full object-cover grayscale-[20%] transition-transform duration-500 group-hover:scale-105">
                        <div class="absolute inset-0 flex items-center justify-center bg-navy/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <span class="text-white text-sm font-heading font-bold uppercase tracking-widest">Professional portraits</span>
                        </div>
                    </div>
                    <div class="p-6 border-l-4 border-gold">
                        <h3 class="font-heading font-bold text-lg mb-1 text-navy">{{ $member['name'] }}</h3>
                        <p class="text-xs font-heading font-bold uppercase tracking-widest mb-2 text-gold">{{ $member['role'] }}</p>
                        <div class="flex items-center gap-2 mb-1">
                            <div class="w-1 h-1 rounded-full bg-gold"></div>
                            <p class="text-gray-500 text-xs font-body">{{ $member['years'] }}</p>
                        </div>
                        <div class="flex items-center gap-2">
                            <div class="w-1 h-1 rounded-full bg-gold"></div>
                            <p class="text-gray-500 text-xs font-body">{{ $member['spec'] }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
