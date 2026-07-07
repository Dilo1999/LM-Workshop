@php
    $navLinks = config('lm-workshop.nav');
@endphp

<nav
    id="main-nav"
    class="fixed top-0 left-0 right-0 z-50 transition-all duration-300 bg-navy-deep/96 backdrop-blur-md border-b border-transparent"
    data-nav
>
    <div class="max-w-7xl mx-auto px-6 flex items-center justify-between h-16">
        <a href="{{ route('home') }}" class="flex items-center gap-3 select-none">
            <div class="w-9 h-9 flex items-center justify-center font-heading font-bold text-sm bg-gold text-white">LM</div>
            <div>
                <div class="text-white font-heading font-bold tracking-[0.18em] text-sm">WORKSHOP</div>
                <div class="text-gold-light font-body text-[9px] uppercase tracking-wider">{{ config('lm-workshop.brand.tagline') }}</div>
            </div>
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
                href="{{ route('contact') }}"
                class="hidden sm:inline-flex items-center gap-1.5 px-5 py-2 text-xs font-heading font-bold tracking-[0.12em] uppercase bg-gold text-white transition-all hover:brightness-110"
            >
                Let's Talk
                <x-lm.icon name="chevron-right" :size="11" />
            </a>
            <button
                type="button"
                class="xl:hidden text-white p-1"
                data-mobile-menu-toggle
                aria-label="Toggle menu"
                aria-expanded="false"
            >
                <span data-mobile-menu-icon="open"><x-lm.icon name="menu" :size="22" /></span>
                <span data-mobile-menu-icon="close" class="hidden"><x-lm.icon name="x" :size="22" /></span>
            </button>
        </div>
    </div>

    <div class="xl:hidden hidden max-h-[calc(100vh-4rem)] overflow-y-auto px-6 pb-6 pt-2 bg-navy-deep" data-mobile-menu-panel>
        <ul class="flex flex-col gap-0.5">
            @foreach($navLinks as $link)
                <li>
                    <a
                        href="{{ route($link['route']) }}"
                        class="block py-3 px-3 text-sm font-heading font-bold text-white/80 hover:text-white border-b border-white/10 uppercase tracking-widest"
                        data-mobile-menu-close
                    >
                        {{ $link['label'] }}
                    </a>
                </li>
            @endforeach
        </ul>
        <a
            href="{{ route('contact') }}"
            class="mt-4 block text-center py-3 text-sm font-heading font-bold uppercase tracking-widest bg-gold text-white"
            data-mobile-menu-close
        >
            Let's Talk
        </a>
    </div>
</nav>
