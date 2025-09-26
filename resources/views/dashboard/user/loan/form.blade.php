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
                <x-dashboard.user.card>
                    @slot('header')
                        <i class="fa-solid fa-sack-dollar"></i> Loan Details
                    @endslot

                    <form action="{{ route('user.loan.store') }}" method="post">
                        @csrf

                        <div class="row">
                            <x-dashboard.user.form-input name="amount"
                                label="Loan Amount ({{ currency($user->currency) }}) *" class="col-md-6 mb-3"
                                value="{{ old('amount') }}" placeholder="Enter Loan Amount" />

                            <x-dashboard.user.form-select name="duration" label="Duration (Months) *" class="col-md-6 mb-3"
                                value="{{ old('duration') }}" type="selectKeyValuePair" :options="config('setting.loanDurations')" />

                            <x-dashboard.user.form-select name="facility" label="Loan/Credit Facility *"
                                class="col-md-12 mb-3" value="{{ old('facility') }}" type="select" :options="config('setting.creditFacilities')" />

                            <x-dashboard.user.form-input name="purpose" label="Purpose of Loan *" type="textarea"
                                placeholder="Please describe the process of this loan...." class="col-md-12 mb-3"
                                value="{{ old('purpose') }}" />

                            <x-dashboard.user.form-select name="monthly_income" label="Monthly Net Income *"
                                class="col-md-12 mb-3" value="{{ old('monthly_income') }}" type="select"
                                :options="config('setting.monthlyNetIncomes')" />
                        </div>

                        <div class="card">
                            <div class="card-body border rounded p-3">
                                <div class="form-check">
                                    <input class="form-check-input @error('term_and_condition') is-invalid @enderror"
                                        type="checkbox" name="term_and_condition" value="1" id="agreeCheck">
                                    <label class="form-check-label fw-semibold" for="agreeCheck">
                                        I agree to the terms and conditions
                                    </label>

                                    @error('term_and_condition')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <p class="text-muted small mb-0 mt-1">
                                    By submitting this application, I confirm that all information provided is accurate and
                                    complete.
                                    I authorize {{ config('app.name') }} to verify my information and credit history.
                                </p>
                            </div>
                        </div>

                        <x-dashboard.user.form-button class="btn btn-primary" name="Submit Loan Application" />

                        <a href="{{ route('user.loan.index') }}" class="btn btn-danger float-end"> <i
                                class="fa-solid fa-xmark-circle me-1"></i> Cancel</a>

                    </form>
                </x-dashboard.user.card>
            </div>
        </div>
    </div>
@endsection
