@extends('layouts.app')

@section('content')
@php
    $images = config('lm-workshop.images');
    $reasons = config('lm-workshop.why');
@endphp

<x-lm.section-hero
    title="Why Businesses Choose LM Workshop"
    body="Choosing an engineering partner is about more than technical capability. It is about working with a team that understands your operational priorities, responds when support is needed and consistently delivers quality workmanship."
    :img="$images['whyHero']"
/>

<section class="bg-white py-24">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($reasons as $item)
                <div class="p-8 border border-navy/10 border-l-[3px] border-l-gold">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 flex items-center justify-center shrink-0 bg-cream">
                            <x-lm.icon :name="$item['icon']" :size="20" class="text-gold" />
                        </div>
                        <h3 class="font-heading font-bold text-lg text-navy">{{ $item['title'] }}</h3>
                    </div>
                    <p class="text-gray-500 text-sm leading-relaxed font-body">{{ $item['body'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
