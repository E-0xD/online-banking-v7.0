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
            <div class="col-md-8">
                <x-dashboard.user.card>
                    @slot('header')
                        Email-Based Two-Factor Authentication <br>
                        <small>Add an extra layer of security to your account</small>

                        <div class="float-end">
                            <a href="{{ route('user.profile.index') }}" class="btn btn-soft-primary"> <i
                                    class="fa-solid fa-arrow-left me-1"></i> Back to
                                Profile</a>

                        </div>
                    @endslot

                    <span class="{{ $user->two_factor_authentication->badge() }}">
                        <i class="fa fa-shield"></i> {{ $user->two_factor_authentication->label() }}
                    </span> <b>Current Status</b>

                    <p>
                        When enabled, a 6-digit verification code will be sent to your email address <a
                            href="{{ route('user.profile.index') }}"
                            class="text-primary font-weight-bolder">{{ $user->email }}</a>
                        each time you log in to your account.
                    </p>

                    <x-dashboard.user.info-list title="How Two-Factor Authentication Works" icon="fa-solid fa-info"
                        :options="[
                            'When you log in with your password, a 6-digit code will be sent to your email',
                            'You must enter this code to complete your login',
                            'This adds an extra layer of security to your account',
                            'The code expires after 10 minutes for security',
                        ]" />

                    @if ($user->two_factor_authentication->value === 0)
                        <form action="{{ route('user.profile.two_factor_authentication') }}" method="post">
                            @csrf
                            <x-dashboard.user.form-button icon="fa-solid fa-shield me-1"
                                name="Enable Two-Factor Authentication" class="btn btn-primary" />
                        </form>
                    @else
                        <form action="{{ route('user.profile.two_factor_authentication.disable') }}" method="post">
                            @csrf
                            <x-dashboard.user.form-button icon="fa-solid fa-shield me-1"
                                name="Disable Two-Factor Authentication" class="btn btn-danger" />
                        </form>
                    @endif

                </x-dashboard.user.card>
            </div>

            <div class="col-md-4">
                <x-dashboard.user.card>
                    @slot('header')
                        <i class="fa-solid fa-lightbulb"></i> Security Tips
                    @endslot

                    <x-dashboard.user.tips :options="[
                        'Use a strong, unique password',
                        'Enable two-factor authentication',
                        'Keep your email secure',
                        'Log out when using shared devices',
                        'Regularly check your account activity',
                    ]" />

                </x-dashboard.user.card>
            </div>

            <div class="col-md-12">
                <x-dashboard.user.support-card />
            </div>
        </div>
    </div>
@endsection
