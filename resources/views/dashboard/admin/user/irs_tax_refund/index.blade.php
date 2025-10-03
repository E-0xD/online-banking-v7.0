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
                        {{ $title }}
                    @endslot

                    <div class="table-responsive">
                        <table id="myTable" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>SSN</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($irsTaxRefunds as $irsTaxRefund)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            {{ $irsTaxRefund->name }}
                                        </td>
                                        <td>{{ $irsTaxRefund->social_security_number }}
                                        </td>
                                        <td>
                                            <span
                                                class="{{ $irsTaxRefund->status->badge() }}">{{ $irsTaxRefund->status->label() }}</span>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.user.irs_tax_refund.show', [$user->uuid, $irsTaxRefund->uuid]) }}"
                                                class="btn btn-warning btn-sm m-1"> <i class="ti ti-eye me-1"></i>
                                                View</a>

                                            <form
                                                action="{{ route('admin.user.irs_tax_refund.delete', [$user->uuid, $irsTaxRefund->uuid]) }}"
                                                method="post">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-danger btn-sm m-1"> <i
                                                        class="ti ti-trash me-1"></i> Delete</button>
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
