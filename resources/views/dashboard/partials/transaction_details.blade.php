<dl class="row">
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

    @if ($transaction->transfer)
        <dt class="col-sm-3">Beneficiary Account</dt>
        <dd class="col-sm-9">
            {{ $transaction->transfer->account_number }}
        </dd>

        <dt class="col-sm-3">Beneficiary Name</dt>
        <dd class="col-sm-9">
            {{ $transaction->transfer->account_name }}
        </dd>

        <dt class="col-sm-3">Beneficiary Bank</dt>
        <dd class="col-sm-9">
            {{ $transaction->transfer->bank_name }}
        </dd>

        @if ($transaction->transfer->swift_code)
            <dt class="col-sm-3">Beneficiary SWIFT Code</dt>
            <dd class="col-sm-9">
                {{ $transaction->transfer->swift_code }}
            </dd>
        @endif

        @if ($transaction->transfer->iban_code)
            <dt class="col-sm-3">Beneficiary IBAN Code</dt>
            <dd class="col-sm-9">
                {{ $transaction->transfer->iban_code }}
            </dd>
        @endif

        @if ($transaction->transfer->routing_number)
            <dt class="col-sm-3">Beneficiary Routing Number</dt>
            <dd class="col-sm-9">
                {{ $transaction->transfer->routing_number }}
            </dd>
        @endif

        <dt class="col-sm-3">Transfer Type</dt>
        <dd class="col-sm-9">
            {{ $transaction->transfer->type->label() }}
        </dd>

        <dt class="col-sm-3">Sender</dt>
        <dd class="col-sm-9">
            {{ $transaction->transfer->user->name }}
            {{ $transaction->transfer->user->middle_name }}
            {{ $transaction->transfer->user->last_name }}
        </dd>
    @else
        <dt class="col-sm-3">Beneficiary Account</dt>
        <dd class="col-sm-9">
            {{ $user->account_number }}
        </dd>

        <dt class="col-sm-3">Beneficiary Name</dt>
        <dd class="col-sm-9">
            {{ $user->name }} {{ $user->middle_name }} {{ $user->last_name }}
        </dd>
    @endif

    <dt class="col-sm-3">Description</dt>
    <dd class="col-sm-9">{{ $transaction->description ?? 'N/A' }}</dd>

    <dt class="col-sm-3">Status</dt>
    <dd class="col-sm-9">
        <span class="{{ $transaction->status->badge() }}">
            {{ $transaction->status->label() }}
        </span>
    </dd>

    <dt class="col-sm-3">Balance After</dt>
    <dd class="col-sm-9">
        {{ currency($user->currency) }}{{ formatAmount($transaction->current_balance) }}
    </dd>

    <dt class="col-sm-3">Date</dt>
    <dd class="col-sm-9">{{ formatDateTime($transaction->transaction_at) }}</dd>
</dl>
