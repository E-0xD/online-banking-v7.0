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
                        Manage All Users Notifications

                        <div class="float-end">
                            <a href="{{ route('admin.user.notification.create', $user->uuid) }}" type="button"
                                class="btn btn-primary btn-sm m-1">
                                <i class="ti ti-plus me-1"></i> New Notification
                            </a>
                            <form action="{{ route('admin.user.notification.delete_all', $user->uuid) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm m-1">
                                    <i class="ti ti-trash me-1"></i> Delete All
                                </button>
                            </form>
                        </div>
                    @endslot

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
                                            <a href="{{ route('admin.user.notification.show', [$user->uuid, $notification->uuid]) }}"
                                                class="btn btn-warning btn-sm m-1"> <i class="ti ti-eye me-1"></i>
                                                View</a>

                                            <form
                                                action="{{ route('admin.user.notification.delete', [$user->uuid, $notification->uuid]) }}"
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
