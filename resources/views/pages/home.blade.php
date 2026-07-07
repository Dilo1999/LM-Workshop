@extends('layouts.app')

@section('content')
@php
    $images = config('lm-workshop.images');
    $brand = config('lm-workshop.brand');
    $heroImage = asset($images['hero']);
@endphp

{{-- Hero --}}
<section class="lm-hero" style="--hero-bg-image: url('{{ $heroImage }}')">
    <div class="hero-container">
        <div class="hero-content">
            <div class="eyebrow">Engineering Division of LITUS Maldives</div>

            <h1 class="hero-title">
                <span class="white">LM</span>
                <span class="gold">Workshop</span>
            </h1>

            <h2 class="hero-subtitle">Engineering You Can Count On</h2>

            <p class="hero-description">
                Reliable engineering support for marine, industrial and commercial operations across the Maldives.
            </p>

            <div class="hero-actions">
                <a href="{{ route('services') }}" class="hero-btn btn-gold">
                    View Services <span>&rarr;</span>
                </a>
                <a href="{{ route('contact') }}" class="hero-btn btn-outline">
                    Contact Us
                </a>
            </div>
        </div>
    </div>

    <div class="scroll-indicator">
        <div class="mouse"></div>
        <span>Scroll</span>
    </div>
</section>

{{-- Downtime --}}
<section class="bg-white py-24">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div>
                <h2 class="font-display font-bold mb-6 leading-tight text-display text-navy">Every Minute of Downtime Has a Cost</h2>
                <p class="text-gray-500 mb-4 leading-relaxed font-body">Reliable operations don't happen by chance.</p>
                <p class="text-gray-500 mb-4 leading-relaxed font-body">Every successful business depends on equipment, systems and infrastructure performing exactly as they should. Whether it's a resort welcoming guests, a vessel transporting cargo, a construction project working against strict deadlines or an industrial facility operating around the clock, uninterrupted operations are essential to success.</p>
                <p class="text-gray-500 mb-4 leading-relaxed font-body">When critical equipment fails, the impact extends far beyond the repair itself. Productivity slows, operating costs increase, schedules are disrupted and customer experience can be affected. In many industries, even a few hours of downtime can result in significant financial and operational consequences.</p>
                <p class="text-gray-500 mb-4 leading-relaxed font-body">At LM Workshop, we understand these challenges because we've worked alongside businesses operating in the demanding environments of the Maldives. Our role is not simply to repair equipment, it is to help organisations maintain reliable operations through practical engineering expertise, responsive technical support and dependable workmanship.</p>
                <p class="text-gray-500 mb-4 leading-relaxed font-body">Whether supporting preventive maintenance, emergency breakdowns or complex engineering projects, we focus on one objective:</p>
                <p class="text-gray-500 mb-8 leading-relaxed font-body">Helping your business operate with confidence.</p>
                <blockquote class="pl-5 py-4 border-l-4 border-gold bg-quote-bg rounded-r-sm">
                    <p class="font-semibold italic leading-snug text-navy font-body text-[1.05rem]">&ldquo;Reliable engineering is not about fixing problems. It's about preventing disruption.&rdquo;</p>
                </blockquote>
            </div>
            <div class="relative">
                <img src="{{ $images['workerGears'] }}" alt="Workers repairing large industrial machinery" class="w-full h-[480px] object-cover">
            </div>
        </div>
    </div>
</section>

{{-- Long-Term Reliability --}}
<section class="relative py-28 overflow-hidden">
    <div class="absolute inset-0 bg-cover bg-center brightness-[0.18] saturate-50" style="background-image: url('{{ $images['weldingAdrian'] }}')"></div>
    <div class="absolute inset-0" style="background: linear-gradient(to right, rgba(7,21,41,0.96) 40%, rgba(7,21,41,0.6) 100%)"></div>
    <div class="absolute left-0 top-0 bottom-0 w-1 bg-gold"></div>
    <div class="relative z-10 max-w-7xl mx-auto px-6">
        <div class="max-w-2xl">
            <h2 class="font-display font-bold text-white mb-6 leading-tight text-[clamp(2rem,4vw,3.2rem)]">Let's Build Long-Term Reliability</h2>
            <p class="text-white/70 mb-4 leading-relaxed font-body">Engineering is not only about repairing equipment when problems occur.</p>
            <p class="text-white/70 mb-4 leading-relaxed font-body">It is about helping businesses operate with confidence.</p>
            <p class="text-white/70 mb-4 leading-relaxed font-body">By combining practical engineering knowledge with responsive support and dependable workmanship, LM Workshop helps organisations minimise downtime, improve equipment reliability and maintain efficient operations.</p>
            <p class="text-white/70 mb-8 leading-relaxed font-body">Whether supporting a single repair, a major engineering project or an ongoing maintenance programme, we aim to become a trusted engineering partner that contributes to your long-term operational success.</p>
            <blockquote class="pl-5 py-4 border-l-4 border-gold bg-gold/7">
                <p class="text-white/90 font-semibold italic leading-snug font-body">&ldquo;Your success depends on reliable operations. Our success depends on earning your trust.&rdquo;</p>
            </blockquote>
        </div>
    </div>
</section>

{{-- Contact CTA --}}
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="font-display font-bold mb-4 text-[clamp(2rem,4vw,2.8rem)] text-navy">Let's Talk</h2>
                <p class="text-gray-500 mb-8 leading-relaxed font-body">Whether you require emergency engineering support, preventive maintenance or technical expertise for your next project, our team is ready to assist.</p>
                <div class="flex flex-col gap-3">
                    @foreach(config('lm-workshop.contact_labels') as $label)
                        <div class="flex items-center gap-3">
                            <span class="text-xs font-heading font-bold uppercase tracking-widest w-24 shrink-0 text-gold">{{ $label }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="flex items-center justify-center">
                <div class="p-10 text-center bg-navy">
                    <div class="w-12 h-12 flex items-center justify-center font-heading font-bold text-lg mx-auto mb-4 bg-gold text-navy-deep">LM</div>
                    <h3 class="text-white font-display font-bold text-xl mb-1 tracking-[0.08em]">LM Workshop</h3>
                    <p class="text-xs uppercase tracking-widest mb-4 text-gold font-heading">{{ $brand['tagline'] }}</p>
                    <p class="text-white/55 text-sm leading-relaxed font-body">{{ $brand['description'] }}</p>
                    <div class="mt-6 w-24 h-24 mx-auto border-2 border-gold/30 bg-white flex items-center justify-center">
                        <div class="grid grid-cols-3 gap-0.5 p-2">
                            @foreach([0,1,2,3,4,5,6,7,8] as $i)
                                <div class="w-2 h-2 rounded-sm {{ in_array($i, [0,2,6,8]) ? 'bg-navy' : 'bg-gold' }}"></div>
                            @endforeach
                        </div>
                    </div>
                    <p class="text-white/35 text-xs mt-2 font-body">QR Code</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
