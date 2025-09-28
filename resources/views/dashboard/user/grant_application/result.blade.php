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

                    @if ($grantApplication->isPending())
                        <div class="container">
                            <div class="card">
                                <div class="card-body text-center p-5">

                                    <!-- Info Icon -->
                                    <div class="mb-3">
                                        <div class="d-inline-flex align-items-center justify-content-center rounded-circle bg-info bg-opacity-25 text-info"
                                            style="width:70px; height:70px;">
                                            <i class="fa-solid fa-hourglass-half fa-2x"></i>
                                        </div>
                                    </div>

                                    <!-- Title -->
                                    <h4 class="fw-bold">Application Pending</h4>

                                    <!-- Message -->
                                    <p class="text-muted mb-2">
                                        Your grant application is currently under review.
                                    </p>
                                    <p class="text-muted">
                                        Please allow some time for our team to verify your details. You’ll be notified once
                                        a decision has been made.
                                    </p>

                                    <!-- Buttons -->
                                    <div class="mt-4 mb-3 d-flex justify-content-center gap-2">
                                        <a href="{{ route('user.dashboard') }}" class="btn btn-primary">
                                            <i class="fa-solid fa-arrow-left me-1"></i> Return to Dashboard
                                        </a>
                                    </div>

                                    <div class="mb-3">
                                        <form
                                            action="{{ route('user.grant_application.withdrawn', $grantApplication->uuid) }}"
                                            method="post">
                                            @csrf
                                            @method('PATCH')

                                            <button type="submit" name="status" value="Withdrawn"
                                                class="btn btn-soft-danger">
                                                <i class="fa-solid fa-arrow-right me-1"></i>
                                                Withdraw Application</button>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @elseif($grantApplication->isApproved())
                        <div class="container">
                            <div class="card">
                                <div class="card-body text-center p-5">

                                    <!-- Success Icon -->
                                    <div class="mb-3">
                                        <div class="d-inline-flex align-items-center justify-content-center rounded-circle bg-success bg-opacity-25 text-success"
                                            style="width:70px; height:70px;">
                                            <i class="fa-solid fa-circle-check fa-2x"></i>
                                        </div>
                                    </div>

                                    <h4 class="fw-bold">Application Approved</h4>
                                    <p class="text-muted">
                                        Congratulations! Your grant application has been approved. You may now access your
                                        grant benefits from your dashboard.
                                    </p>

                                    <div class="mt-4 d-flex justify-content-center gap-2">
                                        <a href="{{ route('user.dashboard') }}" class="btn btn-success">
                                            <i class="fa-solid fa-arrow-right me-1"></i> Go to Dashboard
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @elseif($grantApplication->isRejected())
                        <div class="container">
                            <div class="card">
                                <div class="card-body text-center p-5">

                                    <!-- Warning Icon -->
                                    <div class="mb-3">
                                        <div class="d-inline-flex align-items-center justify-content-center rounded-circle bg-danger bg-opacity-25 text-danger"
                                            style="width:70px; height:70px;">
                                            <i class="fa-solid fa-times-circle fa-2x"></i>
                                        </div>
                                    </div>

                                    <h4 class="fw-bold">Application Rejected</h4>
                                    <p class="text-muted">
                                        @if (!$grantApplication->review_notes)
                                            Unfortunately, your grant application was not approved.
                                            Please contact support for further clarification.
                                        @else
                                            {{ $grantApplication->review_notes }}
                                        @endif
                                    </p>

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
                    @elseif ($grantApplication->isWithdrawn())
                        <div class="container">
                            <div class="card">
                                <div class="card-body text-center p-5">

                                    <!-- Neutral Icon -->
                                    <div class="mb-3">
                                        <div class="d-inline-flex align-items-center justify-content-center rounded-circle bg-secondary bg-opacity-25 text-secondary"
                                            style="width:70px; height:70px;">
                                            <i class="fa-solid fa-file-circle-xmark fa-2x"></i>
                                        </div>
                                    </div>

                                    <h4 class="fw-bold">Application Withdrawn</h4>
                                    <p class="text-muted">
                                        You have withdrawn your grant application.
                                        If this was a mistake, please contact support to reapply.
                                    </p>

                                    <div class="mt-4 d-flex justify-content-center gap-2">
                                        <a href="{{ route('user.dashboard') }}" class="btn btn-primary">
                                            <i class="fa-solid fa-arrow-left me-1"></i> Return to Dashboard
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endif

                </x-dashboard.user.card>
            </div>
        </div>
    </div>
@endsection
