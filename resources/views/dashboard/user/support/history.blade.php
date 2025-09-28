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
                <x-dashboard.admin.card>
                    @slot('header')
                        User {{ $title }}
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
                                            <a href="{{ route('user.support.show', $support->uuid) }}"
                                                class="btn btn-warning btn-sm m-1">
                                                <i class="ti ti-eye me-1">
                                                </i>View </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </x-dashboard.admin.card>
            </div>
        </div>
    </div>
@endsection
