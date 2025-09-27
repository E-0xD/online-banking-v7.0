<div class="d-flex justify-content-center mb-5">
    <div class="card shadow-sm border-0 text-center p-4" style="max-width: 22rem;">

        <!-- Icon -->
        <div class="d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center bg-primary rounded-3 mb-3"
                style="width: 3rem; height: 3rem;">
                <i class="fas fa-qrcode text-white"></i>
            </div>
        </div>

        <!-- Title -->
        <h5 class="fw-semibold mb-3">Scan QR Code</h5>

        @if (!$wallet->qr_code_path)
            <!-- QR Code -->
            <div class="bg-light border rounded-3 p-3 mb-3 d-flex justify-content-center">
                {{-- <img src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&amp;data=bitcoin%3Abc1qep6feen644je9lryt23cwe4mp5ee99ldlrg0sg%3Famount%3D10000"
                                        alt="Payment QR Code" class="img-fluid rounded" style="max-width: 11rem;"> --}}

                <img src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data={{ $wallet->address }}?amount={{ $deposit->amount }}"
                    alt="Payment QR Code" class="img-fluid rounded" style="max-width: 11rem;">
            </div>
        @else
            <!-- QR Code -->
            <div class="bg-light border rounded-3 p-3 mb-3 d-flex justify-content-center">
                <img src="{{ asset($wallet->qr_code_path) }}" alt="Payment QR Code" class="img-fluid rounded"
                    style="max-width: 11rem;">
            </div>
        @endif

        <!-- Note -->
        <p class="text-muted small mb-3">Scan with your payment app</p>

        <!-- Address and Amount -->
        <div class="w-100">
            <div class="mb-3">
                <p class="small fw-medium mb-1">Bitcoin Address:</p>
                <p class="small text-muted bg-light p-2 rounded break-word">
                    {{ $wallet->address }}
                </p>
            </div>
            <div>
                <p class="small fw-medium mb-1">Amount:</p>
                <p class="small fw-semibold text-dark">
                    {{ currency($deposit->user->currency) }}{{ formatAmount($deposit->amount) }}</p>
            </div>
        </div>

    </div>
</div>

<x-dashboard.user.card>
    <form action="{{ route('user.deposit.payment', $deposit->reference_id) }}" method="post"
        enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="mb-3">
            <label for="bitcoin_address" class="form-label"> <i class="fa-solid fa-credit-card"></i>
                Bitcoin Address *</label>
            <div class="input-group">
                <input type="text" id="bitcoin_address" name="bitcoin_address" class="form-control"
                    value="{{ $wallet->address }}" readonly>
                <button type="button" class="btn btn-outline-secondary" onclick="copyToClipboard('bitcoin_address')"
                    title="Copy address">
                    <i class="ti ti-copy"></i>
                </button>
            </div>
            <small>
                Network Type: {{ $wallet->network }}</small>
        </div>

        <div class="mb-3">
            <label for="payment_proof" class="form-label">Upload Payment Proof</label>
            <input type="file" id="payment_proof" name="payment_proof"
                class="form-control @error('payment_proof') is-invalid @enderror" accept=".jpg,.jpeg,.png">
            @error('payment_proof')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <x-dashboard.user.form-button class="btn btn-primary" icon="fa-solid fa-check-circle me-1"
            name="Submit Payment" />

    </form>
</x-dashboard.user.card>
