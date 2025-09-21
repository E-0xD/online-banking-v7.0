@props([
    'options' => [],
])
<ul class="space-y-2 list-unstyled">
    @foreach ($options as $option)
        <li class="flex items-start">
            <i class="fa-solid fa-check-circle text-success text-xs mr-2 mt-0.5 flex-shrink-0"></i>
            <span class="text-xs">{{ $option }}</span>
        </li>
    @endforeach
</ul>
