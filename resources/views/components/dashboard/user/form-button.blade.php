@props([
    'name' => 'Submit',
    'class' => 'btn btn-success',
    'icon' => null,
    'disabled' => false,
])
<button type="submit" class="{{ $class }}" {{ $disabled ? 'disabled' : '' }}><i
        class="{{ $icon }}"></i>{{ $name }}</button>
