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
                        User {{ $title }} Management
                    @endslot

                    <div class="table-responsive">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Priority</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($supports as $support)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            {{ $support->title }}
                                        </td>
                                        <td>
                                            {{ $support->priority }}
                                        </td>
                                        <td>
                                            {{ $support->description }}
                                        </td>
                                        <td>
                                            {{ $support->status }}
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.user.support.show', [$user->uuid, $support->uuid]) }}"
                                                class="btn btn-warning btn-sm m-1">
                                                <i class="ti ti-eye me-1">
                                                </i>View </a>
                                            <form
                                                action="{{ route('admin.user.support.delete', [$user->uuid, $support->uuid]) }}"
                                                method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm m-1"
                                                    onclick="return confirm('Are you sure?')">
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
