<!-- Right Column -->
<div class="col-12 col-lg-4 d-flex flex-column gap-4">
    <!-- Recent Transactions -->
    <div class="card shadow-sm border">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h6 class="fw-bold mb-0">Recent Transactions</h6>
                <a href="{{ route('user.transaction.index') }}" class="small text-primary">View All</a>
            </div>

            <ul class="list-group list-group-flush">
                <!-- Transaction 1 -->
                @forelse ($transactions as $transaction)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            @if ($transaction->isDirectionCredit())
                                <div class="bg-success bg-opacity-25 rounded-circle d-flex align-items-center justify-content-center me-3"
                                    style="width: 45px; height: 45px;">
                                    <i class="fa-solid fa-arrow-down text-success"></i>
                                </div>
                            @else
                                <div class="bg-danger bg-opacity-25 rounded-circle d-flex align-items-center justify-content-center me-3"
                                    style="width: 45px; height: 45px;">
                                    <i class="fa-solid fa-arrow-up text-danger"></i>
                                </div>
                            @endif
                            <div>
                                <p class="mb-0 fw-semibold">{{ $transaction->type->label() }}</p>
                                <small class="text-muted d-block">Ref: {{ $transaction->reference_id }}</small>
                                <small
                                    class="text-muted">{{ date('M d, Y • h:i A', strtotime($transaction->transaction_at)) }}</small>
                            </div>
                        </div>
                        <div class="text-end">
                            @if ($transaction->isDirectionCredit())
                                <span class="fw-bold text-success d-block">
                                    +{{ currency($user->currency) }}{{ formatAmount($transaction->amount) }}
                                </span>
                            @else
                                <span class="fw-bold text-danger d-block">
                                    -{{ currency($user->currency) }}{{ formatAmount($transaction->amount) }}
                                </span>
                            @endif
                            @if ($transaction->isCompleted())
                                <span class="badge bg-success-subtle text-success">Completed</span>
                            @elseif($transaction->isPending())
                                <span class="badge bg-warning-subtle text-warning">Pending</span>
                            @elseif($transaction->isCancelled())
                                <span class="badge bg-secondary-subtle text-secondary">Cancelled</span>
                            @else
                                <span class="badge bg-danger-subtle text-danger">Failed</span>
                            @endif
                        </div>
                    </li>
                @empty
                    <li class="list-group-item text-center">No Transactions</li>
                @endforelse
            </ul>
        </div>
    </div>

    <!-- Account Statistics -->
    <div class="card shadow-lg border">
        <div class="card-header bg-light">
            <h6 class="fw-bold mb-0">
                <i class="fa-solid fa-chart-line me-2"></i> Account Statistics
            </h6>
        </div>
        <div class="card-body">
            <!-- Transaction Limit -->
            <div class="d-flex align-items-center justify-content-between mb-4">
                <div class="d-flex align-items-center">
                    <div class="bg-primary bg-opacity-25 rounded-circle d-flex align-items-center justify-content-center me-3"
                        style="width: 45px; height: 45px;">
                        <i class="fa-solid fa-credit-card text-primary"></i>
                    </div>
                    <div>
                        <p class="small text-muted mb-1">Transaction Limit</p>
                        <h6 class="fw-bold mb-0">{{ currency($user->currency) }}{{ formatAmount($user->account_limit) }}
                        </h6>
                        <small class="text-muted">Daily limit available</small>
                    </div>
                </div>
                <span class="badge bg-light text-primary">●</span>
            </div>

            <hr>

            <!-- Pending Transactions -->
            <div class="d-flex align-items-center justify-content-between mb-4">
                <div class="d-flex align-items-center">
                    <div class="bg-warning bg-opacity-25 rounded-circle d-flex align-items-center justify-content-center me-3"
                        style="width: 45px; height: 45px;">
                        <i class="fa-solid fa-hourglass-half text-warning"></i>
                    </div>
                    <div>
                        <p class="small text-muted mb-1">Pending Transactions</p>
                        <h6 class="fw-bold mb-0">
                            {{ currency($user->currency) }}{{ formatAmount($pendingTransactions) }}
                        </h6>
                        <small class="text-muted">Awaiting processing</small>
                    </div>
                </div>
                <span class="badge bg-light text-warning">●</span>
            </div>

            <hr>

            <!-- Total Volume -->
            <div class="d-flex align-items-center justify-content-between mb-4">
                <div class="d-flex align-items-center">
                    <div class="bg-success bg-opacity-25 rounded-circle d-flex align-items-center justify-content-center me-3"
                        style="width: 45px; height: 45px;">
                        <i class="fa-solid fa-wallet text-success"></i>
                    </div>
                    <div>
                        <p class="small text-muted mb-1">Total Volume</p>
                        <h6 class="fw-bold mb-0">{{ currency($user->currency) }}{{ formatAmount($totalVolume) }}</h6>
                        <small class="text-muted">All-time transactions</small>
                    </div>
                </div>
                <span class="badge bg-light text-success">●</span>
            </div>
        </div>

        <!-- Footer -->
        <div class="card-footer bg-light text-center small text-muted">
            <i class="fa-solid fa-circle-info text-primary me-1"></i> Updated in real-time
        </div>
    </div>

</div>
