@props(['variant' => 'primary', 'size' => 'default'])

<a {{ $attributes->merge([
    'class' => 'btn btn-' . $variant . ($size === 'small' ? ' btn-sm' : ''),
]) }}>
    {{ $slot }}
</a>
