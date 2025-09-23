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
            <div class="col-lg-12">
                @include('dashboard.admin.user.partials.account_options_and_status')

                <x-dashboard.admin.card>
                    @slot('header')
                        User Account State Management
                    @endslot

                    <form action="{{ route('admin.user.account_state.update', $user->uuid) }}" method="post">
                        @csrf
                        @method('PATCH')
                        <!-- Account State -->
                        <x-dashboard.admin.form-select name="account_state" label="Account State" type="select"
                            class="col-md-12 mb-3" value="{{ $user->account_state }}" :options="config('setting.accountStates')" />

                        <!-- Message -->
                        <x-dashboard.admin.form-input name="account_state_message" label="Account State Message"
                            type="textarea" class="col-md-12 mb-3" value="{{ $user->account_state_message }}" />

                        <x-dashboard.admin.submit-and-back-button back="Back to User Details" submit="Update Account State"
                            href="{{ route('admin.user.show', $user->uuid) }}" />
                    </form>

                </x-dashboard.admin.card>

            </div>
            <!-- end col -->
        </div>
        <!-- end row -->

    </div>
@endsection
