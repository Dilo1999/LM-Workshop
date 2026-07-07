@php
    $brand = config('lm-workshop.brand');
    $images = config('lm-workshop.images');
@endphp

<footer class="bg-navy-deep">
    <div class="max-w-7xl mx-auto px-6 pt-16 pb-8">
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-10 mb-12">
            <div>
                <div class="flex items-center gap-3 mb-5">
                    <div class="w-9 h-9 flex items-center justify-center font-heading font-bold text-sm bg-gold text-navy-deep">LM</div>
                    <div class="text-white font-heading font-bold tracking-[0.18em] text-sm">WORKSHOP</div>
                </div>
                <p class="text-xs uppercase tracking-widest mb-3 text-gold font-heading">{{ $brand['tagline'] }}</p>
                <p class="text-white/50 text-sm leading-relaxed font-body">
                    Reliable engineering support for marine, industrial and commercial operations across the Maldives.
                </p>
            </div>

            <div>
                <h4 class="text-xs font-heading font-bold uppercase tracking-[0.18em] mb-5 text-gold">Quick Links</h4>
                <ul class="flex flex-col gap-2.5">
                    @foreach([['Home', 'home'], ['About Us', 'about'], ['Services', 'services'], ['Industries', 'industries'], ['Contact', 'contact']] as [$label, $route])
                        <li>
                            <a href="{{ route($route) }}" class="text-white/60 hover:text-white text-sm transition-colors font-body">{{ $label }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div>
                <h4 class="text-xs font-heading font-bold uppercase tracking-[0.18em] mb-5 text-gold">Services</h4>
                <ul class="flex flex-col gap-2.5">
                    @foreach(['Marine Engineering', 'Power Systems', 'Mechanical & Electrical', 'Fabrication', 'Preventive Maintenance'] as $service)
                        <li>
                            <a href="{{ route('services') }}" class="text-white/60 hover:text-white text-sm transition-colors font-body">{{ $service }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div>
                <h4 class="text-xs font-heading font-bold uppercase tracking-[0.18em] mb-5 text-gold">Contact</h4>
                <ul class="flex flex-col gap-3">
                    @foreach([
                        ['phone', $brand['phone']],
                        ['mail', $brand['email']],
                        ['globe', $brand['website']],
                        ['map-pin', $brand['location']],
                    ] as [$icon, $text])
                        <li class="flex items-center gap-2.5">
                            <x-lm.icon :name="$icon" :size="13" class="text-gold shrink-0" />
                            <span class="text-white/60 text-sm font-body">{{ $text }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="pt-6 border-t border-white/8 flex flex-col sm:flex-row items-center justify-between gap-4">
            <p class="text-white/35 text-xs font-body">&copy; LM Workshop. All rights reserved. Engineering Division of LITUS Maldives.</p>
            <p class="text-white/25 text-xs font-body">Marine · Industrial · Commercial · Maldives</p>
        </div>
    </div>
</footer>
