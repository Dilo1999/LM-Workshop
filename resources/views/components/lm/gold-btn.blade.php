@props(['href' => '#'])

<a href="{{ $href }}" {{ $attributes->merge(['class' => 'inline-flex items-center gap-2 px-7 py-3 font-heading font-bold uppercase tracking-[0.12em] text-sm bg-gold text-white transition-all hover:brightness-110']) }}>
    {{ $slot }}
    <x-lm.icon name="arrow-right" :size="14" />
</a>
