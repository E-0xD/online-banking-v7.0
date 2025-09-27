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
                            <a href="{{ route('admin.grant_category.create') }}" class="btn btn-primary btn-sm"> <i
                                    class="ti ti-plus me-1"></i>New </a>
                        </div>
                    @endslot

                    <div class="table-responsive">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($grantCategories as $grantCategory)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $grantCategory->name }}</a>
                                        </td>
                                        <td>
                                            <span class="{{ $grantCategory->status->badge() }}">
                                                {{ $grantCategory->status->label() }}
                                            </span>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.grant_category.show', $grantCategory->uuid) }}"
                                                class="btn btn-warning  btn-sm m-1">
                                                <i class="ti ti-eye me-1">
                                                </i>View </a>
                                            <a href="{{ route('admin.grant_category.edit', $grantCategory->uuid) }}"
                                                class="btn btn-primary  btn-sm m-1">
                                                <i class="ti ti-edit me-1">
                                                </i>Edit </a>
                                            <form action="{{ route('admin.grant_category.delete', $grantCategory->uuid) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger  btn-sm m-1"
                                                    onclick="return confirm('Are you sure?')">
                                                    <i class="ti ti-trash me-1">
                                                    </i>Delete </button>
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
