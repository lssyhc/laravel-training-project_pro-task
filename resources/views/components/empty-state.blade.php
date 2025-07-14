@props(['message', 'action' => null, 'route' => null, 'label' => null])

<div class="rounded-lg bg-white p-6 text-center shadow-sm dark:bg-gray-800">
    <p class="text-muted">{{ $message }}
        @if ($action && $route && $label)
            <a class="text-indigo-600 hover:underline" href="{{ $route }}">{{ $label }}</a>!
        @endif
    </p>
</div>
