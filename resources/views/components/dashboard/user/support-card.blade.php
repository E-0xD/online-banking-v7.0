<div class="card text-center border-0 rounded-4 shadow mx-auto">
    <div class="card-body">
        <!-- Icon -->
        <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
            style="width:60px; height:60px;">
            <i class="bi bi-headset text-primary fs-3"></i>
        </div>

        <!-- Heading and subtitle -->
        <h5 class="fw-bold">Need Assistance?</h5>
        <p class="mb-1 small text-muted">Our expert support team is available</p>
        <p class="text-primary fw-semibold mb-4">24/7 Live Support</p>

        <!-- Features -->
        <div class="row g-2 mb-4">
            <div class="col-6">
                <div class="border rounded-3 py-2 h-100">
                    <i class="bi bi-clock text-secondary fs-5 d-block mb-1"></i>
                    <small class="d-block">Quick Response</small>
                    <small class="text-muted">&lt; 5 minutes</small>
                </div>
            </div>
            <div class="col-6">
                <div class="border rounded-3 py-2 h-100">
                    <i class="bi bi-shield-lock text-success fs-5 d-block mb-1"></i>
                    <small class="d-block">Secure Chat</small>
                    <small class="text-muted">Encrypted</small>
                </div>
            </div>
        </div>

        <!-- Button -->
        <a href="{{ route('user.support.index') }}" class="btn btn-primary w-100 mb-2">
            <i class="bi bi-chat-dots-fill me-1"></i> Start Live Chat
        </a>

        <!-- Footer text -->
        <small class="text-muted">
            <i class="bi bi-telephone-fill"></i> Or call us directly for urgent matters
        </small>
    </div>
</div>
