<!-- Left Column -->
<div class="col-12 col-lg-8 d-flex flex-column gap-4">

    <!-- Balance Card -->
    <div class="card bg-primary text-white rounded-4 shadow-lg position-relative overflow-hidden">
        <!-- Background Circles -->
        <div class="position-absolute top-0 end-0 translate-middle opacity-25">
            <div class="bg-white rounded-circle" style="width: 8rem; height: 8rem;"></div>
        </div>
        <div class="position-absolute bottom-0 start-0 translate-middle opacity-25">
            <div class="bg-white rounded-circle" style="width: 6rem; height: 6rem;"></div>
        </div>
        <div class="position-absolute top-50 start-50 translate-middle opacity-25">
            <div class="bg-white rounded-circle" style="width: 5rem; height: 5rem;"></div>
        </div>

        <!-- Card Body -->
        <div class="card-body position-relative">
            <!-- Bank Info Row -->
            <div class="d-flex justify-content-between align-items-start mb-4">
                <div>
                    <div class="d-flex align-items-center mb-1">
                        <div class="bg-white bg-opacity-25 rounded d-flex align-items-center justify-content-center me-2"
                            style="width: 24px; height: 24px;">
                            <i class="fa-solid fa-university text-white small"></i>
                        </div>
                        <p class="mb-0 fw-semibold">{{ config('app.name') }}</p>
                    </div>
                    <small class="text-white-50">Primary Account</small>
                </div>
                <div class="bg-white bg-opacity-25 rounded px-3 py-2 text-end">
                    <small class="text-uppercase text-white-50 d-block">Account Number</small>
                    <span class="fw-bold">•••••• {{ substr($user->account_number, -4) }}</span>
                </div>
            </div>

            <!-- Account Details -->
            <div class="row text-center g-3 mb-4">
                <!-- Account Holder -->
                <div class="col-12 col-md-3 text-start">
                    <small class="text-white-50">Account Holder</small>
                    <p class="fw-semibold mb-2">{{ $user->name . ' ' . $user->middle_name . ' ' . $user->last_name }}
                    </p>
                    <div class="d-flex align-items-center mb-1">
                        <div class="bg-success rounded-circle me-2" style="width:8px; height:8px;">
                        </div>
                        <small>Account State</small>
                    </div>
                    <div class="d-flex align-items-center">
                        @if ($user->account_state->value === 'Pending Verification')
                            <i class="fa-solid fa-clock text-warning small me-2"></i>
                            <small>Verification Pending</small>
                        @elseif($user->account_state->value === 'Active')
                            <i class="fa-solid fa-check text-success small me-2"></i>
                            <small>Active</small>
                        @elseif($user->account_state->value === 'dormant')
                            <i class="fa-solid fa-ban text-danger small me-2"></i>
                            <small>Dormant</small>
                        @elseif($user->account_state->value === 'Restricted')
                            <i class="fa-solid fa-ban text-danger small me-2"></i>
                            <small>Restricted</small>
                        @elseif($user->account_state->value === 'Frozen')
                            <i class="fa-solid fa-ban text-danger small me-2"></i>
                            <small>Frozen</small>
                        @elseif($user->account_state->value === 'Closed')
                            <i class="fa-solid fa-ban text-danger small me-2"></i>
                            <small>Account Closed</small>
                        @elseif($user->account_state->value === 'Suspended')
                            <i class="fa-solid fa-ban text-danger small me-2"></i>
                            <small>Suspended</small>
                        @endif
                    </div>
                </div>

                <!-- Fiat Balance -->
                <div class="col-12 col-md-3 position-relative">
                    <small class="text-white-50">Fiat Balance</small>
                    <h4 class="fw-bold mb-1 balance-amount"
                        data-original="{{ currency($user->currency) }}{{ formatAmount($user->account_balance) }}">
                        {{ currency($user->currency) }}{{ formatAmount($user->account_balance) }}</h4>
                    <small class="text-white-50">{{ currency($user->currency, 'code') }} Balance</small>
                    <!-- Eye Toggle -->
                    <button class="btn btn-sm btn-light position-absolute top-0 end-0 mt-5 me-2 toggle-balance">
                        <i class="fa-solid fa-eye"></i>
                    </button>
                </div>

                <!-- BTC Balance -->
                <div class="col-12 col-md-3">
                    <small class="text-white-50">Bitcoin Balance</small>
                    <p class="fw-bold mb-1 balance-amount"
                        data-original="{{ formatAmount($user->bitcoin_balance, 8) }} BTC">
                        {{ formatAmount($user->bitcoin_balance, 8) }} BTC
                    </p>
                    <small class="d-block text-white-50">
                        ≈ ${{ formatAmount($user->bitcoin_balance * $btcPrice) }}
                    </small>
                    <div class="d-flex justify-content-center align-items-center mt-1">
                        <div class="bg-warning rounded-circle me-1" style="width:6px; height:6px;">
                        </div>
                        <small class="text-white-50">{{ "1 BTC = $" . formatAmount($btcPrice) }}</small>
                    </div>
                </div>

                <!-- ETH Balance -->
                <div class="col-12 col-md-3">
                    <small class="text-white-50">Ethereum Balance</small>
                    <p class="fw-bold mb-1 balance-amount"
                        data-original="{{ formatAmount($user->ethereum_balance, 8) }} ETH">
                        {{ formatAmount($user->ethereum_balance, 8) }} ETH</p>
                    <small class="d-block text-white-50">
                        ≈ ${{ formatAmount($user->ethereum_balance * $ethPrice) }}
                    </small>
                    <div class="d-flex justify-content-center align-items-center mt-1">
                        <div class="bg-purple rounded-circle me-1" style="width:6px; height:6px; background:#6f42c1;">
                        </div>
                        <small class="text-white-50">{{ "1 ETH = $" . formatAmount($ethPrice) }}</small>
                    </div>
                </div>
            </div>

            <!-- Bottom Buttons -->
            <div class="d-flex justify-content-between align-items-center">
                <div class="bg-white bg-opacity-25 rounded px-3 py-2">
                    <small class="text-white-50">Total Portfolio</small>
                    <p class="fw-bold mb-0 balance-amount"
                        data-original="{{ currency($user->currency) }}{{ formatAmount($user->account_balance) }}">
                        {{ currency($user->currency) }}{{ formatAmount($user->account_balance) }}</p>
                </div>
                <div class="d-flex gap-2">
                    <button class="btn btn-light btn-sm d-flex align-items-center">
                        <i class="fa-solid fa-paper-plane me-1"></i> Send Money
                    </button>
                    <a href="{{ route('user.deposit.index') }}"
                        class="btn btn-warning btn-sm d-flex align-items-center">
                        <i class="fa-solid fa-plus me-1"></i> Add Money
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="card shadow-sm border">
        <div class="card-body">
            <h5 class="card-title mb-3">Quick Actions</h5>
            <div class="row g-3 text-center">
                <div class="col-6 col-md-3">
                    <a href="#" class="text-decoration-none d-block p-2 rounded hover-shadow">
                        <div
                            class="bg-primary rounded mb-2 p-3 d-inline-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-exchange-alt text-white"></i>
                        </div>
                        <small class="text-dark">Transfer</small>
                    </a>
                </div>
                <div class="col-6 col-md-3">
                    <a href="#" class="text-decoration-none d-block p-2 rounded hover-shadow">
                        <div
                            class="bg-success rounded mb-2 p-3 d-inline-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-file-invoice text-white"></i>
                        </div>
                        <small class="text-dark">Pay Bills</small>
                    </a>
                </div>
                <div class="col-6 col-md-3">
                    <a href="#" class="text-decoration-none d-block p-2 rounded hover-shadow">
                        <div class="bg-info rounded mb-2 p-3 d-inline-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-hand-holding-dollar text-white"></i>
                        </div>
                        <small class="text-dark">Request</small>
                    </a>
                </div>
                <div class="col-6 col-md-3">
                    <a href="#" class="text-decoration-none d-block p-2 rounded hover-shadow">
                        <div
                            class="bg-warning rounded mb-2 p-3 d-inline-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-building-columns text-white"></i>
                        </div>
                        <small class="text-dark">Bank Details</small>
                    </a>
                </div>
            </div>
        </div>
    </div>

</div>
