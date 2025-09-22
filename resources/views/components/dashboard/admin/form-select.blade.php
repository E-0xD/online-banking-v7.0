 @props([
     'type' => 'text',
     'id' => null,
     'label' => null,
     'name' => null,
     'value' => '',
     'class' => null,
     'options' => [],
     'currencies' => [],
     'formText' => null,
 ])

 <div class="{{ $class }}">
     @if ($label)
         <label for="{{ $id ?? $name }}" class="form-label">{{ $label }}</label>
     @endif

     @if ($type === 'select')
         <select id="{{ $id ?? $name }}" name="{{ $name }}"
             class="form-select @error($name) is-invalid @enderror">
             <option value="">Select {{ $label }}</option>
             @foreach ($options as $option)
                 <option value="{{ $option }}" {{ old($name, $value) == $option ? 'selected' : '' }}>
                     {{ $option }}
                 </option>
             @endforeach
         </select>
     @elseif($type === 'currencies')
         <select id="{{ $id ?? $name }}" name="{{ $name }}"
             class="form-select @error($name) is-invalid @enderror">
             <option value="">Select {{ $label }}</option>
             @foreach ($currencies as $currency)
                 <option value="{{ $currency['name'] }}-{{ $currency['code'] }}-{{ $currency['symbol'] }}"
                     {{ old($name, $value) == $currency['name'] . '-' . $currency['code'] . '-' . $currency['symbol'] ? 'selected' : '' }}>
                     {{ $currency['name'] }}</option>
             @endforeach
         </select>
     @elseif($type === 'selectKeyValuePair')
         <select id="{{ $id ?? $name }}" name="{{ $name }}"
             class="form-select @error($name) is-invalid @enderror">
             <option value="">Select {{ $label }}</option>
             @foreach ($options as $key => $value)
                 <option value="{{ $key }}" {{ old($name, $value) == $key ? 'selected' : '' }}>
                     {{ $value }}
                 </option>
             @endforeach
         </select>
     @endif

     @error($name)
         <span class="invalid-feedback">{{ $message }}</span>
     @enderror

     @if ($formText)
         <small class="form-text text-muted">
             {{ $formText }}
         </small>
     @endif
 </div>
