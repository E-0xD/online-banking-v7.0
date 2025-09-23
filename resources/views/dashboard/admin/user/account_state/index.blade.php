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

                    @push('livewireStyles')
                        @livewireStyles
                    @endpush

                    <livewire:dashboard.admin.user-account-state :user-id="$user->uuid" />

                    @push('livewireScripts')
                        @livewireScripts
                    @endpush

                </x-dashboard.admin.card>

            </div>
            <!-- end col -->
        </div>
        <!-- end row -->

    </div>
@endsection
