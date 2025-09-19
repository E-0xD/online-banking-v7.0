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
                <x-dashboard.master.card>
                    <x-dashboard.master.details-list :options="[
                        'Name' => $admin->name,
                        'Email' => $admin->email,
                        'BTC Address' => $admin->btc_address ?? 'N/A',
                        'image' => [
                            'label' => 'BTC QR Code',
                            'src' => $admin->btc_qr_code,
                            'alt' => 'BTC QR Code',
                            'class' => 'img-thumbnail',
                            'width' => '200',
                        ],
                        'badge' => [
                            'label' => 'Status',
                            'value' => $admin->status->label(),
                            'badge' => $admin->status->badge(),
                        ],
                    ]" />
                    <x-dashboard.master.back-button href="{{ route('master.admin.index') }}" />
                </x-dashboard.master.card>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->

    </div>
@endsection
