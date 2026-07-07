@extends('layouts.app')

@section('content')
@php
    $images = config('lm-workshop.images');
    $brand = config('lm-workshop.brand');
    $services = config('lm-workshop.services');
@endphp

<x-lm.section-hero
    label="Reach Out"
    title="Let's Talk"
    body="Whether you require emergency engineering support, preventive maintenance or technical expertise for your next project, our team is ready to assist."
    :img="$images['weldingAdrian']"
/>

<section class="bg-white py-24">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid lg:grid-cols-5 gap-10">
            <div class="lg:col-span-2">
                <div class="h-full p-6 sm:p-8 bg-navy lm-contact-panel">
                    <div class="mb-8">
                        <div class="w-12 h-12 flex items-center justify-center font-heading font-bold text-base mb-4 bg-gold text-white">LM</div>
                        <h3 class="font-display font-bold text-white text-2xl mb-1 tracking-[0.06em]">LM WORKSHOP</h3>
                        <p class="text-xs uppercase tracking-widest mb-4 text-gold-light font-heading">{{ $brand['tagline'] }}</p>
                        <p class="text-white/55 text-sm leading-relaxed font-body">{{ $brand['description'] }}</p>
                    </div>

                    <div class="flex flex-col gap-5 mb-8">
                        @foreach([
                            ['phone', 'Phone', $brand['phone']],
                            ['phone', 'WhatsApp', $brand['whatsapp']],
                            ['mail', 'Email', $brand['email']],
                            ['globe', 'Website', $brand['website']],
                            ['map-pin', 'Location', $brand['location']],
                        ] as [$icon, $label, $value])
                            <div class="flex items-start gap-3">
                                <div class="w-9 h-9 flex items-center justify-center shrink-0 bg-gold/12">
                                    <x-lm.icon :name="$icon" :size="15" class="text-gold-light" />
                                </div>
                                <div>
                                    <p class="text-xs uppercase tracking-widest text-white/40 mb-0.5 font-heading">{{ $label }}</p>
                                    <p class="text-white/80 text-sm font-body">{{ $value }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="pt-6 border-t border-white/10 flex items-center gap-4 lm-qr-row">
                        <div class="w-20 h-20 flex items-center justify-center shrink-0 bg-white">
                            <div class="grid grid-cols-4 gap-0.5 p-1.5">
                                @foreach(range(0, 15) as $i)
                                    <div class="w-2 h-2 rounded-sm {{ in_array($i, [0,3,4,7,8,12,15]) ? 'bg-navy' : 'bg-gold' }}"></div>
                                @endforeach
                            </div>
                        </div>
                        <p class="text-white/45 text-xs leading-snug font-body">Scan to connect with our team directly via WhatsApp.</p>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-3">
                <x-lm.section-label>Send an Inquiry</x-lm.section-label>
                <h2 class="font-display font-bold mb-8 leading-tight text-display-md text-navy">Tell Us About Your Requirements</h2>

                @if(session('contact_success'))
                    <div class="p-10 border border-gold text-center bg-quote-bg">
                        <div class="w-14 h-14 mx-auto mb-4 flex items-center justify-center bg-gold">
                            <x-lm.icon name="send" :size="24" class="text-white" />
                        </div>
                        <h3 class="font-heading font-bold text-xl mb-2 text-navy">Inquiry Sent</h3>
                        <p class="text-gray-500 text-sm font-body">Thank you for reaching out. Our team will be in touch with you shortly.</p>
                    </div>
                @else
                    <form action="{{ route('contact.store') }}" method="POST" class="grid sm:grid-cols-2 gap-5">
                        @csrf

                        @foreach([
                            ['name', 'Name', 'text', 'Your full name'],
                            ['company', 'Company Name', 'text', 'Your company'],
                            ['phone', 'Phone Number', 'tel', '+960 XXX XXXX'],
                            ['email', 'Email Address', 'email', 'email@company.com'],
                        ] as [$id, $label, $type, $placeholder])
                            <div>
                                <label for="{{ $id }}" class="block text-xs font-heading font-bold uppercase tracking-widest mb-2 text-navy">{{ $label }}</label>
                                <input
                                    id="{{ $id }}"
                                    name="{{ $id }}"
                                    type="{{ $type }}"
                                    value="{{ old($id) }}"
                                    placeholder="{{ $placeholder }}"
                                    @if(in_array($id, ['name', 'email'])) required @endif
                                    class="lm-input w-full px-4 py-3 text-sm border border-navy/15 bg-[#f7f9fc] text-navy font-body @error($id) border-red-500 @enderror"
                                >
                                @error($id)
                                    <p class="text-red-500 text-xs mt-1 font-body">{{ $message }}</p>
                                @enderror
                            </div>
                        @endforeach

                        <div class="sm:col-span-2">
                            <label for="service" class="block text-xs font-heading font-bold uppercase tracking-widest mb-2 text-navy">Service Required</label>
                            <select
                                id="service"
                                name="service"
                                class="lm-input w-full px-4 py-3 text-sm border border-navy/15 bg-[#f7f9fc] font-body @error('service') border-red-500 @enderror"
                            >
                                <option value="">Select a service</option>
                                @foreach($services as $service)
                                    <option value="{{ $service['title'] }}" @selected(old('service') === $service['title'])>{{ $service['title'] }}</option>
                                @endforeach
                                <option value="Other" @selected(old('service') === 'Other')>Other / General Inquiry</option>
                            </select>
                            @error('service')
                                <p class="text-red-500 text-xs mt-1 font-body">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="sm:col-span-2">
                            <label for="message" class="block text-xs font-heading font-bold uppercase tracking-widest mb-2 text-navy">Message</label>
                            <textarea
                                id="message"
                                name="message"
                                rows="5"
                                placeholder="Briefly describe your engineering requirements or project..."
                                class="lm-input w-full px-4 py-3 text-sm border border-navy/15 bg-[#f7f9fc] resize-none font-body @error('message') border-red-500 @enderror"
                            >{{ old('message') }}</textarea>
                            @error('message')
                                <p class="text-red-500 text-xs mt-1 font-body">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="sm:col-span-2">
                            <button type="submit" class="lm-mobile-full-btn inline-flex items-center gap-2 px-8 py-3.5 font-heading font-bold uppercase tracking-[0.12em] text-sm bg-navy text-white transition-all hover:brightness-110">
                                Send Inquiry
                                <x-lm.icon name="send" :size="14" />
                            </button>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>
</section>

<section class="h-64 relative overflow-hidden bg-cream">
    <img src="{{ $images['islandBoat'] }}" alt="Maldives operations" class="absolute inset-0 w-full h-full object-cover opacity-40">
    <div class="absolute inset-0 flex items-center justify-center">
        <div class="text-center">
            <x-lm.icon name="map-pin" :size="32" class="text-gold mx-auto mb-2" />
            <p class="font-heading font-bold text-sm uppercase tracking-widest text-navy">{{ $brand['location'] }}</p>
            <p class="text-gray-500 text-xs mt-1 font-body">Serving engineering operations across the Maldives</p>
        </div>
    </div>
</section>
@endsection
