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
                                <p class="mb-0 text-muted">Account State:
                                    <span class="{{ $user->account_state->badge() }}">
                                        {{ $user->account_state->label() }}
                                    </span>
                                </p>
                            </div>
                            {{-- <div class="ms-auto">
                                Account State: <span
                                    class="{{ $user->account_state->badge() }}">{{ $user->account_state->label() }}</span>
                            </div> --}}
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
                    {{-- <div class="card-footer border-top border-dashed">
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

                    </div> --}}
                    <div class="card-footer border-top border-dashed">
                        <div class="list-group list-group-flush">
                            <a href="{{ route('user.profile.change_image') }}"
                                class="list-group-item list-group-item-action d-flex align-items-center">
                                <i class="ti ti-photo text-primary me-2 fs-5"></i>
                                <div>
                                    <div class="fw-bold">Change Profile Image</div>
                                    <small class="text-muted">Update your account photo for better personalization</small>
                                </div>
                            </a>

                            <a href="{{ route('user.profile.change_password') }}"
                                class="list-group-item list-group-item-action d-flex align-items-center">
                                <i class="ti ti-lock text-warning me-2 fs-5"></i>
                                <div>
                                    <div class="fw-bold">Password Settings</div>
                                    <small class="text-muted">Manage your login password and keep your account
                                        secure</small>
                                </div>
                            </a>

                            <a href="{{ route('user.profile.two_factor_authentication') }}"
                                class="list-group-item list-group-item-action d-flex align-items-center">
                                <i class="ti ti-shield-lock text-success me-2 fs-5"></i>
                                <div class="d-flex flex-column">
                                    <div class="fw-bold">
                                        Two-Factor Authentication {!! $user->two_factor_authentication->checkBadge() !!}
                                    </div>
                                    <small class="text-muted">Add an extra layer of security to your account</small>
                                </div>
                            </a>

                            <a href="{{ route('user.profile.change_transaction_pin') }}"
                                class="list-group-item list-group-item-action d-flex align-items-center">
                                <i class="ti ti-key text-danger me-2 fs-5"></i>
                                <div>
                                    <div class="fw-bold">Transaction PIN</div>
                                    <small class="text-muted">Set or update your PIN for financial transactions</small>
                                </div>
                            </a>
                        </div>
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
                        @if ($user->front_side || $user->back_side)
                            @if ($user->front_side)
                                <div
                                    class="d-flex p-2 rounded align-items-center gap-2 bg-light-subtle border border-dashed">
                                    <div
                                        class="avatar avatar-lg d-flex align-items-center justify-content-center rounded-circle">
                                        <iconify-icon icon="solar:file-download-bold"
                                            class="text-primary fs-3"></iconify-icon>
                                    </div>
                                    <div class="d-block">
                                        <a href="{{ asset($user->front_side) }}" target="_blank"
                                            class="text-dark fw-medium">Front Side</a>
                                    </div>
                                </div>
                            @endif
                            @if ($user->back_side)
                                <div
                                    class="d-flex p-2 rounded align-items-center gap-2 bg-light-subtle border border-dashed mt-2">
                                    <div
                                        class="avatar avatar-lg d-flex align-items-center justify-content-center rounded-circle">
                                        <iconify-icon icon="solar:file-download-bold"
                                            class="text-primary fs-3"></iconify-icon>
                                    </div>
                                    <div class="d-block">
                                        <a href="{{ asset($user->back_side) }}" target="_blank"
                                            class="text-dark fw-medium">Back Side</a>
                                    </div>
                                </div>
                            @endif
                        @else
                            <div class="d-flex p-2 rounded align-items-center gap-2 bg-light-subtle border border-dashed">
                                <div
                                    class="avatar avatar-lg d-flex align-items-center justify-content-center rounded-circle">
                                    <iconify-icon icon="solar:file-download-bold" class="text-primary fs-3"></iconify-icon>
                                </div>
                                <div class="d-block">
                                    <p class="text-muted mb-0">No uploaded documents</p>
                                </div>
                            </div>
                        @endif
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

                <x-dashboard.user.support-card />
            </div>
        </div>
    </div>
@endsection
