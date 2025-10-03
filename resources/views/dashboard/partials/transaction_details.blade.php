{{-- <dl class="row">
    <dt class="col-sm-3">Reference ID</dt>
    <dd class="col-sm-9">{{ $transaction->reference_id }}</dd>

    <dt class="col-sm-3">Type</dt>
    <dd class="col-sm-9">
        {{ $transaction->type->label() }}
    </dd>

    <dt class="col-sm-3">Amount</dt>
    <dd class="col-sm-9">
        @if ($transaction->isDirectionCredit())
            <span class="text-success">+{{ currency($user->currency) }}{{ formatAmount($transaction->amount) }}</span>
        @else
            <span class="text-danger">-{{ currency($user->currency) }}{{ formatAmount($transaction->amount) }}</span>
        @endif
    </dd>

    <dt class="col-sm-3">Balance</dt>
    <dd class="col-sm-9">{{ currency($user->currency) }}{{ formatAmount($transaction->current_balance) }}</dd>

    <dt class="col-sm-3">Description</dt>
    <dd class="col-sm-9">{{ $transaction->description ?? 'N/A' }}</dd>

    <dt class="col-sm-3">Status</dt>
    <dd class="col-sm-9">
        <span class="{{ $transaction->status->badge() }}">
            {{ $transaction->status->label() }}
        </span>
    </dd>

    <dt class="col-sm-3">Date</dt>
    <dd class="col-sm-9">{{ formatDateTime($transaction->transaction_at) }}</dd>

</dl> --}}

<dl class="row">
    {{-- General Transaction Details --}}
    <h5 class="mt-3 mb-3 text-primary fw-bold">Transaction Details</h5>

    <dt class="col-sm-3">Reference ID</dt>
    <dd class="col-sm-9">{{ $transaction->reference_id }}</dd>

    <dt class="col-sm-3">Type</dt>
    <dd class="col-sm-9">{{ $transaction->type->label() }}</dd>

    <dt class="col-sm-3">Amount</dt>
    <dd class="col-sm-9">
        @if ($transaction->isDirectionCredit())
            <span class="text-success">
                +{{ currency($user->currency) }}{{ formatAmount($transaction->amount) }}
            </span>
        @else
            <span class="text-danger">
                -{{ currency($user->currency) }}{{ formatAmount($transaction->amount) }}
            </span>
        @endif
    </dd>

    <dt class="col-sm-3">Balance</dt>
    <dd class="col-sm-9">{{ currency($user->currency) }}{{ formatAmount($transaction->current_balance) }}</dd>

    <dt class="col-sm-3">Description</dt>
    <dd class="col-sm-9">{{ $transaction->description ?? 'N/A' }}</dd>

    <dt class="col-sm-3">Status</dt>
    <dd class="col-sm-9">
        <span class="{{ $transaction->status->badge() }}">
            {{ $transaction->status->label() }}
        </span>
    </dd>

    <dt class="col-sm-3">Date</dt>
    <dd class="col-sm-9">{{ formatDateTime($transaction->transaction_at) }}</dd>

    {{-- Transfer Information --}}
    @if ($transaction->transfer)
        <h5 class="mt-4 mb-3 text-primary fw-bold">Transfer Information</h5>

        <dt class="col-sm-3">Beneficiary Account</dt>
        <dd class="col-sm-9">{{ $transaction->transfer->recipient_account_number }}</dd>

        <dt class="col-sm-3">Beneficiary Name</dt>
        <dd class="col-sm-9">{{ $transaction->transfer->recipient_name }}</dd>

        <dt class="col-sm-3">Beneficiary Bank</dt>
        <dd class="col-sm-9">{{ $transaction->transfer->recipient_bank }}</dd>

        @if ($transaction->transfer->recipient_swift_code)
            <dt class="col-sm-3">Beneficiary SWIFT Code</dt>
            <dd class="col-sm-9">{{ $transaction->transfer->recipient_swift_code }}</dd>
        @endif

        @if ($transaction->transfer->recipient_iban_code)
            <dt class="col-sm-3">Beneficiary IBAN Code</dt>
            <dd class="col-sm-9">{{ $transaction->transfer->recipient_iban_code }}</dd>
        @endif

        @if ($transaction->transfer->recipient_routing_number)
            <dt class="col-sm-3">Beneficiary Routing Number</dt>
            <dd class="col-sm-9">{{ $transaction->transfer->recipient_routing_number }}</dd>
        @endif

        <dt class="col-sm-3">Transfer Type</dt>
        <dd class="col-sm-9">{{ $transaction->transfer->transfer_type->label() }}</dd>

        <dt class="col-sm-3">Sender</dt>
        <dd class="col-sm-9">{{ $transaction->transfer->sender_account_number }}</dd>

        <dt class="col-sm-3">Sender Bank</dt>
        <dd class="col-sm-9">{{ $transaction->transfer->sender_bank }}</dd>
    @endif
    {{-- End Transfer Information --}}
</dl>
