@extends('dashboard.admin.layouts.app')
@section('content')
    <div class="page-container">

        <div class="page-title-head d-flex align-items-sm-center flex-sm-row flex-column gap-2">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold mb-0">{{ $title }}</h4>
            </div>

            <div class="text-end">
                <x-dashboard.admin.breadcrumbs :breadcrumbs="$breadcrumbs" />
            </div>
        </div>

        <div class="row">
            @include('dashboard.admin.user.partials.account_options_and_status')

            <div class="col-lg-12">
                <x-dashboard.available_balance :user="$user" />

                <x-dashboard.admin.card>
                    @slot('header')
                        {{ $title }}
                    @endslot

                    <p>
                        <strong>Requested Amount:</strong>
                        {{ currency($loan->user->currency) }}{{ formatAmount($loan->amount) }}
                    </p>

                    <p><strong>Duration:</strong> {{ $loan->duration }} months</p>

                    <p><strong>Facility:</strong> {{ $loan->facility }}</p>

                    <p><strong>Purpose:</strong> {{ $loan->purpose }}</p>

                    <p><strong>Monthly Income:</strong> {{ $loan->monthly_income }}</p>

                    <p><strong>Status:</strong>
                        <span class="{{ $loan->status->badge() }}">{{ $loan->status->label() }}</span>
                    </p>

                    @if ($loan->isRejected())
                        <p>
                            <strong>Remarks:</strong>
                            {{ $loan->remarks }}
                        </p>
                    @endif

                    @if ($loan->isApproved() || $loan->isDisbursed())
                        <p><strong>Approved Amount:</strong>
                            {{ currency($user->currency) }}{{ formatAmount($loan->approved_amount) }}</p>
                    @endif

                    @if ($loan->isApproved() || $loan->isDisbursed())
                        <p><strong>Interest Rate:</strong> {{ $loan->interest_rate }}%</p>
                    @endif

                    @if ($loan->isApproved() || $loan->isDisbursed())
                        <p><strong>Total Payable:</strong>
                            {{ currency($user->currency) }}{{ formatAmount($loan->total_payable) }}</p>
                    @endif

                    @if ($loan->isDisbursed())
                        <p><strong>Disbursed At:</strong> {{ formatDate($loan->disbursed_at) }}</p>
                    @endif

                    <dl>
                        @if ($loan->loanRepayment)
                            @foreach ($loan->loanRepayment as $loanRepayment)
                                <dt class="col-sm-3">Loan Repayment Status</dt>
                                <dd class="col-sm-9">
                                    Amount:
                                    {{ currency($loan->user->currency) }}{{ formatAmount($loanRepayment->amount) }}<br>
                                    Status: <span
                                        class="{{ $loanRepayment->status->badge() }}">{{ $loanRepayment->status->label() }}</span><br>
                                    Repaid At:
                                    {{ $loanRepayment->repaid_at ? formatDate($loanRepayment->repaid_at) : 'N/A' }}
                                </dd>
                            @endforeach
                        @endif
                    </dl>

                    @if ($loan->isPending())
                        <form method="POST" action="{{ route('admin.user.loan.approve', [$user->uuid, $loan->uuid]) }}"
                            class="mb-3">
                            @csrf
                            @method('PATCH')

                            <x-dashboard.admin.form-input name="approved_amount" label="Approved Amount"
                                class="col-md-12 mb-3" value="{{ $loan->amount }}" type="number" />

                            <div class="mb-3">
                                <label>Interest Rate (%)</label>
                                <input type="number" value="{{ $setting->loan_interest_rate }}" class="form-control"
                                    disabled>
                            </div>

                            <x-dashboard.admin.form-button class="btn btn-success" name="Approve Loan" />
                        </form>

                        <form method="POST" action="{{ route('admin.user.loan.reject', [$user->uuid, $loan->uuid]) }}">
                            @csrf

                            <x-dashboard.admin.form-input name="remarks" label="Remarks" type="textarea"
                                class="col-md-12 mb-3" value="{{ $loan->remarks }}" />

                            <x-dashboard.admin.form-button class="btn btn-danger" name="Reject Loan" />
                        </form>
                    @endif

                    @if ($loan->isApproved())
                        <form method="POST" action="{{ route('admin.user.loan.disburse', [$user->uuid, $loan->uuid]) }}">
                            @csrf
                            <x-dashboard.admin.form-button name="Disburse Loan" />
                        </form>
                    @endif

                </x-dashboard.admin.card>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->

    </div>
@endsection
