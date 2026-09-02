@extends('layouts.app')

@section('content')
@php
    $images = config('lm-workshop.images');
    $brand = config('lm-workshop.brand');
    $services = config('lm-workshop.services');
    $equipmentTypes = config('lm-workshop.contact.equipment_types');
    $urgencyLevels = config('lm-workshop.contact.urgency_levels');
@endphp

<x-lm.section-hero
    label="Reach Out"
    title="Request Engineering Support"
    body="Request a quote, book a site assessment, or get emergency engineering support for marine and industrial operations across the Maldives."
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

                    <div class="flex flex-col gap-2 mb-8">
                        <a href="{{ $cta['emergency'] }}" class="inline-flex items-center justify-center gap-2 px-4 py-2.5 text-xs font-heading font-bold uppercase tracking-[0.12em] bg-gold text-white transition-all hover:brightness-110">
                            Emergency Support
                        </a>
                        <a href="{{ $cta['whatsapp'] }}" class="inline-flex items-center justify-center gap-2 px-4 py-2.5 text-xs font-heading font-bold uppercase tracking-[0.12em] border border-white/20 text-white/80 transition-all hover:bg-white/10" @if(str_starts_with($cta['whatsapp'], 'https://wa.me')) target="_blank" rel="noopener noreferrer" @endif>
                            WhatsApp an Engineer
                        </a>
                        <a href="{{ $cta['site_assessment'] }}" class="inline-flex items-center justify-center gap-2 px-4 py-2.5 text-xs font-heading font-bold uppercase tracking-[0.12em] border border-white/20 text-white/80 transition-all hover:bg-white/10">
                            Book a Site Assessment
                        </a>
                    </div>

                    <div class="flex flex-col gap-5 mb-8">
                        @foreach([
                            ['phone', 'Phone', $brand['phone'], null],
                            ['phone', 'WhatsApp', $brand['whatsapp'], str_starts_with($cta['whatsapp'], 'https://wa.me') ? $cta['whatsapp'] : null],
                            ['mail', 'Email', $brand['email'], 'mailto:' . $brand['email']],
                            ['globe', 'Website', $brand['website'], 'https://' . preg_replace('#^https?://#', '', $brand['website'])],
                            ['map-pin', 'Location', $brand['location'], null],
                        ] as [$icon, $label, $value, $href])
                            <div class="flex items-start gap-3">
                                <div class="w-9 h-9 flex items-center justify-center shrink-0 bg-gold/12">
                                    <x-lm.icon :name="$icon" :size="15" class="text-gold-light" />
                                </div>
                                <div>
                                    <p class="text-xs uppercase tracking-widest text-white/40 mb-0.5 font-heading">{{ $label }}</p>
                                    @if($href)
                                        <a href="{{ $href }}" class="text-white/80 text-sm font-body hover:text-gold-light transition-colors">{{ $value }}</a>
                                    @else
                                        <p class="text-white/80 text-sm font-body">{{ $value }}</p>
                                    @endif
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
                <x-lm.section-label>Request a Quote</x-lm.section-label>
                <h2 class="font-display font-bold mb-8 leading-tight text-display-md text-navy">Tell Us About Your Requirement</h2>
                <p class="text-gray-500 text-sm font-body mb-8 -mt-4">The more detail you provide, the faster we can assess your enquiry and respond.</p>

                @if(session('contact_error'))
                    <div class="mb-6 p-4 border border-red-300 bg-red-50 text-red-700 text-sm font-body">
                        {{ session('contact_error') }}
                    </div>
                @endif

                @if(session('contact_success'))
                    <div class="p-10 border border-gold text-center bg-quote-bg">
                        <div class="w-14 h-14 mx-auto mb-4 flex items-center justify-center bg-gold">
                            <x-lm.icon name="send" :size="24" class="text-white" />
                        </div>
                        <h3 class="font-heading font-bold text-xl mb-2 text-navy">Inquiry Sent</h3>
                        <p class="text-gray-500 text-sm font-body">Thank you for reaching out. Our team will be in touch with you shortly.</p>
                    </div>
                @else
                    <form action="{{ route('contact.store') }}" method="POST" enctype="multipart/form-data" class="grid sm:grid-cols-2 gap-5">
                        @csrf

                        @foreach([
                            ['name', 'Name', 'text', 'Your full name', true],
                            ['company', 'Company Name', 'text', 'Your company', false],
                            ['phone', 'Phone Number', 'tel', '+960 XXX XXXX', false],
                            ['email', 'Email Address', 'email', 'email@company.com', true],
                        ] as [$id, $label, $type, $placeholder, $required])
                            <div>
                                <label for="{{ $id }}" class="block text-xs font-heading font-bold uppercase tracking-widest mb-2 text-navy">{{ $label }}</label>
                                <input
                                    id="{{ $id }}"
                                    name="{{ $id }}"
                                    type="{{ $type }}"
                                    value="{{ old($id) }}"
                                    placeholder="{{ $placeholder }}"
                                    @if($required) required @endif
                                    class="lm-input w-full px-4 py-3 text-sm border border-navy/15 bg-[#f7f9fc] text-navy font-body @error($id) border-red-500 @enderror"
                                >
                                @error($id)
                                    <p class="text-red-500 text-xs mt-1 font-body">{{ $message }}</p>
                                @enderror
                            </div>
                        @endforeach

                        <div>
                            <label for="location" class="block text-xs font-heading font-bold uppercase tracking-widest mb-2 text-navy">Location / Island</label>
                            <input
                                id="location"
                                name="location"
                                type="text"
                                value="{{ old('location') }}"
                                placeholder="e.g. Malé, Hulhumalé, resort island"
                                required
                                class="lm-input w-full px-4 py-3 text-sm border border-navy/15 bg-[#f7f9fc] text-navy font-body @error('location') border-red-500 @enderror"
                            >
                            @error('location')
                                <p class="text-red-500 text-xs mt-1 font-body">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="urgency" class="block text-xs font-heading font-bold uppercase tracking-widest mb-2 text-navy">Urgency</label>
                            <select
                                id="urgency"
                                name="urgency"
                                required
                                class="lm-input w-full px-4 py-3 text-sm border border-navy/15 bg-[#f7f9fc] font-body @error('urgency') border-red-500 @enderror"
                            >
                                <option value="">Select urgency</option>
                                @foreach($urgencyLevels as $value => $label)
                                    <option value="{{ $value }}" @selected(old('urgency', request('urgency')) === $value)>{{ $label }}</option>
                                @endforeach
                            </select>
                            @error('urgency')
                                <p class="text-red-500 text-xs mt-1 font-body">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="equipment_type" class="block text-xs font-heading font-bold uppercase tracking-widest mb-2 text-navy">Equipment Type</label>
                            <select
                                id="equipment_type"
                                name="equipment_type"
                                required
                                class="lm-input w-full px-4 py-3 text-sm border border-navy/15 bg-[#f7f9fc] font-body @error('equipment_type') border-red-500 @enderror"
                            >
                                <option value="">Select equipment type</option>
                                @foreach($equipmentTypes as $type)
                                    <option value="{{ $type }}" @selected(old('equipment_type') === $type)>{{ $type }}</option>
                                @endforeach
                            </select>
                            @error('equipment_type')
                                <p class="text-red-500 text-xs mt-1 font-body">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="service" class="block text-xs font-heading font-bold uppercase tracking-widest mb-2 text-navy">Service Required</label>
                            <select
                                id="service"
                                name="service"
                                class="lm-input w-full px-4 py-3 text-sm border border-navy/15 bg-[#f7f9fc] font-body @error('service') border-red-500 @enderror"
                            >
                                <option value="">Select a service</option>
                                @foreach($services as $service)
                                    <option value="{{ $service['title'] }}" @selected(old('service', request('service')) === $service['title'])>{{ $service['title'] }}</option>
                                @endforeach
                                <option value="Other" @selected(old('service', request('service')) === 'Other')>Other / General Inquiry</option>
                            </select>
                            @error('service')
                                <p class="text-red-500 text-xs mt-1 font-body">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="sm:col-span-2">
                            <label for="problem_description" class="block text-xs font-heading font-bold uppercase tracking-widest mb-2 text-navy">Problem Description</label>
                            <textarea
                                id="problem_description"
                                name="problem_description"
                                rows="5"
                                required
                                placeholder="Describe the issue, symptoms, equipment model, when it started, and any actions already taken..."
                                class="lm-input w-full px-4 py-3 text-sm border border-navy/15 bg-[#f7f9fc] resize-none font-body @error('problem_description') border-red-500 @enderror"
                            >{{ old('problem_description') }}</textarea>
                            @error('problem_description')
                                <p class="text-red-500 text-xs mt-1 font-body">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="sm:col-span-2">
                            <label for="attachment" class="block text-xs font-heading font-bold uppercase tracking-widest mb-2 text-navy">Photo / Document <span class="font-normal normal-case tracking-normal text-gray-400">(optional)</span></label>
                            <input
                                id="attachment"
                                name="attachment"
                                type="file"
                                accept=".jpg,.jpeg,.png,.pdf,.doc,.docx,image/*"
                                class="lm-input w-full px-4 py-3 text-sm border border-navy/15 bg-[#f7f9fc] font-body file:mr-4 file:py-1 file:px-3 file:border-0 file:text-xs file:font-heading file:uppercase file:tracking-wider file:bg-navy file:text-white @error('attachment') border-red-500 @enderror"
                            >
                            <p class="text-gray-400 text-xs mt-1 font-body">JPG, PNG, PDF, DOC or DOCX. Max 10 MB.</p>
                            @error('attachment')
                                <p class="text-red-500 text-xs mt-1 font-body">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="sm:col-span-2">
                            <button type="submit" class="lm-mobile-full-btn inline-flex items-center gap-2 px-8 py-3.5 font-heading font-bold uppercase tracking-[0.12em] text-sm bg-navy text-white transition-all hover:brightness-110">
                                Request a Quote
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
