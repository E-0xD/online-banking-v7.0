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

                        <x-dashboard.user.info-list title="Password Requirements"
                            description="Ensure that these requirements are met:" icon="fa-solid fa-shield"
                            :options="[
                                'Minimum 8 characters long – the more, the better',
                                'At least one lowercase character',
                                'At least one uppercase character',
                                'At least one number',
                            ]" />

                        <x-dashboard.user.warning-list title="Security Reminder" :options="[
                            'After changing your password, you\'ll be required to log in again with your new credentials.',
                        ]" />

                        <div class="float-end">
                            <x-dashboard.user.submit-and-back-button href="{{ route('user.profile.index') }}"
                                back="Back to Profile" submit="Change Password" class="btn btn-primary" />
                        </div>
                    </form>

                </x-dashboard.user.card>
            </div>
        </div>
    </div>
@endsection
