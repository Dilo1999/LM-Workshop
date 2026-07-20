@extends('layouts.app')

@section('content')
@php $images = config('lm-workshop.images'); @endphp

<x-lm.section-hero
    label="Who We Are"
    title="About LM Workshop"
    subtitle="Engineering You Can Count On"
    body="LM Workshop is the engineering division of LITUS Maldives, delivering dependable engineering solutions across the Maldives."
    :img="$images['aboutHero']"
/>

<section class="bg-white py-24">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div>
                <h2 class="font-display font-bold mb-6 leading-tight text-display-md text-navy">Who We Are</h2>
                <p class="text-gray-500 mb-4 leading-relaxed font-body">LM Workshop is the engineering division of LITUS Maldives, providing multidisciplinary engineering solutions for marine, industrial and commercial operations throughout the Maldives.</p>
                <p class="text-gray-500 mb-4 leading-relaxed font-body">Our team combines practical expertise across marine engineering, mechanical systems, electrical infrastructure, fabrication, power generation and industrial maintenance to deliver dependable engineering support for organisations that cannot afford unnecessary downtime.</p>
                <p class="text-gray-500 mb-4 leading-relaxed font-body">We work closely with resort operators, marine businesses, contractors, industrial facilities, commercial organisations and government institutions, providing engineering services tailored to their operational requirements.</p>
                <p class="text-gray-500 leading-relaxed font-body">Every project we undertake is guided by the same commitment, to deliver practical engineering solutions with professionalism, reliability and accountability.</p>
            </div>
            <div class="relative">
                <img src="{{ $images['workerGears'] }}" alt="LM Workshop engineers working on industrial machinery" class="w-full h-64 sm:h-80 lg:h-[480px] object-cover">
            </div>
        </div>
    </div>
</section>

<section class="py-24 bg-cream">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid md:grid-cols-3 gap-6">
            @foreach([
                ['target', 'Our Purpose', 'To keep the systems businesses depend on running safely and reliably.'],
                ['eye', 'Our Vision', "To become the Maldives' most trusted engineering partner, recognised for reliability, technical excellence and long-term client relationships."],
                ['compass', 'Our Mission', 'To help businesses operate safely, efficiently and with confidence by delivering dependable engineering services, practical solutions and responsive technical support.'],
            ] as [$icon, $title, $body])
                <div class="p-8 bg-white border-t-4 border-gold">
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
                <img src="{{ $images['factory'] }}" alt="Professional engineering facility" class="w-full h-64 sm:h-80 lg:h-[440px] object-cover">
            </div>
            <div>
                <h2 class="font-display font-bold mb-6 leading-tight text-display-md text-navy">The Strength Behind LM Workshop</h2>
                <p class="text-gray-500 mb-4 leading-relaxed font-body">LM Workshop operates as the engineering division of LITUS Maldives, combining specialised engineering expertise with the resources, governance and long-term commitment of an established organisation.</p>
                <p class="text-gray-500 mb-4 leading-relaxed font-body">Being part of LITUS means our clients benefit from structured project management, professional administration, stronger operational resources and a commitment to building long-term partnerships across the Maldives.</p>
                <p class="text-gray-500 mb-4 leading-relaxed font-body">Our clients are not simply engaging a workshop.</p>
                <p class="text-gray-500 leading-relaxed font-body">They are partnering with an organisation committed to delivering dependable engineering solutions supported by professional management and long-term business stability.</p>
            </div>
        </div>
    </div>
</section>
@endsection
