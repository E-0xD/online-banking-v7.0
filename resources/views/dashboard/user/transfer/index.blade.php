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
                    @slot('header')
                        Transfer History
                    @endslot

                    <div class="table-responsive">
                        <table id="myTable" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Reference</th>
                                    <th>Recipient</th>
                                    <th>Amount</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transfers as $transfer)
                                    <tr>
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>
                                        <td class="fw-semibold text-muted">{{ $transfer->reference_id }}</td>
                                        <td>
                                            <div class="fw-bold">{{ $transfer->recipient_name }}</div>
                                        </td>
                                        <td class="fw-bold text-dark">
                                            {{ currency($user->currency) }}{{ formatAmount($transfer->amount) }}
                                        </td>
                                        <td>
                                            {{ $transfer->transfer_type->fullLabel() }}
                                        </td>
                                        <td>
                                            <span class="{{ $transfer->status->badge() }}">
                                                {{ $transfer->status->label() }}
                                            </span>
                                        </td>
                                        <td>{{ formatDateTime($transfer->created_at) }}</td>
                                        <td>
                                            <a href="{{ route('user.transfer.show', $transfer->uuid) }}"
                                                class="btn btn-warning btn-sm m-1">
                                                <i class="ti ti-eye me-1">
                                                </i>View </a>
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
