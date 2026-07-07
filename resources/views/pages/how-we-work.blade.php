@extends('layouts.app')

@section('content')
@php
    $images = config('lm-workshop.images');
    $steps = config('lm-workshop.process');
@endphp

<x-lm.section-hero
    title="How We Work"
    body="A structured engineering process ensures every project is managed professionally from initial enquiry through to completion."
    :img="$images['howWeWorkHero']"
/>

<section class="bg-white py-24">
    <div class="max-w-5xl mx-auto px-6">
        <div class="flex flex-col gap-0">
            @foreach($steps as $i => $step)
                <div class="relative grid md:grid-cols-[1fr_60px_1fr] gap-0 items-start">
                    @if($i % 2 === 0)
                        <div class="md:text-right p-6 md:pr-10">
                            <div class="inline-flex items-center gap-2 mb-3">
                                <div class="w-8 h-8 flex items-center justify-center bg-cream">
                                    <x-lm.icon :name="$step['icon']" :size="16" class="text-gold" />
                                </div>
                            </div>
                            <h3 class="font-heading font-bold text-xl mb-2 text-navy">{{ $step['title'] }}</h3>
                            <p class="text-gray-600 text-sm font-medium font-body">{{ $step['body'] }}</p>
                        </div>
                    @else
                        <div class="hidden md:block"></div>
                    @endif

                    <div class="hidden md:flex flex-col items-center">
                        <div class="w-14 h-14 rounded-full flex items-center justify-center font-display font-bold text-lg shrink-0 z-10 bg-navy text-gold-light border-[3px] border-gold">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</div>
                        @if($i < count($steps) - 1)
                            <div class="w-0.5 flex-1 min-h-[80px]" style="background: linear-gradient(to bottom, rgba(10, 53, 69, 0.53), rgba(11,31,63,0.1))"></div>
                        @endif
                    </div>

                    @if($i % 2 === 1)
                        <div class="p-6 md:pl-10">
                            <div class="flex items-center gap-2 mb-3">
                                <div class="w-8 h-8 flex items-center justify-center bg-cream">
                                    <x-lm.icon :name="$step['icon']" :size="16" class="text-gold" />
                                </div>
                                <span class="md:hidden font-display font-bold text-2xl text-gold-light">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</span>
                            </div>
                            <h3 class="font-heading font-bold text-xl mb-2 text-navy">{{ $step['title'] }}</h3>
                            <p class="text-gray-600 text-sm font-medium font-body">{{ $step['body'] }}</p>
                        </div>
                    @else
                        <div class="md:hidden p-6">
                            <div class="flex items-center gap-2 mb-3">
                                <span class="font-display font-bold text-2xl text-gold-light">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</span>
                            </div>
                            <h3 class="font-heading font-bold text-xl mb-2 text-navy">{{ $step['title'] }}</h3>
                            <p class="text-gray-600 text-sm font-medium font-body">{{ $step['body'] }}</p>
                        </div>
                        <div class="hidden md:block"></div>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
