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

                    @if ($loan->isDisbursed() && !$latestLoanRepayment->isPaid())
                        <a href="{{ route('user.loan.repay', $loan->uuid) }}" onclick="return confirm('Are you sure?')"
                            class="btn btn-primary">
                            Repay ({{ currency($loan->user->currency) }}{{ formatAmount($loan->total_payable) }})
                        </a>
                    @endif

                    <div class="float-end">
                        <x-dashboard.user.back-button href="{{ route('user.loan.index') }}" name="Back to Loans" />
                    </div>
                </x-dashboard.admin.card>
            </div>
        </div>
    </div>
@endsection
