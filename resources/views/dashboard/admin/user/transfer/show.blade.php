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

                <x-dashboard.admin.card>
                    <dl class="row">
                        <h5 class="col-sm-12 text-primary">Transfer Details</h5>
                        <dt class="col-sm-4">Transfer Method:</dt>
                        <dd class="col-sm-8">{{ $transfer->transfer_type->fullLabel() }}</dd>
                        <dt class="col-sm-4">Transfer Amount:</dt>
                        <dd class="col-sm-8">
                            <strong>{{ currency($transfer->user->currency) . formatAmount($transfer->amount) }}</strong>
                            {{ currency($transfer->user->currency, 'code') }}
                        </dd>
                        <dt class="col-sm-4"> Completed Process:</dt>
                        <dd class="col-sm-8">
                            <span class="{{ $transfer->status->badge() }}">{{ $transfer->status->label() }}</span>
                        </dd>
                        <dt class="col-sm-4">Transfer Method:</dt>
                        <dd class="col-sm-8">{{ $transfer->transfer_type->fullLabel() }}</dd>
                        <dt class="col-sm-4">Date:</dt>
                        <dd class="col-sm-8">{{ formatDateTime($transfer->created_at) }}</dd>
                        </dd>

                        <h5 class="col-sm-12 text-primary">Beneficiary Details</h5>

                        <dt class="col-sm-4">Bank Name:</dt>
                        <dd class="col-sm-8">{{ $transfer->recipient_bank }}</dd>
                        <dt class="col-sm-4">Account Name:</dt>
                        <dd class="col-sm-8">{{ $transfer->recipient_name }}</dd>
                        <dt class="col-sm-4">Account Number:</dt>
                        <dd class="col-sm-8">{{ $transfer->recipient_account_number }}</dd>
                        @if ($transfer->recipient_routing_number)
                            <dt class="col-sm-4">Routing Number:</dt>
                            <dd class="col-sm-8">{{ $transfer->recipient_routing_number }}</dd>
                        @endif

                        @if ($transfer->recipient_iban_code)
                            <dt class="col-sm-4">IBAN Number:</dt>
                            <dd class="col-sm-8">{{ $transfer->recipient_iban_code }}</dd>
                        @endif

                        @if ($transfer->recipient_swift_code)
                            <dt class="col-sm-4">SWIFT Code:</dt>
                            <dd class="col-sm-8">{{ $transfer->recipient_swift_code }}</dd>
                        @endif

                        <h5 class="col-sm-12 text-primary">Verification codes</h5>
                        @forelse ($transferCodes as $code)
                            <dt class="col-sm-4">{{ $code->name }}</dt>
                            <dd class="col-sm-8">{{ $code->code }}</dd>
                        @empty
                            <dd class="col-12">No verification codes</dd>
                        @endforelse
                    </dl>

                    <div class="d-flex justify-content-end">
                        <a href="{{ route('admin.user.transfer.index', $user->uuid) }}" class="btn btn-primary"> <i
                                class="ti ti-arrow-left me-1"></i> Back</a>
                    </div>
                </x-dashboard.admin.card>

            </div>
            <!-- end col -->
        </div>
        <!-- end row -->

    </div>
@endsection
