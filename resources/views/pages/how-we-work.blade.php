@extends('layouts.app')

@section('content')
@php
    $images = config('lm-workshop.images');
    $steps = config('lm-workshop.process');
@endphp

<x-lm.section-hero
    title="How LM Workshop Works"
    body="LM Workshop follows a structured engineering process to manage every project professionally from initial enquiry through to completion."
    :img="$images['howWeWorkHero']"
/>

<section class="hw-process-section">

    <div class="hw-process-container max-w-7xl mx-auto px-6">
        <div class="hw-timeline">
            <div class="hw-timeline-line" aria-hidden="true"></div>

            @foreach($steps as $i => $step)
                @php
                    $num = str_pad($i + 1, 2, '0', STR_PAD_LEFT);
                    $isLeft = $i % 2 === 0;
                @endphp

                <div class="hw-timeline-row step-row-{{ $i + 1 }}">
                    <div class="hw-timeline-col hw-timeline-col--left">
                        @if($isLeft)
                            <div class="hw-step-card left">
                                <div class="hw-card-icon">
                                    <x-lm.icon :name="$step['icon']" :size="28" class="text-navy" />
                                </div>
                                <div class="hw-card-content">
                                    <h3>{{ $step['title'] }}</h3>
                                    <p>{{ $step['body'] }}</p>
                                </div>
                            </div>
                        @endif
                    </div>

                    <div class="hw-timeline-col hw-timeline-col--center">
                        <div class="hw-step-number {{ $isLeft ? 'right-link' : 'left-link' }}">
                            {{ $num }}<span class="dot" aria-hidden="true"></span>
                        </div>
                    </div>

                    <div class="hw-timeline-col hw-timeline-col--right">
                        @unless($isLeft)
                            <div class="hw-step-card right">
                                <div class="hw-card-content">
                                    <h3>{{ $step['title'] }}</h3>
                                    <p>{{ $step['body'] }}</p>
                                </div>
                                <div class="hw-card-icon">
                                    <x-lm.icon :name="$step['icon']" :size="28" class="text-navy" />
                                </div>
                            </div>
                        @endunless
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="hw-process-footer-strip" aria-hidden="true"></div>
    <p class="hw-process-footer-text">Engineered Solutions. <span>Built to Last.</span></p>
</section>
@endsection
