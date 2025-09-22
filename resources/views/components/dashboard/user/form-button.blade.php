@props([
    'name' => 'Submit',
    'class' => 'btn btn-primary',
    'icon' => 'fa-solid fa-paper-plane me-1',
])
<button type="submit" class="{{ $class }}"><i class="{{ $icon }}"></i>{{ $name }}</button>
