@extends('dashboard.user.layouts.app')
@section('content')
    <style>
        .header-card {
            background: linear-gradient(90deg, #232E51, #1E1F27);
            border-radius: 10px;
            color: #fff;
            padding: 20px;
            margin-bottom: 20px;
            position: relative;
        }

        .section-title {
            font-weight: bold;
            margin-bottom: 15px;
        }

        .info-card {
            /* background: #232E51; */
            /* background: #fff; */
            border: 1px solid #eaeaea;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
        }

        .feature-card {
            border-radius: 10px;
            padding: 20px;
            /* background: #232E51; */
            /* background: #fff; */
            text-align: center;
            border: 1px solid #eaeaea;
        }

        .feature-card i {
            font-size: 24px;
            margin-bottom: 10px;
        }
    </style>
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

                    <form action="{{ route('user.card.store') }}" method="post">
                        @csrf

                        <div class="container-fluid">

                            <!-- Page Title -->
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div>
                                    <h3 class="fw-bold"><i class="fa-solid fa-credit-card me-2 text-primary"></i> Apply for
                                        Virtual Card
                                    </h3>
                                    <p class="text-muted mb-0">Get instant access to a virtual card for online payments</p>
                                </div>
                                <a href="{{ route('user.card.index') }}" class="btn btn-outline-secondary btn-sm"><i
                                        class="fa-solid fa-arrow-left me-1"></i> Back to
                                    Cards</a>
                            </div>

                            <!-- Header Banner -->
                            <div class="header-card">
                                <h4 class="fw-bold mb-2">Apply for a Virtual Card</h4>
                                <p class="mb-0">Get instant access to a virtual card for online payments and subscriptions
                                </p>
                            </div>

                            <!-- Card Details Section -->
                            <div class="info-card">
                                <h5 class="section-title"><i class="fa-solid fa-credit-card me-2 text-primary"></i> Card
                                    Details
                                </h5>

                                <!-- Card Type -->
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Card Type</label>
                                    <div class="list-group">
                                        <label class="list-group-item d-flex align-items-center">
                                            <input class="form-check-input me-3 @error('card_type') is-invalid @enderror"
                                                type="radio" value="Visa" name="card_type" checked>
                                            <div>
                                                <div class="fw-bold">Visa <span class="badge bg-primary ms-2">VISA</span>
                                                </div>
                                                <small class="text-muted">Accepted worldwide, suitable for most online
                                                    purchases</small>
                                            </div>
                                        </label>
                                        <label class="list-group-item d-flex align-items-center">
                                            <input class="form-check-input me-3 @error('card_type') is-invalid @enderror"
                                                type="radio" value="Mastercard" name="card_type">
                                            <div>
                                                <div class="fw-bold">Mastercard <span
                                                        class="badge bg-warning text-dark ms-2">MASTERCARD</span></div>
                                                <small class="text-muted">Global acceptance with enhanced security
                                                    features</small>
                                            </div>
                                        </label>
                                        <label class="list-group-item d-flex align-items-center">
                                            <input class="form-check-input me-3 @error('card_type') is-invalid @enderror"
                                                type="radio" value="American Express" name="card_type">
                                            <div>
                                                <div class="fw-bold">American Express <span
                                                        class="badge bg-secondary ms-2">AMEX</span>
                                                </div>
                                                <small class="text-muted">Premium benefits and exclusive rewards
                                                    program</small>
                                            </div>
                                        </label>
                                    </div>
                                    @error('card_type')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Card Level & Currency -->
                                <div class="row g-3 mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">Card Level <span
                                                class="text-danger">*</span></label>
                                        <select name="card_level"
                                            class="form-select @error('card_level') is-invalid @enderror">
                                            <option value="">Select Card Level</option>
                                            @foreach (config('setting.cardLevels') as $key => $cardLevel)
                                                <option value="{{ $key }}" @selected(old('card_level') == $cardLevel)>
                                                    {{ $cardLevel }}</option>
                                            @endforeach
                                        </select>
                                        <small class="text-muted">Different levels offer varied spending limits and
                                            features</small>
                                        @error('card_level')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">Currency</label>
                                        <select name="currency" class="form-select @error('currency') is-invalid @enderror">
                                            <option value="">Select Currency</option>
                                            @foreach (config('setting.cardCurrencies') as $key => $cardCurrency)
                                                <option value="{{ $key }}" @selected(old('currency') == $key)>
                                                    {{ $cardCurrency }}
                                                </option>
                                            @endforeach
                                        </select>

                                        @error('currency')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Daily Spending Limit -->
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Daily Spending Limit</label>
                                    <div class="input-group">
                                        <span class="input-group-text">{{ currency($user->currency) }}</span>
                                        <input type="number"
                                            class="form-control @error('daily_limit') is-invalid @enderror"
                                            name="daily_limit" value="{{ old('daily_limit', 100) }}">
                                        <span class="input-group-text">{{ currency($user->currency, 'code') }}</span>

                                        @error('daily_limit')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <small class="text-muted">Limits: {{ currency($user->currency) }}100 -
                                        {{ currency($user->currency) }}5,000</small>
                                </div>
                            </div>

                            <!-- Billing Information -->
                            <div class="info-card">
                                <h5 class="section-title"><i class="fa-solid fa-file-invoice me-2 text-primary"></i> Billing
                                    Information
                                </h5>
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Cardholder Name</label>
                                    <input type="text" name="card_holder_name"
                                        class="form-control @error('card_holder_name') is-invalid @enderror"
                                        placeholder="Enter name">

                                    @error('card_holder_name')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Billing Address</label>
                                    <input type="text" name="billing_address"
                                        class="form-control @error('billing_address') is-invalid @enderror"
                                        placeholder="Enter address">

                                    @error('billing_address')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="row g-3 mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">City</label>
                                        <input type="text" name="city"
                                            class="form-control @error('city') is-invalid @enderror"
                                            placeholder="Enter city">

                                        @error('city')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">ZIP / Postal Code</label>
                                        <input type="text" name="zip"
                                            class="form-control @error('zip') is-invalid @enderror"
                                            placeholder="Enter ZIP code">

                                        @error('zip')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Terms -->
                                <div class="form-check mb-3">
                                    <input class="form-check-input @error('terms') is-invalid @enderror" name="terms"
                                        type="checkbox" id="terms">
                                    <label class="form-check-label fw-bold" for="terms">
                                        I agree to the Terms and Conditions
                                    </label>
                                    <small class="text-muted d-block">By checking this box, you agree to our virtual card
                                        terms,
                                        including
                                        fees, limits, and usage policies.</small>

                                    @error('terms')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Submit -->
                                <div class="d-flex justify-content-between">
                                    <button class="btn btn-primary w-100 me-2"><i
                                            class="fa-solid fa-paper-plane me-1"></i>
                                        Submit
                                        Application</button>
                                    <a href="{{ route('user.card.index') }}" class="btn btn-outline-secondary"><i
                                            class="fa-solid fa-arrow-left me-1"></i> Back to
                                        Cards</a>
                                </div>
                            </div>

                            <!-- Features Section -->
                            <div class="row g-3 mt-4">
                                <div class="col-md-4">
                                    <div class="feature-card">
                                        <i class="fa-solid fa-shield-halved text-success"></i>
                                        <h6 class="fw-bold">Secure</h6>
                                        <small class="text-muted">Bank-level security with real-time fraud
                                            monitoring.</small>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="feature-card">
                                        <i class="fa-solid fa-bolt text-primary"></i>
                                        <h6 class="fw-bold">Instant</h6>
                                        <small class="text-muted">Get your card instantly after approval for immediate
                                            use.</small>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="feature-card">
                                        <i class="fa-solid fa-sliders text-purple"></i>
                                        <h6 class="fw-bold">Control</h6>
                                        <small class="text-muted">Set spending limits and freeze cards anytime.</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                </x-dashboard.user.card>
            </div>
        </div>
    </div>
@endsection
