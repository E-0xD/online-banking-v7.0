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
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header border-bottom border-dashed">
                        <h3 class="card-title mb-0">Account Information</h3>
                        <p>To comply with regulations, please provide your information to complete the verification process.
                        </p>
                    </div>
                </div>

                <form action="{{ route('user.kyc.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <x-dashboard.user.card>
                        @slot('header')
                            <h3 class="card-title mb-0">Personal Details</h3>
                            <p>Your personal information required for identification</p>
                        @endslot

                        <p>Kindly provide the information requested below to enable us to create an account for you.</p>

                        <div class="row">
                            <x-dashboard.user.form-input name="name" label="Name" class="col-md-6 mb-3"
                                value="{{ $user->name }}" />

                            <x-dashboard.user.form-input name="middle_name" label="Middle Name" class="col-md-6 mb-3"
                                value="{{ $user->middle_name }}" />

                            <x-dashboard.user.form-input name="last_name" label="Last Name" class="col-md-6 mb-3"
                                value="{{ $user->last_name }}" />

                            <x-dashboard.user.form-input name="email" label="Email Address" class="col-md-6 mb-3"
                                type="email" value="{{ $user->email }}" />

                            <x-dashboard.user.form-input name="phone" label="Phone Number" class="col-md-6 mb-3"
                                value="{{ $user->phone }}" />

                            <x-dashboard.user.form-select name="title" label="Title" type="select" class="col-md-6 mb-3"
                                value="{{ @$user->title }}" :options="config('setting.titles')" />

                            <x-dashboard.user.form-select name="gender" label="Gender" type="select" class="col-md-6 mb-3"
                                value="{{ $user->gender }}" :options="config('setting.genders')" />

                            <x-dashboard.user.form-input name="zip_code" label="Zip Code" class="col-md-6 mb-3"
                                value="{{ @$user->zip_code }}" />

                            <x-dashboard.user.form-input name="dob" label="Date of Birth" type="date"
                                class="col-md-6 mb-3" value="{{ $user->dob }}" />
                        </div>

                    </x-dashboard.user.card>

                    <x-dashboard.user.card>
                        @slot('header')
                            <h3 class="card-title mb-0">Employment Information</h3>
                            <p>Required in case of loan or facility application</p>
                        @endslot

                        <div class="row">
                            <x-dashboard.user.form-input name="security_number"
                                label="State Security Number (SSN, NI, SIN etc.)" class="col-md-6 mb-3"
                                value="{{ $user->security_number }}" />

                            <x-dashboard.user.form-select name="account_type" label="Account Type" type="select"
                                class="col-md-6 mb-3" value="{{ @$user->account_type }}" :options="config('setting.accountTypes')" />

                            <x-dashboard.user.form-select name="employment" label="Type of Employment" type="select"
                                class="col-md-6 mb-3" value="{{ $user->employment }}" :options="config('setting.employments')" />

                            <x-dashboard.user.form-select name="salary_range" label="Annual Income Range" type="select"
                                class="col-md-6 mb-3" value="{{ $user->salary_range }}" :options="config('setting.salaryRanges')" />
                        </div>

                    </x-dashboard.user.card>

                    <x-dashboard.user.card>
                        @slot('header')
                            <h3 class="card-title mb-0">Your Address</h3>
                            <p>Your location information required for identification</p>
                        @endslot

                        <div class="row">
                            <x-dashboard.user.form-input name="address" label="Address Line" class="col-md-6 mb-3"
                                value="{{ $user->address }}" />

                            <x-dashboard.user.form-input name="city" label="City" class="col-md-6 mb-3"
                                value="{{ $user->city }}" />

                            <x-dashboard.user.form-input name="state" label="State" class="col-md-6 mb-3"
                                value="{{ $user->state }}" />

                            <x-dashboard.user.form-select name="country" label="Nationality" type="select"
                                class="col-md-6 mb-3" value="{{ $user->country }}" :options="config('setting.countries')" />
                        </div>

                    </x-dashboard.user.card>

                    <x-dashboard.user.card>
                        @slot('header')
                            <h3 class="card-title mb-0">Registered Next of Kin</h3>
                            <p>Information about your beneficiary</p>
                        @endslot

                        <div class="row">
                            <x-dashboard.user.form-input name="next_of_kin_name" label="Beneficiary Legal Name"
                                class="col-md-6 mb-3" value="{{ $user->next_of_kin_name }}" />

                            <x-dashboard.user.form-input name="next_of_kin_address" label="Next of Kin Address"
                                class="col-md-6 mb-3" value="{{ $user->next_of_kin_address }}" />

                            <x-dashboard.user.form-input name="next_of_kin_relationship" label="Relationship"
                                class="col-md-6 mb-3" value="{{ $user->next_of_kin_relationship }}" />

                            <x-dashboard.user.form-input name="next_of_kin_age" label="Age" class="col-md-6 mb-3"
                                value="{{ $user->next_of_kin_age }}" />

                            <x-dashboard.user.form-input name="next_of_kin_phone" label="Phone" class="col-md-6 mb-3"
                                value="{{ $user->next_of_kin_phone }}" />

                            <x-dashboard.user.form-input name="next_of_kin_email" label="Email" type="email"
                                class="col-md-6 mb-3" value="{{ $user->next_of_kin_email }}" />
                        </div>

                    </x-dashboard.user.card>

                    <x-dashboard.user.card>
                        @slot('header')
                            <h3 class="card-title mb-0">Document Upload</h3>
                            <p>Personal documents required for identity verification</p>
                        @endslot

                        <x-dashboard.user.info-list title="To avoid delays when verifying your account"
                            icon="fa-solid fa-info" :options="[
                                'Chosen credential must not have expired',
                                'Document should be in good condition and clearly visible',
                                'Make sure that there is no light glare on the document',
                            ]" />

                        <div class="row">
                            <x-dashboard.user.form-select name="document_type" label="Document Type" type="select"
                                class="col-md-6 mb-3" value="{{ $user->document_type }}" :options="config('setting.documentTypes')" />

                            <x-dashboard.user.form-input name="front_side" label="Front Side" type="file"
                                class="col-md-6 mb-3" />

                            <x-dashboard.user.form-input name="back_side" label="Back Side" type="file"
                                class="col-md-6 mb-3" />
                        </div>

                    </x-dashboard.user.card>

                    <div class="card">
                        <div class="card-body">

                            @if ($user->hasPendingKYC())
                                <div class="alert alert-warning d-flex align-items-start p-3 rounded">
                                    <i class="fa-solid fa-exclamation-triangle text-warning me-2 mt-1"></i>
                                    <div>
                                        {{-- <h6 class="fw-semibold mb-1">Security Reminder</h6> --}}
                                        <p class="mb-0 small">
                                            Your previous application is under review, please wait.
                                        </p>
                                    </div>
                                </div>
                            @endif

                            @if (!$user->hasPendingKYC())
                                <x-dashboard.user.form-button class="btn btn-primary w-100"
                                    icon="fa-solid fa-check-circle me-2" name="Submit Application" />
                            @endif
                        </div>
                    </div>

                </form>

                <x-dashboard.user.support-card />

            </div>
        </div>
    </div>
@endsection
