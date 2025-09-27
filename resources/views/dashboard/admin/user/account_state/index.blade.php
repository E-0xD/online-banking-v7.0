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
                        User {{ $title }} Management
                    @endslot

                    <form action="{{ route('admin.user.account_state.store', $user->uuid) }}" method="POST">
                        @csrf
                        @method('PATCH')

                        <x-dashboard.admin.form-select name="account_state" id="account_state" label="Account State"
                            class="col-md-12 mb-3" value="{{ old('account_state', $user->account_state) }}" type="select"
                            :options="config('setting.accountStates')" />

                        <x-dashboard.admin.form-input name="account_state_message"
                            value="{{ old('account_state_message', $user->account_state_message) }}" type="textarea"
                            label="Account State Message" class="col-md-12 mb-3" />

                        <x-dashboard.admin.submit-and-back-button href="{{ route('admin.user.show', $user->uuid) }}"
                            back="Back to User" submit="Save" />
                    </form>

                </x-dashboard.admin.card>

            </div>
            <!-- end col -->
        </div>
        <!-- end row -->

    </div>
@endsection
