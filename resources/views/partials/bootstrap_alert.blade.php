@if (session()->has('error'))
    <div class="alert alert-danger text-bg-danger alert-dismissible d-flex align-items-center mt-3" role="alert">
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        <iconify-icon icon="solar:danger-triangle-bold-duotone" class="fs-20 me-1"></iconify-icon>
        <div class="lh-1"><strong> {{ session()->get('error') }}</strong></div>
    </div>
@elseif(session()->has('success'))
    <div class="alert alert-success text-bg-success alert-dismissible d-flex align-items-center mt-3" role="alert">
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        <iconify-icon icon="solar:check-read-line-duotone" class="fs-20 me-1"></iconify-icon>
        <div class="lh-1"><strong> {{ session()->get('success') }}</strong></div>
    </div>
@endif