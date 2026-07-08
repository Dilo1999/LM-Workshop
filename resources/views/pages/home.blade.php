@extends('layouts.app')

@section('content')
@php
    $images = config('lm-workshop.images');
    $services = config('lm-workshop.services');
    $industries = config('lm-workshop.industries');
    $why = config('lm-workshop.why_home');
    $brand = config('lm-workshop.brand');
    $heroImage = asset($images['hero']);
@endphp

{{-- Hero --}}
<section class="lm-hero" style="--hero-bg-image: url('{{ $heroImage }}')">
    <div class="hero-container relative z-[5] max-w-7xl mx-auto px-6 w-full">
        <div class="hero-content">
            <div class="eyebrow">
                Engineering Division<span class="hero-mobile-br lg:hidden"><br></span> of LITUS Maldives
            </div>

            <h1 class="hero-title">
                <span class="white">LM</span>
                <span class="gold">Workshop</span>
            </h1>

            <div class="hero-title-line lg:hidden" aria-hidden="true"></div>

            <h2 class="hero-subtitle">Engineering You Can<span class="hero-mobile-br lg:hidden"><br></span> Count On</h2>

            <p class="hero-description">
                Reliable engineering support for marine, industrial and commercial operations across the Maldives.
            </p>

            <div class="hero-actions">
                <a href="{{ route('services') }}" class="hero-btn btn-gold">
                    <span class="hero-btn-icon lg:hidden" aria-hidden="true">
                        <x-lm.icon name="wrench" :size="16" />
                    </span>
                    <span class="hero-btn-text">View Services</span>
                    <span class="hero-btn-arrow" aria-hidden="true">&rarr;</span>
                </a>
                <a href="{{ route('contact') }}" class="hero-btn btn-outline">
                    <span class="hero-btn-icon lg:hidden" aria-hidden="true">
                        <x-lm.icon name="phone" :size="16" />
                    </span>
                    <span class="hero-btn-text">Contact Us</span>
                </a>
            </div>

            <div class="stats-wrap">
                <div class="stats-grid">
                    @foreach([
                        ['10+', 'Years Experience', 'Years Exp.', 'shield-check'],
                        ['6', 'Engineering Disciplines', 'Disciplines', 'settings'],
                        ['200+', 'Projects Completed', 'Projects', 'hard-hat'],
                        ['24/7', 'Support Available', 'Support', 'headset'],
                    ] as [$n, $l, $lShort, $icon])
                        <div class="stat-item">
                            <div class="stat-icon lg:hidden">
                                <x-lm.icon :name="$icon" :size="26" class="text-gold-light" />
                            </div>
                            <div class="stat-number">{{ $n }}</div>
                            <div class="stat-label">
                                <span class="hidden lg:inline">{{ $l }}</span>
                                <span class="lg:hidden">{{ $lShort }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="scroll-indicator scroll-indicator--desktop">
        <div class="mouse"></div>
        <span>Scroll</span>
    </div>
    <div class="scroll-indicator scroll-indicator--mobile lg:hidden" aria-hidden="true">
        <span class="scroll-chevron">&darr;</span>
    </div>
</section>

{{-- Downtime --}}
<section class="home-split-section bg-white py-24">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid lg:grid-cols-2 gap-8 lg:gap-16 items-center">
            <div class="order-2 lg:order-1 home-split-copy">
                <x-lm.section-label>The Challenge</x-lm.section-label>
                <h2 class="font-display font-bold mb-4 lg:mb-6 leading-tight text-display text-navy">Every Minute of Downtime Has a Cost</h2>
                <p class="text-gray-500 mb-4 leading-relaxed font-body">Reliable operations don't happen by chance.</p>
                <p class="text-gray-500 mb-4 leading-relaxed font-body">Every successful business depends on equipment, systems and infrastructure performing exactly as they should. Whether it's a resort welcoming guests, a vessel transporting cargo, a construction project working against strict deadlines or an industrial facility operating around the clock, uninterrupted operations are essential to success.</p>
                <p class="max-lg:hidden text-gray-500 mb-4 leading-relaxed font-body">When critical equipment fails, the impact extends far beyond the repair itself. Productivity slows, operating costs increase, schedules are disrupted and customer experience can be affected. In many industries, even a few hours of downtime can result in significant financial and operational consequences.</p>
                <p class="max-lg:hidden text-gray-500 mb-4 leading-relaxed font-body">At LM Workshop, we understand these challenges because we've worked alongside businesses operating in the demanding environments of the Maldives. Our role is not simply to repair equipment, it is to help organisations maintain reliable operations through practical engineering expertise, responsive technical support and dependable workmanship.</p>
                <p class="lg:hidden text-gray-500 mb-4 leading-relaxed font-body">When equipment fails, productivity slows and costs rise. LM Workshop helps organisations across the Maldives maintain reliable operations through practical engineering expertise and responsive support.</p>
                <p class="max-lg:hidden text-gray-500 mb-4 leading-relaxed font-body">Whether supporting preventive maintenance, emergency breakdowns or complex engineering projects, we focus on one objective:</p>
                <p class="text-gray-500 mb-6 lg:mb-8 leading-relaxed font-body font-medium text-navy/80">Helping your business operate with confidence.</p>
                <blockquote class="home-split-quote pl-4 lg:pl-5 py-3 lg:py-4 border-l-4 border-gold bg-quote-bg rounded-r-sm">
                    <p class="font-semibold italic leading-snug text-navy font-body text-sm lg:text-[1.05rem]">&ldquo;Reliable engineering is not about fixing problems. It's about preventing disruption.&rdquo;</p>
                </blockquote>
            </div>
            <div class="order-1 lg:order-2 home-split-media relative">
                <img src="{{ $images['workerGears'] }}" alt="Workers repairing large industrial machinery" class="w-full h-52 sm:h-64 lg:h-[480px] object-cover">
                <div class="lm-home-badge lm-home-badge--offset hidden lg:flex absolute bottom-3 left-3 sm:bottom-4 sm:left-4 lg:-bottom-6 lg:-left-6 w-24 h-24 sm:w-28 sm:h-28 lg:w-32 lg:h-32 flex-col items-center justify-center text-center bg-gold text-white shadow-lg">
                    <span class="text-2xl sm:text-3xl font-display font-bold">24/7</span>
                    <span class="text-[10px] sm:text-xs font-heading font-bold uppercase tracking-wider mt-1">Support</span>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- About Preview --}}
<section class="home-split-section py-24 bg-cream">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid lg:grid-cols-2 gap-8 lg:gap-16 items-center">
            <div class="home-split-media relative">
                <img src="{{ $images['engineer'] }}" alt="LM Workshop engineer on site" class="w-full h-52 sm:h-64 lg:h-[480px] object-cover">
                <div class="lm-home-badge lm-home-badge--top hidden lg:flex absolute top-3 right-3 sm:top-4 sm:right-4 lg:-top-5 lg:-right-5 w-24 h-24 sm:w-28 sm:h-28 lg:w-36 lg:h-36 flex-col items-center justify-center text-center bg-navy shadow-lg">
                    <span class="text-[10px] sm:text-xs font-heading font-bold uppercase tracking-widest text-white/60 mb-1">Division of</span>
                    <span class="text-base sm:text-lg font-display font-bold text-white tracking-[0.08em]">LITUS</span>
                    <span class="text-[10px] sm:text-xs font-heading font-bold text-white/60 uppercase tracking-widest">Maldives</span>
                </div>
            </div>
            <div class="home-split-copy">
                <x-lm.section-label>Who We Are</x-lm.section-label>
                <h2 class="font-display font-bold mb-4 lg:mb-6 leading-tight text-display text-navy">Engineering You Can Count On</h2>
                <p class="text-gray-500 mb-4 leading-relaxed font-body">LM Workshop is the engineering division of LITUS Maldives, providing multidisciplinary engineering solutions for marine, industrial and commercial operations throughout the Maldives.</p>
                <p class="max-lg:hidden text-gray-500 mb-4 leading-relaxed font-body">Our team combines practical expertise across marine engineering, mechanical systems, electrical infrastructure, fabrication, power generation and industrial maintenance to deliver dependable engineering support.</p>
                <p class="text-gray-500 mb-6 lg:mb-8 leading-relaxed font-body">Every project we undertake is guided by the same commitment: to deliver practical engineering solutions with professionalism, reliability and accountability.</p>
                <x-lm.gold-btn :href="route('about')">Learn More About Us</x-lm.gold-btn>
            </div>
        </div>
    </div>
</section>

{{-- Services Preview --}}
<section class="bg-white py-24">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-14">
            <x-lm.section-label>What We Do</x-lm.section-label>
            <h2 class="font-display font-bold mb-4 text-display text-navy">Engineering Solutions</h2>
            <p class="text-gray-500 max-w-xl mx-auto font-body">LM Workshop delivers comprehensive engineering services across multiple technical disciplines, enabling clients to work with one trusted engineering partner.</p>
        </div>
        <div class="home-services-grid grid grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-5">
            @foreach(array_slice($services, 0, 6) as $service)
                <x-lm.service-card :icon="$service['icon']" :title="$service['title']" :desc="$service['desc']" />
            @endforeach
        </div>
        <div class="text-center mt-12">
            <x-lm.gold-btn :href="route('services')">View All Services</x-lm.gold-btn>
        </div>
    </div>
</section>

{{-- Industries Preview --}}
<section class="py-24 bg-navy">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-14">
            <x-lm.section-label light>Sectors We Serve</x-lm.section-label>
            <h2 class="font-display font-bold mb-4 text-display text-white">Industries We Support</h2>
            <p class="text-white/60 max-w-lg mx-auto font-body">Every industry operates differently, but they all depend on reliable engineering. LM Workshop provides tailored engineering support across a wide range of sectors throughout the Maldives.</p>
        </div>
        <div class="industry-slider grid sm:grid-cols-2 lg:grid-cols-3 gap-4" data-industry-slider>
            @foreach($industries as $industry)
                <div class="industry-slider__slide">
                    <div class="group industry-card relative overflow-hidden h-64 sm:h-72 lg:h-64 cursor-default">
                        <img src="{{ $images[$industry['img']] }}" alt="{{ $industry['title'] }}" class="absolute inset-0 w-full h-full object-cover transition-transform duration-500">
                        <div class="absolute inset-0" style="background: linear-gradient(to top, rgba(7,21,41,0.94) 0%, rgba(11,31,63,0.53) 60%, rgba(11,31,63,0.27) 100%)"></div>
                        <div class="industry-overlay absolute inset-0 opacity-0 transition-opacity duration-300 bg-navy-deep/80"></div>
                        <div class="industry-bar absolute left-0 top-0 bottom-0 w-1 bg-gold"></div>
                        <div class="absolute inset-0 flex flex-col justify-end p-6">
                            <h3 class="font-heading font-bold text-white text-lg mb-2 tracking-[0.05em]">{{ $industry['title'] }}</h3>
                            <p class="industry-desc text-white/70 text-sm leading-relaxed opacity-0 transition-opacity duration-300 font-body">{{ $industry['desc'] }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="industry-slider-dots mt-6 sm:hidden" data-industry-slider-dots>
            @foreach($industries as $i => $industry)
                <button
                    type="button"
                    class="industry-slider-dot{{ $i === 0 ? ' is-active' : '' }}"
                    data-industry-slider-dot="{{ $i }}"
                    aria-label="Go to {{ $industry['title'] }}"
                ></button>
            @endforeach
        </div>
        <div class="text-center mt-12">
            <a href="{{ route('industries') }}" class="inline-flex items-center gap-2 px-8 py-3 font-heading font-bold uppercase tracking-[0.12em] text-sm border border-gold-light text-gold-light transition-all hover:bg-white/10">
                Explore Industries
                <x-lm.icon name="arrow-right" :size="14" />
            </a>
        </div>
    </div>
</section>

{{-- Why Preview --}}
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-14">
            <x-lm.section-label>Our Difference</x-lm.section-label>
            <h2 class="font-display font-bold mb-4 text-display text-navy">Why Businesses Choose LM Workshop</h2>
            <p class="text-gray-500 max-w-xl mx-auto font-body">Choosing an engineering partner is about more than technical capability. It is about working with a team that understands your operational priorities.</p>
        </div>
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-5">
            @foreach($why as $item)
                <div class="p-6 border border-navy/8 border-l-[3px] border-l-gold transition-all duration-300 hover:shadow-md">
                    <div class="flex items-center gap-3 mb-3">
                        <x-lm.icon :name="$item['icon']" :size="18" class="text-gold" />
                        <h3 class="font-heading font-bold text-base text-navy">{{ $item['title'] }}</h3>
                    </div>
                    <p class="text-gray-500 text-sm leading-relaxed font-body">{{ $item['desc'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Long-Term Reliability --}}
<section class="relative py-20 overflow-hidden">
    <div class="absolute inset-0 bg-cover bg-center brightness-[0.45] saturate-90" style="background-image: url('{{ asset($images['reliabilityBg']) }}')"></div>
    <div class="absolute inset-0" style="background: linear-gradient(to right, rgba(7,21,41,0.55) 40%, rgba(7,21,41,0.2) 100%)"></div>
    <div class="absolute left-0 top-0 bottom-0 w-1 bg-gold"></div>
    <div class="relative z-10 max-w-7xl mx-auto px-6">
        <div class="max-w-2xl">
            <x-lm.section-label light>Our Commitment</x-lm.section-label>
            <h2 class="font-display font-bold text-white mb-5 leading-tight text-[clamp(2rem,4vw,3.2rem)]">Let's Build Long-Term Reliability</h2>
            <p class="text-white/70 mb-3 leading-relaxed font-body">Engineering is not only about repairing equipment when problems occur.</p>
            <p class="text-white/70 mb-3 leading-relaxed font-body">It is about helping businesses operate with confidence.</p>
            <p class="text-white/70 mb-3 leading-relaxed font-body">By combining practical engineering knowledge with responsive support and dependable workmanship, LM Workshop helps organisations minimise downtime, improve equipment reliability and maintain efficient operations.</p>
            <p class="text-white/70 mb-6 leading-relaxed font-body">Whether supporting a single repair, a major engineering project or an ongoing maintenance programme, we aim to become a trusted engineering partner that contributes to your long-term operational success.</p>
            <blockquote class="pl-5 py-3 border-l-4 border-gold mb-8 bg-gold/7">
                <p class="text-white/90 font-semibold italic leading-snug font-body">&ldquo;Your success depends on reliable operations. Our success depends on earning your trust.&rdquo;</p>
            </blockquote>
            <x-lm.gold-btn :href="route('contact')">Contact LM Workshop</x-lm.gold-btn>
        </div>
    </div>
</section>

{{-- Contact CTA --}}
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex flex-col xl:flex-row xl:items-start xl:justify-between gap-10 xl:gap-12">
            <div class="max-w-xl shrink-0">
                <x-lm.section-label>Get In Touch</x-lm.section-label>
                <h2 class="font-display font-bold mb-4 text-[clamp(2rem,4vw,2.8rem)] text-navy">Let's Talk</h2>
                <p class="text-gray-500 mb-6 leading-relaxed font-body">Whether you require emergency engineering support, preventive maintenance or technical expertise for your next project, our team is ready to assist.</p>
                <div class="flex flex-col gap-3 mb-8">
                    @foreach([['Phone', $brand['phone']], ['WhatsApp', $brand['whatsapp']], ['Email', $brand['email']], ['Website', $brand['website']]] as [$l, $v])
                        <div class="flex items-center gap-3">
                            <span class="text-xs font-heading font-bold uppercase tracking-widest w-20 shrink-0 text-gold">{{ $l }}</span>
                            <span class="text-gray-600 text-sm font-body">{{ $v }}</span>
                        </div>
                    @endforeach
                </div>
                <x-lm.gold-btn :href="route('contact')">Send an Inquiry</x-lm.gold-btn>
            </div>

            <div class="w-full xl:max-w-md xl:shrink-0 xl:ml-auto">
                <div class="p-6 sm:p-8 bg-navy-deep">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-9 h-9 flex items-center justify-center font-heading font-bold text-sm bg-gold text-white">LM</div>
                        <div>
                            <div class="text-white font-heading font-bold tracking-[0.18em] text-sm">WORKSHOP</div>
                            <div class="text-gold-light font-body text-[9px] uppercase tracking-wider">{{ $brand['tagline'] }}</div>
                        </div>
                    </div>
                    <p class="text-white/55 text-sm leading-relaxed font-body mb-6">{{ $brand['description'] }}</p>
                    <div class="pt-6 border-t border-white/10 flex items-center gap-4">
                        <div class="w-20 h-20 flex items-center justify-center shrink-0 bg-white">
                            <div class="grid grid-cols-3 gap-0.5 p-2">
                                @foreach([0,1,2,3,4,5,6,7,8] as $i)
                                    <div class="w-2 h-2 rounded-sm {{ in_array($i, [0,2,6,8]) ? 'bg-navy' : 'bg-gold' }}"></div>
                                @endforeach
                            </div>
                        </div>
                        <p class="text-white/45 text-xs leading-snug font-body">Scan to connect with our team directly via WhatsApp.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
