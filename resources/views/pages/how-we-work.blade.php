@extends('layouts.app')

@section('content')
@php
    $images = config('lm-workshop.images');
    $steps = [
        ['message-circle', '01', 'Consultation', 'Understanding your operational requirements.', 'We begin with a thorough discussion of your engineering challenges, equipment status, operational priorities and project objectives. This ensures our approach is aligned with your actual requirements from the outset.'],
        ['search', '02', 'Site Assessment', 'Inspecting equipment, identifying issues and evaluating project requirements.', 'Our engineers conduct a detailed inspection of your equipment or systems to assess current condition, identify root causes and evaluate the full scope of work required.'],
        ['file-text', '03', 'Engineering Proposal', 'Providing a clear scope of work, recommendations, timelines and commercial proposal.', 'We provide a written proposal that defines the scope of work, recommended approach, required materials, project timeline and commercial terms — so you can make an informed decision before work begins.'],
        ['wrench', '04', 'Execution', 'Delivering engineering services using experienced personnel, appropriate equipment and professional workmanship.', 'Our experienced engineers carry out the agreed scope of work efficiently, safely and to professional engineering standards. We keep you informed throughout the project.'],
        ['check-square', '05', 'Testing & Handover', 'Verifying performance, ensuring quality and completing project handover.', 'Before we close a project, we verify that all systems perform as required, conduct final quality checks and complete a formal handover — including any relevant documentation or recommendations.'],
        ['heart-handshake', '06', 'Ongoing Support', 'Providing continued technical assistance, maintenance and long-term engineering partnership.', "Our relationship doesn't end at project completion. We provide ongoing technical support, preventive maintenance planning and long-term engineering partnership to keep your operations running reliably."],
    ];
@endphp

<x-lm.page-hero
    label="Our Process"
    title="How We Work"
    body="A structured engineering process ensures every project is managed professionally from initial enquiry through to completion."
    :img="$images['weldingSparks']"
/>

<section class="bg-white py-24">
    <div class="max-w-5xl mx-auto px-6">
        <div class="text-center mb-16">
            <x-lm.section-label>Step by Step</x-lm.section-label>
            <h2 class="font-display font-bold text-display text-navy">A Structured Engineering Process</h2>
        </div>

        <div class="flex flex-col gap-0">
            @foreach($steps as $i => [$icon, $num, $title, $body, $detail])
                <div class="relative grid md:grid-cols-[1fr_60px_1fr] gap-0 items-start">
                    @if($i % 2 === 0)
                        <div class="md:text-right p-6 md:pr-10">
                            <div class="inline-flex items-center gap-2 mb-3">
                                <div class="w-8 h-8 flex items-center justify-center bg-cream">
                                    <x-lm.icon :name="$icon" :size="16" class="text-gold" />
                                </div>
                            </div>
                            <h3 class="font-heading font-bold text-xl mb-2 text-navy">{{ $title }}</h3>
                            <p class="text-gray-600 text-sm font-medium mb-2 font-body">{{ $body }}</p>
                            <p class="text-gray-400 text-sm leading-relaxed font-body">{{ $detail }}</p>
                        </div>
                    @else
                        <div class="hidden md:block"></div>
                    @endif

                    <div class="hidden md:flex flex-col items-center">
                        <div class="w-14 h-14 rounded-full flex items-center justify-center font-display font-bold text-lg shrink-0 z-10 bg-navy text-gold border-[3px] border-gold">{{ $num }}</div>
                        @if($i < count($steps) - 1)
                            <div class="w-0.5 flex-1 min-h-[80px]" style="background: linear-gradient(to bottom, rgba(201,168,76,0.53), rgba(11,31,63,0.1))"></div>
                        @endif
                    </div>

                    @if($i % 2 === 1)
                        <div class="p-6 md:pl-10">
                            <div class="flex items-center gap-2 mb-3">
                                <div class="w-8 h-8 flex items-center justify-center bg-cream">
                                    <x-lm.icon :name="$icon" :size="16" class="text-gold" />
                                </div>
                                <span class="md:hidden font-display font-bold text-2xl text-gold">{{ $num }}</span>
                            </div>
                            <h3 class="font-heading font-bold text-xl mb-2 text-navy">{{ $title }}</h3>
                            <p class="text-gray-600 text-sm font-medium mb-2 font-body">{{ $body }}</p>
                            <p class="text-gray-400 text-sm leading-relaxed font-body">{{ $detail }}</p>
                        </div>
                    @else
                        <div class="md:hidden p-6">
                            <div class="flex items-center gap-2 mb-3">
                                <span class="font-display font-bold text-2xl text-gold">{{ $num }}</span>
                            </div>
                            <h3 class="font-heading font-bold text-xl mb-2 text-navy">{{ $title }}</h3>
                            <p class="text-gray-600 text-sm font-medium mb-2 font-body">{{ $body }}</p>
                            <p class="text-gray-400 text-sm leading-relaxed font-body">{{ $detail }}</p>
                        </div>
                        <div class="hidden md:block"></div>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="py-20 bg-cream">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid lg:grid-cols-2 gap-14 items-center">
            <img src="{{ $images['workerClimb'] }}" alt="LM Workshop engineer on site" class="w-full h-[440px] object-cover">
            <div>
                <x-lm.section-label>Why It Matters</x-lm.section-label>
                <h2 class="font-display font-bold mb-6 leading-tight text-display-md text-navy">A Structured Process Delivers Better Outcomes</h2>
                <p class="text-gray-500 mb-4 leading-relaxed font-body">Engineering projects fail when expectations are unclear, communication breaks down or workmanship is not held to consistent standards. Our structured process is designed to eliminate those failure points.</p>
                <p class="text-gray-500 mb-8 leading-relaxed font-body">From the initial consultation to ongoing support, every step is structured to ensure clarity, accountability and quality — giving you confidence that your engineering project will be delivered professionally and to a standard that lasts.</p>
                <x-lm.gold-btn :href="route('contact')">Start a Conversation</x-lm.gold-btn>
            </div>
        </div>
    </div>
</section>
@endsection
