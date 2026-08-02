@props([
    'options' => [],
    'value' => null,
    'label' => '',
    'name' => 'type'
])

<label class="block">
    <span class="text-sm font-semibold text-slate-200">{{ $label }}</span>
    <select name="{{ $name }}"
        {{ $attributes->merge(['class' => 'mt-2 w-full rounded-3xl border border-slate-700 bg-slate-900/90 px-4 py-3 text-slate-100 shadow-inner shadow-black/20 outline-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/25']) }}>
        @foreach ($options as $key => $option)
            <option value="{{ is_numeric($key) ? $option : $key }}" @selected(old($name, $value) == (is_numeric($key) ? $option : $key))>
                {{ $option }}
            </option>
        @endforeach
    </select>
</label>
