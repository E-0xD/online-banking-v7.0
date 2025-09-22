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
                                    <th>Title</th>
                                    <th>Message</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($notifications as $notification)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            {{ $notification->title }}
                                        </td>
                                        <td>{{ $notification->description }}
                                        </td>
                                        <td>
                                            @if ($notification->read)
                                                <span class="badge bg-success-subtle text-success fs-12 p-1">Read</span>
                                            @else
                                                <span class="badge bg-warning-subtle text-warning fs-12 p-1">Unread</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('user.notification.show', $notification->uuid) }}"
                                                class="btn btn-soft-primary btn-icon btn-sm rounded-circle"> <i
                                                    class="ti ti-eye"></i></a>
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
