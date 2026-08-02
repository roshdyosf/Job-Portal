@props(['name' => '', 'label' => null, 'type' => 'text', 'value' => null, 'placeholder' => '', 'required' => false, 'autocomplete' => null, 'help' => null])

<x-form-input :name="$name" :label="$label" :type="$type" :value="$value" :placeholder="$placeholder"
    :required="$required" :autocomplete="$autocomplete" :help="$help" {{ $attributes }}>
    {{ $slot }}
</x-form-input>