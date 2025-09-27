<div class="card shadow-sm border-0">
    <div class="card-body">
        <h5 class="mb-3">Bank Transfer</h5>

        <p class="small text-muted mb-2">Please transfer to the bank details below:</p>
        <ul class="list-unstyled">
            <li><strong>Bank Name:</strong> {{ $setting->bank_name }}</li>
            <li><strong>Account Number:</strong> {{ $setting->account_number }}</li>
            <li><strong>Account Name:</strong> {{ $setting->account_name }}</li>
            <li><strong>Account Name:</strong> {{ $setting->account_name }}</li>
            @if ($setting->routing_number)
                <li><strong>Routing Number:</strong> {{ $setting->routing_number }}</li>
            @endif
            @if ($setting->bank_swift_code)
                <li><strong>Swift Code:</strong> {{ $setting->bank_swift_code }}</li>
            @endif
            @if ($setting->bank_iban)
                <li><strong>Iban Number:</strong> {{ $setting->bank_iban }}</li>
            @endif
        </ul>

        <form method="POST" action="{{ route('user.deposit.bank_transfer_payment.store', $deposit->reference_id) }}"
            enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="mb-3">
                <label for="payment_proof" class="form-label">Upload Payment Proof *</label>
                <input type="file" id="payment_proof" name="payment_proof"
                    class="form-control @error('payment_proof') is-invalid @enderror" accept=".jpg,.jpeg,.png,.pdf"
                    required>
                @error('payment_proof')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <x-dashboard.user.form-button class="btn btn-success w-100" icon="fa-solid fa-building-columns me-1"
                name="Submit Bank Transfer Proof" />
        </form>
    </div>
</div>
