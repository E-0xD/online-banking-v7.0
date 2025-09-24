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
                        All Verification Codes

                        <div class="float-end">
                            <a class="btn btn-primary" href="{{ route('admin.verification_code.create') }}"> <i
                                    class="ti ti-plus me-1"></i> Register Verification
                                Code</a>
                        </div>
                    @endslot

                    <div class="table-responsive">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Length</th>
                                    <th>Nature Of Code</th>
                                    <th>Applicable To</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($verificationCodes as $index => $verificationCode)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $verificationCode->name }}</td>
                                        <td>{{ $verificationCode->description }}</td>
                                        <td>{{ $verificationCode->length }}</td>
                                        <td>{{ ucfirst($verificationCode->nature_of_code) }}</td>
                                        <td>
                                            @if ($verificationCode->applicable_to == 'All')
                                                {{ $verificationCode->applicable_to }} Users
                                            @else
                                                {{ $verificationCode->user->name . ' ' . $verificationCode->user->middle_name . ' ' . $verificationCode->user->last_name }}
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.verification_code.show', $verificationCode->uuid) }}"
                                                class="btn btn-warning btn-sm m-1"> <i class="ti ti-eye me-1"></i> View</a>
                                            <a href="{{ route('admin.verification_code.edit', $verificationCode->uuid) }}"
                                                class="btn btn-primary btn-sm m-1"> <i class="ti ti-edit me-1"></i> Edit</a>
                                            <form
                                                action="{{ route('admin.verification_code.delete', $verificationCode->uuid) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm m-1"
                                                    onclick="return confirm('Are you sure?')">
                                                    <i class="ti ti-trash me-1"></i>
                                                    Delete
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
