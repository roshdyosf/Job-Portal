@props(['label' => null, 'name' => '', 'type' => 'text', 'value' => null, 'placeholder' => '', 'required' => false, 'autocomplete' => null, 'help' => null, 'id' => null])

@php
    $inputId = $id ?? $name;
    $inputValue = $value ?? old($name) ?? '';
    $inputAttributes = $attributes->merge([
        'id' => $inputId,
        'name' => $name,
        'type' => $type,
        'value' => $inputValue,
        'placeholder' => $placeholder,
        'class' => 'mt-2 w-full rounded-3xl border border-slate-700 bg-slate-900/90 px-4 py-3 text-slate-100 placeholder:text-slate-500 shadow-inner shadow-black/20 outline-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/25',
    ]);

    if ($required) {
        $inputAttributes['required'] = true;
    }

    if ($autocomplete) {
        $inputAttributes['autocomplete'] = $autocomplete;
    }
@endphp

<label {{ $attributes->merge(['class' => 'block']) }}>
    @if ($label ?? $slot->isNotEmpty())
        <span class="text-sm font-semibold text-slate-200">{{ $label ?? $slot }}</span>
    @endif

    <input {{ $inputAttributes }} />

    @if ($help)
        <p class="mt-2 text-sm text-slate-400">{{ $help }}</p>
    @endif
</label>