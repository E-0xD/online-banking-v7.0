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
            <div class="col-lg-12">

                @if ($latestRefund)
                    @if ($latestRefund->isPending() || $latestRefund->isSubmitted())
                        <div class="card shadow-sm border-0 text-center p-4">
                            <!-- Icon -->
                            <div class="mb-4">
                                <span class="bg-warning rounded-circle p-3">
                                    <i class="bi bi-clock text-white"></i>
                                </span>
                            </div>

                            <!-- Title -->
                            <h5 class="fw-bold mb-2">Your Refund Request is Pending</h5>

                            <!-- Subtitle -->
                            <p class="text-muted mb-4">
                                Your refund request is currently being reviewed. Please check back later for updates.
                            </p>

                            <!-- Button -->
                            <a href="{{ route('user.irs_tax_refund.track') }}" class="btn btn-primary">
                                <i class="bi bi-arrow-repeat me-2"></i> Track Status
                            </a>
                        </div>
                    @else
                        <x-dashboard.user.card>
                            @slot('header')
                                {{ $title }}
                            @endslot

                            @include('dashboard.user.partials.irs_tax_refund_form')
                        </x-dashboard.user.card>
                    @endif
                @else
                    <x-dashboard.user.card>
                        @slot('header')
                            {{ $title }}
                        @endslot

                        @include('dashboard.user.partials.irs_tax_refund_form')
                    </x-dashboard.user.card>
                @endif

            </div>
            <!-- end col -->
        </div>
        <!-- end row -->

    </div>
@endsection
