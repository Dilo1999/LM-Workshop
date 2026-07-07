@extends('layouts.app')

@section('content')
@php
    $images = config('lm-workshop.images');
    $gallery = config('lm-workshop.capability_gallery');
@endphp

<x-lm.section-hero
    title="Proven Capability Across Critical Engineering Services"
    :img="$images['capabilityHero']"
/>

<section class="bg-white py-20">
    <div class="max-w-7xl mx-auto px-6">
        <div class="max-w-3xl">
            <p class="text-gray-500 mb-4 leading-relaxed font-body">Our experience extends across a diverse range of engineering environments throughout the Maldives.</p>
            <p class="text-gray-500 mb-4 leading-relaxed font-body">From maintaining marine propulsion systems and powerhouse generators to fabricating structural components and supporting mechanical infrastructure, LM Workshop has developed practical engineering capability through hands-on experience across multiple industries.</p>
            <p class="text-gray-500 leading-relaxed font-body">Every project strengthens our understanding of the operational challenges our clients face, enabling us to deliver engineering solutions that are practical, reliable and built around real working conditions.</p>
        </div>
    </div>
</section>

<section class="py-24 bg-cream">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3">
            @foreach($gallery as $item)
                <div class="group gallery-item relative overflow-hidden h-52 cursor-default">
                    <img src="{{ $images[$item['img']] }}" alt="{{ $item['label'] }}" class="absolute inset-0 w-full h-full object-cover transition-transform duration-500">
                    <div class="gallery-overlay absolute inset-0 opacity-0 transition-opacity duration-300 bg-navy-deep/88"></div>
                    <div class="gallery-caption absolute inset-0 flex flex-col justify-end p-4 opacity-0 transition-opacity duration-300">
                        <p class="text-white font-heading font-bold text-sm">{{ $item['label'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
        <p class="text-center mt-6 text-gray-500 text-sm font-body">Practical engineering experience across the Maldives.</p>
    </div>
</section>
@endsection
