@extends('layouts.app')

@section('content')
@php
    $brand = config('lm-workshop.brand');
    $contactLabels = config('lm-workshop.contact_labels');
@endphp

<x-lm.section-hero
    title="Let's Talk"
    body="Whether you require emergency engineering support, preventive maintenance or technical expertise for your next project, our team is ready to assist."
    :img="config('lm-workshop.images.weldingAdrian')"
/>

<section class="bg-white py-24">
    <div class="max-w-3xl mx-auto px-6">
        <div class="p-10 bg-navy text-center">
            <div class="w-12 h-12 flex items-center justify-center font-heading font-bold text-base mx-auto mb-4 bg-gold text-navy-deep">LM</div>
            <h3 class="font-display font-bold text-white text-2xl mb-1 tracking-[0.06em]">LM Workshop</h3>
            <p class="text-xs uppercase tracking-widest mb-4 text-gold font-heading">{{ $brand['tagline'] }}</p>
            <p class="text-white/55 text-sm leading-relaxed font-body mb-10">{{ $brand['description'] }}</p>

            <div class="flex flex-col gap-4 mb-10 text-left max-w-xs mx-auto">
                @foreach($contactLabels as $label)
                    <div class="flex items-center gap-3">
                        <span class="text-xs font-heading font-bold uppercase tracking-widest text-gold w-24 shrink-0">{{ $label }}</span>
                    </div>
                @endforeach
            </div>

            <div class="w-24 h-24 mx-auto border-2 border-gold/30 bg-white flex items-center justify-center">
                <div class="grid grid-cols-3 gap-0.5 p-2">
                    @foreach([0,1,2,3,4,5,6,7,8] as $i)
                        <div class="w-2 h-2 rounded-sm {{ in_array($i, [0,2,6,8]) ? 'bg-navy' : 'bg-gold' }}"></div>
                    @endforeach
                </div>
            </div>
            <p class="text-white/35 text-xs mt-2 font-body">QR Code</p>
        </div>
    </div>
</section>
@endsection
