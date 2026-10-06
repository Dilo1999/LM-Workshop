@php
    $brand = config('lm-workshop.brand');
@endphp

{{-- Floating quick-action bar (phones only) --}}
<nav class="lm-action-bar md:hidden" aria-label="Quick actions" data-action-bar>
    <a href="tel:{{ preg_replace('/\s+/', '', $brand['phone']) }}" class="lm-action-item">
        <x-lm.icon name="phone" :size="19" />
        <span>Call</span>
    </a>
    <a href="{{ $cta['general_whatsapp'] }}" class="lm-action-item" target="_blank" rel="noopener noreferrer">
        <x-lm.icon name="message-circle" :size="19" />
        <span>WhatsApp</span>
    </a>
    <a href="{{ $cta['quote'] }}" class="lm-action-primary">
        Get a Quote
        <x-lm.icon name="arrow-right" :size="16" />
    </a>
</nav>
