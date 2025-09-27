@extends('dashboard.user.layouts.app')
@section('content')
    @include('dashboard.user.partials.deposit_style')
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
            <div class="col-xl-12 col-lg-12">
                <x-dashboard.user.card>

                    <div class="">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h3>Deposit Funds</h3>
                            <a href="{{ route('user.deposit.history') }}" class="btn btn-outline-secondary btn-sm"> <i
                                    class="fa-solid fa-history me-1"></i> Deposit History</a>
                        </div>

                        <!-- Deposit Form -->
                        <form action="{{ route('user.deposit.store') }}" method="POST">
                            @csrf

                            <div class="card shadow-sm">

                                <div class="text-center">
                                    <h4>Fund Your Account</h4>
                                    <p class="mb-0">Choose your preferred deposit method and amount</p>
                                </div>

                                <div class="card-body">
                                    <!-- Deposit Methods -->
                                    <div class="row g-3 mb-4" id="deposit-methods">
                                        <input type="hidden" name="method" id="selectedMethod" value="Credit Card">
                                        <div class="col-md-3">
                                            <div class="deposit-method active" data-method="Credit Card">
                                                <i class="bi bi-credit-card fs-3 d-block mb-2 text-primary"></i>
                                                Credit Card
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="deposit-method" data-method="Bank Transfer">
                                                <i class="bi bi-bank fs-3 d-block mb-2 text-primary"></i>
                                                Bank Transfer
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="deposit-method" data-method="Bitcoin">
                                                <i class="bi bi-currency-bitcoin fs-3 d-block mb-2 text-warning"></i>
                                                Bitcoin
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="deposit-method" data-method="PayPal">
                                                <i class="bi bi-paypal fs-3 d-block mb-2 text-primary"></i>
                                                PayPal
                                            </div>
                                        </div>

                                        @error('method')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Deposit Amount -->
                                    <div class="mb-4">
                                        <label for="amount" class="form-label fw-semibold">Deposit Amount</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">{{ currency($user->currency) }}</span>
                                            <input type="number" class="form-control @error('amount') is-invalid @enderror"
                                                id="amount" name="amount" value="{{ old('amount', '0.00') }}"
                                                min="1" required>

                                            @error('amount')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="d-flex gap-2 flex-wrap">
                                            <button type="button"
                                                class="btn btn-outline-secondary quick-amount">{{ currency($user->currency) }}100</button>
                                            <button type="button"
                                                class="btn btn-outline-secondary quick-amount">{{ currency($user->currency) }}500</button>
                                            <button type="button"
                                                class="btn btn-outline-secondary quick-amount">{{ currency($user->currency) }}1000</button>
                                            <button type="button"
                                                class="btn btn-outline-secondary quick-amount">{{ currency($user->currency) }}5000</button>
                                            <button type="button"
                                                class="btn btn-outline-secondary quick-amount">{{ currency($user->currency) }}10000</button>
                                        </div>
                                    </div>

                                    <!-- Buttons -->
                                    <div class="d-flex justify-content-between">
                                        <a href="{{ route('user.dashboard') }}" class="btn btn-outline-secondary"> <i
                                                class="fa-solid fa-arrow-left me-1"></i> Back to Dashboard</a>
                                        <button type="submit" class="btn btn-primary"> <i
                                                class="fa-solid fa-credit-card me-1"></i> Continue to Deposit</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <!-- Secure Info -->
                        <div class="secure-box mt-3">
                            <i class="bi bi-shield-lock"></i>
                            All deposits are processed through secure payment channels. Your financial information is never
                            stored on our
                            servers.
                        </div>
                    </div>
                </x-dashboard.user.card>
            </div>
        </div>
    </div>

    @include('dashboard.user.partials.deposit_script')
@endsection
