@props([
    'user' => null,
    'badge' => false,
])
<!-- Available Balance -->
<div class="card shadow-sm border-0 mb-4">
    <div class="card-header border-bottom">
        <h4 class="mb-0"><i class="bi bi-wallet2 text-primary"></i> Available Balance</h4>
    </div>
    <div class="card-body">
        <div class="d-flex align-items-center justify-content-between">
            <div>
                <h6 class="mb-1">Account Balance</h6>
                <small class="text-muted">{{ currency($user->currency, 'code') }} Currency</small>
            </div>
            <div class="text-end">
                <h4 class="fw-bold mb-0">
                    {{ currency($user->currency) }}{{ formatAmount($user->account_balance) }}</h4>
                @if ($badge)
                    <span class="badge bg-success-subtle text-success fs-12 p-1">Available for transfer</span>
                @endif
            </div>
        </div>
    </div>
</div>
