@props(['label' => null, 'title', 'subtitle' => null, 'body' => null, 'img'])

@php
    $bgImage = str_starts_with($img, 'http') ? $img : asset($img);
@endphp

<section class="section-hero" style="--section-hero-bg-image: url('{{ $bgImage }}')">
    <div class="section-hero-container relative z-[5] max-w-7xl mx-auto px-6 w-full">
        <div class="section-hero-content">
            @if($label)
                <div class="section-eyebrow">{{ $label }}</div>
            @endif

            <h1 class="section-hero-title">{!! $title !!}</h1>

            @if($subtitle)
                <div class="section-hero-subtitle">{{ $subtitle }}</div>
            @endif

            @if($body)
                <p class="section-hero-body">{{ $body }}</p>
            @endif
        </div>
    </div>

    <div class="section-gold-line"></div>
    <div class="section-gold-dot"></div>
    <div class="section-bottom-border"></div>
</section>
