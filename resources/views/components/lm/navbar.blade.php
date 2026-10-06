@php
    $navLinks = config('lm-workshop.nav');
    $brand = config('lm-workshop.brand');
@endphp

<nav
    id="main-nav"
    class="fixed top-0 left-0 right-0 z-50 transition-all duration-300 bg-navy-deep/96 backdrop-blur-md border-b border-transparent overflow-visible"
    data-nav
>
    <div class="max-w-7xl mx-auto px-6 flex items-center justify-between h-16 overflow-visible">
        <a href="{{ route('home') }}" class="flex items-center select-none shrink-0 -ml-3">
            <img
                src="{{ asset(config('lm-workshop.images.logo')) }}"
                alt="{{ config('lm-workshop.brand.name') }}"
                class="h-[5.5rem] w-auto"
                width="440"
                height="220"
            >
        </a>

        <ul class="hidden xl:flex items-center gap-6">
            @foreach($navLinks as $link)
                <li>
                    <a
                        href="{{ route($link['route']) }}"
                        class="text-xs font-heading font-bold uppercase tracking-[0.1em] transition-colors {{ request()->routeIs($link['route']) ? 'text-gold-light' : 'text-white/75 hover:text-white' }}"
                    >
                        {{ $link['label'] }}
                    </a>
                </li>
            @endforeach
        </ul>

        <div class="flex items-center gap-3">
            <a
                href="{{ $cta['quote'] }}"
                class="hidden sm:inline-flex items-center gap-1.5 px-5 py-2 text-xs font-heading font-bold tracking-[0.12em] uppercase bg-gold text-white transition-all hover:brightness-110"
            >
                Request a Quote
                <x-lm.icon name="chevron-right" :size="11" />
            </a>
            <button
                type="button"
                class="lm-menu-btn xl:hidden text-white p-1"
                data-mobile-menu-toggle
                aria-label="Toggle menu"
                aria-expanded="false"
            >
                <span data-mobile-menu-icon="open"><x-lm.icon name="menu" :size="22" /></span>
                <span data-mobile-menu-icon="close" class="hidden"><x-lm.icon name="x" :size="22" /></span>
            </button>
        </div>
    </div>

    <div class="lm-drawer xl:hidden hidden" data-mobile-menu-panel>
        <p class="lm-drawer-kicker">Menu</p>
        <ul class="lm-drawer-list">
            @foreach($navLinks as $i => $link)
                <li style="--i: {{ $i }}">
                    <a
                        href="{{ route($link['route']) }}"
                        class="lm-drawer-link {{ request()->routeIs($link['route']) ? 'is-active' : '' }}"
                        @if(request()->routeIs($link['route'])) aria-current="page" @endif
                        data-mobile-menu-close
                    >
                        <span class="lm-drawer-num">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</span>
                        <span class="lm-drawer-label">{{ $link['label'] }}</span>
                        <x-lm.icon name="chevron-right" :size="16" class="lm-drawer-chevron" />
                    </a>
                </li>
            @endforeach
        </ul>

        <div class="lm-drawer-quick">
            <a href="tel:{{ preg_replace('/\s+/', '', $brand['phone']) }}" class="lm-drawer-tile">
                <x-lm.icon name="phone" :size="18" />
                <span>Call</span>
            </a>
            <a href="{{ $cta['general_whatsapp'] }}" class="lm-drawer-tile" target="_blank" rel="noopener noreferrer">
                <x-lm.icon name="message-circle" :size="18" />
                <span>WhatsApp</span>
            </a>
            <a href="mailto:{{ $brand['email'] }}" class="lm-drawer-tile">
                <x-lm.icon name="mail" :size="18" />
                <span>Email</span>
            </a>
        </div>

        <a href="{{ $cta['quote'] }}" class="lm-drawer-cta" data-mobile-menu-close>
            Request a Quote
            <x-lm.icon name="arrow-right" :size="16" />
        </a>
        <a href="{{ $cta['emergency'] }}" class="lm-drawer-emergency">
            <span class="lm-live-dot" aria-hidden="true"></span>
            24/7 Emergency Support · {{ $brand['emergency_phone'] }}
        </a>
    </div>
</nav>
