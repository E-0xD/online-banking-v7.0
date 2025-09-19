@extends('dashboard.master.layouts.app')
@section('content')
    <div class="page-container">

        <div class="page-title-head d-flex align-items-sm-center flex-sm-row flex-column gap-2">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold mb-0">{{ $title }}</h4>
            </div>

            <div class="text-end">
                <x-dashboard.master.breadcrumbs :breadcrumbs="$breadcrumbs" />
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <dl class="row">
                            <dt class="col-sm-4">Name:</dt>
                            <dd class="col-sm-8">{{ $admin->name }}</dd>

                            <dt class="col-sm-4">Email:</dt>
                            <dd class="col-sm-8">{{ $admin->email }}</dd>

                            <dt class="col-sm-4">BTC Address:</dt>
                            <dd class="col-sm-8">{{ $admin->btc_address ?? 'N/A' }}</dd>

                            <dt class="col-sm-4">BTC QR Code:</dt>
                            <dd class="col-sm-8">
                                @if ($admin->btc_qr_code)
                                    <img src="{{ asset($admin->btc_qr_code) }}" alt="BTC QR Code" class="img-thumbnail"
                                        width="200">
                                @else
                                    {{ @$qrCode }}
                                @endif
                            </dd>

                            <dt class="col-sm-4">Status:</dt>
                            <dd class="col-sm-8">
                                <span class="{{ $admin->status->badge() }}">
                                    {{ $admin->status->label() }}
                                </span>
                            </dd>
                        </dl>
                        <x-dashboard.master.back-button href="{{ route('master.admin.index') }}" />
                    </div><!-- end card-body -->
                </div><!-- end card -->
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->

    </div>
@endsection
