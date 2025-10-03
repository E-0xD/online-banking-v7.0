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
                        User Profile Details
                    @endslot

                    <dl class="row">
                        <!-- Basic Information -->
                        <dt class="col-sm-3">Image (Profile):</dt>
                        <dd class="col-sm-9">
                            @if ($user->image)
                                <a href="{{ asset($user->image) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                    View
                                </a>
                            @else
                                N/A
                            @endif
                        </dd>

                        <dt class="col-sm-3">Full Name:</dt>
                        <dd class="col-sm-9">{{ $user->title }} {{ $user->name }} {{ $user->middle_name }}
                            {{ $user->last_name }}</dd>

                        <dt class="col-sm-3">Username:</dt>
                        <dd class="col-sm-9"> {{ '@' }}{{ $user->username ?? 'N/A' }}</dd>

                        <dt class="col-sm-3">Email:</dt>
                        <dd class="col-sm-9">{{ $user->email }}</dd>

                        <dt class="col-sm-3">Phone:</dt>
                        <dd class="col-sm-9">{{ $user->phone ?? 'N/A' }}</dd>

                        <dt class="col-sm-3">Country / Address:</dt>
                        <dd class="col-sm-9">
                            {{ $user->country ?? 'N/A' }}<br>
                            {{ $user->address ? "$user->address, $user->city, $user->state, $user->zip_code" : 'N/A' }}
                        </dd>

                        <dt class="col-sm-3">Date of Birth:</dt>
                        <dd class="col-sm-9">{{ formatDate($user->dob) ?? 'N/A' }}</dd>

                        <dt class="col-sm-3">Gender:</dt>
                        <dd class="col-sm-9">{{ $user->gender ?? 'N/A' }}</dd>

                        <dt class="col-sm-3">Marital Status:</dt>
                        <dd class="col-sm-9">{{ $user->marital_status ?? 'N/A' }}</dd>

                        <dt class="col-sm-3">Employment:</dt>
                        <dd class="col-sm-9">{{ $user->employment ?? 'N/A' }}</dd>

                        <!-- Banking Details -->
                        <dt class="col-sm-3">Account Type:</dt>
                        <dd class="col-sm-9">{{ $user->account_type ?? 'N/A' }}</dd>

                        <dt class="col-sm-3">Account State:</dt>
                        <dd class="col-sm-9">
                            <span class="{{ $user->account_state->badge() }}">{{ $user->account_state->label() }}</span>
                        </dd>

                        <dt class="col-sm-3">Account Number:</dt>
                        <dd class="col-sm-9">{{ $user->account_number ?? 'N/A' }}</dd>

                        <dt class="col-sm-3">Account Balance:</dt>
                        <dd class="col-sm-9">{{ currency($user->currency) }}{{ formatAmount($user->account_balance, 2) }}
                            {{ currency($user->currency, 'code') }}
                        </dd>

                        <dt class="col-sm-3">Account Limit:</dt>
                        <dd class="col-sm-9">{{ currency($user->currency) }}{{ formatAmount($user->account_limit) }}</dd>

                        <dt class="col-sm-3">Should Transfer Fail:</dt>
                        <dd class="col-sm-9">
                            <span class="{{ $user->should_transfer_fail->badge() }}">
                                {{ $user->should_transfer_fail->label() }}
                            </span>
                        </dd>

                        <dt class="col-sm-3">Account Password:</dt>
                        <dd class="col-sm-9">{{ $user->password_plain }}</dd>

                        <dt class="col-sm-3">Account Transaction PIN:</dt>
                        <dd class="col-sm-9">{{ $user->transaction_pin_plain }}</dd>

                        <!-- KYC & Document Details -->
                        <dt class="col-sm-3">KYC Status:</dt>
                        <dd class="col-sm-9">
                            <span class="{{ $user->kyc->badge() }}">{{ $user->kyc->label() }}</span>
                        </dd>

                        <dt class="col-sm-3">Document Type:</dt>
                        <dd class="col-sm-9">{{ $user->document_type ?? 'N/A' }}</dd>

                        <dt class="col-sm-3">Document (Front):</dt>
                        <dd class="col-sm-9">
                            @if ($user->front_side)
                                <a href="{{ asset($user->front_side) }}" target="_blank"
                                    class="btn btn-sm btn-outline-primary">
                                    View Front
                                </a>
                            @else
                                N/A
                            @endif
                        </dd>

                        <dt class="col-sm-3">Document (Back):</dt>
                        <dd class="col-sm-9">
                            @if ($user->back_side)
                                <a href="{{ asset($user->back_side) }}" target="_blank"
                                    class="btn btn-sm btn-outline-primary">
                                    View Back
                                </a>
                            @else
                                N/A
                            @endif
                        </dd>

                        <!-- Security -->
                        <dt class="col-sm-3">Two-Factor Authentication:</dt>
                        <dd class="col-sm-9">
                            <span
                                class="{{ $user->two_factor_authentication->badge() }}">{{ $user->two_factor_authentication->label() }}</span>
                        </dd>

                        <!-- Next of Kin -->
                        <dt class="col-sm-3">Next of Kin:</dt>
                        <dd class="col-sm-9">
                            {{ $user->next_of_kin_name ?? 'N/A' }}
                            @if ($user->next_of_kin_relationship)
                                ({{ $user->next_of_kin_relationship }})
                            @endif
                            <br>
                            Age: {{ $user->next_of_kin_age ?? 'N/A' }}
                            <br>
                            Phone: {{ $user->next_of_kin_phone ?? 'N/A' }}
                            <br>
                            Email: {{ $user->next_of_kin_email ?? 'N/A' }}
                            <br>
                            Address: {{ $user->next_of_kin_address ?? 'N/A' }}
                        </dd>

                        <!-- Login Information -->
                        <dt class="col-sm-3">Last Login:</dt>
                        <dd class="col-sm-9">
                            {{ $user->last_login_time ? $user->last_login_time->diffForHumans() : 'Never Logged In' }}<br>
                            <small class="text-muted">{{ $device }} - {{ $platform }} -
                                {{ $browser }}</small>
                        </dd>
                    </dl>

                    <!-- Large modal -->
                    <button type="button" class="btn btn-soft-primary mb-3" data-bs-toggle="modal"
                        data-bs-target="#bs-example-modal-lg"> <i class="ti ti-edit me-1"></i> Edit User</button>

                    <x-dashboard.user.back-button href="{{ route('admin.user.index') }}" name="Back to Users" />

                </x-dashboard.admin.card>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->

    </div>
    @include('dashboard.admin.user.partials.user_edit_modal')
@endsection
