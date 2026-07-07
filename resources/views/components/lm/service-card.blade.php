@props(['icon', 'title', 'desc'])

<div class="group service-card p-8 border">
    <div class="w-12 h-12 flex items-center justify-center mb-5 bg-cream transition-transform duration-300 group-hover:scale-110">
        <x-lm.icon :name="$icon" :size="22" class="text-gold" />
    </div>
    <h3 class="font-heading font-bold mb-3 text-lg text-navy">{{ $title }}</h3>
    <p class="text-gray-500 text-sm leading-relaxed font-body">{{ $desc }}</p>
</div>
