 @props([
     'name' => null,
     'label' => null,
     'type' => 'text',
     'id' => null,
     'readonly' => false,
     'required' => false,
     'value' => null,
     'placeholder' => null,
     'formText' => null,
 ])

 <div class="col-md-6 mb-3">
     @if ($label)
         <label for="{{ $id ?? $name }}" class="form-label">{{ $label }}</label>
     @endif

     @if ($type === 'textarea')
         <textarea id="{{ $id ?? $name }}" name="{{ $name }}" class="form-control @error($name) is-invalid @enderror"
             {{ $readonly ? 'readonly' : '' }} {{ $required ? 'required' : '' }} placeholder="{{ $placeholder }}">{{ old($name, $value) }}</textarea>
     @else
         <input type="{{ $type }}" id="{{ $id ?? $name }}" name="{{ $name }}"
             placeholder="{{ $placeholder }}" class="form-control @error($name) is-invalid @enderror"
             value="{{ old($name, $value) }}" {{ $readonly ? 'readonly' : '' }} {{ $required ? 'required' : '' }}>
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
