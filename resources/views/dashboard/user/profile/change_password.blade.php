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
                        Update your account password to maintain security
                    @endslot

                    <form action="{{ route('user.profile.change_password') }}" method="post">
                        @csrf
                        @method('PATCH')

                        <x-dashboard.user.form-input name="current_password" label="Current Password" type="password"
                            placeholder="Enter your current password" class="col-md-12 mb-3" />

                        <x-dashboard.user.form-input name="password" label="Password" type="password"
                            placeholder="Enter your new password" class="col-md-12 mb-3" />

                        <x-dashboard.user.form-input name="password_confirmation" label="Password Confirmation"
                            type="password" placeholder="Confirm your new password" class="col-md-12 mb-3" />

                        <div class="bg-primary bg-opacity-10 border border-primary border-opacity-25 rounded-3 p-3 mb-3">
                            <!-- Header -->
                            <h6 class="text-primary fw-semibold mb-2 d-flex align-items-center text-uppercase small">
                                <i class="fa-solid fa-shield text-primary me-2"></i>
                                Password Requirements
                            </h6>
                            <!-- Description -->
                            <p class="text-primary small mb-2">
                                Ensure that these requirements are met:
                            </p>

                            <!-- List -->
                            <ul class="list-unstyled mb-0 small">
                                <li class="d-flex align-items-center mb-1 text-primary">
                                    <span
                                        class="me-2 d-inline-flex align-items-center justify-content-center rounded-circle bg-primary"
                                        style="width:6px;height:6px;"></span>
                                    Minimum 8 characters long – the more, the better
                                </li>
                                <li class="d-flex align-items-center mb-1 text-primary">
                                    <span
                                        class="me-2 d-inline-flex align-items-center justify-content-center rounded-circle bg-primary"
                                        style="width:6px;height:6px;"></span>
                                    At least one lowercase character
                                </li>
                                <li class="d-flex align-items-center mb-1 text-primary">
                                    <span
                                        class="me-2 d-inline-flex align-items-center justify-content-center rounded-circle bg-primary"
                                        style="width:6px;height:6px;"></span>
                                    At least one uppercase character
                                </li>
                                <li class="d-flex align-items-center mb-1 text-primary">
                                    <span
                                        class="me-2 d-inline-flex align-items-center justify-content-center rounded-circle bg-primary"
                                        style="width:6px;height:6px;"></span>
                                    At least one number
                                </li>
                            </ul>
                        </div>

                        <div class="alert alert-warning d-flex align-items-start p-3 rounded">
                            <i class="fa-solid fa-exclamation-triangle text-warning me-2 mt-1"></i>
                            <div>
                                <h6 class="fw-semibold mb-1">Security Reminder</h6>
                                <p class="mb-0 small">
                                    After changing your password, you'll be required to log in again with your new
                                    credentials.
                                </p>
                            </div>
                        </div>

                        <x-dashboard.user.form-button name="Change Password" class="btn btn-primary w-100" />
                    </form>

                </x-dashboard.user.card>
            </div>
        </div>
    </div>
@endsection
