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
                            <a class="btn btn-primary btn-sm" href="{{ route('admin.wallet.create') }}"> <i
                                    class="ti ti-plus me-1"></i>New</a>
                        </div>
                    @endslot

                    <dl class="row">
                        <dt class="col-sm-3">Name</dt>
                        <dd class="col-sm-9">{{ $wallet->name }}</dd>

                        <dt class="col-sm-3">Symbol</dt>
                        <dd class="col-sm-9">{{ $wallet->symbol }}</dd>

                        <dt class="col-sm-3">Address</dt>
                        <dd class="col-sm-9">{{ $wallet->address }}</dd>

                        <dt class="col-sm-3">Network</dt>
                        <dd class="col-sm-9">{{ $wallet->network }}</dd>

                        <dt class="col-sm-3">QR CODE</dt>
                        <dd class="col-sm-9">
                            <img src="{{ asset($wallet->qr_code_path) }}" class="img-thumbnail" width="200">
                        </dd>

                        <dt class="col-sm-3">Balance</dt>
                        <dd class="col-sm-9">{{ formatAmount($wallet->balance) }}{{ $wallet->symbol }}</dd>

                        <dt class="col-sm-3">Status</dt>
                        <dd class="col-sm-9">{{ $wallet->status }}</dd>

                        <dt class="col-sm-3">Description</dt>
                        <dd class="col-sm-9">{{ $wallet->description }}</dd>

                        <dt class="col-sm-3">Date</dt>
                        <dd class="col-sm-9">{{ formatDate($wallet->created_at) }}</dd>
                    </dl>

                    <x-dashboard.admin.back-button href="{{ route('admin.wallet.index') }}" />

                    <div class="text-end">
                        <a href="{{ route('admin.wallet.edit', $wallet->uuid) }}" class="btn btn-primary m-1"> <i
                                class="ti ti-edit me-1"></i> Edit</a>

                        <form action="{{ route('admin.wallet.delete', $wallet->uuid) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger m-1" onclick="return confirm('Are you sure?')">
                                <i class="ti ti-trash me-1"></i>
                                Delete
                            </button>
                        </form>
                    </div>

                </x-dashboard.admin.card>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->

    </div>
@endsection
