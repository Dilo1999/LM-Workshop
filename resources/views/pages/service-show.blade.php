@extends('layouts.app')

@section('content')
@php
    $images = config('lm-workshop.images');
    $heroImg = $images[$service['hero']] ?? $images['servicesHero'];
    $heroUrl = str_starts_with($heroImg, 'http') ? $heroImg : asset($heroImg);
@endphp

<x-lm.section-hero
    :label="$service['title']"
    :title="$service['title']"
    :body="$service['summary']"
    :img="$heroUrl"
/>

{{-- Capabilities --}}
<section class="bg-white py-24">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-start">
            <div>
                <x-lm.section-label>Capabilities</x-lm.section-label>
                <h2 class="font-display font-bold mb-6 leading-tight text-display text-navy">What We Deliver</h2>
                <p class="text-gray-500 leading-relaxed font-body">{{ $service['desc'] }}</p>
            </div>
            <ul class="grid sm:grid-cols-2 gap-3">
                @foreach($service['capabilities'] as $item)
                    <li class="flex items-start gap-3 p-4 border border-navy/8 bg-[#f7f9fc]">
                        <x-lm.icon name="check-square" :size="16" class="text-gold shrink-0 mt-0.5" />
                        <span class="text-sm text-gray-600 font-body leading-snug">{{ $item }}</span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</section>

{{-- Equipment --}}
<section class="py-24 bg-cream">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-12">
            <x-lm.section-label>Equipment</x-lm.section-label>
            <h2 class="font-display font-bold text-display text-navy">Equipment We Handle</h2>
        </div>
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($service['equipment'] as $item)
                <div class="flex items-start gap-3 p-5 bg-white border-l-4 border-gold">
                    <x-lm.icon name="settings" :size="16" class="text-gold shrink-0 mt-0.5" />
                    <p class="text-sm text-gray-600 font-body leading-snug">{{ $item }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Past Projects --}}
<section class="bg-white py-24">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-12">
            <x-lm.section-label>Track Record</x-lm.section-label>
            <h2 class="font-display font-bold text-display text-navy">Representative Projects</h2>
            <p class="text-gray-500 max-w-2xl mx-auto mt-4 font-body">Examples of the type of work LM Workshop delivers for clients across the Maldives.</p>
        </div>
        <div class="grid md:grid-cols-3 gap-6">
            @foreach($service['projects'] as $project)
                <div class="p-6 border border-navy/8 border-t-4 border-t-gold bg-[#f7f9fc]">
                    <h3 class="font-heading font-bold text-navy mb-3 leading-snug">{{ $project['title'] }}</h3>
                    <p class="text-gray-500 text-sm leading-relaxed font-body">{{ $project['detail'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Dedicated enquiry CTA --}}
<section class="relative py-24 overflow-hidden bg-navy">
    <div class="absolute inset-0 bg-cover bg-center opacity-15" style="background-image: url('{{ $heroUrl }}')"></div>
    <div class="absolute left-0 top-0 bottom-0 w-1 bg-gold"></div>
    <div class="relative z-10 max-w-7xl mx-auto px-6 text-center">
        <x-lm.section-label light>Enquire About {{ $service['title'] }}</x-lm.section-label>
        <h2 class="font-display font-bold text-white mb-4 text-display">Request Support for Your Equipment</h2>
        <p class="text-white/65 max-w-2xl mx-auto mb-8 leading-relaxed font-body">Tell us about your site, equipment and urgency. Our team will respond with practical engineering support tailored to your requirement.</p>
        <div class="flex flex-col sm:flex-row flex-wrap justify-center gap-3">
            <x-lm.gold-btn :href="$enquiryUrl">Request a Quote</x-lm.gold-btn>
            <a href="{{ $cta['emergency'] }}" class="inline-flex items-center justify-center gap-2 px-7 py-3 font-heading font-bold uppercase tracking-[0.12em] text-sm border border-white/25 text-white transition-all hover:bg-white/10 w-full sm:w-auto">
                Emergency Support
            </a>
            <a href="{{ $cta['whatsapp'] }}" class="inline-flex items-center justify-center gap-2 px-7 py-3 font-heading font-bold uppercase tracking-[0.12em] text-sm border border-gold-light text-gold-light transition-all hover:bg-white/10 w-full sm:w-auto" @if(str_starts_with($cta['whatsapp'], 'https://wa.me')) target="_blank" rel="noopener noreferrer" @endif>
                WhatsApp an Engineer
            </a>
        </div>
        <p class="text-white/40 text-xs mt-6 font-body">
            <a href="{{ route('services') }}" class="hover:text-gold-light transition-colors">&larr; View all services</a>
        </p>
    </div>
</section>
@endsection
