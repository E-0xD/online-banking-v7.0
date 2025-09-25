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
                        Grant Application Results
                    @endslot

                    <div class="container py-5">
                        <div class="card">
                            <div class="card-body text-center p-5">

                                <!-- Warning Icon -->
                                <div class="mb-3">
                                    <div class="d-inline-flex align-items-center justify-content-center rounded-circle bg-warning bg-opacity-25 text-warning"
                                        style="width:70px; height:70px;">
                                        <i class="fa-solid fa-triangle-exclamation fa-2x"></i>
                                    </div>
                                </div>

                                <!-- Title -->
                                <h4 class="fw-bold">We're Sorry</h4>

                                <!-- Message -->
                                <p class="text-muted mb-2">
                                    Your grant application could not be approved at this time.
                                </p>
                                <p class="text-muted">
                                    Based on your current account status and the information provided, we are unable to
                                    approve
                                    your grant application at this time. You may contact our support team for more
                                    information.
                                </p>

                                <!-- Buttons -->
                                <div class="mt-4 d-flex justify-content-center gap-2">
                                    <a href="{{ route('user.dashboard') }}" class="btn btn-primary">
                                        <i class="fa-solid fa-arrow-left me-1"></i> Return to Dashboard
                                    </a>
                                    <a href="{{ route('user.support.index') }}" class="btn btn-outline-secondary">
                                        <i class="fa-solid fa-headset me-1"></i> Contact Support
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>

                </x-dashboard.user.card>
            </div>
        </div>
    </div>
@endsection
