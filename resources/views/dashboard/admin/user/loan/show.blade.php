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
                <x-dashboard.admin.card>
                    @slot('header')
                        {{ $title }}
                    @endslot

                    <p><strong>Requested Amount:</strong>
                        {{ currency($loan->user->currency) }}{{ formatAmount($loan->amount) }}</p>
                    <p><strong>Duration:</strong> {{ $loan->duration }} months</p>
                    <p><strong>Facility:</strong> {{ $loan->facility }}</p>
                    <p><strong>Purpose:</strong> {{ $loan->purpose }}</p>
                    <p><strong>Monthly Income:</strong> {{ $loan->monthly_income }}</p>
                    <p><strong>Status:</strong>
                        <span class="{{ $loan->status->badge() }}">{{ $loan->status->label() }}</span>
                    </p>
                    <p><strong>Approved Amount:</strong>
                        {{ currency($user->currency) }}{{ formatAmount($loan->approved_amount) }}</p>
                    <p><strong>Interest Rate:</strong> {{ $loan->interest_rate }}%</p>
                    <p><strong>Total Payable:</strong>
                        {{ currency($user->currency) }}{{ formatAmount($loan->total_payable) }}</p>
                    <p><strong>Disbursed At:</strong> {{ formatDateTime($loan->disbursed_at) }}</p>

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
                <x-dashboard.admin.card>
                    @slot('header')
                        Loan Repayments
                    @endslot
                    <div class="table-responsive">
                        <table id="myTable" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Due Date</th>
                                    <th>Amount</th>
                                    <th>Paid At</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($loan->loanRepayment as $loanRepayment)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            {{ formatDate($loanRepayment->due_date) }}
                                        </td>
                                        <td>
                                            {{ currency($user->currency) }}{{ formatAmount($loanRepayment->amount) }}
                                        </td>
                                        <td>
                                            {{ $loanRepayment->paid_at ? formatDate($loanRepayment->paid_at) : 'N/A' }}
                                        </td>
                                        <td>
                                            <span class="{{ $loanRepayment->status->badge() }}">
                                                {{ $loanRepayment->status->label() }}
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </x-dashboard.admin.card>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->

    </div>
@endsection
