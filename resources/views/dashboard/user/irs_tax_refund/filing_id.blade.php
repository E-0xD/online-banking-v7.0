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
                        {{ $title }}
                    @endslot

                    <div class="text-center">
                        <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-2"
                            style="width:50px; height:50px;">
                            <i class="fa-solid fa-calculator fs-4"></i>
                        </div>
                        <h3>Enter Your Filing ID</h3>
                        <p>Please enter the filing ID provided by our support team</p>
                    </div>

                    <form action="{{ route('user.irs_tax_refund.filing_id.store') }}" method="post">
                        @csrf

                        <x-dashboard.user.info-list title="Need a Filing ID?" :options="[
                            'Please contact our support team to receive your filing ID. This ID is required to process your refund request.',
                        ]" support />

                        <x-dashboard.user.card>
                            @slot('header')
                                <i class="fa-solid fa-key"></i> Filing ID Information
                            @endslot

                            <x-dashboard.user.form-input name="filing_id" label="Filing ID" class="col-md-12 mb-3"
                                value="{{ old('filling_id') }}" placeholder="Enter your filing ID" />

                        </x-dashboard.user.card>

                        <div class="float-end">
                            <x-dashboard.user.form-button name="Submit Filing ID" />
                        </div>
                    </form>

                </x-dashboard.user.card>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->

    </div>
@endsection
