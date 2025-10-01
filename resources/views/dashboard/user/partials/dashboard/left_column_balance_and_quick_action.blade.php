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
                    <span class="fw-bold">•••••• 0667</span>
                </div>
            </div>

            <!-- Account Details -->
            <div class="row text-center g-3 mb-4">
                <!-- Account Holder -->
                <div class="col-12 col-md-3 text-start">
                    <small class="text-white-50">Account Holder</small>
                    <p class="fw-semibold mb-2">Cordell Satterfield</p>
                    <div class="d-flex align-items-center mb-1">
                        <div class="bg-success rounded-circle me-2" style="width:8px; height:8px;">
                        </div>
                        <small>Account Active</small>
                    </div>
                    <div class="d-flex align-items-center">
                        <i class="fa-solid fa-clock text-warning small me-2"></i>
                        <small>Verification Pending</small>
                    </div>
                </div>

                <!-- Fiat Balance -->
                <div class="col-12 col-md-3 position-relative">
                    <small class="text-white-50">Fiat Balance</small>
                    <h4 class="fw-bold mb-1 balance-amount" data-original="$0.00">$0.00</h4>
                    <small class="text-white-50">BMD Balance</small>
                    <!-- Eye Toggle -->
                    <button class="btn btn-sm btn-light position-absolute top-0 end-0 mt-3 me-3 toggle-balance">
                        <i class="fa-solid fa-eye"></i>
                    </button>
                </div>

                <!-- BTC Balance -->
                <div class="col-12 col-md-3">
                    <small class="text-white-50">Bitcoin Balance</small>
                    <p class="fw-bold mb-1 balance-amount" data-original="0.000000 BTC">0.000000 BTC
                    </p>
                    <small class="d-block text-white-50">≈ $0.00</small>
                    <div class="d-flex justify-content-center align-items-center mt-1">
                        <div class="bg-warning rounded-circle me-1" style="width:6px; height:6px;">
                        </div>
                        <small class="text-white-50">1 BTC = $113,894</small>
                    </div>
                </div>

                <!-- ETH Balance -->
                <div class="col-12 col-md-3">
                    <small class="text-white-50">Ethereum Balance</small>
                    <p class="fw-bold mb-1 balance-amount" data-original="0.000000 ETH">0.000000
                        ETH</p>
                    <small class="d-block text-white-50">≈ $0.00</small>
                    <div class="d-flex justify-content-center align-items-center mt-1">
                        <div class="bg-purple rounded-circle me-1" style="width:6px; height:6px; background:#6f42c1;">
                        </div>
                        <small class="text-white-50">1 ETH = $4,148</small>
                    </div>
                </div>
            </div>

            <!-- Bottom Buttons -->
            <div class="d-flex justify-content-between align-items-center">
                <div class="bg-white bg-opacity-25 rounded px-3 py-2">
                    <small class="text-white-50">Total Portfolio</small>
                    <p class="fw-bold mb-0 balance-amount" data-original="$0.00">$0.00</p>
                </div>
                <div class="d-flex gap-2">
                    <button class="btn btn-light btn-sm d-flex align-items-center">
                        <i class="fa-solid fa-paper-plane me-1"></i> Send Money
                    </button>
                    <a href="https://firsttruistcus.com/dashboard/deposits"
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
