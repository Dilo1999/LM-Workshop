@extends('layouts.app')

@section('content')
@php
    $images = config('lm-workshop.images');
    $gallery = [
        ['Marine Engines', 'marine', 'Propulsion system servicing and overhaul.'],
        ['Generator Servicing', 'powerPlant', 'Powerhouse maintenance and repair.'],
        ['Fabrication Workshop', 'weldingSparks', 'Steel and aluminium fabrication works.'],
        ['Welding', 'welding', 'Structural welding and metal joining.'],
        ['Heavy Equipment', 'excavator', 'Construction machinery maintenance.'],
        ['Industrial Systems', 'valves', 'Pump and valve system installations.'],
        ['Engineers On-Site', 'workerGears', 'Experienced teams across the Maldives.'],
        ['Electrical & Mechanical', 'machine', 'Control systems and electrical infrastructure.'],
    ];
    $disciplines = [
        ['01', 'Marine Engineering', 'Vessel diagnostics, engine overhauls, propulsion systems and marine infrastructure maintenance.'],
        ['02', 'Power Generation', 'Generator commissioning, maintenance, synchronisation and powerhouse system management.'],
        ['03', 'Mechanical Systems', 'Pumps, compressors, HVAC, hydraulics and rotating machinery across industrial and commercial environments.'],
        ['04', 'Electrical Infrastructure', 'Panel builds, cable systems, control systems, automation and electrical safety compliance.'],
        ['05', 'Structural Fabrication', 'Custom steel, stainless and aluminium fabrication, structural repairs and specialist metalwork.'],
        ['06', 'Heavy Equipment', 'Construction machinery, industrial diesel engines and hydraulic system maintenance and repair.'],
    ];
@endphp

<x-lm.page-hero
    label="Our Track Record"
    title="Proven Capability Across Critical Engineering Services"
    :img="$images['weldingAdrian']"
/>

<section class="bg-white py-20">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid lg:grid-cols-2 gap-14 items-center">
            <div>
                <x-lm.section-label>Experience That Counts</x-lm.section-label>
                <h2 class="font-display font-bold mb-6 leading-tight text-display-md text-navy">Built Through Hands-On Engineering Experience</h2>
                <p class="text-gray-500 mb-4 leading-relaxed font-body">Our experience extends across a diverse range of engineering environments throughout the Maldives. From maintaining marine propulsion systems and powerhouse generators to fabricating structural components and supporting mechanical infrastructure.</p>
                <p class="text-gray-500 leading-relaxed font-body">Every project strengthens our understanding of the operational challenges our clients face, enabling us to deliver engineering solutions that are practical, reliable and built around real working conditions.</p>
            </div>
            <div class="grid grid-cols-3 gap-3">
                @foreach([['10+', 'Years Active'], ['6', 'Disciplines'], ['200+', 'Projects'], ['24/7', 'Response'], ['Multi-Island', 'Coverage'], ['One Partner', 'All Services']] as [$n, $l])
                    <div class="p-5 text-center border border-navy/10">
                        <div class="font-display font-bold text-xl mb-1 text-gold">{{ $n }}</div>
                        <div class="text-xs text-gray-500 uppercase tracking-widest font-heading">{{ $l }}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<section class="py-20 bg-cream">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-12">
            <x-lm.section-label>Disciplines</x-lm.section-label>
            <h2 class="font-display font-bold text-display text-navy">Engineering Disciplines</h2>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5">
            @foreach($disciplines as [$num, $label, $detail])
                <div class="bg-white p-6 border-t-4 border-gold hover:shadow-lg transition-shadow">
                    <div class="text-4xl font-display font-bold mb-3 text-navy/8">{{ $num }}</div>
                    <h3 class="font-heading font-bold text-base mb-2 text-navy">{{ $label }}</h3>
                    <p class="text-gray-500 text-sm leading-relaxed font-body">{{ $detail }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-12">
            <x-lm.section-label>Project Gallery</x-lm.section-label>
            <h2 class="font-display font-bold mb-2 text-display text-navy">Work From the Field</h2>
            <p class="text-gray-500 text-sm font-body">Practical engineering experience across the Maldives.</p>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3">
            @foreach($gallery as [$title, $imgKey, $desc])
                <div class="group gallery-item relative overflow-hidden h-52 cursor-default">
                    <img src="{{ $images[$imgKey] }}" alt="{{ $title }}" class="absolute inset-0 w-full h-full object-cover transition-transform duration-500">
                    <div class="gallery-overlay absolute inset-0 opacity-0 transition-opacity duration-300 bg-navy-deep/88"></div>
                    <div class="gallery-caption absolute inset-0 flex flex-col justify-end p-4 opacity-0 transition-opacity duration-300">
                        <p class="text-white font-heading font-bold text-sm">{{ $title }}</p>
                        <p class="text-white/65 text-xs font-body">{{ $desc }}</p>
                    </div>
                </div>
            @endforeach
        </div>
        <p class="text-center mt-6 text-gray-400 text-sm italic font-body">Practical engineering experience across the Maldives.</p>
    </div>
</section>

<section class="relative py-20 bg-navy">
    <div class="absolute left-0 top-0 bottom-0 w-1 bg-gold"></div>
    <div class="relative z-10 max-w-7xl mx-auto px-6 text-center">
        <x-lm.section-label light>Work With Us</x-lm.section-label>
        <h2 class="font-display font-bold text-white mb-4 text-display">Let Our Capability Work for You</h2>
        <p class="text-white/60 max-w-lg mx-auto mb-8 leading-relaxed font-body">Contact LM Workshop to discuss your engineering requirements and how our proven capability can support your operations.</p>
        <x-lm.gold-btn :href="route('contact')">Discuss Your Project</x-lm.gold-btn>
    </div>
</section>
@endsection
