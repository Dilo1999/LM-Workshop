@props(['label', 'title', 'subtitle' => null, 'body' => null, 'img'])

@php
    $bgImage = str_starts_with($img, 'http') ? $img : asset($img);
@endphp

<section class="section-hero" style="--section-hero-bg-image: url('{{ $bgImage }}')">
    <div class="section-hero-container">
        <div class="section-hero-content">
            <div class="section-eyebrow">{{ $label }}</div>

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
