@props([
    'href' => null,
    'name' => 'Back',
])
<div class="mb-3">
    <a href="{{ $href }}" class="btn btn-primary"> <i class="fa-solid fa-arrow-left me-1"></i>
        {{ $name }}</a>
</div>
