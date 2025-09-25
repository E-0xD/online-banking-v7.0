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
                    <form action="{{ route('user.grant_application.individual_submit') }}" method="post">
                        @csrf

                        <x-dashboard.user.form-input name="amount" label="Request Amount ({{ currency($user->currency) }})"
                            type="number" class="col-md-12 mb-3"
                            formText="Enter the amount you would like to request for your grant"
                            value="{{ old('amount', 50000) }}" />

                        <p>
                            Please select all funding purposes that apply to your application:
                        </p>

                        <div class="mb-3">
                            <div class="row">
                                @foreach ($grantCategories as $grantCategory)
                                    <div class="col-md-6 col-lg-4 mb-3">
                                        <div class="form-check border rounded p-4 h-100">
                                            <input class="form-check-input @error('grant_categories') is-invalid @enderror"
                                                type="checkbox" value="{{ $grantCategory->id }}"
                                                id="grant_category_{{ $grantCategory->id }}" name="grant_categories[]">
                                            <label class="form-check-label ms-2"
                                                for="grant_category_{{ $grantCategory->id }}">
                                                <span class="fw-semibold">{{ $grantCategory->name }}</span>
                                                <br>
                                                <small class="text-muted">{{ $grantCategory->description }}</small>
                                            </label>

                                            @error('grant_categories')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <x-dashboard.user.info-list title="Important Information" :options="[
                            'By submitting this application, you acknowledge that the final approved amount will be determined during our review process based on your eligibility and requested amount. You\'ll receive notification once your application has been processed.',
                        ]" />

                        <x-dashboard.user.submit-and-back-button href="{{ route('user.grant_application.index') }}"
                            submit="Submit Application" />

                    </form>
                </x-dashboard.user.card>
            </div>
        </div>
    </div>
@endsection
