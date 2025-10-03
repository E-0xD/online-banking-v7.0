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
                <x-dashboard.available_balance :user="$user" />

                <div class="card">
                    <div class="card-header border-bottom">
                        <h5 class="card-title mb-0">
                            Transaction Overview
                        </h5>
                    </div>

                    <div class="card-body">
                        @include('dashboard.partials.transaction_details')

                        <div class="d-flex justify-content-end">
                            <a href="{{ route('admin.user.transaction.index', $user->uuid) }}" class="btn btn-primary"> <i
                                    class="ti ti-arrow-left me-1"></i> Back</a>
                        </div>

                    </div><!-- end card-body -->
                </div><!-- end card -->
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->

    </div>
@endsection
