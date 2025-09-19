@props([
    'options' => [],
])
<dl class="row">
    @foreach ($options as $key => $value)
        @if ($key === 'image')
            <dt class="col-sm-4">{{ $value['label'] }}:</dt>
            <dd class="col-sm-8">
                @if ($value['src'])
                    <img src="{{ asset($value['src']) }}" alt="{{ $value['alt'] }}" class="{{ $value['class'] }}"
                        width="{{ $value['width'] }}">
                @else
                    {{ @$qrCode }}
                @endif
            </dd>
        @elseif($key === 'badge')
            <dt class="col-sm-4">{{ $value['label'] }}:</dt>
            <dd class="col-sm-8">
                <span class="{{ $value['badge'] }}">{{ $value['value'] }}</span>
            </dd>
        @else
            <dt class="col-sm-4">{{ $key }}:</dt>
            <dd class="col-sm-8">{{ $value }}</dd>
        @endif
    @endforeach
</dl>
