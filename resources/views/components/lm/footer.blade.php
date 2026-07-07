@php
    $brand = config('lm-workshop.brand');
    $navLinks = config('lm-workshop.nav');
    $services = config('lm-workshop.services');
@endphp

<footer class="bg-navy-deep">
    <div class="max-w-7xl mx-auto px-6 pt-10 pb-6">
        <div class="flex flex-col xl:flex-row xl:items-start xl:justify-between gap-8 mb-8">
            <div class="max-w-sm shrink-0">
                <a href="{{ route('home') }}" class="flex items-center gap-3 mb-4 select-none">
                    <div class="w-9 h-9 flex items-center justify-center font-heading font-bold text-sm bg-gold text-white">LM</div>
                    <div>
                        <div class="text-white font-heading font-bold tracking-[0.18em] text-sm">WORKSHOP</div>
                        <div class="text-gold-light font-body text-[9px] uppercase tracking-wider">{{ $brand['tagline'] }}</div>
                    </div>
                </a>
                <p class="text-white/50 text-sm leading-relaxed font-body">{{ $brand['description'] }}</p>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8 xl:gap-10 flex-1 xl:max-w-3xl xl:ml-auto">
                <div>
                    <h4 class="text-xs font-heading font-bold uppercase tracking-[0.1em] mb-3 text-gold-light">Navigation</h4>
                    <ul class="flex flex-col gap-1.5">
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

                <div>
                    <h4 class="text-xs font-heading font-bold uppercase tracking-[0.18em] mb-3 text-gold-light">Services</h4>
                    <ul class="flex flex-col gap-1.5">
                        @foreach(array_slice($services, 0, 5) as $service)
                            <li>
                                <a href="{{ route('services') }}" class="text-white/60 hover:text-white text-sm transition-colors font-body">{{ $service['title'] }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div>
                    <h4 class="text-xs font-heading font-bold uppercase tracking-[0.18em] mb-3 text-gold-light">Contact</h4>
                    <ul class="flex flex-col gap-2">
                        @foreach([
                            ['phone', $brand['phone']],
                            ['mail', $brand['email']],
                            ['globe', $brand['website']],
                            ['map-pin', $brand['location']],
                        ] as [$icon, $text])
                            <li class="flex items-center gap-2.5">
                                <x-lm.icon :name="$icon" :size="13" class="text-gold-light shrink-0" />
                                <span class="text-white/60 text-sm font-body">{{ $text }}</span>
                            </li>
                        @endforeach
                    </ul>
                    <a
                        href="{{ route('contact') }}"
                        class="mt-4 inline-flex items-center gap-1.5 px-5 py-2 text-xs font-heading font-bold tracking-[0.12em] uppercase bg-gold text-white transition-all hover:brightness-110"
                    >
                        Let's Talk
                        <x-lm.icon name="chevron-right" :size="11" />
                    </a>
                </div>
            </div>
        </div>

        <div class="pt-4 border-t border-white/8 flex flex-col sm:flex-row items-center justify-between gap-3">
            <p class="text-white/35 text-xs font-body">&copy; LM Workshop. All rights reserved. Engineering Division of LITUS Maldives.</p>
            <p class="text-white/25 text-xs font-body">Marine · Industrial · Commercial · Maldives</p>
        </div>
    </div>
</footer>
