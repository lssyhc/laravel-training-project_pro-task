@props(['rounded' => true, 'bordered' => true])

<div
    {{ $attributes->merge([
        'class' => 'card ' . ($rounded ? 'card-rounded ' : '') . ($bordered ? 'card-bordered' : ''),
    ]) }}>
    <div class="card-body">
        {{ $slot }}
    </div>
</div>
