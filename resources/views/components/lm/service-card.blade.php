@props(['icon', 'title', 'desc', 'href' => null])

@php
    $tag = $href ? 'a' : 'div';
@endphp

<{{ $tag }}
    @if($href) href="{{ $href }}" @endif
    class="group service-card p-8 border block transition-shadow duration-300 {{ $href ? 'hover:shadow-lg' : '' }}"
>
    <div class="w-12 h-12 flex items-center justify-center mb-5 bg-cream transition-transform duration-300 group-hover:scale-110">
        <x-lm.icon :name="$icon" :size="22" class="text-gold" />
    </div>
    <h3 class="font-heading font-bold mb-3 text-lg text-navy">{{ $title }}</h3>
    <p class="text-gray-500 text-sm leading-relaxed font-body mb-4">{{ $desc }}</p>
    @if($href)
        <span class="inline-flex items-center gap-1.5 text-xs font-heading font-bold uppercase tracking-widest text-gold transition-colors group-hover:text-navy">
            View Service
            <x-lm.icon name="arrow-right" :size="12" />
        </span>
    @endif
</{{ $tag }}>
