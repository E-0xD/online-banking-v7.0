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
            <div class="col-xl-4 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center gap-2">
                            @if ($user->image)
                                <a href="{{ asset($user->image) }}" target="_blank"><img src="{{ asset($user->image) }}"
                                        class="avatar-xl rounded-circle border border-light border-2"></a>
                            @else
                                <img src="{{ asset('assets/images/avatar.png') }}"
                                    class="avatar-xl rounded-circle border border-light border-2">
                            @endif
                            <div>
                                <h4 class="text-dark fw-medium">{{ $user->name }} {{ $user->first_name }}
                                    {{ $user->last_name }}</h4>
                                <p class="mb-0 text-muted">Account Number: {{ $user->account_number }}</p>
                            </div>
                            <div class="ms-auto">
                                Account State Here..
                            </div>
                        </div>
                        <div class="mt-3">
                            <h4 class="fs-15">Contact Details :</h4>
                            <div class="mt-3">
                                <div class="d-flex align-items-center gap-2 mb-2">
                                    <div class="bg-opacity-75 d-flex align-items-center justify-content-center rounded">
                                        <iconify-icon icon="solar:point-on-map-bold-duotone"
                                            class="fs-20 text-primary"></iconify-icon>
                                    </div>
                                    <p class="mb-0 text-dark">{{ $user->address }}, {{ $user->state }},
                                        {{ $user->country }}</p>
                                </div>
                                <div class="d-flex align-items-center gap-2 mb-2">
                                    <div class="bg-opacity-75 d-flex align-items-center justify-content-center rounded">
                                        <iconify-icon icon="solar:smartphone-2-bold-duotone"
                                            class="fs-20 text-primary"></iconify-icon>
                                    </div>
                                    <p class="mb-0 text-dark">{{ $user->phone }}</p>
                                </div>
                                <div class="d-flex align-items-center gap-2">
                                    <div class="bg-opacity-75 d-flex align-items-center justify-content-center rounded">
                                        <iconify-icon icon="solar:letter-bold-duotone"
                                            class="fs-20 text-primary"></iconify-icon>
                                    </div>
                                    <p class="mb-0 text-dark">{{ $user->email }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <h4 class="fs-15">Account Details :</h4>
                            <p class="mb-0 text-muted fs-14 mt-2">Account Type: {{ $user->account_type }},
                                Employment Type: {{ $user->employment }}</p>
                        </div>
                    </div>
                    <div class="card-footer border-top border-dashed">
                        <a href="{{ route('user.profile.change_image') }}" class="btn btn-primary w-100 mb-2">
                            <i class="ti ti-photo me-1"></i> Change Image
                        </a>

                        <a href="{{ route('user.profile.change_password') }}" class="btn btn-primary w-100 mb-2">
                            <i class="ti ti-lock me-1"></i> Password Settings
                        </a>

                        <a href="{{ route('user.profile.two_factor_authentication') }}" class="btn btn-primary w-100 mb-2">
                            <i class="ti ti-shield-lock me-1"></i> Two-Factor Authentication
                            {!! $user->two_factor_authentication->checkBadge() !!}
                        </a>

                        <a href="{{ route('user.profile.change_transaction_pin') }}" class="btn btn-primary w-100 mb-2">
                            <i class="ti ti-key me-1"></i> Transaction PIN
                        </a>

                    </div>
                </div>

                <div class="card">
                    <div class="card-header border-bottom border-dashed">
                        <div class="d-flex align-items-center gap-2">
                            <div class="d-block">
                                <h4 class="card-title mb-0">Uploaded Documents</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        {{-- @if ($user->id_front)
                            <div class="d-flex p-2 rounded align-items-center gap-2 bg-light-subtle border border-dashed">
                                <div
                                    class="avatar avatar-lg d-flex align-items-center justify-content-center rounded-circle">
                                    <iconify-icon icon="solar:file-download-bold" class="text-primary fs-3"></iconify-icon>
                                </div>
                                <div class="d-block">
                                    <a href="{{ asset($user->id_front) }}" target="_blank" class="text-dark fw-medium">ID
                                        Front</a>
                                </div>
                            </div>
                        @endif
                        @if ($user->id_back)
                            <div
                                class="d-flex p-2 rounded align-items-center gap-2 bg-light-subtle border border-dashed mt-2">
                                <div
                                    class="avatar avatar-lg d-flex align-items-center justify-content-center rounded-circle">
                                    <iconify-icon icon="solar:file-download-bold" class="text-primary fs-3"></iconify-icon>
                                </div>
                                <div class="d-block">
                                    <a href="{{ asset($user->id_back) }}" target="_blank" class="text-dark fw-medium">ID
                                        Back</a>
                                </div>
                            </div>
                        @endif --}}
                    </div>
                </div>
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between border-bottom border-dashed">
                        <h4 class="card-title mb-0">Account Balance</h4>
                        <div>
                            <p class="mb-0 fs-15 text-dark fw-medium">
                                {{ currency($user->currency) }}{{ formatAmount($user->account_balance) }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 col-lg-12">
                <div class="card">
                    <div class="card-header border-bottom border-dashed">
                        <h4 class="card-title mb-0">User Information</h4>
                    </div>
                    <div class="card-body">

                        <x-dashboard.user.info-list title="Account Information" :options="['To update your personal information, please contact our customer support team.']" />

                        <div class="row justify-content-between align-items-center">
                            <div class="col-lg-3 col-6 border-end border-dashed">
                                <p class="text-muted mb-1">Gender</p>
                                <p class="fs-15 fw-medium mb-3">{{ str()->ucfirst($user->gender) }}</p>
                                <p class="text-muted mb-1">Date Of Birth</p>
                                <p class="fs-15 fw-medium mb-0">{{ formatDate($user->dob) }}</p>
                            </div>
                            <div class="col-lg-3 col-6 border-end border-dashed">
                                <p class="text-muted mb-1">Phone</p>
                                <p class="fs-15 fw-medium mb-3">{{ $user->phone }}</p>
                                <p class="text-muted mb-1">State</p>
                                <p class="fs-15 fw-medium mb-0">{{ $user->state }}</p>
                            </div>
                            <div class="col-lg-3 col-6">
                                <p class="text-muted mb-1">Address</p>
                                <p class="fs-15 fw-medium mb-3">{{ $user->address }}</p>
                                <p class="text-muted mb-1">Register Date</p>
                                <p class="fs-15 fw-medium mb-0">{{ formatDateTime($user->created_at) }}</p>
                            </div>
                        </div>
                        <hr class="my-3">
                        <h4 class="mb-0 fs-15 fw-semibold">Additional Information :</h4>
                        <div class="row mt-2 g-2">
                            <div class="col-lg-3 col-6">
                                <h3 class="fw-medium">{{ str()->ucfirst($user->marital_status) }}</h3>
                                <p class="mb-0 text-muted">Marital Status</p>
                            </div>
                            <div class="col-lg-3 col-6">
                                <h3 class="fw-medium">{{ $user->country }}</h3>
                                <p class="mb-0 text-muted">Nationality</p>
                            </div>
                            <div class="col-lg-3 col-6">
                                <h3 class="fw-medium">{{ $user->employment }}</h3>
                                <p class="mb-0 text-muted">Employment Type</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header border-bottom border-dashed">
                        <div class="d-flex align-items-center gap-2">
                            <div class="d-block">
                                <h4 class="card-title mb-0">Account Status</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            {{-- <div class="col-lg-6">
                                <div class="d-flex p-2 rounded align-items-center gap-2 border">
                                    @if ($user->is_account_verified)
                                        <div
                                            class="avatar avatar-lg bg-success-subtle d-flex align-items-center justify-content-center rounded">
                                            <iconify-icon icon="solar:check-circle-bold"
                                                class="text-success fs-32"></iconify-icon>
                                        </div>
                                        <div>
                                            <p class="text-muted fw-medium mb-1 fs-15">Account Verification</p>
                                            <p class="text-dark fw-medium mb-0 fs-15">
                                                Verified</p>
                                        </div>
                                    @else
                                        <div
                                            class="avatar avatar-lg bg-danger-subtle d-flex align-items-center justify-content-center rounded">
                                            <iconify-icon icon="solar:close-circle-bold"
                                                class="text-danger fs-32"></iconify-icon>
                                        </div>
                                        <div>
                                            <p class="text-muted fw-medium mb-1 fs-15">Account Verification</p>
                                            <p class="text-dark fw-medium mb-0 fs-15">
                                                Unverified</p>
                                        </div>
                                    @endif
                                </div>
                            </div> --}}
                            <div class="col-lg-6">
                                <div class="d-flex p-2 rounded align-items-center gap-2 border">
                                    @if ($user->email_verified_at)
                                        <div
                                            class="avatar avatar-lg bg-primary-subtle d-flex align-items-center justify-content-center rounded">
                                            <iconify-icon icon="solar:letter-bold-duotone"
                                                class="text-primary fs-32"></iconify-icon>
                                        </div>
                                        <div>
                                            <p class="text-muted fw-medium mb-1 fs-15">Email Verification</p>
                                            <p class="text-dark fw-medium mb-0 fs-15">
                                                Verified</p>
                                        </div>
                                    @else
                                        <div
                                            class="avatar avatar-lg bg-danger-subtle d-flex align-items-center justify-content-center rounded">
                                            <iconify-icon icon="solar:letter-bold-duotone"
                                                class="text-danger fs-32"></iconify-icon>
                                        </div>
                                        <div>
                                            <p class="text-muted fw-medium mb-1 fs-15">Email Verification</p>
                                            <p class="text-dark fw-medium mb-0 fs-15">
                                                Unverified</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="d-flex p-2 rounded align-items-center gap-2 border">
                                    @if ($user->transaction_pin)
                                        <div
                                            class="avatar avatar-lg bg-primary-subtle d-flex align-items-center justify-content-center rounded">
                                            <iconify-icon icon="solar:lock-keyhole-bold-duotone"
                                                class="text-primary fs-32"></iconify-icon>
                                        </div>
                                        <div>
                                            <p class="text-muted fw-medium mb-1 fs-15">Transfer Pin</p>
                                            <p class="text-dark fw-medium mb-0 fs-15">
                                                Set</p>
                                        </div>
                                    @else
                                        <div
                                            class="avatar avatar-lg bg-danger-subtle d-flex align-items-center justify-content-center rounded">
                                            <iconify-icon icon="solar:lock-keyhole-bold-duotone"
                                                class="text-danger fs-32"></iconify-icon>
                                        </div>
                                        <div>
                                            <p class="text-muted fw-medium mb-1 fs-15">Transfer Pin <span><a
                                                        href="{{ route('user.transfer_pin.index') }}">Set Now</a></span>
                                            </p>
                                            <p class="text-dark fw-medium mb-0 fs-15">
                                                Not Set</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <x-dashboard.user.support-card />
            </div>
        </div>
    </div>
@endsection
