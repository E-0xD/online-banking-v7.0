@props([
    'name' => 'Submit',
    'class' => 'btn btn-success',
    'icon' => null,
])
<button type="submit" class="{{ $class }}"><i class="{{ $icon }}"></i>{{ $name }}</button>
