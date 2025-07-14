@props(['name', 'label', 'value' => null, 'type' => 'text', 'required' => false])

<div>
    <label class="form-label" for="{{ $name }}">{{ $label }}</label>
    <input id="{{ $name }}" name="{{ $name }}" type="{{ $type }}" value="{{ old($name, $value) }}"
        {{ $required ? 'required' : '' }} {{ $attributes->merge(['class' => 'form-input']) }}>
    @error($name)
        <p class="form-error">{{ $message }}</p>
    @enderror
</div>
