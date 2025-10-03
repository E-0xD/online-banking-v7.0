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
                <div class="container py-5">
                    <div class="row justify-content-center">
                        <div class="col-md-8">

                            <div class="card shadow-sm border-0 text-center p-5">
                                <!-- Success Icon -->
                                <div class="mb-4">
                                    <span
                                        class="bg-success rounded-circle p-4 d-inline-flex align-items-center justify-content-center">
                                        <i class="bi bi-check-lg text-white fs-1"></i>
                                    </span>
                                </div>

                                <!-- Success Message -->
                                <h3 class="fw-bold text-success">Transfer Successful!</h3>
                                <p class="text-muted mb-4">
                                    Your transfer has been completed successfully. Below are the transaction details.
                                </p>

                                <!-- Transaction Summary -->
                                <div class="table-responsive">
                                    <table class="table table-bordered text-start">
                                        <tbody>
                                            <tr>
                                                <th>Transaction ID</th>
                                                <td>{{ $transfer->reference_id }}</td>
                                            </tr>
                                            <tr>
                                                <th>Amount</th>
                                                <td>{{ currency($transfer->user->currency) }}{{ formatAmount($transfer->amount) }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Beneficiary</th>
                                                <td>{{ $transfer->recipient_name }}</td>
                                            </tr>
                                            <tr>
                                                <th>Bank</th>
                                                <td>{{ $transfer->recipient_bank }}</td>
                                            </tr>
                                            <tr>
                                                <th>Account Number</th>
                                                <td>{{ $transfer->recipient_account_number }}</td>
                                            </tr>
                                            <tr>
                                                <th>Transfer Type</th>
                                                <td class="text-capitalize">{{ $transfer->transfer_type->fullLabel() }}</td>
                                            </tr>
                                            <tr>
                                                <th>Status</th>
                                                <td><span
                                                        class="{{ $transfer->status->badge() }}">{{ $transfer->status->label() }}</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Date</th>
                                                <td>{{ formatDateTime($transfer->created_at) }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <!-- Buttons -->
                                <div class="d-flex justify-content-center gap-3 mt-4">
                                    <a href="{{ route('user.transfer.local') }}" class="btn btn-outline-primary">
                                        <i class="bi bi-arrow-left-circle me-1"></i> Make Another Transfer
                                    </a>
                                    <a href="{{ route('user.dashboard') }}" class="btn btn-primary">
                                        <i class="bi bi-house-door me-1"></i> Back to Dashboard
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
