@extends('layouts.app')

@section('content')
@php
    $images = config('lm-workshop.images');
    $reasons = config('lm-workshop.why');
    $promiseItems = config('lm-workshop.why_promise');
@endphp

<x-lm.section-hero
    label="Our Difference"
    title="Why Businesses Choose LM Workshop"
    body="Choosing an engineering partner is about more than technical capability. It is about working with a team that understands your operational priorities, responds when support is needed and consistently delivers quality workmanship."
    :img="$images['whyHero']"
/>

<section class="bg-white py-24">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-14">
            <x-lm.section-label>Six Reasons</x-lm.section-label>
            <h2 class="font-display font-bold text-display text-navy">What Sets Us Apart</h2>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($reasons as $item)
                <div class="group p-8 border border-navy/10 border-l-[3px] border-l-gold transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 flex items-center justify-center shrink-0 bg-cream">
                            <x-lm.icon :name="$item['icon']" :size="20" class="text-gold" />
                        </div>
                        <h3 class="font-heading font-bold text-lg text-navy">{{ $item['title'] }}</h3>
                    </div>
                    <p class="text-gray-500 text-sm leading-relaxed mb-3 font-body">{{ $item['body'] }}</p>
                    <p class="text-gray-400 text-xs leading-relaxed font-body">{{ $item['detail'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="relative py-24 overflow-hidden bg-navy">
    <div class="absolute inset-0 bg-cover bg-center opacity-10" style="background-image: url('{{ $images['workerGears'] }}')"></div>
    <div class="absolute left-0 top-0 bottom-0 w-1 bg-gold"></div>
    <div class="relative z-10 max-w-7xl mx-auto px-6">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div>
                <x-lm.section-label light>Our Promise</x-lm.section-label>
                <h2 class="font-display font-bold text-white mb-6 leading-tight text-display-md">Accountability Across Every Project</h2>
                <p class="text-white/65 mb-6 leading-relaxed font-body">When you partner with LM Workshop, you gain more than an engineering contractor. You gain a team that is accountable for outcomes, not just activity.</p>
                <p class="text-white/65 leading-relaxed font-body">We track performance against agreed scopes, communicate clearly when challenges arise and focus on practical solutions rather than excuses.</p>
            </div>
            <div class="flex flex-col gap-4">
                @foreach($promiseItems as $item)
                    <div class="flex items-start gap-3 p-4 border border-white/10">
                        <x-lm.icon name="check-circle" :size="16" class="text-gold-light shrink-0 mt-0.5" />
                        <span class="text-white/75 text-sm font-body">{{ $item }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-6 text-center">
        <x-lm.section-label>Start a Conversation</x-lm.section-label>
        <h2 class="font-display font-bold mb-4 text-display-md text-navy">Experience the Difference</h2>
        <p class="text-gray-500 max-w-lg mx-auto mb-8 leading-relaxed font-body">Contact LM Workshop to discuss your engineering requirements and discover how we can support your operations.</p>
        <x-lm.gold-btn :href="route('contact')">Get in Touch</x-lm.gold-btn>
    </div>
</section>
@endsection
