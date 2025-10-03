@extends('dashboard.user.layouts.app')
@section('content')
    <div class="page-container">

        <div class="page-title-head d-flex align-items-sm-center flex-sm-row flex-column gap-2">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold mb-0">{{ $title }}</h4>
            </div>

            <div class="text-end">
                <x-dashboard.user.breadcrumbs :breadcrumbs="$breadcrumbs" />
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="container-fluid py-4">
                    <!-- Transfer Header -->
                    <div class="card shadow-sm border-0 mb-4">
                        <div class="card-body bg-primary text-white rounded-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h4 class="fw-bold mb-1">
                                        <i class="bi bi-send"></i> Local Transfer
                                    </h4>
                                    <p class="mb-0">Send money instantly to any local bank account securely</p>
                                </div>
                                <div class="text-end small">
                                    <i class="bi bi-shield-check"></i> Secure
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Transfer -->
                    {{-- <div class="card shadow-sm border-0 mb-4">
                        <div class="card-header border-bottom d-flex justify-content-between align-items-center">
                            <h4 class="mb-0"><i class="bi bi-lightning-charge text-primary"></i> Quick Transfer</h4>
                            <a href="#" class="small text-decoration-none"><i class="bi bi-arrow-repeat"></i>
                                Refresh</a>
                        </div>
                        <div class="card-body text-center">
                            <div class="d-flex justify-content-center gap-4">
                                <!-- Add New Beneficiary -->
                                <div>
                                    <button class="btn btn-outline-primary rounded-circle p-4">
                                        <i class="bi bi-plus-lg fs-4"></i>
                                    </button>
                                    <p class="mt-2 small">Add New</p>
                                </div>
                                <!-- No Beneficiaries Yet -->
                                <div>
                                    <button class="btn btn-outline-secondary rounded-circle p-4" disabled>
                                        <i class="bi bi-people fs-4"></i>
                                    </button>
                                    <p class="mt-2 small text-muted">No saved beneficiaries yet<br>Add one to get started
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div> --}}

                    <x-dashboard.available_balance :user="$user" badge />

                    <!-- Transfer Form -->
                    <form action="{{ route('user.transfer.local') }}" method="POST">
                        @csrf

                        @include('partials.validation_message')

                        <!-- Transfer Amount -->
                        <div class="card shadow-sm border-0 mb-4">
                            <div class="card-header border-bottom">
                                <h4 class="mb-0"><i class="bi bi-cash-stack text-primary"></i> Transfer Amount</h4>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <div class="input-group">
                                        <span class="input-group-text">{{ currency($user->currency) }}</span>
                                        <input type="number" name="amount" value="{{ old('amount') }}"
                                            class="form-control @error('amount') is-invalid @enderror"
                                            placeholder="Enter amount" required>
                                    </div>
                                </div>
                                <div class="d-flex gap-2">
                                    <button type="button" class="btn btn-outline-primary btn-sm quick-amount"
                                        data-value="100">{{ currency($user->currency) }}100</button>
                                    <button type="button" class="btn btn-outline-primary btn-sm quick-amount"
                                        data-value="500">{{ currency($user->currency) }}500</button>
                                    <button type="button" class="btn btn-outline-primary btn-sm quick-amount"
                                        data-value="1000">{{ currency($user->currency) }}1000</button>
                                    <button type="button" class="btn btn-outline-secondary btn-sm quick-amount"
                                        data-value="all">All</button>
                                </div>
                            </div>
                        </div>

                        <!-- Beneficiary Details -->
                        <div class="card shadow-sm border-0 mb-4">
                            <div class="card-header border-bottom">
                                <h4 class="mb-0"><i class="bi bi-people text-primary"></i> Beneficiary Details</h4>
                            </div>
                            <div class="card-body row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Account Holder Name</label>
                                    <input type="text" name="beneficiary_name" value="{{ old('beneficiary_name') }}"
                                        class="form-control @error('beneficiary_name') is-invalid @enderror"
                                        placeholder="Enter full name" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Account Number</label>
                                    <input type="text" name="beneficiary_account_number"
                                        value="{{ old('beneficiary_account_number') }}"
                                        class="form-control @error('beneficiary_account_number') is-invalid @enderror"
                                        placeholder="Enter account number" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Bank Name</label>
                                    <input type="text" name="bank_name" value="{{ old('bank_name') }}"
                                        class="form-control @error('bank_name') is-invalid @enderror"
                                        placeholder="Enter bank name" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Account Type</label>
                                    <select name="account_type"
                                        class="form-select @error('account_type') is-invalid @enderror">
                                        <option value="">Select account type</option>
                                        <option value="Checking" @selected(old('account_type') == 'Checking')>Checking</option>
                                        <option value="Savings" @selected(old('account_type') == 'Savings')>Savings</option>
                                        <option value="Joint Account" @selected(old('account_type') == 'Joint Account')>Joint Account</option>
                                        <option value="Online Banking" @selected(old('account_type', 'Online Banking') == 'Online Banking')>Online Banking</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Routing Number</label>
                                    <input type="text" name="routing_number" value="{{ old('routing_number') }}"
                                        class="form-control @error('routing_number') is-invalid @enderror"
                                        placeholder="Enter routing number">
                                    <p class="mb-0 small text-muted">9-digit number found on your checks</p>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">SWIFT Code</label>
                                    <input type="text" name="swift_code" value="{{ old('swift_code') }}"
                                        class="form-control @error('swift_code') is-invalid @enderror"
                                        placeholder="Enter SWIFT/BIC code">
                                    <p class="mb-0 small text-muted">8-11 character bank identifier code</p>
                                </div>
                            </div>
                        </div>

                        <!-- Additional Info -->
                        <div class="card shadow-sm border-0 mb-4">
                            <div class="card-header border-bottom">
                                <h4 class="mb-0"><i class="bi bi-info-circle text-primary"></i> Additional Information
                                </h4>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label">Description / Memo</label>
                                    <textarea name="description" value="{{ old('description') }}"
                                        class="form-control @error('description') is-invalid @enderror" rows="2"
                                        placeholder="Enter description or purpose of payment"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Transaction PIN</label>
                                    <input type="password" name="transaction_pin"
                                        class="form-control @error('transaction_pin') is-invalid @enderror"
                                        id="transfer_transaction_pin" placeholder="Enter transaction PIN" required>
                                    <small class="text-muted">This is your transaction PIN, not your login
                                        password.</small>
                                </div>
                            </div>
                        </div>

                        <!-- Actions -->
                        <div class="d-flex justify-content-between mb-4">
                            <a href="{{ route('user.dashboard') }}" class="btn btn-outline-secondary"><i
                                    class="bi bi-arrow-left me-1"></i> Back to Dashboard</a>
                            <div class="d-flex gap-2">
                                {{-- <button type="button" class="btn btn-outline-info">Save Beneficiary</button> --}}
                                <button type="submit" class="btn btn-primary"><i class="bi bi-eye me-1"></i> Preview
                                    Transfer</button>
                            </div>
                        </div>
                    </form>

                    <!-- Bank Level Security -->
                    <div class="alert alert-light border shadow-sm">
                        <h6 class="fw-bold"><i class="bi bi-shield-lock text-success"></i> Bank-Level Security</h6>
                        <p class="mb-0 small text-muted">
                            All transfers are protected with 256-bit SSL encryption and processed through secure banking
                            channels.
                            Your financial information is never stored on our servers and transactions are monitored for
                            fraud
                            protection.
                        </p>
                        <ul class="small mt-2 mb-0">
                            <li>🔒 SSL Encrypted</li>
                            <li>💾 Zero Data Storage</li>
                            <li>🟢 24/7 Monitoring</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            document.querySelectorAll('.quick-amount').forEach(btn => {
                btn.addEventListener('click', function() {
                    let input = document.querySelector('input[name="amount"]');
                    if (this.dataset.value === 'all') {
                        input.value =
                            {{ $user->account_balance }}; // Replace with actual available balance
                    } else {
                        input.value = this.dataset.value;
                    }
                });
            });
        </script>
    @endpush
@endsection
