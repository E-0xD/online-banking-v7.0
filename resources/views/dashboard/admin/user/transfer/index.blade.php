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
                    @slot('header')
                        User Transfer History
                    @endslot

                    <div class="table-responsive">
                        <table id="myTable" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Reference ID</th>
                                    <th>Type</th>
                                    <th>Amount</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transfers as $transfer)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $transfer->reference_id }}</td>
                                        <td>
                                            {{ $transfer->transfer_type->fullLabel() }}
                                        </td>
                                        <td>
                                            {{ currency($transfer->user->currency) }}{{ formatAmount($transfer->amount) }}
                                        </td>
                                        <td>
                                            {{ formatDateTime($transfer->created_at) }}
                                        </td>
                                        <td>
                                            <span class="{{ $transfer->status->badge() }}">
                                                {{ $transfer->status->label() }}
                                            </span>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.user.transfer.show', [$user->uuid, $transfer->uuid]) }}"
                                                class="btn btn-warning btn-sm m-1">
                                                <i class="ti ti-eye me-1">
                                                </i>View </a>
                                            <form
                                                action="{{ route('admin.user.transfer.delete', [$user->uuid, $transfer->uuid]) }}"
                                                method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm m-1"
                                                    onclick="return confirm('Are you sure you want to delete this transfer?')">
                                                    <i class="ti ti-trash me-1"></i>Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </x-dashboard.admin.card>

            </div>
            <!-- end col -->
        </div>
        <!-- end row -->

    </div>
@endsection
