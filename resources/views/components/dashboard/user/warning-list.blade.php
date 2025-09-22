 @props([
     'title' => null,
     'options' => [],
 ])
 <div class="alert alert-warning d-flex align-items-start p-3">
     <i class="fa-solid fa-exclamation-triangle text-warning me-1 mt-1"></i>
     <div>
         @if ($title)
             <h6 class="fw-semibold mb-1">{{ $title }}</h6>
         @endif
         @foreach ($options as $option)
             <p class="mb-0 small">
                 {{ $option }}
             </p>
         @endforeach
     </div>
 </div>