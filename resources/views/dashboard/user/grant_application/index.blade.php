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

                    @if ($user->grantApplication()->count() > 0)
                        @slot('header')
                            <div class="float-end">
                                <a href="{{ route('user.grant_application.history') }}" class="btn btn-primary btn-sm"><i
                                        class="fa-solid fa-history me-1"></i> Application History
                                </a>
                            </div>
                        @endslot
                    @endif

                    <div class="text-center mb-4">
                        <h4 class="fw-bold">Select Application Type</h4>
                        <p class="text-muted">
                            Please select the type of application you would like to submit. Different documentation is
                            required
                            for
                            individual and company applications.
                        </p>
                    </div>

                    <div class="row justify-content-center g-4">

                        <!-- Apply as Individual -->
                        <div class="col-md-4">
                            <div class="card text-center h-100">
                                <div class="card-body">
                                    <div class="rounded-circle bg-primary bg-opacity-10 d-inline-flex align-items-center justify-content-center mb-3"
                                        style="width:50px; height:50px;">
                                        <i class="bi bi-person text-primary fs-4"></i>
                                    </div>
                                    <h5 class="fw-bold">Apply as Individual</h5>
                                    <p class="text-muted small">
                                        For individual applicants seeking funding for programs, equipment, research or
                                        community
                                        outreach.
                                    </p>
                                    <a href="{{ route('user.grant_application.individual') }}"
                                        class="btn btn-primary w-100">Continue</a>
                                </div>
                            </div>
                        </div>

                        <!-- Apply as Company -->
                        <div class="col-md-4">
                            <div class="card text-center h-100">
                                <div class="card-body">
                                    <div class="rounded-circle bg-secondary bg-opacity-10 d-inline-flex align-items-center justify-content-center mb-3"
                                        style="width:50px; height:50px;">
                                        <i class="bi bi-building text-secondary fs-4"></i>
                                    </div>
                                    <h5 class="fw-bold">Apply as Company</h5>
                                    <p class="text-muted small">
                                        For registered organizations with an EIN, established history and defined mission.
                                    </p>
                                    <a href="{{ route('user.grant_application.company') }}"
                                        class="btn btn-secondary w-100">Continue</a>
                                </div>
                            </div>
                        </div>

                    </div>

                </x-dashboard.user.card>
            </div>
        </div>
    </div>
@endsection
