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
                        Refund Status
                    @endslot

                    <p><strong>Filing ID:</strong> {{ $irsTaxRefund->filing_id }}</p>
                    <p><strong>Name:</strong> {{ $irsTaxRefund->name }}</p>
                    <p><strong>SSN:</strong> {{ $irsTaxRefund->social_security_number }}</p>
                    <p><strong>Country:</strong> {{ $irsTaxRefund->country }}</p>
                    <p><strong>Status:</strong>
                        <span class="{{ $irsTaxRefund->status->badge() }}">
                            {{ $irsTaxRefund->status->label() }}
                        </span>
                    </p>
                    <p><strong>Filed On:</strong> {{ $irsTaxRefund->created_at->format('M d, Y h:i A') }}</p>

                    @if ($irsTaxRefund->isAccepted())
                        <p><strong>Accepted On:</strong> {{ $irsTaxRefund->updated_at->format('M d, Y h:i A') }}</p>
                    @elseif($irsTaxRefund->isRejected())
                        <p><strong>Rejected On:</strong> {{ $irsTaxRefund->updated_at->format('M d, Y h:i A') }}</p>
                    @endif

                    <x-dashboard.user.back-button href="{{ route('user.irs_tax_refund.index') }}"
                        name="Back to IRS Tax Refund" />

                </x-dashboard.user.card>

            </div>
            <!-- end col -->
        </div>
        <!-- end row -->

    </div>
@endsection
