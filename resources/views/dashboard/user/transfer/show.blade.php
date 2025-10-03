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
                <div class="card">
                    <div class="card-header border-bottom d-flex justify-content-between align-items-center">
                        <h5 class="mb-0"><i class="bi bi-receipt"></i> Transfer Details</h5>
                        <span class="{{ $transfer->status->badge() }}">
                            {{ $transfer->status->label() }}
                        </span>
                    </div>
                    <div class="card-body p-4">

                        <!-- Transfer Info -->
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <strong>Transaction ID:</strong>
                                <p class="mb-0 text-muted">{{ $transfer->reference_id }}</p>
                            </div>
                            <div class="col-md-6">
                                <strong>Date:</strong>
                                <p class="mb-0 text-muted">{{ formatDateTime($transfer->created_at) }}
                                </p>
                            </div>
                            <div class="col-md-6">
                                <strong>Transfer Type:</strong>
                                <p class="mb-0 text-muted">{{ $transfer->transfer_type->fullLabel() }}
                                </p>
                            </div>
                            <div class="col-md-6">
                                <strong>Currency:</strong>
                                <p class="mb-0 text-muted">{{ currency($transfer->user->currency, 'code') }}</p>
                            </div>
                        </div>

                        <!-- Beneficiary Info -->
                        <h6 class="fw-bold mb-3"><i class="bi bi-person-circle"></i> Beneficiary Information
                        </h6>
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <strong>Beneficiary Name:</strong>
                                <p class="mb-0 text-muted">{{ $transfer->recipient_name }}</p>
                            </div>
                            <div class="col-md-6">
                                <strong>Account Number:</strong>
                                <p class="mb-0 text-muted">{{ $transfer->recipient_account_number }}</p>
                            </div>
                            <div class="col-md-6">
                                <strong>Bank Name:</strong>
                                <p class="mb-0 text-muted">{{ $transfer->recipient_bank }}</p>
                            </div>
                            <div class="col-md-6">
                                <strong>Account Type:</strong>
                                <p class="mb-0 text-muted">{{ $transfer->recipient_account_type }}</p>
                            </div>
                            @if ($transfer->recipient_routing_number)
                                <div class="col-md-6">
                                    <strong>Routing Number:</strong>
                                    <p class="mb-0 text-muted">{{ $transfer->recipient_routing_number }}</p>
                                </div>
                            @endif
                            @if ($transfer->recipient_swift_code)
                                <div class="col-md-6">
                                    <strong>SWIFT Code:</strong>
                                    <p class="mb-0 text-muted">{{ $transfer->recipient_swift_code }}</p>
                                </div>
                            @endif
                            @if ($transfer->recipient_iban_code)
                                <div class="col-md-6">
                                    <strong>IBAN Number:</strong>
                                    <p class="mb-0 text-muted">{{ $transfer->recipient_iban_code }}</p>
                                </div>
                            @endif
                        </div>

                        <!-- Transaction Amounts -->
                        <h6 class="fw-bold mb-3"><i class="bi bi-cash-stack"></i> Transaction Amount</h6>
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <strong>Amount Sent:</strong>
                                <p class="mb-0 fw-bold">
                                    {{ currency($transfer->user->currency) }}{{ formatAmount($transfer->amount) }}
                                </p>
                            </div>
                            {{-- <div class="col-md-6">
                                <strong>Transfer Fee:</strong>
                                <p class="mb-0 text-muted">
                                    {{ currency($transfer->user->currency) }}{{ formatAmount($transfer->fee) }}
                                </p>
                            </div>
                            <div class="col-md-6">
                                <strong>Total Deducted:</strong>
                                <p class="mb-0 fw-bold">
                                    {{ currency($transfer->user->currency) }}{{ formatAmount($transfer->amount + $transfer->fee) }}
                                </p>
                            </div> --}}
                        </div>

                        <!-- Description -->
                        <h6 class="fw-bold mb-3"><i class="bi bi-info-circle"></i> Description</h6>
                        <p class="mb-4 text-muted">{{ $transfer->description ?? 'No description provided' }}
                        </p>

                        <!-- Action Buttons -->
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('user.transfer.index') }}" class="btn btn-outline-secondary rounded-pill">
                                <i class="bi bi-arrow-left me-1"></i> Back to Transfers
                            </a>
                            {{-- <button onclick="window.print()" class="btn btn-dark rounded-pill">
                                <i class="bi bi-printer me-1"></i> Print Receipt
                            </button> --}}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
