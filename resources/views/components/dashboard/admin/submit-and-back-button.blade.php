@props([
    'href' => null,
    'back' => 'Back',
    'submit' => 'Submit',
])
<div class="mb-3">
    <a href="{{ $href }}" class="btn btn-primary">{{ $back }}</a>
    <button type="submit" class="btn btn-success">{{ $submit }}</button>
</div>
