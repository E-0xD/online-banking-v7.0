@props([
    'href' => null,
    'back' => 'Back',
    'submit' => 'Submit',
])
<div class="mb-3">
    <a href="{{ $href }}" class="btn btn-primary"><i class="fa-solid fa-arrow-left me-1"></i>
        {{ $back }}</a>
    <button type="submit" class="btn btn-success"><i class="fa-solid fa-paper-plane me-1"></i>
        {{ $submit }}</button>
</div>