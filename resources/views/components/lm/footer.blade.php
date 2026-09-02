@php
    $brand = config('lm-workshop.brand');
    $navLinks = config('lm-workshop.nav');
    $services = config('lm-workshop.services');
@endphp

<footer class="lm-footer bg-navy-deep">
    <div class="max-w-7xl mx-auto px-6 pt-10 pb-6">
        <div class="flex flex-col xl:flex-row xl:items-start xl:justify-between gap-8 mb-8">
            <div class="lm-footer-brand max-w-sm shrink-0">
                <a href="{{ route('home') }}" class="inline-flex items-center mb-4 select-none -ml-3">
                    <img
                        src="{{ asset(config('lm-workshop.images.logo')) }}"
                        alt="{{ $brand['name'] }}"
                        class="h-[5.5rem] w-auto"
                        width="440"
                        height="220"
                    >
                </a>
                <p class="text-white/50 text-sm leading-relaxed font-body">{{ $brand['description'] }}</p>
            </div>

            <div class="lm-footer-columns grid sm:grid-cols-2 lg:grid-cols-3 gap-8 xl:gap-10 flex-1 xl:max-w-3xl xl:ml-auto">
                <div class="lm-footer-panel--hide-mobile">
                    <ul class="lm-footer-nav grid sm:flex sm:flex-col gap-1.5">
                        @foreach($navLinks as $link)
                            <li>
                                <a
                                    href="{{ route($link['route']) }}"
                                    class="text-xs font-heading font-bold uppercase tracking-[0.1em] transition-colors {{ request()->routeIs($link['route']) ? 'text-gold-light' : 'text-white/60 hover:text-white' }}"
                                >
                                    {{ $link['label'] }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="lm-footer-panel--hide-mobile">
                    <h4 class="text-xs font-heading font-bold uppercase tracking-[0.18em] mb-3 text-gold-light">Services</h4>
                    <ul class="flex flex-col gap-1.5">
                        @foreach(array_slice($services, 0, 5) as $service)
                            <li>
                                <a href="{{ route('services.show', $service['slug']) }}" class="text-white/60 hover:text-white text-sm transition-colors font-body">{{ $service['title'] }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div>
                    <h4 class="text-xs font-heading font-bold uppercase tracking-[0.18em] mb-3 text-gold-light">Contact</h4>
                    <ul class="flex flex-col gap-2">
                        @foreach([
                            ['phone', $brand['phone'], str_contains($brand['phone'], 'XXX') ? null : 'tel:'.preg_replace('/\s+/', '', $brand['phone'])],
                            ['mail', $brand['email'], 'mailto:'.$brand['email']],
                            ['globe', $brand['website'], 'https://'.preg_replace('#^https?://#', '', $brand['website'])],
                            ['map-pin', $brand['location'], null],
                        ] as [$icon, $text, $href])
                            <li class="flex items-center gap-2.5">
                                <x-lm.icon :name="$icon" :size="13" class="text-gold-light shrink-0" />
                                @if($href)
                                    <a href="{{ $href }}" class="text-white/60 hover:text-white text-sm font-body transition-colors">{{ $text }}</a>
                                @else
                                    <span class="text-white/60 text-sm font-body">{{ $text }}</span>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                    <div class="flex flex-col gap-2 mt-4">
                        <a
                            href="{{ $cta['quote'] }}"
                            class="lm-footer-cta inline-flex items-center justify-center gap-1.5 px-5 py-2 text-xs font-heading font-bold tracking-[0.12em] uppercase bg-gold text-white transition-all hover:brightness-110"
                        >
                            Request a Quote
                            <x-lm.icon name="chevron-right" :size="11" />
                        </a>
                        <a
                            href="{{ $cta['whatsapp'] }}"
                            class="inline-flex items-center justify-center gap-1.5 px-5 py-2 text-xs font-heading font-bold tracking-[0.12em] uppercase border border-white/20 text-white/80 transition-all hover:bg-white/10"
                            @if(str_starts_with($cta['whatsapp'] ?? '', 'https://wa.me')) target="_blank" rel="noopener noreferrer" @endif
                        >
                            WhatsApp an Engineer
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="lm-footer-bottom pt-4 border-t border-white/8 flex flex-col sm:flex-row items-center justify-between gap-3">
            <p class="text-white/35 text-xs font-body">&copy; LM Workshop. All rights reserved. Engineering Division of LITUS Maldives.</p>
            <p class="text-white/25 text-xs font-body">Marine · Industrial · Commercial · Maldives</p>
        </div>
    </div>
</footer>
