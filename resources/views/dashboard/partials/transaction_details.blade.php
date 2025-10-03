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
</dl>
