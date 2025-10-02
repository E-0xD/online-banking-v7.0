<div class="container-fluid mb-4">
    <div class="row g-4">
        <!-- Available -->
        <div class="col-12 col-md-6 col-lg-3">
            <div class="card shadow-sm border rounded-3 h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="d-flex align-items-center justify-content-center bg-primary rounded p-2"
                            style="width:40px; height:40px;">
                            <i class="fa-solid fa-credit-card text-white"></i>
                        </div>
                        <span class="text-muted small fw-medium">Available</span>
                    </div>
                    <h3 class="h5 fw-bold mb-1">{{ currency($user->currency) }}{{ formatAmount($user->account_limit) }}
                    </h3>
                    <p class="text-muted small mb-0">Account Limit</p>
                </div>
            </div>
        </div>

        <!-- Monthly Deposits -->
        <div class="col-12 col-md-6 col-lg-3">
            <div class="card shadow-sm border rounded-3 h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="d-flex align-items-center justify-content-center bg-success rounded p-2"
                            style="width:40px; height:40px;">
                            <i class="fa-solid fa-arrow-down text-white"></i>
                        </div>
                        <span class="text-muted small fw-medium">This Month</span>
                    </div>
                    <h3 class="h5 fw-bold mb-1">{{ currency($user->currency) }}{{ formatAmount($monthlyDeposits) }}</h3>
                    <p class="text-muted small mb-0">Monthly Deposits</p>
                </div>
            </div>
        </div>

        <!-- Monthly Expenses -->
        <div class="col-12 col-md-6 col-lg-3">
            <div class="card shadow-sm border rounded-3 h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="d-flex align-items-center justify-content-center bg-danger rounded p-2"
                            style="width:40px; height:40px;">
                            <i class="fa-solid fa-arrow-up text-white"></i>
                        </div>
                        <span class="text-muted small fw-medium">This Month</span>
                    </div>
                    <h3 class="h5 fw-bold mb-1">{{ currency($user->currency) }}{{ formatAmount($monthlyExpenses) }}</h3>
                    <p class="text-muted small mb-0">Monthly Expenses</p>
                </div>
            </div>
        </div>

        <!-- Total Volume -->
        <div class="col-12 col-md-6 col-lg-3">
            <div class="card shadow-sm border rounded-3 h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="d-flex align-items-center justify-content-center bg-info rounded p-2"
                            style="width:40px; height:40px;">
                            <i class="fa-solid fa-chart-line text-white"></i>
                        </div>
                        <span class="text-muted small fw-medium">All Time</span>
                    </div>
                    <h3 class="h5 fw-bold mb-1">{{ currency($user->currency) }}{{ formatAmount($totalVolume) }}</h3>
                    <p class="text-muted small mb-0">Total Volume</p>
                </div>
            </div>
        </div>
    </div>
</div>
