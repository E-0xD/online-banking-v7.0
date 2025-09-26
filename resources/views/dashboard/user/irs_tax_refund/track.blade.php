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
                <x-dashboard.user.card>
                    @slot('header')
                        Track Your Refund
                    @endslot

                    <div class="text-center">
                        <div class="bg-success text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-2"
                            style="width:50px; height:50px;">
                            <i class="fa-solid fa-magnifying-glass-dollar fs-4"></i>
                        </div>
                        <h3>Refund Tracking</h3>
                        <p>Enter your Filing ID below to check the current status of your tax refund.</p>
                    </div>

                    <form action="{{ route('user.irs_tax_refund.track') }}" method="post">
                        @csrf

                        <x-dashboard.user.card>
                            @slot('header')
                                <i class="fa-solid fa-key"></i> Filing ID
                            @endslot

                            <x-dashboard.user.form-input name="filing_id" label="Filing ID" class="col-md-12 mb-3"
                                value="{{ old('filing_id') }}" placeholder="SIM-XXXXXX" />
                        </x-dashboard.user.card>

                        <div class="float-end">
                            <x-dashboard.user.form-button name="Track Refund" />
                        </div>
                    </form>
                </x-dashboard.user.card>

            </div>
            <!-- end col -->
        </div>
        <!-- end row -->

    </div>
@endsection
