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
                @if ($irsTaxRefund->isPending() || $irsTaxRefund->isSubmitted())
                    <x-dashboard.admin.card>
                        <div class="mb-3">
                            <form
                                action="{{ route('admin.user.irs_tax_refund.update', [$user->uuid, $irsTaxRefund->uuid]) }}"
                                method="post">
                                @csrf
                                @method('PATCH')

                                <button type="submit" name="status" value="refunded" class="btn btn-success"> <i
                                        class="ti ti-check me-1"></i>
                                    Refunded</button>
                            </form>

                        </div>
                        <div class="mb-3">
                            <form
                                action="{{ route('admin.user.irs_tax_refund.update', [$user->uuid, $irsTaxRefund->uuid]) }}"
                                method="post">
                                @csrf
                                @method('PATCH')

                                <button type="submit" name="status" value="rejected" class="btn btn-danger"> <i
                                        class="fa-solid fa-times me-1"></i>
                                    Rejected</button>
                            </form>
                        </div>
                    </x-dashboard.admin.card>
                @endif
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->

    </div>
@endsection
