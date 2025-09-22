 @props([
     'title' => null,
     'description' => null,
     'icon' => 'fa-solid fa-info',
     'listIcon' => null,
     'bgColor' => 'bg-primary',
     'options' => [],
 ])
 <div class="{{ $bgColor }} bg-opacity-10 p-3 mb-3">
     <!-- Header -->
     <h6 class="text-primary fw-semibold mb-2 d-flex align-items-center text-uppercase small">
         @if ($icon)
             <i class="{{ $icon }} text-primary me-1"></i>
         @endif
         @if ($title)
             {{ $title }}
         @endif
     </h6>
     @if ($description)
         <!-- Description -->
         <p class="text-primary small mb-2">
             {{ $description }}
         </p>
     @endif

     <!-- List -->
     <ul class="list-unstyled mb-0 small">
         @foreach ($options as $option)
             <li class="d-flex align-items-center mb-1 text-primary">
                 <span
                     class="me-1 d-inline-flex align-items-center justify-content-center rounded-circle {{ $bgColor }}"
                     style="width:6px;height:6px;"></span>
                 @if ($listIcon)
                     <i class="{{ $listIcon }}"></i>
                 @endif
                 {{ $option }}
             </li>
         @endforeach
     </ul>
 </div>
