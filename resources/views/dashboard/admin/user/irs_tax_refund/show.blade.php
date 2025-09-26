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
                <x-dashboard.admin.card>
                    @slot('header')
                        {{ $title }}
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

                    @if ($irsTaxRefund->isRejected())
                        <p><strong>Rejected On:</strong> {{ $irsTaxRefund->updated_at->format('M d, Y h:i A') }}</p>
                    @endif

                </x-dashboard.admin.card>
                <x-dashboard.admin.card>
                    @slot('header')
                        IRS Tax Refund Status Management
                    @endslot

                    <form action="{{ route('admin.user.irs_tax_refund.update', [$user->uuid, $irsTaxRefund->uuid]) }}"
                        method="post">
                        @csrf
                        @method('PATCH')

                        <x-dashboard.admin.form-select name="status" id="irs_tax_refund_status" label="Status"
                            type="select" class="col-md-12 mb-3" value="{{ old('status', $irsTaxRefund->status) }}"
                            :options="config('setting.irsTaxRefundStatuses')" />

                        <x-dashboard.admin.submit-and-back-button
                            href="{{ route('admin.user.irs_tax_refund.index', [$user->uuid, $irsTaxRefund->uuid]) }}"
                            back="Back to IRS Tax Refund" submit="Update Status" />
                    </form>

                </x-dashboard.admin.card>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->

    </div>
@endsection
