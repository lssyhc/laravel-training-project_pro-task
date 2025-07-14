@props(['name', 'label', 'value' => null, 'required' => false, 'rows' => 4])

<div>
    <label class="form-label" for="{{ $name }}">{{ $label }}</label>
    <textarea id="{{ $name }}" name="{{ $name }}" rows="{{ $rows }}" {{ $required ? 'required' : '' }}
        {{ $attributes->merge(['class' => 'form-input']) }}>{{ old($name, $value) }}</textarea>
    @error($name)
        <p class="form-error">{{ $message }}</p>
    @enderror
</div>
