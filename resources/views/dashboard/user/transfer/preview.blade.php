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
                    <div class="card-body p-4">

                        <!-- Transfer Summary -->
                        <h4 class="fw-bold mb-3">Please confirm your transfer details</h4>
                        <div class="mb-3">
                            <strong>Transfer Type:</strong>
                            <p class="mb-0 text-muted">{{ $transfer->transfer_type->fullLabel() }}</p>
                        </div>

                        <div class="mb-3">
                            <strong>Beneficiary Name:</strong>
                            <p class="mb-0 text-muted">{{ $transfer->recipient_name }}</p>
                        </div>

                        <div class="mb-3">
                            <strong>Beneficiary Account:</strong>
                            <p class="mb-0 text-muted">{{ $transfer->recipient_account_number }}</p>
                        </div>

                        <div class="mb-3">
                            <strong>Bank:</strong>
                            <p class="mb-0 text-muted">{{ $transfer->recipient_bank }}</p>
                        </div>

                        @if ($transfer->recipient_swift_code)
                            <div class="mb-3">
                                <strong>SWIFT Code:</strong>
                                <p class="mb-0 text-muted">{{ $transfer->recipient_swift_code }}</p>
                            </div>
                        @endif
                        @if ($transfer->recipient_iban_code)
                            <div class="mb-3">
                                <strong>IBAN Number:</strong>
                                <p class="mb-0 text-muted">{{ $transfer->recipient_iban_code }}</p>
                            </div>
                        @endif
                        @if ($transfer->recipient_routing_number)
                            <div class="mb-3">
                                <strong>Routing Number:</strong>
                                <p class="mb-0 text-muted">{{ $transfer->recipient_routing_number }}</p>
                            </div>
                        @endif

                        <div class="mb-3">
                            <strong>Amount:</strong>
                            <p class="mb-0 fw-bold">
                                {{ currency($user->currency) }}{{ formatAmount($transfer->amount) }}
                            </p>
                        </div>

                        {{-- <div class="mb-3">
                            <strong>Transfer Fee:</strong>
                            <p class="mb-0 text-muted">
                                {{ currency($user->currency) }}{{ formatAmount($transfer->fee) }}
                            </p>
                        </div>

                        <div class="mb-3">
                            <strong>Total Deducted:</strong>
                            <p class="mb-0 fw-bold">
                                {{ currency($user->currency) }}{{ formatAmount($transfer->amount + $transfer->fee) }}
                            </p>
                        </div> --}}

                        <div class="mb-3">
                            <strong>Description:</strong>
                            <p class="mb-0 text-muted">{{ $transfer->description }}</p>
                        </div>

                        <!-- Action Buttons -->
                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('user.transfer.cancel', $transfer->uuid) }}"
                                onclick="return confirm('Are you sure you want to cancel this transfer?')"
                                class="btn btn-outline-danger btn-lg rounded-pill">
                                <i class="bi bi-x-circle me-1"></i> Cancel
                            </a>
                            @if (!$user->shouldTransferFail())
                                @if ($transferNeedVerificationCode)
                                    <a href="{{ route('user.transfer.verify', [$transfer->uuid, $orderNo]) }}"
                                        class="btn btn-success btn-lg rounded-pill">
                                        <i class="bi bi-check2-circle me-1"></i> Confirm Transfer
                                    </a>
                                @else
                                    <a href="{{ route('user.transfer.complete', $transfer->uuid) }}"
                                        class="btn btn-success btn-lg rounded-pill">
                                        <i class="bi bi-check2-circle me-1"></i> Confirm Transfer
                                    </a>
                                @endif
                            @else
                                <a href="{{ route('user.transfer.fail', $transfer->uuid) }}"
                                    class="btn btn-success btn-lg rounded-pill">
                                    <i class="bi bi-check2-circle me-1"></i> Confirm Transfer
                                </a>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
