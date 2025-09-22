 @props([
     'header' => null,
     'footer' => null,
     'style' => null,
 ])
 <div class="card" style="{{ $style }}">
     @if ($header)
         <div class="card-header border-bottom">
             <h4 class="card-title mb-0">{{ $header }}</h4>
         </div>
     @endif

     <div class="card-body">
         {{ $slot }}
     </div>

     @if ($footer)
         <div class="card-footer border-top">
             {{ $footer }}
         </div>
     @endif
 </div>