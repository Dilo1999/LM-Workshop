@props(['light' => false])

<div {{ $attributes->merge(['class' => 'flex items-center gap-3 mb-4']) }}>
    <div class="w-8 h-0.5 bg-gold"></div>
    <span class="text-xs font-bold uppercase tracking-[0.2em] font-heading {{ $light ? 'text-gold-light' : 'text-gold' }}">
        {{ $slot }}
    </span>
</div>
