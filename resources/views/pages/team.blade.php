@extends('layouts.app')

@section('content')
@php
    $images = config('lm-workshop.images');
    $team = config('lm-workshop.team');
    $teamValues = config('lm-workshop.team_values');
@endphp

<x-lm.section-hero
    label="Our People"
    title="Meet Our Engineering Team"
    body="Behind every successful engineering project is a team committed to reliability, safety and practical problem solving."
    :img="$images['teamHero']"
/>

<section class="bg-white py-20">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid lg:grid-cols-2 gap-14 items-center">
            <div>
                <x-lm.section-label>Our Engineers</x-lm.section-label>
                <h2 class="font-display font-bold mb-6 leading-tight text-display-md text-navy">Expertise You Can Count On</h2>
                <p class="text-gray-500 mb-4 leading-relaxed font-body">LM Workshop's engineering team brings together decades of experience across marine engineering, mechanical systems, electrical infrastructure, fabrication, diesel engines and industrial maintenance.</p>
                <p class="text-gray-500 mb-8 leading-relaxed font-body">Their combined expertise enables us to deliver dependable engineering support across a broad range of industries while maintaining the high standards our clients expect.</p>
                <div class="flex flex-wrap gap-6 sm:gap-8 team-stats">
                    @foreach([['60+', 'Combined Years'], ['6+', 'Disciplines'], ['100%', 'Professional']] as [$n, $l])
                        <div>
                            <div class="text-2xl font-display font-bold text-gold">{{ $n }}</div>
                            <div class="text-xs text-gray-500 uppercase tracking-widest font-heading">{{ $l }}</div>
                        </div>
                    @endforeach
                </div>
            </div>
            <img src="{{ $images['engineer'] }}" alt="LM Workshop engineering team" class="w-full h-64 sm:h-80 lg:h-[400px] object-cover">
        </div>
    </div>
</section>

<section class="py-20 bg-cream">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-12">
            <x-lm.section-label>The Team</x-lm.section-label>
            <h2 class="font-display font-bold text-display text-navy">Engineering Professionals</h2>
        </div>
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($team as $member)
                <div class="team-card bg-white group overflow-hidden hover:shadow-xl transition-shadow duration-300">
                    <div class="relative h-56 overflow-hidden">
                        <img src="{{ $images[$member['img']] }}" alt="{{ $member['name'] }}" class="w-full h-full object-cover grayscale-[20%] transition-transform duration-500 group-hover:scale-105">
                        <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-300 bg-navy-deep/40"></div>
                        <div class="team-bar absolute bottom-0 left-0 right-0 h-1 bg-gold origin-left scale-x-0 transition-transform duration-300 group-hover:scale-x-100"></div>
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

<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-12">
            <x-lm.section-label>Team Values</x-lm.section-label>
            <h2 class="font-display font-bold text-display text-navy">What Drives Our Team</h2>
        </div>
        <div class="grid md:grid-cols-3 gap-6">
            @foreach($teamValues as $value)
                <div class="p-8 border border-navy/10 border-t-[3px] border-t-gold">
                    <h3 class="font-heading font-bold text-lg mb-3 text-navy">{{ $value['heading'] }}</h3>
                    <p class="text-gray-500 text-sm leading-relaxed font-body">{{ $value['body'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>


@endsection
