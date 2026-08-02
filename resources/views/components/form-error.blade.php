@props(['message' => null, 'context' => null])

@php
    $fallbackMessage = $message ?? 'Please make sure the form is filled out correctly.';
    $contextLabel = trim((string) ($context ?? $slot));
    if ($contextLabel !== '') {
        $fallbackMessage = 'Please make sure to enter a valid ' . $contextLabel . ' information.';
    }
@endphp

<div class="rounded-3xl border border-white/10 bg-slate-900/70 p-5 text-sm text-slate-400">
    @if ($errors->any())
        <ul class="list-disc pl-5">
            @foreach ($errors->all() as $error)
                <li class="text-red-500">{{ $error }}</li>
            @endforeach
        </ul>
    @else
        <p class="text-sm font-semibold text-slate-200">{{ $fallbackMessage }}</p>
    @endif
</div>