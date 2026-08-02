@props(['href' => null, 'type' => 'button', 'variant' => 'secondary'])

@php
    $baseClasses = 'inline-flex items-center justify-center rounded-3xl px-5 py-3 text-sm font-semibold transition focus:outline-none focus:ring-2 focus:ring-indigo-500/50';

    $variantClasses = match ($variant) {
        'primary' => 'border border-indigo-500/30 bg-indigo-500 text-white hover:bg-indigo-400',
        'danger' => 'border border-red-500/30 bg-red-500 text-white hover:bg-red-400',
        'ghost' => 'border border-slate-700 bg-transparent text-slate-200 hover:bg-slate-800/90',
        default => 'border border-slate-700 bg-slate-900/85 text-slate-200 hover:bg-slate-800/95',
    };

    $classes = trim($baseClasses . ' ' . $variantClasses . ' ' . ($attributes->get('class') ?? ''));
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </button>
@endif
