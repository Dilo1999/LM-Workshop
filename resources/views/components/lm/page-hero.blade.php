@props(['label', 'title', 'subtitle' => null, 'body' => null, 'img'])

<section class="relative flex items-end overflow-hidden min-h-[420px] bg-navy-deep">
    <div class="absolute inset-0 bg-cover bg-center brightness-[0.25]" style="background-image: url('{{ $img }}')"></div>
    <div class="absolute inset-0" style="background: linear-gradient(to right, rgba(7,21,41,0.95) 40%, rgba(7,21,41,0.53) 100%)"></div>
    <div class="absolute left-0 top-0 bottom-0 w-1 bg-gold"></div>
    <div class="relative z-10 max-w-7xl mx-auto px-6 py-16 w-full pt-28">
        <x-lm.section-label light>{{ $label }}</x-lm.section-label>
        <h1 class="font-display font-bold text-white leading-tight mb-3 text-display-sm tracking-tight">{{ $title }}</h1>
        @if($subtitle)
            <p class="font-heading font-semibold uppercase tracking-widest mb-3 text-sm text-gold">{{ $subtitle }}</p>
        @endif
        @if($body)
            <p class="text-white/65 max-w-2xl leading-relaxed font-body">{{ $body }}</p>
        @endif
    </div>
</section>
