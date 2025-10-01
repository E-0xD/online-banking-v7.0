<!-- Right Column -->
<div class="col-12 col-lg-4 d-flex flex-column gap-4">
    <!-- Recent Transactions -->
    <div class="card shadow-sm border">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h6 class="fw-bold mb-0">Recent Transactions</h6>
                <a href="#" class="small text-primary">View All</a>
            </div>

            <ul class="list-group list-group-flush">
                <!-- Transaction 1 -->
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <div class="bg-success bg-opacity-25 rounded-circle d-flex align-items-center justify-content-center me-3"
                            style="width: 45px; height: 45px;">
                            <i class="fa-solid fa-arrow-down text-success"></i>
                        </div>
                        <div>
                            <p class="mb-0 fw-semibold">Deposit from Bank</p>
                            <small class="text-muted d-block">Ref: TXN-20250930001</small>
                            <small class="text-muted">Sep 30, 2025 • 10:45 AM</small>
                        </div>
                    </div>
                    <div class="text-end">
                        <span class="fw-bold text-success d-block">+ $1,200.00</span>
                        <span class="badge bg-success-subtle text-success">Completed</span>
                    </div>
                </li>

                <!-- Transaction 2 -->
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <div class="bg-danger bg-opacity-25 rounded-circle d-flex align-items-center justify-content-center me-3"
                            style="width: 45px; height: 45px;">
                            <i class="fa-solid fa-arrow-up text-danger"></i>
                        </div>
                        <div>
                            <p class="mb-0 fw-semibold">Transfer to John Doe</p>
                            <small class="text-muted d-block">Ref: TXN-20250928023</small>
                            <small class="text-muted">Sep 28, 2025 • 4:12 PM</small>
                        </div>
                    </div>
                    <div class="text-end">
                        <span class="fw-bold text-danger d-block">- $500.00</span>
                        <span class="badge bg-warning-subtle text-warning">Pending</span>
                    </div>
                </li>
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
                        <h6 class="fw-bold mb-0">$500,000.00</h6>
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
                        <h6 class="fw-bold mb-0">$0.00</h6>
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
                        <h6 class="fw-bold mb-0">$0.00</h6>
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
