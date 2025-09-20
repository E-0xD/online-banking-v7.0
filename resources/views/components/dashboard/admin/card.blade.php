 @props([
     'header' => null,
     'footer' => null,
 ])
 <div class="card">
     @if ($header)
         <div class="card-header">
             <h4 class="card-title mb-0">{{ $header }}</h4>
         </div>
     @endif

     <div class="card-body">
         {{ $slot }}
     </div>

     @if ($footer)
         <div class="card-footer">
             {{ $footer }}
         </div>
     @endif
 </div>
