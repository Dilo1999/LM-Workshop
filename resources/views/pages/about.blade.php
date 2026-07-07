@extends('layouts.app')

@section('content')
@php $images = config('lm-workshop.images'); @endphp

<x-lm.page-hero
    label="Who We Are"
    title="Engineering You Can Count On"
    subtitle="The Engineering Division of LITUS Maldives"
    :img="$images['engineer']"
/>

<section class="bg-white py-24">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div>
                <x-lm.section-label>Our Story</x-lm.section-label>
                <h2 class="font-display font-bold mb-6 leading-tight text-display-md text-navy">Practical Engineering for the Maldives</h2>
                <p class="text-gray-500 mb-4 leading-relaxed font-body">LM Workshop is the engineering division of LITUS Maldives, providing multidisciplinary engineering solutions for marine, industrial and commercial operations throughout the Maldives.</p>
                <p class="text-gray-500 mb-4 leading-relaxed font-body">Our team combines practical expertise across marine engineering, mechanical systems, electrical infrastructure, fabrication, power generation and industrial maintenance to deliver dependable engineering support for organisations that cannot afford unnecessary downtime.</p>
                <p class="text-gray-500 mb-4 leading-relaxed font-body">We work closely with resort operators, marine businesses, contractors, industrial facilities, commercial organisations and government institutions, providing engineering services tailored to their operational requirements.</p>
                <p class="text-gray-500 mb-8 leading-relaxed font-body">Every project we undertake is guided by the same commitment: to deliver practical engineering solutions with professionalism, reliability and accountability.</p>
                <x-lm.gold-btn :href="route('services')">Explore Our Services</x-lm.gold-btn>
            </div>
            <div class="relative">
                <img src="{{ $images['workerGears'] }}" alt="LM Workshop engineers working on industrial machinery" class="w-full h-[480px] object-cover">
                <div class="absolute -bottom-5 -right-5 p-6 bg-navy max-w-[220px]">
                    <p class="text-xs uppercase tracking-widest mb-1 text-gold font-heading">Established under</p>
                    <p class="text-white font-display font-bold text-xl tracking-[0.08em]">LITUS Maldives</p>
                    <p class="text-white/50 text-xs mt-1 font-body">Professional engineering management</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-24 bg-cream">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-14">
            <x-lm.section-label>Our Foundation</x-lm.section-label>
            <h2 class="font-display font-bold text-display text-navy">Purpose, Vision &amp; Mission</h2>
        </div>
        <div class="grid md:grid-cols-3 gap-6">
            @foreach([
                ['target', 'Our Purpose', 'To keep the systems businesses depend on running safely and reliably.'],
                ['eye', 'Our Vision', "To become the Maldives' most trusted engineering partner, recognised for reliability, technical excellence and long-term client relationships."],
                ['compass', 'Our Mission', 'To help businesses operate safely, efficiently and with confidence by delivering dependable engineering services, practical solutions and responsive technical support.'],
            ] as [$icon, $title, $body])
                <div class="p-8 bg-white border-t-4 border-gold hover:shadow-lg transition-shadow">
                    <div class="w-12 h-12 flex items-center justify-center mb-5 bg-cream">
                        <x-lm.icon :name="$icon" :size="22" class="text-gold" />
                    </div>
                    <h3 class="font-heading font-bold text-xl mb-4 text-navy tracking-[0.05em]">{{ $title }}</h3>
                    <p class="text-gray-500 leading-relaxed font-body">{{ $body }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div class="relative">
                <img src="{{ $images['factory'] }}" alt="Professional engineering facility" class="w-full h-[440px] object-cover">
                <div class="absolute -top-5 -left-5 w-28 h-28 flex items-center justify-center bg-gold">
                    <span class="text-5xl font-display font-bold text-navy-deep">LM</span>
                </div>
            </div>
            <div>
                <x-lm.section-label>Our Backing</x-lm.section-label>
                <h2 class="font-display font-bold mb-6 leading-tight text-display-md text-navy">The Strength Behind LM Workshop</h2>
                <p class="text-gray-500 mb-4 leading-relaxed font-body">LM Workshop operates as the engineering division of LITUS Maldives, combining specialised engineering expertise with the resources, governance and long-term commitment of an established organisation.</p>
                <p class="text-gray-500 mb-4 leading-relaxed font-body">Being part of LITUS means our clients benefit from structured project management, professional administration, stronger operational resources and a commitment to building long-term partnerships across the Maldives.</p>
                <p class="text-navy mb-8 leading-relaxed font-medium font-body">Our clients are not simply engaging a workshop. They are partnering with an organisation committed to delivering dependable engineering solutions supported by professional management and long-term business stability.</p>
                <x-lm.gold-btn :href="route('contact')">Work With Us</x-lm.gold-btn>
            </div>
        </div>
    </div>
</section>
@endsection
