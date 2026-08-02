@props([
    'label' => null,
    'name' => '',
    'type' => 'text',
    'value' => null,
    'placeholder' => '',
    'required' => false,
    'autocomplete' => null,
    'help' => null,
    'id' => null
])

@php
    $inputId = $id ?? $name;
    $inputValue = $value ?? old($name) ?? '';

    // تجميع الـ Attributes الخاصة بعنصر الـ input فقط
    $inputAttributes = $attributes->merge([
        'id' => $inputId,
        'name' => $name,
        'type' => $type,
        'value' => $inputValue,
        'placeholder' => $placeholder,
        'required' => (bool) $required,
        'autocomplete' => $autocomplete,
        'class' => 'mt-2 w-full rounded-3xl border border-slate-700 bg-slate-900/90 px-4 py-3 text-slate-100 placeholder:text-slate-500 shadow-inner shadow-black/20 outline-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/25',
    ]);
@endphp

<div class="block">
@if ($label || $slot->isNotEmpty())
    <label for="{{ $inputId }}" class="block text-sm font-semibold text-slate-200">
        {{ $label ?? $slot }}
        </label>
@endif

    <input {{ $inputAttributes }} />

@if ($help)
    <p class="mt-2 text-sm text-slate-400">{{ $help }}</p>
@endif
</div>
