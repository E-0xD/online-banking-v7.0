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
                        Create a secure PIN you can remember
                    @endslot

                    <form action="{{ route('user.profile.change_transaction_pin') }}" method="post">
                        @csrf
                        @method('PATCH')

                        <x-dashboard.user.form-input name="transaction_pin" label="Transaction PIN" id="transaction_pin"
                            type="password" placeholder="Enter your new transaction PIN" class="col-md-12 mb-3"
                            formText="Create a secure PIN you can remember" />

                        <x-dashboard.user.form-input name="transaction_pin_confirmation"
                            label="Transaction PIN Confirmation" id="transaction_pin_confirmation" type="password"
                            placeholder="Confirm your new transaction PIN" class="col-md-12 mb-3"
                            formText="Confirm your new transaction PIN" />

                        <x-dashboard.user.form-input name="current_password" label="Current Password" type="password"
                            placeholder="Enter your current password" class="col-md-12 mb-3"
                            formText="For security verification" />

                        <x-dashboard.user.warning-list title="Security Reminder" :options="['Keep your transaction PIN confidential. Never share it with anyone.']" />

                        <x-dashboard.user.form-button name="Update Transaction PIN" class="btn btn-primary w-100" />
                    </form>

                </x-dashboard.user.card>

                <x-dashboard.user.support-card />
            </div>
        </div>
    </div>
@endsection
