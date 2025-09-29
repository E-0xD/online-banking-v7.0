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
            <div class="col-xl-12 col-lg-12">
                <x-dashboard.admin.card>

                    <div class="container-fluid">

                        <!-- Header -->
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div>
                                <h3 class="fw-bold"><i class="fa-solid fa-credit-card me-2 text-primary"></i> Card Details
                                </h3>
                                <p class="text-muted mb-0">Detailed information about your virtual card</p>
                            </div>
                            <a href="{{ route('user.card.index') }}" class="btn btn-outline-secondary btn-sm">
                                <i class="fa-solid fa-arrow-left me-1"></i> Back to Cards
                            </a>
                        </div>

                        <!-- Card Summary -->
                        <div class="card shadow-sm border-0 mb-4">
                            <div class="card-body">
                                <div class="row g-4 align-items-center">
                                    <div class="col-md-8">
                                        <h4 class="fw-bold mb-1">{{ $card->card_type }} • {{ $card->card_level }}</h4>
                                        <p class="mb-2 text-muted">
                                            Reference ID: <span
                                                class="fw-bold">#{{ $card->reference_id ?? $card->id }}</span>
                                        </p>
                                        <p class="mb-0">
                                            <span class="{{ $card->status->badge() }}">
                                                {{ $card->status->label() }}
                                            </span>
                                        </p>
                                    </div>
                                    <div class="col-md-4 text-md-end">
                                        <div class="bg-light p-3 rounded text-center">
                                            <div
                                                class="fw-bold fs-5 d-flex align-items-center justify-content-center gap-2">
                                                <span id="maskedCard">**** **** ****
                                                    {{ substr($card->card_number, -4) }}</span>
                                                <span id="fullCard" class="d-none">{{ $card->card_number }}</span>
                                                <button class="btn btn-sm btn-light rounded-circle" id="toggleCard"
                                                    type="button">
                                                    <i class="fa-solid fa-eye"></i>
                                                </button>
                                            </div>
                                            <small class="text-muted">Expires
                                                {{ formatDate($card->expiry_date) ?? 'N/A' }}</small>
                                            <br>
                                            <small class="text-muted">CVV: {{ $card->cvv ?? '***' }}</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Card Information -->
                        <div class="row g-4">
                            <!-- Card Details -->
                            <div class="col-md-6">
                                <div class="card border-0 shadow-sm">
                                    <div class="card-header bg-light">
                                        <h5 class="mb-0 fw-bold"><i class="fa-solid fa-id-card me-2 text-primary"></i> Card
                                            Information</h5>
                                    </div>
                                    <div class="card-body">
                                        <p><strong>Type:</strong> {{ $card->card_type }}</p>
                                        <p><strong>Level:</strong> {{ $card->card_level }}</p>
                                        <p><strong>Currency:</strong> {{ cardCurrency($card->currency, 'name') }}</p>
                                        <p><strong>Daily Limit:</strong>
                                            {{ cardCurrency($card->currency) }}{{ formatAmount($card->daily_limit) }}</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Billing Information -->
                            <div class="col-md-6">
                                <div class="card border-0 shadow-sm">
                                    <div class="card-header bg-light">
                                        <h5 class="mb-0 fw-bold"><i class="fa-solid fa-file-invoice me-2 text-primary"></i>
                                            Billing Information</h5>
                                    </div>
                                    <div class="card-body">
                                        <p><strong>Cardholder:</strong> {{ $card->card_holder_name }}</p>
                                        <p><strong>Address:</strong> {{ $card->billing_address }}</p>
                                        <p><strong>City:</strong> {{ $card->city ?? '-' }}</p>
                                        <p><strong>ZIP / Postal Code:</strong> {{ $card->zip ?? '-' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </x-dashboard.admin.card>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const toggleBtn = document.getElementById("toggleCard");
                const maskedCard = document.getElementById("maskedCard");
                const fullCard = document.getElementById("fullCard");

                toggleBtn.addEventListener("click", function() {
                    maskedCard.classList.toggle("d-none");
                    fullCard.classList.toggle("d-none");

                    const icon = this.querySelector("i");
                    if (fullCard.classList.contains("d-none")) {
                        icon.classList.remove("fa-eye-slash");
                        icon.classList.add("fa-eye");
                    } else {
                        icon.classList.remove("fa-eye");
                        icon.classList.add("fa-eye-slash");
                    }
                });
            });
        </script>
    @endpush
@endsection
