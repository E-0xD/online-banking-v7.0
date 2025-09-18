@if (session()->has('error'))
    <div class="alert alert-danger shadow-lg flex items-center" role="alert">
        <button type="button" class="close-btn" data-bs-dismiss="alert" aria-label="Close"></button>
        <i class="mr-2 text-xl text-red-600" data-feather="danger-triangle-bold-duotone"></i>
        <div class="lh-1"><strong class="text-red-600">Error - </strong> {{ session()->get('error') }}!</div>
    </div>
@elseif(session()->has('success'))
    <div class="alert alert-success shadow-lg flex items-center" role="alert">
        <button type="button" class="close-btn" data-bs-dismiss="alert" aria-label="Close"></button>
        <i class="mr-2 text-xl text-green-600" data-feather="check-read-line-duotone"></i>
        <div class="lh-1"><strong class="text-green-600">Success - </strong> {{ session()->get('success') }}!</div>
    </div>
@endif