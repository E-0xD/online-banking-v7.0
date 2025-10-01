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
                        Transaction Overview
                    @endslot

                    @include('dashboard.partials.transaction_details')

                    <div class="d-flex justify-content-end">
                        <a href="{{ route('user.transaction.index') }}" class="btn btn-primary"> <i
                                class="ti ti-arrow-left me-1"></i> Back</a>
                    </div>

                </x-dashboard.user.card>
            </div>
        </div>
    </div>
@endsection
