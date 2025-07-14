@props(['variant' => 'primary', 'size' => 'default'])

<button
    {{ $attributes->merge([
        'type' => 'submit',
        'class' => 'btn btn-' . $variant . ($size === 'small' ? ' btn-sm' : ''),
    ]) }}>
    {{ $slot }}
</button>
