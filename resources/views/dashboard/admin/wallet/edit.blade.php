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
            <div class="col-lg-12">
                <x-dashboard.admin.card>
                    @slot('header')
                        {{ $title }}

                        <div class="float-end">
                            <a class="btn btn-primary btn-sm" href="#"> <i class="ti ti-plus me-1"></i>New</a>
                        </div>
                    @endslot

                    <form action="{{ route('admin.wallet.update', $wallet->uuid) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <div class="row">
                            <x-dashboard.admin.form-input name="name" value="{{ old('name', $wallet->name) }}"
                                label="Name" placeholder="Bitcoin Wallet" type="text" class="col-md-6 mb-3" />

                            <x-dashboard.admin.form-input name="symbol" value="{{ old('symbol', $wallet->symbol) }}"
                                label="Symbol" type="text" placeholder="BTC" class="col-md-6 mb-3" />

                            <x-dashboard.admin.form-input name="address" value="{{ old('address', $wallet->address) }}"
                                label="Address" type="text" placeholder="Public blockchain address"
                                class="col-md-6 mb-3" />

                            <x-dashboard.admin.form-input name="network" value="{{ old('network', $wallet->network) }}"
                                label="Network" type="text" placeholder="e.g., Bitcoin Mainnet, ERC20"
                                class="col-md-6 mb-3" />

                            <x-dashboard.admin.form-input name="qr_code_path" label="QR Code" type="file"
                                class="col-md-6 mb-3" />

                            <x-dashboard.admin.form-input name="balance" value="{{ old('balance', $wallet->balance) }}"
                                label="Balance" type="number" type="text" placeholder="0.00000000"
                                class="col-md-6 mb-3" />

                            <x-dashboard.admin.form-select name="status" id="wallet_status" label="Status" type="select"
                                value="{{ old('status', $wallet->status) }}" class="col-md-6 mb-3" :options="config('setting.walletStatuses')" />

                            <x-dashboard.admin.form-input name="description"
                                value="{{ old('description', $wallet->description) }}" type="textarea" label="Description"
                                class="col-md-6 mb-3" />

                            <x-dashboard.admin.submit-and-back-button href="{{ route('admin.wallet.index') }}"
                                back="Back to Wallets" submit="Update" />
                        </div>

                    </form>

                </x-dashboard.admin.card>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->

    </div>
@endsection
