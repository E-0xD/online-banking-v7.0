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
            <div class="col-xl-12 col-lg-12">
                <x-dashboard.user.card>
                    <div class="table-responsive">
                        <table id="myTable" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Reference ID</th>
                                    <th>Amount</th>
                                    <th>Method</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($deposits as $deposit)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $deposit->reference_id }}</td>
                                        <td>{{ currency($deposit->user->currency) }}{{ formatAmount($deposit->amount) }}
                                        </td>
                                        <td>{{ $deposit->method }}</td>
                                        <td>
                                            <span class="{{ $deposit->status->badge() }}">
                                                {{ $deposit->status->label() }}
                                            </span>
                                        </td>
                                        <td>
                                            <a href="{{ route('user.deposit.show', $deposit->uuid) }}"
                                                class="btn btn-warning btn-sm"> <i class="ti ti-eye me-1"></i> View</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </x-dashboard.user.card>
            </div>
        </div>
    </div>
@endsection
