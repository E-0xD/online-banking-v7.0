@props([
    'href' => null,
    'name' => 'Back',
])
<div class="mb-3">
    <a href="{{ $href }}" class="btn btn-primary">{{ $name }}</a>
</div>
